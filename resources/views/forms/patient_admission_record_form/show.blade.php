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
                                <a href="{{ route('patient_admission_record_form.index') }}" class="btn btn-dark">
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
                        <strong>PATIENT ADMISSION RECORD</strong>
                    </span>
                </p>







                <table style="border-collapse: collapse; width: 99.9787%; height: 630.8px; border: 1px solid;"
                    border="1">
                    <colgroup>
                        <col style="width: 31.2029%; border: 1px solid;">
                        <col style="width: 20.9456%; border: 1px solid;">
                        <col style="width: 25.1692%; border: 1px solid;">
                        <col style="width: 22.6695%; border: 1px solid;">
                    </colgroup>
                    <tbody>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Admission No.:
                                    {{ $patientPatientAdmissionRecordForm->admission_no }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Patient ID No.:
                                    {{ $patientPatientAdmissionRecordForm->patient_id_no }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    M.R Locator:
                                    {{ $patientPatientAdmissionRecordForm->m_r_locator }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Room No.:
                                    {{ $patientPatientAdmissionRecordForm->room_no }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px;border: 1px solid;">
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Last Name:&nbsp;<br>
                                    {{ $patientPatientAdmissionRecordForm->patient_last_name }}
                                    <br>
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    First Name:<br>
                                    {{ $patientPatientAdmissionRecordForm->patient_first_name }}
                                    <br>
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Middle Name:<br>
                                    {{ $patientPatientAdmissionRecordForm->patient_middle_name }}
                                    <br>
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Suffix Name:<br>
                                    {{ $patientPatientAdmissionRecordForm->patient_suffix_name }}
                                    <br>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Civil Status:&nbsp;&nbsp;
                                    {{ $patientPatientAdmissionRecordForm->civil_status }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Nationality:
                                    {{ $patientPatientAdmissionRecordForm->nationality }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->patient_tel_no }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Age:
                                    {{ \Carbon\Carbon::parse($patientPatientAdmissionRecordForm->date_of_birth)->age }}
                                    Sex:
                                    {{ $patientPatientAdmissionRecordForm->sex }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="4">
                                <span style="font-size: 10pt;">
                                    Address:
                                    {{ $patientPatientAdmissionRecordForm->address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Birth Place:&nbsp;
                                    {{ $patientPatientAdmissionRecordForm->birth_place }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Birth Date:
                                    {{ $patientPatientAdmissionRecordForm->date_of_birth }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Religion:
                                    {{ $patientPatientAdmissionRecordForm->religion }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 44.8px;" rowspan="2">
                                <span style="font-size: 10pt;">
                                    Occupation:
                                    {{ $patientPatientAdmissionRecordForm->patient_occupation }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Company:
                                    {{ $patientPatientAdmissionRecordForm->patient_company }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->patient_company_tel }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="3">
                                <span style="font-size: 10pt;">
                                    Address:
                                    {{ $patientPatientAdmissionRecordForm->patient_occupation_address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 44.8px;" rowspan="2">
                                <span style="font-size: 10pt;">
                                    Father:
                                    {{ $patientPatientAdmissionRecordForm->father }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">Occupation:
                                    {{ $patientPatientAdmissionRecordForm->f_occupation }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->f_tel_no }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="3">
                                <span style="font-size: 10pt;">
                                    Company Address:
                                    {{ $patientPatientAdmissionRecordForm->f_occupation_address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 44.8px;" rowspan="2">
                                <span style="font-size: 10pt;">
                                    Mother:
                                    {{ $patientPatientAdmissionRecordForm->mother }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Occupation:
                                    {{ $patientPatientAdmissionRecordForm->m_occupation }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->m_tel_no }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="3">
                                <span style="font-size: 10pt;">
                                    Company Address:
                                    {{ $patientPatientAdmissionRecordForm->m_occupation_address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 44.8px;" rowspan="2">
                                <span style="font-size: 10pt;">
                                    Spouse:
                                    {{ $patientPatientAdmissionRecordForm->spouse }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Occupation:
                                    {{ $patientPatientAdmissionRecordForm->s_occupation }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->s_tel_no }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="3">
                                <span style="font-size: 10pt;">
                                    Company Address:
                                    {{ $patientPatientAdmissionRecordForm->s_occupation_address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    In Case of Emergency:&nbsp;
                                    {{ $patientPatientAdmissionRecordForm->in_case_of_emergency_fullname }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Address:
                                    {{ $patientPatientAdmissionRecordForm->e_address }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Relation to Patient:
                                    {{ $patientPatientAdmissionRecordForm->relation_to_patient }}
                                </span>
                            </td>
                            <td style="height: 22.4px;">
                                <span style="font-size: 10pt;">
                                    Tel. No.:
                                    {{ $patientPatientAdmissionRecordForm->e_tel_no }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Admitting Check/Nurse:
                                    {{ $patientPatientAdmissionRecordForm->admitting_check_nurse }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Hospitalization Plan:
                                    {{ $patientPatientAdmissionRecordForm->hospitalization_plan }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Service Type:
                                    {{ $patientPatientAdmissionRecordForm->service_type }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="4">
                                <span style="font-size: 10pt;">
                                    Attending Physician:
                                    {{ $patientPatientAdmissionRecordForm->attending_physician_first_name . ' ' }}
                                    {{ $patientPatientAdmissionRecordForm->attending_physician_middle_name . ' ' }}
                                    {{ $patientPatientAdmissionRecordForm->attending_physician_last_name }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Admission Date &amp; Time:
                                    {{ \Carbon\Carbon::parse($patientPatientAdmissionRecordForm->admission_date_time)->format('M d, Y g:i A') }}
                                </span>
                            </td>
                            <td style="height: 22.4px;" colspan="2">
                                <span style="font-size: 10pt;">
                                    Discharge Date &amp; Time:
                                    {{ \Carbon\Carbon::parse($patientPatientAdmissionRecordForm->discharge_date_time)->format('M d, Y g:i A') }}
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 89.6px; border: 1px solid;">
                            <td style="text-align: center; height: 89.6px;" colspan="4">
                                <span style="font-size: 10pt;"><strong>I CERTIFY THAT THE FACTS I HAVE GIVEN ARE TRUE TO
                                        THE
                                        BEST OF MY KNOWLEDGE.<br></strong><strong>And as per agreement and/or guarantee,
                                        that I/we are responsible for all hospital bills and hereby agree to make partial
                                        payments within the patient&rsquo;s confinement period and after discharge as
                                        request by hospital staff.<br><br></strong>Signature Over Printed Name:
                                    <b style="text-decoration: underline;">
                                        {{ $patientPatientAdmissionRecordForm->guardian_fullname }}
                                    </b>
                                    &nbsp; &nbsp; &nbsp; &nbsp;Relationship:
                                    <b style="text-decoration: underline;">
                                        {{ $patientPatientAdmissionRecordForm->guardian_relationship }}
                                    </b>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="text-align: left; height: 22.4px;" colspan="4">
                                <span style="font-size: 10pt;">
                                    Impression / Provisional Diagnosis:<br>
                                    {{ $patientPatientAdmissionRecordForm->provisional_diagnosis }}
                                    <br>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="text-align: left; height: 22.4px;" colspan="4">
                                <span style="font-size: 10pt;">
                                    Final / Discharge Diagnosis:<br>
                                    {{ $patientPatientAdmissionRecordForm->discharge_diagnosis }}
                                    <br>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 22.4px; border: 1px solid;">
                            <td style="text-align: left; height: 22.4px;" colspan="4">
                                <span style="font-size: 10pt;">
                                    Procedure / Operations:<br>
                                    {{ $patientPatientAdmissionRecordForm->operations }}
                                    <br>
                                </span>
                            </td>
                        </tr>
                        <tr style="height: 70.8px; border: 1px solid;">
                            <td style="text-align: left; height: 70.8px;" colspan="4">
                                <table
                                    style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;"
                                    border="1">
                                    <tbody>
                                        <tr style="height: 22.3984px;">
                                            <td>
                                                <b>Disposition</b>
                                            </td>
                                        </tr>
                                        <tr style="height: 22.3984px;">
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Discharge')
                                                    <i class="fas fa-square"></i> Discharge
                                                @else
                                                    <i class="far fa-square"></i> Discharge
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Transferred')
                                                    <i class="fas fa-square"></i> Transferred
                                                @else
                                                    <i class="far fa-square"></i> Transferred
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Recovered/Improved')
                                                    <i class="fas fa-square"></i> Recovered/Improved
                                                @else
                                                    <i class="far fa-square"></i> Recovered/Improved
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Home Against Medical Advice')
                                                    <i class="fas fa-square"></i> Home Against Medical Advice
                                                @else
                                                    <i class="far fa-square"></i> Home Against Medical Advice
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Absconded')
                                                    <i class="fas fa-square"></i> Absconded
                                                @else
                                                    <i class="far fa-square"></i> Absconded
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Unimproved')
                                                    <i class="fas fa-square"></i> Unimproved
                                                @else
                                                    <i class="far fa-square"></i> Unimproved
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->disposition == 'Expired')
                                                    <i class="fas fa-square"></i> Expired
                                                @else
                                                    <i class="far fa-square"></i> Expired
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr style="height: 70.8px; border: 1px solid;">
                            <td style="text-align: left; height: 70.8px;" colspan="4">
                                <table
                                    style="border-collapse: collapse; width: 100%; height: 22.3984px; border-width: 0px;"
                                    border="1">
                                    <tbody>
                                        <tr style="height: 22.3984px;">
                                            <td>
                                                <b>Results</b>
                                            </td>
                                        </tr>
                                        <tr style="height: 22.3984px;">
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Recovered')
                                                    <i class="fas fa-square"></i> Recovered
                                                @else
                                                    <i class="far fa-square"></i> Recovered
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Improved')
                                                    <i class="fas fa-square"></i> Improved
                                                @else
                                                    <i class="far fa-square"></i> Improved
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Unimproved')
                                                    <i class="fas fa-square"></i> Unimproved
                                                @else
                                                    <i class="far fa-square"></i> Unimproved
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Died')
                                                    <i class="fas fa-square"></i> Died
                                                @else
                                                    <i class="far fa-square"></i> Died
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Autosied')
                                                    <i class="fas fa-square"></i> Autosied
                                                @else
                                                    <i class="far fa-square"></i> Autosied
                                                @endif
                                            </td>
                                            <td style="height: 22.3984px; border-width: 0px;">
                                                @if ($patientPatientAdmissionRecordForm->result == 'Not Autosied')
                                                    <i class="fas fa-square"></i> Not Autosied
                                                @else
                                                    <i class="far fa-square"></i> Not Autosied
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                        <br>Signature Over Printed Name:
                                        <b style="text-decoration: underline;">
                                            {{ $patientPatientAdmissionRecordForm->guardian_fullname }}
                                        </b>
                                        <br>Attending Physician:
                                        <b style="text-decoration: underline;">
                                            {{ $patientPatientAdmissionRecordForm->attending_physician_first_name . ' ' }}
                                            {{ $patientPatientAdmissionRecordForm->attending_physician_middle_name . ' ' }}
                                            {{ $patientPatientAdmissionRecordForm->attending_physician_last_name }}
                                        </b>
                                        <br>Resident On Duty:
                                        <b style="text-decoration: underline;">
                                            {{ $patientPatientAdmissionRecordForm->resident_on_duty }}
                                        </b>
                                        <br><br>
                                    </span>
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
