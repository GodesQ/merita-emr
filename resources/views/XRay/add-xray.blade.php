@extends('layouts.admin-layout')

@section('content')
<div class="app-content content bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 my-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Add Xray</h3>
                            <a href="patient_edit?id={{$admission->patient->id}}&patientcode={{$admission->patient->patientcode}}"
                                class="float-right btn btn-primary">Back to Patient</a>
                        </div>
                    </div>
                    <div class="card-content p-2">
                        <form name="frm" method="post" action="/store_xray" role="form">
                            @if(Session::get('status'))
                            <div class="success alert-success p-2 my-2">
                                {{Session::get('status')}}
                            </div>
                            @endif
                            @csrf
                            <input required type="hidden" name="id" value="{{$admission->id}}">
                            <input type="hidden" name="patient_id" value="{{$admission->patient_id}}">
                            <table id="tblExam" width="100%" cellpadding="2" cellspacing="2"
                                class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="92"><b>PEME Date</b></td>
                                        <td width="247">
                                            <input required name="peme_date" type="text"
                                                id="peme_date" value="{{$admission->trans_date}}" class="form-control"
                                                readonly="">
                                        </td>
                                        <td width="113"><b>Admission No.</b></td>
                                        <td width="322">
                                            <div class="col-md-10" style="margin-left: -14px">
                                                <input required name="admission_id" type="text"
                                                    id="admission_id" value="{{$admission->id}}"
                                                    class="form-control input required-sm pull-left"
                                                    placeholder="Admission No." readonly="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Date</b></td>
                                        <td><input required name="trans_date" type="date"
                                                id="trans_date" value="<?php echo date(
                                    'Y-m-d'
                                ); ?>" class="form-control"></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Patient</b></td>
                                        <td>
                                            <input required name="patientname" id="patientname"
                                                type="text"
                                                value="{{$admission->lastname . ", " . $admission->firstname}}"
                                                class="form-control" readonly="">
                                        </td>
                                        <td><b>Patient Code</b></td>
                                        <td><input required name="patientcode" id="patientcode"
                                                type="text" value="{{$admission->patientcode}}" class="form-control"
                                                readonly=""></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellpadding="2" cellspacing="2" class="table no-border">
                                <tbody>
                                    <tr>
                                        <td width="19%"><b>X-Ray No.</b></td>
                                        <td width="32%">
                                            <input name="xray_no" type="text" class="form-control" id="xray_no"
                                                value="">
                                        </td>
                                        <td width="49%">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Examination</b></td>
                                        <td>
                                            <select name="exam" id="exam" class="form-control" onchange="selectExam(this)">
                                                <option value="">--SELECT--</option>
                                                <option value="Head & Neck">Head & Neck</option>
                                                <option value="Chest" selected>Chest</option>
                                                <option value="Abdominal">Abdominal</option>
                                                <option value="Skeletal">Skeletal</option>
                                                <option value="Upper Extremities">Upper Extremities</option>
                                                <option value="Lower Extremities">Lower Extremities</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam Type</b></td>
                                        <td>
                                            <select name="exam_type" id="exam_type" class="form-control">
                                                <option value=" ">--SELECT--</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Exam View</b></td>
                                        <td>
                                            <select name="exam_view" id="exam_view" class="form-control">
                                                <option value=" ">--SELECT--</option>
                                            </select>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td><b>Result/Findings</b></td>
                                        <td colspan="2">
                                            <textarea name="findings" id="findings" cols="50" rows="3"
                                                class="form-control">No Active parenchymal infiltrates are seen.
