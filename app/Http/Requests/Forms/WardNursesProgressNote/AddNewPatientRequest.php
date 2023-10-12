<?php

namespace App\Http\Requests\Forms\WardNursesProgressNote;

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
            'patient_first_name'                => 'required',
            'patient_last_name'                 => 'required',
            'patient_id'                        => 'required|unique:ward_nurses_progress_notes,patient_id',
        ];
    }
}