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
            <form action="{{ route('operative_checklist_form.update', $patientOperativeCheckListForm->id) }}" method="POST"
                data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'patient_first_name',
                                'value' => $patientOperativeCheckListForm->patient_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'patient_middle_name',
                                'value' => $patientOperativeCheckListForm->patient_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
                                'value' => $patientOperativeCheckListForm->patient_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.select', [
                                'label' => 'Sex',
                                'name' => 'sex',
                                'value' => $patientOperativeCheckListForm->sex,
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
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
                                'value' => $patientOperativeCheckListForm->date_of_birth,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Room No.',
                                'name' => 'room_no',
                                'type' => 'number',
                                'value' => $patientOperativeCheckListForm->room_no,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Case No.',
                                'name' => 'case_no',
                                'type' => 'number',
                                'value' => $patientOperativeCheckListForm->case_no,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician First Name',
                                'name' => 'attending_physician_first_name',
                                'value' => $patientOperativeCheckListForm->attending_physician_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Middle Name',
                                'name' => 'attending_physician_middle_name',
                                'value' => $patientOperativeCheckListForm->attending_physician_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physicia Last Name',
                                'name' => 'attending_physician_last_name',
                                'value' => $patientOperativeCheckListForm->attending_physician_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Surgeon First Name',
                                'name' => 'surgeon_first_name',
                                'value' => $patientOperativeCheckListForm->surgeon_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Surgeon Middle Name',
                                'name' => 'surgeon_middle_name',
                                'value' => $patientOperativeCheckListForm->surgeon_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Surgeon Last Name',
                                'name' => 'surgeon_last_name',
                                'value' => $patientOperativeCheckListForm->surgeon_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Anesthesiogist First Name',
                                'name' => 'anesthesiologist_first_name',
                                'value' => $patientOperativeCheckListForm->anesthesiologist_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Anesthesiogist Middle Name',
                                'name' => 'anesthesiologist_middle_name',
                                'value' => $patientOperativeCheckListForm->anesthesiologist_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Anesthesiogist Last Name',
                                'name' => 'anesthesiologist_last_name',
                                'value' => $patientOperativeCheckListForm->anesthesiologist_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Pre-Operative Diagosis',
                                'name' => 'preoperative_diagnosis',
                                'value' => $patientOperativeCheckListForm->preoperative_diagnosis,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <hr>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="consentForSurgery" name="operative_cl_1"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="consentForSurgery">
                                    1. Consent for Surgery, completed and signed
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="approvalForTheProcedure"
                                    name="operative_cl_2" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="approvalForTheProcedure">
                                    2. Approval for the Procedure
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cardioPulmonaryClearance"
                                    name="operative_cl_3" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cardioPulmonaryClearance">
                                    3. Cardio-pulmonary Clearance
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Physician First Name',
                                'id' => 'operative_cl_3_physician_first_name',
                                'name' => 'operative_cl_3_physician_first_name',
                                'disabled' => true,
                                'value' => $patientOperativeCheckListForm->operative_cl_3_physician_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Physician Middle Name',
                                'id' => 'operative_cl_3_physician_middle_name',
                                'name' => 'operative_cl_3_physician_middle_name',
                                'disabled' => true,
                                'value' => $patientOperativeCheckListForm->operative_cl_3_physician_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Physician Last Name',
                                'id' => 'operative_cl_3_physician_last_name',
                                'name' => 'operative_cl_3_physician_last_name',
                                'disabled' => true,
                                'value' => $patientOperativeCheckListForm->operative_cl_3_physician_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="physicalHygiene" name="operative_cl_4"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="physicalHygiene">
                                    4. Physical Hygiene – Full bath
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="oralHygiene" name="operative_cl_5"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="oralHygiene">
                                    5. Oral Hygiene
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="onNpoSince" name="operative_cl_6"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_6 ? 'checked' : '' }}>
                                <label class="form-check-label" for="onNpoSince">
                                    6. On NPO since:
                                </label>
                            </div>

                            @include('generate.input', [
                                'id' => 'operative_cl_6_npo_date_time',
                                'name' => 'operative_cl_6_npo_date_time',
                                'type' => 'datetime-local',
                                'disabled' => true,
                                'value' => $patientOperativeCheckListForm->operative_cl_6_npo_date_time,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7. Bowel Preparation
                            <div class="px-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="ssEnema" name="operative_cl_7_a"
                                        value="true"
                                        {{ $patientOperativeCheckListForm->operative_cl_7_a ? 'checked' : '' }}>
                                    <label class="form-check-label" for="ssEnema">
                                        a. SS enema
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="cleansingEnema"
                                        name="operative_cl_7_b" value="true"
                                        {{ $patientOperativeCheckListForm->operative_cl_7_b ? 'checked' : '' }}>
                                    <label class="form-check-label" for="cleansingEnema">
                                        b. Cleansing enema
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="jewelriesAndOtherValuablesRemovedAndEndorsedToFamilyMembers" name="operative_cl_8"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_8 ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="jewelriesAndOtherValuablesRemovedAndEndorsedToFamilyMembers">
                                    8. Jewelries and other valuables removed and endorsed to family members
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="prosthesesRemoved"
                                    name="operative_cl_9" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_9 ? 'checked' : '' }}>
                                <label class="form-check-label" for="prosthesesRemoved">
                                    9. Prostheses removed (dentures, contact lenses, eye glasses, braces, etc.)
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="nailPolishRemoved"
                                    name="operative_cl_10" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_10 ? 'checked' : '' }}>
                                <label class="form-check-label" for="nailPolishRemoved">
                                    10. Nail polish removed
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="chestXrayResult"
                                    name="operative_cl_11" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_11 ? 'checked' : '' }}>
                                <label class="form-check-label" for="chestXrayResult">
                                    11. Chest X-ray result attached to chart
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ecgResult" name="operative_cl_12"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_12 ? 'checked' : '' }}>
                                <label class="form-check-label" for="ecg">
                                    12. ECG result attached to chart
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="laboratoryResult"
                                    name="operative_cl_13" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_13 ? 'checked' : '' }}>
                                <label class="form-check-label" for="laboratoryResult">
                                    13. Laboratory results attached to chart
                                </label>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bloodAvailable"
                                    name="operative_cl_14" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_14 ? 'checked' : '' }}>
                                <label class="form-check-label" for="bloodAvailable">
                                    14. Blood available
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12 px-5">

                            <div class="row px-5">
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'a. Unit(s) ordered',
                                        'id' => 'operative_cl_14_units_ordered',
                                        'name' => 'operative_cl_14_units_ordered',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_14_units_ordered,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'b. Unit(s) available',
                                        'id' => 'operative_cl_14_units_avail',
                                        'name' => 'operative_cl_14_units_avail',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_14_units_avail,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'c. Type',
                                        'id' => 'operative_cl_14_type',
                                        'name' => 'operative_cl_14_type',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_14_type,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'd. Serial number',
                                        'id' => 'operative_cl_14_serial_number',
                                        'name' => 'operative_cl_14_serial_number',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_14_serial_number,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                <div class="col-sm-4">
                                    @include('generate.input', [
                                        'label' => 'e. Properly cross matched',
                                        'id' => 'operative_cl_14_crossed_match',
                                        'name' => 'operative_cl_14_crossed_match',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_14_crossed_match,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                @include('generate.input', [
                                    'label' => 'f. Kind',
                                    'id' => 'operative_cl_14_kind',
                                    'name' => 'operative_cl_14_kind',
                                    'disabled' => true,
                                    'value' => $patientOperativeCheckListForm->operative_cl_14_kind,
                                    'formGroupClass' => 'mb-3',
                                ])
                            </div>
                        </div>

                        <div class="col-sm-12 px-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="freshWholeBlood"
                                    name="operative_cl_14_kind_cl_1" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="freshWholeBlood">
                                    Fresh Whole Blood
                                </label>
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="prbc"
                                    name="operative_cl_14_kind_cl_2" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="prbc">
                                    PRBC
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="plateletConcentrate"
                                    name="operative_cl_14_kind_cl_3" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_3 ? 'checked' : '' }}>
                                <label class="form-check-label" for="plateletConcentrate">
                                    Platelet Concentrate
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="freshFrozenPlasma"
                                    name="operative_cl_14_kind_cl_4" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_4 ? 'checked' : '' }}>
                                <label class="form-check-label" for="freshFrozenPlasma">
                                    Fresh Frozen Plasma
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cryoprecipitate"
                                    name="operative_cl_14_kind_cl_5" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_5 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cryoprecipitate">
                                    Cryoprecipitate
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="others"
                                    name="operative_cl_14_kind_cl_others" value="true" disabled
                                    {{ $patientOperativeCheckListForm->operative_cl_14_kind_cl_others ? 'checked' : '' }}>
                                <label class="form-check-label" for="others">
                                    Others
                                </label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="withIfi" name="operative_cl_15"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_15 ? 'checked' : '' }}>
                                <label class="form-check-label" for="withIfi">
                                    15. With intravenous fluid infusion:
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'a. Type of Solution',
                                        'id' => 'operative_cl_15_solution_type',
                                        'name' => 'operative_cl_15_solution_type',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_15_solution_type,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'b. Remaining amount',
                                        'id' => 'operative_cl_15_remaining_amount',
                                        'name' => 'operative_cl_15_remaining_amount',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_15_remaining_amount,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="latestVitalSignsPrior"
                                    name="operative_cl_16" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_16 ? 'checked' : '' }}>
                                <label class="form-check-label" for="latestVitalSignsPrior">
                                    16. Latest vital signs prior to pre-op medication
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'TEMP',
                                        'id' => 'operative_cl_16_temp',
                                        'name' => 'operative_cl_16_temp',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_16_temp,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'BP',
                                        'id' => 'operative_cl_16_bp',
                                        'name' => 'operative_cl_16_bp',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_16_bp,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'Pulse',
                                        'id' => 'operative_cl_16_pulse',
                                        'name' => 'operative_cl_16_pulse',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_16_pulse,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'Resp.',
                                        'id' => 'operative_cl_16_resp',
                                        'name' => 'operative_cl_16_resp',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_16_resp,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-2">
                                    @include('generate.input', [
                                        'label' => 'Time (am/pm)',
                                        'id' => 'operative_cl_16_time',
                                        'name' => 'operative_cl_16_time',
                                        'type' => 'time',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_16_time,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="vioded" name="operative_cl_17"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_17 ? 'checked' : '' }}>
                                <label class="form-check-label" for="vioded">
                                    17. Voided
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Amount of drainage in the bag (cc)',
                                        'id' => 'operative_cl_17_drainage_amount',
                                        'name' => 'operative_cl_17_drainage_amount',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_17_drainage_amount,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Voided at (am/pm)',
                                        'id' => 'operative_cl_17_voided_time',
                                        'name' => 'operative_cl_17_voided_time',
                                        'type' => 'time',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_17_voided_time,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="skinPreppingDone"
                                    name="operative_cl_18" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_18 ? 'checked' : '' }}>
                                <label class="form-check-label" for="skinPreppingDone">
                                    18. Skin prepping done
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="surgeonInformed"
                                    name="operative_cl_19" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_19 ? 'checked' : '' }}>
                                <label class="form-check-label" for="surgeonInformed">
                                    19. Surgeon informed
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="anesthesiologistAware"
                                    name="operative_cl_20" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_20 ? 'checked' : '' }}>
                                <label class="form-check-label" for="anesthesiologistAware">
                                    20. Anesthesiologist aware
                                </label>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="preOperative" name="operative_cl_21"
                                    value="true" {{ $patientOperativeCheckListForm->operative_cl_21 ? 'checked' : '' }}>
                                <label class="form-check-label" for="preOperative">
                                    21. Pre- operative
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-3">
                                    @include('generate.input', [
                                        'label' => 'Medications Given',
                                        'id' => 'operative_cl_21_preop_med_given',
                                        'name' => 'operative_cl_21_preop_med_given',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_21_preop_med_given,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-3">
                                    @include('generate.input', [
                                        'label' => 'Dosage',
                                        'id' => 'operative_cl_21_dosage',
                                        'name' => 'operative_cl_21_dosage',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_21_dosage,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-3">
                                    @include('generate.input', [
                                        'label' => 'Route/Site',
                                        'id' => 'operative_cl_21_route_site',
                                        'name' => 'operative_cl_21_route_site',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_21_route_site,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-3">
                                    @include('generate.input', [
                                        'label' => 'Time Give (am/pm)',
                                        'id' => 'operative_cl_21_time_given',
                                        'name' => 'operative_cl_21_time_given',
                                        'disabled' => true,
                                        'type' => 'time',
                                        'value' => $patientOperativeCheckListForm->operative_cl_21_time_given,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="patientTransferredToORAt"
                                    name="operative_cl_22" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_22 ? 'checked' : '' }}>
                                <label class="form-check-label" for="patientTransferredToORAt">
                                    22. Patient transferred to Operating Room at
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-12">
                                    @include('generate.input', [
                                        'id' => 'operative_cl_22_time_transferred_to_or',
                                        'name' => 'operative_cl_22_time_transferred_to_or',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_22_time_transferred_to_or,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="byStretcherAttendedBy"
                                    name="operative_cl_23" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_23 ? 'checked' : '' }}>
                                <label class="form-check-label" for="byStretcherAttendedBy">
                                    23. By stretcher attended by:
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Orderly',
                                        'id' => 'operative_cl_23_orderly_name',
                                        'name' => 'operative_cl_23_orderly_name',
                                        'disabled' => true,
                                        'value' => $patientOperativeCheckListForm->operative_cl_23_orderly_name,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>

                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Nures on duty',
                                        'id' => 'operative_cl_23_nurse_on_duty_name',
                                        'name' => 'operative_cl_23_nurse_on_duty_name',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_23_nurse_on_duty_name,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox"
                                    id="patientAssessmentPerformedAndCompletion" name="operative_cl_24" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_24 ? 'checked' : '' }}>
                                <label class="form-check-label" for="patientAssessmentPerformedAndCompletion">
                                    24. Patient assessment performed and completion of clinical chart verified by
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Nures on duty',
                                        'id' => 'operative_cl_24_nurse_on_duty_name',
                                        'name' => 'operative_cl_24_nurse_on_duty_name',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_24_nurse_on_duty_name,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Date/Time',
                                        'id' => 'operative_cl_24_date_time',
                                        'name' => 'operative_cl_24_date_time',
                                        'disabled' => true,
                                        'type' => 'datetime-local',
                                        'value' => $patientOperativeCheckListForm->operative_cl_24_date_time,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="patientReceivedInORAt"
                                    name="operative_cl_25" value="true"
                                    {{ $patientOperativeCheckListForm->operative_cl_25 ? 'checked' : '' }}>
                                <label class="form-check-label" for="patientReceivedInORAt">
                                    25. Patient received in Operating Room at
                                </label>
                            </div>

                            <div class="row px-5">
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Date/Time',
                                        'id' => 'operative_cl_25_time_patient_rcvd_in_or',
                                        'name' => 'operative_cl_25_time_patient_rcvd_in_or',
                                        'type' => 'datetime-local',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_25_time_patient_rcvd_in_or,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                                <div class="col-sm-6">
                                    @include('generate.input', [
                                        'label' => 'Nurse on duty',
                                        'id' => 'operative_cl_25_or_nurse_on_duty',
                                        'name' => 'operative_cl_25_or_nurse_on_duty',
                                        'disabled' => true,
                                        'value' =>
                                            $patientOperativeCheckListForm->operative_cl_25_or_nurse_on_duty,
                                        'formGroupClass' => 'mb-3',
                                    ])
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('operative_checklist_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save Changes</button>
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

            $('#cardioPulmonaryClearance').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_3_physician_first_name").prop("disabled", false);
                    $("#operative_cl_3_physician_middle_name").prop("disabled", false);
                    $("#operative_cl_3_physician_last_name").prop("disabled", false);
                } else {
                    $("#operative_cl_3_physician_first_name").prop("disabled", true);
                    $("#operative_cl_3_physician_middle_name").prop("disabled", true);
                    $("#operative_cl_3_physician_last_name").prop("disabled", true);
                }
            });

            $('#onNpoSince').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_6_npo_date_time").prop("disabled", false);
                } else {
                    $("#operative_cl_6_npo_date_time").prop("disabled", true);
                }
            });

            $('#bloodAvailable').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_14_units_ordered").prop("disabled", false);
                    $("#operative_cl_14_units_avail").prop("disabled", false);
                    $("#operative_cl_14_type").prop("disabled", false);
                    $("#operative_cl_14_serial_number").prop("disabled", false);
                    $("#operative_cl_14_crossed_match").prop("disabled", false);
                    $("#operative_cl_14_kind").prop("disabled", false);

                    $("#freshWholeBlood").prop("disabled", false);
                    $("#prbc").prop("disabled", false);
                    $("#plateletConcentrate").prop("disabled", false);
                    $("#freshFrozenPlasma").prop("disabled", false);
                    $("#cryoprecipitate").prop("disabled", false);
                    $("#others").prop("disabled", false);
                } else {
                    $("#operative_cl_14_units_ordered").prop("disabled", true);
                    $("#operative_cl_14_units_avail").prop("disabled", true);
                    $("#operative_cl_14_type").prop("disabled", true);
                    $("#operative_cl_14_serial_number").prop("disabled", true);
                    $("#operative_cl_14_crossed_match").prop("disabled", true);
                    $("#operative_cl_14_kind").prop("disabled", true);

                    $("#freshWholeBlood").prop("disabled", true);
                    $("#prbc").prop("disabled", true);
                    $("#plateletConcentrate").prop("disabled", true);
                    $("#freshFrozenPlasma").prop("disabled", true);
                    $("#cryoprecipitate").prop("disabled", true);
                    $("#others").prop("disabled", true);
                }
            });

            $('#withIfi').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_15_solution_type").prop("disabled", false);
                    $("#operative_cl_15_remaining_amount").prop("disabled", false);
                } else {
                    $("#operative_cl_15_solution_type").prop("disabled", true);
                    $("#operative_cl_15_remaining_amount").prop("disabled", true);
                }
            });

            $('#latestVitalSignsPrior').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_16_temp").prop("disabled", false);
                    $("#operative_cl_16_bp").prop("disabled", false);
                    $("#operative_cl_16_pulse").prop("disabled", false);
                    $("#operative_cl_16_resp").prop("disabled", false);
                    $("#operative_cl_16_time").prop("disabled", false);
                } else {
                    $("#operative_cl_16_temp").prop("disabled", true);
                    $("#operative_cl_16_bp").prop("disabled", true);
                    $("#operative_cl_16_pulse").prop("disabled", true);
                    $("#operative_cl_16_resp").prop("disabled", true);
                    $("#operative_cl_16_time").prop("disabled", true);
                }
            });

            $('#vioded').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_17_drainage_amount").prop("disabled", false);
                    $("#operative_cl_17_voided_time").prop("disabled", false);
                } else {
                    $("#operative_cl_17_drainage_amount").prop("disabled", true);
                    $("#operative_cl_17_voided_time").prop("disabled", true);
                }
            });

            $('#preOperative').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_21_preop_med_given").prop("disabled", false);
                    $("#operative_cl_21_dosage").prop("disabled", false);
                    $("#operative_cl_21_route_site").prop("disabled", false);
                    $("#operative_cl_21_time_given").prop("disabled", false);
                } else {
                    $("#operative_cl_21_preop_med_given").prop("disabled", true);
                    $("#operative_cl_21_dosage").prop("disabled", true);
                    $("#operative_cl_21_route_site").prop("disabled", true);
                    $("#operative_cl_21_time_given").prop("disabled", true);
                }
            });

            $('#patientTransferredToORAt').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_22_time_transferred_to_or").prop("disabled", false);
                } else {
                    $("#operative_cl_22_time_transferred_to_or").prop("disabled", true);
                }
            });

            $('#byStretcherAttendedBy').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_23_orderly_name").prop("disabled", false);
                    $("#operative_cl_23_nurse_on_duty_name").prop("disabled", false);
                } else {
                    $("#operative_cl_23_orderly_name").prop("disabled", true);
                    $("#operative_cl_23_nurse_on_duty_name").prop("disabled", true);
                }
            });

            $('#patientAssessmentPerformedAndCompletion').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_24_nurse_on_duty_name").prop("disabled", false);
                    $("#operative_cl_24_date_time").prop("disabled", false);
                } else {
                    $("#operative_cl_24_nurse_on_duty_name").prop("disabled", true);
                    $("#operative_cl_24_date_time").prop("disabled", true);
                }
            });

            $('#patientReceivedInORAt').click(function() {
                if ($(this).is(':checked')) {
                    $("#operative_cl_25_time_patient_rcvd_in_or").prop("disabled", false);
                    $("#operative_cl_25_or_nurse_on_duty").prop("disabled", false);
                } else {
                    $("#operative_cl_25_time_patient_rcvd_in_or").prop("disabled", true);
                    $("#operative_cl_25_or_nurse_on_duty").prop("disabled", true);
                }
            });

        });
    </script>
@endsection
