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
                            <h3>Add Echo Plain</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_echoplain" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required required required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered">
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="18%" align="left"><b>Referring MD </b></td>
                                        <td colspan="7" align="left"><input name="referring_md" type="text"
                                                id="referring_md" value="" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td width="18%" align="left"><b>Clinical Diagnostic</b></td>
                                        <td colspan="7" align="left"><input name="clinical_diagnostic" type="text"
                                                id="clinical_diagnostic" value="Merita Diagnostic Clinic, Inc."
                                                class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Height (cm) </b></td>
                                        <td width="8%" align="left"><input name="height" type="text" id="height"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td width="17%" align="right"><b>Weight
                                                (kg) </b></td>
                                        <td width="8%" align="left"><input name="weight" type="text" id="weight"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td width="12%" align="right"><b>BP</b></td>
                                        <td width="12%" align="left"><input name="bp" type="text" id="bp" value=""
                                                size="15" class="form-control" style="width:80px"></td>
                                        <td width="8%" align="left">&nbsp;</td>
                                        <td width="17%" align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="right"><b>Study No. </b></td>
                                        <td align="left"><input name="study_no" type="text" id="study_no" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="right"><b>DVD No.</b></td>
                                        <td align="left"><input name="dvd_no" type="text" id="dvd_no" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="right"><b>Rhythm</b></td>
                                        <td align="left"><input name="rhythm" type="text" id="rhythm" value="" size="15"
                                                class="form-control" style="width:50px"></td>
                                        <td align="right"><b>HR</b></td>
                                        <td align="left"><input name="hr" type="text" id="hr" value=""
                                                class="form-control" style="width:50px"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" cellpadding="0" cellspacing="0" id="brdTable"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="10" align="center"><b>QUANTITATIVE MEASUREMENT</b></td>
                                    </tr>
                                    <tr>
                                        <td width="11%" align="center"><b>Dimension</b></td>
                                        <td width="11%" align="center"><b>Measurement</b></td>
                                        <td width="13%" align="center"><b>Normal</b></td>
                                        <td width="12%" align="center"><b>Dimension</b></td>
                                        <td width="11%" align="center"><b>Measurement</b></td>
                                        <td colspan="2" align="center"><b>Simposon's</b></td>
                                        <td colspan="3" align="center"><b>Normal</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">LV (ed)</td>
                                        <td align="center"><input name="lved" type="text" id="lved" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(3.9 - 5.2)</td>
                                        <td align="left">LVEDV</td>
                                        <td align="center"><input name="lvedv" type="text" id="lvedv" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="lvedv_simp" type="text"
                                                id="lvedv_simp" value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LV (es)</td>
                                        <td align="center"><input name="lves" type="text" id="lves" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td align="left">LVESV</td>
                                        <td align="center"><input name="lvesv" type="text" id="lvesv" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="lvesv_simp" type="text"
                                                id="lvesv_simp" value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">IVS (ed)</td>
                                        <td align="center"><input name="ivsed" type="text" id="ivsed" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(0.8 - 1.1)</td>
                                        <td align="left">Stroke Volume</td>
                                        <td align="center"><input name="sv" type="text" id="sv" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="sv_simp" type="text" id="sv_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">IVS (es)</td>
                                        <td align="center"><input name="ivses" type="text" id="ivses" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td align="left">Cardiac Output</td>
                                        <td align="center"><input name="co" type="text" id="co" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="co_simp" type="text" id="co_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LVPW (ed)</td>
                                        <td align="center"><input name="lvpwed" type="text" id="lvpwed" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(0.8 - 1.1)</td>
                                        <td align="left">EF</td>
                                        <td align="center"><input name="ef" type="text" id="ef" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="ef_simp" type="text" id="ef_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">(55 - 77)</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LVPW (es)</td>
                                        <td align="center"><input name="lvpwes" type="text" id="lvpwes" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td align="left">FS</td>
                                        <td align="center"><input name="fs" type="text" id="fs" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="fs_simp" type="text" id="fs_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">(29 - 42)</td>
                                    </tr>
                                    <tr>
                                        <td align="left">Aorta</td>
                                        <td align="center"><input name="aorta" type="text" id="aorta" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(2.3 - 3.5)</td>
                                        <td align="left">VCF</td>
                                        <td align="center"><input name="vcf" type="text" id="vcf" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="vcf_simp" type="text" id="vcf_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">(0.5 - 1.0)</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LA (AP)</td>
                                        <td align="center"><input name="laap" type="text" id="laap" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(2.6 - 3.8)</td>
                                        <td align="left">LV Mass 1</td>
                                        <td align="center"><input name="lmv" type="text" id="lmv" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center"><input name="lmv_simp" type="text" id="lmv_simp"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="3" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">MPA</td>
                                        <td align="center"><input name="mpa" type="text" id="mpa" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td colspan="7" align="left">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LVET</td>
                                        <td align="center"><input name="lvet" type="text" id="lvet" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td colspan="2" align="center"><b>Diastolic Functions</b></td>
                                        <td colspan="2" align="center"><b>Left Atrium</b></td>
                                        <td width="12%" align="center">&nbsp;</td>
                                        <td width="10%" colspan="2" align="center"><b>Normal</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">EPSS</td>
                                        <td align="center"><input name="epss" type="text" id="epss" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">( &lt; 1.0)</td>
                                        <td>DT</td>
                                        <td align="center"><input name="dt" type="text" id="dt" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td width="12%">L1</td>
                                        <td align="center"><input name="l1" type="text" id="l1"
                                            value="" class="form-control" style="width:50px"></td>
                                        <td width="8%">LVMI</td>
                                        <td align="center"><input name="lvmi" type="text" id="lvmi"
                                                value="" class="form-control" style="width:50px"></td>
                                        <td colspan="2" align="center">(49-115)</td>
                                    </tr>
                                    <tr>
                                        <td align="left">LVOT</td>
                                        <td align="center"><input name="lvot" type="text" id="lvot" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td>IVRT</td>
                                        <td align="center"><input name="ivrt" type="text" id="ivrt" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td>L2</td>
                                        <td align="center"><input name="l2" type="text" id="l2" value="" class="form-control" style="width:50px"></td>
                                        <td>RWT</td>
                                        <td align="center"><input name="rwt" type="text" id="rwt" value="" class="form-control" style="width:50px"></td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">RV</td>
                                        <td align="center"><input name="rv" type="text" id="rv" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(2.2 - 4.0)</td>
                                        <td>PV Flow</td>
                                        <td align="center"><input name="pvf" type="text" id="pvf" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td>A1</td>
                                        <td><input name="a1" type="text" id="a1" value="" class="form-control" style="width:50px"></td>
                                        <td align="center"></td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">RA</td>
                                        <td align="center"><input name="ra" type="text" id="ra" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">(3.5 - 4.5)</td>
                                        <td>PV E</td>
                                        <td align="center"><input name="pve" type="text" id="pve" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td>A2</td>
                                        <td><input name="a2" type="text" id="a2" value="" class="form-control" style="width:50px"></td>
                                        <td align="center"></td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">MV Annulus</td>
                                        <td align="center"><input name="mva" type="text" id="mva" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td>PV A</td>
                                        <td align="center"><input name="pva" type="text" id="pva" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td>LA Vol.</td>
                                        <td><input name="lav" type="text" id="lav" value="" class="form-control" style="width:50px"></td>
                                        <td align="center"></td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td align="left">TV Annulus</td>
                                        <td align="center"><input name="tva" type="text" id="tva" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td align="center">&nbsp;</td>
                                        <td>PV AR</td>
                                        <td align="center"><input name="pvar" type="text" id="pvar" value=""
                                                class="form-control" style="width:50px"></td>
                                        <td>Tapse</td>
                                        <td>
                                            <input name="tapse" type="text" id="tapse" value=""
                                            class="form-control" style="width:50px">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%"><b>Interpretation</b></td>
                                                        <td width="85%"><textarea name="interpretation"
                                                                id="interpretation" cols="50" rows="7"
                                                                class="form-control">
