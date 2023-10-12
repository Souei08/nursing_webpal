@extends('layouts.dashboard')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Edit Patient Information</h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('referral_form.update', $patientReferralForm->id) }}" method="POST" data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'patient_first_name',
                                'value' => $patientReferralForm->patient_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'patient_middle_name',
                                'value' => $patientReferralForm->patient_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
                                'value' => $patientReferralForm->patient_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Address',
                                'name' => 'address',
                                'value' => $patientReferralForm->address,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.select', [
                                'label' => 'Sex',
                                'name' => 'sex',
                                'value' => $patientReferralForm->sex,
                                'options' => [
                                    [
                                        'name' => 'Male',
                                        'value' => 'Male',
                                    ],
                                    [
                                        'name' => 'Female',
                                        'value' => 'Female',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
                                'value' => $patientReferralForm->date_of_birth,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient No.',
                                'name' => 'patient_no',
                                'type' => 'number',
                                'value' => $patientReferralForm->patient_no,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Problem Referred',
                                'name' => 'problem_referred',
                                'value' => $patientReferralForm->problem_referred,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.select', [
                                'label' => 'For',
                                'name' => 'for',
                                'value' => $patientReferralForm->for,
                                'options' => [
                                    [
                                        'name' => 'Referral',
                                        'value' => 'Referral',
                                    ],
                                    [
                                        'name' => 'Co-management',
                                        'value' => 'Co-management',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.select', [
                                'label' => 'Referred to',
                                'name' => 'referred_to',
                                'value' => $patientReferralForm->referred_to,
                                'options' => [
                                    [
                                        'name' => 'Consent for Referral',
                                        'value' => 'Consent for Referral',
                                    ],
                                    [
                                        'name' => 'Refused Referral',
                                        'value' => 'Refused Referral',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Referrer First Name',
                                'name' => 'referrer_first_name',
                                'value' => $patientReferralForm->referrer_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Referrer Middle Name',
                                'name' => 'referrer_middle_name',
                                'value' => $patientReferralForm->referrer_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Referrer Last Name',
                                'name' => 'referrer_last_name',
                                'value' => $patientReferralForm->referrer_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Relationship to Patient',
                                'name' => 'referrer_relationship_to_patient',
                                'value' => $patientReferralForm->referrer_relationship_to_patient,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date of Consultation',
                                'name' => 'consulted_at',
                                'type' => 'datetime-local',
                                'value' => $patientReferralForm->consulted_at,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Subjective Findings',
                                'name' => 'subjective_findings',
                                'value' => $patientReferralForm->subjective_findings,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Objective Findings',
                                'name' => 'objective_findings',
                                'value' => $patientReferralForm->objective_findings,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Assessment',
                                'name' => 'assessment',
                                'value' => $patientReferralForm->assessment,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Plan',
                                'name' => 'plan',
                                'value' => $patientReferralForm->plan,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Consultant First Name',
                                'name' => 'consultant_first_name',
                                'value' => $patientReferralForm->consultant_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Consultant Middle Name',
                                'name' => 'consultant_middle_name',
                                'value' => $patientReferralForm->consultant_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Consultant Last Name',
                                'name' => 'consultant_last_name',
                                'value' => $patientReferralForm->consultant_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('referral_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

