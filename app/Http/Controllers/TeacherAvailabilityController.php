<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ TeacherAvailability };
use App\Http\Requests\{ TeacherAvailabilityRequest };

class TeacherAvailabilityController extends Controller
{
    public function index(Request $request)
    {
        return view('teacher-availability.index', [
            'data' => TeacherAvailability::where(['user_id' => auth()->user()->id])->get()
        ]);
    }

    public function create(TeacherAvailabilityRequest $request)
    {
        $time = explode('-', str_replace(' ', '', $request->time ?? ''));

        $request->merge([
            'time_start' => $time[0],
            'time_end' => $time[1],
        ]);
        
        TeacherAvailability::create($request->except(['time']) + ['user_id' => auth()->user()->id]);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200); 
    }

    public function destroy(Request $request)
    {
        $data = TeacherAvailability::find($request->id);

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
