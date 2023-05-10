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
                                    <h3>Edit ECG</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_ecg_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_ecg" role="form">
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
                                class="table table=bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input name="trans_date" type="text" id="trans_date"
                                                value="{{ $admission->trans_date }}" class="form-control my-1"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input name="admission_id" type="text" id="admission_id"
                                                    value="{{ $exam->admission_id }}"
                                                    class="form-control my-1 input-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input name="trans_date" type="text" id="trans_date"
                                                value="{{ $exam->trans_date }}" class="form-control my-1" readonly="">
                                        </td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td colspan="3">
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control my-1" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control my-1" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                class="table table-bordered table-responsive">
                                <tbody>
                                    <tr>
                                        <td width="12%"><b>Otoscopy:</b></td>
                                        <td width="88%">
                                            <input name="otoscopy" type="text" id="otoscopy"
                                                value="{{ $exam->otoscopy }}" size="15" class="form-control my-1"
                                                placeholder="Otoscopy">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Heart:</b></td>
                                        <td>
                                            <input name="heart" type="text" id="heart" value="{{ $exam->heart }}"
                                                size="15" class="form-control my-1" placeholder="Heart">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Lung:</b></td>
                                        <td>
                                            <input name="lung" type="text" id="lung" value="{{ $exam->lung }}" size="15"
                                                class="form-control my-1" placeholder="Lung">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><b>ECG Result:</b></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio"  name="ecg" id="radio" value="Normal" @php echo
                                                $exam->ecg == 'Normal' ? 'checked' : '' @endphp>
                                            Normal
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio"  name="ecg" id="radio" value="Significant Findings" @php
                                                echo $exam->ecg == 'Significant Findings' ? 'checked' : '' @endphp>
                                            Significant Findings
                                        </td>
                                        <td>
                                            <textarea row="8" col="5" placeholder="Findings" name="remarks" class="form-control">{{$exam->remarks}}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio"  name="ecg" id="radio" value="Not Required" @php echo  $exam->ecg == 'Not Required' ? 'checked' : '' @endphp>
                                            Not Required
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="radio"  name="ecg" id="radio"
                                                value="Clinically Not Significant">
                                            Clinically Not Significant
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4">
                                            <label for=""><b>Practioner's Comments:</b></label>
                                            <div class="form-group">
                                                <input type="text" name="practioner_comment" id="practioner_comment" value="{{ $exam->practioner_comment }}" class="form-control" />
                                            </div>
                                        </td>
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
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea placeholder="Remarks" class="form-control" name="findings" id="" cols="30" rows="6">{{ $exam->findings }}</textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Recommendation</label>
                                                                <textarea placeholder="Recommendation" class="form-control" name="recommendation" id="" cols="30" rows="6">{{ $exam->recommendation }}</textarea>
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
                                                        <td><b>Nurse: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($nurses as $nurse)
                                                                    <option value={{$nurse->id}}>{{$nurse->firstname}} {{$nurse->lastname}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="24%"><b>Physician</b></td>
                                                        <td width="76%">
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    @foreach($physicians as $physician)
                                                                    <option value={{$physician->id}} {{$physician->id == $exam->technician2_id ? "selected" : null}}>{{$physician->firstname}} {{$physician->lastname}}</option>
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
