<?php

namespace App\Http\Controllers\Forms\MedicationRecordForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\MedicationRecordForm\AddNewPatientRequest;
use App\Http\Requests\Forms\MedicationRecordForm\EditNewPatientRequest;
use App\Models\MedicationRecordForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MedicationRecordFormController extends Controller
{
    public function index(Request $request)
    {
        $data = MedicationRecordForm::orderBy('id', 'DESC')->groupBy('patient_id');

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

            return view('forms.medication_record_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.medication_record_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }


    public function create()
    {
        return view('forms.medication_record_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        MedicationRecordForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($id);
        $patientMedicationRecordFormPRNList = MedicationRecordForm::where('patient_id', $medicationRecordForm->patient_id)->get();
        $patientMedicationRecordFormSingleOrderStatList = MedicationRecordForm::where('patient_id', $medicationRecordForm->patient_id)->get();

        return view('forms.medication_record_form.show', compact(['medicationRecordForm', 'patientMedicationRecordFormPRNList', 'patientMedicationRecordFormSingleOrderStatList']));
    }

    public function edit($id)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($id);

        return view('forms.medication_record_form.edit', compact('medicationRecordForm'));
    }

    public function update($id, EditNewPatientRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        MedicationRecordForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = MedicationRecordForm::find($request->id);

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








    public function addNewPRN(Request $request)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($request->id);

        $data['patient_first_name'] = $medicationRecordForm->patient_first_name;
        $data['patient_middle_name'] = $medicationRecordForm->patient_middle_name;
        $data['patient_last_name'] = $medicationRecordForm->patient_last_name;

        $data['date_of_birth'] = $medicationRecordForm->date_of_birth;

        $data['allergies'] = $medicationRecordForm->allergies;
        $data['gender'] = $medicationRecordForm->gender;
        $data['room_no'] = $medicationRecordForm->room_no;

        $data['attending_physician_first_name'] = $medicationRecordForm->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $medicationRecordForm->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $medicationRecordForm->attending_physician_last_name;

        $data['date'] = $medicationRecordForm->date;
        $data['patient_id'] = $medicationRecordForm->patient_id;

        $data['prn_date_ordered'] = Carbon::parse($request->prn_date_ordered)->format('Y-m-d H:i:s');
        $data['prn_medication'] = $request->prn_medication;
        $data['prn_date_time'] = Carbon::parse($request->prn_date_time)->format('Y-m-d H:i:s');
        $data['prn_remarks'] = $request->prn_remarks;

        $data['nurse_staff_first_name'] = $medicationRecordForm->nurse_staff_first_name;
        $data['nurse_staff_middle_name'] = $medicationRecordForm->nurse_staff_middle_name;
        $data['nurse_staff_last_name'] = $medicationRecordForm->nurse_staff_last_name;

        $data['user_id'] = $medicationRecordForm->user_id;


        MedicationRecordForm::create($data);

        return response()->json([
            'redirect_url'  => redirect()->back()->getTargetUrl(),
            'message'       => 'New PRN added successfully.',
            'success'       => true,
        ], 200);
    }

    public function editPRN(Request $request)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($request->id);

        $medicationRecordForm->prn_date_ordered = Carbon::parse($request->prn_date_ordered)->format('Y-m-d H:i:s');
        $medicationRecordForm->prn_medication = $request->prn_medication;
        $medicationRecordForm->prn_date_time = $request->prn_date_time;
        $medicationRecordForm->prn_remarks = $request->prn_remarks;

        $medicationRecordForm->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'PRN edited successfully.',
            'success'           => true,
        ], 200);
    }




    public function addNewSingleOrderStat(Request $request)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($request->id);

        $data['patient_first_name'] = $medicationRecordForm->patient_first_name;
        $data['patient_middle_name'] = $medicationRecordForm->patient_middle_name;
        $data['patient_last_name'] = $medicationRecordForm->patient_last_name;

        $data['date_of_birth'] = $medicationRecordForm->date_of_birth;

        $data['allergies'] = $medicationRecordForm->allergies;
        $data['gender'] = $medicationRecordForm->gender;
        $data['room_no'] = $medicationRecordForm->room_no;

        $data['attending_physician_first_name'] = $medicationRecordForm->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $medicationRecordForm->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $medicationRecordForm->attending_physician_last_name;

        $data['date'] = $medicationRecordForm->date;
        $data['patient_id'] = $medicationRecordForm->patient_id;

        $data['date_ordered'] = Carbon::parse($request->date_ordered)->format('Y-m-d H:i:s');
        $data['medication'] = $request->medication;
        $data['date_time'] = Carbon::parse($request->date_time)->format('Y-m-d H:i:s');
        $data['initials'] = $request->initials;

        $data['nurse_staff_first_name'] = $medicationRecordForm->nurse_staff_first_name;
        $data['nurse_staff_middle_name'] = $medicationRecordForm->nurse_staff_middle_name;
        $data['nurse_staff_last_name'] = $medicationRecordForm->nurse_staff_last_name;

        $data['user_id'] = $medicationRecordForm->user_id;


        MedicationRecordForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New single order/stat added successfully.',
            'success' => true,
        ], 200);
    }

    public function editSingleOrderStat(Request $request)
    {
        $medicationRecordForm = MedicationRecordForm::findOrFail($request->id);

        $medicationRecordForm->date_ordered = Carbon::parse($request->date_ordered)->format('Y-m-d H:i:s');
        $medicationRecordForm->medication = $request->medication;
        $medicationRecordForm->date_time_given = Carbon::parse($request->date_time_given)->format('Y-m-d H:i:s');
        $medicationRecordForm->initials = $request->initials;

        $medicationRecordForm->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'Single order/stat edited successfully.',
            'success'           => true,
        ], 200);
    }
}
