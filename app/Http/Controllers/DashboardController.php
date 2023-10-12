<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ User, SubjectCode, Announcement, Task, TaskSubmission };
use App\Traits\ChartData;
use App\Services\TwilioSms;
// use App\Http\Requests\{ SubjectCodeFilterRequest };

class DashboardController extends Controller
{
    use ChartData;

    public function index(Request $request)
    {
        if (auth()->user()->role->slug === 'admin') {
            return view('dashboard.index', [
              'students' => User::where(['role_id' => 3])->count(),
              'teachers' => User::where(['role_id' => 2])->count(),
              'subject_codes' => SubjectCode::count(),
            ]);
        }

        if (auth()->user()->role->slug === 'teacher') {
            $subjectCodesQuery = SubjectCode::where('user_id', auth()->user()->id);

            if ($request->has('start_year')) {
                    $name = $request->name;
                    $start_year = $request->start_year;
                    $end_year = $request->end_year; 
                    $term = $request->term;
                    $semester = $request->semester;

                    if ($name) {
                        $subjectCodesQuery->where('name', '=', $name);
                    }
                    if ($start_year) {
                        $subjectCodesQuery->where('start_year', '=', $start_year);
                    }
                    if ($end_year) {
                        $subjectCodesQuery->where('end_year', '=', $end_year);
                    }
                    if ($term) {
                        $subjectCodesQuery->where('term', '=', $term);
                    }
                    if ($semester) {
                        $subjectCodesQuery->where('semester', '=', $semester);
                    }

                $subject_codes = $subjectCodesQuery->get();
            } else {
                $subject_codes = $subjectCodesQuery->get();
            }

            return view('dashboard.index', [
                'search' => [
                    'name' => !empty($name) ? $name : '',
                    'start_year' => !empty($start_year) ? $start_year : '',
                    'end_year' => !empty($end_year) ? $end_year : '',
                    'semester' => !empty($semester) ? $semester : '',
                    'term' => !empty($term) ? $term : '',
                ],
                'subject_codes' => $subject_codes,
                'tasks' => [
                    'Informatics Skill' => ['informatics.png', Task::where(['category' => 'Informatics Skill', 'user_id' => auth()->user()->id])->latest()->take(5)->get()],
                    'Informatics Knowledge' => ['book.png', Task::where(['category' => 'Informatics Knowledge', 'user_id' => auth()->user()->id])->latest()->take(5)->get()],
                    'Computer Skills' => ['desktop-computer.png', Task::where(['category' => 'Computer Skills', 'user_id' => auth()->user()->id])->latest()->take(5)->get()],
                ],
            ]);
        }

        $taskSubmittions = TaskSubmission::where(['user_id' => auth()->user()->id])->count();
        // $taskSubmittions = TaskSubmission::where(['user_id' => auth()->user()->id])->distinct('task_id')->count();
        $tasks = Task::where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id])->count();

        return view('dashboard.index', [
            'announcement' => Announcement::where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id])->latest()->first(),
            'tasks' => [
                'Informatics Skill' => ['informatics.png', Task::where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id, 'category' => 'Informatics Skill'])->latest()->take(5)->get()],
                'Informatics Knowledge' => ['book.png', Task::where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id, 'category' => 'Informatics Knowledge'])->latest()->take(5)->get()],
                'Computer Skills' => ['desktop-computer.png', Task::where(['subject_code_id' => auth()->user()->studentProfile->subject_code_id, 'category' => 'Computer Skills'])->latest()->take(5)->get()],
            ],
            'undone' => $tasks - $taskSubmittions,
            'finished' => $taskSubmittions,
        ]);
    }
    public function filter(Request $request)
    {
        $start_year = $request->start_year;
        $end_year = $request->start_year;
        $term = $request->term;
        $semester = $request->semester;


       $subject_codes =  SubjectCode::where("start_year", "like", "%$start_year%")
       ->orWhere("start_year", "like", "%$start_year%")
       ->orWhere("end_year", "like", "%$end_year%")
       ->orWhere("term", "like", "%$term%")
       ->orWhere("semester", "like", "%$semester%")
       ->get();

       return view('dashboard.index', compact('subject_codes', 'start_year', 'end_year', 'term', 'semester'));
    
    }
    

}