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
                        <strong>INFORMED CONSENT FOR ADMISSION, TREATMENT AND OTHER PROCEDURES</strong>
                    </span>
                </p>

                <pre style="text-align: center;">&nbsp;</pre>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;">
                    <span style="font-size: 10.0pt;">Please
                        read carefully before signing.</span>
                </p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;">
                    <span style="font-size: 10.0pt;">
                        I am
                        aware and give consent to the collection, processing and destruction of my personal information and
                        medical records as permitted by law. I further attest that all personal information and supporting
                        documents provided by me are correct and complete. I am aware that any false statement or fraudulent
                        document will render me liable under applicable law.
                    </span>
                </p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I<span
                            style="letter-spacing: -.1pt;"> </span>authorize<span style="letter-spacing: -.1pt;">
                        </span>the<span style="letter-spacing: -.2pt;"> </span>medical<span style="letter-spacing: -.2pt;">
                        </span>and<span style="letter-spacing: -.2pt;"> </span>hospital<span
                            style="letter-spacing: -.15pt;"> </span>staff<span style="letter-spacing: -.1pt;">
                        </span>in<span style="letter-spacing: -.2pt;"> </span>charge<span style="letter-spacing: -.2pt;">
                        </span>of<span style="letter-spacing: -.2pt;"> </span>my/my<span style="letter-spacing: -.15pt;">
                        </span>patient&rsquo;s care<span style="letter-spacing: -.2pt;"> </span>to<span
                            style="letter-spacing: .25pt;"> </span>perform<span style="letter-spacing: -.05pt;">
                        </span>the<span style="letter-spacing: -.1pt;"> </span>necessary<span
                            style="letter-spacing: -.05pt;"> </span>tests<span style="letter-spacing: -.05pt;">
                        </span>and<span style="letter-spacing: -.2pt;"> </span>procedures<span
                            style="letter-spacing: -.2pt;"> </span>and<span style="letter-spacing: -.15pt;"> </span>to<span
                            style="letter-spacing: -.2pt;"> </span>administer treatment as may be warranted to address my/my
                        patient&rsquo;s medical<span style="letter-spacing: -.45pt;"> </span>condition.</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I
                        acknowledge that the following issues have been discussed to me by attending physician/s and
                        hospital staff on duty.</span></p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">1.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">The nature of the decision or procedure/s to be performed
                        on me/my<span style="letter-spacing: -.6pt;"> </span>patient.</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">2.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Reasonable alternatives to the proposal<span
                            style="letter-spacing: -.3pt;"> </span>interventions.</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">3.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">The relative risks, benefits, and uncertainties related
                        to each<span style="letter-spacing: -.3pt;"> </span>alternative.</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">4.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Presence of student affiliates and medical personnel
                        under residency<span style="letter-spacing: -.45pt;"> </span>program.</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">5.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Authorization to collect and process my/my
                        patient&rsquo;s personal data and everything written in UM privacy<span
                            style="letter-spacing: -1.3pt;"> </span>notice.</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">6.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Authorization to process<span
                            style="letter-spacing: -.2pt;"> </span>claim.</span>
                </p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I
                        acknowledge that I have been informed of my/my patient&rsquo;s rights which are:</span></p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">1.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right to appropriate medical care<span
                            style="letter-spacing: -.7pt;"> </span>and<span style="letter-spacing: -.1pt;">
                        </span>humane<span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp; </span>7. Right to religious belief
                        treatment<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span></span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">2.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right to<span style="letter-spacing: -.1pt;">
                        </span>informed<span style="letter-spacing: -.15pt;"> </span>consent<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;</span>8. Right to medical<span
                            style="letter-spacing: -.55pt;"> </span>records </span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">3.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right to Privacy<span style="letter-spacing: -.3pt;">
                        </span>and<span style="letter-spacing: -.1pt;"> </span>Confidentiality<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>9. Right to<span style="letter-spacing: -.1pt;"> </span>leave </span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">4.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right<span style="letter-spacing: -.05pt;">
                        </span>to<span style="letter-spacing: -.05pt;"> </span>Information<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>10. Right to correspondence and receive<span style="letter-spacing: -.3pt;"> </span>visitors
                    </span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">5.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right to choose healthcare provider<span
                            style="letter-spacing: -.6pt;"> </span>and<span style="letter-spacing: -.2pt;">
                        </span>facility<span style="mso-spacerun: yes;">&nbsp; </span>11. Right to express<span
                            style="letter-spacing: -.1pt;"> </span>grievance </span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">6.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Right<span style="letter-spacing: -.15pt;">
                        </span>to<span style="letter-spacing: -.1pt;"> </span>self-determination<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span>12. Right to be informed of his
                        rights<span style="letter-spacing: -.6pt;"> </span>and obligations as a<span
                            style="letter-spacing: .1pt;"> </span>patient</span>
                </p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I
                        further acknowledge and respect my responsibilities which are:</span></p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">1.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Compliance<span style="letter-spacing: -.1pt;">
                        </span>to<span style="letter-spacing: -.1pt;"> </span>instruction<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span>4. Financial<span
                            style="letter-spacing: -.1pt;"> </span>obligations</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">2.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Provision of<span style="letter-spacing: -.35pt;">
                        </span>accurate<span style="letter-spacing: -.1pt;"> </span>information<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span>5. Respect and consideration to<span
                            style="letter-spacing: -.3pt;"> </span>others</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: -0.25in; line-height: 1;">
                    <!-- [if !supportLists]--><span style="font-size: 10.0pt;"><span style="mso-list: Ignore;">3.<span
                                style="font: 7.0pt 'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span>
                    <!--[endif]--><span style="font-size: 10.0pt;">Hospital rules<span style="letter-spacing: -.25pt;">
                        </span>and<span style="letter-spacing: -.1pt;"> </span>regulations<span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span>6. Reporting of
                        complaints/concerns &amp;<span style="letter-spacing: -.2pt;"> </span>feedback</span>
                </p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: 0in; line-height: 1;"><span
                        style="font-size: 10.0pt;"><span style="mso-spacerun: yes;">&nbsp; </span>- No brought in
                        medicines and supplies<span style="letter-spacing: -.25pt;"> </span>allowed </span></p>
                <p class="MsoNormal" style="margin-left: 0.25in; text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;"><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>- Safe keeping
                        of<span style="letter-spacing: -.45pt;"> </span>personal<span style="letter-spacing: -.2pt;">
                        </span>valuable</span></p>
                <p class="MsoListParagraph"
                    style="margin-left: 0.5in; text-align: justify; text-indent: 0in; line-height: 1;"><span
                        style="font-size: 10.0pt;"><span style="mso-spacerun: yes;">&nbsp; </span>- Visiting hours<span
                            style="letter-spacing: -.35pt;"> </span>and<span style="letter-spacing: -.1pt;">
                        </span>guidelines </span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;"><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>- Others</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I am
                        aware that the practice of medicine is not an exact science and I recognize that complications and
                        adverse events may happen in the course of my/my patient&rsquo;s treatment.</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">&nbsp;</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I
                        hereby state that I have read, understood and given my consent to all contents thru my signature
                        with agreement.</span></p>
                <p class="MsoListParagraph" style="margin-left: 114pt; text-indent: 0in; line-height: 1;"><span
                        style="font-size: 10.0pt;">--CONSENTED<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp; </span>-- REFUSED</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><strong><span
                            style="font-size: 10.0pt;">________________________________________________________________________________________________________</span></strong>
                </p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">_____________________<span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp; </span><span style="mso-spacerun: yes;">&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;</span>__________________________<span
                            style="mso-spacerun: yes;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;</span>Relation to<span style="letter-spacing: -.3pt;">
                        </span>Patient:<span style="letter-spacing: -.1pt;"> </span><u><span
                                style="mso-spacerun: yes;">&nbsp;</span><span
                                style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span></u></span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">Patient&rsquo;s<span style="letter-spacing: -.1pt;">
                        </span>Signature<span style="letter-spacing: -.15pt;"> </span>over<span style="mso-tab-count: 1;">
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp; </span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;&nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;</span>Representative&rsquo;s Signature over </span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">Printed Name/Date &amp; Time <span
                            style="mso-spacerun: yes;">&nbsp;</span><span style="mso-spacerun: yes;">&nbsp;</span><span
                            style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp;</span>Printed Name/Date &amp;<span
                            style="letter-spacing: -.4pt;"> </span>Time</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><strong
                        style="mso-bidi-font-weight: normal;"><span style="font-size: 10.0pt;">Interpreter&rsquo;s
                            Statement: (If interpreter service is availed)</span></strong></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span style="font-size: 10.0pt;">I<span
                            style="letter-spacing: -.25pt;"> </span>have<span style="letter-spacing: -.15pt;">
                        </span>accurately<span style="letter-spacing: -.15pt;"> </span>and<span
                            style="letter-spacing: -.25pt;"> </span>completely<span style="letter-spacing: -.15pt;">
                        </span>read<span style="letter-spacing: -.2pt;"> </span>the<span style="letter-spacing: -.2pt;">
                        </span>foregoing<span style="letter-spacing: -.25pt;"> </span>document<span
                            style="letter-spacing: -.2pt;"> </span>to<span style="letter-spacing: -.2pt;">
                        </span>(patient<span style="letter-spacing: -.2pt;"> </span>or<span
                            style="letter-spacing: -.25pt;"> </span>patient&rsquo;s<span style="letter-spacing: -.15pt;">
                        </span>legal<span style="letter-spacing: -.3pt;"> </span>representative)<span
                            style="letter-spacing: -.2pt;"> </span>in<span style="letter-spacing: -.35pt;">
                        </span>their<span style="letter-spacing: -.2pt;"> </span>primary<span
                            style="letter-spacing: -.3pt;"> </span>language<span style="letter-spacing: -.2pt;">
                        </span>(identify language)<u> <span style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </span></u>. He/she understood all of the terms and conditions and acknowledge his/her agreement
                        by signing the document in my presence.</span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">__________________________________<span
                            style="mso-spacerun: yes;">&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>____________<span
                            style="mso-spacerun: yes;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        </span>_____________________________________________ </span></p>
                <p class="MsoNormal" style="text-align: justify; line-height: 1;"><span
                        style="font-size: 10.0pt;">Interpreter&rsquo;s Printed name<span style="letter-spacing: -.4pt;">
                        </span>&amp;<span style="letter-spacing: -.1pt;"> </span>Signature<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>Date<span style="letter-spacing: -.05pt;">
                        </span>and<span style="letter-spacing: -.05pt;"> </span>Time<span
                            style="mso-tab-count: 1;">&nbsp;&nbsp;
                        </span><span style="mso-spacerun: yes;">&nbsp;&nbsp;&nbsp; </span>Signature over Printed name
                        of Witness/Date &amp;<span style="letter-spacing: -.5pt;"> </span>Time</span></p>

                <p><br><br><strong>UMCHSEFORM-2021-12</strong></p>
            </div>
        </div>
    </div>
@endsection
