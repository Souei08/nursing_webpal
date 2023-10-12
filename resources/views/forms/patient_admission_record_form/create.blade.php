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
                        <h5 class="mb-0">Add New Patient</h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('patient_admission_record_form.store') }}" method="POST" data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Admission No.',
                                'name' => 'admission_no',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient ID No.',
                                'name' => 'patient_id_no',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'M.R Locator.',
                                'name' => 'm_r_locator',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Room No.',
                                'name' => 'room_no',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'patient_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'patient_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient Suffix Name',
                                'name' => 'patient_suffix_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.select', [
                                'label' => 'Civil Status',
                                'name' => 'civil_status',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Single',
                                        'value' => 'Single',
                                    ],
                                    [
                                        'name' => 'Married',
                                        'value' => 'Married',
                                    ],
                                    [
                                        'name' => 'Divorced',
                                        'value' => 'Divorced',
                                    ],
                                    [
                                        'name' => 'Widowed',
                                        'value' => 'Widowed',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Nationality',
                                'name' => 'nationality',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 'patient_tel_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.select', [
                                'label' => 'Sex',
                                'name' => 'sex',
                                'value' => '',
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

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Address',
                                'name' => 'address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Birth Place',
                                'name' => 'birth_place',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Religion',
                                'name' => 'religion',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Occupation',
                                'name' => 'patient_occupation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Company',
                                'name' => 'patient_company',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Company Address',
                                'name' => 'patient_occupation_address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 'patient_company_tel',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Father',
                                'name' => 'father',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Occupation',
                                'name' => 'f_occupation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Company Address',
                                'name' => 'f_occupation_address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 'f_tel_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Mother',
                                'name' => 'mother',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Occupation',
                                'name' => 'm_occupation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Company Address',
                                'name' => 'm_occupation_address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 'm_tel_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Spouse',
                                'name' => 'spouse',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Occupation',
                                'name' => 's_occupation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Company Address',
                                'name' => 's_occupation_address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 's_tel_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'In Case of Emergency',
                                'name' => 'in_case_of_emergency_fullname',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Address',
                                'name' => 'e_address',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Relation to Patient',
                                'name' => 'relation_to_patient',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Tel No.',
                                'name' => 'e_tel_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Admitting Check/Nurse',
                                'name' => 'admitting_check_nurse',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.textarea', [
                                'label' => 'Hospitalization Plan',
                                'name' => 'hospitalization_plan',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.textarea', [
                                'label' => 'Service Type',
                                'name' => 'service_type',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician First Name',
                                'name' => 'attending_physician_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Middle Name',
                                'name' => 'attending_physician_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Last Name',
                                'name' => 'attending_physician_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Admission Date and Time',
                                'name' => 'admission_date_time',
                                'type' => 'datetime-local',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Discharge Date and Time',
                                'name' => 'discharge_date_time',
                                'type' => 'datetime-local',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Signature over Printed Name',
                                'name' => 'guardian_fullname',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Relationship',
                                'name' => 'guardian_relationship',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Impression/Provisional Diagnosis',
                                'name' => 'provisional_diagnosis',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Final/Discharge Diagnosis',
                                'name' => 'discharge_diagnosis',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Procedure/Operations',
                                'name' => 'operations',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.select', [
                                'label' => 'Disposition',
                                'name' => 'disposition',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Discharge',
                                        'value' => 'Discharge',
                                    ],
                                    [
                                        'name' => 'Transferred',
                                        'value' => 'Transferred',
                                    ],
                                    [
                                        'name' => 'Recovered/Improved',
                                        'value' => 'Recovered/Improved',
                                    ],
                                    [
                                        'name' => 'Home Against Medical Advice',
                                        'value' => 'Home Against Medical Advice',
                                    ],
                                    [
                                        'name' => 'Absconded',
                                        'value' => 'Absconded',
                                    ],
                                    [
                                        'name' => 'Unimproved',
                                        'value' => 'Unimproved',
                                    ],
                                    [
                                        'name' => 'Expired',
                                        'value' => 'Expired',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.select', [
                                'label' => 'Results',
                                'name' => 'result',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Recovered',
                                        'value' => 'Recovered',
                                    ],
                                    [
                                        'name' => 'Improved',
                                        'value' => 'Improved',
                                    ],
                                    [
                                        'name' => 'Unimproved',
                                        'value' => 'Unimproved',
                                    ],
                                    [
                                        'name' => 'Died',
                                        'value' => 'Died',
                                    ],
                                    [
                                        'name' => 'Autopsied',
                                        'value' => 'Autopsied',
                                    ],
                                    [
                                        'name' => 'Not Autopsied',
                                        'value' => 'Not Autopsied',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Resident On Duty',
                                'name' => 'resident_on_duty',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('patient_admission_record_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
