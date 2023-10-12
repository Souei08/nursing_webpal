<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\{User, SubjectCode, StudentProfile};
use App\Http\Requests\{UserRequest, UserUpdateRequest};
use Illuminate\Support\Facades\Storage;
use Hash;
use App\Helpers\Utils;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $type)
    {

        $roleId = [
            'admins' => 1,
            'teachers' => 2,
            'students' => 3,
        ];

        $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();

        $data = User::withTrashed()->where(['role_id' => $roleId[$type]])->orderBy('created_at', 'DESC');

        if (auth()->user()->role->slug === 'teacher') {
            $students = [];

            if (!empty($request->subject_code)) {
                $specificSubjectCode = SubjectCode::where(['user_id' => auth()->user()->id, 'name' => $request->subject_code])->get();

                $students = StudentProfile::whereIn('subject_code_id', $specificSubjectCode)->get()->pluck('user_id');
            } else {
                // $students = StudentProfile::whereIn('subject_code_id', $subjectCodes)->get()->pluck('user_id');
                $students = StudentProfile::whereIn('subject_code_id', $subjectCodes->pluck('id'))->pluck('user_id');
            }

            $data->whereIn('id', $students);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {

            $searchValues = preg_split('/\s+/', $request->search, -1, PREG_SPLIT_NO_EMPTY);

            $data->where(function ($query) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $query->orWhere('first_name', 'like', "%{$value}%");
                    $query->orWhere('last_name', 'like', "%{$value}%");
                    $query->orWhere('middle_name', 'like', "%{$value}%");
                }
            })->where(['role_id' => $roleId[$type]]);

            return view('users.list', [
                'type' => $type,
                'subjectCodes' => $subjectCodes,
                'list' => $data->paginate(10),
            ])->render();
        }

        return view('users.index', [
            'type' => $type,
            'subjectCodes' => $subjectCodes,
            'list' => $data->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
        $folder = [
            '1' => 'admins',
            '2' => 'teachers',
            '3' => 'students',
        ];

        $request->merge([
            'is_active' => true,
            'status' => 'Active',
        ]);

        if (!empty($request->password)) {
            $request->merge([
                'password' => Hash::make($request->password),
            ]);
        }

        $user = User::create($request->except(['department', 'date_of_appointment']));

        $user->teacherProfile()->create($request->only(['department', 'date_of_appointment']));

        $user->markEmailAsVerified();

        if ($request->hasFile('photo')) {
            Storage::disk('local')->putFileAs(
                'public/' . $folder[$request->role_id] . '/' . $user->id,
                $request->photo,
                'photo.jpg',
            );
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'User Created Successfully.',
            'success' => true,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);

        return view('users.show', [
            'user' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        if (!empty($request->password)) {
            $request->merge([
                'password' => Hash::make($request->password),
            ]);
        } else {
            $request->request->remove('password');
        }

        $folder = [
            '1' => 'admins',
            '2' => 'teachers',
            '3' => 'students',
        ];

        $user = User::find($id);

        $user->update($request->except(['department', 'date_of_appointment']));
        $user->teacherProfile()->update($request->only(['department', 'date_of_appointment']));

        if ($request->hasFile('photo')) {
            Storage::disk('local')->putFileAs(
                'public/' . $folder[$request->role_id] . '/' . $user->id,
                $request->photo,
                'photo.jpg',
            );
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'User Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function updateStudentStatus(Request $request, $id)
    {
        $user = User::find($id);

        $user->status = $request->status;
        $user->save();


        $user->studentProfile()->update($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'User Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function restoreDeleteStudentStatus(Request $request, $id)
    {
        // $user = User::find($id);
        $user = User::withTrashed()->find($id);

        if ($request->status == 'Delete') {
            if ($user && $user->forceDelete()) {
                return response()->json([
                    'redirect_url' => redirect()->back()->getTargetUrl(),
                    'message' => 'Successfully Deleted',
                    'success' => true,
                ], 200);
            }
        }



        $user->status = $request->status;
        $user->save();

        $user->studentProfile()->update($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'User Updated Successfully.',
            'success' => true,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::withTrashed()->find($request->id);

        if (!empty($request->force_delete) && $request->force_delete === 'true') {
            if ($user && $user->forceDelete()) {
                return response()->json([
                    'redirect_url' => redirect()->back()->getTargetUrl(),
                    'message' => 'Successfully Deleted',
                    'success' => true,
                ], 200);
            }
        }

        if ($user && $user->delete()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Successfully Deleted',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Theres an error deleting this item.',
            'success' => true,
        ], 200);
    }

    public function restore(Request $request)
    {
        $user = User::withTrashed()->find($request->id);

        $user->delete();

        if ($user && $user->restore()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Successfully Restored',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Theres an error deleting this item.',
            'success' => true,
        ], 200);
    }
}
