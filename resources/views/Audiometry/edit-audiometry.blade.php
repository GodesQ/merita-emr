@extends('layouts.admin-layout')

@section('content')
    <style>
        .form-control {
            padding: 0.2rem;
        }

        .table th,
        .table td {
            padding: 0.5rem;
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
                                        <h3>Edit Audiometry</h3>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="patient_edit?id={{ $exam->admission->patient->id }}&patientcode={{ $exam->patientcode }}"
                                            class="btn btn-primary">Back to Patient</a>
                                        <button
                                            onclick='window.open("/exam_audiometry_print?id={{ $exam->admission_id }}", "width=800,height=650").print()'
                                            class="btn btn-dark btn-solid" title="Print">Print</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-content p-2 table-responsive">
                            <form name="frm" method="post" action="/update_audiometry" role="form">
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
                                                <input required name="peme_date" type="text" id="peme_date"
                                                    value="{{ date_format( new DateTime($exam->admission->trans_date), 'F d, Y') }}" class="form-control"
                                                    readonly="">
                                            </td>
                                            <td width="113"><b>Admission No.</b></td>
                                            <td width="322">
                                                <div class="col-md-10" style="margin-left: -14px">
                                                    <input required name="admission_id" type="text" id="admission_id"
                                                        value="{{ $exam->admission_id }}"
                                                        class="form-control input required required-sm pull-left"
                                                        placeholder="Admission No." readonly="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Exam Date</b></td>
                                            <td><input required name="trans_date" type="text" id="trans_date"
                                                    value="{{ date_format( new DateTime($exam->trans_date), 'F d, Y') }}" class="form-control" readonly="">
                                            </td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><b>Patient</b></td>
                                            <td>
                                                <input required name="patientname" id="patientname" type="text"
                                                    value="{{ $exam->admission->patient->lastname . ', ' . $exam->admission->patient->firstname }}"
                                                    class="form-control" readonly>
                                            </td>
                                            <td><b>Patient Code</b></td>
                                            <td><input required name="patientcode" id="patientcode" type="text" value="{{ $exam->admission->patient->patientcode }}"
                                                class="form-control" readonly></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                    class="table table-bordered">
                                    <tr>
                                        <td width="10%"><b><u>AIR</u></b></td>
                                        <td width="10%" align="center"><b>250</b></td>
                                        <td width="10%" align="center"><b>500</b></td>
                                        <td width="10%" align="center"><b>750</b></td>
                                        <td width="10%" align="center"><b>1000</b></td>
                                        <td width="10%" align="center"><b>2000</b></td>
                                        <td width="10%" align="center"><b>3000</b></td>
                                        <td width="10%" align="center"><b>4000</b></td>
                                        <td width="10%" align="center"><b>6000</b></td>
                                        <td width="10%" align="center"><b>8000 </b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Right Ear:</b></td>
                                        <td align="center"><input name="air_right1" type="number" max="999"
                                                class="form-control" id="air_right1" value="{{ $exam->air_right1 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right2" type="number" max="999"
                                                class="form-control" id="air_right2" value="{{ $exam->air_right2 }}"
                                                size="5" />
                                        <td align="center"><input name="air_right3" type="number" max="999"
                                                class="form-control" id="air_right3" value="{{ $exam->air_right3 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right4" type="number" max="999"
                                                class="form-control" id="air_right4" value="{{ $exam->air_right4 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right5" type="number" max="999"
                                                class="form-control" id="air_right5" value="{{ $exam->air_right5 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right6" type="number" max="999"
                                                class="form-control" id="air_right6" value="{{ $exam->air_right6 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right7" type="number" max="999"
                                                class="form-control" id="air_right7" value="{{ $exam->air_right7 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right8" type="number" max="999"
                                                class="form-control" id="air_right8" value="{{ $exam->air_right8 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_right9" type="number" max="999"
                                                class="form-control" id="air_right9" value="{{ $exam->air_right9 }}"
                                                size="5" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Left Ear:</b></td>
                                        <td align="center"><input name="air_left1" type="number" max="999"
                                                class="form-control" id="air_left1" value="{{ $exam->air_left1 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left2" type="number" max="999"
                                                class="form-control" id="air_left2" value="{{ $exam->air_left2 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left3" type="number" max="999"
                                                class="form-control" id="air_left3" value="{{ $exam->air_left3 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left4" type="number" max="999"
                                                class="form-control" id="air_left4" value="{{ $exam->air_left4 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left5" type="number" max="999"
                                                class="form-control" id="air_left5" value="{{ $exam->air_left5 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left6" type="number" max="999"
                                                class="form-control" id="air_left6" value="{{ $exam->air_left6 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left7" type="number" max="999"
                                                class="form-control" id="air_left7" value="{{ $exam->air_left7 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left8" type="number" max="999"
                                                class="form-control" id="air_left8" value="{{ $exam->air_left8 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="air_left9" type="number" max="999"
                                                class="form-control" id="air_left9" value="{{ $exam->air_left9 }}"
                                                size="5" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"><b><u>BONE</u></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Right Ear:</b></td>
                                        <td align="center"><input name="bone_right1" type="number" max="999"
                                                class="form-control" id="bone_right1" value="{{ $exam->bone_right1 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right2" type="number" max="999"
                                                class="form-control" id="bone_right2" value="{{ $exam->bone_right2 }}"
                                                size="5" />
                                        <td align="center"><input name="bone_right3" type="number" max="999"
                                                class="form-control" id="bone_right3" value="{{ $exam->bone_right3 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right4" type="number" max="999"
                                                class="form-control" id="bone_right4" value="{{ $exam->bone_right4 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right5" type="number" max="999"
                                                class="form-control" id="bone_right5" value="{{ $exam->bone_right5 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right6" type="number" max="999"
                                                class="form-control" id="bone_right6" value="{{ $exam->bone_right6 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right7" type="number" max="999"
                                                class="form-control" id="bone_right7" value="{{ $exam->bone_right7 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right8" type="number" max="999"
                                                class="form-control" id="bone_right8" value="{{ $exam->bone_right8 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_right9" type="number" max="999"
                                                class="form-control" id="bone_right9" value="{{ $exam->bone_right9 }}"
                                                size="5" /></td>
                                    </tr>
                                    <tr>
                                        <td><b>Left Ear:</b></td>
                                        <td align="center"><input name="bone_left1" type="number" max="999"
                                                class="form-control" id="bone_left1" value="{{ $exam->bone_left1 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left2" type="number" max="999"
                                                class="form-control" id="bone_left2" value="{{ $exam->bone_left2 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left3" type="number" max="999"
                                                class="form-control" id="bone_left3" value="{{ $exam->bone_left3 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left4" type="number" max="999"
                                                class="form-control" id="bone_left4" value="{{ $exam->bone_left4 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left5" type="number" max="999"
                                                class="form-control" id="bone_left5" value="{{ $exam->bone_left5 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left6" type="number" max="999"
                                                class="form-control" id="bone_left6" value="{{ $exam->bone_left6 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left7" type="number" max="999"
                                                class="form-control" id="bone_left7" value="{{ $exam->bone_left7 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left8" type="number" max="999"
                                                class="form-control" id="bone_left8" value="{{ $exam->bone_left8 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="bone_left9" type="number" max="999"
                                                class="form-control" id="bone_left9" value="{{ $exam->bone_left9 }}"
                                                size="5" /></td>
                                    </tr>
                                    <tr>
                                        <td><b><u>FREE FIELD</u></b></td>
                                        <td align="center"><input name="free_field1" type="number" max="999"
                                                class="form-control" id="free_field1" value="{{ $exam->free_field1 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field2" type="number" max="999"
                                                class="form-control" id="free_field2" value="{{ $exam->free_field2 }}"
                                                size="5" />
                                        <td align="center"><input name="free_field3" type="number" max="999"
                                                class="form-control" id="free_field3" value="{{ $exam->free_field3 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field4" type="number" max="999"
                                                class="form-control" id="free_field4" value="{{ $exam->free_field4 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field5" type="number" max="999"
                                                class="form-control" id="free_field5" value="{{ $exam->free_field5 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field6" type="number" max="999"
                                                class="form-control" id="free_field6" value="{{ $exam->free_field6 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field7" type="number" max="999"
                                                class="form-control" id="free_field7" value="{{ $exam->free_field7 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field8" type="number" max="999"
                                                class="form-control" id="free_field8" value="{{ $exam->free_field8 }}"
                                                size="5" /></td>
                                        <td align="center"><input name="free_field9" type="number" max="999"
                                                class="form-control" id="free_field9" value="{{ $exam->free_field9 }}"
                                                size="5" /></td>
                                    </tr>
                                    <tr>
                                        <td colspan="10"><b><u>Aided</u></b></td>
                                    </tr>
                                    <tr>
                                        <td><b>Right Ear:</b></td>
                                        <td align="center"><input name='aided_right1' type="number" max="999"
                                                class="form-control" id="aided_right1" value="{{ $exam->aided_right1 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right2" type="number" max="999"
                                                class="form-control" id="aided_right2" value="{{ $exam->aided_right2 }}"
                                                size="5">
                                        </td>
                                        <td align="center"><input name="aided_right3" type="number" max="999"
                                                class="form-control" id="aided_right3" value="{{ $exam->aided_right3 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right4" type="number" max="999"
                                                class="form-control" id="aided_right4" value="{{ $exam->aided_right4 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right5" type="number" max="999"
                                                class="form-control" id="aided_right5" value="{{ $exam->aided_right5 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right6" type="number" max="999"
                                                class="form-control" id="aided_right6" value="{{ $exam->aided_right6 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right7" type="number" max="999"
                                                class="form-control" id="aided_right7" value="{{ $exam->aided_right7 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right8" type="number" max="999"
                                                class="form-control" id="aided_right8" value="{{ $exam->aided_right8 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_right9" type="number" max="999"
                                                class="form-control" id="aided_right9" value="{{ $exam->aided_right9 }}"
                                                size="5"></td>
                                    </tr>
                                    <tr>
                                        <td><b>Left Ear:</b></td>
                                        <td align="center"><input name="aided_left1" type="number" max="999"
                                                class="form-control" id="aided_left1" value="{{ $exam->aided_left1 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left2" type="number" max="999"
                                                class="form-control" id="aided_left2" value="{{ $exam->aided_left2 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left3" type="number" max="999"
                                                class="form-control" id="aided_left3" value="{{ $exam->aided_left3 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left4" type="number" max="999"
                                                class="form-control" id="aided_left4" value="{{ $exam->aided_left4 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left5" type="number" max="999"
                                                class="form-control" id="aided_left5" value="{{ $exam->aided_left5 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left6" type="number" max="999"
                                                class="form-control" id="aided_left6" value="{{ $exam->aided_left6 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left7" type="number" max="999"
                                                class="form-control" id="aided_left7" value="{{ $exam->aided_left7 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left8" type="number" max="999"
                                                class="form-control" id="aided_left8" value="{{ $exam->aided_left8 }}"
                                                size="5"></td>
                                        <td align="center"><input name="aided_left9" type="number" max="999"
                                                class="form-control" id="aided_left9" value="{{ $exam->aided_left9 }}"
                                                size="5"></td>
                                    </tr>
                                    <tr>
                                        <td><b><u>FREE FIELD</u></b></td>
                                        <td align="center"><input name="aided_free_field1" type="number" max="999"
                                                class="form-control" id="aided_free_field1"
                                                value="{{ $exam->aided_free_field1 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field2" type="number" max="999"
                                                class="form-control" id="aided_free_field2"
                                                value="{{ $exam->aided_free_field2 }}" size="5">
                                        </td>
                                        <td align="center"><input name="aided_free_field3" type="number" max="999"
                                                class="form-control" id="aided_free_field3"
                                                value="{{ $exam->aided_free_field3 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field4" type="number" max="999"
                                                class="form-control" id="aided_free_field4"
                                                value="{{ $exam->aided_free_field4 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field5" type="number" max="999"
                                                class="form-control" id="aided_free_field5"
                                                value="{{ $exam->aided_free_field5 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field6" type="number" max="999"
                                                class="form-control" id="aided_free_field6"
                                                value="{{ $exam->aided_free_field6 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field7" type="number" max="999"
                                                class="form-control" id="aided_free_field7"
                                                value="{{ $exam->aided_free_field7 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field8" type="number" max="999"
                                                class="form-control" id="aided_free_field8"
                                                value="{{ $exam->aided_free_field8 }}" size="5"></td>
                                        <td align="center"><input name="aided_free_field9" type="number" max="999"
                                                class="form-control" id="aided_free_field9"
                                                value="{{ $exam->aided_free_field9 }}" size="5"></td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2" class="table">
                                    <tr>
                                        <td width="50%" align="center">
                                            <table width="80%" border="0" cellpadding="2" cellspacing="0"
                                                class="">
                                                <tr>
                                                    <td colspan="4" align="center"><b>SPEECH AUDIOMETRY</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="68">&nbsp;</td>
                                                    <td width="72" align="center">RIGHT</td>
                                                    <td width="73" align="center">LEFT</td>
                                                    <td width="71" align="center">FF</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">SRT</td>
                                                    <td align="right"><input name="srt_right" type="number"
                                                            max="999" class="form-control" id="srt_right"
                                                            value="{{ $exam->srt_right }}" size="5" /></td>
                                                    <td align="right"><input name="srt_left" type="number"
                                                            max="999" class="form-control" id="srt_left"
                                                            value="{{ $exam->srt_left }}" size="5" /></td>
                                                    <td align="right"><input name="srt_ff" type="number"
                                                            max="999" class="form-control" id="srt_ff"
                                                            value="{{ $exam->srt_ff }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">SD</td>
                                                    <td align="right"><input name="sd_right" type="number"
                                                            max="999" class="form-control" id="sd_right"
                                                            value="{{ $exam->sd_right }}" size="5" /></td>
                                                    <td align="right"><input name="sd_left" type="number"
                                                            max="999" class="form-control" id="sd_left"
                                                            value="{{ $exam->sd_left }}" size="5" /></td>
                                                    <td align="right"><input name="sd_ff" type="number"
                                                            max="999" class="form-control" id="sd_ff"
                                                            value="{{ $exam->sd_ff }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">MCL</td>
                                                    <td align="right"><input name="mcl_right" type="number"
                                                            max="999" class="form-control" id="mcl_right"
                                                            value="{{ $exam->mcl_right }}" size="5" /></td>
                                                    <td align="right"><input name="mcl_left" type="number"
                                                            max="999" class="form-control" id="mcl_left"
                                                            value="{{ $exam->mcl_left }}" size="5" /></td>
                                                    <td align="right"><input name="mcl_ff" type="number"
                                                            max="999" class="form-control" id="mcl_ff"
                                                            value="{{ $exam->mcl_ff }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">TOL</td>
                                                    <td align="right"><input name="tol_right" type="number"
                                                            max="999" class="form-control" id="tol_right"
                                                            value="{{ $exam->tol_right }}" size="5" /></td>
                                                    <td align="right"><input name="tol_left" type="number"
                                                            max="999" class="form-control" id="tol_left"
                                                            value="{{ $exam->tol_left }}" size="5" /></td>
                                                    <td align="right"><input name="tol_ff" type="number"
                                                            max="999" class="form-control" id="tol_ff"
                                                            value="{{ $exam->tol_ff }}" size="5" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                        <td width="50%" align="center">
                                            <table width="80%" border="0" cellpadding="2" cellspacing="0">
                                                <tr>
                                                    <td colspan="3" align="center"><b>TYMPANOMETRY TEST</b></td>
                                                </tr>
                                                <tr>
                                                    <td width="68">&nbsp;</td>
                                                    <td width="72" align="center">RIGHT</td>
                                                    <td width="73" align="center">LEFT</td>
                                                </tr>
                                                <tr>
                                                    <td align="center">TYPE</td>
                                                    <td align="right"><input name="type_right" type="number"
                                                            max="999" class="form-control" id="type_right"
                                                            value="{{ $exam->type_right }}" size="5" /></td>
                                                    <td align="right"><input name="type_left" type="number"
                                                            max="999" class="form-control" id="type_left"
                                                            value="{{ $exam->type_left }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">ECV</td>
                                                    <td align="right"><input name="ecv_right" type="number"
                                                            max="999" class="form-control" id="ecv_right"
                                                            value="{{ $exam->ecv_right }}" size="5" /></td>
                                                    <td align="right"><input name="ecv_left" type="number"
                                                            max="999" class="form-control" id="ecv_left"
                                                            value="{{ $exam->ecv_left }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">COMPLIANCE</td>
                                                    <td align="right"><input name="comp_right" type="number"
                                                            max="999" class="form-control" id="comp_right"
                                                            value="{{ $exam->comp_right }}" size="5" /></td>
                                                    <td align="right"><input name="comp_left" type="number"
                                                            max="999" class="form-control" id="comp_left"
                                                            value="{{ $exam->comp_left }}" size="5" /></td>
                                                </tr>
                                                <tr>
                                                    <td align="center">PRESSURE</td>
                                                    <td align="right"><input name="press_right" type="number"
                                                            max="999" class="form-control" id="press_right"
                                                            value="{{ $exam->press_right }}" size="5" /></td>
                                                    <td align="right"><input name="press_left" type="number"
                                                            max="999" class="form-control" id="press_left"
                                                            value="{{ $exam->press_left }}" size="5" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <input name="hearing" type="radio" class="m-1" id="hearing_0" value="aided"
                                                        {{ $exam->hearing == "aided" ? "checked" : null }}>Aided
                                                    <input name="hearing" type="radio" class="m-1" id="hearing_1" value="unaided"
                                                        {{ $exam->hearing == "unaided" ? "checked" : null }}>Unaided
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label>Right Ear Result</label>
                                                    <input name="left_ear_result" type="radio" class="m-1" id="left_ear_result_1" value="Adequate"
                                                        {{ $exam->left_ear_result == 'Adequate' ? 'checked' : null }}>Adequate
                                                    <input name="left_ear_result" type="radio" class="m-1"
                                                        id="left_ear_result_0" value="Inadequate"
                                                        {{ $exam->left_ear_result == 'Inadequate' ? 'checked' : null }}>Inadequate
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <div class="form-group">
                                                    <label>Left Ear Result</label>
                                                    <input name="right_ear_result" type="radio" class="m-1"
                                                        id="right_ear_result_1" value="Adequate"
                                                        {{ $exam->right_ear_result == 'Adequate' ? 'checked' : null }}>Adequate
                                                    <input name="right_ear_result" type="radio" class="m-1"
                                                        id="right_ear_result_0" value="Inadequate"
                                                        {{ $exam->right_ear_result == 'Inadequate' ? 'checked' : null }}>Inadequate
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="table-responsive">
                                                <table width="100%" class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td class="font-weight-bold">For Follow Up Form</td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal"
                                                                        {{ $exam->remarks_status == "normal" ? "checked" : null }}>Normal
                                                                    <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings"
                                                                        {{ $exam->remarks_status == "findings" ? "checked" : null }}>With Findings
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Findings</label>
                                                                    <textarea placeholder="Remarks" class="form-control" name="remarks" id="" cols="30" rows="6">{{ $exam->remarks }}</textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Recommendation</label>
                                                                    <textarea placeholder="Recommendation" class="form-control" name="recommendation" id="" cols="30"
                                                                        rows="6">{{ $exam->recommendation }}</textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
                                                            <td width="16%"><b>Audiometrician: </b></td>
                                                            <td width="84%">
                                                                <div class="col-md-8">
                                                                    <select name="technician_id" id="technician_id"
                                                                        class="form-control">
                                                                        @foreach ($audiometricians as $audiometrician)
                                                                            <option value={{ $audiometrician->id }}>
                                                                                {{ $audiometrician->lastname }},
                                                                                {{ $audiometrician->firstname }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b><span class="brdTop">Otolaryngologist</span>:
                                                                </b></td>
                                                            <td>
                                                                <div class="col-md-8">
                                                                    <select name="technician2_id" id="technician2_id"
                                                                        class="form-control">
                                                                        @foreach ($otolaries as $otolary)
                                                                            <option value={{ $otolary->id }}>
                                                                                {{ $otolary->lastname }},
                                                                                {{ $otolary->firstname }}</option>
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
                                </td>
                                </tr>
                                </table>
                                <div class="box-footer my-2">
                                    <input type="hidden" value="@php echo date('Y-m-d') @endphp" name="updated_date" />
                                    <button name="action" id="btnSave" value="save" type="submit"
                                        class="btn btn-primary" onclick="return chkAdmission();">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
    </div>
    <script>
        document.addEventListener('keydown', handleInputFocusTransfer);

        function handleInputFocusTransfer(e) {
            const focusableInputElements = document.querySelectorAll(`input`);

            //Creating an array from the node list
            const focusable = [...focusableInputElements];

            //get the index of current item
            const index = focusable.indexOf(document.activeElement);

            // Create a variable to store the idex of next item to be focussed
            let nextIndex = 0;

            if (e.keyCode === 37) {
                // up arrow
                e.preventDefault();
                nextIndex = index > 0 ? index - 1 : 0;
                focusableInputElements[nextIndex].focus();
            } else if (e.keyCode === 39) {
                // down arrow
                e.preventDefault();
                nextIndex = index + 1 < focusable.length ? index + 1 : index;
                focusableInputElements[nextIndex].focus();
            }
        }
    </script>
@endsection
