<div class="row my-1">
    <div class="col-6">
        <a href="edit_ultrasound?id={{$exam_ultrasound->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_ultrasound_print?id={{$exam_ultrasound->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="4"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td><b>TYPE OF EXAM</b></td>
            <td>
                <select name="exam_type"
                    id="exam_type"
                    class="form-control"
                    style="width:200px"
                    disabled>
                    <option value="">--SELECT--
                    </option>
                    <option value="KUB" @php
                        echo $exam_ultrasound->
                        exam_type == "KUB" ?
                        "selected=''" : ""
                        @endphp>KUB</option>
                    <option value="HBT" @php
                        echo $exam_ultrasound->
                        exam_type == "HBT" ?
                        "selected=''" : ""
                        @endphp>HBT</option>
                    <option value="THYROID" @php
                        echo $exam_ultrasound->
                        exam_type ==
                        "THYROID"
                        ?
                        "selected=''" : ""
                        @endphp>THYROID
                    </option>
                    <option value="BREAST" @php
                        echo $exam_ultrasound->
                        exam_type
                        ==
                        "BREAST"
                        ?
                        "selected=''" : ""
                        @endphp>BREAST
                    </option>
                    <option
                        value="WHOLE ABDOMEN"
                        @php echo
                        $exam_ultrasound->
                        exam_type
                        == "WHOLE
                        ABDOMEN" ? "selected=''"
                        :
                        ""
                        @endphp>WHOLE
                        ABDOMEN</option>
                    <option value="GENITALS"
                        @php echo
                        $exam_ultrasound->
                        exam_type ==
                        "GENITALS" ?
                        "selected=''" : ""
                        @endphp>GENITALS
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="20%">&nbsp;</td>
            <td width="80%"><b>RESULT </b></td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="divKUB"
                    style="display: block;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>KIDNEY</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->kidney}}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    valign="top">
                                    <b>URETER/URINARY
                                        BLADDER</b>
                                </td>
                                <td>{{$exam_ultrasound->urinary_bladder}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divHBT"
                    style="display: none;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>LIVER</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->liver}}
                                </td>
                            </tr>
                            <tr>
                                <td
                                    valign="top">
                                    <b>GALLBLADDER</b>
                                </td>
                                <td>{{$exam_ultrasound->urinary_bladder}}
                                </td>
                            </tr>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>PANCREAS</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->pancreas}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divTHYROID"
                    style="display: none;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>THYROID</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->thyroid}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divBREAST"
                    style="display: none;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>BREAST</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->breast}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divABDOMEN"
                    style="display: none;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>WHOLE
                                        ABDOMEN</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->abdomen}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divGENITALS"
                    style="display: none;">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>GENITALS</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->genitals}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divIMPRESSION">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td width="20%"
                                    valign="top">
                                    <b>IMPRESSION</b>
                                </td>
                                <td width="80%">
                                    {{$exam_ultrasound->impression}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>
    </tbody>
</table>