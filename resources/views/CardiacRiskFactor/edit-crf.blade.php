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
                                    <h3>Edit Risk Factor</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_crf_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form action="/update_crf" method="POST">
                            @if(Session::get('status'))
                            @push('scripts')
                            <script>
                            let toaster = toastr.success(
                                '{{ Session::get("status") }}', 'Success');
                            </script>
                            @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table  table-responsive mb-3">
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
                                        <td colspan="3">
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2"
                                class="table table-responsive no-border">
                                <tbody>
                                    <tr>
                                        <td width="23%">&nbsp;</td>
                                        <td width="19%"><b>RESULT </b></td>
                                        <td colspan="2"><b>POINTS OF RISK FACTOR </b></td>
                                    </tr>
                                    <tr>
                                        <td><b>1. AGE</b></td>
                                        <td><input name="age_result" type="text" class="form-control" id="age_result"
                                                value="{{ $exam->age_result }}"></td>
                                        <td width="19%"><input name="age_points" type="text" class="form-control"
                                                id="age_points" value="{{ $exam->age_points }}"></td>
                                        <td width="38%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>2. HDL-C</b></td>
                                        <td><input name="hdl_result" type="text" class="form-control" id="hdl_result"
                                                value="{{ $exam->hdl_result }}"></td>
                                        <td><input name="hdl_points" type="text" class="form-control" id="hdl_points"
                                                value="{{ $exam->hdl_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>3. TOTAL- C </b></td>
                                        <td><input name="total_result" type="text" class="form-control"
                                                id="total_result" value="{{ $exam->total_result }}"></td>
                                        <td><input name="total_points" type="text" class="form-control"
                                                id="total_points" value="{{ $exam->total_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>4. SBP</b></td>
                                        <td><input name="sbp_result" type="text" class="form-control" id="sbp_result"
                                                value="{{ $exam->sbp_result }}"></td>
                                        <td><input name="sbp_points" type="text" class="form-control" id="sbp_points"
                                                value="{{ $exam->sbp_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>5. SMOKER</b></td>
                                        <td>
                                            <input name="smoker_result" type="radio" id="smoker_result_0" value="(-)"
                                                @php echo $exam->smoker_result == '(-)' ? "checked" : null @endphp>
                                            (-)
                                            <input name="smoker_result" type="radio" id="smoker_result_1" value="(+)"
                                                @php echo $exam->smoker_result == '(+)' ? "checked" : null @endphp>
                                            (+)
                                        </td>
                                        <td><input name="smoker_points" type="text" class="form-control"
                                                id="smoker_points" value="{{ $exam->smoker_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>6. DIABETES </b></td>
                                        <td>
                                            <input name="diabetes_result" type="radio" id="diabetes_result_0"
                                                value="(-)" @php echo $exam->diabetes_result == '(-)' ? 'checked' : ''
                                            @endphp>
                                            (-)
                                            <input name="diabetes_result" type="radio" id="diabetes_result_1"
                                                value="(+)" @php echo $exam->diabetes_result == '(+)' ? 'checked' : ''
                                            @endphp>
                                            (+)
                                        </td>
                                        <td><input name="diabetes_points" type="text" class="form-control"
                                                id="diabetes_points" value="{{ $exam->diabetes_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>7. ECG-LVH</b></td>
                                        <td>
                                            <input name="ecg_result" type="radio" id="ecg_result_0" value="(-)" @php
                                                echo $exam->ecg_result == '(-)' ? 'checked' : '' @endphp>
                                            (-)
                                            <input name="ecg_result" type="radio" id="ecg_result_1" value="(+)" @php
                                                echo $exam->ecg_result == '(+)' ? 'checked' : '' @endphp>
                                            (+)
                                        </td>
                                        <td><input name="ecg_points" type="text" class="form-control" id="ecg_points"
                                                value="{{ $exam->ecg_points }}"></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>PROBABILITY</b></td>
                                        <td><input name="probability" type="text" class="form-control" id="probability"
                                                value="{{ $exam->probability }}"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="0" cellpadding="2"
                                class="table no-border table-responsive">
                                <tbody>
                                    <tr>
                                        <td colspan="5"><b>SPIROMETRY RESULTS</b></td>
                                    </tr>
                                    <tr>
                                        <td width="182">&nbsp;</td>
                                        <td width="169"><b>Predicted</b></td>
                                        <td width="162"><b>Actual</b></td>
                                        <td width="171" align="center"><b>Percentage</b></td>
                                        <td width="96" align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>FEV 1 </td>
                                        <td><input name="fev1_predicted" type="text" class="form-control"
                                                id="fev1_predicted" value="{{ $exam->fev1_predicted }}"></td>
                                        <td><input name="fev1_actual" type="text" class="form-control" id="fev1_actual"
                                                value="{{ $exam->fev1_actual }}"></td>
                                        <td><input name="fev1_perc" type="text" class="form-control" id="fev1_perc"
                                                value="{{ $exam->fev1_perc }}"></td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>FVC </td>
                                        <td><input name="fvc_predicted" type="text" class="form-control"
                                                id="fvc_predicted" value="{{ $exam->fvc_predicted }}"></td>
                                        <td><input name="fvc_actual" type="text" class="form-control" id="fvc_actual"
                                                value="{{ $exam->fvc_actual }}"></td>
                                        <td><input name="fvc_perc" type="text" class="form-control" id="fvc_perc"
                                                value="{{ $exam->fvc_perc }}"></td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>FEV1/ FVC % </td>
                                        <td><input name="fev1fvc_predicted" type="text" class="form-control"
                                                id="fev1fvc_predicted" value="{{ $exam->fev1fvc_predicted }}"></td>
                                        <td><input name="fev1fvc_actual" type="text" class="form-control"
                                                id="fev1fvc_actual" value="{{ $exam->fev1fvc_actual }}"></td>
                                        <td><input name="fev1fvc_perc" type="text" class="form-control"
                                                id="fev1fvc_perc" value="{{ $exam->fev1fvc_perc }}"></td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>RESULT</td>
                                        <td><input name="result" type="text" class="form-control" id="result"
                                                value="{{ $exam->ecg_points }}"></td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                        <td align="center">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
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
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? 'checked' : null }}>Normal
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? 'checked' : null }}>With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea placeholder="Remarks" class="form-control" name="remarks"
                                                                    id="" cols="30" rows="6">{{ $exam->remarks }}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation"
                                                                    id="" cols="30" rows="6">{{ $exam->recommendation }}</textarea>
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
                                                        <td width="24%"><b>Nurse</b></td>
                                                        <td width="76%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                     @foreach($nurses as $nurse)
                                                                        <option value={{$nurse->id}} {{$nurse->id == $exam->technician_id ? "selected" : null}}>{{$nurse->firstname}} {{$nurse->lastname}} {{$nurse->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Medical Director</b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    <option
                                                                        {{ $exam->technician2_id == "" || $exam->technician2_id == null ? 'selected' : null }}
                                                                        value="">--SELECT--</option>
                                                                    <option
                                                                        {{ $exam->technician2_id == "2" ? 'selected' : null }}
                                                                        value="2">Teresita F. Gonzales, MD</option>
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
                            <div class="card-footer">
                                <button type="reset" class="btn btn-warning mr-1">
                                    <i class="feather icon-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Save
                                </button>
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
