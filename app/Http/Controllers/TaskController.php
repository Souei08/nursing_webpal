<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{SubjectCode, User, Task, TaskSubmission, TaskFile};
use App\Http\Requests\{TaskRequest, TaskSubmissionRequest};

use function PHPUnit\Framework\logicalAnd;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $data = Task::orderBy('id', 'DESC');

        $request->merge([
            'category' => $request->category ?? 'Informatics Skill',
        ]);

        if (auth()->user()->role->slug === 'student') {
            $data->where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id]);
        }

        if (auth()->user()->role->slug === 'teacher') {
            $data->where(['user_id' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('title', 'like', '%' . $request->search . '%');

            return view('tasks.list', $request->all() + [
                'list' => $data->where(['category' => $request->category])->orderBy('id', 'DESC')->paginate($request->per_page ?? 10)->appends(request()->query()),
            ])->render();
        }

        return view('tasks.index', $request->all() + [
            'list' => $data->where(['category' => $request->category])->paginate($request->per_page ?? 10)->appends(request()->query()),
        ]);
    }

    public function show($id, Request $request)
    {
        $data = Task::find($id);
        $submission = TaskSubmission::where(['task_id' => $id, 'user_id' => auth()->user()->id])->first();
        // $submission = TaskSubmission::where(['task_id' => $id, 'user_id' => auth()->user()->id])->latest('created_at')->first();

        return view('tasks.show', $request->all() + [
            'data' => $data,
            'submission' => $submission,
        ]);
    }

    public function create(Request $request)
    {
        $data = SubjectCode::find($request->subject_code_id);

        return view('tasks.create', $request->all() + [
            'data' => $data,
        ]);
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->except(['file']) + ['user_id' => auth()->user()->id]);

        if ($request->file('file')) {

            $file = $request->file('file');

            $fileName = date('ymdhis') . '_' . $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileType  = $file->getClientOriginalExtension();


            try {
                $task->taskFiles()->create([
                    'files_file_name'           => $fileName,
                    'files_file_size'           => $fileSize,
                    'files_file_content_type'   => $fileType,
                    'files_updated_at'          => now(),
                ]);

                $request->file('file')->move('files/tasks', $fileName);
            } catch (\Throwable $th) { }
        }


        return response()->json([
            'redirect_url' => redirect(route('subject-codes.show', ['id' => $task->subject_code_id, 'tab' => 'tasks']))->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function edit($id)
    {
        $data = Task::find($id);

        return view('tasks.edit', [
            'data' => $data
        ]);
    }

    public function update($id, TaskRequest $request)
    {
        $task = Task::find($id);

        $task->update($request->all());

        if ($request->file('file')) {

            $file = $request->file('file');

            $fileName = date('ymdhis') . '_' . $file->getClientOriginalName();
            $fileSize = $file->getSize();
            $fileType  = $file->getClientOriginalExtension();


            try {
                $task->taskFiles()->create([
                    'files_file_name'           => $fileName,
                    'files_file_size'           => $fileSize,
                    'files_file_content_type'   => $fileType,
                    'files_updated_at'          => now(),
                ]);

                $request->file('file')->move('files/tasks', $fileName);
            } catch (\Throwable $th) { }
        }

        return response()->json([
            'redirect_url' => redirect(route('tasks.show', $id))->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = Task::find($request->id);

        if ($data && $data->delete()) {
            return response()->json([
              //  'redirect_url' => redirect()->back()->getTargetUrl(),
              'redirect_url'=> redirect(route('tasks.list'))->getTargetUrl(),
                'message' => 'Successfully Deleted',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'message' => 'Theres an error deleting this item.',
            'success' => true,
        ], 200);
    }

    public function submission(TaskSubmissionRequest $request)
    {

        try {
            // $taskSubmission = TaskSubmission::firstOrCreate([
            //     'user_id' => auth()->user()->id,
            //     'task_id' => $request->task_id,
            //     'description' => $request->description,
            //     'status' => 'Pending',
            // ]);
            $taskSubmission = TaskSubmission::updateOrCreate([
                'user_id' => auth()->user()->id,
                'task_id' => $request->task_id
            ],[
                'description' => $request->description,
                'status' => 'Pending',
            ]);

            error_log('awefawefoi');

            if ($request->file('file')) {
                $files = $request->file('file');


                foreach($files as $file) {
                    $fileName = date('ymdhis') . '_' . $file->getClientOriginalName();
                    $fileSize = $file->getSize();
                    $fileType  = $file->getClientOriginalExtension();


                    try {
                        $taskSubmission->taskSubmissionFiles()->create([
                            'files_file_name'           => $fileName,
                            'files_file_size'           => $fileSize,
                            'files_file_content_type'   => $fileType,
                            'task_submission_id'        => $request->task_id,
                            'files_updated_at'          => now(),
                        ]);

                        // $taskSubmission->taskSubmissionFiles()->updateOrCreate([
                        //     'task_submission_id'        => $request->task_id
                        // ],[
                        //     'files_file_name'           => $fileName,
                        //     'files_file_size'           => $fileSize,
                        //     'files_file_content_type'   => $fileType,
                        //     'files_updated_at'          => now(),
                        // ]);

                        $request->file('file')->move('files/tasks/submissions', $fileName);
                    } catch (\Throwable $th) {
                        error_log($th);
                    }
                }
            }

            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Submitted Successfully.',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            // Log the error for debugging
            error_log($th);

            return response()->json([
                'message' => 'Error submitting task.',
                'success' => false,
            ], 500);
        }
    }

    public function destroyImage(Request $request)
    {
        $data = TaskFile::find($request->id);

        if ($data && $data->delete()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'File Successfully Deleted',
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
