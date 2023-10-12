<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ TaskSubmission };
use App\Http\Requests\{ TaskSubmissionRateAndCommentRequest };

class TaskSubmissionController extends Controller
{
    public function show($id, Request $request)
    {
        $data = TaskSubmission::find($id);

        return view('task-submissions.show', $request->all() + [
            'data' => $data 
        ]);
    }

    public function rateAndComment($id, TaskSubmissionRateAndCommentRequest $request)
    {
        $data = TaskSubmission::find($id);

        $data->update($request->all() + ['status' => 'Done']);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Submitted Successfully.',
            'success' => true,
        ], 200); 
    }
}
