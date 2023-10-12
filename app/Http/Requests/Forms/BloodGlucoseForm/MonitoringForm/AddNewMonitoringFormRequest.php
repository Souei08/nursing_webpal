<?php

namespace App\Http\Requests\Forms\BloodGlucoseForm\MonitoringForm;

use Illuminate\Foundation\Http\FormRequest;

class AddNewMonitoringFormRequest extends FormRequest
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
            'referred_to'       => 'required',
            'insulin_given'     => 'required',
            'administered_by'   => 'required',
            'remarks'           => 'required',
            'date_time'         => 'required',
            'hgt'               => 'required',
        ];
    }
}
