<?php

namespace App\Http\Controllers\Forms\VitalSignSheetForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\VitalSignSheetForm\AddNewPatientRequest;
use App\Http\Requests\Forms\VitalSignSheetForm\EditPatientInformationRequest;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use App\Models\VitalSignSheetForm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VitalSignSheetFormController extends Controller
{
    public function index(Request $request)
    {
        $data = VitalSignSheetForm::orderBy('id', 'DESC')->groupBy('patient_id');

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

            return view('forms.vital_sign_sheet_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.vital_sign_sheet_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.vital_sign_sheet_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        VitalSignSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientVitalSignSheetForm = VitalSignSheetForm::findOrFail($id);
        $patientVitalSignList = VitalSignSheetForm::where('patient_id', $patientVitalSignSheetForm->patient_id)->get();

        return view('forms.vital_sign_sheet_form.show', compact(['patientVitalSignSheetForm', 'patientVitalSignList']));
    }

    public function edit($id)
    {
        $patientVitalSignSheetForm = VitalSignSheetForm::findOrFail($id);

        return view('forms.vital_sign_sheet_form.edit', compact('patientVitalSignSheetForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        VitalSignSheetForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {

        error_log($request->id);
        $data = VitalSignSheetForm::find($request->id);

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

    public function addNewVitalSign(Request $request)
    {
        $patientVitalSignSheetFormInformation = VitalSignSheetForm::findOrFail($request->id);

        $data['room_no'] = $request->room_no;
        $data['date_time'] = Carbon::parse($request->date_time)->format('Y-m-d H:i:s');
        $data['bp'] = $request->bp;
        $data['pulse'] = $request->pulse;
        $data['resp'] = $request->resp;
        $data['temp'] = $request->temp;
        $data['remarks'] = $request->remarks;
        $data['patient_id'] = $patientVitalSignSheetFormInformation->patient_id;
        $data['user_id'] = $patientVitalSignSheetFormInformation->user_id;

        VitalSignSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New vital sign added successfully.',
            'success' => true,
        ], 200);
    }

    public function editVitalSign(Request $request)
    {
        $patientVitalSignSheetFormInformation = VitalSignSheetForm::findOrFail($request->id);

        $patientVitalSignSheetFormInformation->room_no = $request->room_no;
        $patientVitalSignSheetFormInformation->date_time = Carbon::parse($request->date_time)->format('Y-m-d H:i:s');
        $patientVitalSignSheetFormInformation->bp = $request->bp;
        $patientVitalSignSheetFormInformation->pulse = $request->pulse;
        $patientVitalSignSheetFormInformation->resp = $request->resp;
        $patientVitalSignSheetFormInformation->temp = $request->temp;
        $patientVitalSignSheetFormInformation->remarks = $request->remarks;
        $patientVitalSignSheetFormInformation->patient_id = $patientVitalSignSheetFormInformation->patient_id;
        $patientVitalSignSheetFormInformation->user_id = $patientVitalSignSheetFormInformation->user_id;
        $patientVitalSignSheetFormInformation->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'Vital sign updated successfully.: ' . $patientVitalSignSheetFormInformation->room_no,
            'success'           => true,
        ], 200);
    }
}