The heart is normal in size.
Mediastinum, diaphragm, and bony thorax are unremarkable.</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Impression</b></td>
                                        <td colspan="2">
                                            <textarea name="impression" id="impression" cols="50" rows="3"
                                                class="form-control">Essentially Normal Chest.</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td colspan="4" class="table-responsive">
                                            <table width="100%" class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-weight-bold">For Follow Up Form</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group skull_group">
                                                                <input name="skull_remark_status" type="radio" class="m-1" id="skull_remark_status_0" value="normal">Normal
                                                                <input name="skull_remark_status" type="radio" class="m-1" id="skull_remark_status_1" value="findings">With Findings
                                                            </div>
                                                            <div class="form-group nasal_group">
                                                                <input name="nasal_remark_status" type="radio" class="m-1" id="nasal_remark_status_0" value="normal">Normal
                                                                <input name="nasal_remark_status" type="radio" class="m-1" id="nasal_remark_status_1" value="findings">With Findings
                                                            </div>
                                                            <div class="form-group chest_group">
                                                                <input name="chest_remark_status" type="radio" class="m-1" id="chest_remark_status_0" value="normal">Normal
                                                                <input name="chest_remark_status" type="radio" class="m-1" id="chest_remark_status_1" value="findings">With Findings
                                                            </div>
                                                            <div class="form-group lumbosacral_group">
                                                                <input name="lumbosacral_remark_status" type="radio" class="m-1" id="lumbosacral_remark_status_0" value="normal">Normal
                                                                <input name="lumbosacral_remark_status" type="radio" class="m-1" id="lumbosacral_remark_status_1" value="findings">With Findings
                                                            </div>
                                                            <div class="form-group knees_group">
                                                                <input name="knees_remark_status" type="radio" class="m-1" id="knees_remark_status_0" value="normal">Normal
                                                                <input name="knees_remark_status" type="radio" class="m-1" id="knees_remark_status_1" value="findings">With Findings
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group skull_group">
                                                                <label class="font-weight-bold">Skull Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="skull_findings" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group nasal_group">
                                                                <label class="font-weight-bold">Nasal Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="nasal_findings" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group chest_group">
                                                                <label class="font-weight-bold">Chest Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="chest_findings" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group lumbosacral_group">
                                                                <label class="font-weight-bold">Lumbosacral Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="lumbosacral_findings" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group knees_group">
                                                                <label class="font-weight-bold">Knees Findings</label>
                                                                <textarea placeholder="Findings" class="form-control" name="knees_findings" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group skull_group">
                                                                <label class="font-weight-bold">Skull Recommendation</label>
                                                                <textarea placeholder="Skull Recommendation" class="form-control" name="skull_recommendations" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group nasal_group">
                                                                <label class="font-weight-bold">Nasal Recommendation</label>
                                                                <textarea placeholder="Nasal Recommendation" class="form-control" name="nasal_recommendations" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group chest_group">
                                                                <label class="font-weight-bold">Chest Recommendation</label>
                                                                <textarea placeholder="Chest Recommendation" class="form-control" name="chest_recommendations" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group lumbosacral_group">
                                                                <label class="font-weight-bold">Lumbosacral Recommendation</label>
                                                                <textarea placeholder="Lumbosacral Recommendation" class="form-control" name="lumbosacral_recommendations" id="" cols="30" rows="6"></textarea>
                                                            </div>
                                                            <div class="form-group knees_group">
                                                                <label class="font-weight-bold">Knees Recommendation</label>
                                                                <textarea placeholder="Knees Recommendation" class="form-control" name="knees_recommendations" id="" cols="30" rows="6"></textarea>
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
                                                        <td width="24%"><b>Radiologic Technologist: </b></td>
                                                        <td width="76%">
                                                            <div class="col-md-8">
                                                                <select name="technician_id" id="technician_id"
                                                                    class="form-control">
                                                                    <option value="12">Missilie D. Dizon, RXT</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Radiologist: </b></td>
                                                        <td>
                                                            <div class="col-md-8">
                                                                <select name="technician2_id" id="technician2_id"
                                                                    class="form-control">
                                                                    @foreach($radiologists as $radiologist)
                                                                    <option value={{$radiologist->id}}>{{$radiologist->firstname}} {{$radiologist->lastname}}</option>
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

