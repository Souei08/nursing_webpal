<?php

namespace App\Http\Requests\Forms\PatientAdmissionRecordForm;

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
            'patient_first_name'                        => 'required',
            'patient_last_name'                         => 'required',
            'admission_no'                              => 'required',
            'patient_id_no'                             => 'required',
            'm_r_locator'                               => 'required',
            'room_no'                                   => 'required',
            'civil_status'                              => 'required',
            'nationality'                               => 'required',
            'patient_tel_no'                            => 'required',
            'sex'                                       => 'required',
            'address'                                   => 'required',
            'birth_place'                               => 'required',
            'date_of_birth'                             => 'required',
            'religion'                                  => 'required',

            'attending_physician_first_name'            => 'required',
            'attending_physician_last_name'             => 'required',
            'admission_date_time'                       => 'required',
            'discharge_date_time'                       => 'required',

            'provisional_diagnosis'                     => 'required',
            'discharge_diagnosis'                       => 'required',
            'operations'                                => 'required',

            'disposition'                               => 'required',
            'result'                                    => 'required',
            'resident_on_duty'                          => 'required',
        ];
    }
}
