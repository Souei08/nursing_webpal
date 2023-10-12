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
            <form action="{{ route('discharge_orders_form.update', $patientDischargeOrdersForm->id) }}" method="POST" data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'patient_first_name',
                                'value' => $patientDischargeOrdersForm->patient_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'patient_middle_name',
                                'value' => $patientDischargeOrdersForm->patient_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'patient_last_name',
                                'value' => $patientDischargeOrdersForm->patient_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Room',
                                'name' => 'room',
                                'value' => $patientDischargeOrdersForm->room,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Case No',
                                'name' => 'case_no',
                                'value' => $patientDischargeOrdersForm->case_no,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
                                'value' => $patientDischargeOrdersForm->date_of_birth,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.select', [
                                'label' => 'Sex',
                                'name' => 'sex',
                                'value' => $patientDischargeOrdersForm->sex,
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

                        <div class="col-sm-12 text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="mayGoHome" name="may_go_home"
                                    value="true" {{ $patientDischargeOrdersForm->may_go_home == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="mayGoHome">May Go Home</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="homeAgainstAdvice"
                                    name="home_against_advice" value="true" {{ $patientDischargeOrdersForm->home_against_advice == true ? 'checked' : '' }}>
                                <label class="form-check-label" for="homeAgainstAdvice">Home against Advice</label>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Medications',
                                'name' => 'medications',
                                'value' => $patientDischargeOrdersForm->medications,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Follow-up Date',
                                'name' => 'follow_up_at',
                                'type' => 'datetime-local',
                                'value' => $patientDischargeOrdersForm->follow_up_at,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-9">
                            @include('generate.input', [
                                'label' => 'Follow-up Address',
                                'name' => 'follow_up_address',
                                'value' => $patientDischargeOrdersForm->follow_up_address,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Laboratory Request (if any)',
                                'name' => 'laboratory_request',
                                'value' => $patientDischargeOrdersForm->laboratory_request,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Laboratory Results for follow-up (if any)',
                                'name' => 'laboratory_results_for_follow_up',
                                'value' => $patientDischargeOrdersForm->laboratory_results_for_follow_up,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Advised',
                                'name' => 'advised',
                                'value' => $patientDischargeOrdersForm->advised,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician First Name',
                                'name' => 'attending_physician_first_name',
                                'value' => $patientDischargeOrdersForm->attending_physician_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Middle Name',
                                'name' => 'attending_physician_middle_name',
                                'value' => $patientDischargeOrdersForm->attending_physician_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Last Name',
                                'name' => 'attending_physician_last_name',
                                'value' => $patientDischargeOrdersForm->attending_physician_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('discharge_orders_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
