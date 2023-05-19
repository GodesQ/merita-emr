@php

// custom php code

function getConn($host,$dbid,$dbpwd,$db){
return mysqli_connect($host,$dbid,$dbpwd,$db);
}

function getResult($sql,$dbtype=0){
if ($dbtype==0) {
$host = env('DB_HOST');;
$db = env('DB_DATABASE');
$dbid = env('DB_USERNAME');
$dbpwd = env('DB_PASSWORD');
$conn = mysqli_connect($host,$dbid,$dbpwd,$db);
return mysqli_query($conn,$sql);
}
}

function initOptionTbl($table,$optval,$optlabel,$val,$withselect=1) {
if ($withselect==1) echo "<option value=''>--SELECT--</option>";
$result0 = getResult("select * from $table");
while ($row0 = getArray($result0)) {
$selected = ($row0[$optval]==$val) ? "selected" : "";
echo "<option value='".$row0[$optval]."' $selected>".$row0[$optlabel]."</option>";
}
}

function getArray($result){
global $conn;
return mysqli_fetch_array($result);
}

@endphp

@extends('layouts.admin-layout')

@section('content')
<style>
    .form-control {
        padding: 0.4rem;
    }

    .table th,
    .table td {
        padding: 1rem;
    }
    </style>
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Physical Exam</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_physical" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient->id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required name="peme_date" type="text" id="peme_date"
                                                value="{{$admission->trans_date}}" class="form-control" readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required name="admission_id" type="text" id="admission_id"
                                                    value="{{$admission->id}}"
                                                    class="form-control input required-sm pull-left"
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
                                                value="{{$admission->patient->lastname . ", " . $admission->patient->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input required required required name="patientcode" id="patientcode"
                                                type="text" value="{{$admission->patient->patientcode}}" class="form-control"
                                                readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab10" data-toggle="tab" aria-controls="tab10"
                                        href="#tab10" role="tab" aria-selected="true">Medical
                                        History 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab11" data-toggle="tab" aria-controls="tab11"
                                        href="#tab11" role="tab" aria-selected="false">Medical History 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab12" data-toggle="tab" aria-controls="tab12"
                                        href="#tab12" role="tab" aria-selected="false">Medical History 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab13" data-toggle="tab" aria-controls="tab13"
                                        href="#tab13" role="tab" aria-selected="false">Physical Examination 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab14" data-toggle="tab" aria-controls="tab14"
                                        href="#tab14" role="tab" aria-selected="false">Physical Examination 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab15" data-toggle="tab" aria-controls="tab15"
                                        href="#tab15" role="tab" aria-selected="false">Physical Examination 3</a>
                                </li>
                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <div class="tab-pane active" id="tab10" role="tabpanel" aria-labelledby="base-tab10">
                                    <table class="table table-bordered table-responsive" width="100%">
                                        @if($medical_history)
                                        <tbody>
                                            <tr>
                                                <td colspan="6" align="center"><b>PAST MEDICAL HISTORY</b>: has
                                                    applicant suffered from been told he has any of the following
                                                    (<b>Answer YES</b> or <b>NO</b>).(to be answered by patient.)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Head or Neck Injury</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick1" type="radio" style="width: 20px; height: 20px;" id="sick1" value="1" @php echo
                                                        $medical_history->head_and_neck_injury == "1" ? "checked" :
                                                    ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick1" type="radio" style="width: 20px; height: 20px;" id="sick1" value="0" @php echo
                                                        $medical_history->head_and_neck_injury == "0" ? "checked" :
                                                    ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Other Lung Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick11" type="radio" style="width: 20px; height: 20px;" id="sick11" value="1" @php echo
                                                        $medical_history->other_lung_disorder == "1" ?
                                                    "checked" : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick11" type="radio" style="width: 20px; height: 20px;" id="sick11" value="0" @php echo
                                                        $medical_history->other_lung_disorder == "0" ?
                                                    "checked" : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Kidney or Bladder Disorder</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick22" type="radio" style="width: 20px; height: 20px;" id="sick22" value="1" @php echo
                                                        $medical_history->kidney_or_bladder_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick22" type="radio" style="width: 20px; height: 20px;" id="sick22" value="0" @php echo
                                                        $medical_history->kidney_or_bladder_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" height="33" align="center">Frequency Headaches</td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick2" type="radio" style="width: 20px; height: 20px;" id="sick2" value="1" @php echo
                                                        $medical_history->frequent_headache == "1" ? "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick2" type="radio" style="width: 20px; height: 20px;" id="sick2" value="0" @php echo
                                                        $medical_history->frequent_headache == "0" ? "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">High Blood Pressure
                                                    <br><input name="high_blood" type="input" id="high_blood" value="">
                                                </td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick12" type="radio" style="width: 20px; height: 20px;" id="sick12" value="1" @php echo
                                                        $medical_history->high_blood_pressure == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick12" type="radio" style="width: 20px; height: 20px;" id="sick12" value="0" @php echo
                                                        $medical_history->high_blood_pressure == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center"> Back Injury, Joint
                                                    Pain/Arthritis/Rheumatic</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick23" type="radio" style="width: 20px; height: 20px;" id="sick23" value="1" @php echo
                                                        $medical_history->back_injury_or_joint_pain == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick23" type="radio" style="width: 20px; height: 20px;" id="sick23" value="0" @php echo
                                                        $medical_history->back_injury_or_joint_pain == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Frequency Dizziness</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick3" type="radio" style="width: 20px; height: 20px;" id="sick3" value="1" @php echo
                                                        $medical_history->frequent_dizziness == "1" ? "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick3" type="radio" style="width: 20px; height: 20px;" id="sick3" value="0" @php echo
                                                        $medical_history->frequent_dizziness == "0" ? "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Heart Disease/Chest Pain</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick13" type="radio" style="width: 20px; height: 20px;" id="sick13" value="1" @php echo
                                                        $medical_history->heart_disease_or_vascular == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick13" type="radio" style="width: 20px; height: 20px;" id="sick13" value="0" @php echo
                                                        $medical_history->heart_disease_or_vascular == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Genetic, Hereditary or Familial
                                                    Disorders
                                                </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick24" type="radio" style="width: 20px; height: 20px;" id="sick24" value="1" @php echo
                                                        $medical_history->genetic_heredity_or_familial_dis ==
                                                    "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick24" type="radio" style="width: 20px; height: 20px;" id="sick24" value="0" @php echo
                                                        $medical_history->genetic_heredity_or_familial_dis ==
                                                    "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Fainting Spells,Fits, Seizures <br> or Other Neurological Disorders </td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick4" type="radio" style="width: 20px; height: 20px;" id="sick4" value="1" @php echo
                                                        $medical_history->fainting_spells_fits == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick4" type="radio" style="width: 20px; height: 20px;" id="sick4" value="0" @php echo
                                                        $medical_history->fainting_spells_fits == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Rheumatic Fever</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick14" type="radio" style="width: 20px; height: 20px;" id="sick14" value="1" @php echo
                                                        $medical_history->rheumatic_fever == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick14" type="radio" style="width: 20px; height: 20px;" id="sick14" value="0" @php echo
                                                        $medical_history->rheumatic_fever == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Sexually Transmitted Diseases</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick25" type="radio" style="width: 20px; height: 20px;" id="sick25" value="1" @php echo
                                                        $medical_history->sexually_transmitted_disease == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick25" type="radio" style="width: 20px; height: 20px;" id="sick25" value="0" @php echo
                                                        $medical_history->sexually_transmitted_disease == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Insomia Or Sleep Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick5" type="radio" style="width: 20px; height: 20px;" id="sick5" value="1" @php echo
                                                        $medical_history->insomia_or_sleep_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick5" type="radio" style="width: 20px; height: 20px;" id="sick5" value="0" @php echo
                                                        $medical_history->insomia_or_sleep_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Diabetes Mellitus</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick15" type="radio" style="width: 20px; height: 20px;" id="sick15" value="1" @php echo
                                                        $medical_history->diabetes_mellitus == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick15" type="radio" style="width: 20px; height: 20px;" id="sick15" value="0" @php echo
                                                        $medical_history->diabetes_mellitus == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Tropical Diseases <br>
                                                    (e.g.Malaria,Filariaris <br>
                                                    Schistosomiasis - Specific Date)
                                                    <br><input name="tropical_disease" type="input" id="tropical_disease" value=""></td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick26" type="radio" style="width: 20px; height: 20px;" id="sick26" value="1" @php echo
                                                        $medical_history->tropical_disease_or_malaria == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick26" type="radio" style="width: 20px; height: 20px;" id="sick26" value="0" @php echo
                                                        $medical_history->tropical_disease_or_malaria == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Depression,Other Mental Disorders
                                                </td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick6" type="radio" style="width: 20px; height: 20px;" id="sick6" value="1" @php echo
                                                        $medical_history->depression_other_mental_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick6" type="radio" style="width: 20px; height: 20px;" id="sick6" value="0" @php echo
                                                        $medical_history->depression_other_mental_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Other Endocrine Disorders(e.g.Goiter)
                                                </td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick16" type="radio" style="width: 20px; height: 20px;" id="sick16" value="1" @php echo
                                                        $medical_history->endocrine_disorders == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick16" type="radio" style="width: 20px; height: 20px;" id="sick16" value="0" @php echo
                                                        $medical_history->endocrine_disorders == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Asthma(Specify)<br><input
                                                        name="asthma" type="input" id="asthma"
                                                        value="">
                                                </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick27" type="radio" style="width: 20px; height: 20px;" id="sick27" value="1" @php echo
                                                        $medical_history->asthma == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick27" type="radio" style="width: 20px; height: 20px;" id="sick27" value="0" @php echo
                                                        $medical_history->asthma == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Trachoma,Other Eye Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick7" type="radio" style="width: 20px; height: 20px;" id="sick7" value="1" @php echo
                                                        $medical_history->eye_problems_or_error_refraction == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick7" type="radio" style="width: 20px; height: 20px;" id="sick7" value="0" @php echo
                                                        $medical_history->eye_problems_or_error_refraction == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Cancer or Tumor</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick17" type="radio" style="width: 20px; height: 20px;" id="sick17" value="1" @php echo
                                                        $medical_history->cancer_or_tumor == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick17" type="radio" style="width: 20px; height: 20px;" id="sick17" value="0" @php echo
                                                        $medical_history->cancer_or_tumor == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Allergies(Specify)<br><input
                                                        name="allergies" type="input" id="allergies"
                                                        value="{{$medical_history->allergies_other}}"></td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick30" type="radio" style="width: 20px; height: 20px;" id="sick30" value="1" @php echo
                                                        $medical_history->allergies == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick30" type="radio" style="width: 20px; height: 20px;" id="sick30" value="0" @php echo
                                                        $medical_history->allergies == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>

                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Deafness, Other Ear Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick8" type="radio" style="width: 20px; height: 20px;" id="sick8" value="1" @php echo
                                                        $medical_history->deafness_or_ear_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick8" type="radio" style="width: 20px; height: 20px;" id="sick8" value="0" @php echo
                                                        $medical_history->deafness_or_ear_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Blood Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick18" type="radio" style="width: 20px; height: 20px;" id="sick18" value="1" @php echo
                                                        $medical_history->blood_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick18" type="radio" style="width: 20px; height: 20px;" id="sick18" value="0" @php echo
                                                        $medical_history->blood_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td align="center">Operations (Specify)
                                                    <br><input name="operations" type="input" id="operations"
                                                        value="{{$medical_history->operation_other}}">
                                                </td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick31" type="radio" style="width: 20px; height: 20px;" id="sick31" value="1" @php echo
                                                        $medical_history->operations == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick31" type="radio" style="width: 20px; height: 20px;" id="sick31" value="0" @php echo
                                                        $medical_history->operations == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Nose or Throat Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick9" type="radio" style="width: 20px; height: 20px;" id="sick9" value="1" @php echo
                                                        $medical_history->nose_or_throat_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick9" type="radio" style="width: 20px; height: 20px;" id="sick9" value="0" @php echo
                                                        $medical_history->nose_or_throat_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Stomach Pain, Gastritis or Ulcer</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick19" type="radio" style="width: 20px; height: 20px;" id="sick19" value="1" @php echo
                                                        $medical_history->stomach_pain_or_gastritis == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick19" type="radio" style="width: 20px; height: 20px;" id="sick19" value="0" @php echo
                                                        $medical_history->stomach_pain_or_gastritis == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Vaccination
                                                    <br><input name="vaccination" type="input" id="vaccination" value="">
                                                </td>
                                                <td width="146" align="center">
                                                    <input name="sick32" type="radio" style="width: 20px; height: 20px;" id="sick19" value="1" @php echo
                                                        $medical_history->vaccination == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">Yes</label>
                                                    <input name="sick32" type="radio" style="width: 20px; height: 20px;" id="sick19" value="0" @php echo
                                                        $medical_history->vaccination == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Tuberculosis</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick10" type="radio" style="width: 20px; height: 20px;" id="sick10" value="1" @php echo
                                                        $medical_history->tuberculosis == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick10" type="radio" style="width: 20px; height: 20px;" id="sick10" value="0" @php echo
                                                        $medical_history->tuberculosis == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Other Abdominal Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick20" type="radio" style="width: 20px; height: 20px;" id="sick20" value="1" @php echo
                                                        $medical_history->other_abdominal_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick20" type="radio" style="width: 20px; height: 20px;" id="sick20" value="0" @php echo
                                                        $medical_history->other_abdominal_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Hepatitis A,B,C</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick28" type="radio" style="width: 20px; height: 20px;" id="sick28" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick28" type="radio" style="width: 20px; height: 20px;" id="sick28" value="0" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Smoking
                                                    <br><input name="smoking" type="input" id="smoking" value="{{ $medical_history->smoking_other }}">
                                                </td>
                                                <td width="90" align="right">
                                                    <input name="sick33" type="radio" style="width: 20px; height: 20px;" id="sick33" value="1" @php echo
                                                        $medical_history->smoking == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick33" type="radio" style="width: 20px; height: 20px;" id="sick33" value="0" @php echo
                                                        $medical_history->smoking == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="154" align="center">Gynaecological Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick21" type="radio" style="width: 20px; height: 20px;" id="sick21" value="1" @php echo
                                                        $medical_history->gynecological_disorder == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick21" type="radio" style="width: 20px; height: 20px;" id="sick21" value="0" @php echo
                                                        $medical_history->gynecological_disorder == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                                <td width="132" align="center">Last Menstrual Period
                                                    <br><input name="last_menstrual" type="input" id="last_menstrual" value="">
                                                </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick29" type="radio" style="width: 20px; height: 20px;" id="sick29" value="1" @php echo
                                                        $medical_history->last_menstrual_period == "1" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick29" type="radio" style="width: 20px; height: 20px;" id="sick29" value="0" @php echo
                                                        $medical_history->last_menstrual_period == "0" ?
                                                    "checked"
                                                    : ""
                                                    @endphp>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Back Problems</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick34" type="radio" style="width: 20px; height: 20px;" id="sick34" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick34" type="radio" style="width: 20px; height: 20px;" id="sick34" value="0" checked>
                                                </td>
                                                <td width="154" align="center">Thyroid Problems</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick35" type="radio" style="width: 20px; height: 20px;" id="sick35" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick35" type="radio" style="width: 20px; height: 20px;" id="sick35" value="0" checked>
                                                </td>
                                                <td width="154" align="center">Amputation</td>
                                                <td align="center">
                                                    <label for="checkbox">YES</label>
                                                    <input name="sick36" type="radio" style="width: 20px; height: 20px;" id="sick36" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick36" type="radio" style="width: 20px; height: 20px;" id="sick36" value="0" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">Others</td>
                                                <td colspan="5"><textarea name="others" cols="20" rows="2" id="others"
                                                        class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    If any of the above questions were answered “yes,” please give details.
                                                    <textarea name="specify" cols="20" rows="2" id="specify"
                                                        class="form-control"></textarea></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                    <h6>PE1 Recommendation</h6>
                                                    <textarea name="pe1_recommendation" cols="20" rows="2" id="pe1_recommendation"
                                                        class="form-control"></textarea></td>
                                            </tr>
                                        </tbody>
                                        @else
                                        <tbody>
                                            <tr>
                                                <td colspan="6" align="center"><b>PAST MEDICAL HISTORY</b>: has
                                                    applicant suffered from been told he has any of the following
                                                    (<b>Answer YES</b> or <b>NO</b>).(to be answered by patient.)
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Head or Neck Injury</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick1" type="radio" style="width: 20px; height: 20px;" id="sick1" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick1" type="radio" style="width: 20px; height: 20px;" id="sick1" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Other Lung Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick11" type="radio" style="width: 20px; height: 20px;" id="sick11" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick11" type="radio" style="width: 20px; height: 20px;" id="sick11" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Kidney or Bladder Disorder</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick22" type="radio" style="width: 20px; height: 20px;" id="sick22" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick22" type="radio" style="width: 20px; height: 20px;" id="sick22" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" height="33" align="center">Frequency Headaches</td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick2" type="radio" style="width: 20px; height: 20px;" id="sick2" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick2" type="radio" style="width: 20px; height: 20px;" id="sick2" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">High Blood Pressure
                                                    <br><input name="high_blood" type="input" id="high_blood" value="">
                                                </td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick12" type="radio" style="width: 20px; height: 20px;" id="sick12" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick12" type="radio" style="width: 20px; height: 20px;" id="sick12" value="No" checked="">
                                                </td>
                                                <td width="132" align="center"> Back Injury, Joint
                                                    Pain/Arthritis/Rheumatic</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick23" type="radio" style="width: 20px; height: 20px;" id="sick23" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick23" type="radio" style="width: 20px; height: 20px;" id="sick23" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Frequency Dizziness</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick3" type="radio" style="width: 20px; height: 20px;" id="sick3" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick3" type="radio" style="width: 20px; height: 20px;" id="sick3" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Heart Disease/Chest Pain</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick13" type="radio" style="width: 20px; height: 20px;" id="sick13" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick13" type="radio" style="width: 20px; height: 20px;" id="sick13" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Genetic, Hereditary or Familial
                                                    Disorders
                                                </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick24" type="radio" style="width: 20px; height: 20px;" id="sick24" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick24" type="radio" style="width: 20px; height: 20px;" id="sick24" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Fainting Spells,Fits, Seizures or <br>
                                                    Other
                                                    Neurological Disorders </td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick4" type="radio" style="width: 20px; height: 20px;" id="sick4" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick4" type="radio" style="width: 20px; height: 20px;" id="sick4" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Rheumatic Fever</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick14" type="radio" style="width: 20px; height: 20px;" id="sick14" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick14" type="radio" style="width: 20px; height: 20px;" id="sick14" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Sexually Transmitted Diseases</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick25" type="radio" style="width: 20px; height: 20px;" id="sick25" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick25" type="radio" style="width: 20px; height: 20px;" id="sick25" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Insomia Or Sleep Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick5" type="radio" style="width: 20px; height: 20px;" id="sick5" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick5" type="radio" style="width: 20px; height: 20px;" id="sick5" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Diabetes Mellitus</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick15" type="radio" style="width: 20px; height: 20px;" id="sick15" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick15" type="radio" style="width: 20px; height: 20px;" id="sick15" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Tropical Diseases <br>
                                                    (e.g.Malaria,Filariaris <br>
                                                    Schistosomiasis - Specific Date)
                                                    </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick26" type="radio" style="width: 20px; height: 20px;" id="sick26" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick26" type="radio" style="width: 20px; height: 20px;" id="sick26" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Depression,Other Mental Disorders
                                                </td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick6" type="radio" style="width: 20px; height: 20px;" id="sick6" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick6" type="radio" style="width: 20px; height: 20px;" id="sick6" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Other Endocrine Disorders(e.g.Goiter)
                                                </td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick16" type="radio" style="width: 20px; height: 20px;" id="sick16" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick16" type="radio" style="width: 20px; height: 20px;" id="sick16" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Asthma(Specify)<br><input
                                                        name="asthma" type="input" id="asthma"
                                                        value="">
                                                </td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick27" type="radio" style="width: 20px; height: 20px;" id="sick27" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick27" type="radio" style="width: 20px; height: 20px;" id="sick27" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Trachoma,Other Eye Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick7" type="radio" style="width: 20px; height: 20px;" id="sick7" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick7" type="radio" style="width: 20px; height: 20px;" id="sick7" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Cancer or Tumor</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick17" type="radio" style="width: 20px; height: 20px;" id="sick17" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick17" type="radio" style="width: 20px; height: 20px;" id="sick17" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Allergies(Specify)<br><input
                                                        name="allergies" type="input" id="allergies" value=""></td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick30" type="radio" style="width: 20px; height: 20px;" id="sick30" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick30" type="radio" style="width: 20px; height: 20px;" id="sick30" value="No" checked="">
                                                </td>

                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Deafness, Other Ear Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick8" type="radio" style="width: 20px; height: 20px;" id="sick8" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick8" type="radio" style="width: 20px; height: 20px;" id="sick8" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Blood Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick18" type="radio" style="width: 20px; height: 20px;" id="sick18" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick18" type="radio" style="width: 20px; height: 20px;" id="sick18" value="No" checked="">
                                                </td>
                                                <td align="center">Operations (Specify)
                                                    <br><input name="operations" type="input" id="operations" value="">
                                                </td>
                                                <td align="center"><label for="checkbox">YES</label>
                                                    <input name="sick31" type="radio" style="width: 20px; height: 20px;" id="sick31" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick31" type="radio" style="width: 20px; height: 20px;" id="sick31" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Nose or Throat Disorders</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick9" type="radio" style="width: 20px; height: 20px;" id="sick9" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick9" type="radio" style="width: 20px; height: 20px;" id="sick9" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Stomach Pain, Gastritis or Ulcer</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick19" type="radio" style="width: 20px; height: 20px;" id="sick19" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick19" type="radio" style="width: 20px; height: 20px;" id="sick19" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Vaccination</td>
                                                <td width="146" align="center">
                                                    <input name="sick32" type="radio" style="width: 20px; height: 20px;" id="sick19" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick32" type="radio" style="width: 20px; height: 20px;" id="sick19" value="No">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Tuberculosis</td>
                                                <td width="90" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick10" type="radio" style="width: 20px; height: 20px;" id="sick10" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick10" type="radio" style="width: 20px; height: 20px;" id="sick10" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Other Abdominal Disorders</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick20" type="radio" style="width: 20px; height: 20px;" id="sick20" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick20" type="radio" style="width: 20px; height: 20px;" id="sick20" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Hepatitis A,B,C</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick28" type="radio" style="width: 20px; height: 20px;" id="sick28" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick28" type="radio" style="width: 20px; height: 20px;" id="sick28" value="No" checked>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Smoking
                                                    <br><input name="smoking" type="input" id="smoking" value="">
                                                </td>
                                                <td width="90" align="right">
                                                    <label for="checkbox">YES</label>
                                                    <input name="sick33" type="radio" style="width: 20px; height: 20px;" id="sick33" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick33" type="radio" style="width: 20px; height: 20px;" id="sick33" value="No" checked="">
                                                </td>
                                                <td width="154" align="center">Gynaecological Disorders</td>
                                                <td width="96" align="center">
                                                    <label for="checkbox">YES</label>
                                                    <input name="sick21" type="radio" style="width: 20px; height: 20px;" id="sick21" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick21" type="radio" style="width: 20px; height: 20px;" id="sick21" value="No" checked="">
                                                </td>
                                                <td width="132" align="center">Last Menstrual Period</td>
                                                <td width="146" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick29" type="radio" style="width: 20px; height: 20px;" id="sick29" value="Yes">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick29" type="radio" style="width: 20px; height: 20px;" id="sick29" value="No" checked="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="154" align="center">Back Problems</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick34" type="radio" style="width: 20px; height: 20px;" id="sick34" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick34" type="radio" style="width: 20px; height: 20px;" id="sick34" value="0" checked>
                                                </td>
                                                <td width="154" align="center">Thyroid Problems</td>
                                                <td width="96" align="center"><label for="checkbox">YES</label>
                                                    <input name="sick35" type="radio" style="width: 20px; height: 20px;" id="sick35" value="1">
                                                    <label for="checkbox">NO</label>
                                                    <input name="sick35" type="radio" style="width: 20px; height: 20px;" id="sick35" value="0" checked>
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">Others</td>
                                                <td colspan="5"><textarea name="others" cols="20" rows="2" id="others"
                                                        class="form-control"></textarea></td>
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab11" role="tabpanel" aria-labelledby="base-tab11">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="5"
                                        class="table table-responsive">
                                        <tbody>
                                            <tr>
                                                <td width="525" height="88" colspan="4" valign="top">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="2">
                                                        <tbody>
                                                            <tr>
                                                                <td height="20">&nbsp;</td>
                                                                <td height="20" valign="bottom">1.Have you ever been
                                                                    signed off as sick or repatriated from a ship?
                                                                </td>
                                                                <td width="48" align="center" valign="bottom"><input
                                                                        name="question1" type="radio" style="width: 20px; height: 20px;" id="question1"
                                                                        value="1"></td>
                                                                <td width="43" align="center" valign="bottom"><input
                                                                        name="question1" type="radio" style="width: 20px; height: 20px;" id="question1"
                                                                        value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>2. Have you ever been hospitalized?</td>
                                                                <td align="center"><input name="question2" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question2" value="1">
                                                                </td>
                                                                <td align="center"><input name="question2" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question2" value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>3.Have you ever been declared unfit sea duty?
                                                                </td>
                                                                <td align="center"><input name="question3" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question3" value="1">
                                                                </td>
                                                                <td align="center"><input name="question3" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question3" value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>4.Has your medical certificate ever been
                                                                    restricted
                                                                    or revoked?</td>
                                                                <td align="center"><input name="question4" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question4" value="1">
                                                                </td>
                                                                <td align="center"><input name="question4" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question4" value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td width="15">&nbsp;</td>
                                                                <td width="434">5.Are you aware that you have any
                                                                    medical problem, disease or illness?</td>
                                                                <td align="center"><input name="question5" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question5" value="1">
                                                                </td>
                                                                <td align="center"><input name="question5" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question5" value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>6.Do you feel healthy and fit to perform the
                                                                    duties
                                                                    of your designated position/occupation?</td>
                                                                <td align="center"><input name="question6" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question6" value="1" checked=""></td>
                                                                <td align="center"><input name="question6" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question6" value="0"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>7.Are you allergic to any medication?</td>
                                                                <td align="center"><input name="question7" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question7" value="1">
                                                                </td>
                                                                <td align="center"><input name="question7" type="radio" style="width: 20px; height: 20px;"
                                                                        id="question7" value="0" checked=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td>Comments:
                                                                    <textarea name="comments" cols="40" rows="2"
                                                                        id="comments" class="form-control"></textarea>
                                                                </td>
                                                                <td align="center">&nbsp;</td>
                                                                <td align="center">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td>.</td>
                                                                <td>8.Are you taking any non - prescription or
                                                                    prescription medication?<br>
                                                                    if <b>YES</b>, please list the medication(s)
                                                                    taken/being taken, and the purpose(s) and
                                                                    dosage(s):<br>
                                                                    <textarea name="purpose" cols="40" rows="2"
                                                                        id="purpose" class="form-control"></textarea>
                                                                </td>
                                                                <td align="center" valign="top"><input name="question8"
                                                                        type="radio" style="width: 20px; height: 20px;" id="question8" value="1"></td>
                                                                <td align="center" valign="top"><input name="question8"
                                                                        type="radio" style="width: 20px; height: 20px;" id="question8" value="0" checked>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>&nbsp;</td>
                                                                <td colspan="3"><b>(to Nurses/Doctors: inquire
                                                                        details
                                                                        of "Yes" answer)</b></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width="414" valign="top"><b>Write Here The Details<br>
                                                        <textarea name="details" cols="15" rows="18" id="details"
                                                            class="form-control"></textarea>
                                                    </b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                                    <table border="0" cellpadding="0" cellspacing="0" class="table-sm table-responsive">
                                        <tbody>
                                            <tr>
                                                <td height="31">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><b>PAST PEME</b>: (Where was the last PEME, what were the
                                                                Findings,when)</p>
                                                            <textarea name="past_peme" cols="10" rows="2" id="past_peme"
                                                                class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><b>PAST PEME RECOMMENDATION</b></p>
                                                            <textarea name="past_peme_recommendation" cols="10" rows="2" id="past_peme_recommendation"
                                                                class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="15">
                                                    <p><b>FAMILY HISTORY:</b> (To be Filled up by the Historian.)
                                                    </p>
                                                    <textarea name="family_history" cols="10" rows="2"
                                                        id="family_history" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="16">
                                                    <p><b>PRESENT ILLNESS</b> :</p>
                                                    <p>
                                                        <textarea name="present_illness" cols="10" rows="2"
                                                            id="present_illness" class="form-control"></textarea>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="31">
                                                    <p><b>SOCIAL HISTORY</b>: (SMOKING,ALCOHOL DRUGS,DIETARY HABITS)
                                                        To
                                                        be filled up the Historian.</p>
                                                    <textarea name="social_history" cols="10" rows="2"
                                                        id="social_history" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="31">
                                                    <p><b>OB AND GYNECOLOGIC HISTORY:</b> (For female patients.)</p>
                                                    <textarea name="gynecologic_history" cols="10" rows="2"
                                                        id="gynecologic_history" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="31">
                                                    <p><b>OCCUPATIONAL HISTORY:</b> Please note the number of years
                                                        patient had been working on boards; what the particular type
                                                        of
                                                        ships (tanker , cargo, passenger, offshore,etc) What
                                                        particular
                                                        job he does. What particular route they take. Ask if all
                                                        contracts are finished, why if not. Ask about the latest
                                                        contract, when was the last departure and arrival. Other
                                                        relevant information that can help in the evaluation of
                                                        fitness.
                                                    </p>
                                                    <textarea name="occupational_history" cols="20" rows="2"
                                                        id="occupational_history" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="31">
                                                    <p><b>REVIEW OF SYMPTOMS: </b>Please pay particular attention to
                                                        the
                                                        present symptoms and if there are medications being taken.
                                                    </p>
                                                    <textarea name="symptoms" cols="20" rows="2" id="symptoms"
                                                        class="form-control"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>OTHER PERTINENT INFORMATION:</b> To be filled up by the
                                                    historian. ( OLD MEDICAL RECORD; if patient is re-medical)
                                                    <p></p>
                                                    <textarea name="pertinent_info" cols="20" rows="2"
                                                        id="pertinent_info" class="form-control"></textarea>
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab13" role="tabpanel" aria-labelledby="base-tab13">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tbody>
                                            <tr>
                                                <td colspan="10" align="center">
                                                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                        <tbody>
                                                            <tr>
                                                                <td width="10%" align="center"><b>WEIGHT (kg)</b></td>
                                                                <td width="11%" align="center"><b>HEIGHT (cm)</b></td>
                                                                <td width="19%" align="center"><b>BMI</b></td>
                                                                <td width="14%" align="center"><b>BLOOD PRESSURE</b>
                                                                </td>
                                                                <td width="14%" align="center"><b>PULSE (min)</b>
                                                                </td>
                                                                <td width="17%" align="center"><b>RESPIRATION</b>
                                                                </td>
                                                                <td width="15%" align="center"><b>RHYTHM</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="weight" type="text"
                                                                            class="form-control" id="weight" value="{{$exam_cardio ? $exam_cardio->weight : null}}"
                                                                            size="5" onkeyup="computeBMI();">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="height" type="text"
                                                                            class="form-control" id="height" value="{{$exam_cardio ? $exam_cardio->height : null}}"
                                                                            size="5" onkeyup="computeBMI();">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="bmi" type="text"
                                                                            class="form-control" id="bmi" value="{{$exam_cardio ? $exam_cardio->bmi : null}}"
                                                                            size="20">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="systollic" type="text"
                                                                            class="form-control" id="systollic"
                                                                            placeholder="Systollic" value="" size="10">
                                                                        <input name="diastollic" type="text"
                                                                            class="form-control" id="diastollic"
                                                                            placeholder="Diastollic" value="" size="10">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="pulse" type="text"
                                                                            class="form-control" id="pulse" value=""
                                                                            size="5">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="respiration" type="text"
                                                                            class="form-control" id="respiration"
                                                                            value="" size="10">
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                    <div class="col-md-12">
                                                                        <input name="rhythm" type="text" id="rhythm"
                                                                            value="NORMAL" size="10" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="7">
                                                                    Vital Sign Recommendation: <br>
                                                                    <textarea name="vital_sign_recommendation" id="vital_sign_recommendation" cols="30" rows="3" class="form-control"></textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="30%">&nbsp;</td>
                                                <td width="7%" colspan="-1" align="center">&nbsp;</td>
                                                <td width="3%" colspan="-1" align="center">&nbsp;</td>
                                                <td width="4%" colspan="-1" align="center">&nbsp;</td>
                                                <td width="16%" colspan="-1" align="center">&nbsp;</td>
                                                <td width="40%" colspan="3">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="my-1">Alongside columns A,B,C put check mark(✔) under "YES" if Normal. If not Normal, specify findings</div>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        class="table table-bordered table-responsive">
                                        <tbody>
                                            <tr>
                                                <td width="140" height="37" align="center"><b>A</b></td>
                                                <td width="29" align="center">YES</td>
                                                <td width="196" align="center">Significant Findings </td>
                                                <td width="135" align="center"><b>B</b></td>
                                                <td width="146" align="center">YES</td>
                                                <td width="154" align="center">Significant Findings </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="38" align="center">Skin</td>
                                                <td width="29" align="center"><input name="a1" type="checkbox" id="a1"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a1_findings" type="text"
                                                        id="a1_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Neck, Lymph Node,Thyroid</td>
                                                <td width="146" align="center"><input name="b1" type="checkbox" id="b1"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b1_findings" type="text"
                                                        id="b1_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="36" align="center">Head, Neck,Scalp</td>
                                                <td width="29" align="center"><input name="a2" type="checkbox" id="a2"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a2_findings" type="text"
                                                        id="a2_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Neurology</td>
                                                <td width="146" align="center"><input name="b7" type="checkbox" id="b7"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b2_findings" type="text"
                                                        id="b2_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="33" align="center">Eyes(external)</td>
                                                <td width="29" align="center"><input name="a3" type="checkbox" id="a3"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a3_findings" type="text"
                                                        id="a3_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Breast,Axilla</td>
                                                <td width="146" align="center"><input name="b2" type="checkbox" id="b2"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b3_findings" type="text"
                                                        id="b3_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="34" align="center">Pupils</td>
                                                <td width="29" align="center"><input name="a4" type="checkbox" id="a4"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a4_findings" type="text"
                                                        id="a4_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Chest and Lungs</td>
                                                <td width="146" align="center"><input name="b3" type="checkbox" id="b3"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b4_findings" type="text"
                                                        id="b4_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="34" align="center">Ears</td>
                                                <td width="29" align="center"><input name="a5" type="checkbox" id="a5"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a5_findings" type="text"
                                                        id="a5_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Heart</td>
                                                <td width="146" align="center"><input name="b4" type="checkbox" id="b4"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b5_findings" type="text"
                                                        id="b5_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="37" align="center">Nose,Sinuses</td>
                                                <td width="29" align="center"><input name="a6" type="checkbox" id="a6"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a6_findings" type="text"
                                                        id="a6_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Abdomen,Liver,Spleen</td>
                                                <td width="146" align="center"><input name="b5" type="checkbox" id="b5"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b6_findings" type="text"
                                                        id="b6_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="140" height="14" align="center">Mouth,Throat</td>
                                                <td width="29" align="center"><input name="a7" type="checkbox" id="a7"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="a7_findings" type="text"
                                                        id="a7_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td width="135" align="center">Back</td>
                                                <td width="146" align="center"><input name="b6" type="checkbox" id="b6"
                                                        value="Yes" checked></td>
                                                <td align="center"><input name="b7_findings" type="text"
                                                        id="b7_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="center">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="7" align="center"><b>C</b></td>
                                            </tr>
                                            <tr>
                                                <td align="center">&nbsp;</td>
                                                <td align="center">YES</td>
                                                <td align="center">Significant Findings</td>
                                                <td align="center">&nbsp;</td>
                                                <td align="center">YES</td>
                                                <td align="center">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td align="center">Anus-Rectum</td>
                                                <td align="center"><input name="c1" type="checkbox" id="c1" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c1_findings" type="text"
                                                        id="c1_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td align="center">Genito-Urinary System</td>
                                                <td align="center"><input name="c2" type="checkbox" id="c2" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c2_findings" type="text"
                                                        id="c2_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">Inguinals,Genitals</td>
                                                <td align="center"><input name="c3" type="checkbox" id="c3" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c3_findings" type="text"
                                                        id="c3_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td align="center">Extremities</td>
                                                <td align="center"><input name="c4" type="checkbox" id="c4" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c4_findings" type="text"
                                                        id="c4_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">Reflexes</td>
                                                <td align="center"><input name="c5" type="checkbox" id="c5" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c5_findings" type="text"
                                                        id="c5_findings" value="" size="10" class="form-control">
                                                </td>
                                                <td align="center">Dental(Teeth/Gums)</td>
                                                <td align="center"><input name="c6" type="checkbox" id="c6" value="Yes" checked>
                                                </td>
                                                <td align="center"><input name="c6_findings" type="text"
                                                        id="c6_findings" value="" size="10" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" align="center">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab14" role="tabpanel" aria-labelledby="base-tab14">
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        class="table table-bordered table-responsive">
                                        <tbody>
                                            <tr>
                                                <td height="21" colspan="4"><b>RESULTS OF ANCILLARY EXAMINATIONS</b>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td width="16%" height="21">A.CHEST XRAY</td>
                                                <td width="13%" height="21">
                                                    <input name="chest" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio88" value="normal"
                                                        @if($exam_xray)
                                                            {{$exam_xray->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                <td height="21" colspan="2">
                                                    <input name="chest" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio89" value="findings"
                                                        @if($exam_xray)
                                                            {{$exam_xray->remarks_status == "findings" ? "checked" : null}}
                                                        @endif>
                                                    With Findings <br>
                                                    <textarea class="form-control" name="xray_findings">@if($exam_xray){{$exam_xray->remarks_status == "findings" ? $exam_xray->remarks : null}}@endif</textarea>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td height="21">B.ECG</td>
                                                <td height="21"><input name="ecg" type="radio" style="width: 20px; height: 20px;" id="radio90"
                                                        value="normal"
                                                        @if($exam_ecg)
                                                            {{$exam_ecg->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                <td height="21" colspan="2"><input name="ecg" type="radio" style="width: 20px; height: 20px;" id="radio91"
                                                        value="findings"
                                                        @if($exam_ecg)
                                                            {{$exam_ecg->remarks_status == "findings" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    With Findings
                                                    <textarea class="form-control" name="ecg_findings"></textarea>
                                                    </td>
                                            </tr>
                                            <tr>
                                                <td height="21">C.CBC</td>
                                                <td height="21"><input name="cbc" type="radio" style="width: 20px; height: 20px;" id="radio92"
                                                        value="normal"
                                                        @if($exam_hema)
                                                            {{$exam_hema->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                <td height="21" colspan="2"><input name="cbc" type="radio" style="width: 20px; height: 20px;" id="radio93"
                                                        value="findings"
                                                        @if($exam_hema)
                                                            {{$exam_hema->remarks_status == "findings" ? "checked" : null}}
                                                        @endif
                                                        >
                                                        With Findings
                                                    </td>
                                            </tr>




                                            <tr>
                                                <td height="21">D.URINALYSIS</td>
                                                <td height="21"><input name="urinalysis" type="radio" style="width: 20px; height: 20px;" id="radio94"
                                                        value="normal"
                                                        @if($exam_urin)
                                                            {{$exam_urin->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                <td height="21" colspan="2"><input name="urinalysis" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio95" value="findings"
                                                        @if($exam_urin)
                                                            {{$exam_urin->remarks_status == "findings" ? "checked" : null}}
                                                        @endif
                                                        >
                                                        With Findings
                                                    </td>
                                            </tr>


                                            <tr>
                                                <td height="21">E.STOOL EXAM</td>
                                                <td height="21"><input name="stool" type="radio" style="width: 20px; height: 20px;" id="radio96"
                                                        value="normal"
                                                        @if($exam_feca)
                                                            {{$exam_feca->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                <td height="21" colspan="2"><input name="stool" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio97" value="findings"
                                                        @if($exam_feca)
                                                            {{$exam_feca->remarks_status == "findings" ? "checked" : null}}
                                                        @endif
                                                        >
                                                        With Findings
                                                    </td>
                                            </tr>


                                            <tr>
                                                <td height="21">F.HEPATITIS B</td>
                                                <td height="21"><input name="hepa_b" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio99" value="Non Reactive"
                                                        @if($exam_bloodsero)
                                                            {{$exam_bloodsero->hbsag_result == "Non Reactive" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Non-Reactive </td>
                                                <td height="21"><input name="hepa_b" colspan="2" type="radio"  id="radio98" style="width: 20px; height: 20px;"
                                                        value="Reactive"
                                                        @if($exam_bloodsero)
                                                            {{$exam_bloodsero->hbsag_result == "Reactive" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Reactive</td>
                                            </tr>


                                            <tr>
                                                <td height="21">G.HIV/AID TEST</td>
                                                <td height="21"><input name="hiv" type="radio"  id="radio101" style="width: 20px; height: 20px;"
                                                        value="Non Reactive"
                                                        @if($exam_hiv)
                                                            {{$exam_hiv->result == "Non Reactive" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Non-Reactive </td>
                                                <td height="21" colspan="2"><input name="hiv" type="radio"  id="radio100" style="width: 20px; height: 20px;"
                                                        value="Reactive"
                                                        @if($exam_hiv)
                                                            {{$exam_hiv->result == "Reactive" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Reactive </td>

                                            </tr>


                                            <tr>
                                                <td height="21">H.RPR</td>
                                                <td height="21"><input name="rph" type="radio"  id="radio103" style="width: 20px; height: 20px;"
                                                        value="Non Reactive"
                                                        @if($exam_bloodsero)
                                                            {{$exam_bloodsero->vdrl_result == "Non Reactive" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Non-Reactive </td>
                                                <td height="21" colspan="2"><input name="rph" type="radio" id="radio102" style="width: 20px; height: 20px;"
                                                        value="Reactive"
                                                        @if($exam_bloodsero)
                                                            {{$exam_bloodsero->vdrl_result == "Reactive" ? "checked" : null}}
                                                        @endif>
                                                    Reactive </td>

                                            </tr>


                                            <tr>
                                                <td height="21">PSYCHOLOGICAL TEST</td>
                                                <td height="21"><input name="psychological" type="radio"  id="radio104" style="width: 20px; height: 20px;"
                                                        value="normal"
                                                        @if($exam_psycho)
                                                            {{$exam_psycho->remarks_status == "normal" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    Normal</td>
                                                    <td height="21" colspan="2"><input name="psychological" type="radio" style="width: 20px; height: 20px;"
                                                        id="radio105" value="evaluation"
                                                        @if($exam_psycho)
                                                            {{$exam_psycho->remarks_status == "findings" ? "checked" : null}}
                                                        @endif
                                                        >
                                                    For Further Evaluation</td>
                                            </tr>


                                            <tr>
                                                <td height="21">BLOOD TYPE</td>
                                                <td height="21" colspan="3">
                                                    <input type="text" name="blood_type" class="form-control" value="{{$exam_hema ? $exam_hema->blood : null}}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="21" colspan="4">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td height="21" colspan="4">
                                                    <p>Additional Laboratory TEST(Specify):e.g. Blood Chemistry,
                                                        Drug
                                                        Test, Alcohol Test, Liver Function Test, Stool Culture, etc
                                                    </p>
                                                    <textarea name="additional_labtest" cols="70" rows="2"
                                                        id="additional_labtest" class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="tab15" role="tabpanel" aria-labelledby="base-tab15">
                                    <table border="0" cellpadding="0" cellspacing="0"
                                        class="table table-bordered table-responsive">
                                        <tbody>
                                            <tr>
                                                <td width="387" height="39">Basic DOH Mandatory Medical
                                                    Examinations:
                                                </td>
                                                <td width="203" style=""><input name="summary_medexam" type="radio" style="width: 20px; height: 20px;"
                                                        id="summary_medexam" value="passed">
                                                    PASSED</td>
                                                <td width="651" style=""><input name="summary_medexam" type="radio" style="width: 20px; height: 20px;"
                                                        id="summary_medexam" value="findings">
                                                    WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td width="387" height="39" style="">Additional Laboratory Test:
                                                </td>
                                                <td width="203" style=""><input name="summary_labtest" type="radio" style="width: 20px; height: 20px;"
                                                        id="summary_labtest" value="passed">
                                                    PASSED</td>
                                                <td width="651" style=""><input name="summary_labtest" type="radio" style="width: 20px; height: 20px;"
                                                        id="summary_labtest" value="findings">
                                                    WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td width="387" height="39" style="">Flag Host Medical and
                                                    Laboratory
                                                    Requirments:</td>
                                                <td width="203" style=""><input name="summary_labrequirements"
                                                        type="radio" style="width: 20px; height: 20px;" id="summary_labrequirements" value="passed">
                                                    PASSED</td>
                                                <td width="651" style=""><input name="summary_labrequirements"
                                                        type="radio" style="width: 20px; height: 20px;" id="summary_labrequirements" value="findings">
                                                    WITH SIGNIFICANT FINDINGS</td>
                                            </tr>
                                            <tr>
                                                <td height="20" colspan="3">
                                                    <p><b>REMARKS/SPECIAL NEEDS</b>
                                                        <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                            id="remarks_status_0" value="normal">Normal
                                                        <input name="remarks_status" type="radio" style="width: 20px; height: 20px;" class="m-1"
                                                            id="remarks_status_1" value="findings">With Findings
                                                    </p>
                                                    <textarea name="remarks" cols="70" rows="3" id="remarks"
                                                        class="form-control"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td height="39" colspan="3">
                                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                                        class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td height="29" colspan="5" align="center">
                                                                    <div class="box box-success box-solid">
                                                                        <div class="box-header with-border">
                                                                            <h3 class="box-title" style="float: left">
                                                                                ASSESSMENT OF FITNESS</h3>
                                                                            <br>
                                                                            <br>
                                                                            On the basis of the examinee's personal
                                                                            declaration, my clinical examination and
                                                                            diagnostic test results recorded above,
                                                                            ideclare the examinee medically
                                                                            <div class="box-tools pull-right">
                                                                                <button class="btn btn-box-tool"
                                                                                    data-widget="collapse"><i
                                                                                        class="fa fa-minus"></i></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="box-body">
                                                                            <table class="table table-bordered">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td height="29">
                                                                                            <table width="75%"
                                                                                                border="1">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            <b> LOOK
                                                                                                                OUT
                                                                                                                DUTY
                                                                                                            </b>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            FIT
                                                                                                            <input
                                                                                                                name="duty"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="duty"
                                                                                                                value="Fit">
                                                                                                        </td>
                                                                                                        <td width="16%"
                                                                                                            align="center">
                                                                                                            UNFIT
                                                                                                            <input
                                                                                                                name="duty"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="duty"
                                                                                                                value="Unfit">
                                                                                                        </td>
                                                                                                        <td align="center">
                                                                                                            FIT RESTRICTION
                                                                                                            <input
                                                                                                                name="duty"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="duty"
                                                                                                                value="Fit Restriction">
                                                                                                        </td>
                                                                                                        <td>&nbsp;</td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="27%"
                                                                                                            align="center">
                                                                                                            <b>
                                                                                                                FIT
                                                                                                            </b>
                                                                                                        </td>
                                                                                                        <td width="12%"
                                                                                                            align="center">
                                                                                                            FIT
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="fit"
                                                                                                                id="fit"
                                                                                                                value="Fit">
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            UNFIT
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="fit"
                                                                                                                id="fit"
                                                                                                                value="Unfit">
                                                                                                        </td>
                                                                                                        <td width="22%"
                                                                                                            align="center">
                                                                                                            <span
                                                                                                                style="font-size: 14px">Unfit
                                                                                                                Temporarily</span>
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="fit"
                                                                                                                id="fit"
                                                                                                                value="Unfit_temp">
                                                                                                        </td>
                                                                                                        <td width="23%"
                                                                                                            align="center">
                                                                                                            <span
                                                                                                                style="font-size: 14px">Pending</span>
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="fit"
                                                                                                                id="fit"
                                                                                                                value="Pending">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            <b>RESULT</b>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            FIT
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="seastatus"
                                                                                                                id="seafit"
                                                                                                                value="seafit">
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            UNFIT
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="seastatus"
                                                                                                                id="seaunfit"
                                                                                                                value="seaunfit">
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            Pending
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="seastatus"
                                                                                                                id="seapending"
                                                                                                                value="seapending">
                                                                                                        </td>
                                                                                                        <td>&nbsp;
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left">
                                                                                            <table width="75%"
                                                                                                border="1">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td width="197"
                                                                                                            align="center">
                                                                                                            <b>Tier
                                                                                                                2</b>
                                                                                                        </td>
                                                                                                        <td width="188"
                                                                                                            align="center">
                                                                                                            <b>Tier
                                                                                                                3</b>
                                                                                                        </td>
                                                                                                        <td width="258"
                                                                                                            align="center">
                                                                                                            <b>Tier
                                                                                                                4</b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><span
                                                                                                                style="text-align: center"
                                                                                                                class="col-md-12">
                                                                                                                <select
                                                                                                                    name="tier2_id"
                                                                                                                    class="form-control select2"
                                                                                                                    style="border-color:green"
                                                                                                                    id="tier2_id">
                                                                                                                    <?=initOptionTbl("list_tier2","id","choices","",1)?>
                                                                                                                </select>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td><span
                                                                                                                style="text-align: center"
                                                                                                                class="col-md-12">
                                                                                                                <select
                                                                                                                    name="tier3_id"
                                                                                                                    class="form-control select2"
                                                                                                                    style="border-color:green"
                                                                                                                    id="tier3_id">
                                                                                                                    <?=initOptionTbl("list_tier3","id","choices","",1)?>
                                                                                                                </select>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td><span
                                                                                                                style="text-align: center"
                                                                                                                class="col-md-12">
                                                                                                                <select
                                                                                                                    name="tier4_id"
                                                                                                                    class="form-control select2"
                                                                                                                    style="border-color:green"
                                                                                                                    id="tier4_id">
                                                                                                                    <?=initOptionTbl("list_tier4","id","choices","",1)?>
                                                                                                                </select>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left">
                                                                                            <table class="table"
                                                                                                border="1">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td align="center"
                                                                                                            valign="bottom">
                                                                                                            <b>VISUAL
                                                                                                                AIDS
                                                                                                                REQUIRED</b>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            SPECTACLES
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="visual_required"
                                                                                                                id="visual_required0"
                                                                                                                value="Spectacles">
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            CONTACT
                                                                                                            LENSES
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="visual_required"
                                                                                                                id="visual_required1"
                                                                                                                value="Contact Lenses">
                                                                                                        </td>
                                                                                                        <td
                                                                                                            align="center">
                                                                                                            NONE
                                                                                                            <input
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                name="visual_required"
                                                                                                                id="visual_required2"
                                                                                                                value="">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center">
                                                                                            <table class border="1">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td  width="23%"><b>&nbsp;&nbsp;&nbsp;&nbsp;WITHOUT
                                                                                                                RESTRICTIONS</b>
                                                                                                            <input
                                                                                                                name="restriction"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="restriction"
                                                                                                                value="Without Restriction">
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            &nbsp;&nbsp;&nbsp;&nbsp;<b>WITH
                                                                                                                RESTRICTIONS</b>
                                                                                                            <input
                                                                                                                name="restriction"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="restriction"
                                                                                                                value="With Restriction">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                Describe
                                                                                                                restrictions
                                                                                                                **
                                                                                                                (Refer
                                                                                                                to
                                                                                                                standard
                                                                                                                restriction
                                                                                                                at
                                                                                                                the
                                                                                                                bottom
                                                                                                                of
                                                                                                                this
                                                                                                                page).
                                                                                                                <textarea
                                                                                                                    name="describe_restriction"
                                                                                                                    cols="70"
                                                                                                                    rows="3"
                                                                                                                    style="border-color: green"
                                                                                                                    id="describe_restriction"
                                                                                                                    class="form-control"></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <b>Comments/Restriction/Prescription</b>
                                                                                                                <textarea
                                                                                                                    name="comments_restriction"
                                                                                                                    cols="70"
                                                                                                                    rows="3"
                                                                                                                    id="comments_restriction"
                                                                                                                    class="form-control"></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <b>Hologram Number</b>
                                                                                                                <textarea
                                                                                                                    name="progressive_notes"
                                                                                                                    cols="70"
                                                                                                                    rows="3"
                                                                                                                    id="progressive_notes"
                                                                                                                    class="form-control"></textarea>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <b>Liberian Certification Code</b>
                                                                                                                <input name="liberian_code" cols="70" rows="3" id="liberian_code" class="form-control"/>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left">
                                                                                            <table width="100%"
                                                                                                border="1"
                                                                                                cellspacing="1"
                                                                                                cellpadding="2">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td width="23%" colspan="3"><b>NORMAL</b>
                                                                                                            <input
                                                                                                                name="remarks_status"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="remarks_status"
                                                                                                                value="normal"

                                                                                                            <br>
                                                                                                            &nbsp;&nbsp;&nbsp;<b>WITH FINDINGS</b>
                                                                                                            <input
                                                                                                                name="remarks_status"
                                                                                                                type="radio" style="width: 20px; height: 20px;"
                                                                                                                id="remarks_status"
                                                                                                                value="findings"
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td width="45%"
                                                                                                            align="left"
                                                                                                            bgcolor="#FFFFFF">
                                                                                                            <b>Findings</b>
                                                                                                        </td>
                                                                                                        <td width="34%"
                                                                                                            bgcolor="#FFFFFF">
                                                                                                            <b>Recommendations</b>
                                                                                                        </td>
                                                                                                        <td width="21%"
                                                                                                            align="center"
                                                                                                            bgcolor="#FFFFFF">
                                                                                                            &nbsp;
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td align="left"
                                                                                                            valign="middle">
                                                                                                            <span
                                                                                                                class="col-md-8">
                                                                                                                <textarea
                                                                                                                    name="finding"
                                                                                                                    rows="3"
                                                                                                                    class="form-control"
                                                                                                                    id="finding"></textarea>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                        <td
                                                                                                            valign="middle" colspan="2">
                                                                                                            <span
                                                                                                                class="col-md-8">
                                                                                                                <textarea
                                                                                                                    name="recommendations"
                                                                                                                    rows="3"
                                                                                                                    class="form-control"
                                                                                                                    id="recommendations"></textarea>
                                                                                                            </span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="3"
                                                                                                            align="left">
                                                                                                            No
                                                                                                            record
                                                                                                            found.
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="left">
                                                                                            <table width="100%"
                                                                                                style="border-top: 5px solid;border-bottom: 5px solid;"
                                                                                                class="table table-bordered"
                                                                                                border="0"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td colspan="2">
                                                                                                            <table
                                                                                                                width="100%"
                                                                                                                border="0"
                                                                                                                cellspacing="2"
                                                                                                                cellpadding="2">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td
                                                                                                                            width="16%">
                                                                                                                            <b>Physician:
                                                                                                                            </b>
                                                                                                                        </td>
                                                                                                                        <td
                                                                                                                            width="84%">
                                                                                                                            <div
                                                                                                                                class="col-md-8">
                                                                                                                                <select
                                                                                                                                    name="technician_id"
                                                                                                                                    id="technician_id"
                                                                                                                                    class="form-control">
                                                                                                                                    @foreach($physicians as $physician)
                                                                                                                                        <option value={{$physician->id}}> {{$physician->firstname}} {{$physician->lastname}}</option>
                                                                                                                                    @endforeach
                                                                                                                                </select>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td>
                                                                                                            <b>DATE OF EXAMINATION</b><br>
                                                                                                            <input
                                                                                                                name="date_examination"
                                                                                                                type="date"
                                                                                                                id="date_examination"
                                                                                                                value=""
                                                                                                                size="5"
                                                                                                                class="form-control"
                                                                                                                style="width:150px">
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <b>DATE
                                                                                                                OF
                                                                                                                ISSUANCE</b><br>
                                                                                                            <input
                                                                                                                name="peme_date"
                                                                                                                type="date"
                                                                                                                id="peme_date"
                                                                                                                value=""
                                                                                                                size="10"
                                                                                                                onchange="computeExpiration(this)"
                                                                                                                class="form-control"
                                                                                                                style="width:150px">
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td><b>MEDICAL
                                                                                                                EXAM
                                                                                                                REPORT
                                                                                                                NO.<br>
                                                                                                                <input
                                                                                                                    name="examination_number"
                                                                                                                    type="text"
                                                                                                                    id="examination_number"
                                                                                                                    value=""
                                                                                                                    size="5"
                                                                                                                    class="form-control"
                                                                                                                    style="width:150px">
                                                                                                            </b>
                                                                                                        </td>
                                                                                                        <td><b>DATE
                                                                                                                OF
                                                                                                                EXPIRATION<br>
                                                                                                                <input
                                                                                                                    name="date_expiration"
                                                                                                                    type="date"
                                                                                                                    id="date_expiration"
                                                                                                                    value=""
                                                                                                                    size="10"
                                                                                                                    class="form-control"
                                                                                                                    style="width:150px">
                                                                                                            </b>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
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
@push('scripts')
<script>
window.addEventListener('load', () => {
    computeBMI();
})

function computeBMI() {
    if (frm.height.value != '' && frm.weight.value != '') {
        var num = frm.weight.value / ((frm.height.value / 100) * (frm.height.value / 100));
        if (num < 18.4)
            bmi_desc = 'Underweight';
        else if (num >= 18.5 && num <= 22.9)
            bmi_desc = 'Normal';
        else if (num >= 23.0 && num <= 24.9)
            bmi_desc = 'Overweight';
        else if (num >= 25.0 && num <= 29.9)
            bmi_desc = 'Overweight II';
        else if (num >= 30.0 && num <= 34.9)
            bmi_desc = 'Obese';
        else if (num >= 35.0)
            bmi_desc = 'Obese II';
        // frm.bmi.value = num.toFixed(2) + ' - ' + bmi_desc;
        frm.bmi.value = num.toFixed(2)
    }
}

function computeExpiration(e) {
    dt = new Date(e.value);
    let date = new Date(dt.setFullYear(dt.getFullYear() + 2)).setDate(dt.getDate() - 1);
    let resultDate = new Date(date);
    var day = ("0" + resultDate.getDate()).slice(-2);
    var month = ("0" + (resultDate.getMonth() + 1)).slice(-2);
    $('#date_expiration').val(resultDate.getFullYear()+"-"+(month)+"-"+(day));
}
</script>
@endpush