Normal left ventricular dimension with normal left ventricular mass index and relative wall
thickness with adequate wall motion and contractility
Normal left atrium, right atrium, main pulmonary artery and aortic root dimension
Structurally normal tricuspid, mitral, aortic and pulmonic valves
No intracardiac thombus nor pericardial effusion</textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%"><b>Conclusion</b></td>
                                                        <td width="85%"><textarea name="conclusion" id="conclusion"
                                                                cols="50" rows="7" class="form-control">Normal pulmonary arterial pressure</textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                        <tr>
                                                                <td colspan="4">
                                                                <div class="form-group">
                                                                        <label for=""><b>Remarks</b></label>
                                                                        <input name="remarks_status" type="radio" class="m-1"
                                                                        id="remarks_status_0" value="normal">Normal
                                                                        <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings">With Findings <br>
                                                                        <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                                        id="" cols="30" rows="6"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Findings</label>
                                                                    <textarea placeholder="Findings" class="form-control" name="findings"
                                                                        id="" cols="30" rows="6"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Recommendation</label>
                                                                    <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                                        id="" cols="30" rows="6"></textarea>
                                                                </div>
                                                                </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="15%"><b>Cardiologist</b></td>
                                                        <td width="85%">
                                                            <div class="col-md-8">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($cardiologists as $cardiologist)
                                                                        <option value={{$cardiologist->id}}>{{$cardiologist->firstname}} {{$cardiologist->lastname}} {{$cardiologist->title}}</option>
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
</div>
<script>
    document.addEventListener('keydown',handleInputFocusTransfer);

    function handleInputFocusTransfer(e){
      const focusableInputElements= document.querySelectorAll(`input`);

      //Creating an array from the node list
      const focusable= [...focusableInputElements];

      //get the index of current item
      const index = focusable.indexOf(document.activeElement);

      // Create a variable to store the idex of next item to be focussed
      let nextIndex = 0;

      if (e.keyCode === 37) {
        // up arrow
        e.preventDefault();
        nextIndex= index > 0 ? index-1 : 0;
        focusableInputElements[nextIndex].focus();
      }
      else if (e.keyCode === 39) {
        // down arrow
        e.preventDefault();
        nextIndex= index+1 < focusable.length ? index+1 : index;
        focusableInputElements[nextIndex].focus();
      }
    }
</script>
@endsection
