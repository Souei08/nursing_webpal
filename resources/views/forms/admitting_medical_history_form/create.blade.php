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
            <form action="{{ route('admitting_medical_history_form.store') }}" method="POST" data-ajax="true">

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
                                'label' => 'Admission Date & Time',
                                'name' => 'admission_date_time',
                                'type' => 'datetime-local',
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
                            <label for="hci">
                                Referred from another health care institution (HCI)
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="referred_from_hci"
                                    id="referred_from_hci_yes" value="yes">
                                <label class="form-check-label" for="referred_from_hci_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input referred_from_hci" type="radio" name="referred_from_hci"
                                    id="referred_from_hci_no" value="no" checked>
                                <label class="form-check-label" for="referred_from_hci_no">No</label>
                            </div>


                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Yes, Specify Reason',
                                'id' => 'yes_reason',
                                'name' => 'yes_reason',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Name of Originating HCI',
                                'id' => 'originating_hci_name',
                                'name' => 'originating_hci_name',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'History of Present Illness',
                                'name' => 'present_illness_history',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Pertinent Past Medical History',
                                'name' => 'pertinent_past_medical_history',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-1">
                            @include('generate.input', [
                                'label' => 'G',
                                'name' => 'g',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-1">
                            @include('generate.input', [
                                'label' => 'P',
                                'name' => 'p',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-1">
                            @include('generate.input', [
                                'label' => 'LMP',
                                'name' => 'lmp',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Allergies',
                                'name' => 'allergies',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Smoker',
                                'name' => 'smoker',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Alcohol Drinks',
                                'name' => 'alcohol_drinks',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            <p>Pertinent Signs and Symptoms on Admission (tick applicable box/es):</p>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="alteredMentalSensorium"
                                            name="altered_mental_sensorium" value="true">
                                        <label class="form-check-label" for="alteredMentalSensorium">
                                            Altered mental sensorium
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="abdominalCrampPain"
                                            name="abdominal_cramp_pain" value="true">
                                        <label class="form-check-label" for="abdominalCrampPain">
                                            Abdominal cramp/pain
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="anorexia" name="anorexia"
                                            value="true">
                                        <label class="form-check-label" for="anorexia">
                                            Anorexia
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bleedingGums"
                                            name="bleeding_gums" value="true">
                                        <label class="form-check-label" for="bleedingGums">
                                            Bleeding gums
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="bodyWeakness"
                                            name="body_weakness" value="true">
                                        <label class="form-check-label" for="bodyWeakness">
                                            Body weakness
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="visionBlurring"
                                            name="vision_blurring" value="true">
                                        <label class="form-check-label" for="visionBlurring">
                                            Blurring of vision
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="chestpainDiscomfort"
                                            name="chestpain_discomfort" value="true">
                                        <label class="form-check-label" for="chestpainDiscomfort">
                                            Chest pain/discomfort
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="constipation"
                                            name="constipation" value="true">
                                        <label class="form-check-label" for="constipation">
                                            Constipation
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="cough" name="cough"
                                            value="true">
                                        <label class="form-check-label" for="cough">
                                            Cough
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="diarrhea" name="diarrhea"
                                            value="true">
                                        <label class="form-check-label" for="diarrhea">Diarrhea</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dizziness" name="dizziness"
                                            value="true">
                                        <label class="form-check-label" for="dizziness">Dizziness</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dysphagia" name="dysphagia"
                                            value="true">
                                        <label class="form-check-label" for="dysphagia">Dysphagia</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dyspnea" name="dyspnea"
                                            value="true">
                                        <label class="form-check-label" for="dyspnea">Dyspnea</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dysuria" name="dysuria"
                                            value="true">
                                        <label class="form-check-label" for="dysuria">Dysuria</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="epistaxis" name="epistaxis"
                                            value="true">
                                        <label class="form-check-label" for="epistaxis">Epistaxis</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="fever" name="fever"
                                            value="true">
                                        <label class="form-check-label" for="fever">Fever</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="urinationFrequency"
                                            name="urination_frequency" value="true">
                                        <label class="form-check-label" for="urinationFrequency">Frequency of
                                            urination</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="headache" name="headache"
                                            value="true">
                                        <label class="form-check-label" for="headache">Headache</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hematemesis"
                                            name="hematemesis" value="true">
                                        <label class="form-check-label" for="hematemesis">Hematemesis</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hematuria" name="hematuria"
                                            value="true">
                                        <label class="form-check-label" for="hematuria">Hematuria</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="hemoptysis"
                                            name="hemoptysis" value="true">
                                        <label class="form-check-label" for="hemoptysis">Hemoptysis</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="irritability"
                                            name="irritability" value="true">
                                        <label class="form-check-label" for="irritability">Irritability</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="jaundice" name="jaundice"
                                            value="true">
                                        <label class="form-check-label" for="jaundice">Jaundice</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="lowerExtremityEdema"
                                            name="lower_extremity_edema" value="true">
                                        <label class="form-check-label" for="lowerExtremityEdema">Lower extremity
                                            edema</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="myalgia" name="myalgia"
                                            value="true">
                                        <label class="form-check-label" for="myalgia">Myalgia</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="orthopnea" name="orthopnea"
                                            value="true">
                                        <label class="form-check-label" for="orthopnea">Orthopnea</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pain" name="pain"
                                            value="true">
                                        <label class="form-check-label" for="pain">Pain</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="palpitations"
                                            name="palpitations" value="true">
                                        <label class="form-check-label" for="palpitations">Palpitations</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="seizures" name="seizures"
                                            value="true">
                                        <label class="form-check-label" for="seizures">Seizures</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="skinRashes"
                                            name="skin_rashes" value="true">
                                        <label class="form-check-label" for="skinRashes">Skin rashes</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="stoolBloodyblackTarrymucoid"
                                            name="stool_bloodyblack_tarrymucoid" value="true">
                                        <label class="form-check-label" for="stoolBloodyblackTarrymucoid">Stool,
                                            bloody/black
                                            tarry/mucoid</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="sweating" name="sweating"
                                            value="true">
                                        <label class="form-check-label" for="sweating">Sweating</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="urgency" name="urgency"
                                            value="true">
                                        <label class="form-check-label" for="urgency">Urgency</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="vomiting" name="vomiting"
                                            value="true">
                                        <label class="form-check-label" for="vomiting">Vomiting</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="weightLoss"
                                            name="weight_loss" value="true">
                                        <label class="form-check-label" for="weightLoss">Weight loss</label>
                                    </div>

                                    <input type="text" class="form-control form-control-sm" name="symptoms_others"
                                        placeholder="others">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-12 mt-2">
                            <label>
                                <b>General Survey:</b>
                            </label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="general_survey"
                                    id="general_survey_awake_and_alert" value="Awake and alert">
                                <label class="form-check-label" for="general_survey_awake_and_alert">Awake and
                                    alert</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="general_survey"
                                    id="general_survey_altered_sensorium" value="Altered sensorium">
                                <label class="form-check-label" for="general_survey_altered_sensorium">Altered
                                    sensorium</label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <textarea class="form-control" id="altered_sensorium_textarea" name="generay_survey_textarea" rows="2"></textarea>
                        </div>

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
                                'label' => 'HR',
                                'name' => 'hr',
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

                        <div class="col-sm-2 mt-3">
                            @include('generate.input', [
                                'label' => '02 Sat %',
                                'name' => 'sat',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-1 mt-3">
                            @include('generate.input', [
                                'label' => 'Height',
                                'name' => 'height',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-1 mt-3">
                            @include('generate.input', [
                                'label' => 'Weight',
                                'name' => 'weight',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'HEENT',
                                'id' => 'heent',
                                'name' => 'heent',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Icteric sclerae',
                                        'value' => 'Icteric sclerae',
                                    ],
                                    [
                                        'name' => 'Abnormal pupillary reaction',
                                        'value' => 'Abnormal pupillary reaction',
                                    ],
                                    [
                                        'name' => 'Pale conjuctivae',
                                        'value' => 'Pale conjuctivae',
                                    ],
                                    [
                                        'name' => 'Cervical lymphadenopathy',
                                        'value' => 'Cervical lymphadenopathy',
                                    ],
                                    [
                                        'name' => 'Sunken eyeball',
                                        'value' => 'Sunken eyeball',
                                    ],
                                    [
                                        'name' => 'Dry mucous membrane',
                                        'value' => 'Dry mucous membrane',
                                    ],
                                    [
                                        'name' => 'Sunken fontanelle',
                                        'value' => 'Sunken fontanelle',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'heent_others',
                                'name' => 'heent_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])



                            {{-- <label>
                                <b>HEENT</b>
                            </label>
                            <br> --}}

                            {{-- <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal" name="heent"
                                    value="true">
                                <label class="form-check-label" for="essNormal">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="icteric" name="heent"
                                    value="true">
                                <label class="form-check-label" for="icteric">Icteric sclerae</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pupillary" name="heent"
                                    value="true">
                                <label class="form-check-label" for="pupillary">Abnormal pupillary reaction</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pale" name="heent"
                                    value="true">
                                <label class="form-check-label" for="pale">Pale conjuctivae</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="lymphadenopathy" name="heent"
                                    value="true">
                                <label class="form-check-label" for="lymphadenopathy">Cervical lymphadenopathy</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="sunken" name="heent"
                                    value="true">
                                <label class="form-check-label" for="sunken">Sunken eyeball</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="dry" name="heent"
                                    value="true">
                                <label class="form-check-label" for="dry">Dry mucous membrane</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="fontanelle" name="heent"
                                    value="true">
                                <label class="form-check-label" for="fontanelle">Sunken fontanelle</label>
                            </div> --}}
                            {{-- <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="heent_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'CHEST/LUNGS',
                                'id' => 'chest_lungs',
                                'name' => 'chest_lungs',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Lump/s over breasts',
                                        'value' => 'Lump/s over breasts',
                                    ],
                                    [
                                        'name' => 'Asymmetrical chest expansion',
                                        'value' => 'Asymmetrical chest expansion',
                                    ],
                                    [
                                        'name' => 'Rales/crackles/rhonchi',
                                        'value' => 'Rales/crackles/rhonchi',
                                    ],
                                    [
                                        'name' => 'Decreased breath sounds',
                                        'value' => 'Decreased breath sounds',
                                    ],
                                    [
                                        'name' => 'Intercostal rib/clavicular retraction',
                                        'value' => 'Intercostal rib/clavicular retraction',
                                    ],
                                    [
                                        'name' => 'Wheezes',
                                        'value' => 'Wheezes',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'chest_lungs_others',
                                'name' => 'chest_lungs_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])

                            {{-- <label>
                                <b>CHEST/LUNGS</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal1" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="essNormal1">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="lumpBreast" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="lumpBreast">Lump/s over breasts</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="asymmetric" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="asymmetric">Asymmetrical chest expansion</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="rales" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="rales">Rales/crackles/rhonchi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="decreased" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="decreased">Decreased breath sounds</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="intercostal" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="intercostal">Intercostal rib/clavicular
                                    retraction</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="wheezes" name="chest_lungs"
                                    value="true">
                                <label class="form-check-label" for="wheezes">Wheezes</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="chest_lungs_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'CVS',
                                'id' => 'cvs',
                                'name' => 'cvs',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Irregular rhythm',
                                        'value' => 'Irregular rhythm',
                                    ],
                                    [
                                        'name' => 'Displaced apex beat',
                                        'value' => 'Displaced apex beat',
                                    ],
                                    [
                                        'name' => 'Muffled heart sounds',
                                        'value' => 'Muffled heart sounds',
                                    ],
                                    [
                                        'name' => 'Heaves and/or thrills',
                                        'value' => 'Heaves and/or thrills',
                                    ],
                                    [
                                        'name' => 'Murmur',
                                        'value' => 'Murmur',
                                    ],
                                    [
                                        'name' => 'Pericardial bulge',
                                        'value' => 'Pericardial bulge',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'cvs_others',
                                'name' => 'cvs_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])


                            {{-- <label>
                                <b>CVS</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal2" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="essNormal2">
                                    Essentially normal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="irregular" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="irregular">
                                    Irregular rhythm
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="displaced" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="displaced">
                                    Displaced apex beat
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="muffled" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="muffled">
                                    Muffled heart sounds
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="heaves" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="heaves">
                                    Heaves and/or thrills
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="murmur" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="murmur">Murmur</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pericardial" name="cvs"
                                    value="true">
                                <label class="form-check-label" for="pericardial">Pericardial bulge</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="cvs_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'ABDOMEN',
                                'id' => 'abdomen',
                                'name' => 'abdomen_others',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Palpable mass/es',
                                        'value' => 'Palpable mass/es',
                                    ],
                                    [
                                        'name' => 'Abdominal rigidity',
                                        'value' => 'Abdominal rigidity',
                                    ],
                                    [
                                        'name' => 'Tympanitic/dull abdomen',
                                        'value' => 'Tympanitic/dull abdomen',
                                    ],
                                    [
                                        'name' => 'Abdomen tenderness',
                                        'value' => 'Abdomen tenderness',
                                    ],
                                    [
                                        'name' => 'Uterine contraction',
                                        'value' => 'Uterine contraction',
                                    ],
                                    [
                                        'name' => 'Hyperactive bowel sounds',
                                        'value' => 'Hyperactive bowel sounds',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'abdomen_others',
                                'name' => 'abdomen_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])

                            {{-- <label>
                                <b>ABDOMEN</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal3" name="ess_normal_3"
                                    value="true">
                                <label class="form-check-label" for="essNormal3">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="palpable" name="palpable"
                                    value="true">
                                <label class="form-check-label" for="palpable">Palpable mass/es</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abdominal" name="abdominal"
                                    value="true">
                                <label class="form-check-label" for="abdominal">Abdominal rigidity</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="tympanitic" name="tympanitic"
                                    value="true">
                                <label class="form-check-label" for="tympanitic">Tympanitic/dull abdomen</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="tenderness" name="tenderness"
                                    value="true">
                                <label class="form-check-label" for="tenderness">Abdomen tenderness</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="uterine" name="uterine"
                                    value="true">
                                <label class="form-check-label" for="uterine">Uterine contraction</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="hyperactive" name="hyperactive"
                                    value="true">
                                <label class="form-check-label" for="hyperactive">Hyperactive bowel sounds</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="abdomen_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'SKIN/EXTREMITIES',
                                'id' => 'skin_extremities',
                                'name' => 'skin_extremities',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Edema/swelling',
                                        'value' => 'Edema/swelling',
                                    ],
                                    [
                                        'name' => 'Rashes/petechiae',
                                        'value' => 'Rashes/petechiae',
                                    ],
                                    [
                                        'name' => 'Clubbing',
                                        'value' => 'Clubbing',
                                    ],
                                    [
                                        'name' => 'Decreased mobility',
                                        'value' => 'Decreased mobility',
                                    ],
                                    [
                                        'name' => 'Weak pulses',
                                        'value' => 'Weak pulses',
                                    ],
                                    [
                                        'name' => 'Cold clammy skin',
                                        'value' => 'Cold clammy skin',
                                    ],
                                    [
                                        'name' => 'Pale nailbeds',
                                        'value' => 'Pale nailbeds',
                                    ],
                                    [
                                        'name' => 'Cyanosis/mottled skin',
                                        'value' => 'Cyanosis/mottled skin',
                                    ],
                                    [
                                        'name' => 'Poor skin turgor',
                                        'value' => 'Poor skin turgor',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'skin_extremities_others',
                                'name' => 'skin_extremities_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])

                            {{-- <label>
                                <b>SKIN/EXTREMITIES</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal5" name="ess_normal_5"
                                    value="true">
                                <label class="form-check-label" for="essNormal5">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="edema" name="edema"
                                    value="true">
                                <label class="form-check-label" for="edema">Edema/swelling</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="rashes" name="rashes"
                                    value="true">
                                <label class="form-check-label" for="rashes">Rashes/petechiae</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="clubbing" name="clubbing"
                                    value="true">
                                <label class="form-check-label" for="clubbing">Clubbing</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="mobility" name="mobility"
                                    value="true">
                                <label class="form-check-label" for="mobility">Decreased mobility</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="weakPulses" name="weak_pulses"
                                    value="true">
                                <label class="form-check-label" for="weakPulses">Weak pulses</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="clammySkin" name="clammy_skin"
                                    value="true">
                                <label class="form-check-label" for="clammySkin">Cold clammy skin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="paleNailbeds" name="pale_nailbeds"
                                    value="true">
                                <label class="form-check-label" for="paleNailbeds">Pale nailbeds</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="mottledSkin" name="mottled_skin"
                                    value="true">
                                <label class="form-check-label" for="mottledSkin">Cyanosis/mottled skin</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="poorSkin" name="poor_skin"
                                    value="true">
                                <label class="form-check-label" for="poorSkin">Poor skin turgor</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="skin_extremities_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">

                            @include('generate.select', [
                                'label' => 'NEURO-EXAM',
                                'id' => 'neuro_exam',
                                'name' => 'neuro_exam',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Abnormal reflex(es)',
                                        'value' => 'Abnormal reflex(es)',
                                    ],
                                    [
                                        'name' => 'Abnormal gait',
                                        'value' => 'Abnormal gait',
                                    ],
                                    [
                                        'name' => 'Poor/altered memory',
                                        'value' => 'Poor/altered memory',
                                    ],
                                    [
                                        'name' => 'Abnormal position sense',
                                        'value' => 'Abnormal position sense',
                                    ],
                                    [
                                        'name' => 'Poor muscle tone/strength',
                                        'value' => 'Poor muscle tone/strength',
                                    ],
                                    [
                                        'name' => 'Abnormal/decreased sensation',
                                        'value' => 'Abnormal/decreased sensation',
                                    ],
                                    [
                                        'name' => 'Poor coordination',
                                        'value' => 'Poor coordination',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'neuro_exam_others',
                                'name' => 'neuro_exam_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])

                            {{-- <label>
                                <b>NEURO-EXAM</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal6" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="essNormal6">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abReflexes" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="abReflexes">Abnormal reflex(es)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abGait" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="abGait">Abnormal gait</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="poorMemory" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="poorMemory">Poor/altered memory</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abSense" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="abSense">Abnormal position sense</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="poorMuscle" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="poorMuscle">Poor muscle tone/strength</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abSensation" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="abSensation">Abnormal/decreased sensation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="poorCondition" name="neuro_exam"
                                    value="true">
                                <label class="form-check-label" for="poorCondition">Poor coordination</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="neuro_exam_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-md-6 mt-3">
                            @include('generate.select', [
                                'label' => 'GU(IE)',
                                'id' => 'gu',
                                'name' => 'gu',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Blood stained in exam finger',
                                        'value' => 'Blood stained in exam finger',
                                    ],
                                    [
                                        'name' => 'Cervical dilatation',
                                        'value' => 'Cervical dilatation',
                                    ],
                                    [
                                        'name' => 'Presence of abnormal discharge',
                                        'value' => 'Presence of abnormal discharge',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'gu_others',
                                'name' => 'gu_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])

                            {{-- <label>
                                <b>GU(IE)</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal4" name="gu"
                                    value="awef">
                                <label class="form-check-label" for="essNormal4">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="bloodStained" name="blood_stained"
                                    value="trufeae">
                                <label class="form-check-label" for="bloodStained">Blood stained in exam finger</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="cervical" name="cervical"
                                    value="true">
                                <label class="form-check-label" for="cervical">Cervical dilatation</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="abDischarge" name="ab_discharge"
                                    value="true">
                                <label class="form-check-label" for="abDischarge">Presence of abnormal discharge</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="gu_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-6 mt-3">
                            @include('generate.select', [
                                'label' => 'DIGITAL RECTAL',
                                'id' => 'digital_rectal',
                                'name' => 'digital_rectal',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => 'Essentially normal',
                                        'value' => 'Essentially normal',
                                    ],
                                    [
                                        'name' => 'Enlarge Prostate',
                                        'value' => 'Enlarge Prostate',
                                    ],
                                    [
                                        'name' => 'Hemorrhoids',
                                        'value' => 'Hemorrhoids',
                                    ],
                                    [
                                        'name' => 'Mass',
                                        'value' => 'Mass',
                                    ],
                                    [
                                        'name' => 'Pus',
                                        'value' => 'Pus',
                                    ],
                                    [
                                        'name' => 'Others',
                                        'value' => 'Others',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])

                            @include('generate.input', [
                                'label' => 'Other',
                                'id' => 'digital_rectal_others',
                                'name' => 'digital_rectal_others',
                                'value' => '',
                                'disabled' => true,
                                'required' => true,
                                'formGroupClass' => 'mb-3',
                            ])


                            {{-- <label>
                                <b>DIGITAL RECTAL</b>
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="essNormal7" name="digital_rectal"
                                    value="true">
                                <label class="form-check-label" for="essNormal7">Essentially normal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="enlarge" name="digital_rectal"
                                    value="true">
                                <label class="form-check-label" for="enlarge">Enlarge Prostate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="hemorrhoids" name="digital_rectal"
                                    value="true">
                                <label class="form-check-label" for="hemorrhoids">Hemorrhoids</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="mass" name="digital_rectal"
                                    value="true">
                                <label class="form-check-label" for="mass">Mass</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="pus" name="digital_rectal"
                                    value="true">
                                <label class="form-check-label" for="pus">Pus</label>
                            </div>
                            <div class="form-check">
                                <input type="text" class="form-control form-control-sm" name="digital_rectal_others"
                                    placeholder="others">
                            </div> --}}
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'EYES OPEN',
                                'name' => 'eyes_open',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => '4 - Spontaneously',
                                        'value' => '4',
                                    ],
                                    [
                                        'name' => '3 - On Command',
                                        'value' => '3',
                                    ],
                                    [
                                        'name' => '2 - To Pain',
                                        'value' => '2',
                                    ],
                                    [
                                        'name' => '1 - No response',
                                        'value' => '1',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'BEST VERBAL RESPONSE',
                                'name' => 'best_verbal_response',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => '5 - Alert and Oriented',
                                        'value' => '5',
                                    ],
                                    [
                                        'name' => '4 - Confused',
                                        'value' => '4',
                                    ],
                                    [
                                        'name' => '3 - Inappropriate',
                                        'value' => '3',
                                    ],
                                    [
                                        'name' => '2 - Incomprehensible',
                                        'value' => '2',
                                    ],
                                    [
                                        'name' => '1 - No response',
                                        'value' => '1',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4 mt-3">
                            @include('generate.select', [
                                'label' => 'BEST MOTOR RESPONSE',
                                'name' => 'best_motor_response',
                                'name' => 'best_motor_response',
                                'value' => '',
                                'options' => [
                                    [
                                        'name' => '6 - Follow Directions',
                                        'value' => '6',
                                    ],
                                    [
                                        'name' => '5 - Localizes Pain',
                                        'value' => '5',
                                    ],
                                    [
                                        'name' => '4 - Withdraws from pain',
                                        'value' => '4',
                                    ],
                                    [
                                        'name' => '3 - Decorticate Posturing',
                                        'value' => '3',
                                    ],
                                    [
                                        'name' => '2 - Decerebrate Posturing',
                                        'value' => '2',
                                    ],
                                    [
                                        'name' => '1 - No response',
                                        'value' => '1',
                                    ],
                                ],
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Admitting Impression',
                                'name' => 'admitting_impression',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            <div class="d-flex justify-content-end align-items-center">
                                <a class="btn btn-dark me-2"
                                    href="{{ route('admitting_medical_history_form.index') }}">Cancel</a>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
@endsection


@section('javascript')
    <script>
        $(document).ready(function() {
            $("#altered_sensorium_textarea").hide();

            $('#referred_from_hci_yes').click(function() {
                if ($(this).is(':enabled')) {
                    $("#yes_reason").prop("disabled", false);
                    $("#originating_hci_name").prop("disabled", false);
                }
            });

            $('#referred_from_hci_no').click(function() {
                if ($(this).is(':enabled')) {
                    $("#yes_reason").prop("disabled", true);
                    $("#originating_hci_name").prop("disabled", true);
                }
            });

            $("#general_survey_awake_and_alert").click(function() {
                $("#altered_sensorium_textarea").hide();
            });

            $("#general_survey_altered_sensorium").click(function() {
                $("#altered_sensorium_textarea").show();
            });

            $('#heent').on('change', function() {
                if (this.value == 'Others') {
                    $("#heent_others").prop("disabled", false);
                } else {
                    $("#heent_others").prop("disabled", true);
                }
            });

            $('#chest_lungs').on('change', function() {
                if (this.value == 'Others') {
                    $("#chest_lungs_others").prop("disabled", false);
                } else {
                    $("#chest_lungs_others").prop("disabled", true);
                }
            });

            $('#cvs').on('change', function() {
                if (this.value == 'Others') {
                    $("#cvs_others").prop("disabled", false);
                } else {
                    $("#cvs_others").prop("disabled", true);
                }
            });

            $('#cvs').on('change', function() {
                if (this.value == 'Others') {
                    $("#cvs_others").prop("disabled", false);
                } else {
                    $("#cvs_others").prop("disabled", true);
                }
            });

            $('#abdomen').on('change', function() {
                if (this.value == 'Others') {
                    $("#abdomen_others").prop("disabled", false);
                } else {
                    $("#abdomen_others").prop("disabled", true);
                }
            });

            $('#skin_extremities').on('change', function() {
                if (this.value == 'Others') {
                    $("#skin_extremities_others").prop("disabled", false);
                } else {
                    $("#skin_extremities_others").prop("disabled", true);
                }
            });

            $('#neuro_exam').on('change', function() {
                if (this.value == 'Others') {
                    $("#neuro_exam_others").prop("disabled", false);
                } else {
                    $("#neuro_exam_others").prop("disabled", true);
                }
            });

            $('#gu').on('change', function() {
                if (this.value == 'Others') {
                    $("#gu_others").prop("disabled", false);
                } else {
                    $("#gu_others").prop("disabled", true);
                }
            });

            $('#digital_rectal').on('change', function() {
                if (this.value == 'Others') {
                    $("#digital_rectal_others").prop("disabled", false);
                } else {
                    $("#digital_rectal_others").prop("disabled", true);
                }
            });
        });
    </script>
@endsection