@endsection
@push('scripts')
    <script type="text/javascript">

        function selectExam(e) {
            // global selection
            const arrExamHNType = ["Skull", "Nasal", "Paranasal Sinuses", "Cervical Spine"];
            const arrExamHNView = ["AP","Lateral","AP/LAT","Skull Series","Water`s View","Townes View"];
            const arrExamCType = ["Chest (Adult)"];
            const arrExamCView = ["PA 11 X 14","PA 14 X 14","PA 14 X 14","AP","Lateral","AP/LAT","APL (Lordotic)","Spot Film","Lateral Decubitus"];
            const arrExamAType = ["Plain Abdomen (Adult)","Plain Abdomen (Child)","KUB","Pelvimetry"];
            const arrExamAView = ["Upright","Supine","AP","Lateral","AP/LAT"];
            const arrExamSType = ["Thoracic Cage","Thoracic Spine","Thoraco Lumbar Spine","Lumbosacral","Sacral"];
            const arrExamSTView = ["AP","Lateral","AP/LAT","Oblique"];
            const arrExamUEType = ["Clavicle","Scapula","Shoulder","Humerus","Elbow Joint","Forearm","Wrist Joint","Hands/Fingers"]
            const arrExamUEView = ["AP","Lateral","AP/LAT","Oblique"];
            const arrExamLEType = ["Pelvic Bone","Hips","Knees","Femur","Ankle Joint","Foot", "Toes", "Thigh", "Legs"];
            const arrExamLEView = ["AP","Lateral","AP/LAT","Oblique"];

            // parent element
            let exam_type = $("#exam_type");
            let exam_view = $("#exam_view");

            switch (e.value) {
                case "Head & Neck":
                    removeFirstOption();
                    appendOption(arrExamHNType, arrExamHNView, e)
                    $('#findings').val(``);
                    $('#impression').val(``);
                    break;

                case "Chest":
                    removeFirstOption();
                    appendOption(arrExamCType, arrExamCView, e)
                    $('#findings').val(`No Active parenchymal infiltrates are seen.
The heart is normal in size.
Mediastinum, diaphragm, and bony thorax are unremarkable.`);
                    $('#impression').val(`Essentially Normal Chest.`);
                break;

                case "Abdominal":
                    removeFirstOption();
                    appendOption(arrExamAType, arrExamAView, e)
                    $('#findings').val(``);
                    $('#impression').val(``);
                break;

                case "Skeletal":
                    removeFirstOption();
                    appendOption(arrExamSType, arrExamSTView, e)
                    $('#findings').val(`Bony structures are intact.
Interverbral spaces and lordotic curved are well maintained.
Pedicle are within normal.`);
                    $('#impression').val(`Normal Lumbo-Sacral Spine study.`)
                break;

                case "Upper Extremities":
                    removeFirstOption();
                    appendOption(arrExamUEType, arrExamUEView, e)
                    $('#findings').val(``);
                    $('#impression').val(``);
                break;

                case "Lower Extremities":
                    removeFirstOption();
                    appendOption(arrExamLEType, arrExamLEView, e)
                    $('#findings').val(`No osseous or joint space abnormality`);
                    $('#impression').val(`Normal both knees.`)
                break;

                default:
                    break;
            }

            dispExam($('#exam_type').val());
        }

        function removeFirstOption() {
            $('#exam_type option').remove();
            $('#exam_view option').remove();
        }

        function appendOption(type, view, exam) {
            // append type option
            type.forEach(arr => {
                if(exam.value == "Skeletal") {
                    if(arr == 'Lumbosacral') {
                        return $(`<option value='${arr}' selected>${arr}</option>`).appendTo(exam_type);
                    } else {
                        return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_type);
                    }
                }

                if(exam.value == "Lower Extremities") {
                    if(arr == 'Knees') {
                        return $(`<option value='${arr}' selected>${arr}</option>`).appendTo(exam_type);
                    } else {
                        return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_type);
                    }
                }

                if(exam.value == "Chest") {
                    if(arr == 'Chest (Adult)') {
                        return $(`<option value='${arr}' selected>${arr}</option>`).appendTo(exam_type);
                    } else {
                        return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_type);
                    }
                }

                return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_type);

            });

            // append view option
            view.forEach(arr => {

                if(exam.value == "Skeletal" || exam.value == "Lower Extremities") {
                    if(arr == 'AP/LAT') {
                        return $(`<option value='${arr}' selected>${arr}</option>`).appendTo(exam_view);
                    } else {
                        return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_view);
                    }
                }

                return $(`<option value='${arr}'>${arr}</option>`).appendTo(exam_view);
            })
        }

        let exam = document.querySelector('#exam');

        window.addEventListener('load', () => {
           selectExam(exam);

           $(document).ready(function() {
                dispExam($('#exam_type').val());
            });
        });

        $('#exam_type').change(function() {
            dispExam($('#exam_type').val());
        });

        function dispExam(exam) {
            $('.skull_group').hide();
            $('.nasal_group').hide();
            $('.lumbosacral_group').hide();
            $('.knees_group').hide();
            $('.chest_group').hide();

            if(exam == 'Chest (Adult)') {
                $('.chest_group').show();
            }

            if(exam == 'Skull') {
                $('.skull_group').show();
            }

            if(exam == 'Nasal') {
                $('.nasal_group').show();
            }

            if(exam == 'Lumbosacral') {
                $('.lumbosacral_group').show();
            }

            if(exam == 'Knees') {
                $('.knees_group').show();
            }
        }


    </script>
@endpush


