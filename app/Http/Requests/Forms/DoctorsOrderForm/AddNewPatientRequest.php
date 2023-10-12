<?php

namespace App\Http\Requests\Forms\DoctorsOrderForm;

use Illuminate\Foundation\Http\FormRequest;

class AddNewPatientRequest extends FormRequest
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
            'first_name'                        => 'required',
            'last_name'                         => 'required',
            'patient_id'                        => 'required|unique:doctors_order_forms,patient_id',
   
        ];
    }
}
