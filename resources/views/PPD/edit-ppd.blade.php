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
                                    <h3>Edit PPD</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_ppd_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_ppd">
                            @if(Session::get('status'))
                                @push('scripts')
                                    <script>
                                       toastr.success('{{ Session::get("status")}}', 'Success');
                                    </script>
                                @endpush
                            @endif
                            @csrf
                            <input type="hidden" name="id" value="{{ $exam->id }}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2" class="table">
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
                                                    value="{{ $exam->admission_id }}" max="2080-12-31"
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
                                        <td><b>Patient Code</b></td>
                                        <td><input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table">
                                <tbody>
                                    <tr>
                                        <td width="17%"><b>RESULT</b></td>
                                        <td width="83%">
                                            <input name="result" type="radio" id="result_0" value="Positive" @php echo
                                                $exam->result == 'Positive' ? 'checked' : ''
                                            @endphp>&nbsp;&nbsp;Positive
                                            <input name="result" type="radio" id="result_1" value="Negative" @php echo
                                                $exam->result == 'Negative' ? 'checked' : ''
                                            @endphp>&nbsp;&nbsp;Negative
                                            <input name="result" type="radio" id="result_2" value="" @php echo
                                                $exam->result == '' ? 'checked' : '' @endphp>&nbsp;&nbsp;Reset
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
                                                        <td width="24%"><b>Nurse</b></td>
                                                        <td width="76%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($nurses as $nurse)
                                                                        <option {{$nurse->id == $exam->technician_id ? 'selected' : null}} value={{$nurse->id}}>{{$nurse->firstname}} {{$nurse->lastname}} {{$nurse->title}}</option>
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
                                                                    <option value="">--SELECT--</option>
                                                                    <option value="2" selected>Teresita F. Gonzales, MD</option>
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
    @endsection
