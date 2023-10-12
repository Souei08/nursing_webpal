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
                            <a href="{{ route('vital_sign_sheet_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-vital-sign">
                                <i class="fas fa-plus"></i> Add vital sign
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.vital_sign_sheet_form.modals.add_new_vital_sign')

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
                    <strong>Vital Signs Sheet Form</strong>
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
                            {{ $patientVitalSignSheetForm->patient_first_name . ' ' }}
                            {{ $patientVitalSignSheetForm->patient_middle_name . ' ' }}
                            {{ $patientVitalSignSheetForm->patient_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Patient ID:</b>
                            {{ $patientVitalSignSheetForm->patient_id }}
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
                            {{ $patientVitalSignSheetForm->allergies }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($patientVitalSignSheetForm->date_of_birth)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Gender:</b>
                            {{ $patientVitalSignSheetForm->gender }}
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
                            {{ $patientVitalSignSheetForm->attending_physician_first_name . ' ' }}
                            {{ $patientVitalSignSheetForm->attending_physician_middle_name . ' ' }}
                            {{ $patientVitalSignSheetForm->attending_physician_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Date Created:</b>
                            {{ \Carbon\Carbon::parse($patientVitalSignSheetForm->created_at)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid;" border="1">
                <tbody>
                    <tr style="border: 1px solid;">
                        <td style="text-align: center; border: 1px solid;"><b>Room No.</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>DATE/TIME</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>BP</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>PULSE</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>RESP</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>TEMP</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>REMARKS</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>SIGNATURE</b></td>
                        <td style="text-align: center; border: 1px solid;" class="action"><b>ACTION</b></td>

                    </tr>
                    @foreach ($patientVitalSignList as $patientVitalSign)
                        <tr style="border: 1px solid;">
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->room_no }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ empty($patientVitalSign->date_time) ? '' : \Carbon\Carbon::parse($patientVitalSign->date_time)->format('M d, Y g:i A') }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->bp }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->pulse }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->resp }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->temp }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->remarks }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientVitalSign->signature }}
                            </td>

                            <td style="text-align: center;" class="action">
                                @if (empty($patientVitalSign->patient_first_name))
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-new-vital-sign-{{ $patientVitalSign->id }}">
                                        Edit
                                    </button>
                                @endif
                            </td>

                            @include('forms.vital_sign_sheet_form.modals.edit_new_vital_sign')
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
