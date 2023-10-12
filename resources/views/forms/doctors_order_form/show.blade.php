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
            printContents = printContents.replace(/\n/g, "<br>");

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
                            <a href="{{ route('doctors_order_form.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-doctors-order">
                                <i class="fas fa-plus"></i> Add doctor's order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.doctors_order_form.modals.add_new_doctors_order')

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
                    <strong>Doctors Order Form</strong>
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
                            {{ $patientDoctorsOrderForm->first_name . ' ' }}
                            {{ $patientDoctorsOrderForm->middle_name . ' ' }}
                            {{ $patientDoctorsOrderForm->last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Patient ID:</b>
                            {{ $patientDoctorsOrderForm->patient_id }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Room No.:</b>
                            {{ $patientDoctorsOrderForm->room_no }}
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
                            {{ $patientDoctorsOrderForm->allergies }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($patientDoctorsOrderForm->date_of_birth)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Gender:</b>
                            {{ $patientDoctorsOrderForm->gender }}
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
                            {{ $patientDoctorsOrderForm->attending_physician_first_name . ' ' }}
                            {{ $patientDoctorsOrderForm->attending_physician_middle_name . ' ' }}
                            {{ $patientDoctorsOrderForm->attending_physician_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Date Created:</b>
                            {{ \Carbon\Carbon::parse($patientDoctorsOrderForm->created_at)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100%; border: 1px solid;" border="1">
                <tbody>
                    <tr style="border: 1px solid;">
                        <td style="text-align: center; border: 1px solid;" width="160px"><b>DATE/TIME</b></td>
                        <td style="text-align: center; border: 1px solid;" width="200px"><b>PROGRESS NOTES</b></td>
                        <td style="text-align: center; border: 1px solid;"><b>DOCTOR&rsquo;S ORDER</b></td>
                        <td class="action" style="text-align: center; border: 1px solid;" width="50px"><b
                                class="mx-3 my-3">Action</b>
                        </td>
                    </tr>

                    @foreach ($patientDoctorsOrdersList as $patientDoctorsOrder)
                        <tr style="border: 1px solid;">
                            <td style="text-align: center; border: 1px solid;">
                                {{ \Carbon\Carbon::parse($patientDoctorsOrder->doctors_order_date)->format('M d, Y g:i A') }}
                            </td>
                            <td style="text-align: center; border: 1px solid;">
                                {!! nl2br(e($patientDoctorsOrder->progress_note)) !!}
                                {{-- {{ $patientDoctorsOrder->progress_note }} --}}
                            </td>
                            <td style="text-align: left; border: 1px solid;">
                               {!! nl2br(e($patientDoctorsOrder->doctors_order)) !!}
                                {{-- {{ $patientDoctorsOrder->doctors_order }} --}}
                            </td>
                            <td class="action" style="text-align: center;">
                                <button class="btn btn-warning text-white btn-sm my-2 mx-2" data-bs-toggle="modal"
                                    data-bs-target="#edit-doctors-order-{{ $patientDoctorsOrder->id }}">
                                    Edit
                                </button>
                            </td>
                            @include('forms.doctors_order_form.modals.edit_doctors_order')
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
