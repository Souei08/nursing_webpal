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
                        <strong>INFORMED CONSENT FOR SURGERY</strong>
                    </span>
                </p>
{{-- 






                <p style="text-align: center;"><span
                        style="font-size: 14pt; font-family: arial, helvetica, sans-serif;"><strong
                            id="docs-internal-guid-18f9ff76-7fff-f6d2-e79d-efc2c27770b5">INFORMED CONSENT FOR
                            SURGERY</strong></span></p> --}}
                <p style="line-height: 1; text-align: justify;"><span
                        style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">This<span
                            style="letter-spacing: -.45pt;"> </span>is<span style="letter-spacing: -.45pt;">
                        </span>called<span style="letter-spacing: -.4pt;"> </span>an<span style="letter-spacing: -.55pt;">
                        </span>&ldquo;Informed<span style="letter-spacing: -.4pt;"> </span>Consent<span
                            style="letter-spacing: -.5pt;"> </span>Form&rdquo;.<span style="letter-spacing: -.5pt;">
                        </span>It<span style="letter-spacing: -.5pt;"> </span>is<span style="letter-spacing: -.45pt;">
                        </span>your<span style="letter-spacing: -.4pt;"> </span>doctor&rsquo;s<span
                            style="letter-spacing: -.45pt;"> </span>obligation<span style="letter-spacing: -.55pt;">
                        </span>to<span style="letter-spacing: -.4pt;"> </span>provide<span style="letter-spacing: -.55pt;">
                        </span>you<span style="letter-spacing: -.55pt;"> </span>with<span style="letter-spacing: -.55pt;">
                        </span>the<span style="letter-spacing: -.55pt;"> </span>information<span
                            style="letter-spacing: -.55pt;"> </span>you<span style="letter-spacing: -.4pt;">
                        </span>need<span style="letter-spacing: -.4pt;"> </span>in<span style="letter-spacing: -.4pt;">
                        </span>order to<span style="letter-spacing: -.35pt;"> </span>decide<span
                            style="letter-spacing: -.35pt;"> </span>whether<span style="letter-spacing: -.3pt;">
                        </span>to<span style="letter-spacing: -.35pt;"> </span>consent<span style="letter-spacing: -.35pt;">
                        </span>to<span style="letter-spacing: -.35pt;"> </span>the<span style="letter-spacing: -.25pt;">
                        </span>surgery<span style="letter-spacing: -.3pt;"> </span>or<span style="letter-spacing: -.2pt;">
                        </span>special<span style="letter-spacing: -.2pt;"> </span>procedure<span
                            style="letter-spacing: -.2pt;"> </span>that<span style="letter-spacing: -.35pt;">
                        </span>your<span style="letter-spacing: -.3pt;"> </span>doctors<span
                            style="letter-spacing: -.25pt;"> </span>have<span style="letter-spacing: -.25pt;">
                        </span>recommended.<span style="letter-spacing: -.35pt;"> </span>The<span
                            style="letter-spacing: -.25pt;"> </span>purpose<span style="letter-spacing: -.25pt;">
                        </span>of<span style="letter-spacing: -.25pt;"> </span>this form is to verify that you have received
                        this information and have given your consent to the surgery or special procedure recommended to you
                        or your child. You should read this form carefully and ask questions of your doctors so that you
                        understand the operation or procedure before you decide whether or not to give your consent. If you
                        have questions, you are<span style="letter-spacing: -.7pt;"> </span>encouraged<span
                            style="letter-spacing: -.7pt;"> </span>and<span style="letter-spacing: -.7pt;">
                        </span>expected<span style="letter-spacing: -.7pt;"> </span>to<span style="letter-spacing: -.7pt;">
                        </span>ask<span style="letter-spacing: -.7pt;"> </span>them<span style="letter-spacing: -.7pt;">
                        </span>before<span style="letter-spacing: -.7pt;"> </span>you<span style="letter-spacing: -.7pt;">
                        </span>sign<span style="letter-spacing: -.65pt;"> </span>this<span style="letter-spacing: -.7pt;">
                        </span>form.<span style="letter-spacing: -.7pt;"> </span>Your<span style="letter-spacing: -.7pt;">
                        </span>doctors<span style="letter-spacing: -.7pt;"> </span>are<span style="letter-spacing: -.7pt;">
                        </span>not<span style="letter-spacing: -.7pt;"> </span>employees<span
                            style="letter-spacing: -.7pt;"> </span>or<span style="letter-spacing: -.7pt;"> </span>agent<span
                            style="letter-spacing: -.65pt;"> </span>of<span style="letter-spacing: -.7pt;"> </span>the<span
                            style="letter-spacing: -.7pt;"> </span>hospital. They are independent medical
                        practitioners</span></p>
                <ol>
                    <li style="line-height: 1; font-size: 12pt; text-align: justify;"><span style="font-size: 12pt;"><span
                                style="font-family: arial, helvetica, sans-serif;">&nbsp;<span
                                    style="font-family: Arial, sans-serif;">Your<span style="letter-spacing: -.35pt;">
                                    </span>signature<span style="letter-spacing: -.3pt;"> </span>on<span
                                        style="letter-spacing: -.45pt;"> </span>this<span style="letter-spacing: -.3pt;">
                                    </span>form<span style="letter-spacing: -.3pt;"> </span>indicates<span
                                        style="letter-spacing: -.35pt;"> </span><span
                                        style="letter-spacing: -.2pt;">that:<br></span></span>1. <span
                                    style="font-family: Arial, sans-serif;">You<span style="letter-spacing: -.35pt;">
                                    </span>have<span style="letter-spacing: -.35pt;"> </span>read<span
                                        style="letter-spacing: -.35pt;"> </span>and<span style="letter-spacing: -.3pt;">
                                    </span>understand<span style="letter-spacing: -.35pt;"> </span>the<span
                                        style="letter-spacing: -.35pt;"> </span>information<span
                                        style="letter-spacing: -.25pt;"> </span>provided<span
                                        style="letter-spacing: -.4pt;"> </span>in<span style="letter-spacing: -.25pt;">
                                    </span>this<span style="letter-spacing: -.35pt;"> </span><span
                                        style="letter-spacing: -.1pt;">form.</span></span></span><span
                                style="font-family: arial, helvetica, sans-serif;"><span
                                    style="font-family: Arial, sans-serif;"><span style="letter-spacing: -.1pt;"><br>2.
                                        Your<span style="letter-spacing: -.4pt;"> </span>doctor<span
                                            style="letter-spacing: -.4pt;"> </span>has<span
                                            style="letter-spacing: -.4pt;"> </span>adequately<span
                                            style="letter-spacing: -.5pt;"> </span>explained<span
                                            style="letter-spacing: -.45pt;"> </span>to<span
                                            style="letter-spacing: -.45pt;"> </span>you<span
                                            style="letter-spacing: -.5pt;"> </span>the<span
                                            style="letter-spacing: -.5pt;"> </span>operation<span
                                            style="letter-spacing: -.5pt;"> </span>or<span style="letter-spacing: -.4pt;">
                                        </span>procedure<span style="letter-spacing: -.6pt;"> </span>and<span
                                            style="letter-spacing: -.5pt;"> </span>the<span
                                            style="letter-spacing: -.5pt;"> </span>anesthesia<span
                                            style="letter-spacing: -.45pt;"> </span>set<span
                                            style="letter-spacing: -.45pt;"> </span>forth<span
                                            style="letter-spacing: -.45pt;"> </span>along<span
                                            style="letter-spacing: -.6pt;"> </span>with the risks, benefits and other
                                        information described above in this form.<br>3.You<span
                                            style="letter-spacing: -.35pt;"> </span>have<span
                                            style="letter-spacing: -.35pt;"> </span>received<span
                                            style="letter-spacing: -.3pt;"> </span>all<span
                                            style="letter-spacing: -.4pt;"> </span>of<span
                                            style="letter-spacing: -.35pt;"> </span>the<span
                                            style="letter-spacing: -.25pt;"> </span>information<span
                                            style="letter-spacing: -.35pt;"> </span>you<span
                                            style="letter-spacing: -.3pt;"> </span>desire<span
                                            style="letter-spacing: -.25pt;"> </span>concerning<span
                                            style="letter-spacing: -.35pt;"> </span>the<span
                                            style="letter-spacing: -.35pt;"> </span>operation<span
                                            style="letter-spacing: -.3pt;"> </span>or<span
                                            style="letter-spacing: -.35pt;"> </span>procedure<span
                                            style="letter-spacing: -.35pt;"> </span>and<span
                                            style="letter-spacing: -.4pt;"> </span>the<span
                                            style="letter-spacing: -.3pt;"> </span>anesthesia.<br>4. You<span
                                            style="letter-spacing: -.35pt;"> </span>have<span
                                            style="letter-spacing: -.35pt;"> </span>received<span
                                            style="letter-spacing: -.3pt;"> </span>all<span
                                            style="letter-spacing: -.4pt;"> </span>of<span
                                            style="letter-spacing: -.35pt;"> </span>the<span
                                            style="letter-spacing: -.25pt;"> </span>information<span
                                            style="letter-spacing: -.35pt;"> </span>you<span
                                            style="letter-spacing: -.3pt;"> </span>desire<span
                                            style="letter-spacing: -.25pt;"> </span>concerning<span
                                            style="letter-spacing: -.35pt;"> </span>the<span
                                            style="letter-spacing: -.35pt;"> </span>operation<span
                                            style="letter-spacing: -.3pt;"> </span>or<span
                                            style="letter-spacing: -.35pt;"> </span>procedure<span
                                            style="letter-spacing: -.35pt;"> </span>and<span
                                            style="letter-spacing: -.4pt;"> </span>the<span
                                            style="letter-spacing: -.3pt;"> </span>anesthesia.<br>5. You<span
                                            style="letter-spacing: -.25pt;"> </span>understand<span
                                            style="letter-spacing: -.25pt;"> </span>that<span
                                            style="letter-spacing: -.25pt;"> </span>if<span
                                            style="letter-spacing: -.2pt;"> </span>tissues<span
                                            style="letter-spacing: -.15pt;"> </span>or<span
                                            style="letter-spacing: -.2pt;"> </span>organs<span
                                            style="letter-spacing: -.15pt;"> </span>are<span
                                            style="letter-spacing: -.2pt;"> </span>removed<span
                                            style="letter-spacing: -.2pt;"> </span>during<span
                                            style="letter-spacing: -.2pt;"> </span>procedure.<span
                                            style="letter-spacing: -.2pt;"> </span>They<span
                                            style="letter-spacing: -.15pt;"> </span>may or<span
                                            style="letter-spacing: -.2pt;"> </span>may<span
                                            style="letter-spacing: -.15pt;"> </span>not<span
                                            style="letter-spacing: -.2pt;"> </span>be<span style="letter-spacing: -.2pt;">
                                        </span>submitted<span style="letter-spacing: -.2pt;"> </span>for pathological
                                        examination, following which they will be disposed of appropriately according to
                                        protocol, in the event<span style="letter-spacing: -.4pt;"> </span>of<span
                                            style="letter-spacing: -.3pt;"> </span>body<span
                                            style="letter-spacing: -.35pt;"> </span>part<span
                                            style="letter-spacing: -.35pt;"> </span>is<span
                                            style="letter-spacing: -.35pt;"> </span>removal,<span
                                            style="letter-spacing: -.4pt;"> </span>I<span style="letter-spacing: -.4pt;">
                                        </span>authorize<span style="letter-spacing: -.4pt;"> </span>my<span
                                            style="letter-spacing: -.35pt;"> </span>next<span
                                            style="letter-spacing: -.4pt;"> </span>of<span style="letter-spacing: -.4pt;">
                                        </span>kin<span style="letter-spacing: -.4pt;"> </span>to<span
                                            style="letter-spacing: -.4pt;"> </span>sign<span
                                            style="letter-spacing: -.4pt;"> </span>on<span style="letter-spacing: -.4pt;">
                                        </span>my<span style="letter-spacing: -.35pt;"> </span>behalf<span
                                            style="letter-spacing: -.4pt;"> </span>the<span
                                            style="letter-spacing: -.4pt;"> </span>Consent<span
                                            style="letter-spacing: -.4pt;"> </span>for<span
                                            style="letter-spacing: -.35pt;"> </span>Body<span
                                            style="letter-spacing: -.35pt;"> </span>Release<span
                                            style="letter-spacing: -.4pt;"> </span>and Release Disposal Form.<br>6. You
                                        have been advised that there is possibility of damage to teeth during administration
                                        of anesthesia particularly id the teeth are weak, decayed or artificial and you
                                        waive any claim for damage to teeth.<br>7. &nbsp;You understand that if you are
                                        pregnant, or if there is the possibility that you may be pregnant, you inform the
                                        team immediately since the surgery/procedure could bring harm to yourself or your
                                        unborn child.<br>8. If<span style="letter-spacing: -.35pt;">
                                        </span>complication<span style="letter-spacing: -.35pt;"> </span>arise<span
                                            style="letter-spacing: -.25pt;"> </span>during<span
                                            style="letter-spacing: -.3pt;"> </span>surgery<span
                                            style="letter-spacing: -.3pt;"> </span>you<span
                                            style="letter-spacing: -.4pt;"> </span>agree<span
                                            style="letter-spacing: -.35pt;"> </span>to<span
                                            style="letter-spacing: -.25pt;"> </span>be<span
                                            style="letter-spacing: -.3pt;"> </span>admitted<span
                                            style="letter-spacing: -.4pt;"> </span>to<span
                                            style="letter-spacing: -.35pt;"> </span>UM<span
                                            style="letter-spacing: -.25pt;"> </span>Hospital.<br>9. You<span
                                            style="letter-spacing: -.25pt;"> </span>have<span
                                            style="letter-spacing: -.2pt;"> </span>had<span
                                            style="letter-spacing: -.2pt;"> </span>a<span style="letter-spacing: -.35pt;">
                                        </span>chance<span style="letter-spacing: -.3pt;"> </span>to ask<span
                                            style="letter-spacing: -.25pt;"> </span>your<span
                                            style="letter-spacing: -.25pt;"> </span>doctors<span
                                            style="letter-spacing: -.2pt;"> </span>questions.<br>10. Do you consent to the
                                        photographing or videotaping of the surgery or procedure(s) to be performed,
                                        including appropriate portions of your body for medical, scientific, or educational
                                        purposes?<br>Yes ___ No ____ (Please counterisign your answer). If YES, UM commits
                                        to keep your identity confidential.<br>11. Do you consent to the presence of
                                        observers in the operating room? Such as students, medical residents, medical
                                        equipment representatives or other persons approved by the surgeon.&nbsp;<br><span
                                            style="font-family: arial, helvetica, sans-serif;"><span
                                                style="font-family: Arial, sans-serif;">Yes ___ No ____ (Please
                                                counterisign your answer). NOTE: UM commits to keep your identity
                                                confidential.</span></span><br></span></span></span></span></li>
                    <li style="line-height: 1; font-size: 12pt; text-align: justify;"><span
                            style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><span
                                style="font-family: arial, helvetica, sans-serif;"><span
                                    style="font-family: Arial, sans-serif;">All procedures carry the risk of unsuccessful
                                    results, complications, injury or even death, from both know and unforeseen<span
                                        style="letter-spacing: -.45pt;"> </span>causes,<span
                                        style="letter-spacing: -.45pt;"> </span>and<span style="letter-spacing: -.45pt;">
                                    </span>no<span style="letter-spacing: -.25pt;"> </span>warranty<span
                                        style="letter-spacing: -.4pt;"> </span>or<span style="letter-spacing: -.4pt;">
                                    </span>guarantee<span style="letter-spacing: -.45pt;"> </span>is<span
                                        style="letter-spacing: -.4pt;"> </span>made<span style="letter-spacing: -.45pt;">
                                    </span>as<span style="letter-spacing: -.4pt;"> </span>to<span
                                        style="letter-spacing: -.45pt;"> </span>result<span
                                        style="letter-spacing: -.45pt;"> </span>or<span style="letter-spacing: -.4pt;">
                                    </span>cure.<span style="letter-spacing: -.45pt;"> </span>Your<span
                                        style="letter-spacing: -.4pt;"> </span>doctor<span style="letter-spacing: -.4pt;">
                                    </span>will<span style="letter-spacing: -.5pt;"> </span>discuss<span
                                        style="letter-spacing: -.4pt;"> </span>with<span style="letter-spacing: -.45pt;">
                                    </span>you<span style="letter-spacing: -.45pt;"> </span>the risks and benefits of this
                                    recommendation operation. You have the right to be informed of the following:<br>1.
                                    The<span style="letter-spacing: -.45pt;"> </span>nature<span
                                        style="letter-spacing: -.3pt;"> </span>of<span style="letter-spacing: -.4pt;">
                                    </span>the<span style="letter-spacing: -.35pt;"> </span>operation<span
                                        style="letter-spacing: -.3pt;"> </span>or<span style="letter-spacing: -.4pt;">
                                    </span>procedure<span style="letter-spacing: -.35pt;"> </span>including<span
                                        style="letter-spacing: -.4pt;"> </span>the<span style="letter-spacing: -.25pt;">
                                    </span>surgical<span style="letter-spacing: -.45pt;"> </span>site,<span
                                        style="letter-spacing: -.35pt;"> </span>treatment,<span
                                        style="letter-spacing: -.4pt;"> </span>medications<span
                                        style="letter-spacing: -.3pt;"> </span>or<span style="letter-spacing: -.25pt;">
                                    </span>other care.<br>2. Other<span style="letter-spacing: -.4pt;"> </span>issues<span
                                        style="letter-spacing: -.4pt;"> </span>discussed<span
                                        style="letter-spacing: -.5pt;"> </span>with<span style="letter-spacing: -.45pt;">
                                    </span>the<span style="letter-spacing: -.35pt;"> </span>patient/patient&rsquo;s<span
                                        style="letter-spacing: -.4pt;"> </span>legal<span style="letter-spacing: -.4pt;">
                                    </span><span style="letter-spacing: -.1pt;">guardian.<br>3.&nbsp;Your doctors have
                                        recommended the following operation or procedure <u><span
                                                style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span></u>and<span
                                            style="letter-spacing: -.4pt;"> </span>the<span
                                            style="letter-spacing: -.45pt;"> </span>following<span
                                            style="letter-spacing: -.45pt;"> </span>type of anesthesia: <u><span
                                                style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></u>.
                                        Upon your authorization and consent this operation or procedure, together with any
                                        different or further procedures which in the opinion of the doctor(s) performing the
                                        procedure, maybe indicated due to any emergency, will be performed on you or your
                                        child. The operations or procedures will be performed by the doctor, together with
                                        associates and assistants, including anesthesiologists, pathologist, and radiologist
                                        from the medical staff of University of Mindanao Hospital to whom the doctor(s)
                                        performing the procedure may assign designated
                                        responsibility.</span></span></span></span><span
                            style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><span
                                style="font-family: arial, helvetica, sans-serif;"><span
                                    style="font-family: Arial, sans-serif;"><span
                                        style="letter-spacing: -.1pt;"><br><br><strong>4. Physician
                                            Certification<br></strong>&nbsp; &nbsp; I, the undersigned physician, hereby
                                        certify that I have discussed the procedure described in this consent from with this
                                        patient (or the patient&rsquo;s legal representatives), including<br>&nbsp; &nbsp;
                                        1. The<span style="letter-spacing: -.35pt;"> </span>risks<span
                                            style="letter-spacing: -.25pt;"> </span>and<span
                                            style="letter-spacing: -.15pt;"> </span>benefits<span
                                            style="letter-spacing: -.25pt;"> </span>of<span
                                            style="letter-spacing: -.3pt;"> </span>the<span
                                            style="letter-spacing: -.3pt;"> </span>procedure;<br>&nbsp; &nbsp; 2. Any<span
                                            style="letter-spacing: -.35pt;"> </span>adverse<span
                                            style="letter-spacing: -.35pt;"> </span>reactions<span
                                            style="letter-spacing: -.35pt;"> </span>that<span
                                            style="letter-spacing: -.3pt;"> </span>may<span
                                            style="letter-spacing: -.3pt;"> </span>reasonably<span
                                            style="letter-spacing: -.35pt;"> </span>be<span
                                            style="letter-spacing: -.3pt;"> </span>expected<span
                                            style="letter-spacing: -.35pt;"> </span>to<span
                                            style="letter-spacing: -.3pt;"> </span>occur;<br></span></span></span></span>
                        <p class="MsoNormal"><span style="font-size: 12pt;"><span
                                    style="font-family: arial, helvetica, sans-serif;">Any<span
                                        style="letter-spacing: -.45pt;"> </span>alternative<span
                                        style="letter-spacing: -.45pt;"> </span>efficacious<span
                                        style="letter-spacing: -.4pt;"> </span>methods<span
                                        style="letter-spacing: -.45pt;"> </span>of<span style="letter-spacing: -.45pt;">
                                    </span>treatment<span style="letter-spacing: -.4pt;"> </span>which<span
                                        style="letter-spacing: -.5pt;"> </span>maybe<span style="letter-spacing: -.5pt;">
                                    </span>medically<span style="letter-spacing: -.45pt;"> </span></span><span
                                    style="letter-spacing: -.1pt;"><span
                                        style="font-family: arial, helvetica, sans-serif;">viable;</span><br></span>&nbsp;
                                &nbsp; <span style="font-family: arial, helvetica, sans-serif;">3.&nbsp;</span><span
                                    style="font-family: Arial, sans-serif;">The<span style="letter-spacing: -.5pt;">
                                    </span>potential<span style="letter-spacing: -.5pt;"> </span>problems<span
                                        style="letter-spacing: -.35pt;"> </span>that<span style="letter-spacing: -.35pt;">
                                    </span>may<span style="letter-spacing: -.4pt;"> </span>occur<span
                                        style="letter-spacing: -.45pt;"> </span>during<span
                                        style="letter-spacing: -.2pt;"> </span>recuperation; and<br>&nbsp; &nbsp; 4.
                                    &nbsp;Any<span style="letter-spacing: -.35pt;"> </span>research<span
                                        style="letter-spacing: -.3pt;"> </span>or<span style="letter-spacing: -.35pt;">
                                    </span>economic<span style="letter-spacing: -.25pt;"> </span>interest<span
                                        style="letter-spacing: -.35pt;"> </span>I<span style="letter-spacing: -.3pt;">
                                    </span>may<span style="letter-spacing: -.3pt;"> </span>have<span
                                        style="letter-spacing: -.4pt;"> </span>regarding<span
                                        style="letter-spacing: -.35pt;"> </span>this<span style="letter-spacing: -.35pt;">
                                    </span><span style="letter-spacing: -.1pt;">treatment.<br>&nbsp; &nbsp; 5.
                                        Transfusion<span style="letter-spacing: -.5pt;"> </span>of<span
                                            style="letter-spacing: -.45pt;"> </span>blood<span
                                            style="letter-spacing: -.6pt;"> </span>or<span style="letter-spacing: -.4pt;">
                                        </span>blood<span style="letter-spacing: -.6pt;"> </span>products<span
                                            style="letter-spacing: -.5pt;"> </span>involves<span
                                            style="letter-spacing: -.5pt;"> </span>certain<span
                                            style="letter-spacing: -.35pt;"> </span>risks<span
                                            style="letter-spacing: -.5pt;"> </span>including<span
                                            style="letter-spacing: -.6pt;"> </span>the<span
                                            style="letter-spacing: -.6pt;"> </span>transmission<span
                                            style="letter-spacing: -.45pt;"> </span>of<span
                                            style="letter-spacing: -.6pt;"> </span>disease<span
                                            style="letter-spacing: -.45pt;"> </span>such as: Hepatitis B or Human
                                        Immunodeficiency Virus (HIV) and you have a right to consent or refuse consent<span
                                            style="letter-spacing: -.3pt;"> </span>to<span
                                            style="letter-spacing: -.35pt;"> </span>any<span
                                            style="letter-spacing: -.3pt;"> </span>transfusion.<span
                                            style="letter-spacing: -.25pt;"> </span>You<span
                                            style="letter-spacing: -.35pt;"> </span>should<span
                                            style="letter-spacing: -.35pt;"> </span>discuss<span
                                            style="letter-spacing: -.25pt;"> </span>that<span
                                            style="letter-spacing: -.3pt;"> </span>you<span
                                            style="letter-spacing: -.35pt;"> </span>may<span
                                            style="letter-spacing: -.25pt;"> </span>have<span
                                            style="letter-spacing: -.35pt;"> </span>about<span
                                            style="letter-spacing: -.35pt;"> </span>transfusions<span
                                            style="letter-spacing: -.25pt;"> </span>with<span
                                            style="letter-spacing: -.35pt;"> </span>your<span
                                            style="letter-spacing: -.3pt;"> </span>doctor.</span></span></span></p>
                        <p class="MsoNormal">&nbsp;</p>
                    </li>
                </ol>
                <p class="MsoBodyText" style="text-align: justify;"><span
                        style="font-size: 12pt; font-family: arial, helvetica, sans-serif;">I<span
                            style="letter-spacing: -.35pt;"> </span>further<span style="letter-spacing: -.3pt;">
                        </span>certify<span style="letter-spacing: -.3pt;"> </span>that<span
                            style="letter-spacing: -.25pt;"> </span>the<span style="letter-spacing: -.25pt;">
                        </span>patient<span style="letter-spacing: -.3pt;"> </span>was<span
                            style="letter-spacing: -.3pt;"> </span>encouraged<span style="letter-spacing: -.25pt;">
                        </span>to<span style="letter-spacing: -.35pt;"> </span>ask<span style="letter-spacing: -.3pt;">
                        </span>questions<span style="letter-spacing: -.3pt;"> </span>and<span
                            style="letter-spacing: -.3pt;"> </span>that<span style="letter-spacing: -.4pt;">
                        </span>all<span style="letter-spacing: -.3pt;"> </span>questions<span
                            style="letter-spacing: -.3pt;"> </span>were<span style="letter-spacing: -.3pt;"> </span><span
                            style="letter-spacing: -.1pt;">answered.</span></span></p>
                <p class="MsoBodyText" style="text-align: justify;"><span
                        style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><span
                            style="letter-spacing: -.1pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;__________________________________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp;________________<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Surgeon's Printed Name &amp; Signature&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;Date &amp; Time</span></span></p>
                <p class="MsoBodyText" style="text-align: justify;"><span
                        style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><span
                            style="letter-spacing: -.1pt;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; ____________________________________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;________________<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Anesthesiologist Printed Name &amp; Signature&nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Date &amp;
                            Time</span></span></p>
                <p class="MsoBodyText" style="text-align: justify;"><span
                        style="font-size: 12pt; font-family: arial, helvetica, sans-serif;"><span
                            style="letter-spacing: -.1pt;"><span
                                style="font-family: Arial, sans-serif; letter-spacing: -0.1pt;">Conforme</span><span
                                style="font-family: Arial, sans-serif;"><span style="mso-tab-count: 1;">&nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span>If<span
                                    style="letter-spacing: -.35pt;"> </span>patient<span style="letter-spacing: -.4pt;">
                                </span>is<span style="letter-spacing: -.2pt;"> </span>a<span
                                    style="letter-spacing: -.35pt;"> </span>minor/legally<span
                                    style="letter-spacing: -.3pt;">
                                </span>incompetent:<br>_______________________________&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp;__________________________________<br>Patient's Signature over
                                Printed Name&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp;Representative's Signature over Printed Name<br>_______________&nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;______________<br>Date &amp;
                                Time &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <span
                                    style="font-family: arial, helvetica, sans-serif;"><span
                                        style="font-family: Arial, sans-serif;">Date &amp;
                                        Time</span></span></span></span></span></p>
                <h3 style="margin-top: 9.15pt; text-indent: 0in; text-align: justify;"><span
                        style="font-size: 12pt;">Interpreter&rsquo;s<span style="letter-spacing: -.45pt;">
                        </span>Statement:<span style="letter-spacing: -.45pt;"> </span>(If<span
                            style="letter-spacing: -.45pt;"> </span>interpreter<span style="letter-spacing: -.5pt;">
                        </span>service<span style="letter-spacing: -.4pt;"> </span>is<span style="letter-spacing: -.5pt;">
                        </span><span style="letter-spacing: -.1pt;">availed)</span></span></h3>
                <p style="margin-top: 9.15pt; text-indent: 0in; text-align: justify;"><span style="font-size: 12pt;">I
                        have accurately and completely read the foregoing document to (patient or patient&rsquo;s legal
                        representative) in their primary language (identify language)&nbsp;<u><span
                                style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp; </span></u>. He/she understood all of
                        the terms and conditions and acknowledge his/her agreement by signing the document in my
                        presence.</span></p>
                <p style="margin-top: 9.15pt; text-indent: 0in; text-align: justify;"><span
                        style="font-size: 12pt;">__________________________________________<br>Interpreter's Printed Name
                        &amp; Signature</span></p>
                <p style="margin-top: 9.15pt; text-indent: 0in; text-align: justify;"><span
                        style="font-size: 12pt;">__________________<br>Date &amp; Time</span></p>








                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
