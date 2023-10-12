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
                                <a href="{{ route('discharge_orders_form.index') }}" class="btn btn-dark">
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
                        <strong>DISCHARGE ORDERS</strong>
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
                                {{ $patientDischargeOrdersForm->patient_first_name . ' ' }}
                                {{ $patientDischargeOrdersForm->patient_middle_name . ' ' }}
                                {{ $patientDischargeOrdersForm->patient_last_name }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Room:</b>
                                {{ $patientDischargeOrdersForm->room }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Case No.:</b>
                                {{ $patientDischargeOrdersForm->case_no }}
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
                                <b>Attending Physician:</b>
                                {{ $patientDischargeOrdersForm->attending_physician_first_name . ' ' }}
                                {{ $patientDischargeOrdersForm->attending_physician_middle_name . ' ' }}
                                {{ $patientDischargeOrdersForm->attending_physician_last_name }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Age:</b>
                                {{ \Carbon\Carbon::parse($patientDischargeOrdersForm->date_of_birth)->age }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <b>Sex:</b>
                                {{ $patientDischargeOrdersForm->sex }}
                            </td>
                            <td style="height: 22.3906px; border-width: 0px;">
                                <b>Date:</b>
                                {{ \Carbon\Carbon::parse($patientDischargeOrdersForm->created_at)->format('M d, Y g:i A') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;" border="1">
                    <colgroup>
                        <col style="width: 33.3333%;">
                        <col style="width: 33.3333%;">
                        <col style="width: 33.3333%;">
                    </colgroup>
                    <tbody>
                        <tr>
                            <td style="border-width: 0px;">&nbsp;</td>
                            <td style="border-width: 0px;">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table
                    style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px; text-align: center;"
                    border="1">
                    <colgroup>
                        <col style="width: 33.2986%;">
                        <col style="width: 33.2986%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3984px;">
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientDischargeOrdersForm->may_go_home)
                                    <i class="fas fa-square"></i> May Go Home
                                @else
                                    <i class="far fa-square"></i> May Go Home
                                @endif
                            </td>
                            <td style="height: 22.3984px; border-width: 0px;">
                                @if ($patientDischargeOrdersForm->home_against_advice)
                                    <i class="fas fa-square"></i> Home Against Advice
                                @else
                                    <i class="far fa-square"></i> Home Against Advice
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <p>
                    <b>Medications:</b><br>
                    {{ $patientDischargeOrdersForm->medications }}
                </p>
                <br><br>

                <table
                style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;"
                border="1">
                <colgroup>
                    <col style="width: 40.9517%;">
                    <col style="width: 60.9517%;">
                </colgroup>
                <tbody>
                    <tr style="height: 22.3984px;">
                        <td
                            style="height: 22.3984px; border-width: 0px;">
                            <b>Follow-up On:</b>
                            {{ \Carbon\Carbon::parse($patientDischargeOrdersForm->follow_up_at)->format('M d, Y g:i A') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td
                            style="height: 22.3984px; border-width: 0px;">
                            <b>At:</b>
                            {{ $patientDischargeOrdersForm->follow_up_address }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>

                <p>
                    <b>Laboratory request (if any):</b><br>
                    {{ $patientDischargeOrdersForm->laboratory_request }}
                </p>
                <br><br>

                <p>
                    <b>Laboratory results for follow-up (if any):</b><br>
                    {{ $patientDischargeOrdersForm->laboratory_results_for_follow_up }}
                </p>
                <br><br>

                <p>
                    <b>Advised:</b><br>
                    {{ $patientDischargeOrdersForm->advised }}
                </p>
                <br><br>

                <div style="text-align: center; float: right; line-height: 1px;">
                    <p style="text-decoration: underline;">
                        {{ $patientDischargeOrdersForm->attending_physician_first_name . ' ' }}
                        {{ $patientDischargeOrdersForm->attending_physician_middle_name . ' ' }}
                        {{ $patientDischargeOrdersForm->attending_physician_last_name }}
                        <br>
                    </p>
                    <b>Attending Physician</b>
                </div>
              

                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
