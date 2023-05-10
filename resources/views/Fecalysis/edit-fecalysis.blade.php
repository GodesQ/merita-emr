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
                                    <h3>Edit Fecalysis</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/examlab_fecalysis_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_fecalysis" role="form">
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
                                                value="{{ $exam->trans_date }}" class="form-control move" readonly=""></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td colspan="3">
                                            <input name="patientname" id="patientname" type="text"
                                                value="{{ $admission->patient->lastname . ', ' . $admission->patient->firstname }}"
                                                class="form-control move" readonly="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control move" readonly="">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="left"><b>MACROSCOPIC FINDINGS:</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Color</b></td>
                                        <td width="76%">
                                            <select name="color" class="form-control move">
                                                <option {{$exam->color == "" ? "selected" : null}}>Select Color</option>
                                                <option {{$exam->color == "Brown" ? "selected" : null}} value="Brown">Brown</option>
                                                <option {{$exam->color == "For Light Brown" ? "selected" : null}} value="For Light Brown">For Light Brown</option>
                                                <option {{$exam->color == "Yellow" ? "selected" : null}} value="Yellow">Yellow</option>
                                                <option {{$exam->color == "Green" ? "selected" : null}} value="Green">Green</option>
                                                <option {{$exam->color == "Red" ? "selected" : null}} value="Red">Red</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Consistency</b></td>
                                        <td>
                                            <select name="consistency" class="form-control move">
                                                <option {{$exam->consistency == "Formed" ? "selected" : null}} value="Formed">Formed</option>
                                                <option {{$exam->consistency == "Semi Formed" ? "selected" : null}} value="Semi Formed">Semi Formed</option>
                                                <option {{$exam->consistency == "Mucold" ? "selected" : null}} value="Mucold">Mucold</option>
                                                <option {{$exam->consistency == "Soft" ? "selected" : null}} value="Soft">Soft</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Bacteria</b></td>
                                        <td>
                                            <select name="bacteria" class="form-control move">
                                                <option {{$exam->bacteria == "RARE" ? 'selected' : null}} value="RARE">RARE</option>
                                                <option {{$exam->bacteria == "FEW" ? 'selected' : null}} value="FEW">FEW</option>
                                                <option {{$exam->bacteria == "MODERATE" ? 'selected' : null}} value="MODERATE">MODERATE</option>
                                                <option {{$exam->bacteria == "MANY" ? 'selected' : null}} value="MANY">MANY</option>
                                                <option {{$exam->bacteria == "None" ? 'selected' : null}} value="None">None</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="left"><b>MICROSCOPIC FINDINGS:</b></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Pus Cells</b></td>
                                        <td><input name="pus" type="text" class="form-control move" id="pus"
                                                value="{{ $exam->pus }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>RBC</b></td>
                                        <td><input name="rbc" type="text" class="form-control move" id="rbc"
                                                value="{{ $exam->rbc }}"></td>
                                    </tr>
                                    <tr>
                                        <td width="5%" align="left">&nbsp;</td>
                                        <td width="19%" align="left"><b>Yeast Cells</b></td>
                                        <td><input name="yeast" type="text" class="form-control move" id="yeast"
                                                value="{{ $exam->yeast }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><strong>Mucus Threads</strong></td>
                                        <td><input name="mucus" type="text" class="form-control move" id="mucus"
                                                value="{{ $exam->mucus }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Epithelial Cells</b></td>
                                        <td><input name="epithelial" type="text" class="form-control move" id="epithelial"
                                                value="{{ $exam->epithelial }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left">&nbsp;</td>
                                        <td align="left"><b>Ova / Parasite</b></td>
                                        <td><input name="ova" type="ova" class="form-control move" id="ova"
                                                value="{{ $exam->ova }}"></td>
                                    </tr>
                                    <tr>
                                        <td align="left"><b>Stool Culture</b></td>
                                        <td valign="center">
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_0" value="normal" {{$exam->stool_status == 'normal' ? 'checked' : null}}>Normal
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_1" value="findings" {{$exam->stool_status == 'findings' ? 'checked' : null}}>Findings
                                            <input name="stool_status" type="radio" class="m-1 move" id="stool_status_2" value="" {{$exam->stool_status == '' ? 'checked' : null}}>Reset
                                        </td>
                                        <td align="left" valign="center">
                                            <input name="stool_culture" type="text" class="form-control move" id="stool_culture" value="{{ $exam->stool_culture }}">
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
                                                id="remarks_status_0" value="normal" @php echo $exam->remarks_status == "normal" ? "checked" : null @endphp>Normal
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
                            <div class="box-footer">
                                <button name="action" id="btnSave" value="save" type="submit" class="btn btn-primary"
                                    onclick="return chkAdmission();">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('keydown',handleInputFocusTransfer);

        function handleInputFocusTransfer(e){

          const focusableInputElements= document.querySelectorAll(`.move`);

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
