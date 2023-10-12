<?php

namespace App\Http\Requests\Forms\BloodGlucoseForm;

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
            'room_no'                           => 'required',
            'date_of_birth'                     => 'required',
            'gender'                            => 'required',
            'allergies'                         => 'required',
            'attending_physician_first_name'    => 'required',
            'attending_physician_middle_name'   => 'required',
            'attending_physician_last_name'     => 'required',
            'patient_id'                        => 'required',
        ];
    }
}
