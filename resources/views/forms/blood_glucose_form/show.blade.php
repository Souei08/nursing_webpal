@extends('layouts.dashboard')
@section('print_script')
    <script>
        function printableArea(divName) {
            $('body').css('background-image', 'none');
            $('body').css('padding-top', '0');
            $("body").removeClass("body-pd");

            $('.action').hide();

            var printContents = document.getElementById(divName).innerHTML;
            document.body.innerHTML = printContents;

            window.print();
            document.location.reload();
        }
    </script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
    </div>

    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('blood_glucose_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-monitoring-form">
                                <i class="fas fa-plus"></i> Add monitoring form
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.blood_glucose_form.modals.add_new_monitoring_form')

    <div class="border bg-white rounded shadow">

        <div class="m-5" id="printableArea">

            <table class="mx-auto">
                <tr>
                    <td>
                        <img src="{{ asset('images/um.png') }}" class="mx-auto d-block p-2" width="120px">
                    </td>

                    <td class="text-center">
                        <p class="mt-4">
                            <strong>
                                <span
                                    style="font-size: 24pt; font-family: georgia, palatino, serif; color: #BE0002; line-height: .3;">
                                    University Of Mindanao
                                </span>
                                <br>COLLEGE OF HEALTH SCIENCES EDUCATION<br>
                                <span style="font-size: 10pt;">
                                    Matina Campus, Davao City; Telefax: (082)
                                    Phone No.:
                                    (082)300-5456/300-0647 Local 117
                                </span>
                                <br>
                            </strong>
                        </p>
                    </td>
                </tr>
            </table>

            <p style="text-align: center;">
                <span style="font-size: 18pt;">
                    <strong>BLOOD GLUCOSE AND INSULIN INJECTION MONITORING FORM</strong>
                </span>
            </p>
            <table style="border-collapse: collapse; width: 100%; height: 22.3906px; border-width: 0px;" border="1">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 25%;">
                    <col style="width: 20%;">
                </colgroup>
                <tbody>
                    <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Name of Patient:</b>
                            {{ $patientBloodGlucoseForm->patient_first_name . ' ' }}
                            {{ $patientBloodGlucoseForm->patient_middle_name . ' ' }}
                            {{ $patientBloodGlucoseForm->patient_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Patient ID:</b>
                            {{ $patientBloodGlucoseForm->patient_id }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Room No.:</b>
                            {{ $patientBloodGlucoseForm->room_no }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="border-collapse: collapse; width: 100%; height: 22.3906px; border-width: 0px;" border="1">
                <colgroup>
                    <col style="width: 50%;">
                    <col style="width: 25%;">
                    <col style="width: 20%;">
                </colgroup>
                <tbody>
                    <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Allergies:</b>
                            {{ $patientBloodGlucoseForm->allergies }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($patientBloodGlucoseForm->date_of_birth)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Gender:</b>
                            {{ $patientBloodGlucoseForm->gender }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <table style="border-collapse: collapse; width: 100%; height: 22.3906px; border-width: 0px;" border="1">
                <colgroup>
                    <col style="width: 33%;">
                    <col style="width: 29.7%;">
                </colgroup>
                <tbody>
                    <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Attending Physician:</b>
                            {{ $patientBloodGlucoseForm->attending_physician_first_name . ' ' }}
                            {{ $patientBloodGlucoseForm->attending_physician_middle_name . ' ' }}
                            {{ $patientBloodGlucoseForm->attending_physician_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Date Created:</b>
                            {{ \Carbon\Carbon::parse($patientBloodGlucoseForm->created_at)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid;" border="1">
                <tbody>
                    <tr style="border: 1px solid;">
                        <td style="text-align: center; border: 1px solid;"><b>DATE/TIME</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>HGT</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>REFERRED TO</b></td>
                        <td style="text-align: center; border: 1px solid; line-height: 1">
                            <br>
                            <b>INSULIN GIVEN</b><br>
                            <small>(Dose and Route)</small>
                            <br><br>
                        </td>
                        <td style="text-align: center; border: 1px solid;">
                            <b>Administered By</b>
                        </td>
                        <td style="text-align: center; border: 1px solid;"><b>SIGNATURE</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>REMARKS</b></td>
                        <td class="action" style="text-align: center; border: 1px solid;">
                            <b class="mx-3 my-3">ACTION</b>
                        </td>

                    </tr>
                    @foreach ($patientMonitoringFormList as $patientMonitoringForm)
                        <tr style="border: 1px solid;">
                            <td style="text-align: center; border: 1px solid;">
                                {{ empty($patientMonitoringForm->date_time) ? '' : \Carbon\Carbon::parse($patientMonitoringForm->date_time)->format('M d, Y g:i A') }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->hgt }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->referred_to }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->insulin_given }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->administered_by }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->signature }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientMonitoringForm->remarks }}
                            </td>

                            <td class="action" style="text-align: center; border: 1px solid;">
                                @if (empty($patientMonitoringForm->patient_first_name))
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-monitoring-form-{{ $patientMonitoringForm->id }}">
                                        Edit
                                    </button>
                                @endif
                            </td>

                            @include('forms.blood_glucose_form.modals.edit_monitoring_form')
                        </tr>
                    @endforeach

                </tbody>
            </table>


        </div>
    </div>
    </div>
@endsection
