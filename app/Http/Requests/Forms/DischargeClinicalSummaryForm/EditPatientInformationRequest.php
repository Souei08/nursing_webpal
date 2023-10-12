<?php

namespace App\Http\Requests\Forms\DischargeClinicalSummaryForm;

use Illuminate\Foundation\Http\FormRequest;

class EditPatientInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'patient_first_name' => 'required',
            'patient_last_name' => 'required',

            'date_of_birth' => 'required',
            'sex' => 'required',

            'hospital_no' => 'required',
            'address' => 'required',

            'attending_physician_first_name' => 'required',
            'attending_physician_middle_name' => 'required',
            'attending_physician_last_name' => 'required',

            'date_admitted' => 'required',
            'date_discharged' => 'required',

            'chief_complaint' => 'required',
            'brief_clinical_summary' => 'required',
            'physician_examination' => 'required',

            'bp' => 'required',
            'cr' => 'required',
            'rr' => 'required',
            'temp' => 'required',
            'abdomen' => 'required',
            'heent' => 'required',
            'gu' => 'required',
            'chest_lungs' => 'required',
            'skin_extremities' => 'required',
            'cvs' => 'required',
            'cns' => 'required',

            'laboratory_findings' => 'required',
            'treatment_course' => 'required',
            'final_diagnosis' => 'required',
            'recommendation' => 'required',
            'disposition_discharge' => 'required',

            'resident_incharge_first_name' => 'required',
            'resident_incharge_middle_name' => 'required',
            'resident_incharge_last_name' => 'required',

            'date_accomplished'
        ];
    }
}
