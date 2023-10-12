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
                            <a href="{{ route('fluid_balance_sheet_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-first-shift">
                                <i class="fas fa-plus"></i> 6-2 Shift
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-second-shift">
                                <i class="fas fa-plus"></i> 2-10 Shift
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-third-shift">
                                <i class="fas fa-plus"></i> 10-6 Shift
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.fluid_balance_sheet_form.modals.add_new_first_shift')
    @include('forms.fluid_balance_sheet_form.modals.add_new_second_shift')
    @include('forms.fluid_balance_sheet_form.modals.add_new_third_shift')

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
                    <strong>FLUID BALANCE SHEET</strong>
                </span>
            </p>



            <p style="text-align: left;">
                <span style="font-size: 24px;">
                    <span style="font-size: 10pt;">
                        <b>Name:</b>
                        {{ $fluidBalanceSheetForm->patient_first_name . ' ' }}
                        {{ $fluidBalanceSheetForm->patient_middle_name . ' ' }}
                        {{ $fluidBalanceSheetForm->patient_last_name }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Age:</b> {{ \Carbon\Carbon::parse($fluidBalanceSheetForm->date_of_birth)->age }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Gender:</b> {{ $fluidBalanceSheetForm->gender }}&nbsp;<br>
                        <b>Allergies</b> {{ $fluidBalanceSheetForm->allergies }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Room No.:</b> {{ $fluidBalanceSheetForm->room_no }}<br>
                        <b>Date:</b> {{ \Carbon\Carbon::parse($fluidBalanceSheetForm->created_at)->format('M d, Y g:i A') }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Birth Date:</b>
                        {{ \Carbon\Carbon::parse($fluidBalanceSheetForm->date_of_birth)->format('M d, Y') }}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <b>Patient ID:</b> {{ $fluidBalanceSheetForm->patient_id }}<br>
                        <b>Attending Physician:</b>
                        {{ $fluidBalanceSheetForm->attending_physician_first_name . ' ' }}
                        {{ $fluidBalanceSheetForm->attending_physician_middle_name . ' ' }}
                        {{ $fluidBalanceSheetForm->attending_physician_last_name }}
                        <br>
                    </span>
                </span>
            </p>
            <table style="border-collapse: collapse; width: 99.9758%; height: 710.117px; border: 1px solid black;"
                border="1">
                <tbody>
                    <tr style="height: 15.9937px; border: 1px solid black;">

                        <td style="text-align: center; height: 47.9811px; line-height: 1; border: 1px solid black;"
                            rowspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    6-2 shift
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="7">
                            <span style="font-size: 10pt;">
                                <strong>
                                    INTAKE
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="5">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OUTPUT
                                </strong>
                            </span>
                        </td>

                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 1
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 2
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    BLOOD
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TPN
                                </strong>
                            </span>
                        </td>

                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ETERNAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    URINE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    DRAIN
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    STOOL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>

                        <td class="action"
                            style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    <b class="mx-3 my-3">Action</b>
                                </strong>
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TUBE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ORAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>

                    @foreach ($fluidBalanceSheetFormListFirstShift as $firstShift)
                        @if ($loop->first)
                            @continue
                        @endif
                        @if ($firstShift->first_shift_ivf_one != '')
                            <tr style="border: 1px solid;">
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $loop->index + 6 }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_ivf_one }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_ivf_two }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_intake_others }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_blood }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_tpn }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_tube }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_oral }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_urine }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_drain }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_stool }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $firstShift->first_shift_output_others }}
                                </td>
                                <td class="action" class="action" style="text-align: center; border: 1px solid;">
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-first-shift-{{ $firstShift->id }}">
                                        Edit
                                    </button>
                                </td>

                                @include('forms.fluid_balance_sheet_form.modals.edit_first_shift')
                            </tr>
                        @endif
                    @endforeach


                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="6">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift:
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: left; line-height: 1; border: 1px solid black;"
                            colspan="8">
                            <span style="font-size: 10pt;">
                                NOD:
                                {{ $fluidBalanceSheetForm->attending_physician_first_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_middle_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_last_name }}
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    Balance per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 47.9811px; line-height: 1; border: 1px solid black;"
                            rowspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    2-10 shift
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="7">
                            <span style="font-size: 10pt;">
                                <strong>
                                    INTAKE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="4">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OUTPUT
                                </strong>
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 1
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 2
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    BLOOD
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TPN
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ETERNAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    URINE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    DRAIN
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    STOOL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>
                        <td class="action"
                            style="text-align: center; height: 31.9874px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    <b class="mx-3 my-3">Action</b>
                                </strong>
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TUBE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ORAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    @foreach ($fluidBalanceSheetFormListSecondShift as $secondShift)
                        @if ($loop->first)
                            @continue
                        @endif

                        @if ($secondShift->second_shift_ivf_one != '')
                            <tr style="border: 1px solid;">
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $loop->index + 2 }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_ivf_one }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_ivf_two }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_intake_others }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_blood }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_tpn }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_tube }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_oral }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_urine }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_drain }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_stool }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $secondShift->second_shift_output_others }}
                                </td>
                                <td class="action" style="text-align: center; border: 1px solid;">
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-second-shift-{{ $secondShift->id }}">
                                        Edit
                                    </button>
                                </td>

                                @include('forms.fluid_balance_sheet_form.modals.edit_second_shift')
                            </tr>
                        @endif
                    @endforeach
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="6">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift:
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: left; line-height: 1; border: 1px solid black;"
                            colspan="8">
                            <span style="font-size: 10pt;">
                                NOD:
                                {{ $fluidBalanceSheetForm->attending_physician_first_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_middle_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_last_name }}
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    Balance per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 54.3749px; line-height: 1; border: 1px solid black;"
                            rowspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    10-6 shift
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="7">
                            <span style="font-size: 10pt;">
                                <strong>
                                    INTAKE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;"
                            colspan="4">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OUTPUT
                                </strong>
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 22.3875px; border: 1px solid black;">
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 1
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    IVF 2
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    BLOOD
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TPN
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 22.3875px; line-height: 1; border: 1px solid black;"
                            colspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ETERNAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    URINE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 22.3875px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    DRAIN
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    STOOL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    OTHERS
                                </strong>
                            </span>
                        </td>
                        <td class="action"
                            style="text-align: center; height: 38.3812px; line-height: 1; border: 1px solid black;"
                            rowspan="2">
                            <span style="font-size: 10pt;">
                                <strong>
                                    <b class="mx-3 my-3">Action</b>
                                </strong>
                            </span>
                        </td>


                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TUBE
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    ORAL
                                </strong>
                            </span>
                        </td>
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    @foreach ($fluidBalanceSheetFormListThirdShift as $thirdShift)
                        @if ($loop->first)
                            @continue
                        @endif

                        @if ($thirdShift->third_shift_ivf_one != '')
                            <tr style="border: 1px solid;">
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $loop->index + 10 }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_ivf_one }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_ivf_two }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_intake_others }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_blood }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_tpn }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_tube }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_oral }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_urine }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_drain }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_stool }}
                                </td>
                                <td style="text-align: center; border: 1px solid;">
                                    {{ $thirdShift->third_shift_output_others }}
                                </td>
                                <td class="action" style="text-align: center; border: 1px solid;">
                                    <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                        data-bs-target="#edit-third-shift-{{ $thirdShift->id }}">
                                        Edit
                                    </button>
                                </td>

                                @include('forms.fluid_balance_sheet_form.modals.edit_third_shift')
                            </tr>
                        @endif
                    @endforeach
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="6">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift:
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    TOTAL per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: left; line-height: 1; border: 1px solid black;"
                            colspan="8">
                            <span style="font-size: 10pt;">
                                NOD:
                                {{ $fluidBalanceSheetForm->attending_physician_first_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_middle_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_last_name }}
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    Balance per shift
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="text-align: center; height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                FINAL TOTAL
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                    <tr style="height: 15.9937px; border: 1px solid black;">
                        <td style="height: 15.9937px; text-align: left; line-height: 1; border: 1px solid black;"
                            colspan="6">
                            <span style="font-size: 10pt;">
                                NOD:
                                {{ $fluidBalanceSheetForm->attending_physician_first_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_middle_name . ' ' }}
                                {{ $fluidBalanceSheetForm->attending_physician_last_name }}
                                <strong>
                                    24 hour total INTAKE
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                        <td style="height: 15.9937px; text-align: right; line-height: 1; border: 1px solid black;"
                            colspan="3">
                            <span style="font-size: 10pt;">
                                <strong>
                                    24 hour total INTAKE
                                </strong>
                            </span>
                        </td>
                        <td style="height: 15.9937px; line-height: 1; border: 1px solid black;">
                            <span style="font-size: 10pt;">
                                &nbsp;
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style="text-align: left; line-height: 1; border: 1px solid black;">
                &nbsp;
            </p>

        </div>
    </div>
    </div>
@endsection
