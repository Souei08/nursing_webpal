<?php

namespace App\Http\Controllers\Forms\FluidBalanceSheetForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\FluidBalanceSheetForm\AddNewPatientRequest;
use App\Http\Requests\Forms\FluidBalanceSheetForm\EditNewPatientRequest;
use App\Models\FluidBalanceSheetForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FluidBalanceSheetFormController extends Controller
{
    public function index(Request $request)
    {
        $data = FluidBalanceSheetForm::orderBy('id', 'DESC')->groupBy('patient_id');

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

            return view('forms.fluid_balance_sheet_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.fluid_balance_sheet_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }
    public function create()
    {
        return view('forms.fluid_balance_sheet_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        FluidBalanceSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($id);
        $fluidBalanceSheetFormListFirstShift = FluidBalanceSheetForm::where('patient_id', $fluidBalanceSheetForm->patient_id)->get();
        $fluidBalanceSheetFormListSecondShift = FluidBalanceSheetForm::where('patient_id', $fluidBalanceSheetForm->patient_id)->get();
        $fluidBalanceSheetFormListThirdShift = FluidBalanceSheetForm::where('patient_id', $fluidBalanceSheetForm->patient_id)->get();

        return view('forms.fluid_balance_sheet_form.show', compact(['fluidBalanceSheetForm', 'fluidBalanceSheetFormListFirstShift', 'fluidBalanceSheetFormListSecondShift', 'fluidBalanceSheetFormListThirdShift']));
    }

    public function edit($id)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($id);

        return view('forms.fluid_balance_sheet_form.edit', compact('fluidBalanceSheetForm'));
    }

    public function update($id, EditNewPatientRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = auth()->user()->id;

        FluidBalanceSheetForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = FluidBalanceSheetForm::find($request->id);

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




    public function addNewFirstShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $data['patient_first_name'] = $fluidBalanceSheetForm->patient_first_name;
        $data['patient_middle_name'] = $fluidBalanceSheetForm->patient_middle_name;
        $data['patient_last_name'] = $fluidBalanceSheetForm->patient_last_name;

        $data['date_of_birth'] = $fluidBalanceSheetForm->date_of_birth;

        $data['allergies'] = $fluidBalanceSheetForm->allergies;
        $data['gender'] = $fluidBalanceSheetForm->gender;
        $data['room_no'] = $fluidBalanceSheetForm->room_no;

        $data['attending_physician_first_name'] = $fluidBalanceSheetForm->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $fluidBalanceSheetForm->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $fluidBalanceSheetForm->attending_physician_last_name;

        $data['patient_id'] = $fluidBalanceSheetForm->patient_id;

        $data['first_shift_ivf_one'] = $request->first_shift_ivf_one;
        $data['first_shift_ivf_two'] = $request->first_shift_ivf_two;
        $data['first_shift_intake_others'] = $request->first_shift_intake_others;
        $data['first_shift_blood'] = $request->first_shift_blood;
        $data['first_shift_tpn'] = $request->first_shift_tpn;
        $data['first_shift_tube'] = $request->first_shift_tube;
        $data['first_shift_oral'] = $request->first_shift_oral;
        $data['first_shift_urine'] = $request->first_shift_urine;
        $data['first_shift_drain'] = $request->first_shift_drain;
        $data['first_shift_stool'] = $request->first_shift_stool;
        $data['first_shift_output_others'] = $request->first_shift_output_others;
        $data['first_shift_total'] = $request->first_shift_total;
        $data['first_shift_nod'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;


        $data['user_id'] = $fluidBalanceSheetForm->user_id;


        FluidBalanceSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New 6-2 shift added successfully.',
            'success' => true,
        ], 200);
    }

    public function editFirstShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $fluidBalanceSheetForm->first_shift_ivf_one = $request->first_shift_ivf_one;
        $fluidBalanceSheetForm->first_shift_ivf_two = $request->first_shift_ivf_two;
        $fluidBalanceSheetForm->first_shift_intake_others = $request->first_shift_intake_others;
        $fluidBalanceSheetForm->first_shift_blood = $request->first_shift_blood;
        $fluidBalanceSheetForm->first_shift_tpn = $request->first_shift_tpn;
        $fluidBalanceSheetForm->first_shift_tube = $request->first_shift_tube;
        $fluidBalanceSheetForm->first_shift_oral = $request->first_shift_oral;
        $fluidBalanceSheetForm->first_shift_urine = $request->first_shift_urine;
        $fluidBalanceSheetForm->first_shift_drain = $request->first_shift_drain;
        $fluidBalanceSheetForm->first_shift_stool = $request->first_shift_stool;
        $fluidBalanceSheetForm->first_shift_output_others = $request->first_shift_output_others;
        $fluidBalanceSheetForm->first_shift_total = $request->first_shift_total;
        $fluidBalanceSheetForm->first_shift_nod = $request->first_shift_nod;

        $fluidBalanceSheetForm->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => '6-2 shift edited successfully.',
            'success'           => true,
        ], 200);
    }






    public function addNewSecondShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $data['patient_first_name'] = $fluidBalanceSheetForm->patient_first_name;
        $data['patient_middle_name'] = $fluidBalanceSheetForm->patient_middle_name;
        $data['patient_last_name'] = $fluidBalanceSheetForm->patient_last_name;

        $data['date_of_birth'] = $fluidBalanceSheetForm->date_of_birth;

        $data['allergies'] = $fluidBalanceSheetForm->allergies;
        $data['gender'] = $fluidBalanceSheetForm->gender;
        $data['room_no'] = $fluidBalanceSheetForm->room_no;

        $data['attending_physician_first_name'] = $fluidBalanceSheetForm->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $fluidBalanceSheetForm->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $fluidBalanceSheetForm->attending_physician_last_name;

        $data['patient_id'] = $fluidBalanceSheetForm->patient_id;

        $data['second_shift_ivf_one'] = $request->second_shift_ivf_one;
        $data['second_shift_ivf_two'] = $request->second_shift_ivf_two;
        $data['second_shift_intake_others'] = $request->second_shift_intake_others;
        $data['second_shift_blood'] = $request->second_shift_blood;
        $data['second_shift_tpn'] = $request->second_shift_tpn;
        $data['second_shift_tube'] = $request->second_shift_tube;
        $data['second_shift_oral'] = $request->second_shift_oral;
        $data['second_shift_urine'] = $request->second_shift_urine;
        $data['second_shift_drain'] = $request->second_shift_drain;
        $data['second_shift_stool'] = $request->second_shift_stool;
        $data['second_shift_output_others'] = $request->second_shift_output_others;
        $data['second_shift_total'] = $request->second_shift_total;
        $data['second_shift_nod'] = Auth::user()->second_name . ' ' . Auth::user()->last_name;


        $data['user_id'] = $fluidBalanceSheetForm->user_id;


        FluidBalanceSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New 2-10 shift added successfully.',
            'success' => true,
        ], 200);
    }

    public function editSecondShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $fluidBalanceSheetForm->second_shift_ivf_one = $request->second_shift_ivf_one;
        $fluidBalanceSheetForm->second_shift_ivf_two = $request->second_shift_ivf_two;
        $fluidBalanceSheetForm->second_shift_intake_others = $request->second_shift_intake_others;
        $fluidBalanceSheetForm->second_shift_blood = $request->second_shift_blood;
        $fluidBalanceSheetForm->second_shift_tpn = $request->second_shift_tpn;
        $fluidBalanceSheetForm->second_shift_tube = $request->second_shift_tube;
        $fluidBalanceSheetForm->second_shift_oral = $request->second_shift_oral;
        $fluidBalanceSheetForm->second_shift_urine = $request->second_shift_urine;
        $fluidBalanceSheetForm->second_shift_drain = $request->second_shift_drain;
        $fluidBalanceSheetForm->second_shift_stool = $request->second_shift_stool;
        $fluidBalanceSheetForm->second_shift_output_others = $request->second_shift_output_others;
        $fluidBalanceSheetForm->second_shift_total = $request->second_shift_total;
        $fluidBalanceSheetForm->second_shift_nod = $request->second_shift_nod;

        $fluidBalanceSheetForm->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => '2-10 shift edited successfully.',
            'success'           => true,
        ], 200);
    }

    public function addNewThirdShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $data['patient_first_name'] = $fluidBalanceSheetForm->patient_first_name;
        $data['patient_middle_name'] = $fluidBalanceSheetForm->patient_middle_name;
        $data['patient_last_name'] = $fluidBalanceSheetForm->patient_last_name;

        $data['date_of_birth'] = $fluidBalanceSheetForm->date_of_birth;

        $data['allergies'] = $fluidBalanceSheetForm->allergies;
        $data['gender'] = $fluidBalanceSheetForm->gender;
        $data['room_no'] = $fluidBalanceSheetForm->room_no;

        $data['attending_physician_first_name'] = $fluidBalanceSheetForm->attending_physician_first_name;
        $data['attending_physician_middle_name'] = $fluidBalanceSheetForm->attending_physician_middle_name;
        $data['attending_physician_last_name'] = $fluidBalanceSheetForm->attending_physician_last_name;

        $data['patient_id'] = $fluidBalanceSheetForm->patient_id;

        $data['third_shift_ivf_one'] = $request->third_shift_ivf_one;
        $data['third_shift_ivf_two'] = $request->third_shift_ivf_two;
        $data['third_shift_intake_others'] = $request->third_shift_intake_others;
        $data['third_shift_blood'] = $request->third_shift_blood;
        $data['third_shift_tpn'] = $request->third_shift_tpn;
        $data['third_shift_tube'] = $request->third_shift_tube;
        $data['third_shift_oral'] = $request->third_shift_oral;
        $data['third_shift_urine'] = $request->third_shift_urine;
        $data['third_shift_drain'] = $request->third_shift_drain;
        $data['third_shift_stool'] = $request->third_shift_stool;
        $data['third_shift_output_others'] = $request->third_shift_output_others;
        $data['third_shift_total'] = $request->third_shift_total;
        $data['third_shift_nod'] = Auth::user()->first_name . ' ' . Auth::user()->last_name;


        $data['user_id'] = $fluidBalanceSheetForm->user_id;


        FluidBalanceSheetForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'New 10-6 shift added successfully.',
            'success' => true,
        ], 200);
    }

    public function editThirdShift(Request $request)
    {
        $fluidBalanceSheetForm = FluidBalanceSheetForm::findOrFail($request->id);

        $fluidBalanceSheetForm->third_shift_ivf_one = $request->third_shift_ivf_one;
        $fluidBalanceSheetForm->third_shift_ivf_two = $request->third_shift_ivf_two;
        $fluidBalanceSheetForm->third_shift_intake_others = $request->third_shift_intake_others;
        $fluidBalanceSheetForm->third_shift_blood = $request->third_shift_blood;
        $fluidBalanceSheetForm->third_shift_tpn = $request->third_shift_tpn;
        $fluidBalanceSheetForm->third_shift_tube = $request->third_shift_tube;
        $fluidBalanceSheetForm->third_shift_oral = $request->third_shift_oral;
        $fluidBalanceSheetForm->third_shift_urine = $request->third_shift_urine;
        $fluidBalanceSheetForm->third_shift_drain = $request->third_shift_drain;
        $fluidBalanceSheetForm->third_shift_stool = $request->third_shift_stool;
        $fluidBalanceSheetForm->third_shift_output_others = $request->third_shift_output_others;
        $fluidBalanceSheetForm->third_shift_total = $request->third_shift_total;
        $fluidBalanceSheetForm->third_shift_nod = $request->third_shift_nod;

        $fluidBalanceSheetForm->save();

        return response()->json([
            'redirect_url'      => redirect()->back()->getTargetUrl(),
            'message'           => '10-6 shift edited successfully.',
            'success'           => true,
        ], 200);
    }
}
