@extends('layouts.dashboard')
@section('print_script')
    <script>
        function printableArea(divName) {
            $('body').css('background-image', 'none');
            $('body').css('padding-top', '0');
            $("body").removeClass("body-pd");

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

        <div class="card border-0 shadow mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <a href="{{ route('discharge_clinical_summary_form.index') }}" class="btn btn-dark">
                                    <i class="fas fa-arrow-left"></i> Back
                                </a>
                            </div>
                            <div class="col-sm-8">
                                <a onclick="printableArea('printableArea')" class="btn btn-primary pull-right">
                                    <i class="fas fa-print"></i> Print
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <strong>DISCHARGE/CLINICAL SUMMARY</strong>
                    </span>
                </p>

                <table style="border-collapse: collapse; width: 99.9828%; height: 92.8px; border-width: 0px;"
                    border="1">
                    <colgroup>
                        <col style="width: 36.8648%;">
                        <col style="width: 24.1171%;">
                        <col style="width: 12.6615%;">
                        <col style="width: 26.2705%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 23.2px;">
                            <td style="height: 23.2px; border-width: 0px;" colspan="2">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Name of Patient:
                                    <span style="text-decoration: underline;">
                                        {{ $patientDischargeClinicalSummaryForm->patient_first_name . ' ' }}
                                        {{ $patientDischargeClinicalSummaryForm->patient_middle_name . ' ' }}
                                        {{ $patientDischargeClinicalSummaryForm->patient_last_name }}
                                    </span>
                                </span>
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><br></span>
                            </td>
                            <td style="height: 23.2px; border-width: 0px;">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Age:
                                    <span style="text-decoration: underline;">
                                        {{ \Carbon\Carbon::parse($patientDischargeClinicalSummaryForm->date_of_birth)->age }}
                                    </span>
                                </span>
                            </td>
                            <td style="height: 23.2px; border-width: 0px;">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Sex:
                                    <span style="text-decoration: underline;">
                                        {{ $patientDischargeClinicalSummaryForm->sex }}
                                    </span>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 23.2px;">
                            <td style="height: 23.2px; border-width: 0px;" colspan="4">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Address:
                                    <span style="text-decoration: underline;">
                                        {{ $patientDischargeClinicalSummaryForm->address }}
                                    </span>
                                </span>
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><br></span>
                            </td>
                        </tr>
                        <tr style="height: 23.2px;">
                            <td style="height: 23.2px; border-width: 0px;" colspan="4">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Attending Physician: <span style="text-decoration: underline;">
                                        {{ $patientDischargeClinicalSummaryForm->attending_physician_first_name . ' ' }}
                                        {{ $patientDischargeClinicalSummaryForm->attending_physician_middle_name . ' ' }}
                                        {{ $patientDischargeClinicalSummaryForm->attending_physician_last_name }}
                                    </span>
                                </span>
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><br></span>
                            </td>
                        </tr>
                        <tr style="height: 23.2px;">
                            <td style="height: 23.2px; border-width: 0px;">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Date Admitted:
                                    <span style="text-decoration: underline;">
                                        {{ \Carbon\Carbon::parse($patientDischargeClinicalSummaryForm->date_admitted)->format('M d, Y') }}
                                    </span>
                                </span>
                            </td>
                            <td style="height: 23.2px; border-width: 0px;" colspan="2">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Date Discharged:
                                    <span style="text-decoration: underline;">
                                        {{ \Carbon\Carbon::parse($patientDischargeClinicalSummaryForm->date_admitted)->format('M d, Y') }}
                                    </span>
                                </span>
                            </td>
                            <td style="height: 23.2px; border-width: 0px;">
                                <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                                    Hosp. No.:
                                    <span style="text-decoration: underline;">
                                        {{ $patientDischargeClinicalSummaryForm->hospital_no }}
                                    </span>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; line-height: 1;">
                    Chief Complaint:
                    {{ $patientDischargeClinicalSummaryForm->chief_complaint }}
                </p>
                <br>
                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Brief Clinical History:
                    {{ $patientDischargeClinicalSummaryForm->brief_clinical_summary }}

                </p>
                <br>
                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Physical Examination:
                    {{ $patientDischargeClinicalSummaryForm->physician_examination }}

                </p>
                <br>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        General Survey:
                    </span>
                </p>
                <p style="text-align: left; line-height: 1.4;">
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        Vital Signs&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        BP:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->bp }}
                        </span>&nbsp;&nbsp;

                        CR:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->cr }}
                        </span>&nbsp;&nbsp;

                        RR:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->rr }}
                        </span>&nbsp;&nbsp;

                        TEMP:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->temp }}
                        </span>&nbsp;&nbsp;

                        Abdomen:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->abdomen }}
                        </span>&nbsp;&nbsp;
                    </span>
                    <br>
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        HEENT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->heent }}
                        </span>&nbsp;&nbsp;
                        GU(IE):
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->gu }}
                        </span>&nbsp;&nbsp;
                        <br>
                    </span>
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        Chest/Lungs&nbsp;&nbsp;:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->chest_lungs }}
                        </span>&nbsp;&nbsp;
                        Skin/Extermities:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->skin_extremities }}
                        </span>&nbsp;&nbsp;
                        <br>
                    </span>
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        CVS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->cvs }}
                        </span>&nbsp;&nbsp;
                        <br>
                    </span>
                    <span style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">
                        CNS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                        <span style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->cns }}
                        </span>&nbsp;&nbsp;
                        <br>
                    </span>
                </p>

                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Laboratory Findings: (please see attachedPhotocopied Results)
                    {{ $patientDischargeClinicalSummaryForm->laboratory_findings }}
                </p>
                <br>

                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Treatment/Course in the ward:
                    {{ $patientDischargeClinicalSummaryForm->treatment_course }}

                </p>
                <br>

                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Final Diagnosis:
                    {{ $patientDischargeClinicalSummaryForm->final_diagnosis }}

                </p>
                <br>

                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Recommendation:
                    {{ $patientDischargeClinicalSummaryForm->recommendation }}
                </p>
                <br>
                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    Disposition on Discharge:
                </p>
                <p style="text-align: center; line-height: 1;">
                    <span style="font-family: arial, helvetica, sans-serif;">
                        @if ($patientDischargeClinicalSummaryForm->disposition_discharge == 'Improved')
                            <i class="fas fa-square"></i>
                            Improved&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Treansferred&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            HAMA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Absconded&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Expired&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @elseif ($patientDischargeClinicalSummaryForm->disposition_discharge == 'Transferred')
                            <i class="far fa-square"></i>
                            Improved&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="fas fa-square"></i>
                            Treansferred&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            HAMA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Absconded&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Expired&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @elseif ($patientDischargeClinicalSummaryForm->disposition_discharge == 'HAMA')
                            <i class="far fa-square"></i>
                            Improved&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Treansferred&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="fas fa-square"></i>
                            HAMA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Absconded&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Expired&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @elseif ($patientDischargeClinicalSummaryForm->disposition_discharge == 'Absconded')
                            <i class="far fa-square"></i>
                            Improved&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Treansferred&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            HAMA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="fas fa-square"></i>
                            Absconded&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Expired&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @elseif ($patientDischargeClinicalSummaryForm->disposition_discharge == 'Expired')
                            <i class="far fa-square"></i>
                            Improved&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Treansferred&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            HAMA&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="far fa-square"></i>
                            Absconded&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                            <i class="fas fa-square"></i>
                            Expired&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @endif
                        <br><br>
                    </span>
                </p>
                <p style="font-size: 12pt; font-family: arial, helvetica, sans-serif; text-align: left; line-height: 1;">
                    <span style="font-family: arial, helvetica, sans-serif;">
                        <b style="text-decoration: underline;">
                            {{ $patientDischargeClinicalSummaryForm->resident_incharge_first_name . ' ' }}
                            {{ $patientDischargeClinicalSummaryForm->resident_incharge_middle_name . ' ' }}
                            {{ $patientDischargeClinicalSummaryForm->resident_incharge_last_name }}
                        </b>
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($patientDischargeClinicalSummaryForm->date_accomplished)->format('M d, Y g:i A') }}
                        </b>
                        <br>
                        Resident in-charge
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Date Accomplished
                        <br>
                        (Printed Name &amp; Signature)
                    </span>
                </p>


                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
