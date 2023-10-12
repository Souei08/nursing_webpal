<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ SubjectCode, User, Task };
use App\Http\Requests\{ SubjectCodeRequest, TaskRequest };

class SubjectCodeController extends Controller
{
    public function index(Request $request)
    {
        $data = SubjectCode::orderBy('id', 'DESC');

        if (auth()->user()->role->slug === 'teacher') {
            $data->where(['user_id' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('name', 'like', '%'.$request->search.'%');

            return view('subject-codes.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('subject-codes.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function show($id, Request $request)
    {
        $data = SubjectCode::find($id);

        $request->merge([
            'category' => $request->category ?? 'Informatics Skill',
        ]);

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            return view('subject-codes.'.$request->tab, $request->all() + [
                'data' => $data,
                'list' => $request->tab === 'students' ? User::whereIn('id', $data->students()->where(['status' => 'Approved'])->pluck('user_id'))->paginate($request->per_page ?? 20)->appends(request()->query()) : Task::where(['category' => $request->category, 'subject_code_id' => $id])->orderBy('id', 'DESC')->paginate($request->per_page ?? 10)->appends(request()->query()),
            ])->render();
        }


        // $list = $request->tab === 'students' ? User::whereIn('id', $data->students()->where(['status' => 'Approved'])->pluck('user_id'))->paginate($request->per_page ?? 20)->appends(request()->query()) : Task::where(['category' => $request->category, 'subject_code_id' => $id])->orderBy('id', 'DESC')->paginate($request->per_page ?? 10)->appends(request()->query());

// dd($list);

        return view('subject-codes.show', $request->all() + [
            'data' => $data,
            'list' => $request->tab === 'students' ? User::whereIn('id', $data->students()->where(['status' => 'Approved'])->pluck('user_id'))->paginate($request->per_page ?? 20)->appends(request()->query()) : Task::where(['category' => $request->category, 'subject_code_id' => $id])->orderBy('id', 'DESC')->paginate($request->per_page ?? 10)->appends(request()->query()),
        ]);
    }

    public function create(SubjectCodeRequest $request)
    {
        SubjectCode::create($request->all() + ['user_id' => auth()->user()->id]);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200); 
    }

    public function update($id, SubjectCodeRequest $request)
    {      
        SubjectCode::find($id)->update($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200); 
    }

    public function destroy(Request $request)
    {
        $data = SubjectCode::find($request->id);

        if ($data && $data->delete()) {
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
}