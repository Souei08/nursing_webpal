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
                                <a href="{{ route('operative_checklist_form.index') }}" class="btn btn-dark">
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
                        <strong>PRE – OPERATIVE CHECKLIST</strong>
                    </span>
                </p>




                <table style="border-collapse: collapse; width: 100%; height: 111.945px; border-width: 0px;" border="1">
                 
                    <tbody>
                        <tr style="height: 22.3889px;">
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;" colspan="2">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Name of Patient:&nbsp;
                                    </strong>
                                    {{ $patientOperativeCheckListForm->patient_first_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->patient_middle_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->patient_last_name }}
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;" colspan="2">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Room #:&nbsp;
                                    </strong>
                                    {{ $patientOperativeCheckListForm->room_no }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.3889px;">
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Date of Surgery:
                                    </strong>
                                    {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->date_of_surgery)->format('M d, Y g:i A') }}
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Age:&nbsp;
                                    </strong>
                                    {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->date_of_birth)->age }}
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Sex:
                                    </strong>
                                    {{ $patientOperativeCheckListForm->sex }}
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Case #:
                                    </strong>
                                    {{ $patientOperativeCheckListForm->case_no }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Attending Physician:
                                    </strong>
                                    {{ $patientOperativeCheckListForm->attending_physician_first_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->attending_physician_middle_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->attending_physician_last_name }}
                                </span>
                            </td>
                            <td style="border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        &nbsp;

                                    </strong>
                                </span>
                            </td>
                            <td style="border-width: 0px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        &nbsp;

                                    </strong>
                                </span>
                            </td>
                            <td style="border-width: 0px; line-height: 1;">&nbsp;
                            </td>
                        </tr>
                        <tr style="height: 22.3889px;">
                            <td style="border-width: 0px; height: 22.3889px; line-height: 1;" colspan="4">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Surgeon:&nbsp;
                                    </strong>
                                    {{ $patientOperativeCheckListForm->surgeon_first_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->surgeon_middle_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->surgeon_last_name }}
                                    <strong>
                                        <br>
                                    </strong>
                                </span>

                            </td>
                        </tr>
                        <tr style="height: 22.3889px;">
                            <td style="border-width: 0px; height: 22.3889px; line-height: 1.3;" colspan="4">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Anesthesiologist:
                                    </strong>
                                    {{ $patientOperativeCheckListForm->anesthesiologist_first_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->anesthesiologist_middle_name . ' ' }}
                                    {{ $patientOperativeCheckListForm->anesthesiologist_last_name }}
                                    <strong>
                                        <br>
                                    </strong>
                                </span>

                            </td>
                        </tr>
                        <tr style="height: 22.3889px;">
                            <td style="border-width: 0px; height: 22.3889px; line-height: 1;" colspan="4">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Pre - Operative Diagnosis:
                                    </strong>
                                    {{ $patientOperativeCheckListForm->preoperative_diagnosis }}
                                    <strong>
                                        <br>
                                    </strong>
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p style="text-align: center; line-height: 1.3;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        TO BE COMPPLETED WITH A CHECK (<i class="fas fa-check"></i>) OR NOT APPLICABLE (N/A) AND ATTACH TO
                        CHART
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_1)
                            (<i class="fas fa-check"></i>)
                            1. Consent for Surgery, completed and signed<br>
                        @else
                            (&nbsp; &nbsp;)
                            1. Consent for Surgery, completed and signed<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_2)
                            (<i class="fas fa-check"></i>)
                            2. Approval for the Procedure<br>
                        @else
                            (&nbsp; &nbsp;)
                            2. Approval for the Procedure<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_3)
                            (<i class="fas fa-check"></i>)
                            3. Cardio-pulmonary Clearance
                            <b>
                                {{ $patientOperativeCheckListForm->operative_cl_3_physician_first_name . ' ' }}
                                {{ $patientOperativeCheckListForm->operative_cl_3_physician_middle_name . ' ' }}
                                {{ $patientOperativeCheckListForm->operative_cl_3_physician_last_name }}
                            </b>
                        @else
                            (&nbsp; &nbsp;)
                            3. Cardio-pulmonary Clearance _______________________________________________
                        @endif
                    </span><br>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        Signature of Physician over Printed Name<br>
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_4)
                            (<i class="fas fa-check"></i>)
                            4. Physician - full bath <br>
                        @else
                            (&nbsp; &nbsp;)
                            4. Physician - full bath <br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_5)
                            (<i class="fas fa-check"></i>)
                            5. Oral Hygiene<br>
                        @else
                            (&nbsp; &nbsp;)
                            5. Oral Hygiene<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_6)
                            (<i class="fas fa-check"></i>)
                            6. On NPO since: DATE
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_6_npo_date_time)->format('M d, Y') }}
                            TIME
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_6_npo_date_time)->format('g:i A') }}
                            (am/pm)<br>
                        @else
                            (&nbsp; &nbsp;)
                            6. On NPO since: DATE _______________ TIME ______________ (am/pm)<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; 7. Bowel Preparation<br>
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_7_a)
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            (<i class="fas fa-check"></i>)
                            a. SS enema<br>
                        @else
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            (<i class="fas fa-check"></i>)
                            a. SS enema<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_7_b)
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            (<i class="fas fa-check"></i>)
                            b. Cleansing enema<br>
                        @else
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            (<i class="fas fa-check"></i>)
                            b. Cleansing enema<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_8)
                            (<i class="fas fa-check"></i>)
                            8. Jewelries and other valuables removed and endorsed to family members<br>
                        @else
                            (&nbsp; &nbsp;)
                            8. Jewelries and other valuables removed and endorsed to family members<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_9)
                            (<i class="fas fa-check"></i>)
                            9. Prostheses removed (dentures, contact lenses, eye glasses, braces, etc.)<br>
                        @else
                            (&nbsp; &nbsp;)
                            9. Prostheses removed (dentures, contact lenses, eye glasses, braces, etc.)<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_10)
                            (<i class="fas fa-check"></i>)
                            10. Nail polish removed<br>
                        @else
                            (&nbsp; &nbsp;)
                            10. Nail polish removed<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_11)
                            (<i class="fas fa-check"></i>)
                            11. Chest X-ray result attached to chart<br>
                        @else
                            (&nbsp; &nbsp;)
                            11. Chest X-ray result attached to chart<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_12)
                            (<i class="fas fa-check"></i>)
                            12. ECG result attached to chart<br>
                        @else
                            (&nbsp; &nbsp;)
                            12. ECG result attached to chart<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_13)
                            (<i class="fas fa-check"></i>)
                            13. Laboratory results attached to chart<br>
                        @else
                            (&nbsp; &nbsp;)
                            13. Laboratory results attached to chart<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_14)
                            (<i class="fas fa-check"></i>)
                            14. Blood available
                        @else
                            (&nbsp; &nbsp;)
                            14. Blood available
                        @endif
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>a. Unit(s) ordered: </b> {{ $patientOperativeCheckListForm->operative_cl_14_units_ordered }}
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        <b>f. Kind: </b>
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_1)
                            (<i class="fas fa-check"></i>)
                            Fresh Whole Blood
                        @else
                            (&nbsp; &nbsp;)
                            Fresh Whole Blood
                        @endif
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_others)
                            (<i class="fas fa-check"></i>)
                            Others <br>
                        @else
                            (&nbsp; &nbsp;)
                            Others <br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>b. Unit(s) available: </b> {{ $patientOperativeCheckListForm->operative_cl_14_units_avail }}
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_2)
                            (<i class="fas fa-check"></i>)
                            PRBC<br>
                        @else
                            (&nbsp; &nbsp;)
                            PRBC<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>c. Type: </b> {{ $patientOperativeCheckListForm->operative_cl_14_type }}
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_3)
                            (<i class="fas fa-check"></i>)
                            Platelet Concentrate<br>
                        @else
                            (&nbsp; &nbsp;)
                            Platelet Concentrate<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>d. Serial number: </b>{{ $patientOperativeCheckListForm->operative_cl_14_serial_number }}
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_4)
                            (<i class="fas fa-check"></i>)
                            Fresh Frozen Plasma<br>
                        @else
                            (&nbsp; &nbsp;)
                            Fresh Frozen Plasma<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>e. Property cross matched: </b>
                        {{ $patientOperativeCheckListForm->operative_cl_14_crossed_match }}
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @if ($patientOperativeCheckListForm->operative_cl_14_kind_cl_5)
                            (<i class="fas fa-check"></i>)
                            Cryoprecipitate
                        @else
                            (&nbsp; &nbsp;)
                            Cryoprecipitate
                        @endif
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_15)
                            (<i class="fas fa-check"></i>)
                            15. With intravenous fluid infusion:
                        @else
                            (&nbsp; &nbsp;)
                            15. With intravenous fluid infusion:
                        @endif
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; <b>a. Type of Solution:
                        </b>{{ $patientOperativeCheckListForm->operative_cl_15_solution_type }}
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; <b>b. Remaining amount: </b>
                        {{ $patientOperativeCheckListForm->operative_cl_15_remaining_amount }}
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_16)
                            (<i class="fas fa-check"></i>)
                            16. Latest vital signs prior to pre - op medication
                        @else
                            (&nbsp; &nbsp;)
                            16. Latest vital signs prior to pre - op medication
                        @endif
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp;
                        Temp: <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_16_temp }} </span> &nbsp;
                        &nbsp; &nbsp;
                        BP: <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_16_bp }} </span>
                        &nbsp; &nbsp; &nbsp;
                        Pulse: <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_16_pulse }} </span>
                        &nbsp; &nbsp; &nbsp;
                        Resp.: <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_16_resp }} </span>
                        &nbsp; &nbsp; &nbsp;
                        Time: <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_16_time)->format('g:i A') }}
                        </span> (am/pm)
                    </span>
                </p>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_17)
                            (<i class="fas fa-check"></i>)
                            17. Voided
                        @else
                            (&nbsp; &nbsp;)
                            17. Voided
                        @endif
                    </span>
                </p>
                <table style="border-collapse: collapse; width: 70.7197%; height: 32px; border-width: 0px;"
                    border="1">
                    <colgroup>
                        <col style="width: 11.0808%;">
                        <col style="width: 23.7057%;">
                        <col style="width: 35.7884%;">
                        <col style="width: 25.4251%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.3889px;">
                            <td style="height: 22.3889px; border-width: 0px;">
                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                    &nbsp;a. Freely&nbsp;
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px;">
                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                    b. With dwelling catheter
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px;">
                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                    c. Amount of drainage in the bag <span
                                        style="text-decoration: underline;">{{ $patientOperativeCheckListForm->operative_cl_17_drainage_amount }}</span>
                                    cc
                                </span>
                            </td>
                            <td style="height: 22.3889px; border-width: 0px;">
                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                    d. Voided at <span
                                        style="text-decoration: underline;">{{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_17_voided_time)->format('g:i A') }}</span>
                                    (am/pm)
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p style="text-align: left; line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_18)
                            (<i class="fas fa-check"></i>)
                            18. Skin prepping done<br>
                        @else
                            (&nbsp; &nbsp;)
                            18. Skin prepping done<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_19)
                            (<i class="fas fa-check"></i>)
                            19. Surgeon informed<br>
                        @else
                            (&nbsp; &nbsp;)
                            19. Surgeon informed<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_20)
                            (<i class="fas fa-check"></i>)
                            20. Anesthesiologist aware<br>
                        @else
                            (&nbsp; &nbsp;)
                            20. Anesthesiologist aware<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_21)
                            (<i class="fas fa-check"></i>)
                            21. Pre - op medications given:
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_21_preop_med_given }} </span>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @else
                            (&nbsp; &nbsp;)
                            21. Pre - op medications given:
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_21_preop_med_given }} </span>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        @endif
                        Dosage:
                        <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_21_dosage }} </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                        Route/Site:
                        <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_21_route_site }} </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Time Given:
                        <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_21_time_given)->format('g:i A') }}
                        </span>am/pm<br>
                        <br>
                    </span>
                </p>
                <p style="line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_22)
                            (<i class="fas fa-check"></i>)
                            22. Patient transferred to Operating Room at
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_22_time_transferred_to_or }} </span><br>
                        @else
                            22. Patient transferred to Operating Room at
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_22_time_transferred_to_or }} </span><br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_23)
                            (<i class="fas fa-check"></i>)
                            23. By stretcher attended by: ORDERLY
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_23_orderly_name }} </span><br>
                        @else
                            23. By stretcher attended by: ORDERLY
                            <span style="text-decoration: underline;">
                                {{ $patientOperativeCheckListForm->operative_cl_23_orderly_name }} </span><br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        NURSE ON DUTY
                        <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_23_nurse_on_duty_name }}
                        </span>
                        <br>
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_24)
                            (<i class="fas fa-check"></i>)
                            24. Patient assessment performed and completion of clinical chart verified by
                        @else
                            24. Patient assessment performed and completion of clinical chart verified by
                        @endif
                    </span>
                </p>
                <p style="line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; NURSE ON DUTY
                        <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_24_nurse_on_duty_name }}
                        </span>
                        &nbsp;
                        DATE
                        <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_25_time_patient_rcvd_in_or)->format('M d, Y') }}
                        </span>
                        &nbsp; &nbsp;
                        TIME: <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_25_time_patient_rcvd_in_or)->format('g:i A') }}
                        </span>
                        am/pm
                    </span>
                </p>
                <p style="line-height: 1;">
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        @if ($patientOperativeCheckListForm->operative_cl_25)
                            (<i class="fas fa-check"></i>)
                            25. Patient received in Operating Room at
                            <span
                                style="text-decoration: underline;">{{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_25_time_patient_rcvd_in_or)->format('g:i A') }}</span>
                            am/pm<br>
                        @else
                            25. Patient received in Operating Room at
                            <span
                                style="text-decoration: underline;">{{ \Carbon\Carbon::parse($patientOperativeCheckListForm->operative_cl_25_time_patient_rcvd_in_or)->format('g:i A') }}</span>
                            am/pm<br>
                        @endif
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Patient assessment performed and completion of clinical chart verified by:<br>
                    </span>
                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        OPERATING ROOM NURSE ON DUTY
                        <span style="text-decoration: underline;">
                            {{ $patientOperativeCheckListForm->operative_cl_25_or_nurse_on_duty }}
                        </span>
                    </span>
                </p>
















                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
