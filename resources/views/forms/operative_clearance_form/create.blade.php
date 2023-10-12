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
            <form action="{{ route('operative_clearance_form.store') }}" method="POST" data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">
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
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Room',
                                'name' => 'room_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Date of Surgery',
                                'name' => 'date_of_surgery',
                                'type' => 'date',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
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

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Case No',
                                'name' => 'case_no',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician First Name',
                                'name' => 'attending_physician_fname',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Middle Name',
                                'name' => 'attending_physician_mname',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Last Name',
                                'name' => 'attending_physician_lname',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Working Diagnosis',
                                'name' => 'working_diagnosis',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Surgery Contemplated',
                                'name' => 'surgery_contemplated',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Anesthesia Contemplated',
                                'name' => 'anesthesia_contemplated',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Tentative Schedule',
                                'name' => 'tentative_sched',
                                'type' => 'datetime-local',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'History',
                                'name' => 'history',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Smoking',
                                'name' => 'smoking',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Alcohol Intake',
                                'name' => 'alcohol_intake',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Allergies',
                                'name' => 'allergies',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Previous Hospitalization',
                                'name' => 'prev_hospitalization',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Previous Operation',
                                'name' => 'prev_operation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Recent Medication Intake',
                                'name' => 'recent_med_intake',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            <b>Review of Systems</b>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">General</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_general"
                                            name="normal_general" value="true">
                                        <label class="form-check-label" for="normal_general">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_general',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_general',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Skin</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_skin" name="normal_skin"
                                            value="true">
                                        <label class="form-check-label" for="normal_skin">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_skin',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_skin',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">EENT</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_eent" name="normal_eent"
                                            value="true">
                                        <label class="form-check-label" for="normal_eent">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_eent',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_eent',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <p class="px-3">Respiratory</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_respiratory"
                                            name="normal_respiratory" value="true">
                                        <label class="form-check-label" for="normal_respiratory">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_respiratory',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_respiratory',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Cardiovascular</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_cardio"
                                            name="normal_cardio" value="true">
                                        <label class="form-check-label" for="normal_cardio">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_cardio',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_cardio',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Gastrointestinal</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_gastro"
                                            name="normal_gastro" value="true">
                                        <label class="form-check-label" for="normal_gastro">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_gastro',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_gastro',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Renal & Urinary</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_renal"
                                            name="normal_renal" value="true">
                                        <label class="form-check-label" for="normal_renal">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_renal',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_renal',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Gynecological</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_gyne"
                                            name="normal_gyne" value="true">
                                        <label class="form-check-label" for="normal_gyne">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_gyne',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_gyne',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Male Genitalia</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_male"
                                            name="normal_male" value="true">
                                        <label class="form-check-label" for="normal_male">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_male',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_male',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Musculoskeletal</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_musculo"
                                            name="normal_musculo" value="true">
                                        <label class="form-check-label" for="normal_musculo">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_musculo',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_musculo',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Hematological</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_hematological"
                                            name="normal_hematological" value="true">
                                        <label class="form-check-label" for="normal_hematological">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_hematological',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_hematological',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Endocrine & Matabolic</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_endocrine"
                                            name="normal_endocrine" value="true">
                                        <label class="form-check-label" for="normal_endocrine">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_endocrine',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_endocrine',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <p class="px-3">Nervous System</p>

                            <div class="row px-5">
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="normal_nervous"
                                            name="normal_nervous" value="true">
                                        <label class="form-check-label" for="normal_nervous">
                                            Normal
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    @include('generate.input', [
                                        'id' => 'abnormal_nervous',
                                        'label' => 'Abnormal',
                                        'name' => 'abnormal_nervous',
                                        'value' => '',
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <p>PHYSICAL EXAMINATION</p>
                        <p> Vital Signs:</p>
                        <div class="col-sm-2 mt-3">
                            @include('generate.input', [
                                'label' => 'BP',
                                'id' => 'bp',
                                'name' => 'bp',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2 mt-3">
                            @include('generate.input', [
                                'label' => 'CR',
                                'name' => 'cr',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2 mt-3">
                            @include('generate.input', [
                                'label' => 'RR',
                                'name' => 'rr',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2 mt-3">
                            @include('generate.input', [
                                'label' => 'Temp',
                                'name' => 'temp',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Skin',
                                'name' => 'skin',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'HEENT',
                                'name' => 'heent',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Neck',
                                'name' => 'neck',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Chest/Lungs',
                                'name' => 'chest_lungs',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Heart',
                                'name' => 'heart',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Abdomen',
                                'name' => 'abdomen',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Musculoskeletal',
                                'name' => 'musculoskeletal',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Neurological',
                                'name' => 'neurological',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <p>LABORATORY / IMAGING DATA</p>
                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Chest X-Ray',
                                'name' => 'chest_xray',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'ECG',
                                'name' => 'ecg',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => '2D Echo',
                                'name' => 'echo',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'CBC',
                                'name' => 'cbc',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Urinalysis',
                                'name' => 'urinalysis',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'FBS',
                                'name' => 'fbs',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Creatinine',
                                'name' => 'creatinine',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'SGPT',
                                'name' => 'sgpt',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Protime',
                                'name' => 'protime',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'APTT',
                                'name' => 'aptt',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Bleeding Time',
                                'name' => 'bleeding_time',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <label>
                            <b>RAPID PRE - OPERATIVE ASSESSMENT:</b>
                        </label>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>High Risk Surgery:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="high_risk_surgery"
                                    id="high_risk__surgery_yes" value="Yes">
                                <label class="form-check-label" for="high_risk_surgery_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="high_risk_surgery"
                                    id="high_risk_surgery_no" value="No">
                                <label class="form-check-label" for="high_risk_surgery_no">No</label>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>Presence of Coronary Artery Disease:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="coronary_artery_disease_presence"
                                    id="coronary_artery_disease_presence_yes" value="Yes">
                                <label class="form-check-label" for="coronary_artery_disease_presence_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="coronary_artery_disease_presence"
                                    id="coronary_artery_disease_presence_no" value="No">
                                <label class="form-check-label" for="coronary_artery_disease_presence_no">No</label>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>Presence of Congestion Heart Failure:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="congestion_heart_failure_presence"
                                    id="congestion_heart_failure_presence_yes" value="Yes">
                                <label class="form-check-label" for="congestion_heart_failure_presence_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="congestion_heart_failure_presence"
                                    id="congestion_heart_failure_presence_no" value="No">
                                <label class="form-check-label" for="congestion_heart_failure_presence_no">No</label>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>Cerebrovascular Disease:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cerebrovascular_disease"
                                    id="cerebrovascular_disease_yes" value="Yes">
                                <label class="form-check-label" for="cerebrovascular_disease_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cerebrovascular_disease"
                                    id="cerebrovascular_disease_no" value="No">
                                <label class="form-check-label" for="cerebrovascular_disease_no">No</label>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>Diabetes Mellitus or Insulin:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diabetes_mellitus_insulin"
                                    id="diabetes_mellitus_insulin_yes" value="Yes">
                                <label class="form-check-label" for="diabetes_mellitus_insulin_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="diabetes_mellitus_insulin"
                                    id="diabetes_mellitus_insulin_no" value="No">
                                <label class="form-check-label" for="diabetes_mellitus_insulin_no">No</label>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <p>Serum Creatinine > 2mg/dl or >177 mol/L:</p>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="serum_creatinine"
                                    id="serum_creatinine_yes" value="Yes">
                                <label class="form-check-label" for="serum_creatinine_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="serum_creatinine"
                                    id="serum_creatinine_no" value="No">
                                <label class="form-check-label" for="serum_creatinine_no">No</label>
                            </div>
                        </div>

                       
                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Assessment/Suggestion/Recommendation:',
                                'name' => 'assessment_suggestion_recommendation',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Medical Consultant First Name',
                                'name' => 'medical_consultant_first_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Medical Consultan Middle Name',
                                'name' => 'medical_consultant_middle_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Medical Consultant Last Name',
                                'name' => 'medical_consultant_last_name',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>


                    <div class="card-footer bg-white py-3">
                        <div class="d-flex justify-content-end align-items-center">
                            <a class="btn btn-dark me-2" href="{{ route('operative_clearance_form.index') }}">Cancel</a>
                            <button class="btn btn-primary me-2" type="submit">Save</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {



            $('#normal_general').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_general").prop("disabled", true);
                } else {
                    $("#abnormal_general").prop("disabled", false);
                }
            });

            $('#abnormal_general').on('input', function(e) {
                if ($('#abnormal_general').val().length > 0) {
                    $("#normal_general").prop("disabled", true);
                } else {
                    $("#normal_general").prop("disabled", false);
                }
            });

            $('#normal_skin').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_skin").prop("disabled", true);
                } else {
                    $("#abnormal_skin").prop("disabled", false);
                }
            });

            $('#abnormal_skin').on('input', function(e) {
                if ($('#abnormal_skin').val().length > 0) {
                    $("#normal_skin").prop("disabled", true);
                } else {
                    $("#normal_skin").prop("disabled", false);
                }
            });

            $('#normal_eent').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_eent").prop("disabled", true);
                } else {
                    $("#abnormal_eent").prop("disabled", false);
                }
            });

            $('#abnormal_eent').on('input', function(e) {
                if ($('#abnormal_eent').val().length > 0) {
                    $("#normal_eent").prop("disabled", true);
                } else {
                    $("#normal_eent").prop("disabled", false);
                }
            });

            $('#normal_respiratory').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_respiratory").prop("disabled", true);
                } else {
                    $("#abnormal_respiratory").prop("disabled", false);
                }
            });

            $('#abnormal_respiratory').on('input', function(e) {
                if ($('#abnormal_respiratory').val().length > 0) {
                    $("#normal_respiratory").prop("disabled", true);
                } else {
                    $("#normal_respiratory").prop("disabled", false);
                }
            });

            $('#normal_cardio').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_cardio").prop("disabled", true);
                } else {
                    $("#abnormal_cardio").prop("disabled", false);
                }
            });

            $('#abnormal_cardio').on('input', function(e) {
                if ($('#abnormal_cardio').val().length > 0) {
                    $("#normal_cardio").prop("disabled", true);
                } else {
                    $("#normal_cardio").prop("disabled", false);
                }
            });

            $('#normal_gastro').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_gastro").prop("disabled", true);
                } else {
                    $("#abnormal_gastro").prop("disabled", false);
                }
            });

            $('#abnormal_gastro').on('input', function(e) {
                if ($('#abnormal_gastro').val().length > 0) {
                    $("#normal_gastro").prop("disabled", true);
                } else {
                    $("#normal_gastro").prop("disabled", false);
                }
            });

            $('#normal_renal').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_renal").prop("disabled", true);
                } else {
                    $("#abnormal_renal").prop("disabled", false);
                }
            });

            $('#abnormal_renal').on('input', function(e) {
                if ($('#abnormal_renal').val().length > 0) {
                    $("#normal_renal").prop("disabled", true);
                } else {
                    $("#normal_renal").prop("disabled", false);
                }
            });

            $('#normal_gyne').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_gyne").prop("disabled", true);
                } else {
                    $("#abnormal_gyne").prop("disabled", false);
                }
            });

            $('#abnormal_gyne').on('input', function(e) {
                if ($('#abnormal_gyne').val().length > 0) {
                    $("#normal_gyne").prop("disabled", true);
                } else {
                    $("#normal_gyne").prop("disabled", false);
                }
            });

            $('#normal_male').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_male").prop("disabled", true);
                } else {
                    $("#abnormal_male").prop("disabled", false);
                }
            });

            $('#abnormal_male').on('input', function(e) {
                if ($('#abnormal_male').val().length > 0) {
                    $("#normal_male").prop("disabled", true);
                } else {
                    $("#normal_male").prop("disabled", false);
                }
            });

            $('#normal_musculo').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_musculo").prop("disabled", true);
                } else {
                    $("#abnormal_musculo").prop("disabled", false);
                }
            });

            $('#abnormal_musculo').on('input', function(e) {
                if ($('#abnormal_musculo').val().length > 0) {
                    $("#normal_musculo").prop("disabled", true);
                } else {
                    $("#normal_musculo").prop("disabled", false);
                }
            });

            $('#normal_hematological').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_hematological").prop("disabled", true);
                } else {
                    $("#abnormal_hematological").prop("disabled", false);
                }
            });

            $('#abnormal_hematological').on('input', function(e) {
                if ($('#abnormal_hematological').val().length > 0) {
                    $("#normal_hematological").prop("disabled", true);
                } else {
                    $("#normal_hematological").prop("disabled", false);
                }
            });

            $('#normal_endocrine').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_endocrine").prop("disabled", true);
                } else {
                    $("#abnormal_endocrine").prop("disabled", false);
                }
            });

            $('#abnormal_endocrine').on('input', function(e) {
                if ($('#abnormal_endocrine').val().length > 0) {
                    $("#normal_endocrine").prop("disabled", true);
                } else {
                    $("#normal_endocrine").prop("disabled", false);
                }
            });

            $('#normal_nervous').click(function() {
                if ($(this).is(':checked')) {
                    $("#abnormal_nervous").prop("disabled", true);
                } else {
                    $("#abnormal_nervous").prop("disabled", false);
                }
            });

            $('#abnormal_nervous').on('input', function(e) {
                if ($('#abnormal_nervous').val().length > 0) {
                    $("#normal_nervous").prop("disabled", true);
                } else {
                    $("#normal_nervous").prop("disabled", false);
                }
            });


            










        });
    </script>
@endsection
