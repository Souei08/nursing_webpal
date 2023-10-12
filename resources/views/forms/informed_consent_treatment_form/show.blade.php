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
                                <a href="{{ route('forms.list') }}" class="btn btn-dark">
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
                        <strong>
                            INFORMED CONSENT FOR TREATMENT AND/OR PROCEDURES
                        </strong>
                    </span>
                </p>

                <p class="MsoNormal" style="text-align: justify;"><span lang="EN-PH"
                        style="font-family: 'Arial',sans-serif;">TO WHOM IT MAY CONCERN:<br><br></span><span lang="EN-PH"
                        style="font-family: 'Arial',sans-serif;">I, ______________________________________, ______ years
                        old, single/married/widowed, hereby consent to the performance upon&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;&nbsp;<br></span><span lang="EN-PH" style="font-family: 'Arial',sans-serif;"><span
                            style="mso-tab-count: 2;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>(Given
                        Name)<span
                            style="mso-tab-count: 2;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>(Surname)<span
                            style="mso-tab-count: 5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span
                            style="mso-tab-count: 7;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp; <br></span></span><span lang="EN-PH"
                        style="font-family: 'Arial',sans-serif;">&nbsp;_______________________________ who is my
                        _____________________________, the treatment/procedure hereunder stated after<br></span><span
                        lang="EN-PH" style="font-family: 'Arial',sans-serif;">&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;(Myself/Name of Patient)<span
                            style="mso-tab-count: 5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>(Relation)<br></span><span lang="EN-PH" style="font-family: 'Arial',sans-serif;">have been
                        fully explained of my illness, condition or disability, its severity, likely prognosis, benefits and
                        possible adverse effects of various treatment options and the likely costs of treatment to me by the
                        doctor/s and other healthcare providers concerned of this institution.
                        <br><br>


                        <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
                            <tr style="text-align: center;">
                                <td style="border: 1px solid;">
                                    <b>Date Consented</b>
                                </td>
                                <td style="border: 1px solid;">
                                    <b>Treatment/Procedures/Others</b>
                                </td>
                                <td style="border: 1px solid;">
                                    <b>Explained by:</b>
                                </td>
                                <td style="border: 1px solid;">
                                    <b>Patient's Signature</b>
                                </td>
                                <td style="border: 1px solid;">
                                    <b>Witness Signature</b>
                                </td>
                            </tr>

                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                                <td style="border: 1px solid;">&nbsp;</td>
                            </tr>
                        </table>
                </p>
                <p class="MsoNormal" style="text-align: justify;"><span lang="EN-PH"
                        style="font-family: 'Arial',sans-serif;">I also consent to the taking of photographs in the course
                        of this treatment for the purpose of advancing medical knowledge.<span style="mso-tab-count: 1;">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>
                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
