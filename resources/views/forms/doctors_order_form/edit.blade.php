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
            <form action="{{ route('doctors_order_form.update', $patientDoctorsOrderForm->id) }}" method="POST"
                data-ajax="true">

                <div class="card-body p-4">
                    <div class="row">

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Patient ID',
                                'name' => 'patient_id',
                                'disabled' => 'disabled',
                                'value' => $patientDoctorsOrderForm->patient_id,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Allergies',
                                'name' => 'allergies',
                                'value' => $patientDoctorsOrderForm->allergies,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Room No.',
                                'name' => 'room_no',
                                'type' => 'number',
                                'value' => $patientDoctorsOrderForm->room_no,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'Doctor\'s Order Date',
                                'name' => 'doctors_order_date',
                                'type' => 'datetime-local',
                                'value' => $patientDoctorsOrderForm->doctors_order_date,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient First Name',
                                'name' => 'first_name',
                                'value' => $patientDoctorsOrderForm->first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Middle Name',
                                'name' => 'middle_name',
                                'value' => $patientDoctorsOrderForm->middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Patient Last Name',
                                'name' => 'last_name',
                                'value' => $patientDoctorsOrderForm->last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date of Birth',
                                'name' => 'date_of_birth',
                                'type' => 'date',
                                'value' => $patientDoctorsOrderForm->date_of_birth,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.select', [
                                'label' => 'Gender',
                                'name' => 'gender',
                                'value' => $patientDoctorsOrderForm->gender,
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
                                'label' => 'Progress Notes',
                                'name' => 'progress_note',
                                'value' => $patientDoctorsOrderForm->progress_note,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.textarea', [
                                'label' => 'Doctor\'s Order',
                                'name' => 'doctors_order',
                                'value' => $patientDoctorsOrderForm->doctors_order,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician First Name',
                                'name' => 'attending_physician_first_name',
                                'value' => $patientDoctorsOrderForm->attending_physician_first_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Middle Name',
                                'name' => 'attending_physician_middle_name',
                                'value' => $patientDoctorsOrderForm->attending_physician_middle_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-4">
                            @include('generate.input', [
                                'label' => 'Attending Physician Last Name',
                                'name' => 'attending_physician_last_name',
                                'value' => $patientDoctorsOrderForm->attending_physician_last_name,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('doctors_order_form.index') }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
