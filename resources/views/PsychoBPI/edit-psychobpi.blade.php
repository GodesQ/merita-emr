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
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Psycho BPI</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_psychobpi_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_psychobpi" role="form">
                            @if(Session::get('status'))
                            @push('scripts')
                            <script>
                            toastr.success('{{ Session::get("status")}}', 'Success');
                            </script>
                            @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="peme_date" type="text" id="peme_date"
                                                value="{{ $admission->trans_date }}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control input-sm pull-left" placeholder="Admission No."
                                                    readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="1"
                                class="table table-bordered table-responsive table-condensed">
                                <tbody>
                                    <tr>
                                        <td align="center"><b>SCALE</b></td>
                                        <td align="center">
                                            <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RS&nbsp;&nbsp;&nbsp;</b>
                                        </td>
                                        <td align="center">
                                            <b>&nbsp;&nbsp;&nbsp;SS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                        </td>
                                        <td align="center"><b>Low Scorer Description</b></td>
                                        <td align="center"><b>VL</b></td>
                                        <td align="center"><b>L</b></td>
                                        <td align="center"><b>A</b></td>
                                        <td align="center"><b>ME</b></td>
                                        <td align="center"><b>HE</b></td>
                                        <td align="center"><b>High Scorer Description</b></td>
                                    </tr>
                                    <tr>
                                        <td>Hypochondriasis</td>
                                        <td>
                                            <input name="hypochondriasis_rs" type="text" class="form-control"
                                                id="hypochondriasis_rs" colspan="3"
                                                value="{{ $exam->hypochondriasis_rs }}" size="10">
                                        </td>
                                        <td>
                                            <input name="hypochondriasis_ss" type="text" id="hypochondriasis_ss"
                                                value="{{ $exam->hypochondriasis_ss }}" class="form-control"
                                                width="200px" size="10">
                                        </td>
                                        <td>Without any exccessive concerns on his physical appearance.</td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick4" value="VL" @php
                                                echo $exam->hypochondriasis_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick57" value="L" @php
                                                echo $exam->hypochondriasis_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick58" value="A" @php
                                                echo $exam->hypochondriasis_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick61" value="ME"
                                                @php echo $exam->hypochondriasis_scores == "ME" ? "checked" : ""
                                            @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="hypochondriasis_scores" type="radio" style="width: 20px; height: 20px;" id="sick62" value="HE"
                                                @php echo $exam->hypochondriasis_scores == "HE" ? "checked" : ""
                                            @endphp>
                                        </td>
                                        <td>Preoccupied in concerns with his physical appearance and dysfunction.</td>
                                    </tr>
                                    <tr>
                                        <td>Depression</td>
                                        <td>
                                            <input name="depression_rs" type="text" id="depression_rs"
                                                value="{{ $exam->depression_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="depression_ss" type="text" id="depression_ss"
                                                value="{{ $exam->depression_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Optimistic attitudes on the future even when experiencing disappointments.
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick5" value="VL" @php echo
                                                $exam->depression_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick56" value="L" @php echo
                                                $exam->depression_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick59" value="A" @php echo
                                                $exam->depression_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick60" value="ME" @php
                                                echo $exam->depression_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="depression_scores" type="radio" style="width: 20px; height: 20px;" id="sick63" value="HE" @php
                                                echo $exam->depression_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Looks at the future pessimistically; inclined to be down hearted.</td>
                                    </tr>
                                    <tr>
                                        <td>Denial</td>
                                        <td>
                                            <input name="denial_rs" type="text" id="denial_rs"
                                                value="{{ $exam->denial_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="denial_ss" type="text" id="denial_ss"
                                                value="{{ $exam->denial_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Accepts feelings as part of self and can show normal affect.</td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick6" value="VL" @php echo
                                                $exam->denial_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick55" value="L" @php echo
                                                $exam->denial_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick54" value="A" @php echo
                                                $exam->denial_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick53" value="ME" @php echo
                                                $exam->denial_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="denial_scores" type="radio" style="width: 20px; height: 20px;" id="sick52" value="HE" @php echo
                                                $exam->denial_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Lacks insight into feelings and the causes of behavior avoids unpleasant
                                            topics.</td>
                                    </tr>
                                    <tr>
                                        <td>Interpersonal Problems</td>
                                        <td>
                                            <input name="problem_rs" type="text" id="problem_rs"
                                                value="{{ $exam->problem_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="problem_ss" type="text" id="problem_ss"
                                                value="{{ $exam->problem_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Cooperates fully with other people and readily accepts criticism.</td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick7" value="VL" @php echo
                                                $exam->problem_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick48" value="L" @php echo
                                                $exam->problem_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick49" value="A" @php echo
                                                $exam->problem_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick50" value="ME" @php echo
                                                $exam->problem_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="problem_scores" type="radio" style="width: 20px; height: 20px;" id="sick51" value="HE" @php echo
                                                $exam->problem_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Reacts against discipline and criticism; annoyed by life inconveniences.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Allenation</td>
                                        <td>
                                            <input name="allenation_rs" type="text" id="allenation_rs"
                                                value="{{ $exam->allenation_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="allenation_ss" type="text" id="allenation_ss"
                                                value="{{ $exam->allenation_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Normally displays ethical and social responsible attitudes and behavior.
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick8" value="VL" @php echo
                                                $exam->allenation_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick47" value="L" @php echo
                                                $exam->allenation_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick46" value="A" @php echo
                                                $exam->allenation_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick45" value="ME" @php
                                                echo $exam->allenation_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="allenation_scores" type="radio" style="width: 20px; height: 20px;" id="sick44" value="HE" @php
                                                echo $exam->allenation_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Expresses attitudes differently from common social codes.</td>
                                    </tr>
                                    <tr>
                                        <td>Persecutory Ideas</td>
                                        <td>
                                            <input name="ideas_rs" type="text" id="ideas_rs"
                                                value="{{ $exam->ideas_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="ideas_ss" type="text" id="ideas_ss"
                                                value="{{ $exam->ideas_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Trusts others and does not feel threatened.</td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick9" value="VL" @php echo
                                                $exam->ideas_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick40" value="L" @php echo
                                                $exam->ideas_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick41" value="A" @php echo
                                                $exam->ideas_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick42" value="ME" @php echo
                                                $exam->ideas_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="ideas_scores" type="radio" style="width: 20px; height: 20px;" id="sick43" value="HE" @php echo
                                                $exam->ideas_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Believes that certain people are hostile and tries to make life difficult
                                            and unpleasant.</td>
                                    </tr>
                                    <tr>
                                        <td>Anxiety</td>
                                        <td>
                                            <input name="anxiety_rs" type="text" id="anxiety_rs"
                                                value="{{ $exam->anxiety_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="anxiety_ss" type="text" id="anxiety_ss"
                                                value="{{ $exam->anxiety_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Can remain calm in an unexpected situation; maintains self-control.</td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick10" value="VL" @php echo
                                                $exam->anxiety_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick39" value="L" @php echo
                                                $exam->anxiety_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick38" value="A" @php echo
                                                $exam->anxiety_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick37" value="ME" @php echo
                                                $exam->anxiety_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="anxiety_scores" type="radio" style="width: 20px; height: 20px;" id="sick36" value="HE" @php echo
                                                $exam->anxiety_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Afraid of novelty and of the possibility of physical or interpersonal
                                            danger.</td>
                                    </tr>
                                    <tr>
                                        <td>Thinking Disorder</td>
                                        <td>
                                            <input name="thinking_rs" type="text" id="thinking_rs"
                                                value="{{ $exam->thinking_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="thinking_ss" type="text" id="thinking_ss"
                                                value="{{ $exam->thinking_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Has no difficulty in concentrating normally towards reality.</td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick11" value="VL" @php echo
                                                $exam->thinking_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick32" value="L" @php echo
                                                $exam->thinking_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick33" value="A" @php echo
                                                $exam->thinking_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick34" value="ME" @php echo
                                                $exam->thinking_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="thinking_scores" type="radio" style="width: 20px; height: 20px;" id="sick34" value="HE" @php echo
                                                $exam->thinking_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Confused, distractable and disorganized with thoughts</td>
                                    </tr>
                                    <tr>
                                        <td>Impulse Expression</td>
                                        <td>
                                            <input name="impulse_rs" type="text" id="impulse_rs"
                                                value="{{ $exam->impulse_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="impulse_ss" type="text" id="impulse_ss"
                                                value="{{ $exam->impulse_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <p>Has the patience to do lengthy and tedious task; considers future before
                                                acting.</p>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick12" value="VL" @php echo
                                                $exam->impulse_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick31" value="L" @php echo
                                                $exam->impulse_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick30" value="A" @php echo
                                                $exam->impulse_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick29" value="ME" @php echo
                                                $exam->impulse_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="impulse_scores" type="radio" style="width: 20px; height: 20px;" id="sick28" value="HE" @php echo
                                                $exam->impulse_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Prone to undertake risky and reckless actions. Behaves irresponsible,easily
                                            bored.</td>
                                    </tr>
                                    <tr>
                                        <td>Social Introversion</td>
                                        <td>
                                            <input name="social_rs" type="text" id="social_rs"
                                                value="{{ $exam->social_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="social_ss" type="text" id="social_ss"
                                                value="{{ $exam->social_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Enjoys the company of the people around him/her.</td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick13" value="VL" @php echo
                                                $exam->social_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick24" value="L" @php echo
                                                $exam->social_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick25" value="A" @php echo
                                                $exam->social_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick26" value="ME" @php echo
                                                $exam->social_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="social_scores" type="radio" style="width: 20px; height: 20px;" id="sick27" value="HE" @php echo
                                                $exam->social_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Avoids people generally; uncomfortable around others</td>
                                    </tr>
                                    <tr>
                                        <td>Self Depreciation</td>
                                        <td>
                                            <input name="self_rs" type="text" id="self_rs" value="{{ $exam->self_rs }}"
                                                class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="self_ss" type="text" id="self_ss" value="{{ $exam->self_ss }}"
                                                class="form-control" size="5">
                                        </td>
                                        <td>Manifest a high degree of self-assurance in dealing with otthers; speaks
                                            with confidence.</td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick14" value="VL" @php echo
                                                $exam->self_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick23" value="L" @php echo
                                                $exam->self_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick22" value="A" @php echo
                                                $exam->self_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick21" value="ME" @php echo
                                                $exam->self_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="self_scores" type="radio" style="width: 20px; height: 20px;" id="sick20" value="HE" @php echo
                                                $exam->self_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Degrades self of being worthless,and expresses low opinion of self</td>
                                    </tr>
                                    <tr>
                                        <td>Deviation</td>
                                        <td>
                                            <input name="deviation_rs" type="text" id="deviation_rs"
                                                value="{{ $exam->deviation_rs }}" class="form-control" size="5">
                                        </td>
                                        <td>
                                            <input name="deviation_ss" type="text" id="deviation_ss"
                                                value="{{ $exam->deviation_ss }}" class="form-control" size="5">
                                        </td>
                                        <td>Displays behavior patterns similar to those of a majority of people.</td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick15" value="VL" @php echo
                                                $exam->deviation_scores == "VL" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick16" value="L" @php echo
                                                $exam->deviation_scores == "L" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick17" value="A" @php echo
                                                $exam->deviation_scores == "A" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick18" value="ME" @php echo
                                                $exam->deviation_scores == "ME" ? "checked" : "" @endphp>
                                        </td>
                                        <td align="center">
                                            <input name="deviation_scores" type="radio" style="width: 20px; height: 20px;" id="sick19" value="HE" @php echo
                                                $exam->deviation_scores == "HE" ? "checked" : "" @endphp>
                                        </td>
                                        <td>Displays behavior patterns very different from most people.</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <div class="form-group">
                                                <label for=""><b>Remarks</b></label>
                                                <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_0" value="normal" @php echo $exam->remarks_status
                                                == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_1" value="findings" @php echo
                                                    $exam->remarks_status == "findings" ? "checked" : null @endphp>With
                                                Findings
                                            </div>
                                            <div class="form-group">
                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                    id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
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
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    <option
                                                                        {{ $exam->technician_id == "" || $exam->technician_id == null ? 'selected' : null }}
                                                                        value="">--SELECT--</option>
                                                                    <option
                                                                        {{ $exam->technician_id == "9" ? 'selected' : null }}
                                                                        value="9">Dahlia Donna B. Leyco, RPm
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="16%"><b>Psychologist: </b></td>
                                                        <td width="84%">
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    <option
                                                                        {{ $exam->technician2_id == "" || $exam->technician2_id == null ? 'selected' : null }}
                                                                        value="">--SELECT--</option>
                                                                    <option
                                                                        {{ $exam->technician2_id == "31" ? 'selected' : null }}
                                                                        value="31">Darwin C. Macalanda,
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
    @endsection
