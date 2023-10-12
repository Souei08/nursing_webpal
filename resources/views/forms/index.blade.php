@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Forms</h5>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="input-group">
                            <input type="text" class="form-control search-data border-right-0"
                                data-url="{{ url()->full() }}" data-target="#datas" placeholder="Search ...">
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div id="datas">
                    <div class="row mb-3">

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('patient_admission_record_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Patient Admission Record</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('admitting_medical_history_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Admitting Medical History</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('informed_consent_admission_form.show') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Informed Consent for Admission</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('informed_consent_treatment_form.show') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Informed Consent for Treatment</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100" href="{{ route('referral_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Referral Form</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('informed_consent_surgery_form.show') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Informed Consent for Surgery</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('operative_clearance_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Pre - Operative Clearance Form</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('operative_checklist_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Pre - Operative Checklist</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('fluid_balance_sheet_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Fluid Balance Sheet</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('vital_sign_sheet_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Vital Signs Sheet</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100" href="{{ route('doctors_order_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Doctors Order</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100" href="{{ route('flow_sheet_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">IV Flowsheet / Additives/ IV Drug Support</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100" href="{{ route('blood_glucose_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Blood Glucose and Insulin Injection Monitoring Form</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('medication_record_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Medication Administration Record</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('ward_nurses_progress_notes.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Nurses Notes</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('discharge_clinical_summary_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Discharge/Clinical Summary</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4 d-flex align-items-stretch position-relative">
                            <a class="text-dark text-decoration-none w-100"
                                href="{{ route('discharge_orders_form.index') }}">
                                <div class="card w-100 mb-3">
                                    <div class="card-body text-center">
                                        <h6 class="mb-0">Discharge Orders</h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
