<?php

namespace App\Http\Requests\Forms\ReferralForm;

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
            'patient_first_name'                => 'required',
            'patient_middle_name'               => 'required',
            'patient_last_name'                 => 'required',
            'address'                           => 'required',
            'date_of_birth'                     => 'required',
            'sex'                               => 'required',
            'patient_no'                        => 'required',
            'problem_referred'                  => 'required',
            'for'                               => 'required',
            'referred_to'                       => 'required',
            'referrer_first_name'               => 'required',
            'referrer_middle_name'              => 'required',
            'referrer_last_name'                => 'required',
            'referrer_relationship_to_patient'  => 'required',
            'subjective_findings'               => 'required',
            'objective_findings'                => 'required',
            'assessment'                        => 'required',
            'plan'                              => 'required',
            'consultant_first_name'             => 'required',
            'consultant_middle_name'            => 'required',
            'consultant_last_name'              => 'required',
            'consulted_at'                      => 'required',
        ];
    }
}
