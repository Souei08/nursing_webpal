<?php

namespace App\Http\Requests\Forms\FluidBalanceSheetForm;

use Illuminate\Foundation\Http\FormRequest;

class EditNewPatientRequest extends FormRequest
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
            'patient_first_name'               => 'required',
            'patient_last_name'                => 'required',
        ];
    }
}
