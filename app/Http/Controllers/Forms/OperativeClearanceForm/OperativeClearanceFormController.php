<?php

namespace App\Http\Controllers\Forms\OperativeClearanceForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\OperativeClearanceForm\AddNewPatientRequest;
use App\Http\Requests\Forms\OperativeClearanceForm\EditNewPatientRequest;

use Carbon\Carbon;
use App\Models\SubjectCode;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\OperativeClearanceForm;


class OperativeClearanceFormController extends Controller
{
    public function index(Request $request)
    {
        $data = OperativeClearanceForm::orderBy('id', 'DESC');

        // $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();
        $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->pluck('id')->toArray();

        if (auth()->user()->role->slug === 'teacher') {

            $students = StudentProfile::whereIn('subject_code_id', $subjectCodes)->get()->pluck('user_id');
            $students[count($students) + 1] = auth()->user()->id;
            $data->whereIn('user_id', $students);
        } elseif (auth()->user()->role->slug === 'student') {
            $data->where(['user_id' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('patient_first_name', 'like', '%' . $request->search . '%');

            return view('forms.operative_clearance_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.operative_clearance_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }


    public function create()
    {
        return view('forms.operative_clearance_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['tentative_sched'] = Carbon::parse($request->tentative_sched)->format('Y-m-d H:i:s');
        $data['total_score_per_yes'] = 0;

        if ($request->high_risk_surgery == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->coronary_artery_disease_presence == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->congestion_heart_failure_presence == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->cerebrovascular_disease == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->diabetes_mellitus_insulin == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->serum_creatinine == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        foreach ($data as $key => $value) {
            error_log($key . ': ' . $value);
        }


        $data['user_id'] = auth()->user()->id;




        OperativeClearanceForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $operativeClearanceForm = OperativeClearanceForm::findOrFail($id);

        return view('forms.operative_clearance_form.show', compact('operativeClearanceForm'));
    }

    public function edit($id)
    {
        $operativeClearanceForm = OperativeClearanceForm::findOrFail($id);

        return view('forms.operative_clearance_form.edit', compact('operativeClearanceForm'));
    }

    public function update($id, EditNewPatientRequest $request)
    {
        $data = $request->all();

        $data['tentative_sched'] = Carbon::parse($request->tentative_sched)->format('Y-m-d H:i:s');
        $data['total_score_per_yes'] = 0;

        if ($request->high_risk_surgery == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->coronary_artery_disease_presence == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->congestion_heart_failure_presence == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->cerebrovascular_disease == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->diabetes_mellitus_insulin == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        if ($request->serum_creatinine == 'Yes') {
            $data['total_score_per_yes'] += 1;
        }

        foreach ($data as $key => $value) {
            error_log($key . ': ' . $value);
        }


        $data['user_id'] = auth()->user()->id;

        OperativeClearanceForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }


    public function destroy(Request $request)
    {
        $data = OperativeClearanceForm::find($request->id);

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
