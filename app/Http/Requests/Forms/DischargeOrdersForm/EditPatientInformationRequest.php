<?php

namespace App\Http\Requests\Forms\DischargeOrdersForm;

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
            'patient_first_name'                    => 'required',
            'patient_middle_name'                   => 'required',
            'patient_last_name'                     => 'required',
            'room'                                  => 'required',
            'case_no'                               => 'required',
            'date_of_birth'                         => 'required',
            'sex'                                   => 'required',
            'medications'                           => 'required',
            'follow_up_at'                          => 'required',
            'follow_up_address'                     => 'required',
            'laboratory_request'                    => 'required',
            'laboratory_results_for_follow_up'      => 'required',
            'advised'                               => 'required',
            'attending_physician_first_name'        => 'required',
            'attending_physician_middle_name'       => 'required',
            'attending_physician_last_name'         => 'required',
        ];
    }
}
