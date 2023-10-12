<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'role_id' => 'required',
            'subject_code_id' => 'required|exists:App\Models\SubjectCode,name',
            'student_no' => 'required|max:255|unique:student_profiles',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|max:255|regex:/(.*)@umindanao\.edu\.ph/i|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required',
        ];
    }
}
