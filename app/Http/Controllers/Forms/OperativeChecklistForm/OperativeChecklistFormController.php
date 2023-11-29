<?php

namespace App\Http\Controllers\Forms\OperativeChecklistForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\OperativeChecklistForm\EditpatientInformationRequest;
use App\Http\Requests\Forms\OperativeChecklistForm\AddNewPatientRequest;
use App\Http\Requests\Forms\OperativeChecklistForm\EditNewPatientRequest;
use App\Models\OperativeChecklistForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OperativeChecklistFormController extends Controller
{
    public function index(Request $request)
    {
        $data = OperativeChecklistForm::orderBy('id', 'DESC');

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

            return view('forms.operative_checklist_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.operative_checklist_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.operative_checklist_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {

        $data = $request->all();
        $data['anorexia'] = $request->anorexia ? true : false;

        $data['operative_cl_6_npo_date_time'] = Carbon::parse($request->operative_cl_6_npo_date_time)->format('Y-m-d H:i:s');
        $data['operative_cl_24_date_time'] = Carbon::parse($request->operative_cl_24_date_time)->format('Y-m-d H:i:s');
        $data['operative_cl_25_time_patient_rcvd_in_or'] = Carbon::parse($request->operative_cl_25_time_patient_rcvd_in_or)->format('Y-m-d H:i:s');

        $data['operative_cl_16_time'] = Carbon::parse($request->operative_cl_16_time)->format('Y-m-d H:i:s');
        $data['operative_cl_17_voided_time'] = Carbon::parse($request->operative_cl_17_voided_time)->format('Y-m-d H:i:s');
        $data['operative_cl_21_time_given'] = Carbon::parse($request->operative_cl_21_time_given)->format('Y-m-d H:i:s');
        
        $data['user_id'] = auth()->user()->id;

        OperativeChecklistForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientOperativeCheckListForm = OperativeChecklistForm::findOrFail($id);

        return view('forms.operative_checklist_form.show', compact('patientOperativeCheckListForm'));
    }

    public function edit($id)
    {
        $patientOperativeCheckListForm = OperativeChecklistForm::findOrFail($id);

        return view('forms.operative_checklist_form.edit', compact('patientOperativeCheckListForm'));
    }

    public function update($id, EditNewPatientRequest $request)
    {
        $data = $request->all();
        $data['anorexia'] = $request->anorexia ? true : false;


        $data['operative_cl_6_npo_date_time'] = Carbon::parse($request->operative_cl_6_npo_date_time)->format('Y-m-d H:i:s');
        $data['operative_cl_24_date_time'] = Carbon::parse($request->operative_cl_24_date_time)->format('Y-m-d H:i:s');
        $data['operative_cl_25_time_patient_rcvd_in_or'] = Carbon::parse($request->operative_cl_25_time_patient_rcvd_in_or)->format('Y-m-d H:i:s');

        $data['operative_cl_16_time'] = Carbon::parse($request->operative_cl_16_time)->format('Y-m-d H:i:s');
        $data['operative_cl_17_voided_time'] = Carbon::parse($request->operative_cl_17_voided_time)->format('Y-m-d H:i:s');
        $data['operative_cl_21_time_given'] = Carbon::parse($request->operative_cl_21_time_given)->format('Y-m-d H:i:s');
        OperativeChecklistForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = OperativeChecklistForm::find($request->id);

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
