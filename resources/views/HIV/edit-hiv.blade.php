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
                                    <h3>Edit HIV</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/examlab_hiv_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_hiv" role="form">
                            @if(Session::get('status'))
                                @push('scripts')
                                    <script>
                                       toastr.success('{{ Session::get("status")}}', 'Success');
                                    </script>
                                @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2" class="table table-bordered">
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
                                            <input name="patientname" id="patientname" type="text" value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly></td>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"value="{{ $exam->patientcode }}" class="form-control" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="3"><b>EXAMINATION DONE:</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <input name="exam" type="radio" class="m-1" id="exam_2" value="enzyme"/> EIA/CMIA/ELFA&nbsp
                                            <input name="exam" type="radio" class="m-1" id="exam_0" value="rapid" @php echo $exam->exam == "rapid" ? "checked" : "" @endphp>
                                            RAPID &nbsp;
                                            <input name="exam" type="radio" class="m-1" id="exam_1" value="particle" {{ $exam->exam == 'particle' ? 'checked' : null }}>
                                            Particle Agglutination
                                            <input name="exam" type="radio" class="m-1" id="exam_3" value="others" @php
                                                echo $exam->exam == "others" ? "checked" : "" @endphp>
                                            OTHERS&nbsp;
                                        </td>
                                        <td width="45%">
                                            <input name="others" type="text" id="others" value="{{ $exam->others }}"
                                                placeholder="Others..." class="form-control" style="width:200px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="25%"><b>Result</b></td>
                                        <td colspan="2">
                                            <input name="result" type="radio" id="result_0" class="m-1"
                                                value="Non Reactive" {{ $exam->result == "Non Reactive" ? "checked" : "" }}>Non Reactive
                                            <input name="result" type="radio" id="result_1" class="m-1" value="Reactive" @php echo $exam->result == "Reactive" ? "checked" : "" @endphp>
                                                Reactive
                                            <input name="result" type="radio" id="result_2" class="m-1" value="" @php echo $exam->result == "" ? "checked" : "" @endphp>Reset
                                        </td>
                                        <td>
                                            <div class="d-flex align-center justify-content-around">
                                                <div class="form-group">
                                                    <label><b>COV</b></label>
                                                    <input name="result_cov" type="text" id="result_cov" value="{{$exam->result_cov}}" class="form-control" style="width:200px">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>PV</b></label>
                                                    <input name="result_pv" type="text" id="result_pv" value="{{$exam->result_pv}}" class="form-control" style="width:200px">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>HIV Proficiency Cert. <br>
                                                Expiry Date</b></td>
                                        <td colspan="2"><input name="expiry_date" type="date" max="2050-12-31" id="expiry_date"
                                                value="{{ $exam->expiry_date }}" class="form-control"
                                                style="width:160px">
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
                                                <input name="remarks_status" type="radio" class="m-1"
                                                id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? "checked" : null }}>Normal
                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? "checked" : null }}>With Findings
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Findings</label>
                                            <textarea  class="form-control" name="remarks"
                                                id="" cols="30" rows="6">{{$exam->remarks}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Recommendation</label>
                                            <textarea class="form-control" name="recommendation"
                                                id="" cols="30" rows="6">{{$exam->recommendation}}</textarea>
                                        </div>
                                        </td>
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
                                                        <td><b>Physician: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician3_id"
                                                                    id="technician3_id" class="form-control">
                                                                    @foreach($physicians as $physician)
                                                                        <option value={{$physician->id}} {{$physician->id == $exam->technician3_id ? "selected" : null}}>{{$physician->firstname}} {{$physician->lastname}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="23%"><b>Medical Technologist: </b></td>
                                                        <td width="77%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($med_techs as $med_tech)
                                                                        <option value={{$med_tech->id}} {{$med_tech->id == $exam->technician_id ? "selected" : null}}>{{$med_tech->firstname}} {{$med_tech->lastname}}</option>
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
                                                                        <option value={{$pathologist->id}} {{$pathologist->id == $exam->technician2_id ? "selected" : null}}>{{$pathologist->firstname}} {{$pathologist->lastname}}</option>
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
