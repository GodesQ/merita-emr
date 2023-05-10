@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Edit Psychological</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_psycho_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_psycho" role="form" class="table-responsive">
                            @if(Session::get('status'))
                                @push('scripts')
                                    <script>
                                        toastr.success('{{ Session::get("status")}}', 'Success');
                                    </script>
                                @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table class="table table-bordered" id="tblExam" width="100%" cellpadding="2"
                                cellspacing="2">
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
                                                value="{{ $exam->trans_date }}" class="form-control"
                                                readonly="{{ $exam->patientcode }}"></td>
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
                            <table class="table table-bordered" width="100%" border="0" cellspacing="0" cellpadding="0"
                                class="table">
                                <tbody>
                                    <tr>
                                        <td width="19%"><b>Test Administered</b></td>
                                        <td width="25%">
                                            <input name="test_administered" type="checkbox" disabled="" id="checkbox"
                                                value="Intelligence Test (IQ)" checked="checked">Intelligence Test (IQ)
                                        </td>
                                        <td width="21%"><input name="test_administered" type="checkbox" disabled=""
                                                id="checkbox" value="Personality Test" checked="checked">Personality
                                            Test </td>
                                        <td width="13%"><input name="test_administered" type="radio"
                                                id="test_administered" value="Others">
                                            Others: </td>
                                        <td width="22%"><input name="others" id="others" type="text"
                                                value="{{ $exam->others }}" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Intellectual Level</b></td>
                                        <td colspan="4">
                                            <div class="col-md-8">
                                                <select type="menu" name="intellectual" id="intellectual"
                                                    class="form-control">
                                                    <option value="" @php echo $exam->intellectual == "" ? "selected=''"
                                                        : "" @endphp>--SELECT--</option>
                                                    <option value="Very Superior" @php echo $exam->intellectual == "Very
                                                        Superior" ? "selected=''" : "" @endphp>Very Superior</option>
                                                    <option value="Superior" @php echo $exam->intellectual == "Superior"
                                                        ? "selected=''" : "" @endphp>Superior</option>
                                                    <option value="Above Average" @php echo $exam->intellectual ==
                                                        "Above Average" ? "selected=''" : "" @endphp>Above Average
                                                    </option>
                                                    <option value="Average" @php echo $exam->intellectual == "Average" ?
                                                        "selected=''" : "" @endphp>Average</option>
                                                    <option value="Below Average" @php echo $exam->intellectual ==
                                                        "Below Average" ? "selected=''" : "" @endphp>Below Average
                                                    </option>
                                                    <option value="Borderline" @php echo $exam->intellectual ==
                                                        "Borderline" ? "selected=''" : "" @endphp>Borderline</option>
                                                    <option value="Mentally Deficient" @php echo $exam->intellectual ==
                                                        "Mentally Deficient" ? "selected=''" : "" @endphp>Mentally
                                                        Deficient</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="321" border="0" align="center" cellpadding="5" cellspacing="2"
                                style="border: 2px black solid;">
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="center"><b>LEGEND </b></td>
                                    </tr>
                                    <tr>
                                        <td width="37">&nbsp;</td>
                                        <td width="130" valign="top">1-Very Low<br>
                                            2-Low<br>
                                            3-Low Average<br>
                                            4-Average<br></td>
                                        <td width="112" valign="top">5-High Average<br>
                                            6-High<br>
                                            7-Very High</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Sense of Responsibility</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Perseverance</td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility1" {{$exam->responsibility1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Obedience</td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility2" {{$exam->responsibility2 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Self-discipline / Orderly</td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility3" {{$exam->responsibility3 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Enthusiasm</td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility4" {{$exam->responsibility4 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Initiative</td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="responsibility5" {{$exam->responsibility5 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Emotional Stability</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Can withstand boredom and work alone</td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability1" {{$exam->stability1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Tolerance to stress, <br> pressure and inconveniences</td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability2" {{$exam->stability2 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Faces reality</td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability3" {{$exam->stability3 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Confidence</td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability4" {{$exam->stability4 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relaxed</td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="stability5" {{$exam->stability5 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Objectivity</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Tough-mindedness	</td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity1" {{$exam->objectivity1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Adaptability</td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity2" {{$exam->objectivity2 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Practicality</td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="objectivity3" {{$exam->objectivity3 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Motivation</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Assertiveness</td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation1" {{$exam->motivation1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Independence</td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation2" {{$exam->motivation2 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Resourcefulness</td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="motivation3" {{$exam->motivation3 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Interpersonal and Personal Adjustment</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relationship with Peers <br> and Co-workers (Teamsmanship)</td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment1" {{$exam->adjustment1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Relationship with Superiors, <br> Employers and Authority Figures (Deference)</td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment2" {{$exam->adjustment2 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Self-esteem</td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment3" {{$exam->adjustment3 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Aggressive tendencies</td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="adjustment4" {{$exam->adjustment4 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="80%" border="0" align="center" cellpadding="0" cellspacing="1"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td align="center" bgcolor="#ececec"><b>Goal Orientation</b></td>
                                        <td align="middle"><b>Very Low</b></td>
                                        <td align="middle"><b>Low </b></td>
                                        <td align="middle"><b>Low Average </b></td>
                                        <td align="middle"><b>Average </b></td>
                                        <td align="middle"><b>High Average </b></td>
                                        <td align="middle"><b>High</b></td>`
                                        <td align="middle"><b>Very High</b></td>
                                    </tr>
                                    <tr>
                                        <td align="middle">Directs one's effort towards clear cut objective	</td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "1" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="1">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "2" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="2">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "3" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="3">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "4" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="4">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "5" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="5">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "6" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_1" value="6">
                                        </td>
                                        <td align="middle">
                                            <input name="goal1" {{$exam->goal1 == "7" ? "checked" : null}} type="radio" style="width: 20px; height: 20px;" class="m-1" id="remarks_status_0" value="7">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table bordered" width="100%" border="0" cellspacing="0" cellpadding="2"
                                class="table">
                                <tbody>
                                    <tr>
                                        <td width="13%"><b>Conclusion:</b></td>
                                        <td>
                                            <select type="menu" name="conclusion" id="conclusion" class="form-control">
                                                <option value="" @php echo $exam->conclusion == "" ? "selected=''" : ""
                                                    @endphp>--SELECT--</option>
                                                <option value="RECOMMENDED" @php echo $exam->conclusion == "RECOMMENDED"
                                                    ? "selected=''" : "" @endphp>RECOMMENDED</option>
                                                <option value="FOR FURTHER EVALUATION" @php echo $exam->conclusion ==
                                                    "FOR FURTHER EVALUATION" ? "selected=''" : "" @endphp>FOR FURTHER
                                                    EVALUATION</option>
                                            </select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                        <tr>
                                        <td colspan="4">
                                        <div class="form-group">
                                                <label for=""><b>Remarks</b></label>
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With Findings
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Findings</label>
                                            <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Recommendation</label>
                                            <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                id="" cols="30" rows="6">{{$exam->recommendation}}</textarea>
                                        </div>
                                        </td>
                                        </tr>
                                </tbody>
                            </table>
                            <table class="table table bordered" width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table class="table table bordered" width="100%" border="0" cellspacing="2"
                                                cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td><b><span class="brdTop">Psychometrician</span>: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($psychometricians as $psychometrician)
                                                                        <option value={{$psychometrician->id}} {{$psychometrician->id == $exam->technician_id ? "selected" : null}}>{{$psychometrician->firstname}} {{$psychometrician->lastname}}</option>
                                                                    @endforeach
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
                                                                    @foreach($psychologists as $psychologist)
                                                                        <option value={{$psychologist->id}} {{$psychologist->id == $exam->technician_id ? "selected" : null}}> {{$psychologist->firstname}} {{$psychologist->lastname}}</option>
                                                                    @endforeach
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
