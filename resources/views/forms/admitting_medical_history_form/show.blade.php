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
                                <a href="{{ route('admitting_medical_history_form.index') }}" class="btn btn-dark">
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
                        <strong>ADMITTING MEDICAL HISTORY FORM</strong>
                    </span>
                </p>



                <table style="border-collapse: collapse; width: 99.3799%; height: 1633.02px; border-width: 1px;"
                    border="1">
                    <colgroup>
                        <col style="width: 57.1649%;">
                        <col style="width: 0.526039%;">
                        <col style="width: 42.3213%;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 64.0556px;">
                            <td style="height: 64.0556px; border-width: 1px; line-height: 1;" colspan="2"><span
                                    style="font-size: 10pt;"><strong>Name of Patient<br></strong><strong>&nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp;&nbsp;</strong></span>
                                <table
                                    style="border-collapse: collapse; width: 91.5255%; height: 17.3375px; border-width: 0px;"
                                    border="1">
                                    <colgroup>
                                        <col style="width: 33.2893%;">
                                        <col style="width: 33.2893%;">
                                        <col style="width: 33.3785%;">
                                    </colgroup>
                                    <tbody>
                                        <tr style="height: 17.3375px;">
                                            <td style="text-align: center; border-width: 0px; height: 17.3375px;">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    {{ $patientAdmittingMedicalHistoryFormForm->patient_last_name }}
                                                </span>
                                            </td>
                                            <td style="text-align: center; border-width: 0px; height: 17.3375px;"><span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    {{ $patientAdmittingMedicalHistoryFormForm->patient_first_name }},
                                                </span>
                                            </td>
                                            <td style="text-align: center; border-width: 0px; height: 17.3375px;">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    {{ $patientAdmittingMedicalHistoryFormForm->patient_middle_name }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border-width: 1px; height: 64.0556px; line-height: 1;">
                                <span style="font-size: 10pt;">
                                    <strong>
                                        ADMISSION DATE/TIME:
                                        {{ \Carbon\Carbon::parse($patientAdmittingMedicalHistoryFormForm->admission_date_time)->format('M d, Y g:i A') }}
                                    </strong>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 0px;">
                            <td style="border-width: 1px; line-height: 1; height: 61.6667px;" colspan="2" rowspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>Chief Complaint</strong>
                                    {{ $patientAdmittingMedicalHistoryFormForm->chief_complaint }}
                                </span>
                            </td>
                            <td style="border-width: 1px; line-height: 1; height: 61.6667px;" rowspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>Age:</strong>
                                    {{ \Carbon\Carbon::parse($patientAdmittingMedicalHistoryFormForm->date_of_birth)->age }}
                                </span><br>
                                <span style="font-size: 10pt;">
                                    <strong>Sex: </strong>
                                    {{ $patientAdmittingMedicalHistoryFormForm->sex }}

                                </span>
                            </td>
                        </tr>
                        <tr style="height: 0px;"></tr>
                        <tr style="height: 61.6667px;"></tr>
                        <tr style="height: 32px;">
                            <td style="border-width: 1px; height: 32px; line-height: 1;" colspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>Referred from another health care institution (HCI):
                                        @if ($patientAdmittingMedicalHistoryFormForm->referred_from_hci == 'no')
                                            <i class="fas fa-square"></i> No
                                        @else
                                            <i class="far fa-square"></i> No
                                        @endif
                                        @if ($patientAdmittingMedicalHistoryFormForm->referred_from_hci == 'yes')
                                            <i class="fas fa-square"></i> Yes
                                        @else
                                            <i class="far fa-square"></i> Yes
                                        @endif
                                        , Specify Reason:
                                        {{ $patientAdmittingMedicalHistoryFormForm->yes_reason }}
                                        <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        Name of Originating HCI:
                                        {{ $patientAdmittingMedicalHistoryFormForm->originating_hci_name }}
                                    </strong>
                                    <strong><br></strong>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 16px;">
                            <td style="height: 16px; text-align: center; border-width: 1px; line-height: 1;" colspan="3">
                                <span style="font-size: 10pt;">
                                    <strong>REASON FOR ADMISSION</strong>
                                    <strong><br></strong>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 79.9306px;">
                            <td style="border-width: 1px; height: 79.9306px; text-align: left; line-height: 1;"
                                colspan="3">
                                <p style="line-height: 1;">
                                    <span style="font-size: 10pt;">
                                        <strong>History of Present Illness:<br></strong>
                                        {{ $patientAdmittingMedicalHistoryFormForm->present_illness_history }}
                                    </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height: 0px;">
                            <td style="text-align: left; height: 141.292px; border-width: 1px; line-height: 1;"
                                colspan="3" rowspan="3">
                                <p>
                                    <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                        <strong>Pertinent Past Medical History:<br><br></strong>
                                        <strong>OB/GYN History<br>
                                            G: {{ $patientAdmittingMedicalHistoryFormForm->g }}
                                            P: {{ $patientAdmittingMedicalHistoryFormForm->p }}
                                            LMP: {{ $patientAdmittingMedicalHistoryFormForm->lmp }}
                                            @if (empty($patientAdmittingMedicalHistoryFormForm->g) &&
                                                    empty($patientAdmittingMedicalHistoryFormForm->p) &&
                                                    empty($patientAdmittingMedicalHistoryFormForm->lmp))
                                                <i class="fas fa-square"></i> N/A
                                            @else
                                                <i class="far fa-square"></i> N/A
                                            @endif
                                        </strong>
                                    </span>
                                </p>
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <strong>
                                            Personal History:<br>
                                        </strong>
                                        Allergies: {{ $patientAdmittingMedicalHistoryFormForm->allergies }}
                                        Smoker: {{ $patientAdmittingMedicalHistoryFormForm->smoker }}
                                        Alcohol Drinks: {{ $patientAdmittingMedicalHistoryFormForm->alcohol_drinks }}
                                    </span>
                                </p>
                            </td>
                        </tr>
                        <tr style="height: 0px;"></tr>
                        <tr style="height: 141.292px;"></tr>
                        <tr style="height: 224.181px;">
                            <td style="text-align: left; height: 224.181px; border-width: 1px; line-height: 1;"
                                colspan="3">
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <strong>
                                            Pertinent Signs and Symptoms on Admission (tick applicable box/es):
                                        </strong>
                                    </span>
                                </p>


                                <table>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            @if ($patientAdmittingMedicalHistoryFormForm->altered_mental_sensorium == 'Altered mental sensorium')
                                                <i class="fas fa-square"></i> Altered mental sensorium
                                            @else
                                                <i class="far fa-square"></i> Altered mental sensorium
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdominal_cramp_pain == 'Abdominal cramp/pain')
                                                <i class="fas fa-square"></i> Abdominal cramp/pain
                                            @else
                                                <i class="far fa-square"></i> Abdominal cramp/pain
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->anorexia == 'Anorexia')
                                                <i class="fas fa-square"></i> Anorexia
                                            @else
                                                <i class="far fa-square"></i> Anorexia
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->bleeding_gums == 'Bleeding gums')
                                                <i class="fas fa-square"></i> Bleeding gums
                                            @else
                                                <i class="far fa-square"></i> Bleeding gums
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->body_weakness == 'Body weakness')
                                                <i class="fas fa-square"></i> Body weakness
                                            @else
                                                <i class="far fa-square"></i> Body weakness
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->vision_blurring == 'Blurring of vision')
                                                <i class="fas fa-square"></i> Blurring of vision
                                            @else
                                                <i class="far fa-square"></i> Blurring of vision
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chestpain_discomfort == 'Chest pain/discomfort')
                                                <i class="fas fa-square"></i> Chest pain/discomfort
                                            @else
                                                <i class="far fa-square"></i> Chest pain/discomfort
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->constipation == 'Constipation')
                                                <i class="fas fa-square"></i> Constipation
                                            @else
                                                <i class="far fa-square"></i> Constipation
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cough == 'Cough')
                                                <i class="fas fa-square"></i> Cough
                                            @else
                                                <i class="far fa-square"></i> Cough
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            @if ($patientAdmittingMedicalHistoryFormForm->diarrhea == 'Diarrhea')
                                                <i class="fas fa-square"></i> Diarrhea
                                            @else
                                                <i class="far fa-square"></i> Diarrhea
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->dizziness == 'Dizziness')
                                                <i class="fas fa-square"></i> Dizziness
                                            @else
                                                <i class="far fa-square"></i> Dizziness
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->dysphagia == 'Dysphagia')
                                                <i class="fas fa-square"></i> Dysphagia
                                            @else
                                                <i class="far fa-square"></i> Dysphagia
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->dyspnea == 'Dyspnea')
                                                <i class="fas fa-square"></i> Dyspnea
                                            @else
                                                <i class="far fa-square"></i> Dyspnea
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->dysuria == 'Dysuria')
                                                <i class="fas fa-square"></i> Dysuria
                                            @else
                                                <i class="far fa-square"></i> Dysuria
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->epistaxis == 'Epistaxis')
                                                <i class="fas fa-square"></i> Epistaxis
                                            @else
                                                <i class="far fa-square"></i> Epistaxis
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->fever == 'Fever')
                                                <i class="fas fa-square"></i> Fever
                                            @else
                                                <i class="far fa-square"></i> Fever
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->urination_frequency == 'Urination Frequency')
                                                <i class="fas fa-square"></i> Urination Frequency
                                            @else
                                                <i class="far fa-square"></i> Urination Frequency
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->headache == 'Headache')
                                                <i class="fas fa-square"></i> Headache
                                            @else
                                                <i class="far fa-square"></i> Headache
                                            @endif
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            @if ($patientAdmittingMedicalHistoryFormForm->hematemesis == 'Hematemesis')
                                                <i class="fas fa-square"></i> Hematemesis
                                            @else
                                                <i class="far fa-square"></i> Hematemesis
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->hematuria == 'Hematuria')
                                                <i class="fas fa-square"></i> Hematuria
                                            @else
                                                <i class="far fa-square"></i> Hematuria
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->hemoptysis == 'Hemoptysis')
                                                <i class="fas fa-square"></i> Hemoptysis
                                            @else
                                                <i class="far fa-square"></i> Hemoptysis
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->irritability == 'Irritability')
                                                <i class="fas fa-square"></i> Irritability
                                            @else
                                                <i class="far fa-square"></i> Irritability
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->jaundice == 'Jaundice')
                                                <i class="fas fa-square"></i> Jaundice
                                            @else
                                                <i class="far fa-square"></i> Jaundice
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->lower_extremity_edema == 'Lower Extremity Edema')
                                                <i class="fas fa-square"></i> Lower Extremity Edema
                                            @else
                                                <i class="far fa-square"></i> Lower Extremity Edema
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->myalgia == 'Myalgia')
                                                <i class="fas fa-square"></i> Myalgia
                                            @else
                                                <i class="far fa-square"></i> Myalgia
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->orthopnea == 'Orthopnea')
                                                <i class="fas fa-square"></i> Orthopnea
                                            @else
                                                <i class="far fa-square"></i> Orthopnea
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->pain == 'Pain')
                                                <i class="fas fa-square"></i> Pain
                                            @else
                                                <i class="far fa-square"></i> Pain
                                            @endif
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            @if ($patientAdmittingMedicalHistoryFormForm->palpitations == 'Palpitations')
                                                <i class="fas fa-square"></i> Palpitations
                                            @else
                                                <i class="far fa-square"></i> Palpitations
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->seizures == 'Seizures')
                                                <i class="fas fa-square"></i> Seizures
                                            @else
                                                <i class="far fa-square"></i> Seizures
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_rashes == 'Skin Rashes')
                                                <i class="fas fa-square"></i> Skin Rashes
                                            @else
                                                <i class="far fa-square"></i> Skin Rashes
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->stool_bloodyblack_tarrymucoid == 'Stool Bloodyblack Tarrymucoid')
                                                <i class="fas fa-square"></i> Stool, bloody/black tarry mucoid
                                            @else
                                                <i class="far fa-square"></i> Stool, bloody/black tarry mucoid
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->sweating == 'Sweating')
                                                <i class="fas fa-square"></i> Sweating
                                            @else
                                                <i class="far fa-square"></i> Sweating
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->urgency == 'Urgency')
                                                <i class="fas fa-square"></i> Urgency
                                            @else
                                                <i class="far fa-square"></i> Urgency
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->vomiting == 'Vomiting')
                                                <i class="fas fa-square"></i> Vomiting
                                            @else
                                                <i class="far fa-square"></i> Vomiting
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->weight_loss == 'Weight Loss')
                                                <i class="fas fa-square"></i> Weight Loss
                                            @else
                                                <i class="far fa-square"></i> Weight Loss
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->symptoms_others == 'Symptoms Others')
                                                <i class="fas fa-square"></i> Others
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr style="height: 1013.89px;">
                            <td style="text-align: left; height: 1013.89px; border-width: 1px; line-height: 1.2;"
                                colspan="3">
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <strong>
                                            Physical Examination on Admission (Pertinent Findings per System)
                                        </strong>
                                    </span>
                                </p>
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <b>General Survey</b>&nbsp; &nbsp;
                                        @if ($patientAdmittingMedicalHistoryFormForm->general_survey == 'Awake and alert')
                                            <i class="fas fa-square"></i> Awake and alert&nbsp; &nbsp;
                                            <i class="far fa-square"></i> Altered sensorium: __________________
                                        @else
                                            <i class="far fa-square"></i> Awake and alert&nbsp; &nbsp;
                                            <i class="fas fa-square"></i> Altered sensorium:
                                            {{ $patientAdmittingMedicalHistoryFormForm->general_survey }}
                                        @endif
                                        <br>
                                    </span>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <b>Vital signs</b>&nbsp; &nbsp; &nbsp;
                                        BP: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->bp }}</span>&nbsp;&nbsp;&nbsp;
                                        HR: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->hr }}</span>&nbsp;&nbsp;&nbsp;
                                        RR: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->rr }}</span>&nbsp;&nbsp;&nbsp;
                                        <br>
                                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        &nbsp;&nbsp;&nbsp;
                                        Temp: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->temp }}</span>&nbsp;&nbsp;&nbsp;
                                        02 Sat <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->sat }}</span>%&nbsp;&nbsp;&nbsp;
                                        <br>
                                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        &nbsp;&nbsp;&nbsp;
                                        Height: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->height }}</span>
                                        &nbsp;&nbsp;&nbsp;
                                        Weight: <span
                                            style="text-decoration: underline;">{{ $patientAdmittingMedicalHistoryFormForm->weight }}</span>
                                        <br><br>
                                    </span>
                                    <span style="font-size: 10pt;">
                                        <span style="font-family: arial, helvetica, sans-serif;">
                                            <b>HEENT</b>&nbsp; &nbsp;&nbsp; &nbsp;
                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Cervical lymphadenopathy')
                                                <i class="fas fa-square"></i> Cervical lymphadenopathy
                                            @else
                                                <i class="far fa-square"></i> Cervical lymphadenopathy
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Pale conjuctivae')
                                                <i class="fas fa-square"></i> Pale conjuctivae
                                            @else
                                                <i class="far fa-square"></i> Pale conjuctivae
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Sunken eyeball')
                                                <i class="fas fa-square"></i> Sunken eyeball
                                            @else
                                                <i class="far fa-square"></i> Sunken eyeball
                                            @endif

                                            <br>
                                            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Icteric sclerae')
                                                <i class="fas fa-square"></i> Icteric sclerae
                                            @else
                                                <i class="far fa-square"></i> Icteric sclerae
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Abnormal pupiliary reaction')
                                                <i class="fas fa-square"></i> Abnormal pupiliary reaction
                                            @else
                                                <i class="far fa-square"></i> Abnormal pupiliary reaction
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Sunken fontanelle')
                                                <i class="fas fa-square"></i> Sunken fontanelle
                                            @else
                                                <i class="far fa-square"></i> Sunken fontanelle
                                            @endif

                                            @if ($patientAdmittingMedicalHistoryFormForm->heent == 'Dry mucous membrane')
                                                <i class="fas fa-square"></i> Dry mucous membrane
                                            @else
                                                <i class="far fa-square"></i> Dry mucous membrane
                                            @endif

                                            <br>
                                            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                                            Others:
                                            <span style="text-decoration: underline;">
                                                {{ $patientAdmittingMedicalHistoryFormForm->heent_others }}
                                            </span>

                                        </span>
                                </p>

                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <strong>
                                            Physical Examination continued (Pertinent Findings per System)
                                        </strong>
                                    </span>
                                </p>

                                <table>
                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>CHEST/LUNGS:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Asymmetrical chest expansion')
                                                <i class="fas fa-square"></i> Asymmetrical chest expansion
                                            @else
                                                <i class="far fa-square"></i> Asymmetrical chest expansion
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Decreased breath sounds')
                                                <i class="fas fa-square"></i> Decreased breath sounds
                                            @else
                                                <i class="far fa-square"></i> Decreased breath sounds
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Wheezes')
                                                <i class="fas fa-square"></i> Wheezes
                                            @else
                                                <i class="far fa-square"></i> Wheezes
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Lump/s over breasts')
                                                <i class="fas fa-square"></i> Lump/s over breasts
                                            @else
                                                <i class="far fa-square"></i> Lump/s over breasts
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Rales/crackles/rhonchi')
                                                <i class="fas fa-square"></i> Rales/crackles/rhonchi
                                            @else
                                                <i class="far fa-square"></i> Rales/crackles/rhonchi
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->chest_lungs == 'Intercostal rib/clavicular retraction')
                                                <i class="fas fa-square"></i> Intercostal rib/clavicular retraction
                                            @else
                                                <i class="far fa-square"></i> Intercostal rib/clavicular retraction
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->chest_lungs_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->chest_lungs_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>CVS:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Displaced apex beat')
                                                <i class="fas fa-square"></i> Displaced apex beat
                                            @else
                                                <i class="far fa-square"></i> Displaced apex beat
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Heaves and/or thrills')
                                                <i class="fas fa-square"></i> Heaves and/or thrills
                                            @else
                                                <i class="far fa-square"></i> Heaves and/or thrills
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Pericardial bulge')
                                                <i class="fas fa-square"></i> Pericardial bulge
                                            @else
                                                <i class="far fa-square"></i> Pericardial bulge
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Irregular rhythm')
                                                <i class="fas fa-square"></i> Irregular rhythm
                                            @else
                                                <i class="far fa-square"></i> Irregular rhythm
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Muffled heart sounds')
                                                <i class="fas fa-square"></i> Muffled heart sounds
                                            @else
                                                <i class="far fa-square"></i> Muffled heart sounds
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->cvs == 'Murmur')
                                                <i class="fas fa-square"></i> Murmur
                                            @else
                                                <i class="far fa-square"></i> Murmur
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->cvs_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->cvs_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>ABDOMEN:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Abdominal rigidity')
                                                <i class="fas fa-square"></i> Abdominal rigidity
                                            @else
                                                <i class="far fa-square"></i> Abdominal rigidity
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Abdomen tenderness')
                                                <i class="fas fa-square"></i> Abdomen tenderness
                                            @else
                                                <i class="far fa-square"></i> Abdomen tenderness
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Hyperactive bowel sounds')
                                                <i class="fas fa-square"></i> Hyperactive bowel sounds
                                            @else
                                                <i class="far fa-square"></i> Hyperactive bowel sounds
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Palpable mass(es)')
                                                <i class="fas fa-square"></i> Palpable mass(es)
                                            @else
                                                <i class="far fa-square"></i> Palpable mass(es)
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Tympanitic/dull abdomen')
                                                <i class="fas fa-square"></i> Tympanitic/dull abdomen
                                            @else
                                                <i class="far fa-square"></i> Tympanitic/dull abdomen
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->abdomen == 'Uterine contraction')
                                                <i class="fas fa-square"></i> Uterine contraction
                                            @else
                                                <i class="far fa-square"></i> Uterine contraction
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->abdomen_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->abdomen_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>GU (IE):</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->gu == 'Blood stained in exam finger')
                                                <i class="fas fa-square"></i> Blood stained in exam finger
                                            @else
                                                <i class="far fa-square"></i> Blood stained in exam finger
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->gu == 'Cervical dilatation')
                                                <i class="fas fa-square"></i> Cervical dilatation
                                            @else
                                                <i class="far fa-square"></i> Cervical dilatation
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->gu == 'Presence of abnormal discharge')
                                                <i class="fas fa-square"></i> Presence of abnormal discharge
                                            @else
                                                <i class="far fa-square"></i> Presence of abnormal discharge
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->gu_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->gu_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>SKIN/EXTREMITIES:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Clubbing')
                                                <i class="fas fa-square"></i> Clubbing
                                            @else
                                                <i class="far fa-square"></i> Clubbing
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Cold clammy skin')
                                                <i class="fas fa-square"></i> Cold clammy skin
                                            @else
                                                <i class="far fa-square"></i> Cold clammy skin
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Cyanosis/mottled skin')
                                                <i class="fas fa-square"></i> Cyanosis/mottled skin
                                            @else
                                                <i class="far fa-square"></i> Cyanosis/mottled skin
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Edema/swelling')
                                                <i class="fas fa-square"></i> Edema/swelling
                                            @else
                                                <i class="far fa-square"></i> Edema/swelling
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Decreased mobility')
                                                <i class="fas fa-square"></i> Decreased mobility
                                            @else
                                                <i class="far fa-square"></i> Decreased mobility
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Pale nailbeds')
                                                <i class="fas fa-square"></i> Pale nailbeds
                                            @else
                                                <i class="far fa-square"></i> Pale nailbeds
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Poor skin turgor')
                                                <i class="fas fa-square"></i> Poor skin turgor
                                            @else
                                                <i class="far fa-square"></i> Poor skin turgor
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Rashes/petechiae')
                                                <i class="fas fa-square"></i> Rashes/petechiae
                                            @else
                                                <i class="far fa-square"></i> Rashes/petechiae
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->skin_extremities == 'Weak pulses')
                                                <i class="fas fa-square"></i> Weak pulses
                                            @else
                                                <i class="far fa-square"></i> Weak pulses
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->skin_extremities_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->skin_extremities_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>NEURO-EXAM:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Abnormal gait')
                                                <i class="fas fa-square"></i> Abnormal gait
                                            @else
                                                <i class="far fa-square"></i> Abnormal gait
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Abnormal position sense')
                                                <i class="fas fa-square"></i> Abnormal position sense
                                            @else
                                                <i class="far fa-square"></i> Abnormal position sense
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Abnormal/decreased sensation')
                                                <i class="fas fa-square"></i> Abnormal/decreased sensation
                                            @else
                                                <i class="far fa-square"></i> Abnormal/decreased sensation
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Abnormal reflex(es)')
                                                <i class="fas fa-square"></i> Abnormal reflex(es)
                                            @else
                                                <i class="far fa-square"></i> Abnormal reflex(es)
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Poor/altered memory')
                                                <i class="fas fa-square"></i> Poor/altered memory
                                            @else
                                                <i class="far fa-square"></i> Poor/altered memory
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Poor muscle tone/strength')
                                                <i class="fas fa-square"></i> Poor muscle tone/strength
                                            @else
                                                <i class="far fa-square"></i> Poor muscle tone/strength
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->neuro_exam == 'Poor coordination')
                                                <i class="fas fa-square"></i> Poor coordination
                                            @else
                                                <i class="far fa-square"></i> Poor coordination
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->neuro_exam_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->neuro_exam_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>

                                        <td>
                                            <b>DIGITAL RECTAL:</b><br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->digital_rectal == 'Essentially normal')
                                                <i class="fas fa-square"></i> Essentially normal
                                            @else
                                                <i class="far fa-square"></i> Essentially normal
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->digital_rectal == 'Enlarge Prostate')
                                                <i class="fas fa-square"></i> Enlarge Prostate
                                            @else
                                                <i class="far fa-square"></i> Enlarge Prostate
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->digital_rectal == 'Hemorrhoids')
                                                <i class="fas fa-square"></i> Hemorrhoids
                                            @else
                                                <i class="far fa-square"></i> Hemorrhoids
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->digital_rectal == 'Mass')
                                                <i class="fas fa-square"></i> Mass
                                            @else
                                                <i class="far fa-square"></i> Mass
                                            @endif
                                            <br>
                                            @if ($patientAdmittingMedicalHistoryFormForm->digital_rectal == 'Pus')
                                                <i class="fas fa-square"></i> Pus
                                            @else
                                                <i class="far fa-square"></i> Pus
                                            @endif
                                            <br>
                                            @if (!empty($patientAdmittingMedicalHistoryFormForm->digital_rectal_others))
                                                <i class="fas fa-square"></i>
                                                {{ $patientAdmittingMedicalHistoryFormForm->digital_rectal_others }}
                                            @else
                                                <i class="far fa-square"></i> Others
                                            @endif
                                            <br>
                                        </td>

                                        <td>&nbsp;&nbsp;&nbsp;</td>
                                    </tr>
                                </table>

                                <br>

                                <p>
                                </p>
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <b>
                                            &nbsp;
                                            GLASGOW COMA SCALE (GCS)
                                            &nbsp;
                                        </b>
                                    </span>
                                </p>

                                <table style="border-collapse: collapse; width: 78.9065%; height: 350px; margin: auto;"
                                    border="1">

                                    <tbody style="border-width: 1px;">
                                        <tr style="height: 17.3375px; border-width: 1px;">
                                            <td style="height: 17.3375px; border-width: 1px;" colspan="2">
                                                <span style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">
                                                    <strong>
                                                        &nbsp;
                                                        EYES OPEN
                                                        &nbsp;
                                                    </strong>
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        SCORE
                                                        &nbsp;
                                                    </strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 10px;">
                                            <td style="text-align: right; height: 10px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    Spontaneously<br>On Command<br>To Pain<br>No Response<br>
                                                </span>
                                            </td>
                                            <td style="text-align: center; height: 10px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    4<br>3<br>2<br>1
                                                </span>
                                            </td>
                                            <td style="height: 10px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        {{ $patientAdmittingMedicalHistoryFormForm->eyes_open }}
                                                    </strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 17.3375px;">
                                            <td style="height: 17.3375px; text-align: left; border-width: 1px;"
                                                colspan="2">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        BEST VERBAL RESPONSE
                                                    </strong>
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 17.3375px;">
                                            <td style="text-align: right; height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    Alert and Oriented<br>Confused<br>Inappropriate<br>Incomprehensive<br>No
                                                    reponse<br>
                                                </span>
                                            </td>
                                            <td style="text-align: center; height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    5<br>4<br>3<br>2<br>1
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        {{ $patientAdmittingMedicalHistoryFormForm->best_verbal_response }}
                                                    </strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 17.3375px;">
                                            <td style="height: 17.3375px; text-align: left; border-width: 1px;"
                                                colspan="2">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        BEST MOTOR RESPONSE
                                                    </strong>
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 17.3375px;">
                                            <td style="text-align: right; height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    Follow Directions<br>Localizes Pain<br>Withdraws from
                                                    pain<br>Decorticate
                                                    Posturing<br>Decerebrate Posturing<br>No Response<br>
                                                </span>
                                            </td>
                                            <td style="text-align: center; height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    6<br>5<br>4<br>3<br>2<br>1
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                                <strong
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 13.3333px;">&nbsp;
                                                </strong><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        {{ $patientAdmittingMedicalHistoryFormForm->best_motor_response }}
                                                    </strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span><br>
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>&nbsp;</strong>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr style="height: 17.3375px;">
                                            <td style="text-align: right; height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        TOTAL SCORE
                                                        &nbsp;
                                                    </strong>
                                                </span>
                                            </td>
                                            <td style="text-align: center; height: 17.3375px; border-width: 1px;">
                                                <span
                                                    style="font-family: arial, helvetica, sans-serif; font-size: 10pt;">&nbsp;
                                                </span>
                                            </td>
                                            <td style="height: 17.3375px; border-width: 1px;">
                                                <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                                    <strong>
                                                        &nbsp;
                                                        {{ $patientAdmittingMedicalHistoryFormForm->total_score }}
                                                    </strong>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <p>&nbsp;</p>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: left; border-width: 1px; line-height: 1;" colspan="3">
                                <p>
                                    <span style="font-size: 10pt; font-family: arial, helvetica, sans-serif;">
                                        <strong>
                                            &nbsp;
                                            ADMITTING IMPRESSION:
                                            &nbsp;
                                        </strong>
                                    </span>
                                    <br>
                                    &nbsp;
                                    {{ $patientAdmittingMedicalHistoryFormForm->admitting_impression }}
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <p>&nbsp;</p>

                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
