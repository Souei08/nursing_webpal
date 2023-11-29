<?php

namespace App\Http\Controllers\Forms\DoctorsOrderForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\DoctorsOrderForm\AddNewPatientRequest;
use App\Http\Requests\Forms\DoctorsOrderForm\EditPatientInformationRequest;
use App\Models\DoctorsOrderForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorsOrderFormController extends Controller
{
    public function index(Request $request)
    {
        $data = DoctorsOrderForm::orderBy('id', 'DESC')->groupBy('patient_id');

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
            $data->where('first_name', 'like', '%' . $request->search . '%');

            return view('forms.doctors_order_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.doctors_order_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.doctors_order_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();
        $data['doctors_order_date'] = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        $data['user_id'] = auth()->user()->id;

        DoctorsOrderForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientDoctorsOrderForm = DoctorsOrderForm::findOrFail($id);
        $patientDoctorsOrdersList = DoctorsOrderForm::where('patient_id', $patientDoctorsOrderForm->patient_id)->get();

        return view('forms.doctors_order_form.show', compact(['patientDoctorsOrderForm', 'patientDoctorsOrdersList']));
    }

    public function edit($id)
    {
        $patientDoctorsOrderForm = DoctorsOrderForm::findOrFail($id);

        return view('forms.doctors_order_form.edit', compact('patientDoctorsOrderForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        $data['doctors_order_date'] = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        DoctorsOrderForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = DoctorsOrderForm::find($request->id);

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

    public function addNewDoctorsOrder(Request $request)
    {
        $patientDoctorsOrderInformation = DoctorsOrderForm::findOrFail($request->id);

        $data['first_name'] = $patientDoctorsOrderInformation->first_name;
        $data['middle_name'] = $patientDoctorsOrderInformation->middle_name;
        $data['last_name'] = $patientDoctorsOrderInformation->last_name;
        $data['room_no'] = $patientDoctorsOrderInformation->room_no;
        $data['date_of_birth'] = $patientDoctorsOrderInformation->date_of_birth;
        $data['gender'] = $patientDoctorsOrderInformation->gender;
        $data['allergies'] = $patientDoctorsOrderInformation->allergies;
        $data['attending_physician_first_name'] = $patientDoctorsOrderInformation->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $patientDoctorsOrderInformation->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $patientDoctorsOrderInformation->attending_physician_last_name;
        $data['patient_id'] = $patientDoctorsOrderInformation->patient_id;
        $data['doctors_order_date'] = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        $data['progress_note'] = $request->progress_note;
        $data['doctors_order'] = $request->doctors_order;
        $data['user_id'] = $patientDoctorsOrderInformation->user_id;


        DoctorsOrderForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New doctor\'s order added successfully.',
            'success' => true,
        ], 200);
    }

    public function editDoctorsOrder(Request $request)
    {
        $patientDoctorsOrderInformation = DoctorsOrderForm::findOrFail($request->id);

        $patientDoctorsOrderInformation->first_name = $patientDoctorsOrderInformation->first_name;
        $patientDoctorsOrderInformation->middle_name = $patientDoctorsOrderInformation->middle_name;
        $patientDoctorsOrderInformation->last_name = $patientDoctorsOrderInformation->last_name;
        $patientDoctorsOrderInformation->room_no = $patientDoctorsOrderInformation->room_no;
        $patientDoctorsOrderInformation->date_of_birth = $patientDoctorsOrderInformation->date_of_birth;
        $patientDoctorsOrderInformation->gender = $patientDoctorsOrderInformation->gender;
        $patientDoctorsOrderInformation->allergies = $patientDoctorsOrderInformation->allergies;
        $patientDoctorsOrderInformation->attending_physician_first_name = $patientDoctorsOrderInformation->attending_physician_first_name;
        $patientDoctorsOrderInformation->attending_physician_middle_name = $patientDoctorsOrderInformation->attending_physician_middle_name;
        $patientDoctorsOrderInformation->attending_physician_last_name = $patientDoctorsOrderInformation->attending_physician_last_name;
        $patientDoctorsOrderInformation->patient_id = $patientDoctorsOrderInformation->patient_id;
        $patientDoctorsOrderInformation->doctors_order_date = Carbon::parse($request->doctors_order_date)->format('Y-m-d H:i:s');
        $patientDoctorsOrderInformation->progress_note = $request->progress_note;
        $patientDoctorsOrderInformation->doctors_order = $request->doctors_order;
        $patientDoctorsOrderInformation->user_id = $patientDoctorsOrderInformation->user_id;
        $patientDoctorsOrderInformation->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => 'Doctor\'s order updated successfully.',
            'success'           => true,
        ], 200);
    }
}
