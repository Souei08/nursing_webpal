<?php

namespace App\Http\Requests\Forms\AdmittingMedicalHistoryForm;

use Illuminate\Foundation\Http\FormRequest;

class EditpatientInformationRequest extends FormRequest
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
            'patient_last_name'         => 'required',
            'patient_first_name'        => 'required',
            'sex'                       => 'required',
            'date_of_birth'             => 'required',
            'admission_date_time'       => 'required',
        ];
    }
}
