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
    </div>

    <div class="card border-0 shadow mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ route('ward_nurses_progress_notes.index') }}" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </div>
                        <div class="col-sm-8 text-end">
                            <a onclick="printableArea('printableArea')" class="btn btn-success">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-new-progress-notes">
                                <i class="fas fa-plus"></i> Add Progress Notes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('forms.ward_nurses_progress_note.modals.add_new_progress_notes')

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
                    <strong>WARD NURSES / PROGRESS NOTES</strong>
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
                            {{ $wardNurseProgressNote->patient_first_name . ' ' }}
                            {{ $wardNurseProgressNote->patient_middle_name . ' ' }}
                            {{ $wardNurseProgressNote->patient_last_name }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Patient ID:</b>
                            {{ $wardNurseProgressNote->patient_id }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Room No.:</b>
                            {{ $wardNurseProgressNote->room_no }}
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
                            {{ $wardNurseProgressNote->allergies }}
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Birth Date:</b>
                            {{ \Carbon\Carbon::parse($wardNurseProgressNote->date_of_birth)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Gender:</b>
                            {{ $wardNurseProgressNote->gender }}
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
                            {{ $wardNurseProgressNote->attending_physician_first_name . ' ' }}
                            {{ $wardNurseProgressNote->attending_physician_middle_name . ' ' }}
                            {{ $wardNurseProgressNote->attending_physician_last_name }}
                        </td>

                        <td style="height: 22.3906px; border-width: 0px;">
                            <b>Date Created:</b>
                            {{ \Carbon\Carbon::parse($wardNurseProgressNote->created_at)->format('M d, Y') }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>

            <br>

            <table style="border-collapse: collapse; width: 99.9993%; height: 1072.4px; border: 1px solid;">

                <tbody>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="text-align: center; line-height: 1; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    AM SHIFT
                                </span>
                            </strong>
                        </td>
                        <td style="text-align: center; line-height: 1; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    PM SHIFT
                                </span>
                            </strong>
                        </td>
                        <td style="text-align: center; line-height: 1; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    NOC SHIFT
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="height: 16px; border: 1px solid; text-align: center; line-height: 1; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    LEVEL OF CONSCIOUSNESS
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; text-align: center; line-height: 1; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    LEVEL OF CONSCIOUSNESS
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; text-align: center; line-height: 1; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    LEVEL OF CONSCIOUSNESS
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 64px; border: 1px solid;">
                        <td style="height: 64px; line-height: 1.2; border: 1px solid;">
                            @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_conscious)
                                        <i class="fas fa-square"></i> Conscious
                                    @else
                                        <i class="far fa-square"></i> Conscious
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_lethargic)
                                        <i class="fas fa-square"></i> Lethargic
                                    @else
                                        <i class="far fa-square"></i> Lethargic
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_stupor)
                                        <i class="fas fa-square"></i> Stupor
                                    @else
                                        <i class="far fa-square"></i> Stupor
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_obtunded)
                                        <i class="fas fa-square"></i> Obtunded
                                    @else
                                        <i class="far fa-square"></i> Obtunded
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_coma)
                                        <i class="fas fa-square"></i> Coma
                                    @else
                                        <i class="far fa-square"></i> Coma
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_on_sedation)
                                        <i class="fas fa-square"></i> on Sedation
                                    @else
                                        <i class="far fa-square"></i> on Sedation
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E {{ levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_e }}
                                    V:
                                    {{ levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_v }}
                                    M:
                                    {{ levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_m }}
                                    =
                                    {{ levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_equal }}
                                    /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others:
                                    {{ levelOfConsciousnessAMShift($wardNurseProgressNote->id)->lvl_of_consciousness_others }}
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Conscious
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Lethargic
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Stupor
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Obtunded
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> Coma
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> on Sedation
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E ______
                                    V: ______
                                    M: ______ = ______ /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others: ____________________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 64px; line-height: 1.2; border: 1px solid;">
                            @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_conscious)
                                        <i class="fas fa-square"></i> Conscious
                                    @else
                                        <i class="far fa-square"></i> Conscious
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_lethargic)
                                        <i class="fas fa-square"></i> Lethargic
                                    @else
                                        <i class="far fa-square"></i> Lethargic
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_stupor)
                                        <i class="fas fa-square"></i> Stupor
                                    @else
                                        <i class="far fa-square"></i> Stupor
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_obtunded)
                                        <i class="fas fa-square"></i> Obtunded
                                    @else
                                        <i class="far fa-square"></i> Obtunded
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_coma)
                                        <i class="fas fa-square"></i> Coma
                                    @else
                                        <i class="far fa-square"></i> Coma
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_on_sedation)
                                        <i class="fas fa-square"></i> on Sedation
                                    @else
                                        <i class="far fa-square"></i> on Sedation
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E {{ levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_e }}
                                    V:
                                    {{ levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_v }}
                                    M:
                                    {{ levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_m }}
                                    =
                                    {{ levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_equal }}
                                    /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others:
                                    {{ levelOfConsciousnessPMShift($wardNurseProgressNote->id)->lvl_of_consciousness_others }}
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Conscious
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Lethargic
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Stupor
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Obtunded
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> Coma
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> on Sedation
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E ______
                                    V: ______
                                    M: ______ = ______ /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others: ____________________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 64px; line-height: 1.2; border: 1px solid;">
                            @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_conscious)
                                        <i class="fas fa-square"></i> Conscious
                                    @else
                                        <i class="far fa-square"></i> Conscious
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_lethargic)
                                        <i class="fas fa-square"></i> Lethargic
                                    @else
                                        <i class="far fa-square"></i> Lethargic
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_stupor)
                                        <i class="fas fa-square"></i> Stupor
                                    @else
                                        <i class="far fa-square"></i> Stupor
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_obtunded)
                                        <i class="fas fa-square"></i> Obtunded
                                    @else
                                        <i class="far fa-square"></i> Obtunded
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_coma)
                                        <i class="fas fa-square"></i> Coma
                                    @else
                                        <i class="far fa-square"></i> Coma
                                    @endif
                                    &nbsp; &nbsp;

                                    @if (levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_on_sedation)
                                        <i class="fas fa-square"></i> on Sedation
                                    @else
                                        <i class="far fa-square"></i> on Sedation
                                    @endif
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E
                                    {{ levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_e }}
                                    V:
                                    {{ levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_v }}
                                    M:
                                    {{ levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_m }}
                                    =
                                    {{ levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_equal }}
                                    /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others:
                                    {{ levelOfConsciousnessNOCShift($wardNurseProgressNote->id)->lvl_of_consciousness_others }}
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Conscious
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Lethargic
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Stupor
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Obtunded
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> Coma
                                    &nbsp; &nbsp;

                                    <i class="far fa-square"></i> on Sedation
                                </span>
                                <br>
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    GCS:
                                    E ______
                                    V: ______
                                    M: ______ = ______ /15
                                    <br>
                                    &nbsp; &nbsp;
                                    Others: ____________________________________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td
                            style="height: 16px; border: 1px solid; line-height: 1; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    RESPIRATORY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    RESPIRATORY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    RESPIRATORY SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 144px; border: 1px solid;">
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (RespiratorySystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds:
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_location_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_location_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_location_adventitous)
                                        <i class="fas fa-square"></i> Adventitous
                                    @else
                                        <i class="far fa-square"></i> Adventitous
                                    @endif
                                    &nbsp;
                                    Specify: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_adventitous_specify }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_location }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_oxygen)
                                        <i class="fas fa-square"></i> Oxygen
                                    @else
                                        <i class="far fa-square"></i> Oxygen
                                    @endif
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_lpm }}
                                    </span> LPM
                                    &nbsp; &nbsp;
                                    via:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_via }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_intubated)
                                        <i class="fas fa-square"></i> Intubated:
                                    @else
                                        <i class="far fa-square"></i> Intubated:
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_cpap)
                                        <i class="fas fa-square"></i> CPAP
                                    @else
                                        <i class="far fa-square"></i> CPAP
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_bipap)
                                        <i class="fas fa-square"></i> BIPAP
                                    @else
                                        <i class="far fa-square"></i> BIPAP
                                    @endif
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_et_tube)
                                        <i class="fas fa-square"></i> ET Tube
                                    @else
                                        <i class="far fa-square"></i> ET Tube
                                    @endif
                                    &nbsp;
                                    Size:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_size }}
                                    </span>
                                    Level:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_level }}
                                    </span>
                                    <br>
                                    MV:
                                    F102
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_f }}
                                    </span>
                                    RR
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_rr }}
                                    </span>
                                    PEEP
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_peep }}
                                    </span>
                                    TV
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_tv }}
                                    </span>
                                    IE: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_ie }}
                                    </span> 02
                                    <br>
                                    Sat:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_sat }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemAMShift($wardNurseProgressNote->id)->rs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds: <i class="far fa-square"></i>
                                    Clear
                                    &nbsp; Location <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Adventitous
                                    &nbsp;
                                    Specify:_________
                                    <br>
                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oxygen______LPM
                                    &nbsp; &nbsp;
                                    via:__________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Intubated:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    CPAP
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    BIPAP
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    ET Tube
                                    &nbsp;
                                    Size:______
                                    Level:______
                                    <br>
                                    MV: F102____RR____PEEP____TV____IE:____02
                                    <br>
                                    Sat:_____________
                                    <br>
                                    Others:_____________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (RespiratorySystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds:
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_location_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_location_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_location_adventitous)
                                        <i class="fas fa-square"></i> Adventitous
                                    @else
                                        <i class="far fa-square"></i> Adventitous
                                    @endif
                                    &nbsp;
                                    Specify: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_adventitous_specify }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_location }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_oxygen)
                                        <i class="fas fa-square"></i> Oxygen
                                    @else
                                        <i class="far fa-square"></i> Oxygen
                                    @endif
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_lpm }}
                                    </span> LPM
                                    &nbsp; &nbsp;
                                    via:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_via }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_intubated)
                                        <i class="fas fa-square"></i> Intubated:
                                    @else
                                        <i class="far fa-square"></i> Intubated:
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_cpap)
                                        <i class="fas fa-square"></i> CPAP
                                    @else
                                        <i class="far fa-square"></i> CPAP
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_bipap)
                                        <i class="fas fa-square"></i> BIPAP
                                    @else
                                        <i class="far fa-square"></i> BIPAP
                                    @endif
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_et_tube)
                                        <i class="fas fa-square"></i> ET Tube
                                    @else
                                        <i class="far fa-square"></i> ET Tube
                                    @endif
                                    &nbsp;
                                    Size:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_size }}
                                    </span>
                                    Level:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_level }}
                                    </span>
                                    <br>
                                    MV:
                                    F102
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_f }}
                                    </span>
                                    RR
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_rr }}
                                    </span>
                                    PEEP
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_peep }}
                                    </span>
                                    TV
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_tv }}
                                    </span>
                                    IE: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_ie }}
                                    </span> 02
                                    <br>
                                    Sat:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_sat }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemPMShift($wardNurseProgressNote->id)->rs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds: <i class="far fa-square"></i>
                                    Clear
                                    &nbsp; Location <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Adventitous
                                    &nbsp;
                                    Specify:_________
                                    <br>
                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oxygen______LPM
                                    &nbsp; &nbsp;
                                    via:__________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Intubated:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    CPAP
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    BIPAP
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    ET Tube
                                    &nbsp;
                                    Size:______
                                    Level:______
                                    <br>
                                    MV: F102____RR____PEEP____TV____IE:____02
                                    <br>
                                    Sat:_____________
                                    <br>
                                    Others:_____________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (RespiratorySystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds:
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_location_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_location_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_location_adventitous)
                                        <i class="fas fa-square"></i> Adventitous
                                    @else
                                        <i class="far fa-square"></i> Adventitous
                                    @endif
                                    &nbsp;
                                    Specify: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_adventitous_specify }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_location }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_oxygen)
                                        <i class="fas fa-square"></i> Oxygen
                                    @else
                                        <i class="far fa-square"></i> Oxygen
                                    @endif
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_lpm }}
                                    </span> LPM
                                    &nbsp; &nbsp;
                                    via:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_via }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_intubated)
                                        <i class="fas fa-square"></i> Intubated:
                                    @else
                                        <i class="far fa-square"></i> Intubated:
                                    @endif
                                    &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_cpap)
                                        <i class="fas fa-square"></i> CPAP
                                    @else
                                        <i class="far fa-square"></i> CPAP
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_bipap)
                                        <i class="fas fa-square"></i> BIPAP
                                    @else
                                        <i class="far fa-square"></i> BIPAP
                                    @endif
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_et_tube)
                                        <i class="fas fa-square"></i> ET Tube
                                    @else
                                        <i class="far fa-square"></i> ET Tube
                                    @endif
                                    &nbsp;
                                    Size:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_size }}
                                    </span>
                                    Level:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_level }}
                                    </span>
                                    <br>
                                    MV:
                                    F102
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_f }}
                                    </span>
                                    RR
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_rr }}
                                    </span>
                                    PEEP
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_peep }}
                                    </span>
                                    TV
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_tv }}
                                    </span>
                                    IE: <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_ie }}
                                    </span> 02
                                    <br>
                                    Sat:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_sat }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ RespiratorySystemNOCShift($wardNurseProgressNote->id)->rs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp;&nbsp;
                                    Breath Sounds: <i class="far fa-square"></i>
                                    Clear
                                    &nbsp; Location <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Adventitous
                                    &nbsp;
                                    Specify:_________
                                    <br>
                                    &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    Location:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oxygen______LPM
                                    &nbsp; &nbsp;
                                    via:__________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Intubated:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    CPAP
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    BIPAP
                                    <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    ET Tube
                                    &nbsp;
                                    Size:______
                                    Level:______
                                    <br>
                                    MV: F102____RR____PEEP____TV____IE:____02
                                    <br>
                                    Sat:_____________
                                    <br>
                                    Others:_____________________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    CARDIOVASCULAR SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    CARDIOVASCULAR SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    CARDIOVASCULAR SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (cardiovascularSystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_regular)
                                        <i class="fas fa-square"></i> Regular
                                    @else
                                        <i class="far fa-square"></i> Regular
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_irregular)
                                        <i class="fas fa-square"></i> Irregular
                                    @else
                                        <i class="far fa-square"></i> Irregular
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_weak)
                                        <i class="fas fa-square"></i> Weak
                                    @else
                                        <i class="far fa-square"></i> Weak
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_bounding)
                                        <i class="fas fa-square"></i> Bounding
                                    @else
                                        <i class="far fa-square"></i> Bounding
                                    @endif
                                    <br>
                                    CRT:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_secs }}
                                    </span>
                                    secs
                                    <br>
                                    Edema:
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    <br>
                                    Location:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_location }}
                                    </span>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemAMShift($wardNurseProgressNote->id)->cs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    <i class="far fa-square"></i> Regular
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Irregular
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Weak
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Bounding
                                    <br>
                                    CRT: _________
                                    secs
                                    <br>
                                    Edema:
                                    <i class="far fa-square"></i> No
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Yes
                                    <br>
                                    Location: __________
                                    Others: __________
                                </span>
                            @endif
                        </td>
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (cardiovascularSystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_regular)
                                        <i class="fas fa-square"></i> Regular
                                    @else
                                        <i class="far fa-square"></i> Regular
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_irregular)
                                        <i class="fas fa-square"></i> Irregular
                                    @else
                                        <i class="far fa-square"></i> Irregular
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_weak)
                                        <i class="fas fa-square"></i> Weak
                                    @else
                                        <i class="far fa-square"></i> Weak
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_bounding)
                                        <i class="fas fa-square"></i> Bounding
                                    @else
                                        <i class="far fa-square"></i> Bounding
                                    @endif
                                    <br>
                                    CRT:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_secs }}
                                    </span>
                                    secs
                                    <br>
                                    Edema:
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    <br>
                                    Location:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_location }}
                                    </span>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemPMShift($wardNurseProgressNote->id)->cs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    <i class="far fa-square"></i> Regular
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Irregular
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Weak
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Bounding
                                    <br>
                                    CRT: _________
                                    secs
                                    <br>
                                    Edema:
                                    <i class="far fa-square"></i> No
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Yes
                                    <br>
                                    Location: __________
                                    Others: __________
                                </span>
                            @endif
                        </td>
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_regular)
                                        <i class="fas fa-square"></i> Regular
                                    @else
                                        <i class="far fa-square"></i> Regular
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_irregular)
                                        <i class="fas fa-square"></i> Irregular
                                    @else
                                        <i class="far fa-square"></i> Irregular
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_weak)
                                        <i class="fas fa-square"></i> Weak
                                    @else
                                        <i class="far fa-square"></i> Weak
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_bounding)
                                        <i class="fas fa-square"></i> Bounding
                                    @else
                                        <i class="far fa-square"></i> Bounding
                                    @endif
                                    <br>
                                    CRT:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_secs }}
                                    </span>
                                    secs
                                    <br>
                                    Edema:
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    <br>
                                    Location:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_location }}
                                    </span>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ cardiovascularSystemNOCShift($wardNurseProgressNote->id)->cs_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    Pulses:
                                    <i class="far fa-square"></i> Regular
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Irregular
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Weak
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Bounding
                                    <br>
                                    CRT: _________
                                    secs
                                    <br>
                                    Edema:
                                    <i class="far fa-square"></i> No
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i> Yes
                                    <br>
                                    Location: __________
                                    Others: __________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GASTROINTESTINAL SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GASTROINTESTINAL SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GASTROINTESTINAL SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 144px;">
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Diet:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_diet }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_oral)
                                        <i class="fas fa-square"></i> Oral
                                    @else
                                        <i class="far fa-square"></i> Oral
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_apetite)
                                        <i class="fas fa-square"></i> Apetite
                                    @else
                                        <i class="far fa-square"></i> Apetite
                                    @endif

                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_fair)
                                        <i class="fas fa-square"></i> Fair
                                    @else
                                        <i class="far fa-square"></i> Fair
                                    @endif
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_minimal)
                                        <i class="fas fa-square"></i> Minimal
                                    @else
                                        <i class="far fa-square"></i> Minimal
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_ngt)
                                        <i class="fas fa-square"></i> NGT
                                    @else
                                        <i class="far fa-square"></i> NGT
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_peg)
                                        <i class="fas fa-square"></i> PEG
                                    @else
                                        <i class="far fa-square"></i> PEG
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_date_time }}
                                    </span>
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds:
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_bowel_sound_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    @if (gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_bowel_sound_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemAMShift($wardNurseProgressNote->id)->gas_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Diet:_______________________________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oral
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Apetite: <i class="far fa-square"></i>
                                    Good
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Fair <i class="far fa-square"></i>
                                    Minimal
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    NGT
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    PEG
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted: _____________________
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds: <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Diet:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_diet }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_oral)
                                        <i class="fas fa-square"></i> Oral
                                    @else
                                        <i class="far fa-square"></i> Oral
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_apetite)
                                        <i class="fas fa-square"></i> Apetite
                                    @else
                                        <i class="far fa-square"></i> Apetite
                                    @endif

                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_fair)
                                        <i class="fas fa-square"></i> Fair
                                    @else
                                        <i class="far fa-square"></i> Fair
                                    @endif
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_minimal)
                                        <i class="fas fa-square"></i> Minimal
                                    @else
                                        <i class="far fa-square"></i> Minimal
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_ngt)
                                        <i class="fas fa-square"></i> NGT
                                    @else
                                        <i class="far fa-square"></i> NGT
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_peg)
                                        <i class="fas fa-square"></i> PEG
                                    @else
                                        <i class="far fa-square"></i> PEG
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_date_time }}
                                    </span>
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds:
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_bowel_sound_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    @if (gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_bowel_sound_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemPMShift($wardNurseProgressNote->id)->gas_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Diet:_______________________________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oral
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Apetite: <i class="far fa-square"></i>
                                    Good
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Fair <i class="far fa-square"></i>
                                    Minimal
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    NGT
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    PEG
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted: _____________________
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds: <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 144px; line-height: 1.2; border: 1px solid;">
                            @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Diet:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_diet }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_oral)
                                        <i class="fas fa-square"></i> Oral
                                    @else
                                        <i class="far fa-square"></i> Oral
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_apetite)
                                        <i class="fas fa-square"></i> Apetite
                                    @else
                                        <i class="far fa-square"></i> Apetite
                                    @endif

                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_fair)
                                        <i class="fas fa-square"></i> Fair
                                    @else
                                        <i class="far fa-square"></i> Fair
                                    @endif
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_minimal)
                                        <i class="fas fa-square"></i> Minimal
                                    @else
                                        <i class="far fa-square"></i> Minimal
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_ngt)
                                        <i class="fas fa-square"></i> NGT
                                    @else
                                        <i class="far fa-square"></i> NGT
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_r)
                                        <i class="fas fa-square"></i> R
                                    @else
                                        <i class="far fa-square"></i> R
                                    @endif
                                    &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_l)
                                        <i class="fas fa-square"></i> L
                                    @else
                                        <i class="far fa-square"></i> L
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_peg)
                                        <i class="fas fa-square"></i> PEG
                                    @else
                                        <i class="far fa-square"></i> PEG
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_french }}
                                    </span>
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_date_time }}
                                    </span>
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds:
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_bowel_sound_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    @if (gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_bowel_sound_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ gastrointestinalSystemNOCShift($wardNurseProgressNote->id)->gas_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Diet:_______________________________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Oral
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Apetite: <i class="far fa-square"></i>
                                    Good
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Fair <i class="far fa-square"></i>
                                    Minimal
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    NGT
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    R
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    L
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    PEG
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    French:________________
                                    <br>
                                    Date
                                    &amp;
                                    Time Inserted: _____________________
                                    <br>
                                    Elimination:
                                    <br>
                                    &nbsp; &nbsp;
                                    Normal Elimination Pattern
                                    <br>
                                    Bowel Sounds: <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 22.4px; border: 1px solid;">
                        <td style="height: 22.4px; line-height: 1; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GENITOURINARY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 22.4px; line-height: 1; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GENITOURINARY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 22.4px; line-height: 1; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    GENITOURINARY SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 80px;">
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (genitourinarySystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_freely)
                                        <i class="fas fa-square"></i> Freely
                                    @else
                                        <i class="far fa-square"></i> Freely
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_incontinence)
                                        <i class="fas fa-square"></i> Incontinence
                                    @else
                                        <i class="far fa-square"></i> Incontinence
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_dysuria)
                                        <i class="fas fa-square"></i> Dysuria
                                    @else
                                        <i class="far fa-square"></i> Dysuria
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_anuria)
                                        <i class="fas fa-square"></i> Anuria
                                    @else
                                        <i class="far fa-square"></i> Anuria
                                    @endif
                                    <br>
                                    Urine Color:
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_urine_color_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_urine_color_clear_others }}
                                    </span>
                                    <br>
                                    Catheterized:
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_catheterized_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_catheterized_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Fr:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_fr }}
                                    </span>
                                    Date of insertion:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_date_insertion }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemAMShift($wardNurseProgressNote->id)->gen_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Freely
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Incontinence
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Dysuria
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Anuria
                                    <br>
                                    Urine Color: <i class="far fa-square"></i>
                                    &nbsp; &nbsp; &nbsp;
                                    Others:______________
                                    <br>
                                    Catheterized:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Fr:__________ Date of insertion:______________
                                    <br>
                                    Others:__________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (genitourinarySystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_freely)
                                        <i class="fas fa-square"></i> Freely
                                    @else
                                        <i class="far fa-square"></i> Freely
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_incontinence)
                                        <i class="fas fa-square"></i> Incontinence
                                    @else
                                        <i class="far fa-square"></i> Incontinence
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_dysuria)
                                        <i class="fas fa-square"></i> Dysuria
                                    @else
                                        <i class="far fa-square"></i> Dysuria
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_anuria)
                                        <i class="fas fa-square"></i> Anuria
                                    @else
                                        <i class="far fa-square"></i> Anuria
                                    @endif
                                    <br>
                                    Urine Color:
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_urine_color_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_urine_color_clear_others }}
                                    </span>
                                    <br>
                                    Catheterized:
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_catheterized_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_catheterized_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Fr:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_fr }}
                                    </span>
                                    Date of insertion:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_date_insertion }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemPMShift($wardNurseProgressNote->id)->gen_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Freely
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Incontinence
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Dysuria
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Anuria
                                    <br>
                                    Urine Color: <i class="far fa-square"></i>
                                    &nbsp; &nbsp; &nbsp;
                                    Others:______________
                                    <br>
                                    Catheterized:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Fr:__________ Date of insertion:______________
                                    <br>
                                    Others:__________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 80px; line-height: 1.2; border: 1px solid;">
                            @if (genitourinarySystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_freely)
                                        <i class="fas fa-square"></i> Freely
                                    @else
                                        <i class="far fa-square"></i> Freely
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_incontinence)
                                        <i class="fas fa-square"></i> Incontinence
                                    @else
                                        <i class="far fa-square"></i> Incontinence
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_dysuria)
                                        <i class="fas fa-square"></i> Dysuria
                                    @else
                                        <i class="far fa-square"></i> Dysuria
                                    @endif
                                    &nbsp;
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_anuria)
                                        <i class="fas fa-square"></i> Anuria
                                    @else
                                        <i class="far fa-square"></i> Anuria
                                    @endif
                                    <br>
                                    Urine Color:
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_urine_color_clear)
                                        <i class="fas fa-square"></i> Clear
                                    @else
                                        <i class="far fa-square"></i> Clear
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_urine_color_clear_others }}
                                    </span>
                                    <br>
                                    Catheterized:
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_catheterized_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_catheterized_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Fr:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_fr }}
                                    </span>
                                    Date of insertion:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_date_insertion }}
                                    </span>
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ genitourinarySystemNOCShift($wardNurseProgressNote->id)->gen_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Freely
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Incontinence
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Dysuria
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Anuria
                                    <br>
                                    Urine Color: <i class="far fa-square"></i>
                                    Clear
                                    &nbsp; &nbsp; &nbsp;
                                    Others:______________
                                    <br>
                                    Catheterized:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Fr:__________ Date of insertion:______________
                                    <br>
                                    Others:__________________________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    MUSCULOSKETAL SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    MUSCULOSKETAL SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 16px; border: 1px solid; line-height: 1; text-align: center;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    MUSCULOSKETAL SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 128px; border: 1px solid;">
                        <td style="height: 128px; line-height: 1.2; border: 1px solid;">
                            @if (musculosketalSystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Posture:
                                    @if (musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_posture)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_posture_others }}
                                        </span>
                                    @endif

                                    <br>
                                    Gait:
                                    @if (musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_gait)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_gait_others }}
                                        </span>
                                    @endif

                                    <br>
                                    ROM:
                                    @if (musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_rom)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_rom_others }}
                                        </span>
                                    @endif
                                    <br>
                                    Assistive Device:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_assistive_device }}
                                    </span>
                                    <br>
                                    Contraption:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_contraption }}
                                    </span>
                                    <br>
                                    MFS score:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_mfs_score }}
                                    </span>
                                    <br>
                                    Side-rails:
                                    @if (musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_mfs_side_rails_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_mfs_side_rails_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemAMShift($wardNurseProgressNote->id)->ms_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Posture:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Gait:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    ROM:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Assistive Device:___________________________
                                    <br>
                                    Contraption:_______________________________
                                    <br>
                                    MFS score: ________________________________
                                    <br>
                                    Side-rails:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 128px; line-height: 1.2; border: 1px solid;">
                            @if (musculosketalSystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Posture:
                                    @if (musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_posture)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_posture_others }}
                                        </span>
                                    @endif

                                    <br>
                                    Gait:
                                    @if (musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_gait)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_gait_others }}
                                        </span>
                                    @endif

                                    <br>
                                    ROM:
                                    @if (musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_rom)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_rom_others }}
                                        </span>
                                    @endif
                                    <br>
                                    Assistive Device:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_assistive_device }}
                                    </span>
                                    <br>
                                    Contraption:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_contraption }}
                                    </span>
                                    <br>
                                    MFS score:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_mfs_score }}
                                    </span>
                                    <br>
                                    Side-rails:
                                    @if (musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_mfs_side_rails_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_mfs_side_rails_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemPMShift($wardNurseProgressNote->id)->ms_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Posture:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Gait:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    ROM:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Assistive Device:___________________________
                                    <br>
                                    Contraption:_______________________________
                                    <br>
                                    MFS score: ________________________________
                                    <br>
                                    Side-rails:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>

                        <td style="height: 128px; line-height: 1.2; border: 1px solid;">
                            @if (musculosketalSystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Posture:
                                    @if (musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_posture)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_posture_others }}
                                        </span>
                                    @endif

                                    <br>
                                    Gait:
                                    @if (musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_gait)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_gait_others }}
                                        </span>
                                    @endif

                                    <br>
                                    ROM:
                                    @if (musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_rom)
                                        <i class="fas fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="far fa-square"></i>
                                        Others:______________
                                    @else
                                        <i class="far fa-square"></i> Normal

                                        &nbsp; &nbsp;
                                        <i class="fas fa-square"></i>
                                        Others:
                                        <span style="text-decoration: underline;">
                                            {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_rom_others }}
                                        </span>
                                    @endif
                                    <br>
                                    Assistive Device:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_assistive_device }}
                                    </span>
                                    <br>
                                    Contraption:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_contraption }}
                                    </span>
                                    <br>
                                    MFS score:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_mfs_score }}
                                    </span>
                                    <br>
                                    Side-rails:
                                    @if (musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_mfs_side_rails_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_mfs_side_rails_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ musculosketalSystemNOCShift($wardNurseProgressNote->id)->ms_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Posture:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Gait:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    ROM:
                                    <i class="far fa-square"></i>
                                    Normal
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Others:______________
                                    <br>
                                    Assistive Device:___________________________
                                    <br>
                                    Contraption:_______________________________
                                    <br>
                                    MFS score: ________________________________
                                    <br>
                                    Side-rails:
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Others:____________________________________
                                </span>
                            @endif
                        </td>

                    </tr>
                    <tr style="height: 10px;">
                        <td style="height: 10px; text-align: center; border: 1px solid;"><strong>
                                <span style="font-size: 8pt;">
                                    INTEGUMENTARY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 10px; text-align: center; border: 1px solid;"><strong>
                                <span style="font-size: 8pt;">
                                    INTEGUMENTARY SYSTEM
                                </span>
                            </strong>
                        </td>
                        <td style="height: 10px; text-align: center; border: 1px solid;"><strong>
                                <span style="font-size: 8pt;">
                                    INTEGUMENTARY SYSTEM
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 176px;">
                        <td style="height: 176px; line-height: 1.2; border: 1px solid;">
                            @if (integumentarySystemAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Color: Specify:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemAMShift($wardNurseProgressNote->id)->is_color_specify }}
                                    </span>
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemAMShift($wardNurseProgressNote->id)->is_score }}
                                    </span>
                                    <br>
                                    Risk Level:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemAMShift($wardNurseProgressNote->id)->is_risk_lvl }}
                                    </span>
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_change_position)
                                        <i class="fas fa-square"></i> Change Position
                                    @else
                                        <i class="far fa-square"></i> Change Position
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_air_mattress)
                                        <i class="fas fa-square"></i> Air mattress
                                    @else
                                        <i class="far fa-square"></i> Air mattress
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_dressing)
                                        <i class="fas fa-square"></i> Dressing
                                    @else
                                        <i class="far fa-square"></i> Dressing
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_medication)
                                        <i class="fas fa-square"></i> Medication
                                    @else
                                        <i class="far fa-square"></i> Medication
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemAMShift($wardNurseProgressNote->id)->is_intervention_others }}
                                    </span>
                                    <br>
                                    Skin Turgor:
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_skin_tugor_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_skin_tugor_poor)
                                        <i class="fas fa-square"></i> Poor
                                    @else
                                        <i class="far fa-square"></i> Poor
                                    @endif
                                    <br>
                                    Skin Integrity:
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_integrity_intact)
                                        <i class="fas fa-square"></i> Intact
                                    @else
                                        <i class="far fa-square"></i> Intact
                                    @endif
                                    &nbsp;
                                    @if (integumentarySystemAMShift($wardNurseProgressNote->id)->is_integrity_nonintact)
                                        <i class="fas fa-square"></i> Non-Intact
                                    @else
                                        <i class="far fa-square"></i> Non-Intact
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemAMShift($wardNurseProgressNote->id)->is_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Color: Specify:___________________________
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:_________________
                                    <br>
                                    Risk Level:________________
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Change Position
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Air mattress
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Dressing
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Medication
                                    <br>
                                    Others:_______________
                                    <br>
                                    Skin Turgor:
                                    <i class="far fa-square"></i>
                                    Good
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Poor
                                    <br>
                                    <i class="far fa-square"></i>
                                    Skin Integrity:
                                    <i class="far fa-square"></i>
                                    Intact
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Non-Intact
                                    <br>
                                    Others:____________________________
                                </span>
                            @endif
                        </td>
                        <td style="height: 176px; line-height: 1.2; border: 1px solid;">
                            @if (integumentarySystemPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Color: Specify:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemPMShift($wardNurseProgressNote->id)->is_color_specify }}
                                    </span>
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemPMShift($wardNurseProgressNote->id)->is_score }}
                                    </span>
                                    <br>
                                    Risk Level:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemPMShift($wardNurseProgressNote->id)->is_risk_lvl }}
                                    </span>
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_change_position)
                                        <i class="fas fa-square"></i> Change Position
                                    @else
                                        <i class="far fa-square"></i> Change Position
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_air_mattress)
                                        <i class="fas fa-square"></i> Air mattress
                                    @else
                                        <i class="far fa-square"></i> Air mattress
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_dressing)
                                        <i class="fas fa-square"></i> Dressing
                                    @else
                                        <i class="far fa-square"></i> Dressing
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_medication)
                                        <i class="fas fa-square"></i> Medication
                                    @else
                                        <i class="far fa-square"></i> Medication
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemPMShift($wardNurseProgressNote->id)->is_intervention_others }}
                                    </span>
                                    <br>
                                    Skin Turgor:
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_skin_tugor_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_skin_tugor_poor)
                                        <i class="fas fa-square"></i> Poor
                                    @else
                                        <i class="far fa-square"></i> Poor
                                    @endif
                                    <br>
                                    Skin Integrity:
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_integrity_intact)
                                        <i class="fas fa-square"></i> Intact
                                    @else
                                        <i class="far fa-square"></i> Intact
                                    @endif
                                    &nbsp;
                                    @if (integumentarySystemPMShift($wardNurseProgressNote->id)->is_integrity_nonintact)
                                        <i class="fas fa-square"></i> Non-Intact
                                    @else
                                        <i class="far fa-square"></i> Non-Intact
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemPMShift($wardNurseProgressNote->id)->is_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Color: Specify:___________________________
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:_________________
                                    <br>
                                    Risk Level:________________
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Change Position
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Air mattress
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Dressing
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Medication
                                    <br>
                                    Others:_______________
                                    <br>
                                    Skin Turgor:
                                    <i class="far fa-square"></i>
                                    Good
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Poor
                                    <br>
                                    <i class="far fa-square"></i>
                                    Skin Integrity:
                                    <i class="far fa-square"></i>
                                    Intact
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Non-Intact
                                    <br>
                                    Others:____________________________
                                </span>
                            @endif
                        </td>

                        <td style="height: 176px; line-height: 1.2; border: 1px solid;">
                            @if (integumentarySystemNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Color: Specify:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemNOCShift($wardNurseProgressNote->id)->is_color_specify }}
                                    </span>
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemNOCShift($wardNurseProgressNote->id)->is_score }}
                                    </span>
                                    <br>
                                    Risk Level:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemNOCShift($wardNurseProgressNote->id)->is_risk_lvl }}
                                    </span>
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_change_position)
                                        <i class="fas fa-square"></i> Change Position
                                    @else
                                        <i class="far fa-square"></i> Change Position
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_air_mattress)
                                        <i class="fas fa-square"></i> Air mattress
                                    @else
                                        <i class="far fa-square"></i> Air mattress
                                    @endif
                                    <br>
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_dressing)
                                        <i class="fas fa-square"></i> Dressing
                                    @else
                                        <i class="far fa-square"></i> Dressing
                                    @endif
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_medication)
                                        <i class="fas fa-square"></i> Medication
                                    @else
                                        <i class="far fa-square"></i> Medication
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemNOCShift($wardNurseProgressNote->id)->is_intervention_others }}
                                    </span>
                                    <br>
                                    Skin Turgor:
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_skin_tugor_good)
                                        <i class="fas fa-square"></i> Good
                                    @else
                                        <i class="far fa-square"></i> Good
                                    @endif
                                    &nbsp; &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_skin_tugor_poor)
                                        <i class="fas fa-square"></i> Poor
                                    @else
                                        <i class="far fa-square"></i> Poor
                                    @endif
                                    <br>
                                    Skin Integrity:
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_integrity_intact)
                                        <i class="fas fa-square"></i> Intact
                                    @else
                                        <i class="far fa-square"></i> Intact
                                    @endif
                                    &nbsp;
                                    @if (integumentarySystemNOCShift($wardNurseProgressNote->id)->is_integrity_nonintact)
                                        <i class="fas fa-square"></i> Non-Intact
                                    @else
                                        <i class="far fa-square"></i> Non-Intact
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ integumentarySystemNOCShift($wardNurseProgressNote->id)->is_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Color: Specify:___________________________
                                    <br>
                                    Pressure Ulcer Risk Assessment Tool
                                    <br>
                                    Score:_________________
                                    <br>
                                    Risk Level:________________
                                    <br>
                                    Interventions:
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Change Position
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Air mattress
                                    <br>
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Dressing
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Medication
                                    <br>
                                    Others:_______________
                                    <br>
                                    Skin Turgor:
                                    <i class="far fa-square"></i>
                                    Good
                                    &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Poor
                                    <br>
                                    <i class="far fa-square"></i>
                                    Skin Integrity:
                                    <i class="far fa-square"></i>
                                    Intact
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Non-Intact
                                    <br>
                                    Others:____________________________
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="line-height: 1; text-align: center; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    PAIN ASSESSMENT
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; text-align: center; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    PAIN ASSESSMENT
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; text-align: center; height: 16px; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    PAIN ASSESSMENT
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 112px;">
                        <td style="line-height: 1.2; height: 112px; border: 1px solid;">
                            @if (painAssessmentAMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_pain_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_pain_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Pain of Score:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_score }}
                                    </span>
                                    /10
                                    <br>
                                    Tool Used:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_used }}
                                    </span>
                                    &nbsp;

                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_pattern)
                                        <i class="fas fa-square"></i> Pattern:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_pattern_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Pattern: _____________
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_quality)
                                        <i class="fas fa-square"></i> Quality:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_quality_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Quality: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_region)
                                        <i class="fas fa-square"></i> Region:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_region_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Region: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    @if (painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_severity)
                                        <i class="fas fa-square"></i> Severity:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_tool_severity_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Severity: _____________
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentAMShift($wardNurseProgressNote->id)->pa_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Pain of Score:_________/10
                                    <br>
                                    Tool Used:___________
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Pattern:__________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Quality:___________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Region:___________
                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Severity:__________
                                    <br>
                                    Others:___________
                                </span>
                            @endif
                        </td>
                        <td style="line-height: 1.2; height: 112px; border: 1px solid;">
                            @if (painAssessmentPMShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_pain_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_pain_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Pain of Score:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_score }}
                                    </span>
                                    /10
                                    <br>
                                    Tool Used:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_used }}
                                    </span>
                                    &nbsp;

                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_pattern)
                                        <i class="fas fa-square"></i> Pattern:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_pattern_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Pattern: _____________
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_quality)
                                        <i class="fas fa-square"></i> Quality:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_quality_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Quality: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_region)
                                        <i class="fas fa-square"></i> Region:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_region_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Region: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    @if (painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_severity)
                                        <i class="fas fa-square"></i> Severity:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_tool_severity_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Severity: _____________
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentPMShift($wardNurseProgressNote->id)->pa_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Pain of Score:_________/10
                                    <br>
                                    Tool Used:___________
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Pattern:__________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Quality:___________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Region:___________
                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Severity:__________
                                    <br>
                                    Others:___________
                                </span>
                            @endif
                        </td>

                        <td style="line-height: 1.2; height: 112px; border: 1px solid;">
                            @if (painAssessmentNOCShift($wardNurseProgressNote->id))
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_pain_yes)
                                        <i class="fas fa-square"></i> Yes
                                    @else
                                        <i class="far fa-square"></i> Yes
                                    @endif
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_pain_no)
                                        <i class="fas fa-square"></i> No
                                    @else
                                        <i class="far fa-square"></i> No
                                    @endif
                                    <br>
                                    Pain of Score:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_score }}
                                    </span>
                                    /10
                                    <br>
                                    Tool Used:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_used }}
                                    </span>
                                    &nbsp;

                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_pattern)
                                        <i class="fas fa-square"></i> Pattern:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_pattern_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Pattern: _____________
                                    @endif
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_quality)
                                        <i class="fas fa-square"></i> Quality:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_quality_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Quality: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_region)
                                        <i class="fas fa-square"></i> Region:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_region_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Region: _____________
                                    @endif

                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    @if (painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_severity)
                                        <i class="fas fa-square"></i> Severity:

                                        <span style="text-decoration: underline;">
                                            {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_tool_severity_blank }}
                                        </span>
                                    @else
                                        <i class="far fa-square"></i> Severity: _____________
                                    @endif
                                    <br>
                                    Others:
                                    <span style="text-decoration: underline;">
                                        {{ painAssessmentNOCShift($wardNurseProgressNote->id)->pa_others }}
                                    </span>
                                </span>
                            @else
                                <span style="font-size: 8pt;">
                                    Presence of Pain:
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Yes
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    No
                                    <br>
                                    Pain of Score:_________/10
                                    <br>
                                    Tool Used:___________
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Pattern:__________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Quality:___________
                                    <br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp; &nbsp;
                                    <i class="far fa-square"></i>
                                    Region:___________
                                    <br>
                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp;
                                    &nbsp; &nbsp;
                                    &nbsp;
                                    <i class="far fa-square"></i>
                                    Severity:__________
                                    <br>
                                    Others:___________
                                </span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>


            <table style="border-collapse: collapse; width: 100.025%; height: 186px; border: 1px solid;">
                <tbody>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;" colspan="3">
                            <strong>
                                <span style="font-size: 8pt;">
                                    INTRAVENOUS FLUID
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 10px; border: 1px solid;">
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    MAIN LINE
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    SIDE DRIP
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    SHIFT
                                </span>
                            </strong>
                        </td>
                    </tr>

                    @foreach (intravenousFluid($wardNurseProgressNote->id) as $intravenousFluid)
                        <tr style="height: 16px; border: 1px solid; font-size: 8pt;">
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $intravenousFluid->intra_fluid_main_line }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $intravenousFluid->intra_fluid_side_drip }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $intravenousFluid->intra_fluid_side_shift }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100.025%; height: 186px; border: 1px solid;">
                <tbody>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;" colspan="4">
                            <strong>
                                <span style="font-size: 8pt;">
                                    DOCTOR'S VISIT
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 10px; border: 1px solid;">
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    TIME
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    DOCTOR'S NAME
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    REMARKS
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    TYPE
                                </span>
                            </strong>
                        </td>
                    </tr>

                    @foreach (doctorsVisit($wardNurseProgressNote->id) as $doctorsVisit)
                        <tr style="height: 16px; border: 1px solid; font-size: 8pt;">
                            <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;">
                                &nbsp;
                                {{ $doctorsVisit->dv_time }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $doctorsVisit->dv_doctors_name }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                {{ $doctorsVisit->dv_remarks }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                <b>
                                    {{ $doctorsVisit->dv_type }}
                                </b>
                                <br>
                                <small>
                                &nbsp;
                                {{ $doctorsVisit->dv_type_time }}
                                </small>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <p><br><br></p>

            <table style="border-collapse: collapse; width: 100.025%; height: 186px; border: 1px solid;">
                <tbody>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;" colspan="3">
                            <strong>
                                <span style="font-size: 8pt;">
                                    NURSING DOCUMENTATION
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 10px; border: 1px solid;">
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    TIME
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    PROBLEMS IDENTIFIED/INTERVENTIONS
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    SHIFT
                                </span>
                            </strong>
                        </td>
                    </tr>

                    @foreach (nursingDocumentation($wardNurseProgressNote->id) as $nursingDocumentation)
                        <tr style="height: 16px; border: 1px solid; font-size: 8pt;">
                            <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;">
                                &nbsp;
                                {{ $nursingDocumentation->nursing_documentation_time }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $nursingDocumentation->nursing_documentation_problems }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $nursingDocumentation->nursing_documentation_shift }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <br><br>

            <table style="border-collapse: collapse; width: 100.025%; height: 186px; border: 1px solid;">
                <tbody>
                    <tr style="height: 16px; border: 1px solid;">
                        <td style="line-height: 1; height: 16px; border: 1px solid; text-align: center;" colspan="4">
                            <strong>
                                <span style="font-size: 8pt;">
                                    HANDOVER NOTES
                                </span>
                            </strong>
                        </td>
                    </tr>
                    <tr style="height: 10px; border: 1px solid;">
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    Name
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    Notes
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong><span style="font-size: 8pt;">
                                    SHIFT
                                </span>
                            </strong>
                        </td>
                        <td style="line-height: 1; height: 10px; text-align: center; border: 1px solid;">
                            <strong>
                                <span style="font-size: 8pt;">
                                    SIGNATURE
                                </span>
                            </strong>
                        </td>
                    </tr>

                    @foreach (handoverNotes($wardNurseProgressNote->id) as $handoverNotes)
                        <tr style="height: 16px; border: 1px solid; font-size: 8pt;">
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $handoverNotes->handover_name }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $handoverNotes->handover_notes }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                                {{ $handoverNotes->handover_shift }}
                            </td>
                            <td style="line-height: 1; height: 16px; border: 1px solid;">
                                &nbsp;
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>
    </div>
    </div>
@endsection
