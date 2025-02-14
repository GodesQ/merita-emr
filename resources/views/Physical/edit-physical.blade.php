@php

    // custom php code

    function getConn($host, $dbid, $dbpwd, $db)
    {
        return mysqli_connect($host, $dbid, $dbpwd, $db);
    }

    function getResult($sql, $dbtype = 0)
    {
        if ($dbtype == 0) {
            $host = env('DB_HOST');
            $db = env('DB_DATABASE');
            $dbid = env('DB_USERNAME');
            $dbpwd = env('DB_PASSWORD');
            $conn = mysqli_connect($host, $dbid, $dbpwd, $db);
            return mysqli_query($conn, $sql);
        }
    }

    function getArray($result)
    {
        global $conn;
        return mysqli_fetch_array($result);
    }

    function initOptionTbl($table, $optval, $optlabel, $val, $withselect = 1)
    {
        if ($withselect == 1) {
            echo "<option value=''>--SELECT--</option>";
        }
        $result0 = getResult("select * from $table");
        while ($row0 = getArray($result0)) {
            $selected = $row0[$optval] == $val ? 'selected' : '';
            echo "<option value='" . $row0[$optval] . "' $selected>" . $row0[$optlabel] . '</option>';
        }
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
            font-size: 11px;
        }

        .custom-sm-radio {
            width: 20px;
            height: 20px;
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
                                        <h3>Edit Physical Exam</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}"
                                            class="btn btn-primary">Back to Patient</a>
                                        <button
                                            onclick='window.open("/exam_physical_print?id={{ $exam->admission_id }}", "width=800,height=650").print()'
                                            class="btn btn-dark btn-solid" title="Print">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content p-2">
                            <form name="frm" method="post" action="/update_physical" role="form">
                                @if (Session::get('status'))
                                    @push('scripts')
                                        <script>
                                            toastr.success('{{ Session::get('status') }}', 'Success');
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
                                                    value="{{ $admission->trans_date }}" class="form-control"
                                                    readonly="">
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
                                            <td><input name="trans_date" type="date" id="trans_date"
                                                    value="{{ $exam->trans_date }}" class="form-control"></td>
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
                                <ul class="nav nav-tabs nav-top-border no-hover-bg my-3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab10" data-toggle="tab" aria-controls="tab10"
                                            href="#tab10" role="tab" aria-selected="true">Medical History 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab11" data-toggle="tab" aria-controls="tab11"
                                            href="#tab11" role="tab" aria-selected="true">Medical History 2</a>
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
                                            href="#tab14" role="tab" aria-selected="false">Physical Examination
                                            2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab15" data-toggle="tab" aria-controls="tab15"
                                            href="#tab15" role="tab" aria-selected="false">Physical Examination
                                            3</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div class="tab-pane active" id="tab10" role="tabpanel"
                                        aria-labelledby="base-tab10">
                                        <table class="table table-bordered table-responsive" width="100%">
                                            <tbody>
                                                <tr>
                                                    <td colspan="6" align="center"><b>PAST MEDICAL HISTORY</b>: has
                                                        applicant suffered from been told he has any of the following
                                                        (<b>Answer YES</b> or <b>NO</b>).(to be answered by patient.) </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Head or Neck Injury</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick1" type="radio" class="custom-sm-radio"
                                                            id="sick1" value="1"
                                                            {{ $exam->sick1 == 'Yes' || $exam->sick1 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick1" type="radio" class="custom-sm-radio"
                                                            id="sick1" value="0"
                                                            {{ $exam->sick1 == 'No' || $exam->sick1 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Other Lung Disorders</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick11" type="radio" class="custom-sm-radio"
                                                            id="sick11" value="1"
                                                            {{ $exam->sick11 == 'Yes' || $exam->sick11 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick11" type="radio" class="custom-sm-radio"
                                                            id="sick11" value="0"
                                                            {{ $exam->sick11 == 'No' || $exam->sick11 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Kidney or Bladder Disorder</td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick22" type="radio" class="custom-sm-radio"
                                                            id="sick22" value="1"
                                                            {{ $exam->sick22 == 'Yes' || $exam->sick22 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick22" type="radio" class="custom-sm-radio"
                                                            id="sick22" value="0"
                                                            {{ $exam->sick22 == 'No' || $exam->sick22 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" height="33" align="center">Frequency Headaches
                                                    </td>
                                                    <td align="center"><label for="checkbox">YES</label>
                                                        <input name="sick2" type="radio" class="custom-sm-radio"
                                                            id="sick2" value="1"
                                                            {{ $exam->sick2 == 'Yes' || $exam->sick2 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick2" type="radio" class="custom-sm-radio"
                                                            id="sick2" value="0"
                                                            {{ $exam->sick2 == 'No' || $exam->sick2 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">High Blood Pressure
                                                        <br><input name="high_blood" type="input" id="high_blood"
                                                            value="{{ $exam->high_blood }}">
                                                    </td>
                                                    <td align="center"><label for="checkbox">YES</label>
                                                        <input name="sick12" type="radio" class="custom-sm-radio"
                                                            id="sick12" value="1"
                                                            {{ $exam->sick12 == 'Yes' || $exam->sick12 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick12" type="radio" class="custom-sm-radio"
                                                            id="sick12" value="0"
                                                            {{ $exam->sick12 == 'No' || $exam->sick12 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center"> Back Injury, Joint
                                                        Pain/Arthritis/Rheumatic</td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick23" type="radio" class="custom-sm-radio"
                                                            id="sick23" value="1"
                                                            {{ $exam->sick23 == 'Yes' || $exam->sick23 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick23" type="radio" class="custom-sm-radio"
                                                            id="sick23" value="0"
                                                            {{ $exam->sick23 == 'No' || $exam->sick23 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Frequency Dizziness</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick3" type="radio" class="custom-sm-radio"
                                                            id="sick3" value="1"
                                                            {{ $exam->sick3 == 'Yes' || $exam->sick3 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick3" type="radio" class="custom-sm-radio"
                                                            id="sick3" value="0"
                                                            {{ $exam->sick3 == 'No' || $exam->sick3 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Heart Disease/Chest Pain</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick13" type="radio" class="custom-sm-radio"
                                                            id="sick13" value="1"
                                                            {{ $exam->sick13 == 'Yes' || $exam->sick13 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick13" type="radio" class="custom-sm-radio"
                                                            id="sick13" value="0"
                                                            {{ $exam->sick13 == 'No' || $exam->sick13 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Genetic, Hereditary or Familial
                                                        Disorders
                                                    </td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick24" type="radio" class="custom-sm-radio"
                                                            id="sick24" value="1"
                                                            {{ $exam->sick24 == 'Yes' || $exam->sick24 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick24" type="radio" class="custom-sm-radio"
                                                            id="sick24" value="0"
                                                            {{ $exam->sick24 == 'No' || $exam->sick24 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Fainting Spells,Fits, Seizures or
                                                        <br> Other
                                                        Neurological Disorders
                                                    </td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick4" type="radio" class="custom-sm-radio"
                                                            id="sick4" value="1"
                                                            {{ $exam->sick4 == 'Yes' || $exam->sick4 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick4" type="radio" class="custom-sm-radio"
                                                            id="sick4" value="0"
                                                            {{ $exam->sick4 == 'No' || $exam->sick4 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Rheumatic Fever</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick14" type="radio" class="custom-sm-radio"
                                                            id="sick14" value="1"
                                                            {{ $exam->sick14 == 'Yes' || $exam->sick14 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick14" type="radio" class="custom-sm-radio"
                                                            id="sick14" value="0"
                                                            {{ $exam->sick14 == 'No' || $exam->sick14 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Sexually Transmitted Diseases</td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick25" type="radio" class="custom-sm-radio"
                                                            id="sick25" value="1"
                                                            {{ $exam->sick25 == 'Yes' || $exam->sick25 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick25" type="radio" class="custom-sm-radio"
                                                            id="sick25" value="0"
                                                            {{ $exam->sick25 == 'No' || $exam->sick25 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Insomia Or Sleep Disorders</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick5" type="radio" class="custom-sm-radio"
                                                            id="sick5" value="1"
                                                            {{ $exam->sick5 == 'Yes' || $exam->sick5 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick5" type="radio" class="custom-sm-radio"
                                                            id="sick5" value="0"
                                                            {{ $exam->sick5 == 'No' || $exam->sick5 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Diabetes Mellitus</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick15" type="radio" class="custom-sm-radio"
                                                            id="sick15" value="1"
                                                            {{ $exam->sick15 == 'Yes' || $exam->sick15 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick15" type="radio" class="custom-sm-radio"
                                                            id="sick15" value="0"
                                                            {{ $exam->sick15 == 'No' || $exam->sick15 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Tropical Diseases <br>
                                                        (e.g.Malaria,Filariaris <br>
                                                        Schistosomiasis - Specific Date)
                                                        <br><input name="tropical_disease" type="input"
                                                            id="tropical_disease" value="{{ $exam->tropical_disease }}">
                                                    </td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick26" type="radio" class="custom-sm-radio"
                                                            id="sick26" value="1"
                                                            {{ $exam->sick26 == 'Yes' || $exam->sick26 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick26" type="radio" class="custom-sm-radio"
                                                            id="sick26" value="0"
                                                            {{ $exam->sick26 == 'No' || $exam->sick26 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Depression,Other Mental Disorders
                                                    </td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick6" type="radio" class="custom-sm-radio"
                                                            id="sick6" value="1"
                                                            {{ $exam->sick6 == 'Yes' || $exam->sick6 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick6" type="radio" class="custom-sm-radio"
                                                            id="sick6" value="0"
                                                            {{ $exam->sick6 == 'No' || $exam->sick6 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Other Endocrine
                                                        Disorders(e.g.Goiter)
                                                    </td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick16" type="radio" class="custom-sm-radio"
                                                            id="sick16" value="1"
                                                            {{ $exam->sick16 == 'Yes' || $exam->sick16 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick16" type="radio" class="custom-sm-radio"
                                                            id="sick16" value="0"
                                                            {{ $exam->sick16 == 'No' || $exam->sick16 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Asthma<br><input name="asthma"
                                                            type="input" id="asthma" value="{{ $exam->asthma }}">
                                                    </td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick27" type="radio" class="custom-sm-radio"
                                                            id="sick27" value="1"
                                                            {{ $exam->sick27 == 'Yes' || $exam->sick27 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick27" type="radio" class="custom-sm-radio"
                                                            id="sick27" value="0"
                                                            {{ $exam->sick27 == 'No' || $exam->sick27 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Trachoma,Other Eye Disorders</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick7" type="radio" class="custom-sm-radio"
                                                            id="sick7" value="1"
                                                            {{ $exam->sick7 == 'Yes' || $exam->sick7 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick7" type="radio" class="custom-sm-radio"
                                                            id="sick7" value="0"
                                                            {{ $exam->sick7 == 'No' || $exam->sick7 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Cancer or Tumor</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick17" type="radio" class="custom-sm-radio"
                                                            id="sick17" value="1"
                                                            {{ $exam->sick17 == 'Yes' || $exam->sick17 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick17" type="radio" class="custom-sm-radio"
                                                            id="sick17" value="0"
                                                            {{ $exam->sick17 == 'No' || $exam->sick17 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Allergies(Specify)<br><input
                                                            name="allergies" type="input" id="allergies"
                                                            value="{{ $exam->allergies }}"></td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick30" type="radio" class="custom-sm-radio"
                                                            id="sick30" value="1"
                                                            {{ $exam->sick30 == 'Yes' || $exam->sick30 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick30" type="radio" class="custom-sm-radio"
                                                            id="sick30" value="0"
                                                            {{ $exam->sick30 == 'No' || $exam->sick30 == '0' ? 'checked' : null }}>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Deafness, Other Ear Disorders</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick8" type="radio" class="custom-sm-radio"
                                                            id="sick8" value="1"
                                                            {{ $exam->sick8 == 'Yes' || $exam->sick8 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick8" type="radio" class="custom-sm-radio"
                                                            id="sick8" value="0"
                                                            {{ $exam->sick8 == 'No' || $exam->sick8 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Blood Disorders</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick18" type="radio" class="custom-sm-radio"
                                                            id="sick18" value="1"
                                                            {{ $exam->sick18 == 'Yes' || $exam->sick18 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick18" type="radio" class="custom-sm-radio"
                                                            id="sick18" value="0"
                                                            {{ $exam->sick18 == 'No' || $exam->sick18 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td align="center">Operations (Specify)
                                                        <br><input name="operations" type="input" id="operations"
                                                            value="{{ $exam->operations }}">
                                                    </td>
                                                    <td align="center"><label for="checkbox">YES</label>
                                                        <input name="sick31" type="radio" class="custom-sm-radio"
                                                            id="sick31" value="1"
                                                            {{ $exam->sick31 == 'Yes' || $exam->sick31 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick31" type="radio" class="custom-sm-radio"
                                                            id="sick31" value="0"
                                                            {{ $exam->sick31 == 'No' || $exam->sick31 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Nose or Throat Disorders</td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick9" type="radio" class="custom-sm-radio"
                                                            id="sick9" value="1"
                                                            {{ $exam->sick9 == 'Yes' || $exam->sick9 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick9" type="radio" class="custom-sm-radio"
                                                            id="sick9" value="0"
                                                            {{ $exam->sick9 == 'No' || $exam->sick9 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Stomach Pain, Gastritis or Ulcer
                                                    </td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick19" type="radio" class="custom-sm-radio"
                                                            id="sick19" value="1"
                                                            {{ $exam->sick19 == 'Yes' || $exam->sick19 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick19" type="radio" class="custom-sm-radio"
                                                            id="sick19" value="0"
                                                            {{ $exam->sick19 == 'No' || $exam->sick19 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Vaccination
                                                        <br><input name="vaccination" type="input" id="vaccination"
                                                            value="{{ $exam->vaccination }}">
                                                    </td>
                                                    <td width="146" align="center">
                                                        <input name="sick32" type="radio" class="custom-sm-radio"
                                                            id="sick32" value="1"
                                                            {{ $exam->sick32 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">Yes</label>
                                                        <input name="sick32" type="radio" class="custom-sm-radio"
                                                            id="sick32" value="0"
                                                            {{ $exam->sick32 == '0' ? 'checked' : null }}>
                                                        <label for="checkbox">No</label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Tuberculosis <br>
                                                        <input name="tuberculosis" type="text" id="tuberculosis"
                                                            value="{{ $exam->tuberculosis }}">
                                                    </td>
                                                    <td width="90" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick10" type="radio" class="custom-sm-radio"
                                                            id="sick10" value="1"
                                                            {{ $exam->sick10 == 'Yes' || $exam->sick10 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick10" type="radio" class="custom-sm-radio"
                                                            id="sick10" value="0"
                                                            {{ $exam->sick10 == 'No' || $exam->sick10 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Other Abdominal Disorders</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick20" type="radio" class="custom-sm-radio"
                                                            id="sick20" value="1"
                                                            {{ $exam->sick20 == 'Yes' || $exam->sick20 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick20" type="radio" class="custom-sm-radio"
                                                            id="sick20" value="0"
                                                            {{ $exam->sick20 == 'No' || $exam->sick20 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Hepatitis A,B,C</td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick28" type="radio" class="custom-sm-radio"
                                                            id="sick28" value="1"
                                                            {{ $exam->sick28 == 'Yes' || $exam->sick28 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick28" type="radio" class="custom-sm-radio"
                                                            id="sick28" value="0"
                                                            {{ $exam->sick28 == 'No' || $exam->sick28 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Smoking
                                                        <br><input name="smoking" type="input" id="smoking"
                                                            value="{{ $exam->smoking }}">
                                                    </td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick33" type="radio" class="custom-sm-radio"
                                                            id="sick33" value="1"
                                                            {{ $exam->sick33 == 'Yes' || $exam->sick33 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick33" type="radio" class="custom-sm-radio"
                                                            id="sick33" value="0"
                                                            {{ $exam->sick33 == 'No' || $exam->sick33 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Gynaecological Disorders
                                                        <br><input name="gynaecological_disorders" type="input"
                                                            id="gynaecological_disorders"
                                                            value="{{ $exam->gynaecological_disorders }}">
                                                    </td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick21" type="radio" class="custom-sm-radio"
                                                            id="sick21" value="1"
                                                            {{ $exam->sick21 == 'Yes' || $exam->sick21 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick21" type="radio" class="custom-sm-radio"
                                                            id="sick21" value="0"
                                                            {{ $exam->sick21 == 'No' || $exam->sick21 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="132" align="center">Last Menstrual Period
                                                        <br><input name="last_menstrual" type="input"
                                                            id="last_menstrual" value="{{ $exam->last_menstrual }}">
                                                    </td>
                                                    <td width="146" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick29" type="radio" class="custom-sm-radio"
                                                            id="sick29" value="1"
                                                            {{ $exam->sick29 == 'Yes' || $exam->sick29 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick29" type="radio" class="custom-sm-radio"
                                                            id="sick29" value="0"
                                                            {{ $exam->sick29 == 'No' || $exam->sick29 == '0' ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Back Problems</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick34" type="radio" class="custom-sm-radio"
                                                            id="sick34" value="1"
                                                            {{ $exam->sick34 == 'Yes' || $exam->sick34 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick34" type="radio" class="custom-sm-radio"
                                                            id="sick34" value="0"
                                                            {{ $exam->sick34 == 'No' || $exam->sick34 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Thyroid Problems</td>
                                                    <td width="96" align="center"><label for="checkbox">YES</label>
                                                        <input name="sick35" type="radio" class="custom-sm-radio"
                                                            id="sick35" value="1"
                                                            {{ $exam->sick35 == 'Yes' || $exam->sick35 == '1' ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick35" type="radio" class="custom-sm-radio"
                                                            id="sick35" value="0"
                                                            {{ $exam->sick35 == 'No' || $exam->sick35 == '0' ? 'checked' : null }}>
                                                    </td>
                                                    <td width="154" align="center">Amputation</td>
                                                    <td align="center">
                                                        <label for="checkbox">YES</label>
                                                        <input name="sick36" type="radio" class="custom-sm-radio"
                                                            id="sick36" value="1"
                                                            {{ $exam->sick36 == 1 ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick36" type="radio" class="custom-sm-radio"
                                                            id="sick36" value="0"
                                                            {{ $exam->sick36 == 0 ? 'checked' : null }}>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="154" align="center">Infectious/contagious diseases</td>
                                                    <td align="center">
                                                        <label for="checkbox">YES</label>
                                                        <input name="sick37" type="radio" class="custom-sm-radio"
                                                            id="sick37" value="1"
                                                            {{ $exam->sick37 == 1 ? 'checked' : null }}>
                                                        <label for="checkbox">NO</label>
                                                        <input name="sick37" type="radio" class="custom-sm-radio"
                                                            id="sick37" value="0"
                                                            {{ $exam->sick37 == 0 ? 'checked' : null }}>
                                                    </td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Others</td>
                                                    <td colspan="5">
                                                        <textarea name="others" cols="20" rows="2" id="others" class="form-control">{{ $exam->others }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">
                                                        If any of the above questions were answered “yes,” please give
                                                        details.
                                                        <textarea name="specify" cols="20" rows="2" id="specify" class="form-control">{{ $exam->specify }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab11" role="tabpanel" aria-labelledby="base-tab11">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="5"
                                            class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td width="525" height="88" colspan="4" valign="top">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="2">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="20">&nbsp;</td>
                                                                    <td height="20" valign="bottom">1.Have you ever
                                                                        been
                                                                        signed off as sick or repatriated from a ship?
                                                                    </td>
                                                                    <td width="48" align="center" valign="bottom">
                                                                        <input name="question1" type="radio"
                                                                            class="custom-sm-radio" id="question1"
                                                                            value="1"
                                                                            {{ $exam->question1 == 'Yes' || $exam->question1 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td width="43" align="center" valign="bottom">
                                                                        <input name="question1" type="radio"
                                                                            class="custom-sm-radio" id="question1"
                                                                            value="0"
                                                                            {{ $exam->question1 == 'No' || $exam->question1 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>2. Have you ever been hospitalized?</td>
                                                                    <td align="center"><input name="question2"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question2" value="1"
                                                                            {{ $exam->question2 == 'Yes' || $exam->question2 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question2"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question2" value="0"
                                                                            {{ $exam->question2 == 'No' || $exam->question2 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>3.Have you ever been declared unfit sea duty?
                                                                    </td>
                                                                    <td align="center"><input name="question3"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question3" value="1"
                                                                            {{ $exam->question3 == 'Yes' || $exam->question3 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question3"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question3" value="0"
                                                                            {{ $exam->question3 == 'No' || $exam->question3 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>4.Has your medical certificate ever been
                                                                        restricted
                                                                        or revoked?</td>
                                                                    <td align="center"><input name="question4"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question4" value="1"
                                                                            {{ $exam->question4 == 'Yes' || $exam->question4 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question4"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question4" value="0"
                                                                            {{ $exam->question4 == 'No' || $exam->question4 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="15">&nbsp;</td>
                                                                    <td width="434">5.Are you aware that you have any
                                                                        medical problem, disease or illness?</td>
                                                                    <td align="center"><input name="question5"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question5" value="1"
                                                                            {{ $exam->question5 == 'Yes' || $exam->question5 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question5"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question5" value="0"
                                                                            {{ $exam->question5 == 'No' || $exam->question5 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>6.Do you feel healthy and fit to perform the
                                                                        duties
                                                                        of your designated position/occupation?</td>
                                                                    <td align="center"><input name="question6"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question6" value="1"
                                                                            {{ $exam->question6 == 'Yes' || $exam->question6 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question6"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question6" value="0"
                                                                            {{ $exam->question6 == 'No' || $exam->question6 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>7.Are you allergic to any medication?</td>
                                                                    <td align="center"><input name="question7"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question7" value="1"
                                                                            {{ $exam->question7 == 'Yes' || $exam->question7 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center"><input name="question7"
                                                                            type="radio" class="custom-sm-radio"
                                                                            id="question7" value="0"
                                                                            {{ $exam->question7 == 'No' || $exam->question7 == '0' ? 'checked' : null }}>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>&nbsp;</td>
                                                                    <td>Comments:
                                                                        <textarea name="comments" cols="40" rows="2" id="comments" class="form-control">{{ $exam->comments }}</textarea>
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
                                                                        <textarea name="purpose" cols="40" rows="2" id="purpose" class="form-control">{{ $exam->purpose }}</textarea>
                                                                    </td>
                                                                    <td align="center" valign="top"><input
                                                                            name="question8" type="radio"
                                                                            class="custom-sm-radio" id="question8"
                                                                            value="1"
                                                                            {{ $exam->question8 == 'Yes' || $exam->question8 == '1' ? 'checked' : null }}>
                                                                    </td>
                                                                    <td align="center" valign="top"><input
                                                                            name="question8" type="radio"
                                                                            class="custom-sm-radio" id="question8"
                                                                            value="0"
                                                                            {{ $exam->question8 == 'No' || $exam->question8 == '0' ? 'checked' : null }}>
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
                                                            <textarea name="details" cols="15" rows="18" id="details" class="form-control">{{ $exam->details }}</textarea>
                                                        </b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab12" role="tabpanel" aria-labelledby="base-tab12">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                            class="table-sm table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td height="31">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p><b>PAST PEME</b>: (Where was the last PEME, what were the
                                                                    Findings,when)</p>
                                                                <textarea name="past_peme" cols="10" rows="2" id="past_peme" class="form-control">{{ $exam->past_peme }}</textarea>
                                                            </div>
                                                            @if (
                                                                !in_array(session()->get('position'), [
                                                                    'Cashier',
                                                                    'Releasing',
                                                                    'Human Resource / Documentation Officer',
                                                                    '""',
                                                                    'Information Clerk',
                                                                    'Nurse',
                                                                    'Asst accounant',
                                                                ]))
                                                                <div class="col-md-6">
                                                                    <p><b>PAST PEME RECOMMENDATION</b></p>
                                                                    <textarea name="past_peme_recommendation" cols="10" rows="2" id="past_peme_recommendation"
                                                                        class="form-control">{{ $exam->past_peme_recommendation }}</textarea>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="15">
                                                        <p><b>FAMILY HISTORY:</b> (To be Filled up by the Historian.)
                                                        </p>
                                                        <textarea name="family_history" cols="10" rows="2" id="family_history" class="form-control">{{ $exam->family_history }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="16">
                                                        <p><b>PRESENT ILLNESS</b> :</p>
                                                        <p>
                                                            <textarea name="present_illness" cols="10" rows="2" id="present_illness" class="form-control">{{ $exam->present_illness }}</textarea>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="31">
                                                        <p><b>SOCIAL HISTORY</b>: (SMOKING,ALCOHOL DRUGS,DIETARY HABITS)
                                                            To
                                                            be filled up the Historian.</p>
                                                        <textarea name="social_history" cols="10" rows="2" id="social_history" class="form-control">{{ $exam->social_history }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="31">
                                                        <p><b>OB AND GYNECOLOGIC HISTORY:</b> (For female patients.)</p>
                                                        <textarea name="gynecologic_history" cols="10" rows="2" id="gynecologic_history" class="form-control">{{ $exam->gynecologic_history }}</textarea>
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
                                                        <textarea name="occupational_history" cols="20" rows="2" id="occupational_history" class="form-control">{{ $exam->occupational_history }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="31">
                                                        <p><b>REVIEW OF SYMPTOMS: </b>Please pay particular attention to
                                                            the
                                                            present symptoms and if there are medications being taken.
                                                        </p>
                                                        <textarea name="symptoms" cols="20" rows="2" id="symptoms" class="form-control">{{ $exam->symptoms }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>OTHER PERTINENT INFORMATION:</b> To be filled up by the
                                                        historian. ( OLD MEDICAL RECORD; if patient is re-medical)
                                                        <p></p>
                                                        <textarea name="pertinent_info" cols="20" rows="2" id="pertinent_info" class="form-control">{{ $exam->pertinent_info }}</textarea>
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
                                                        <table width="100%" cellspacing="0" cellpadding="0"
                                                            class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <h2>Vital Signs</h2>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td valign="center" width="65%">
                                                                        <div class="row">
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="form-label">Height</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $exam ? $exam->height : null }}"
                                                                                        name="height" id="height"
                                                                                        onkeyup="computeBMI();">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="form-label">Weight</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $exam ? $exam->weight : null }}"
                                                                                        name="weight" id="weight"
                                                                                        onkeyup="computeBMI();">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group">
                                                                                    <label class="form-label">BMI</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $exam ? $exam->bmi : null }}"
                                                                                        name="bmi" id="bmi">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-3">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        class="form-label">Waist</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        value="{{ $exam ? $exam->waist : null }}"
                                                                                        name="waist" id="waist">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <label for=""
                                                                            class="form-label">Recommendation</label>
                                                                        <textarea name="bmi_recommendation" id="bmi_recommendation" cols="30" rows="2"
                                                                            class="form-control">{{ $exam->bmi_recommendation }}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label
                                                                                    class="form-label">Systollic</label>
                                                                                <input name="systollic" type="text"
                                                                                    class="form-control" id="systollic"
                                                                                    placeholder="Systollic"
                                                                                    value="{{ $exam->systollic }}"
                                                                                    size="10">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label
                                                                                    class="form-label">Diastollic</label>
                                                                                <input name="diastollic" type="text"
                                                                                    class="form-control" id="diastollic"
                                                                                    placeholder="Diastollic"
                                                                                    value="{{ $exam->diastollic }}"
                                                                                    size="10">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="form-label">Blood Pressure
                                                                                    (sitting)</label>
                                                                                <input name="bp_sitting" type="text"
                                                                                    class="form-control" id="bp_sitting"
                                                                                    placeholder="BP Sitting"
                                                                                    value="{{ $exam->bp_sitting }}"
                                                                                    size="10">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label class="form-label">Blood Pressure
                                                                                    (laying down)</label>
                                                                                <input name="bp_laying_down"
                                                                                    type="text" class="form-control"
                                                                                    id="bp_laying_down"
                                                                                    placeholder="BP Laying Down"
                                                                                    value="{{ $exam->bp_laying_down }}"
                                                                                    size="10">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <label for=""
                                                                            class="form-label">Recommendation</label>
                                                                        <textarea name="bp_recommendation" id="bp_recommendation" cols="30" rows="2" class="form-control">{{ $exam->bp_recommendation }}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">Pulse
                                                                                    Rate</label>
                                                                                <input name="pulse" type="text"
                                                                                    class="form-control" id="pulse"
                                                                                    value="{{ $exam->pulse }}"
                                                                                    size="5">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">Rhythm</label>
                                                                                <input name="rhythm" type="text"
                                                                                    id="rhythm" value="NORMAL"
                                                                                    size="10" class="form-control"
                                                                                    value="{{ $exam->rhythm }}">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <label for=""
                                                                            class="form-label">Recommendation</label>
                                                                        <textarea name="pulse_rhythm_recommendation" id="pulse_rhythm_recommendation" cols="30" rows="2"
                                                                            class="form-control">{{ $exam->pulse_rhythm_recommendation }}</textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label
                                                                                    class="form-label">Respiration</label>
                                                                                <input name="respiration" type="text"
                                                                                    class="form-control"
                                                                                    id="respiration"
                                                                                    value="{{ $exam->respiration }}"
                                                                                    size="5">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label
                                                                                    class="form-label">Expiration</label>
                                                                                <input name="expiration" type="text"
                                                                                    class="form-control" id="expiration"
                                                                                    value="{{ $exam->expiration }}">
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <label for=""
                                                                            class="form-label">Recommendation</label>
                                                                        <textarea name="respiration_recommendation" id="respiration_recommendation" cols="30" rows="2"
                                                                            class="form-control">{{ $exam->respiration_recommendation }}</textarea>
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
                                        <div class="my-1">Alongside columns A,B,C put check mark(✔) under "YES" if
                                            Normal. If not Normal, specify findings</div>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <td width="140" height="37" align="center"><b>A</b></td>
                                                    <td width="29" align="center">YES</td>
                                                    <td align="center">Significant Findings </td>
                                                    <td align="center">Recommendations</td>
                                                    <td width="135" align="center"><b>B</b></td>
                                                    <td width="29" align="center">YES</td>
                                                    <td align="center">Significant Findings </td>
                                                    <td align="center">Recommendations</td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="38" align="center">Skin</td>
                                                    <td width="29" align="center"><input value="Yes"
                                                            name="a1" type="checkbox" id="a1"
                                                            {{ $exam->a1 == 'Yes' ? 'checked' : '' }}></td>
                                                    <td align="center"><input name="a1_findings" type="text"
                                                            id="a1_findings" value="{{ $exam->a1_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a1_recommendations" type="text"
                                                            id="a1_recommendations"
                                                            value="{{ $exam->a1_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Neck, Lymph Node,Thyroid</td>
                                                    <td width="146" align="center"><input value="Yes"
                                                            name="b1" type="checkbox" id="b1"
                                                            {{ $exam->b1 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b1_findings" type="text"
                                                            id="b1_findings" value="{{ $exam->b1_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b1_recommendations" type="text"
                                                            id="b1_recommendations"
                                                            value="{{ $exam->b1_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="36" align="center">Head, Neck,Scalp
                                                    </td>
                                                    <td width="29" align="center"><input value="Yes"
                                                            name="a2" type="checkbox" id="a2"
                                                            {{ $exam->a2 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a2_findings" type="text"
                                                            id="a2_findings" value="{{ $exam->a2_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a2_recommendations" type="text"
                                                            id="a2_recommendations"
                                                            value="{{ $exam->a2_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Neurology</td>
                                                    <td width="146" align="center"><input name="b7"
                                                            type="checkbox" id="b7" value="Yes"
                                                            {{ $exam->b7 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b2_findings" type="text"
                                                            id="b2_findings" value="{{ $exam->b2_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b2_recommendations" type="text"
                                                            id="b2_recommendations"
                                                            value="{{ $exam->b2_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="33" align="center">Eyes(external)
                                                    </td>
                                                    <td width="29" align="center"><input name="a3"
                                                            type="checkbox" id="a3" value="Yes"
                                                            {{ $exam->a3 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a3_findings" type="text"
                                                            id="a3_findings" value="{{ $exam->a3_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a3_recommendations" type="text"
                                                            id="a3_recommendations"
                                                            value="{{ $exam->a3_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Breast,Axilla</td>
                                                    <td width="146" align="center"><input name="b2"
                                                            type="checkbox" id="b2" value="Yes"
                                                            {{ $exam->b2 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b3_findings" type="text"
                                                            id="b3_findings" value="{{ $exam->b3_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b3_recommendations" type="text"
                                                            id="b3_recommendations"
                                                            value="{{ $exam->b3_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="34" align="center">Pupils</td>
                                                    <td width="29" align="center"><input name="a4"
                                                            type="checkbox" id="a4" value="Yes"
                                                            {{ $exam->a4 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a4_findings" type="text"
                                                            id="a4_findings" value="{{ $exam->a4_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a4_recommendations" type="text"
                                                            id="a4_recommendations"
                                                            value="{{ $exam->a4_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Chest and Lungs</td>
                                                    <td width="146" align="center"><input name="b3"
                                                            type="checkbox" id="b3" value="Yes"
                                                            {{ $exam->b3 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b4_findings" type="text"
                                                            id="b4_findings" value="{{ $exam->b4_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b4_recommendations" type="text"
                                                            id="b4_recommendations"
                                                            value="{{ $exam->b4_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="34" align="center">Ears</td>
                                                    <td width="29" align="center"><input name="a5"
                                                            type="checkbox" id="a5" value="Yes"
                                                            {{ $exam->a5 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a5_findings" type="text"
                                                            id="a5_findings" value="{{ $exam->a5_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a5_recommendations" type="text"
                                                            id="a5_recommendations"
                                                            value="{{ $exam->a5_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Heart</td>
                                                    <td width="146" align="center"><input name="b4"
                                                            type="checkbox" id="b4" value="Yes"
                                                            {{ $exam->b4 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b5_findings" type="text"
                                                            id="b5_findings" value="{{ $exam->b5_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b5_recommendations" type="text"
                                                            id="b5_recommendations"
                                                            value="{{ $exam->b5_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="37" align="center">Nose,Sinuses</td>
                                                    <td width="29" align="center"><input name="a6"
                                                            type="checkbox" id="a6" value="Yes"
                                                            {{ $exam->a6 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a6_findings" type="text"
                                                            id="a6_findings" value="{{ $exam->a6_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a6_recommendations" type="text"
                                                            id="a6_recommendations"
                                                            value="{{ $exam->a6_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Abdomen,Liver,Spleen</td>
                                                    <td width="146" align="center"><input name="b5"
                                                            type="checkbox" id="b5" value="Yes"
                                                            {{ $exam->b5 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b6_findings" type="text"
                                                            id="b6_findings" value="{{ $exam->b6_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b6_recommendations" type="text"
                                                            id="b6_recommendations"
                                                            value="{{ $exam->b6_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="140" height="14" align="center">Mouth,Throat</td>
                                                    <td width="29" align="center"><input name="a7"
                                                            type="checkbox" id="a7" value="Yes"
                                                            {{ $exam->a7 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="a7_findings" type="text"
                                                            id="a7_findings" value="{{ $exam->a7_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="a7_recommendations" type="text"
                                                            id="a7_recommendations"
                                                            value="{{ $exam->a7_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td width="135" align="center">Back</td>
                                                    <td width="146" align="center"><input name="b6"
                                                            type="checkbox" id="b6" value="Yes"
                                                            {{ $exam->b6 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="b7_findings" type="text"
                                                            id="b7_findings" value="{{ $exam->b7_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="b7_recommendations" type="text"
                                                            id="b7_recommendations"
                                                            value="{{ $exam->b7_recommendations }}" size="10"
                                                            class="form-control">
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
                                                    <td align="center">Recommendations</td>
                                                    <td align="center">&nbsp;</td>
                                                    <td align="center">YES</td>
                                                    <td align="center">Significant Findings</td>
                                                    <td align="center">Recommendations</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Anus-Rectum</td>
                                                    <td align="center">
                                                        <input name="c1" type="checkbox" id="c1"
                                                            value="Yes" {{ $exam->c1 == 'Yes' ? 'checked' : '' }} />
                                                    </td>
                                                    <td align="center">
                                                        <input name="c1_findings" type="text" id="c1_findings"
                                                            value="{{ $exam->c1_findings }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td align="center">
                                                        <input name="c1_recommendations" type="text"
                                                            id="c1_recommendations"
                                                            value="{{ $exam->c1_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td align="center">Genito-Urinary System</td>
                                                    <td align="center"><input name="c2" type="checkbox"
                                                            id="c2" value="Yes"
                                                            {{ $exam->c2 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="c2_findings" type="text"
                                                            id="c2_findings" value="{{ $exam->c2_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="c2_recommendations" type="text"
                                                            id="c2_recommendations"
                                                            value="{{ $exam->c2_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Inguinals,Genitals</td>
                                                    <td align="center"><input name="c3" type="checkbox"
                                                            id="c3" value="Yes"
                                                            {{ $exam->c3 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="c3_findings" type="text"
                                                            id="c3_findings" value="{{ $exam->c3_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="c3_recommendations" type="text"
                                                            id="c3_recommendations"
                                                            value="{{ $exam->c2_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td align="center">Extremities</td>
                                                    <td align="center"><input name="c4" type="checkbox"
                                                            id="c4" value="Yes"
                                                            {{ $exam->c4 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="c4_findings" type="text"
                                                            id="c4_findings" value="{{ $exam->c4_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="c4_recommendations" type="text"
                                                            id="c4_recommendations"
                                                            value="{{ $exam->c4_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center">Reflexes</td>
                                                    <td align="center"><input name="c5" type="checkbox"
                                                            id="c5" value="Yes"
                                                            {{ $exam->c5 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="c5_findings" type="text"
                                                            id="c5_findings" value="{{ $exam->c5_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="c5_recommendations" type="text"
                                                            id="c5_recommendations"
                                                            value="{{ $exam->c5_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                    <td align="center">Dental(Teeth/Gums)</td>
                                                    <td align="center"><input name="c6" type="checkbox"
                                                            id="c6" value="Yes"
                                                            {{ $exam->c6 == 'Yes' ? 'checked' : '' }}>
                                                    </td>
                                                    <td align="center"><input name="c6_findings" type="text"
                                                            id="c6_findings" value="{{ $exam->c6_findings }}"
                                                            size="10" class="form-control">
                                                    </td>
                                                    <td align="center"><input name="c6_recommendations" type="text"
                                                            id="c6_recommendations"
                                                            value="{{ $exam->c6_recommendations }}" size="10"
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" align="center">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab14" role="tabpanel"
                                        aria-labelledby="base-tab14">
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                            class="table table-bordered table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td height="21" colspan="4"><b>RESULTS OF ANCILLARY
                                                            EXAMINATIONS</b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="16%" height="21">A.CHEST XRAY</td>
                                                    <td width="13%" height="21">
                                                        <input name="chest" type="radio" class="custom-sm-radio"
                                                            id="radio88" value="normal"
                                                            {{ $exam->chest == 'normal' ? 'checked' : null }} />
                                                        Normal
                                                    </td>
                                                    <td height="21" colspan="2">
                                                        <input name="chest" type="radio" class="custom-sm-radio"
                                                            id="radio89" value="findings"
                                                            @if ($exam) {{ $exam->chest == 'findings' ? 'checked' : null }} @endif>
                                                        With Findings
                                                        <textarea class="form-control" name="xray_findings">{{ $exam_xray && $exam_xray->remarks_status == 'findings' ? $exam_xray->remarks : null }}</textarea>
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td height="21">B.ECG</td>
                                                    <td height="21"><input name="ecg" type="radio"
                                                            class="custom-sm-radio" id="radio90" value="normal"
                                                            {{ $exam->ecg == 'normal' ? 'checked' : null }}>
                                                        Normal</td>
                                                    <td height="21" colspan="2"><input name="ecg"
                                                            type="radio" class="custom-sm-radio" id="radio91"
                                                            value="findings"
                                                            {{ $exam->ecg == 'findings' ? 'checked' : null }}>
                                                        With Findings
                                                        <textarea class="form-control" name="ecg_findings">{{ nl2br($exam->ecg_findings) }}</textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="21">C.CBC</td>
                                                    <td height="21"><input name="cbc" type="radio"
                                                            class="custom-sm-radio" id="radio92" value="normal"
                                                            {{ $exam->ecg == 'normal' ? 'checked' : null }}>
                                                        Normal</td>
                                                    <td height="21" colspan="2"><input name="cbc"
                                                            type="radio" class="custom-sm-radio" id="radio93"
                                                            value="findings"
                                                            {{ $exam->ecg == 'findings' ? 'checked' : null }}>
                                                        With Findings
                                                    </td>
                                                </tr>




                                                <tr>
                                                    <td height="21">D.URINALYSIS</td>
                                                    <td height="21"><input name="urinalysis" type="radio"
                                                            class="custom-sm-radio" id="radio94" value="normal"
                                                            {{ $exam->urinalysis == 'normal' ? 'checked' : null }}>
                                                        Normal</td>
                                                    <td height="21" colspan="2"><input name="urinalysis"
                                                            type="radio" class="custom-sm-radio" id="radio95"
                                                            value="findings"
                                                            {{ $exam->urinalysis == 'findings' ? 'checked' : null }}>
                                                        With Findings
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td height="21">E.STOOL EXAM</td>
                                                    <td height="21"><input name="stool" type="radio"
                                                            class="custom-sm-radio" id="radio96" value="normal"
                                                            {{ $exam->stool == 'normal' ? 'checked' : null }}>
                                                        Normal
                                                    </td>
                                                    <td height="21" colspan="2"><input name="stool"
                                                            type="radio" class="custom-sm-radio" id="radio97"
                                                            value="findings"
                                                            {{ $exam->stool == 'findings' ? 'checked' : null }}>
                                                        With Findings
                                                    </td>
                                                </tr>


                                                <tr>
                                                    <td height="21">F.HEPATITIS B</td>
                                                    <td height="21"><input name="hepa_b" type="radio"
                                                            class="custom-sm-radio" id="radio99"
                                                            value="Non Reactive"
                                                            {{ $exam->hepa_b == 'Non Reactive' ? 'checked' : null }}>
                                                        Non-Reactive </td>
                                                    <td height="21"><input name="hepa_b" colspan="2"
                                                            type="radio" id="radio98" class="custom-sm-radio"
                                                            value="Reactive"
                                                            {{ $exam->hepa_b == 'Reactive' ? 'checked' : null }}>
                                                        Reactive</td>
                                                </tr>


                                                <tr>
                                                    <td height="21">G.HIV/AID TEST</td>
                                                    <td height="21"><input name="hiv" type="radio"
                                                            id="radio101" class="custom-sm-radio"
                                                            value="Non Reactive"
                                                            {{ $exam->hiv == 'Non Reactive' ? 'checked' : null }}>
                                                        Non-Reactive </td>
                                                    <td height="21" colspan="2"><input name="hiv"
                                                            type="radio" id="radio100" class="custom-sm-radio"
                                                            value="Reactive"
                                                            {{ $exam->hiv == 'Reactive' ? 'checked' : null }}>
                                                        Reactive </td>

                                                </tr>


                                                <tr>
                                                    <td height="21">H.RPR</td>
                                                    <td height="21"><input name="rph" type="radio"
                                                            id="radio103" class="custom-sm-radio"
                                                            value="Non Reactive"
                                                            {{ $exam->rph == 'Non Reactive' ? 'checked' : null }}>
                                                        Non-Reactive </td>
                                                    <td height="21" colspan="2"><input name="rph"
                                                            type="radio" id="radio102" class="custom-sm-radio"
                                                            value="Reactive"
                                                            {{ $exam->rph == 'Reactive' ? 'checked' : null }}>
                                                        Reactive </td>

                                                </tr>

                                                <tr>
                                                    <td height="21">PSYCHOLOGICAL TEST</td>
                                                    <td height="21"><input name="psychological" type="radio"
                                                            id="radio104" class="custom-sm-radio" value="normal"
                                                            {{ $exam->psychological == 'normal' ? 'checked' : null }}>
                                                        Normal</td>
                                                    <td height="21" colspan="2"><input name="psychological"
                                                            type="radio" class="custom-sm-radio" id="radio105"
                                                            value="evaluation"
                                                            {{ $exam->psychological == 'evaluation' ? 'checked' : null }}>
                                                        For Further Evaluation</td>
                                                </tr>

                                                <tr>
                                                    <td height="21">BLOOD TYPE</td>
                                                    <td height="21" colspan="3">
                                                        <input type="text" name="blood_type" class="form-control"
                                                            value="{{ $exam_hema ? $exam_hema->blood : null }}">
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
                                                        <textarea name="additional_labtest" cols="70" rows="2" id="additional_labtest"
                                                            class="form-control">{{ $exam->additional_labtest }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab15" role="tabpanel"
                                        aria-labelledby="base-tab15">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                            class="table table-bordered table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td width="387" height="39">Basic DOH Mandatory Medical
                                                        Examinations:
                                                    </td>
                                                    <td width="203"><input name="summary_medexam" type="radio"
                                                            class="custom-sm-radio" id="summary_medexam"
                                                            value="passed"
                                                            {{ $exam->summary_medexam == 'passed' ? 'checked' : null }} />
                                                        PASSED</td>
                                                    <td width="651"><input name="summary_medexam" type="radio"
                                                            class="custom-sm-radio" id="summary_medexam"
                                                            value="findings"
                                                            {{ $exam->summary_medexam == 'findings' ? 'checked' : null }} />
                                                        WITH SIGNIFICANT FINDINGS</td>
                                                </tr>
                                                <tr>
                                                    <td width="387" height="39">Additional Laboratory Test:
                                                    </td>
                                                    <td width="203"><input name="summary_labtest" type="radio"
                                                            class="custom-sm-radio" id="summary_labtest"
                                                            value="passed"
                                                            {{ $exam->summary_labtest == 'passed' ? 'checked' : null }}>
                                                        PASSED</td>
                                                    <td width="651"><input name="summary_labtest" type="radio"
                                                            class="custom-sm-radio" id="summary_labtest"
                                                            value="findings"
                                                            {{ $exam->summary_labtest == 'findings' ? 'checked' : null }}>
                                                        WITH SIGNIFICANT FINDINGS</td>
                                                </tr>
                                                <tr>
                                                    <td width="387" height="39">Flag Host Medical and
                                                        Laboratory
                                                        Requirments:</td>
                                                    <td width="203"><input name="summary_labrequirements"
                                                            type="radio" class="custom-sm-radio"
                                                            id="summary_labrequirements" value="passed"
                                                            {{ $exam->summary_labrequirements == 'passed' ? 'checked' : null }}>
                                                        PASSED</td>
                                                    <td width="651"><input name="summary_labrequirements"
                                                            type="radio" class="custom-sm-radio"
                                                            id="summary_labrequirements" value="findings"
                                                            {{ $exam->summary_labrequirements == 'findings' ? 'checked' : null }}>
                                                        WITH SIGNIFICANT FINDINGS</td>
                                                </tr>
                                                <tr>
                                                    <td height="20" colspan="3">
                                                        <p><b>REMARKS/SPECIAL NEEDS</b>
                                                            <input name="remarks_status" type="radio"
                                                                class="custom-sm-radio" class="m-1"
                                                                id="remarks_status_0" value="normal"
                                                                {{ $exam->remarks_status == 'normal' ? 'checked' : null }}>Normal
                                                            <input name="remarks_status" type="radio"
                                                                class="custom-sm-radio" class="m-1"
                                                                id="remarks_status_1" value="findings"
                                                                {{ $exam->remarks_status == 'findings' ? 'checked' : null }}>With
                                                            Findings
                                                        </p>
                                                        <textarea name="remarks" cols="70" rows="3" id="remarks" class="form-control">{{ $exam->remarks }}</textarea>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody>
                                                <tr>
                                                    <td height="39" colspan="3">
                                                        <table width="100%" border="0" cellpadding="0"
                                                            cellspacing="0" class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="29" colspan="5" align="center">
                                                                        <div class="box box-success box-solid">
                                                                            <div class="box-header with-border">
                                                                                <h3 class="box-title"
                                                                                    style="float: left">
                                                                                    ASSESSMENT OF FITNESS</h3>
                                                                                <br>
                                                                                <br>
                                                                                On the basis of the examinee's personal
                                                                                declaration, my clinical examination and
                                                                                diagnostic test results recorded above,
                                                                                ideclare the examinee medically
                                                                            </div>
                                                                            <div class="box-body">
                                                                                <table class="table table-bordered">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td height="29">
                                                                                                <table width="75%"
                                                                                                    border="0">
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
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="duty"
                                                                                                                    value="Fit"
                                                                                                                    {{ $exam->duty == 'Fit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td width="16%"
                                                                                                                align="center">
                                                                                                                UNFIT
                                                                                                                <input
                                                                                                                    name="duty"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="duty"
                                                                                                                    value="Unfit"
                                                                                                                    {{ $exam->duty == 'Unfit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                FIT
                                                                                                                RESTRICTION
                                                                                                                <input
                                                                                                                    name="duty"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="duty"
                                                                                                                    value="Fit Restriction"
                                                                                                                    {{ $exam->duty == 'Fit Restriction' ? 'checked' : null }}>
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
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="fit"
                                                                                                                    id="fit"
                                                                                                                    value="Fit"
                                                                                                                    {{ $exam->fit == 'Fit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                UNFIT
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="fit"
                                                                                                                    id="fit"
                                                                                                                    value="Unfit"
                                                                                                                    {{ $exam->fit == 'Unfit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td width="22%"
                                                                                                                align="center">
                                                                                                                <span
                                                                                                                    style="font-size: 14px">Unfit
                                                                                                                    Temporarily</span>
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="fit"
                                                                                                                    id="fit"
                                                                                                                    value="Unfit_temp"
                                                                                                                    {{ $exam->fit == 'Unfit_temp' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td width="23%"
                                                                                                                align="center">
                                                                                                                <span
                                                                                                                    style="font-size: 14px">Pending</span>
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="fit"
                                                                                                                    id="fit"
                                                                                                                    value="Pending"
                                                                                                                    {{ $exam->fit == 'Pending' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                <b>RESULT</b>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                FIT TO WORK
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="fit"
                                                                                                                    value="fit"
                                                                                                                    {{ $exam->seastatus == 'fit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                FIT FOR SEA
                                                                                                                DUTY
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="seafit"
                                                                                                                    value="seafit"
                                                                                                                    {{ $exam->seastatus == 'seafit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                FIT FOR
                                                                                                                TRAINING
                                                                                                                PURPOSES
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="trainingfit"
                                                                                                                    value="trainingfit"
                                                                                                                    {{ $exam->seastatus == 'trainingfit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                FIT WITH
                                                                                                                RESTRICTION
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="seafit with restriction"
                                                                                                                    value="seafit with restriction"
                                                                                                                    {{ $exam->seastatus == 'seafit with restriction' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                UNFIT
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="seaunfit"
                                                                                                                    value="seaunfit"
                                                                                                                    {{ $exam->seastatus == 'seaunfit' ? 'checked' : null }}>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                Pending
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="seastatus"
                                                                                                                    id="seapending"
                                                                                                                    value="seapending"
                                                                                                                    {{ $exam->seastatus == 'seapending' ? 'checked' : null }}>
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
                                                                                                    border="0">
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
                                                                                                                        <?= initOptionTbl('list_tier2', 'id', 'choices', $exam->tier2_id, 1) ?>
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
                                                                                                                        <?= initOptionTbl('list_tier3', 'id', 'choices', $exam->tier3_id, 1) ?>
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
                                                                                                                        <?= initOptionTbl('list_tier4', 'id', 'choices', $exam->tier4_id, 1) ?>
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
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="visual_required"
                                                                                                                    id="visual_required0"
                                                                                                                    value="Spectacles"
                                                                                                                    {{ in_array($exam->visual_required, ['Spectacles', 'spectacles']) ? 'checked' : '' }} />
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                CONTACT
                                                                                                                LENSES
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="visual_required"
                                                                                                                    id="visual_required1"
                                                                                                                    value="Contact Lenses"
                                                                                                                    {{ in_array($exam->visual_required, ['Contact Lenses', 'contact lenses']) ? 'checked' : null }} />
                                                                                                            </td>
                                                                                                            <td
                                                                                                                align="center">
                                                                                                                NONE
                                                                                                                <input
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    name="visual_required"
                                                                                                                    id="visual_required2"
                                                                                                                    value=""
                                                                                                                    {{ $exam->visual_required == '' ? 'checked' : null }} />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="center">
                                                                                                <table class
                                                                                                    border="1">
                                                                                                    <tbody>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                width="23%">
                                                                                                                <b>WITHOUT
                                                                                                                    RESTRICTIONS</b>
                                                                                                                <input
                                                                                                                    name="restriction"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="restriction"
                                                                                                                    value="without restriction"
                                                                                                                    {{ $exam->restriction == 'without restriction' ? 'checked' : null }} />
                                                                                                            </td>
                                                                                                            <td>
                                                                                                                <b>WITH
                                                                                                                    RESTRICTIONS</b>
                                                                                                                <input
                                                                                                                    name="restriction"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="restriction"
                                                                                                                    value="with restriction"
                                                                                                                    {{ $exam->restriction == 'with restriction' ? 'checked' : null }} />
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                colspan="2">
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
                                                                                                                    <textarea name="describe_restriction" cols="70" rows="3" style="border-color: green"
                                                                                                                        id="describe_restriction" class="form-control">{{ $exam->describe_restriction }}</textarea>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                colspan="2">
                                                                                                                <div
                                                                                                                    class="col-md-12">
                                                                                                                    <b>Comments/Restriction/Prescription</b>
                                                                                                                    <textarea name="comments_restriction" cols="70" rows="3" class="form-control">{{ $exam->comments_restriction }}</textarea>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                colspan="2">
                                                                                                                <div
                                                                                                                    class="col-md-12">
                                                                                                                    <b>Hologram
                                                                                                                        Number</b>
                                                                                                                    <textarea name="progressive_notes" rows="3" id="progressive_notes" class="form-control">{{ $exam->progressive_notes }}</textarea>
                                                                                                                </div>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td
                                                                                                                colspan="2">
                                                                                                                <div
                                                                                                                    class="col-md-12">
                                                                                                                    <b>Liberian
                                                                                                                        Certification
                                                                                                                        Code</b>
                                                                                                                    <input
                                                                                                                        name="liberian_code"
                                                                                                                        value="{{ $exam->liberian_code }}"
                                                                                                                        rows="3"
                                                                                                                        id="liberian_code"
                                                                                                                        class="form-control" />
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
                                                                                                            <td width="23%"
                                                                                                                colspan="3">
                                                                                                                <b>NORMAL</b>
                                                                                                                <input
                                                                                                                    name="remarks_status"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="remarks_status"
                                                                                                                    value="normal"
                                                                                                                    {{ $exam->remarks_status == 'normal' ? 'checked' : '' }}
                                                                                                                    <br>
                                                                                                                &nbsp;&nbsp;&nbsp;<b>WITH
                                                                                                                    FINDINGS</b>
                                                                                                                <input
                                                                                                                    name="remarks_status"
                                                                                                                    type="radio"
                                                                                                                    class="custom-sm-radio"
                                                                                                                    id="remarks_status"
                                                                                                                    value="findings"
                                                                                                                    {{ $exam->remarks_status == 'findings' ? 'checked' : '' }}
                                                                                                                    </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td width="45%"
                                                                                                                align="left">
                                                                                                                <b>Findings</b>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                width="34%">
                                                                                                                <b>Recommendations</b>
                                                                                                            </td>
                                                                                                            <td width="21%"
                                                                                                                align="center">
                                                                                                                &nbsp;
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                        <tr>
                                                                                                            <td align="left"
                                                                                                                valign="middle">
                                                                                                                <span
                                                                                                                    class="col-md-8">
                                                                                                                    <textarea name="finding" rows="5" class="form-control" id="finding">{{ $exam->finding }}</textarea>
                                                                                                                </span>
                                                                                                            </td>
                                                                                                            <td valign="middle"
                                                                                                                colspan="2">
                                                                                                                <span
                                                                                                                    class="col-md-8">
                                                                                                                    <textarea name="recommendations" rows="5" class="form-control" id="recommendations">{{ $exam->recommendations }}</textarea>
                                                                                                                </span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td align="left">
                                                                                                <div class="container">
                                                                                                    <div class="row mb-3">
                                                                                                        <div
                                                                                                            class="col-md-2">
                                                                                                            <label
                                                                                                                for="technician_id"><b>Physician:</b></label>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-10">
                                                                                                            <select
                                                                                                                name="technician_id"
                                                                                                                id="technician_id"
                                                                                                                class="form-control">
                                                                                                                @foreach ($physicians as $physician)
                                                                                                                    <option
                                                                                                                        value="{{ $physician->id }}"
                                                                                                                        {{ $physician->id == $exam->technician_id ? 'selected' : '' }}>
                                                                                                                        {{ $physician->firstname }}
                                                                                                                        {{ $physician->lastname }}
                                                                                                                    </option>
                                                                                                                @endforeach
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="row mb-3">
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <label
                                                                                                                for="date_examination"><b>DATE
                                                                                                                    OF
                                                                                                                    EXAMINATION</b></label>
                                                                                                            <input
                                                                                                                name="date_examination"
                                                                                                                type="date"
                                                                                                                id="date_examination"
                                                                                                                value="{{ $exam->date_examination }}"
                                                                                                                class="form-control" />
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <label
                                                                                                                for="peme_date"><b>DATE
                                                                                                                    OF
                                                                                                                    ISSUANCE</b></label>
                                                                                                            <input
                                                                                                                name="peme_date"
                                                                                                                type="date"
                                                                                                                id="peme_date"
                                                                                                                value="{{ $exam->peme_date }}"
                                                                                                                onchange="computeExpiration(this)"
                                                                                                                class="form-control" />
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <div class="row mb-3">
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <label
                                                                                                                for="examination_number"><b>MEDICAL
                                                                                                                    EXAM
                                                                                                                    REPORT
                                                                                                                    NO.</b></label>
                                                                                                            <input
                                                                                                                name="examination_number"
                                                                                                                type="text"
                                                                                                                id="examination_number"
                                                                                                                value="{{ $exam->examination_number }}"
                                                                                                                class="form-control" />
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-md-6">
                                                                                                            <label
                                                                                                                for="date_expiration"><b>DATE
                                                                                                                    OF
                                                                                                                    EXPIRATION</b></label>
                                                                                                            <input
                                                                                                                name="date_expiration"
                                                                                                                type="date"
                                                                                                                id="date_expiration"
                                                                                                                value="{{ $exam->date_expiration }}"
                                                                                                                class="form-control" />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

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
                                    <input type="hidden" value="{{ date('Y-m-d') }}" name="updated_date">
                                    <button name="action" id="btnSave" value="save" type="submit"
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
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
        function computeBMI() {
            if (frm.height.value != '' && frm.weight.value != '') {
                var num = frm.weight.value / ((frm.height.value / 100) * (frm.height.value / 100));
                if (num < 18.4)
                    bmi_desc = 'Underweight';
                else if (num >= 18.5 && num <= 22.9)
                    bmi_desc = 'Normal';
                else if (num >= 23.0 && num <= 29.9)
                    bmi_desc = 'Overweight';
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

            $('#date_expiration').val(resultDate.getFullYear() + "-" + (month) + "-" + (day));
        }
    </script>
@endpush
