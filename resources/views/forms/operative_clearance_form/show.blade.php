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
                                <a href="{{ route('operative_clearance_form.index') }}" class="btn btn-dark">
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
                        <strong>PRE-OPERATIVE CLEARANCE FORM</strong>
                    </span>
                </p>


                <p style="line-height: 1.3; text-align: left;">
                    <span style="font-size: 10pt;">
                        <b>Name of Patient:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->patient_first_name . ' ' }}
                            {{ $operativeClearanceForm->patient_middle_name . ' ' }}
                            {{ $operativeClearanceForm->patient_last_name }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Room #:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->room_no }}
                        </span>
                        &nbsp; &nbsp;
                        <br>
                        <b>Date of Surgery:</b>
                        <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($operativeClearanceForm->date_of_surgery)->format('M d, Y g:i A') }}
                        </span>
                        &nbsp; &nbsp;&nbsp; &nbsp;
                        <b>Age:</b>
                        <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($operativeClearanceForm->date_of_birth)->age }}
                        </span>
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        <b>Sex:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->sex }}
                        </span>
                        &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                        <b>Case #:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->case_no }}
                        </span>
                        <br>
                        <b>Attending Physician:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->attending_physician_fname . ' ' }}
                            {{ $operativeClearanceForm->attending_physician_mname . ' ' }}
                            {{ $operativeClearanceForm->attending_physician_lname }}
                        </span>

                        <br>
                        <b>Working Diagnosis:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->working_diagnosis }}
                        </span> <br>
                        <b>Surgery Contemplated:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->surgery_contemplated }}
                        </span>
                        <br>
                        <b>Anesthesia Contemplated:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->anesthesia_contemplated }}
                        </span>
                        <br>
                        <b>Tentative Schedule (Date/Time):</b>
                        <span style="text-decoration: underline;">
                            {{ \Carbon\Carbon::parse($operativeClearanceForm->tentative_sched)->format('M d, Y g:i A') }}
                        </span> <br>
                        <b>History:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->history }}
                        </span> <br>
                        <b>Smoking:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->smoking }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Alcohol Intake:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->alcohol_intake }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Allergies:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->allergies }}
                        </span> <br>
                        <b>Previous Hospitalization:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->prev_hospitalization }}
                        </span>
                        <br>
                        <b>Previous Operation:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->prev_operation }}
                        </span>
                        <br>
                        <b>Recent Medications Intake:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->recent_med_intake }}
                        </span>
                        <br>
                    </span>
                </p>
                <p style="line-height: 1; text-align: left;">
                    <strong>
                        <span style="font-size: 12pt;">
                            REVIEW OF SYSTEMS
                        </span></strong>
                </p>
                <p style="line-height: 1.3; text-align: left;">
                    <span style="font-size: 10pt;">
                        <b>Normal</b>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Abnormal</b>
                        <br>
                        @if ($operativeClearanceForm->normal_general)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif
                        General
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_general }} <br>
                        @if ($operativeClearanceForm->agent)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif
                        Skin
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_skin }} <br>
                        @if ($operativeClearanceForm->normal_eent)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif EENT
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp;
                        {{ $operativeClearanceForm->abnormal_eent }} <br>
                        @if ($operativeClearanceForm->normal_respiratory)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Respiratory
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_respiratory }} <br>
                        @if ($operativeClearanceForm->normal_cardio)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Cardiovascular
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_cardio }} <br>
                        @if ($operativeClearanceForm->normal_gastro)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Gastrointestinal
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_cardio }}<br>
                        @if ($operativeClearanceForm->normal_renal)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Renal &amp; Urinary
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_renal }}<br>
                        @if ($operativeClearanceForm->normal_gyne)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Gynecological
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_gyne }} <br>
                        @if ($operativeClearanceForm->normal_male)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Male Genitalia
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_male }}<br>
                        @if ($operativeClearanceForm->normal_musculo)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Musculoskeletal
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_musculo }}<br>
                        @if ($operativeClearanceForm->normal_hematological)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Hematological
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        {{ $operativeClearanceForm->abnormal_hematological }}<br>
                        @if ($operativeClearanceForm->normal_endocrine)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Endocrine &amp; Metabolic
                        &nbsp;
                        {{ $operativeClearanceForm->abnormal_endocrine }} <br>
                        @if ($operativeClearanceForm->normal_nervous)
                            <i class="fas fa-square"></i>
                        @else
                            <i class="far fa-square"></i>
                        @endif Nervous System
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                        {{ $operativeClearanceForm->abnormal_nervous }}
                    </span>
                </p>

                <p style="line-height: 1; text-align: left;">
                    <strong>
                        <span style="font-size: 12pt;">
                            PHYSICAL EXAMINATION
                        </span>
                    </strong>
                    <span style="font-size: 10pt;">
                        &nbsp;
                        <br>
                        &nbsp;
                        <b>Vital Signs:</b>
                        &nbsp;
                        <b>BP:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->bp }}
                        </span>
                        &nbsp;
                        <b>CR:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->cr }}
                        </span>
                        &nbsp;
                        <b>RR:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->rr }}
                        </span>
                        &nbsp;
                        <b>TEMP:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->temp }}
                        </span>
                    </span>
                </p>

                <p style="line-height: 1.3; text-align: left;">
                    <span style="font-size: 10pt;">
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Skin:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->skin }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>HEENT:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->heent }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Neck:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->neck }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Chest / Lungs:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->chest_lungs }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Heart:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->heart }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Abdomen:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->abdomen }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Musculoskeletal:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->musculoskeletal }}
                        </span>
                        <br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>Neurological:</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->neurological }}
                        </span>
                    </span>
                </p>
                <p style="line-height: 1.3; text-align: left;">
                    <span style="font-size: 12pt;">
                        <strong>
                            LABORATORY / IMAGING DATA
                            <br>
                        </strong>
                    </span> &nbsp;&nbsp; &nbsp;
                    <b>Chest X-Ray</b>
                    &nbsp; &nbsp; &nbsp;
                    <span style="text-decoration: underline;">
                        {{ $operativeClearanceForm->chest_xray }}
                    </span>
                    <br>&nbsp;&nbsp; &nbsp;
                    <b>ECG</b>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <span style="text-decoration: underline;">
                        {{ $operativeClearanceForm->ecg }}
                    </span>
                    <br>
                    </span>&nbsp;&nbsp; &nbsp;
                    <span style="font-size: 10pt;">
                        <b>2D Echo</b>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->echo }}
                        </span>
                        <br>&nbsp;&nbsp; &nbsp;
                        <b>CBC</b>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->cbc }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        <b>Urinalysis</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->urinalysis }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                        <b>Others</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->others }}
                        </span>
                        <br>&nbsp;&nbsp; &nbsp;
                        <b>FBS</b>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->fbs }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                        <b>Creatinine</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->creatinine }}
                        </span>
                        &nbsp; &nbsp; &nbsp;
                        <b>SGPT</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->sgpt }}
                        </span>
                        <br>&nbsp;&nbsp; &nbsp;
                        <b>Protime</b>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->protime }}
                        </span>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <b>APTT</b>
                        <span style="text-decoration: underline;">
                            {{ $operativeClearanceForm->aptt }}
                        </span>
                    </span>
                    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                    <b>Bleeding Time</b>
                    <span style="text-decoration: underline;">
                        {{ $operativeClearanceForm->bleeding_time }}
                    </span>
                    </span>
                </p>
                <p style="line-height: 1; text-align: left;">
                    <span style="font-size: 12pt;">
                        <strong>
                            RAPID PRE - OPERATIVE ASSESSMENT
                            <br>
                        </strong>
                    </span>
                </p>
                <table style="border-collapse: collapse; width: 99.9828%; height: 312.8px; border: 1px solid black;"
                    border="1">
                    <colgroup>
                        <col style="width: 86.192%;">
                        <col style="width: 6.63679%;">
                        <col style="width: 7.15394%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 16px;">
                            <td style="height: 16px; line-height: 1; text-align: center; border: 1px solid black;"
                                colspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        REVISED CARDIAC RISK INDEX (LEE CRITERIA)
                                    </strong>
                                </span>
                            </td>
                        </tr>

                        <tr style="height: 16px;">
                            <td style="height: 16px; line-height: 1; text-align: center; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        CATEGORY
                                    </strong>
                                </span>
                            </td>
                            <td style="height: 16px; line-height: 1; text-align: center; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        YES
                                    </strong>
                                </span>
                            </td>
                            <td style="height: 16px; line-height: 1; text-align: center; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        NO
                                    </strong>
                                </span>
                            </td>
                        </tr>

                        <tr style="height: 40.8px; border: 1px solid black;">
                            <td style="text-align: left; height: 40.8px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        High Risk Surgery
                                    </strong>
                                    <br>&nbsp;
                                    Intraperitoneal; Intrathoracic; Suprainguinal Vascular
                                    <br>
                                </span>
                            </td>
                            <td style="line-height: 1; height: 40.8px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->high_risk_surgery == 'Yes')
                                    {{ $operativeClearanceForm->high_risk_surgery }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 40.8px; border: 1px solid black;  text-align: center;">
                                @if ($operativeClearanceForm->high_risk_surgery == 'No')
                                    {{ $operativeClearanceForm->high_risk_surgery }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 67.2px; border: 1px solid black;">
                            <td style="text-align: left; height: 67.2px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        Presence of Coronary Artery Disease
                                    </strong>
                                    <br>&nbsp;
                                    History of myocardial infarction (MI); History of positive exercise test; Current
                                    complaint of ischemic chest pain or use of nitrate therapy; ECG with Q waves; <br> &nbsp; With prior
                                    CABG surgery or PTCA are included only if they had current complaints of chest pain that
                                    are presumed to be due to ischemia.
                                    <br>
                                </span>
                            </td>
                            <td style="line-height: 1; height: 67.2px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->coronary_artery_disease_presence == 'Yes')
                                    {{ $operativeClearanceForm->coronary_artery_disease_presence }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 67.2px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->coronary_artery_disease_presence == 'No')
                                    {{ $operativeClearanceForm->coronary_artery_disease_presence }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 67.2px;">
                            <td style="text-align: left; height: 67.2px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        Presence of Congestion Heart Failure
                                    </strong>
                                    <br>&nbsp;
                                    History of congestive heart failure, pulmonary edema, or paroxysmal nocturnal dyspnea;
                                    Physical examination showing bilateral rales or S3 gallop;<br>&nbsp; or chest radiograph showing
                                    pulmonary vascular redistribution<br></span>
                            </td>
                            <td style="line-height: 1; height: 67.2px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->congestion_heart_failure_presence == 'Yes')
                                    {{ $operativeClearanceForm->congestion_heart_failure_presence }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 67.2px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->congestion_heart_failure_presence == 'No')
                                    {{ $operativeClearanceForm->congestion_heart_failure_presence }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 44.8px;">
                            <td style="text-align: left; height: 44.8px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        Cerebrovascular Disease
                                        <br>
                                    </strong>&nbsp;
                                    History of ischemic attack or stroke
                                </span>
                            </td>
                            <td style="line-height: 1; height: 44.8px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->cerebrovascular_disease == 'Yes')
                                    {{ $operativeClearanceForm->cerebrovascular_disease }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 44.8px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->cerebrovascular_disease == 'No')
                                    {{ $operativeClearanceForm->cerebrovascular_disease }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 22.4px;">
                            <td style="text-align: left; height: 22.4px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        Diabetes Mellitus or Insulin
                                    </strong>
                                </span>
                            </td>
                            <td style="line-height: 1; height: 22.4px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->diabetes_mellitus_insulin == 'Yes')
                                    {{ $operativeClearanceForm->diabetes_mellitus_insulin }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 22.4px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->diabetes_mellitus_insulin == 'No')
                                    {{ $operativeClearanceForm->diabetes_mellitus_insulin }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 22.4px;">
                            <td style="text-align: left; height: 22.4px; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    <strong>&nbsp;
                                        Serum Creatinine &gt; 2mg/dl or &gt;177 mol/L
                                    </strong>
                                </span>
                            </td>
                            <td style="line-height: 1; height: 22.4px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->serum_creatinine == 'Yes')
                                    {{ $operativeClearanceForm->serum_creatinine }}
                                @endif
                            </td>
                            <td style="line-height: 1; height: 22.4px; border: 1px solid black; text-align: center;">
                                @if ($operativeClearanceForm->serum_creatinine == 'No')
                                    {{ $operativeClearanceForm->serum_creatinine }}
                                @endif
                            </td>
                        </tr>
                        <tr style="height: 16px;">
                            <td style="line-height: 1; height: 16px; text-align: right; border: 1px solid black;">
                                <strong>
                                    <span style="font-size: 10pt;">
                                        TOTAL SCORE (1 point per yes)
                                    </span>
                                </strong>
                            </td>
                            <td style="line-height: 1; height: 16px; text-align: center" colspan="2">
                                &nbsp;
                                {{ $operativeClearanceForm->total_score_per_yes }}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p style="line-height: 1; text-align: left;">
                    <span style="font-size: 10pt;">
                        &nbsp;
                    </span>
                </p>
                <table style="border: 1px solid black; width: 99.9505%; height: 90px;">
                    <colgroup>
                        <col style="width: 33.3671%;">
                        <col style="width: 33.3671%;">
                        <col style="width: 33.2809%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 16px; border: 1px solid black;">
                            <td style="text-align: center; height: 16px; line-height: 1;" colspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        Risk of Major Cardiac Event
                                    </strong>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 16px; border: 1px solid black;">
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    POINTS
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    CLASS
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    RISK
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 16px; border: 1px solid black;">
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    0
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">I
                                    &nbsp;
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    0.4%
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 16px; border: 1px solid black;">
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    1
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    II
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    0.9%
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 10px; border: 1px solid black;">
                            <td style="text-align: center; height: 10px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    2
                                </span>
                            </td>
                            <td style="text-align: center; height: 10px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    III
                                </span>
                            </td>
                            <td style="text-align: center; height: 10px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    6.6%
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 16px;">
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    3 or more
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    IV
                                </span>
                            </td>
                            <td style="text-align: center; height: 16px; line-height: 1; border: 1px solid black;">
                                <span style="font-size: 10pt;">
                                    11%
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p>
                    <span style="font-size: 10pt;">
                        <em>
                            Major cardiac event includes Myocardial Infarction, Pulmonary Edema, Ventricular Fibrillation,
                            Primary Cardiac Arrest and Complete Heart Block.
                        </em>
                    </span>
                </p>
                <p>
                    <span style="font-size: 10pt;">
                        <b>
                            Assessment / Suggestions / Recommendation:
                        </b>
                    </span>
                    {{ $operativeClearanceForm->assessment_suggestion_recommendation }}
                </p>
                <p style="text-align: center;">
                    <span style="font-size: 10pt;">
                        <br>
                        <br>
                        <br>
                        <b style="text-decoration: underline;">
                            {{ $operativeClearanceForm->medical_consultant_first_name . ' ' }}
                            {{ $operativeClearanceForm->medical_consultant_middle_name . ' ' }}
                            {{ $operativeClearanceForm->medical_consultant_last_name }}
                        </b>
                        <br>
                        Medical Consultant
                        <br>
                        ( Signature over Printed Name )
                        <br>
                    </span>
                </p>
                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
