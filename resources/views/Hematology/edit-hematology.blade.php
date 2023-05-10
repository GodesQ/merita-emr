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
                                    <h3>Edit Hematology</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/examlab_hematology_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_hematology" role="form">
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
                                class="table table-bordered">
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr class="brdAll">
                                        <td colspan="2" width="10%" class="brdBtm"><b>EXAMINATION</b></td>
                                        <td width="15%" class="brdBtm"><b>RESULTS</b></td>
                                        <td width="10%"><b>NORMAL VALUES</b></td>
                                        <td width="20%" class="brdBtm"><b>FINDINGS</b></td>
                                        <td width="40%" class="brdBtm"><b>RECOMMENDATION</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>Hemoglobin</p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="hemoglobin"
                                                type="text" class="form-control" id="hemoglobin"
                                                value="{{ $exam->hemoglobin }}"></td>
                                        <td>120 - 170 g/L</td>
                                        <td align="left" valign="top" class="brdAll"><input name="hemoglobin_findings"
                                                type="text" class="form-control" id="hemoglobin_findings"
                                                value="{{ $exam->hemoglobin_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="hemoglobin_recommendation"
                                                type="text" class="form-control" id="hemoglobin_recommendation"
                                                value="{{ $exam->hemoglobin_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Hematocrit </td>
                                        <td align="left" valign="top" class="brdAll"><input name="hematocrit"
                                                type="text" class="form-control" id="hematocrit"
                                                value="{{ $exam->hematocrit }}"></td>
                                        <td>0.40 - 0.54</td>
                                        <td align="left" valign="top" class="brdAll"><input name="hematocrit_findings"
                                                type="text" class="form-control" id="hematocrit_findings"
                                                value="{{ $exam->hematocrit_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="hematocrit_recommendation"
                                                type="text" class="form-control" id="hematocrit_recommendation"
                                                value="{{ $exam->hematocrit_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">WBC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="wbc" type="text"
                                                class="form-control" id="wbc" value="{{ $exam->wbc }}"></td>
                                        <td>5 - 10 x 10<sup>9</sup> /L</td>
                                        <td align="left" valign="top" class="brdAll"><input name="wbc_findings"
                                                type="text" class="form-control" id="wbc_findings"
                                                value="{{ $exam->wbc_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="wbc_recommendation"
                                                type="text" class="form-control" id="wbc_recommendation"
                                                value="{{ $exam->wbc_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">RBC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="rbc" type="text"
                                                class="form-control" id="rbc" value="{{ $exam->rbc }}"></td>
                                        <td>3.5 - 5.5 10<sup>12</sup> /L</td>
                                        <td align="left" valign="top" class="brdAll"><input name="rbc_findings"
                                                type="text" class="form-control" id="rbc_findings"
                                                value="{{ $exam->rbc_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="rbc_recommendation"
                                                type="text" class="form-control" id="rbc_recommendation"
                                                value="{{ $exam->rbc_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Neutrophil<br>
                                            </p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="neuthrophils"
                                                type="text" class="form-control" id="neuthrophils"
                                                value="{{ $exam->neuthrophils }}"></td>
                                        <td>0.50 - 0.70</td>
                                        <td align="left" valign="top" class="brdAll"><input name="neuthrophils_findings"
                                                type="text" class="form-control" id="neuthrophils_findings"
                                                value="{{ $exam->neuthrophils_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="neuthrophils_recommendation"
                                                type="text" class="form-control" id="neuthrophils_recommendation"
                                                value="{{ $exam->neuthrophils_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Lymphocyte</p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="lymphocytes"
                                                type="text" class="form-control" id="lymphocytes"
                                                value="{{ $exam->lymphocytes }}"></td>
                                        <td>0.20 - 0.40</td>
                                        <td align="left" valign="top" class="brdAll"><input name="lymphocytes_findings"
                                                type="text" class="form-control" id="lymphocytes_findings"
                                                value="{{ $exam->lymphocytes_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="lymphocytes_recommendation"
                                                type="text" class="form-control" id="lymphocytes_recommendation"
                                                value="{{ $exam->lymphocytes_recommendation }}"></td>
                                    </tr>
                                                                        <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Monocyte</td>
                                        <td align="left" valign="top" class="brdAll"><input name="monophils" type="text"
                                                class="form-control" id="monophils" value="{{ $exam->monophils }}">
                                        </td>
                                        <td>0.00 - 0.10</td>
                                        <td align="left" valign="top" class="brdAll"><input name="monophils_findings"
                                                type="text" class="form-control" id="monophils_findings"
                                                value="{{ $exam->monophils_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="monophils_recommendation"
                                                type="text" class="form-control" id="monophils_recommendation"
                                                value="{{ $exam->monophils_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;Eosinophil</p>
                                        </td>
                                        <td align="left" valign="top" class="brdAll"><input name="eosinophils"
                                                type="text" class="form-control" id="eosinophils"
                                                value="{{ $exam->eosinophils }}"></td>
                                        <td>0.00 - 0.05</td>
                                        <td align="left" valign="top" class="brdAll"><input name="eosinophils_findings"
                                                type="text" class="form-control" id="eosinophils_findings"
                                                value="{{ $exam->eosinophils_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="eosinophils_recommendation"
                                                type="text" class="form-control" id="eosinophils_recommendation"
                                                value="{{ $exam->eosinophils_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Basophil</td>
                                        <td align="left" valign="top" class="brdAll"><input name="baspophils"
                                                type="text" class="form-control" id="baspophils"
                                                value="{{ $exam->baspophils }}"></td>
                                        <td>0.00 - 0.01</td>
                                        <td align="left" valign="top" class="brdAll"><input name="baspophils_findings"
                                                type="text" class="form-control" id="baspophils_findings"
                                                value="{{ $exam->baspophils_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="baspophils_recommendation"
                                                type="text" class="form-control" id="baspophils_recommendation"
                                                value="{{ $exam->baspophils_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Platelet</td>
                                        <td align="left" valign="top" class="brdAll"><input name="platelet" type="text"
                                                class="form-control" id="platelet" value="{{ $exam->platelet }}"></td>
                                        <td>150 - 450 X 10<sup>9</sup> /L</td>
                                        <td align="left" valign="top" class="brdAll"><input name="platelet_findings"
                                                type="text" class="form-control" id="platelet_findings"
                                                value="{{ $exam->platelet_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="platelet_recommendation"
                                                type="text" class="form-control" id="platelet_recommendation"
                                                value="{{ $exam->platelet_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Blood Type</td>
                                        <td align="left" valign="top" class="brdAll">
                                            <input name="blood" type="radio" class="m-1" id="blood_0" value="A" @php
                                                echo $exam->blood == "A" ? "checked" : " " @endphp>A
                                            <input name="blood" type="radio" class="m-1" id="blood_1" value="B" @php
                                                echo $exam->blood == "B" ? "checked" : " " @endphp>B
                                            <input name="blood" type="radio" class="m-1" id="blood_2" value="AB" @php
                                                echo $exam->blood == "AB" ? "checked" : " " @endphp>AB
                                            <br><input name="blood" type="radio" class="m-1" id="blood_3" value="O" @php
                                                echo $exam->blood == "O" ? "checked" : " " @endphp>O
                                            <input name="blood" type="radio" class="m-1" id="blood_4" value="" @php echo
                                                $exam->blood == "" ? "checked" : " " @endphp>Reset
                                        </td>
                                        <td></td>
                                        <td align="left" valign="top" class="brdAll"><input name="blood_findings"
                                                type="text" class="form-control" id="blood_findings"
                                                value="{{ $exam->blood_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="blood_recommendation"
                                                type="text" class="form-control" id="blood_recommendation"
                                                value="{{ $exam->blood_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll"> Rh Factor</td>
                                        <td align="left" valign="top" class="brdAll">
                                            <input name="rhfactor" type="radio" class="m-1" id="rhfactor_0" value="+" {{$exam->rhfactor == '+' ? "checked" : null}}>+
                                            <input name="rhfactor" type="radio" class="m-1" id="rhfactor_1" value="-" {{$exam->rhfactor == '-' ? "checked" : null}}>-
                                            <input name="rhfactor" type="radio" class="m-1" id="rhfactor_2" value="" {{$exam->rhfactor == '' ? "checked" : null}}>
                                        </td>
                                        <td></td>
                                        <td align="left" valign="top" class="brdAll"><input name="rhfactor_findings"
                                                type="text" class="form-control" id="rhfactor_findings"
                                                value="{{ $exam->rhfactor_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="rhfactor_recommendation"
                                                type="text" class="form-control" id="rhfactor_recommendation"
                                                value="{{ $exam->rhfactor_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">ESR</td>
                                        <td align="left" valign="top" class="brdAll"><input name="esr" type="text"
                                                class="form-control" id="esr" value="{{ $exam->esr }}"></td>
                                        <td><?php echo $admission->gender == 'Male' ? '0 - 10 mm/hr' : '0 - 20 mm/hr' ?></td>
                                        <td align="left" valign="top" class="brdAll"><input name="esr_findings"
                                                type="text" class="form-control" id="esr_findings"
                                                value="{{ $exam->esr_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="esr_recommendation"
                                                type="text" class="form-control" id="esr_recommendation"
                                                value="{{ $exam->esr_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Bleeding Time</td>
                                        <td align="left" valign="top" class="brdAll"><input name="bleeding" type="text"
                                                class="form-control" id="bleeding" value="{{ $exam->bleeding }}"></td>
                                        <td>1-7 Minutes</td>
                                        <td align="left" valign="top" class="brdAll"><input name="bleeding_findings"
                                                type="text" class="form-control" id="bleeding_findings"
                                                value="{{ $exam->bleeding_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="bleeding_recommendation"
                                                type="text" class="form-control" id="bleeding_recommendation"
                                                value="{{ $exam->bleeding_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">Clotting Time</td>
                                        <td align="left" valign="top" class="brdAll"><input name="clotting" type="text"
                                                class="form-control" id="clotting" value="{{ $exam->clotting }}"></td>
                                        <td>5-15 Minutes</td>
                                        <td align="left" valign="top" class="brdAll"><input name="clotting_findings"
                                                type="text" class="form-control" id="clotting_findings"
                                                value="{{ $exam->clotting_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="clotting_recommendation"
                                                type="text" class="form-control" id="clotting_recommendation"
                                                value="{{ $exam->clotting_recommendation }}"></td>
                                    </tr>

                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCV</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mcv" type="text"
                                                class="form-control" id="mcv" value="{{ $exam->mcv }}"></td>
                                        <td>80 - 100 fL5</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mcv_findings"
                                                type="text" class="form-control" id="mcv_findings"
                                                value="{{ $exam->mcv_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="mcv_recommendation"
                                                type="text" class="form-control" id="mcv_recommendation"
                                                value="{{ $exam->mcv_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCH</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mch" type="text"
                                                class="form-control" id="mch" value="{{ $exam->mch }}"></td>
                                        <td>27 - 34 pg</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mch_findings"
                                                type="text" class="form-control" id="mch_findings"
                                                value="{{ $exam->mch_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="mch_recommendation"
                                                type="text" class="form-control" id="mch_recommendation"
                                                value="{{ $exam->mch_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">MCHC</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mchc" type="text"
                                                class="form-control" id="mchc" value="{{ $exam->mchc }}"></td>
                                        <td>320 - 360 g/L</td>
                                        <td align="left" valign="top" class="brdAll"><input name="mchc_findings"
                                                type="text" class="form-control" id="mchc_findings"
                                                value="{{ $exam->mchc_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="mchc_recommendation"
                                                type="text" class="form-control" id="mchc_recommendation"
                                                value="{{ $exam->mchc_recommendation }}"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="left" valign="top" class="brdAll">OTHERS:
                                            <textarea name="others" col="10" row="5" class="form-control" id="others">{{$exam->others}}</textarea>
                                        </td>
                                        <th align="left" valign="bottom" class="brdAll">
                                            <input name="others_result" type="text" class="form-control"
                                                id="others_result" value="{{ $exam->others_result }}">
                                        </th>
                                        <td></td>
                                        <td align="left" valign="top" class="brdAll"><input name="others_findings"
                                                type="text" class="form-control" id="others_findings"
                                                value="{{ $exam->others_findings }}"></td>
                                        <td align="left" valign="top" class="brdAll"><input name="others_recommendation"
                                                type="text" class="form-control" id="others_recommendation"
                                                value="{{ $exam->others_recommendation }}"></td>
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
                                                id="remarks_status_0" value="normal" @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" @php echo $exam->remarks_status == "findings" ? "checked" : null @endphp>With Findings
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
                                                        <td width="23%"><b>Medical Technologist: </b></td>
                                                        <td width="77%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($medical_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == $exam->technician_id ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}, {{$med_tech->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pathologist: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    @foreach($pathologists as $pathologist)
                                                                        <option value={{$pathologist->id}} {{$pathologist->id == $exam->technician2_id ? "selected" : null}}>{{$pathologist->firstname}} {{$pathologist->lastname}}, {{$pathologist->title}}</option>
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
    {{-- <script>
        document.addEventListener('keydown',handleInputFocusTransfer);

        function handleInputFocusTransfer(e) {

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
    </script> --}}
    @endsection
