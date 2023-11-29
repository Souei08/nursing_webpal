<?php

namespace App\Http\Controllers\Forms\AdmittingMedicalHistoryForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\AdmittingMedicalHistoryForm\AddNewPatientRequest;
use App\Http\Requests\Forms\AdmittingMedicalHistoryForm\EditpatientInformationRequest;
use App\Models\AdmittingMedicalHistoryForm;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdmittingMedicalHistoryFormController extends Controller
{
    public function index(Request $request)
    {
        $data = AdmittingMedicalHistoryForm::orderBy('id', 'DESC');

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

            return view('forms.admitting_medical_history_form.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.admitting_medical_history_form.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.admitting_medical_history_form.create');
    }

    public function store(AddNewPatientRequest $request)
    {

        $data = $request->all();


        $data['general_survey'] = $request->general_survey == 'Awake and alert' ? $request->general_survey : $request->generay_survey_textarea;

        $data['altered_mental_sensorium'] = $request->altered_mental_sensorium ? true : false;
        $data['abdominal_cramp_pain'] = $request->abdominal_cramp_pain ? true : false;
        $data['anorexia'] = $request->anorexia ? true : false;
        $data['bleeding_gums'] = $request->bleeding_gums ? true : false;
        $data['body_weakness'] = $request->body_weakness ? true : false;
        $data['vision_blurring'] = $request->vision_blurring ? true : false;
        $data['chestpain_discomfort'] = $request->chestpain_discomfort ? true : false;
        $data['constipation'] = $request->constipation ? true : false;
        $data['cough'] = $request->cough ? true : false;
        $data['diarrhea'] = $request->diarrhea ? true : false;
        $data['dizziness'] = $request->dizziness ? true : false;
        $data['dysphagia'] = $request->dysphagia ? true : false;
        $data['dyspnea'] = $request->dyspnea ? true : false;
        $data['dysuria'] = $request->dysuria ? true : false;
        $data['epistaxis'] = $request->epistaxis ? true : false;
        $data['fever'] = $request->fever ? true : false;
        $data['urination_frequency'] = $request->urination_frequency ? true : false;
        $data['headache'] = $request->headache ? true : false;
        $data['hematemesis'] = $request->hematemesis ? true : false;
        $data['hematuria'] = $request->hematuria ? true : false;
        $data['hemoptysis'] = $request->hemoptysis ? true : false;
        $data['irritability'] = $request->irritability ? true : false;
        $data['jaundice'] = $request->jaundice ? true : false;
        $data['lower_extremity_edema'] = $request->lower_extremity_edema ? true : false;
        $data['myalgia'] = $request->myalgia ? true : false;
        $data['orthopnea'] = $request->orthopnea ? true : false;
        $data['pain'] = $request->pain ? true : false;
        $data['palpitations'] = $request->palpitations ? true : false;
        $data['seizures'] = $request->seizures ? true : false;
        $data['skin_rashes'] = $request->skin_rashes ? true : false;
        $data['stool_bloodyblack_tarrymucoid'] = $request->stool_bloodyblack_tarrymucoid ? true : false;
        $data['sweating'] = $request->sweating ? true : false;
        $data['urgency'] = $request->urgency ? true : false;
        $data['vomiting'] = $request->vomiting ? true : false;
        $data['weight_loss'] = $request->weight_loss ? true : false;
        $data['symptoms_others'] = $request->symptoms_others ? true : false;
        $data['admission_date_time'] = Carbon::parse($request->admission_date_time)->format('Y-m-d H:i:s');

        $data['total_score'] = $request->eyes_open + $request->best_verbal_response + $request->best_motor_response;
        
        $data['user_id'] = auth()->user()->id;


        AdmittingMedicalHistoryForm::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $patientAdmittingMedicalHistoryFormForm = AdmittingMedicalHistoryForm::findOrFail($id);

        return view('forms.admitting_medical_history_form.show', compact('patientAdmittingMedicalHistoryFormForm'));
    }

    public function edit($id)
    {
        $patientAdmittingMedicalHistoryForm = AdmittingMedicalHistoryForm::findOrFail($id);

        return view('forms.admitting_medical_history_form.edit', compact('patientAdmittingMedicalHistoryForm'));
    }

    public function update($id, EditpatientInformationRequest $request)
    {
        $data = $request->all();

        $data['general_survey'] = $request->general_survey == 'Awake and alert' ? $request->general_survey : $request->generay_survey_textarea;
        $data['altered_mental_sensorium'] = $request->altered_mental_sensorium ? true : false;
        $data['abdominal_cramp_pain'] = $request->abdominal_cramp_pain ? true : false;
        $data['anorexia'] = $request->anorexia ? true : false;
        $data['bleeding_gums'] = $request->bleeding_gums ? true : false;
        $data['body_weakness'] = $request->body_weakness ? true : false;
        $data['vision_blurring'] = $request->vision_blurring ? true : false;
        $data['chestpain_discomfort'] = $request->chestpain_discomfort ? true : false;
        $data['constipation'] = $request->constipation ? true : false;
        $data['cough'] = $request->cough ? true : false;
        $data['diarrhea'] = $request->diarrhea ? true : false;
        $data['dizziness'] = $request->dizziness ? true : false;
        $data['dysphagia'] = $request->dysphagia ? true : false;
        $data['dyspnea'] = $request->dyspnea ? true : false;
        $data['dysuria'] = $request->dysuria ? true : false;
        $data['epistaxis'] = $request->epistaxis ? true : false;
        $data['fever'] = $request->fever ? true : false;
        $data['urination_frequency'] = $request->urination_frequency ? true : false;
        $data['headache'] = $request->headache ? true : false;
        $data['hematemesis'] = $request->hematemesis ? true : false;
        $data['hematuria'] = $request->hematuria ? true : false;
        $data['hemoptysis'] = $request->hemoptysis ? true : false;
        $data['irritability'] = $request->irritability ? true : false;
        $data['jaundice'] = $request->jaundice ? true : false;
        $data['lower_extremity_edema'] = $request->lower_extremity_edema ? true : false;
        $data['myalgia'] = $request->myalgia ? true : false;
        $data['orthopnea'] = $request->orthopnea ? true : false;
        $data['pain'] = $request->pain ? true : false;
        $data['palpitations'] = $request->palpitations ? true : false;
        $data['seizures'] = $request->seizures ? true : false;
        $data['skin_rashes'] = $request->skin_rashes ? true : false;
        $data['stool_bloodyblack_tarrymucoid'] = $request->stool_bloodyblack_tarrymucoid ? true : false;
        $data['sweating'] = $request->sweating ? true : false;
        $data['urgency'] = $request->urgency ? true : false;
        $data['vomiting'] = $request->vomiting ? true : false;
        $data['weight_loss'] = $request->weight_loss ? true : false;
        $data['symptoms_others'] = $request->symptoms_others ? true : false;
        $data['admission_date_time'] = Carbon::parse($request->admission_date_time)->format('Y-m-d H:i:s');

        $data['total_score'] = $request->eyes_open + $request->best_verbal_response + $request->best_motor_response;

        AdmittingMedicalHistoryForm::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = AdmittingMedicalHistoryForm::find($request->id);

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
