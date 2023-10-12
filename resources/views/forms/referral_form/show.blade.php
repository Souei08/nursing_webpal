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
                                <a href="{{ route('referral_form.index') }}" class="btn btn-dark">
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
                        <strong>REFERRAL FORM</strong>
                    </span>
                </p>
                <table style="border-collapse: collapse; width: 100%; height: 22.3906px; border-width: 0px;" border="1">
                    <colgroup>
                        <col style="width: 55%;">
                        <col style="width: 23%;">
                        <col style="width: 22%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3906px;">
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Name of Patient:</b>
                                {{ $patientReferralForm->patient_first_name . ' ' }}
                                {{ $patientReferralForm->patient_middle_name . ' ' }}
                                {{ $patientReferralForm->patient_last_name }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Date:</b>
                                {{ \Carbon\Carbon::parse($patientReferralForm->created_at)->format('M d, Y') }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Time:</b>
                                {{ \Carbon\Carbon::parse($patientReferralForm->created_at)->format('g:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table style="border-collapse: collapse; width: 100%; height: 22.3906px; border-width: 0px;" border="1">
                    <colgroup>
                        <col style="width: 55%;">
                        <col style="width: 23%;">
                        <col style="width: 22%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3906px;">
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Address:</b>
                                {{ $patientReferralForm->address }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Sex:</b>
                                {{ $patientReferralForm->sex }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Age:</b>
                                {{ \Carbon\Carbon::parse($patientReferralForm->date_of_birth)->age }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Patient No.:</b>
                                {{ $patientReferralForm->patient_no }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="border-collapse: collapse; width: 100%; border-width: 0px; height: 22.3984px;" border="1">
                    <colgroup>
                        <col style="width: 99.8959%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3984px;">
                            <td style="border-width: 0px; height: 22.3984px;">
                                <b>Problem Referred:</b>
                                {{ $patientReferralForm->problem_referred }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;" border="1">
                    <colgroup>
                        <col style="width: 33.3333%;">
                        <col style="width: 33.3333%;">
                        <col style="width: 33.3333%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3984px;">
                            <td style="height: 22.3984px; border-width: 0px;">
                                <b>For</b>
                            </td>
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientReferralForm->for == 'Referral')
                                    <i class="fas fa-square"></i> Referral
                                @else
                                    <i class="far fa-square"></i> Referral
                                @endif
                            </td>
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientReferralForm->for == 'Co-management')
                                    <i class="fas fa-square"></i> Co-management
                                @else
                                    <i class="far fa-square"></i> Co-management
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style="border-width: 0px;">
                                <b>Referred to:</b>
                            </td>
                            <td style="border-width: 0px;">&nbsp;</td>
                            <td style="border-width: 0px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;" border="1">
                    <colgroup>
                        <col style="width: 33.2986%;">
                        <col style="width: 33.2986%;">
                        <col style="width: 33.2986%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3984px;">
                            <td style="height: 22.3984px; border-width: 0px;">&nbsp;</td>
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientReferralForm->referred_to == 'Consent for Referral')
                                    <i class="fas fa-square"></i> Consent for Referral
                                @else
                                    <i class="far fa-square"></i> Consent for Referral
                                @endif
                            </td>
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientReferralForm->referred_to == 'Refused Referral')
                                    <i class="fas fa-square"></i> Refused Referral
                                @else
                                    <i class="far fa-square"></i> Refused Referral
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <table
                    style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px; margin-left: auto; margin-right: auto;"
                    border="1">
                    <colgroup>
                        <col style="width: 49.9517%;">
                        <col style="width: 49.9517%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td style="text-align: center; border-width: 0px;">
                                {{ $patientReferralForm->referrer_first_name . ' ' }}
                                {{ $patientReferralForm->referrer_middle_name . ' ' }}
                                {{ $patientReferralForm->referrer_last_name }}
                            </td>
                            <td style="text-align: center; border-width: 0px;">
                                {{ $patientReferralForm->referrer_relationship_to_patient }}
                            </td>
                        </tr>
                        <tr style="height: 22.3984px;">
                            <td
                                style="height: 22.3984px; text-align: center; border-width: 0px; text-decoration: overline;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Signature over Printed Name</b>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td
                                style="height: 22.3984px; text-align: center; border-width: 0px; text-decoration: overline;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Relationship to Patient</b>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br><br>
                <p style="text-align: center;">
                    <strong style="font-size: 14pt;">CONSULTANT&rsquo;S NOTES</strong>
                </p>
                <br><br>

                <p>
                    <b>Subjective Findings:</b>
                    {{ $patientReferralForm->subjective_findings }}
                </p>
                <br><br>

                <p>
                    <b>Objective Findings:</b>
                    {{ $patientReferralForm->objective_findings }}
                </p>
                <br><br>

                <p>
                    <b>Assessment:</b>
                    {{ $patientReferralForm->assessment }}
                </p>
                <br><br>

                <p>
                    <b>Plan:</b>
                    {{ $patientReferralForm->plan }}
                </p>
                <br><br>

                <table
                    style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px; margin-left: auto; margin-right: auto;"
                    border="1">
                    <colgroup>
                        <col style="width: 49.9517%;">
                        <col style="width: 49.9517%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td style="text-align: center; border-width: 0px;">
                                {{ \Carbon\Carbon::parse($patientReferralForm->consulted_at)->format('M d, Y g:i A') }}
                            </td>
                            <td style="text-align: center; border-width: 0px;">
                                {{ $patientReferralForm->consultant_first_name . ' ' }}
                                {{ $patientReferralForm->consultant_middle_name . ' ' }}
                                {{ $patientReferralForm->consultant_last_name }}
                            </td>
                        </tr>
                        <tr style="height: 22.3984px;">
                            <td
                                style="height: 22.3984px; text-align: center; border-width: 0px; text-decoration: overline;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Date and Time</b>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                            <td
                                style="height: 22.3984px; text-align: center; border-width: 0px; text-decoration: overline;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Consultant</b>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
