<?php

namespace App\Http\Controllers\Forms\InformedConsentAdmissionForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformedConsentAdmissionFormController extends Controller
{
    public function show()
    {
        return view('forms.informed_consent_admission_form.show');
    }
}
