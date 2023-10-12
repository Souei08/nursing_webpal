<?php

namespace Database\Seeders;

use App\Models\Form;
use Illuminate\Database\Seeder;

class FormsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Form::create(['title' => 'Patient Admission Record']);
        Form::create(['title' => 'Admitting Medical History']);
        Form::create(['title' => 'Informed Consent for Admission']);
        Form::create(['title' => 'Informed Consent for Treatment']);
        Form::create(['title' => 'Informed consent for surgery']);
        Form::create(['title' => 'Referral Form']);
        Form::create(['title' => 'Clinical Summary']);
        Form::create(['title' => 'Pre- operative clearance form']);
        Form::create(['title' => 'Pre - Operative Checklist']);
        Form::create(['title' => 'Fluid Balance Sheet']);
        Form::create(['title' => 'Vital Sign']);
        Form::create(['title' => 'Doctors Order']);
        Form::create(['title' => 'IV flowsheet']);
        Form::create(['title' => 'Blood Glucose and Insulin']);
        Form::create(['title' => 'Medication Sheet']);
        Form::create(['title' => 'Nurses Notes']);
        Form::create(['title' => 'Discharge/Home Meds']);
        Form::create(['title' => 'Discharge Orders']);
        Form::create(['title' => 'Discharge/Clinical Summary']);
        Form::create(['title' => 'Vital Signs Sheet']);


    }
}
