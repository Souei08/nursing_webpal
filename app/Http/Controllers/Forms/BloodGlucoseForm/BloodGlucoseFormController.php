<?php

namespace App\Http\Controllers\Forms\BloodGlucoseForm;


use App\Models\SubjectCode;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\BloodGlucoseForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\BloodGlucoseForm\AddNewPatientRequest;
use App\Http\Requests\Forms\BloodGlucoseForm\EditPatientInformationRequest;
use App\Http\Requests\Forms\BloodGlucoseForm\MonitoringForm\AddNewMonitoringFormRequest;
use Carbon\Carbon;

class BloodGlucoseFormController extends Controller
{
    public function index(Request $request)
    {
        $data = BloodGlucoseForm::orderBy('id', 'DESC')->groupBy('patient_id');

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

            return view('forms.blood_glucose_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.blood_glucose_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.blood_glucose_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        BloodGlucoseForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientBloodGlucoseForm = BloodGlucoseForm::findOrFail($id);
        $patientMonitoringFormList = BloodGlucoseForm::where('patient_id', $patientBloodGlucoseForm->patient_id)->get();

        return view('forms.blood_glucose_form.show', compact(['patientBloodGlucoseForm', 'patientMonitoringFormList']));
    }

    public function edit($id)
    {
        $patientBloodGlucoseForm = BloodGlucoseForm::findOrFail($id);

        return view('forms.blood_glucose_form.edit', compact('patientBloodGlucoseForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        BloodGlucoseForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = BloodGlucoseForm::find($request->id);

        if ($data && $data->delete()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Successfully Deleted',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'redirect_url'  => redirect()->back()->getTargetUrl(),
            'message'       => 'Theres an error deleting this item.',
            'success'       => true,
        ], 200);
    }

    public function addNewMonitoringForm(Request $request)
    {
        $patientDoctorsOrderInformation = BloodGlucoseForm::findOrFail($request->id);

        $data['patient_id'] = $patientDoctorsOrderInformation->patient_id;
        $data['date_time'] = Carbon::parse($request->date_time)->format('Y-m-d H:i:s');
        $data['hgt'] = $request->hgt;
        $data['referred_to'] = $request->referred_to;
        $data['insulin_given'] = $request->insulin_given;
        $data['administered_by'] = $request->administered_by;
        $data['remarks'] = $request->remarks;
        $data['user_id'] = $patientDoctorsOrderInformation->user_id;

        BloodGlucoseForm::create($data);

        return response()->json([
            'redirect_url'  => redirect()->back()->getTargetUrl(),
            'message'       => 'New monitoring form added successfully.',
            'success'       => true,
        ], 200);
    }

    public function editMonitoringForm(Request $request)
    {
        $patientDoctorsOrderInformation = BloodGlucoseForm::findOrFail($request->id);

        $patientDoctorsOrderInformation->date_time = $request->date_time;
        $patientDoctorsOrderInformation->hgt = $request->hgt;
        $patientDoctorsOrderInformation->referred_to = $request->referred_to;
        $patientDoctorsOrderInformation->insulin_given = $request->insulin_given;
        $patientDoctorsOrderInformation->administered_by = $request->administered_by;
        $patientDoctorsOrderInformation->remarks = $request->remarks;

        $patientDoctorsOrderInformation->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'Monitoring form edited successfully.',
            'success'           => true,
        ], 200);
    }
}
