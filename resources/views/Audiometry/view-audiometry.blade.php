<div class="row my-2">
    <div class="col-6">
        <a href="/edit_audiometry?id={{$exam_audio->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_audiometry_print?id={{$exam_audio->admission_id}}").print()'
            class="btn btn-solid btn-dark">Print</button>
    </div>
</div>

<table width="100%" cellspacing="2"
    cellpadding="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td width="10%"><b><u>AIR</u></b>
            </td>
            <td align="center" width="10%">
                <b>250</b>
            </td>
            <td align="center" width="10%">
                <b>500</b>
            </td>
            <td align="center" width="10%">
                <b>750</b>
            </td>
            <td align="center" width="10%">
                <b>1000</b>
            </td>
            <td align="center" width="10%">
                <b>2000</b>
            </td>
            <td align="center" width="10%">
                <b>3000</b>
            </td>
            <td align="center" width="10%">
                <b>4000</b>
            </td>
            <td align="center" width="10%">
                <b>6000</b>
            </td>
            <td align="center" width="10%">
                <b>8000
                </b>
            </td>
        </tr>
        <tr>
            <td align="center"><b>Right Ear:</b>
            </td>
            <td align="center">
                {{$exam_audio->air_right1}}
            </td>
            <td align="center">
                {{$exam_audio->air_right2}}
            </td>
            <td align="center">
                {{$exam_audio->air_right3}}
            </td>
            <td align="center">
                {{$exam_audio->air_right4}}</td>
            <td align="center">
                {{$exam_audio->air_right5}}</td>
            <td align="center">
                {{$exam_audio->air_right6}}</td>
            <td align="center">
                {{$exam_audio->air_right7}}</td>
            <td align="center">
                {{$exam_audio->air_right8}}</td>
            <td align="center">
                {{$exam_audio->air_right9}}</td>
        </tr>
        <tr>
            <td align="center"><b>Left Ear:</b>
            </td>
            <td align="center">
                {{$exam_audio->air_left1}}</td>
            <td align="center">
                {{$exam_audio->air_left2}}</td>
            <td align="center">
                {{$exam_audio->air_left3}}</td>
            <td align="center">
                {{$exam_audio->air_left4}}</td>
            <td align="center">
                {{$exam_audio->air_left5}}</td>
            <td align="center">
                {{$exam_audio->air_left6}}</td>
            <td align="center">
                {{$exam_audio->air_left7}}</td>
            <td align="center">
                {{$exam_audio->air_left8}}</td>
            <td align="center">
                {{$exam_audio->air_left9}}</td>
        </tr>
        <tr>
            <td align="center" colspan="10">
                <b><u>BONE</u></b>
            </td>
        </tr>
        <tr>
            <td align="center"><b>Right Ear:</b>
            </td>
            <td align="center">
                {{$exam_audio->bone_right1}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right2}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right3}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right4}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right5}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right6}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right7}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right8}}
            </td>
            <td align="center">
                {{$exam_audio->bone_right9}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Left Ear:</b>
            </td>
            <td align="center">
                {{$exam_audio->bone_left1}}</td>
            <td align="center">
                {{$exam_audio->bone_left2}}</td>
            <td align="center">
                {{$exam_audio->bone_left3}}</td>
            <td align="center">
                {{$exam_audio->bone_left4}}</td>
            <td align="center">
                {{$exam_audio->bone_left5}}</td>
            <td align="center">
                {{$exam_audio->bone_left6}}</td>
            <td align="center">
                {{$exam_audio->bone_left7}}</td>
            <td align="center">
                {{$exam_audio->bone_left8}}</td>
            <td align="center">
                {{$exam_audio->bone_left9}}</td>
        </tr>
        <tr>
            <td align="center"><b><u>FREE
                        FIELD</u></b>
            </td>
            <td align="center">
                {{$exam_audio->free_field1}}
            </td>
            <td align="center">
                {{$exam_audio->free_field2}}
            </td>
            <td align="center">
                {{$exam_audio->free_field3}}
            </td>
            <td align="center">
                {{$exam_audio->free_field4}}
            </td>
            <td align="center">
                {{$exam_audio->free_field5}}
            </td>
            <td align="center">
                {{$exam_audio->free_field6}}
            </td>
            <td align="center">
                {{$exam_audio->free_field7}}
            </td>
            <td align="center">
                {{$exam_audio->free_field8}}
            </td>
            <td align="center">
                {{$exam_audio->free_field9}}
            </td>
        </tr>
    </tbody>
</table>
<table width="100%" cellspacing="2"
    cellpadding="2" class="table">
    <tbody>
        <tr>
            <td align="center" width="50%">
                <table width="80%"
                    cellpadding="2"
                    cellspacing="0" class="">
                    <tbody>
                        <tr>
                            <td align="center"
                                colspan="4">
                                <b>SPEECH
                                    AUDIOMETRY</b>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"
                                width="68">
                                &nbsp;
                            </td>
                            <td align="center"
                                width="72">RIGHT
                            </td>
                            <td align="center"
                                width="73">LEFT
                            </td>
                            <td align="center"
                                width="71">FF
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                SRT
                            </td>
                            <td align="center">
                                {{$exam_audio->srt_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->srt_left}}
                            </td>
                            <td align="center">
                                {{$exam_audio->srt_ff}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                SD
                            </td>
                            <td align="center">
                                {{$exam_audio->sd_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->sd_left}}
                            </td>
                            <td align="center">
                                {{$exam_audio->sd_ff}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                MCL
                            </td>
                            <td align="center">
                                {{$exam_audio->mcl_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->mcl_left}}
                            </td>
                            <td align="center">
                                {{$exam_audio->mcl_ff}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                TOL
                            </td>
                            <td align="center">
                                {{$exam_audio->tol_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->tol_left}}
                            </td>
                            <td align="center">
                                {{$exam_audio->tol_ff}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td align="center" width="50%">
                <table width="80%"
                    cellpadding="2"
                    cellspacing="0">
                    <tbody>
                        <tr>
                            <td align="center"
                                colspan="3">
                                <b>TYMPANOMETRY
                                    TEST</b>
                            </td>
                        </tr>
                        <tr>
                            <td align="center"
                                width="68">
                                &nbsp;
                            </td>
                            <td align="center"
                                width="72">RIGHT
                            </td>
                            <td align="center"
                                width="73">LEFT
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                TYPE
                            </td>
                            <td align="center">
                                {{$exam_audio->type_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->type_left}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                ECV
                            </td>
                            <td align="center">
                                {{$exam_audio->ecv_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->ecv_left}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                COMPLIANCE</td>
                            <td align="center">
                                {{$exam_audio->comp_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->comp_left}}
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                PRESSURE
                            </td>
                            <td align="center">
                                {{$exam_audio->press_right}}
                            </td>
                            <td align="center">
                                {{$exam_audio->press_left}}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2"><b>
                    Remarks:</b> <br>
                {{$exam_audio->remarks }}
            </td>
        </tr>
    </tbody>
</table>