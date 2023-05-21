@extends('layouts.admin-layout')

@section('content')
<style>
.form-control {
    padding: 0.4rem;
}

.table th,
.table td {
    padding: 0.8rem;
}
</style>
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Psycho BPI</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_psychobpi" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required required required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required required required name="peme_date" type="text"
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required required required name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required required-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input required required required name="trans_date" type="text"
                                                id="trans_date" value="<?php echo date(
                                    'Y-m-d'
                                ); ?>" class="form-control" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input required required required name="patientname" id="patientname"
                                                type="text"
                                                value="{{$admission->lastname . ", " . $admission->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input required required required name="patientcode" id="patientcode"
                                                type="text" value="{{$admission->patientcode}}" class="form-control"
                                                readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="12%" align="center"><b>&nbsp;&nbsp;&nbsp;SCALE&nbsp;&nbsp;&nbsp;</b>
                                        </td>
                                        <td width="11%" align="center"><b>&nbsp;&nbsp;&nbsp;RS&nbsp;&nbsp;&nbsp;</b>
                                        </td>
                                        <td width="10%" align="center"><b>&nbsp;&nbsp;&nbsp;SS&nbsp;&nbsp;&nbsp;</b>
                                        </td>
                                        <td width="26%" align="center"><b>Low Scorer Description</b></td>
                                        <td width="5%" align="center"><b>VL</b></td>
                                        <td width="4%" align="center"><b>L</b></td>
                                        <td width="4%" align="center"><b>A</b></td>
                                        <td width="4%" align="center"><b>ME</b></td>
                                        <td width="4%" align="center"><b>HE</b></td>
                                        <td width="20%" align="center"><b>High Scorer Description</b></td>
                                    </tr>
                                    <tr>
                                        <td>Hypochondriasis</td>
                                        <td>
                                            <input name="hypochondriasis_rs" type="text" class="form-control"
                                                id="hypochondriasis_rs" value="" size="5">
                                        </td>
                                        <td>
                                            <input name="hypochondriasis_ss" type="text" id="hypochondriasis_ss"
                                                value="" class="form-control" size="5">
                                        </td>
                                        <td>Without any exccessive concerns <br> on his physical appearance.</td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick4" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick57" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick58" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick61" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick62" value="HE">
                                        </td>
                                        <td>Preoccupied in concerns with his <br> physical appearance and dysfunction.</td>
                                    </tr>
                                    <tr>
                                        <td>Depression</td>
                                        <td>
                                            <input name="depression_rs" type="text" id="depression_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="depression_ss" type="text" id="depression_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Optimistic attitudes on the future <br> even when experiencing disappointments.
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick5" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick56" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick59" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick60" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick63" value="HE">
                                        </td>
                                        <td>Looks at the future pessimistically; <br> inclined to be down hearted.</td>
                                    </tr>
                                    <tr>
                                        <td>Denial</td>
                                        <td>
                                            <input name="denial_rs" type="text" id="denial_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="denial_ss" type="text" id="denial_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Accepts feelings as part of self <br> and can show normal affect.</td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick6" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick55" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick54" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick53" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick52" value="HE">
                                        </td>
                                        <td>Lacks insight into feelings and the <br> causes of behavior avoids unpleasant
                                            topics.</td>
                                    </tr>
                                    <tr>
                                        <td>Interpersonal Problems</td>
                                        <td>
                                            <input name="problem_rs" type="text" id="problem_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="problem_ss" type="text" id="problem_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Cooperates fully with other people <br> and readily accepts criticism.</td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick7" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick48" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick49" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick50" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick51" value="HE">
                                        </td>
                                        <td>Reacts against discipline and criticism; <br> annoyed by life inconveniences.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Allenation</td>
                                        <td>
                                            <input name="allenation_rs" type="text" id="allenation_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="allenation_ss" type="text" id="allenation_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Normally displays ethical and social <br> responsible attitudes and behavior.
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick8" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick47" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick46" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick45" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick44" value="HE">
                                        </td>
                                        <td>Expresses attitudes differently <br> from common social codes.</td>
                                    </tr>
                                    <tr>
                                        <td>Persecutory Ideas</td>
                                        <td>
                                            <input name="ideas_rs" type="text" id="ideas_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="ideas_ss" type="text" id="ideas_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Trusts others and does not feel threatened.</td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick9" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick40" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick41" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick42" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick43" value="HE">
                                        </td>
                                        <td>Believes that certain people are <br> hostile and tries to make life difficult
                                            and unpleasant.</td>
                                    </tr>
                                    <tr>
                                        <td>Anxiety</td>
                                        <td>
                                            <input name="anxiety_rs" type="text" id="anxiety_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="anxiety_ss" type="text" id="anxiety_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Can remain calm in an unexpected situation; <br> maintains self-control.</td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick10" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick39" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick38" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick37" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick36" value="HE">
                                        </td>
                                        <td>Afraid of novelty and of the <br> possibility of physical or interpersonal
                                            danger.</td>
                                    </tr>
                                    <tr>
                                        <td>Thinking Disorder</td>
                                        <td>
                                            <input name="thinking_rs" type="text" id="thinking_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="thinking_ss" type="text" id="thinking_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Has no difficulty in concentrating <br> normally towards reality.</td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick11" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick32" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick33" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick34" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick35" value="HE">
                                        </td>
                                        <td>Confused, distractable and disorganized with thoughts</td>
                                    </tr>
                                    <tr>
                                        <td>Impulse Expression</td>
                                        <td>
                                            <input name="impulse_rs" type="text" id="impulse_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="impulse_ss" type="text" id="impulse_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <p>Has the patience to do lengthy and <br> tedious task; considers future before
                                                acting.</p>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick12" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick31" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick30" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick29" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick28" value="HE">
                                        </td>
                                        <td>Prone to undertake risky and reckless actions. <br> Behaves irresponsible,easily
                                            bored.</td>
                                    </tr>
                                    <tr>
                                        <td>Social Introversion</td>
                                        <td>
                                            <input name="social_rs" type="text" id="social_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="social_ss" type="text" id="social_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Enjoys the company of the people around him/her.</td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick13" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick24" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick25" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick26" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick27" value="HE">
                                        </td>
                                        <td>Avoids people generally; uncomfortable around others</td>
                                    </tr>
                                    <tr>
                                        <td>Self Depreciation</td>
                                        <td>
                                            <input name="self_rs" type="text" id="self_rs" value="" class="form-control"
                                                size="5">
                                        </td>
                                        <td>
                                            <input name="self_ss" type="text" id="self_ss" value="" class="form-control"
                                                size="5">
                                        </td>
                                        <td>Manifest a high degree of self-assurance <br> in dealing with otthers; speaks
                                            with confidence.</td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick14" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick23" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick22" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick21" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick20" value="HE">
                                        </td>
                                        <td>Degrades self of being worthless,and  <br> expresses low opinion of self</td>
                                    </tr>
                                    <tr>
                                        <td>Deviation</td>
                                        <td>
                                            <input name="deviation_rs" type="text" id="deviation_rs" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="deviation_ss" type="text" id="deviation_ss" value=""
                                                class="form-control" size="5">
                                        </td>
                                        <td>Displays behavior patterns similar <br> to those of a majority of people.</td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick15" value="VL">
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick16" value="L">
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick17" value="A">
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick18" value="ME">
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick19" value="HE">
                                        </td>
                                        <td>Displays behavior patterns very <br> different from most people.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <div class="form-group">
                                                <label for=""><b>Remarks</b></label>
                                                <input name="remarks_status" type="radio"  class="m-1"
                                                    id="remarks_status_0" value="normal">Normal
                                                <input name="remarks_status" type="radio"  class="m-1"
                                                    id="remarks_status_1" value="findings">With Findings
                                            </div>
                                            <div class="form-group">
                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                    id="" cols="30" rows="6"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td><b><span class="brdTop">Psychometrician</span>: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="9">Dahlia Donna B. Leyco, RPm
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="16%"><b>Psychologist: </b></td>
                                                        <td width="84%">
                                                            <div class="col-md-8">
                                                                <select name="technician2_id" id="technician2_id"
                                                                    class="form-control">
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="31">Darwin C. Macalanda,
                                                                        PhD,RPsy,CSAP</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="box-footer">
                                <button name="action" id="btnSave" value="save" type="submit" class="btn btn-primary"
                                    onclick="return chkAdmission();">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
