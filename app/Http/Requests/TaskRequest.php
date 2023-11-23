<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'subject_code_id' => 'required',
            'category' => 'required',
            'title' => 'required',
            'deadline' => 'required',
            'file'      => 'required',
            'file.*'      => 'required',
            // 'instructions' => 'required',
            // 'scenario' => 'required',
        ];
    }
}
