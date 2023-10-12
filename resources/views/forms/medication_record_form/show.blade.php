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
                            <a href="{{ route('medication_record_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a href="{{ route('medication_record_form.create') }}" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#add-new-prn">
                                <i class="fa fa-plus"></i> Add new PRN
                            </a>

                            <a href="{{ route('medication_record_form.create') }}" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#add-new-single-order-stat">
                                <i class="fa fa-plus"></i> Add new single order/stat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.medication_record_form.modals.add_new_prn')
    @include('forms.medication_record_form.modals.add_new_single_order_stat')

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
                    <strong>MEDICATION ADMINISTRATION RECORD</strong>
                </span>
            </p>

            <table style="border-collapse: collapse; width: 100%; height: 44.7812px; border-width: 0px;" border="1">
                <tbody>
                    <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;" colspan="2">
                            <b>Name:</b>
                            {{ $medicationRecordForm->patient_first_name . ' ' }}
                            {{ $medicationRecordForm->patient_middle_name . ' ' }}
                            {{ $medicationRecordForm->patient_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;">
                            <b>Age:</b>
                            {{ \Carbon\Carbon::parse($medicationRecordForm->date_of_birth)->age }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($medicationRecordForm->date_of_birth)->format('M d, Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="border-width: 0px; font-size:12px;" colspan="2">
                            <b>Allergies:</b>
                            {{ $medicationRecordForm->allergies }}
                        </td>
                        <td style="border-width: 0px; font-size:12px;">
                            <b>Gender:</b>
                            {{ $medicationRecordForm->gender }}
                        </td>
                        <td style="border-width: 0px; font-size:12px;">
                            <b>Room No.:</b>
                            {{ $medicationRecordForm->room_no }}
                        </td>
                    </tr>
                    <tr style="height: 22.3906px;">
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;" colspan="2">
                            <b>Attending Physician:</b>
                            {{ $medicationRecordForm->attending_physician_first_name . ' ' }}
                            {{ $medicationRecordForm->attending_physician_middle_name . ' ' }}
                            {{ $medicationRecordForm->attending_physician_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;">
                            <b>Date:</b>
                            {{ \Carbon\Carbon::parse($medicationRecordForm->created_at)->format('M d, Y g:i A') }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px; font-size:12px;">
                            <b>Patient ID:</b>
                            {{ $medicationRecordForm->patient_id }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>


            <b>PRN</b>
            <table
                style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; width: 100%; border: 1px solid black;"
                border="1">
                <tbody>
                    <tr style="border: 1px solid black; text-align: center;">
                        <td style="border: 1px solid black;">
                            DATE ORDERED
                        </td>
                        <td style="border: 1px solid black;">
                            MEDICATION
                        </td>
                        <td style="border: 1px solid black;">
                            DATE/TIME
                        </td>
                        <td style="border: 1px solid black;">
                            REMARKS
                        </td>
                        <td class="mx-3 my-3 action" style="border: 1px solid black;">
                            ACTION
                        </td>
                    </tr>

                    @foreach ($patientMedicationRecordFormPRNList as $patientMedicationRecordFormPRN)
                        @if ($patientMedicationRecordFormPRN->prn_date_ordered != '0000-00-00 00:00:00')
                            <tr style="border: 1px solid;">
                                <td style="text-align: center; border: 1px solid;">
                                    {{ \Carbon\Carbon::parse($patientMedicationRecordFormPRN->prn_date_ordered)->format('M d, Y g:i A') }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $patientMedicationRecordFormPRN->prn_medication }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ \Carbon\Carbon::parse($patientMedicationRecordFormPRN->prn_date_time)->format('M d, Y g:i A') }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $patientMedicationRecordFormPRN->prn_remarks }}
                                </td>

                                <td style="text-align: center; border: 1px solid;" class="action">
                                    {{-- @if (empty($patientMonitoringForm->patient_first_name)) --}}
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-prn-{{ $patientMedicationRecordFormPRN->id }}">
                                        Edit
                                    </button>
                                    {{-- @endif --}}
                                </td>

                                @include('forms.medication_record_form.modals.edit_prn')
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            <p>
                &nbsp;
            </p>

            <b>SINGLE ORDER/STAT</b>
            <table style="border-collapse: collapse; width: 100%; height: 111.953px;" border="1">
                <tbody>
                    <tr style="height: 44.7812px;">
                        <td style="height: 44.7812px; border: 1px solid black; text-align: center;">
                            DATE ORDERED
                        </td>
                        <td style="height: 44.7812px; border: 1px solid black; text-align: center;">
                            MEDICATION
                        </td>
                        <td style="height: 44.7812px; border: 1px solid black; text-align: center;">
                            DATE/TIME GIVEN
                        </td>
                        <td style="height: 44.7812px; border: 1px solid black; text-align: center;">
                            INITIALS
                        </td>

                        <td class="mx-3 my-3 action"
                            style="height: 44.7812px; border: 1px solid black; text-align: center;">
                            ACTION
                        </td>
                        <td style="height: 44.7812px; text-align: center;" rowspan="4">
                            <span style="font-size: 10pt;">
                                Initials
                            </span>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                        <td style="height: 44.7812px; border-left: 2px solid black;" rowspan="4">
                            <span style="font-size: 10pt;">
                                &nbsp;&nbsp;&nbsp; Full Name of Staff
                            </span>
                            <br>
                            <span style="font-size: 10pt;">
                                &nbsp;&nbsp;&nbsp; Nurse
                            </span>
                            <br>
                            &nbsp;&nbsp;&nbsp;
                            <b style="text-decoration: underline;">
                                {{ $medicationRecordForm->nurse_staff_first_name . ' ' }}
                                {{ $medicationRecordForm->nurse_staff_middle_name . ' ' }}
                                {{ $medicationRecordForm->nurse_staff_last_name }}
                            </b>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                        </td>
                    </tr>

                    @foreach ($patientMedicationRecordFormSingleOrderStatList as $patientMedicationRecordFormSingleOrderStat)
                        @if ($patientMedicationRecordFormSingleOrderStat->date_ordered != '0000-00-00 00:00:00')
                            <tr style="border: 1px solid;">
                                <td style="text-align: center; border: 1px solid;">
                                    {{ \Carbon\Carbon::parse($patientMedicationRecordFormSingleOrderStat->date_ordered)->format('M d, Y g:i A') }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $patientMedicationRecordFormSingleOrderStat->medication }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ \Carbon\Carbon::parse($patientMedicationRecordFormSingleOrderStat->date_time)->format('M d, Y g:i A') }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $patientMedicationRecordFormSingleOrderStat->initials }}
                                </td>

                                <td style="text-align: center; border: 1px solid;" class="action">
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-single-order-stat-{{ $patientMedicationRecordFormSingleOrderStat->id }}">
                                        Edit
                                    </button>
                                </td>

                                @include('forms.medication_record_form.modals.edit_single_order_stat')
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
            <p style="text-align: left;">
                <span style="font-size: 10pt;">
                    Legend:
                    <br>
                    1. Please put (*) at the box if medicine is not available/not given; (R) if patient refused medication.
                    <br>
                    2. Affixing signature for 12 midnight medications should fall on the same date.
                </span>
            </p>

        </div>
    </div>
    </div>
@endsection
