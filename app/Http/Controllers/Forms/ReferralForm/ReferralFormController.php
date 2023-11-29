<?php

namespace App\Http\Controllers\Forms\ReferralForm;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\SubjectCode;
use App\Models\ReferralForm;
use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Http\Requests\Forms\ReferralForm\AddNewPatientRequest;
use App\Http\Requests\Forms\ReferralForm\EditPatientInformationRequest;

class ReferralFormController extends Controller
{
    public function index(Request $request)
    {
        $data = ReferralForm::orderBy('id', 'DESC');

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

            return view('forms.referral_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.referral_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.referral_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {

        $data = $request->all();
        $data['consulted_at'] = Carbon::parse($request->consulted_at)->format('Y-m-d H:i:s');
        $data['created_by'] = auth()->user()->id;

        ReferralForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }


    public function show($id)
    {
        $patientReferralForm = ReferralForm::findOrFail($id);

        return view('forms.referral_form.show', compact('patientReferralForm'));
    }

    public function edit($id)
    {
        $patientReferralForm = ReferralForm::findOrFail($id);

        return view('forms.referral_form.edit', compact('patientReferralForm'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        $data['consulted_at'] = Carbon::parse($request->consulted_at)->format('Y-m-d H:i:s');
        ReferralForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = ReferralForm::find($request->id);

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
