<?php

namespace App\Http\Controllers\Forms\InformedConsentSurgeryForm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformedConsentSurgeryFormController extends Controller
{
    public function show()
    {
        return view('forms.informed_consent_sugery_form.show');
    }
}
