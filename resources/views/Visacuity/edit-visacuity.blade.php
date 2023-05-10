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
                                    <h3>Edit Visual Acuity</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $admission->patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_visacuity_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_visacuity" role="form">
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
                                        <td colspan="3">
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
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2" align="center"><b>VISUAL ACUITY</b></td>
                                        <td colspan="2" align="center"><b>FAR VISION</b></td>
                                        <td colspan="2" align="center"><b>NEAR VISION</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td width="18%" align="center"><b>OD</b></td>
                                        <td width="18%" align="center"><b>OS</b></td>
                                        <td width="17%" align="center"><b>ODJ</b></td>
                                        <td width="17%" align="center"><b>OSJ</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><b>Uncorrected</b></td>
                                        <td align="center">
                                            <input name="ufvod" type="text" id="ufvod" value="{{ $exam->ufvod }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="ufvos" type="text" id="ufvos" value="{{ $exam->ufvos }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="unvodj" type="text" id="unvodj" value="{{ $exam->unvodj }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="unvosj" type="text" id="unvosj" value="{{ $exam->unvosj }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><b>Corrected</b></td>
                                        <td align="center">
                                            <input name="cfvod" type="text" id="cfvod" value="{{ $exam->cfvod }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="cfvos" type="text" id="cfvos" value="{{ $exam->cfvos }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="cnvodj" type="text" id="cnvodj" value="{{ $exam->cnvodj }}"
                                                class="form-control" style="width:80px">
                                        </td>
                                        <td align="center">
                                            <input name="cnvosj" type="text" id="cnvosj" value="{{ $exam->cnvosj }}"
                                                class="form-control" style="width:80px">
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
                                                    id="remarks_status_0" value="normal" @php echo $exam->remarks_status
                                                == "normal" ? "checked" : null @endphp>Normal
                                                <input name="remarks_status" type="radio" class="m-1"
                                                    id="remarks_status_1" value="findings" @php echo
                                                    $exam->remarks_status == "findings" ? "checked" : null @endphp>With
                                                Findings
                                            </div>
                                            <div class="form-group">
                                                <label class="font-weight-bold">Findings</label>
                                                <textarea class="form-control" name="remarks"
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
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2"
                                                class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td><b>Optometrist: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    @foreach($optometrists as $optometrist)
                                                                        <option value={{$optometrist->id}} {{$optometrist->id == $exam->technician_id ? "selected" : null}}>{{$optometrist->firstname}} {{$optometrist->lastname}}, {{$optometrist->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="16%"><b>Medical Director: </b></td>
                                                        <td width="84%">
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    @foreach($medical_directors as $medical_director)
                                                                    <option value={{$medical_director->id}} {{$medical_director->id == $exam->technician2_id ? "selected" : null}}>{{$medical_director->firstname}} {{$medical_director->lastname}}</option>
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
    @endsection
