<?php

namespace App\Http\Controllers\Forms\InformedConsentTreatmentForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformedConsentTreatmentFormController extends Controller
{
    public function show()
    {
        return view('forms.informed_consent_treatment_form.show');
    }
}
