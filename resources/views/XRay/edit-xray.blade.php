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
                                    <h3>Edit XRAY</h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="patient_edit?id={{ $patient->id }}&patientcode={{ $exam->patientcode }}" class="btn btn-primary">Back to Patient</a>
                                    <button onclick='window.open("/exam_xray_print?id={{$exam->admission_id}}", "width=800,height=650").print()' class="btn btn-dark btn-solid" title="Print">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/update_xray" role="form">
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
                                                value="2{{ $admission->peme_date }}" class="form-control" readonly="">
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
                                                value="{{ $patient->lastname . ', ' . $patient->firstname }}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td>
                                            <input name="patientcode" id="patientcode" type="text"
                                                value="{{ $exam->patientcode }}" class="form-control" readonly="">
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="19%"><b>X-Ray No.</b></td>
                                        <td width="32%">
                                            <input name="xray_no" type="text" class="form-control" id="xray_no"
                                                value="{{ $exam->xray_no }}">
                                        </td>
                                        <td width="49%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Examination</b></td>
                                        <td>
                                            <select name="exam" id="exam" class="form-control" onchange="selectExam(this)">
                                                <option value="" @php echo $exam->exam == "" ? "selected=''" : ""
                                                    @endphp>--SELECT--</option>
                                                <option value="Head & Neck" @php echo $exam->exam == "Head & Neck" ?
                                                    "selected=''" : "" @endphp>Head &amp; Neck</option>
                                                <option value="Chest" @php echo $exam->exam == "Chest" ? "selected=''" :
                                                    "" @endphp>Chest</option>
                                                <option value="Abdominal" @php echo $exam->exam == "Abdominal" ?
                                                    "selected=''" : "" @endphp>Abdominal</option>
                                                <option value="Skeletal" @php echo $exam->exam == "Skeletal" ?
                                                    "selected=''" : "" @endphp>Skeletal</option>
                                                <option value="Upper Extremities" @php echo $exam->exam == "Upper
                                                    Extremities" ? "selected=''" : "" @endphp>Upper Extremities</option>
                                                <option value="Lower Extremities" @php echo $exam->exam == "Lower Extremities" ? "selected=''" : "" @endphp>Lower Extremities</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <input type="hidden" id="exam_type_input" value="{{ $exam->exam_type }}" />
                                        <td><b>Exam Type</b></td>
                                        <td>
                                            <select name="exam_type" id="exam_type" class="form-control">
                                                <option value="Chest (Child)" {{ $exam->exam_type == "Chest (Child)" ? "selected=''" : "" }}>Chest (Child)</option>
                                                <option value="Chest (Adult)" {{ $exam->exam_type == "Chest (Adult)" ? "selected=''" : "" }}>Chest (Adult)</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam View</b></td>
                                        <td>
                                            <select name="exam_view" id="exam_view" class="form-control">
                                                <option value="PA 11 X 14" {{ $exam->exam_view == "PA 11 X 14" ?  "selected=''" : "" }}>PA 11 X 14</option>
                                                <option value="AP" {{ $exam->exam_view == "AP" ? "selected=''" : "" }}>AP</option>
                                                <option value="Lateral" @php echo $exam->exam_view == "Lateral" ?
                                                    "selected=''" : "" @endphp>Lateral</option>
                                                <option value="AP/LAT" @php echo $exam->exam_view == "AP/LAT" ?
                                                    "selected=''" : "" @endphp>AP/LAT</option>
                                                <option value="APL (Lordotic)" @php echo $exam->exam_view == "APL
                                                    (Lordotic)" ? "selected=''" : "" @endphp>APL (Lordotic)</option>
                                                <option value="Spot Film" @php echo $exam->exam_view == "Spot Film" ?
                                                    "selected=''" : "" @endphp>Spot Film</option>
                                                <option value="Lateral Decubitus" @php echo $exam->exam_view == "Lateral
                                                    Decubitus" ? "selected=''" : "" @endphp>Lateral Decubitus</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Result/Findings</b></td>
                                        <td colspan="2">
                                            <textarea name="findings" id="findings" cols="50" rows="3"
                                                class="form-control">{{ $exam->findings }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Impression</b></td>
                                        <td colspan="2">
                                            <textarea name="impression" id="impression" cols="50" rows="3"
                                                class="form-control">{{ $exam->impression }}</textarea>
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
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_0" value="normal" {{ $exam->remarks_status == "normal" ? 'checked' : null }}>Normal
                                                                <input name="remarks_status" type="radio" class="m-1" id="remarks_status_1" value="findings" {{ $exam->remarks_status == "findings" ? 'checked' : null }}>With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold">Findings</label>
                                                                <textarea class="form-control" name="remarks"
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
                            <table width="100%" border="0" cellspacing="2" cellpadding="2" class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td align="left">
                                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                <tbody>
                                                    <tr>
                                                        <td width="24%"><b>Radiologic Technologist: </b></td>
                                                        <td width="76%">
                                                            <div class="col-md-8">
                                                                <select required name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    <option
                                                                        {{ $exam->technician_id == "" || $exam->technician_id == null ? 'selected' : null }}
                                                                        value="">--SELECT--</option>
                                                                    <option
                                                                        {{ $exam->technician_id == "12" ? 'selected' : null }}
                                                                        value="12">Missilie D. Dizon, RXT</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Radiologist: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select required name="technician2_id"
                                                                    id="technician2_id" class="form-control">
                                                                    @foreach($radiologists as $radiologist)
                                                                    <option value={{$radiologist->id}} {{$radiologist->id == $exam->technician_id ? "selected" : null}} >{{$radiologist->firstname}} {{$radiologist->lastname}}</option>
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
    @endsection
    @push('scripts')
        <script type="text/javascript">

            // selection
            const arrExamHNType = ["Skull", "Nasal", "Paranasal Sinuses", "Cervical Spine"];
            const arrExamHNView = ["AP","Lateral","AP/LAT","Skull Series","Water`s View","Townes View"];
            const arrExamCType = ["Chest (Adult)", "Chest (Child)"];
            const arrExamCView = ["PA 11 X 14","PA 14 X 14","PA 14 X 14","AP","Lateral","AP/LAT","APL (Lordotic)","Spot Film","Lateral Decubitus"];
            const arrExamAType = ["Plain Abdomen (Adult)","Plain Abdomen (Child)","KUB","Pelvimetry"];
            const arrExamAView = ["Upright","Supine","AP","Lateral","AP/LAT"];
            const arrExamSType = ["Thoracic Cage","Thoracic Spine","Thoraco Lumbar Spine","Lumbosacral","Sacral"];
            const arrExamSTView = ["AP","Lateral","AP/LAT","Oblique"];
            const arrExamUEType = ["Clavicle","Scapula","Shoulder","Humerus","Elbow Joint","Forearm","Wrist Joint","Hands/Fingers"]
            const arrExamUEView = ["AP","Lateral","AP/LAT","Oblique"];
            const arrExamLEType = ["Pelvic Bone","Hips (Adult)","Hips (Child)","Knees","Femur","Ankle Joint","Foot", "Toes", "Thigh", "Legs"];
            const arrExamLEView = ["AP","Lateral","AP/LAT","Oblique"];

            switch ($("#exam").val()) {
                case "Head & Neck":
                        removeFirstOption();
                        appendOption(arrExamHNType, arrExamHNView)
                        break;

                    case "Chest":
                        removeFirstOption();
                        appendOption(arrExamCType, arrExamCView)
                    break;

                    case "Abdominal":
                        removeFirstOption();
                        appendOption(arrExamAType, arrExamAView)
                    break;

                    case "Skeletal":
                        removeFirstOption();
                        appendOption(arrExamSType, arrExamSTView)
                    break;

                    case "Upper Extremities":
                        removeFirstOption();
                        appendOption(arrExamUEType, arrExamUEView)
                    break;

                    case "Lower Extremities":
                        removeFirstOption();
                        appendOption(arrExamLEType, arrExamLEView)
                    break;

                    default:
                        break;
            }

            function selectExam(e) {

                // parent element
                let exam_type = $("#exam_type");
                let exam_view = $("#exam_view");

                switch (e.value) {
                    case "Head & Neck":
                        removeFirstOption();
                        appendOption(arrExamHNType, arrExamHNView)
                        break;

                    case "Chest":
                        removeFirstOption();
                        appendOption(arrExamCType, arrExamCView)
                    break;

                    case "Abdominal":
                        removeFirstOption();
                        appendOption(arrExamAType, arrExamAView)
                    break;

                    case "Skeletal":
                        removeFirstOption();
                        appendOption(arrExamSType, arrExamSTView)
                    break;

                    case "Upper Extremities":
                        removeFirstOption();
                        appendOption(arrExamUEType, arrExamUEView)
                    break;

                    case "Lower Extremities":
                        removeFirstOption();
                        appendOption(arrExamLEType, arrExamLEView)
                    break;

                    default:
                        break;
                }
            }

            function removeFirstOption() {
                $('#exam_type option').remove();
                $('#exam_view option').remove();
            }

            function appendOption(type, view) {
                // append type option
                type.forEach(arr => {
                    let selected = ($('#exam_type_input').val() == arr) ? "selected" : "";
                    $(`<option value='${arr}' ${selected}>${arr}</option>`).appendTo(exam_type);
                });

                // append view option
                view.forEach(arr => {
                    let selected = ($('#exam_view').val() == arr) ? "selected" : "";
                    $(`<option value='${arr}' ${selected}>${arr}</option>`).appendTo(exam_view);
                })
            }

        </script>
    @endpush
