<?php

namespace App\Http\Controllers\Forms\PatientAdmissionRecordForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\PatientAdmissionRecordForm\AddNewPatientRequest;
use App\Http\Requests\Forms\PatientAdmissionRecordForm\EditPatientInformationRequest;
use App\Models\PatientAdmissionRecordForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientAdmissionRecordFormController extends Controller
{
    public function index(Request $request)
    {
        $data = PatientAdmissionRecordForm::orderBy('id', 'DESC');

        $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();

        if (auth()->user()->role->slug === 'teacher') {
            $students = StudentProfile::whereIn('subject_code_id', $subjectCodes)->get()->pluck('user_id');
            $students[count($students) + 1] = auth()->user()->id;
            $data->whereIn('user_id', $students);
        } elseif (auth()->user()->role->slug === 'student') {
            $data->where(['user_id' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('patient_first_name', 'like', '%' . $request->search . '%');

            return view('forms.patient_admission_record_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.patient_admission_record_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }
    public function create()
    {
        return view('forms.patient_admission_record_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {

        $data = $request->all();

        $data['admission_date_time'] = Carbon::parse($request->admission_date_time)->format('Y-m-d H:i:s');
        $data['discharge_date_time'] = Carbon::parse($request->discharge_date_time)->format('Y-m-d H:i:s');
        $data['user_id'] = auth()->user()->id;

        foreach ($data as $key => $value) {
            error_log($key . ': ' . $value);
        }

        PatientAdmissionRecordForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientPatientAdmissionRecordForm = PatientAdmissionRecordForm::findOrFail($id);

        return view('forms.patient_admission_record_form.show', compact('patientPatientAdmissionRecordForm'));
    }

    public function edit($id)
    {
        $patientPatientAdmissionRecordForm = PatientAdmissionRecordForm::findOrFail($id);

        return view('forms.patient_admission_record_form.edit', compact('patientPatientAdmissionRecordForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        $data['admission_date_time'] = Carbon::parse($request->admission_date_time)->format('Y-m-d H:i:s');
        $data['discharge_date_time'] = Carbon::parse($request->discharge_date_time)->format('Y-m-d H:i:s');
        PatientAdmissionRecordForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = PatientAdmissionRecordForm::find($request->id);

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
