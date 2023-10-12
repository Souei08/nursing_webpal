<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ Announcement, SubjectCode };
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function index(Request $request)
    {
        $data = Announcement::orderBy('id', 'DESC');
        $subjectCodes = SubjectCode::get();

        if (auth()->user()->role->slug === 'teacher') {
            $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();

            $data->whereIn('subject_code_id', SubjectCode::where(['user_id' => auth()->user()->id])->get()->pluck('id'));
        }

        if (auth()->user()->role->slug === 'student') {
            $data->where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('title', 'like', '%'.$request->search.'%');

            return view('announcements.list', [
                'subject_codes' => $subjectCodes,
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('announcements.index', [
            'subject_codes' => $subjectCodes,
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function show($id, Request $request)
    {
        $data = Announcement::find($id);

        return $data;
    }

    public function create(AnnouncementRequest $request)
    {
        Announcement::create($request->all() + ['user_id' => auth()->user()->id]);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200); 
    }

    public function update($id, AnnouncementRequest $request)
    {      
        Announcement::find($id)->update($request->all());

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200); 
    }

    public function destroy(Request $request)
    {
        $data = Announcement::find($request->id);

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