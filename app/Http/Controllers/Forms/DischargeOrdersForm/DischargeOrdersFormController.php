<?php

namespace App\Http\Controllers\Forms\DischargeOrdersForm;

use Carbon\Carbon;
use App\Models\SubjectCode;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\DischargeOrders;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\DischargeOrdersForm\AddNewPatientRequest;
use App\Http\Requests\Forms\DischargeOrdersForm\EditPatientInformationRequest;

class DischargeOrdersFormController extends Controller
{
    public function index(Request $request)
    {
        $data = DischargeOrders::orderBy('id', 'DESC');

        // $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();
        $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->pluck('id')->toArray();

        if (auth()->user()->role->slug === 'teacher') {

            $students = StudentProfile::whereIn('subject_code_id', $subjectCodes)->get()->pluck('user_id');
            $students[count($students) + 1] = auth()->user()->id;
            $data->whereIn('created_by', $students);
        } elseif (auth()->user()->role->slug === 'student') {
            $data->where(['created_by' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('patient_first_name', 'like', '%' . $request->search . '%');

            return view('forms.discharge_orders_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.discharge_orders_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.discharge_orders_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();

        $data['may_go_home'] = $request->may_go_home ? true : false;
        $data['home_against_advice'] = $request->home_against_advice ? true : false;
        $data['follow_up_at'] = Carbon::parse($request->follow_up_at)->format('Y-m-d H:i:s');
        $data['created_by'] = auth()->user()->id;


        // foreach ($data as $key => $value) {
        //     error_log($key . ': ' . $value);
        // }

        DischargeOrders::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientDischargeOrdersForm = DischargeOrders::findOrFail($id);

        return view('forms.discharge_orders_form.show', compact('patientDischargeOrdersForm'));
    }

    public function edit($id)
    {
        $patientDischargeOrdersForm = DischargeOrders::findOrFail($id);

        return view('forms.discharge_orders_form.edit', compact('patientDischargeOrdersForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        $data['may_go_home'] = $request->may_go_home ? true : false;
        $data['home_against_advice'] = $request->home_against_advice ? true : false;
        $data['follow_up_at'] = Carbon::parse($request->follow_up_at)->format('Y-m-d H:i:s');
        DischargeOrders::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = DischargeOrders::find($request->id);

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
