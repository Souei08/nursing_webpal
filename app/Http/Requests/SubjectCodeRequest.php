<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectCodeRequest extends FormRequest
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
            'name' => "required|max:255|unique:subject_codes,name,{$this->id}",
            'description' => 'required',
            'start_year' => 'required|integer|lt:end_year',
            'end_year' => 'required|integer|gt:start_year',
            'term' => 'required|integer',
            'semester' => 'required|integer',
        ];
    }
}
