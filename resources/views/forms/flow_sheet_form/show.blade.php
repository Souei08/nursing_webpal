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
                            <a href="{{ route('flow_sheet_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-flow-sheet">
                                <i class="fas fa-plus"></i> Add new flow sheet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.flow_sheet_form.modals.add_new_flow_sheet')

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
                    <strong>IV FLOWSHEET/ADDITIVES/IV DRUG SUPPORT</strong>
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
                            {{ $patientFlowSheetForm->patient_first_name . ' ' }}
                            {{ $patientFlowSheetForm->patient_middle_name . ' ' }}
                            {{ $patientFlowSheetForm->patient_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Patient ID:</b>
                            {{ $patientFlowSheetForm->patient_id }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Room No.:</b>
                            {{ $patientFlowSheetForm->room_no }}
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
                            {{ $patientFlowSheetForm->allergies }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($patientFlowSheetForm->date_of_birth)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Gender:</b>
                            {{ $patientFlowSheetForm->gender }}
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
                            {{ $patientFlowSheetForm->attending_physician_first_name . ' ' }}
                            {{ $patientFlowSheetForm->attending_physician_middle_name . ' ' }}
                            {{ $patientFlowSheetForm->attending_physician_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Date Created:</b>
                            {{ \Carbon\Carbon::parse($patientFlowSheetForm->created_at)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid;" border="1">
                <tbody>
                    <tr style="border: 1px solid;">
                        <td style="text-align: center; border: 1px solid;"><b>DATE</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>IV BOTTLE NO.</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>TIME STARTED</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>IV FLUID</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>ADDITIVES</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>RATE</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>SIGNATURE</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>TIME CONSUMED</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>REMARKS</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>SIGNATURE</b></td>
                        <td class="action" style="text-align: center; border: 1px solid;" width="50px">
                            <b class="mx-3 my-3">Action</b>
                        </td>
                    </tr>
                    @foreach ($patientFlowSheetList as $patientFlowSheet)
                        <tr style="border: 1px solid;">
                            <td style="text-align: center; border: 1px solid;">
                                {{ empty($patientFlowSheet->date_time) ? '' : \Carbon\Carbon::parse($patientFlowSheet->date_time)->format('M d, Y') }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->iv_bottle_no }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->time_started }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->iv_fluid }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->additives }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->rate }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->signature }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->time_consumed }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->remarks }}
                            </td>

                            <td style="text-align: center; border: 1px solid;">
                                {{ $patientFlowSheet->signature }}
                            </td>

                            <td class="action" style="text-align: center;">
                                @if (empty($patientFlowSheet->patient_first_name))
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-flow-sheet-{{ $patientFlowSheet->id }}">
                                        Edit
                                    </button>
                                @endif
                            </td>
                            @include('forms.flow_sheet_form.modals.edit_flow_sheet')
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
