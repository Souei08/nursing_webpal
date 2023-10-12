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
            <form action="{{ route('discharge_clinical_summary_form.store') }}" method="POST" data-ajax="true">
                @csrf

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'patient_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'patient_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
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

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Hospital No.',
                                'name' => 'hospital_no',
                                'type' => 'number',
                                'value' => '',
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
                                'label' => 'Attending Pysician First Name',
                                'name' => 'attending_physician_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Pysician Middle Name',
                                'name' => 'attending_physician_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Pysician Last Name',
                                'name' => 'attending_physician_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date Admitted',
                                'name' => 'date_admitted',
                                'type' => 'date',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date Discharged',
                                'name' => 'date_discharged',
                                'type' => 'date',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Chief Complaint',
                                'name' => 'chief_complaint',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Brief Clinical Summary',
                                'name' => 'brief_clinical_summary',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Physician Examination',
                                'name' => 'physician_examination',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'BP',
                                'name' => 'bp',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'CR',
                                'name' => 'cr',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'RR',
                                'name' => 'rr',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Temp',
                                'name' => 'temp',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Abdomen',
                                'name' => 'abdomen',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'HEENT',
                                'name' => 'heent',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'GU(IE)',
                                'name' => 'gu',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Chest/Lungs',
                                'name' => 'chest_lungs',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Skin Extremities',
                                'name' => 'skin_extremities',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'CVS',
                                'name' => 'cvs',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'CNS',
                                'name' => 'cns',
                                'type' => 'string',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Laboratory Findings',
                                'name' => 'laboratory_findings',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Treatment Course',
                                'name' => 'treatment_course',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Final Diagnosis',
                                'name' => 'final_diagnosis',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Recommendation',
                                'name' => 'recommendation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.select', [
                                'label' => 'Disposition of Discharge',
                                'name' => 'disposition_discharge',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Improved',
                                        'value' => 'Improved',
                                    ],
                                    [
                                        'name' => 'Transferred',
                                        'value' => 'Transferred',
                                    ],
                                    [
                                        'name' => 'HAMA',
                                        'value' => 'HAMA',
                                    ],
                                    [
                                        'name' => 'Absconded',
                                        'value' => 'Absconded',
                                    ],
                                    [
                                        'name' => 'Expired',
                                        'value' => 'Expired',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Resident In-Charge First Name',
                                'name' => 'resident_incharge_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Resident In-Charge Middle Name',
                                'name' => 'resident_incharge_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Resident In-Charge Last Name',
                                'name' => 'resident_incharge_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date Accomplished',
                                'name' => 'date_accomplished',
                                'type' => 'datetime-local',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('discharge_clinical_summary_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
