<?php

namespace App\Http\Controllers\Forms\DischargeClinicalSummary;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\DischargeClinicalSummaryForm\AddNewPatientRequest;
use App\Http\Requests\Forms\DischargeClinicalSummaryForm\EditPatientInformationRequest;
use App\Models\DischargeClinicalSummaryForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DischargeClinicalSummaryFormController extends Controller
{

    public function index(Request $request)
    {
        $data = DischargeClinicalSummaryForm::orderBy('id', 'DESC');

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

            return view('forms.discharge_clinical_summary_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.discharge_clinical_summary_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.discharge_clinical_summary_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['date_accomplished'] = Carbon::parse($request->consulted_at)->format('Y-m-d H:i:s');
        $data['user_id'] = auth()->user()->id;

        DischargeClinicalSummaryForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientDischargeClinicalSummaryForm = DischargeClinicalSummaryForm::findOrFail($id);

        return view('forms.discharge_clinical_summary_form.show', compact('patientDischargeClinicalSummaryForm'));
    }

    public function edit($id)
    {
        $patientDischargeClinicalSummaryForm = DischargeClinicalSummaryForm::findOrFail($id);

        return view('forms.discharge_clinical_summary_form.edit', compact('patientDischargeClinicalSummaryForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        $data['date_accomplished'] = Carbon::parse($request->date_accomplished)->format('Y-m-d H:i:s');
        DischargeClinicalSummaryForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = DischargeClinicalSummaryForm::find($request->id);

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
