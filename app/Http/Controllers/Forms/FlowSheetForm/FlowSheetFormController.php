<?php

namespace App\Http\Controllers\Forms\FlowSheetForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\FlowSheetForm\AddNewPatientRequest;
use App\Http\Requests\Forms\FlowSheetForm\EditPatientInformationRequest;
use App\Models\FlowSheetForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FlowSheetFormController extends Controller
{
    public function index(Request $request)
    {
        $data = FlowSheetForm::orderBy('id', 'DESC')->groupBy('patient_id');

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

            return view('forms.flow_sheet_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.flow_sheet_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.flow_sheet_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        FlowSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientFlowSheetForm = FlowSheetForm::findOrFail($id);
        $patientFlowSheetList = FlowSheetForm::where('patient_id', $patientFlowSheetForm->patient_id)->get();

        return view('forms.flow_sheet_form.show', compact(['patientFlowSheetForm', 'patientFlowSheetList']));
    }

    public function edit($id)
    {
        $patientFlowSheetForm = FlowSheetForm::findOrFail($id);

        return view('forms.flow_sheet_form.edit', compact('patientFlowSheetForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();

        FlowSheetForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = FlowSheetForm::find($request->id);

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

    public function addNewFlowSheet(Request $request)
    {
        $patientFlowSheetFormInformation = FlowSheetForm::findOrFail($request->id);

        $data['date_time'] = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        $data['iv_bottle_no'] = $request->iv_bottle_no;
        $data['time_started'] = $request->time_started;
        $data['iv_fluid'] = $request->iv_fluid;
        $data['additives'] = $request->additives;
        $data['rate'] = $request->rate;
        $data['time_consumed'] = $request->time_consumed;
        $data['remarks'] = $request->remarks;
        $data['patient_id'] = $patientFlowSheetFormInformation->patient_id;
        $data['user_id'] = $patientFlowSheetFormInformation->user_id;

        FlowSheetForm::create($data);

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'New flow sheet added successfully.',
            'success'           => true,
        ], 200);
    }

    public function editFlowSheet(Request $request)
    {
        $patientFlowSheetFormInformation = FlowSheetForm::findOrFail($request->id);

        $patientFlowSheetFormInformation->date_time = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        $patientFlowSheetFormInformation->iv_bottle_no = $request->iv_bottle_no;
        $patientFlowSheetFormInformation->time_started = $request->time_started;
        $patientFlowSheetFormInformation->iv_fluid = $request->iv_fluid;
        $patientFlowSheetFormInformation->additives = $request->additives;
        $patientFlowSheetFormInformation->rate = $request->rate;
        $patientFlowSheetFormInformation->time_consumed = $request->time_consumed;
        $patientFlowSheetFormInformation->remarks = $request->remarks;
        $patientFlowSheetFormInformation->patient_id = $patientFlowSheetFormInformation->patient_id;
        $patientFlowSheetFormInformation->user_id = $patientFlowSheetFormInformation->user_id;

        $patientFlowSheetFormInformation->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'Flow sheet edited successfully.',
            'success'           => true,
        ], 200);
    }
}
