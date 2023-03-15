<div class="row">
    <div class="row my-2">
        <div class="col-6">
            <a href="edit_dental?id={{$exam_dental->admission_id}}"
                class="btn btn-solid btn-primary">Edit</a>
            <button
                onclick='window.open("/exam_dental_print?id={{$exam_dental->admission_id}}").print()'
                class="btn btn-dark btn-solid">Print</button>
        </div>
    </div>
    <div class="col-md-12">
        <table width="50%" border="0"
            cellpadding="1" cellspacing="0"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="7"
                        align="center">
                        <b><u>SHORT
                                MEDICAL
                                HISTORY</u></b>
                    </td>
                </tr>
                <tr>
                    <td width="181" height="27">
                        <b>ORAL
                            HYGIENE
                        </b>
                    </td>
                    <td colspan="2">
                        {{$exam_dental->hygiene}}
                    </td>
                </tr>
                <tr>
                    <td height="29"><b>GINGIVA
                            CONSISTENCY</b>
                    </td>
                    <td colspan="2">
                        {{$exam_dental->gingiva}}
                    </td>
                </tr>
                <tr>
                    <td height="27"><b>COLOR</b>
                    </td>
                    <td colspan="2">
                        {{$exam_dental->color}}
                    </td>
                </tr>
                <tr>
                    <td height="27">
                        <b>TONGUE</b>
                    </td>
                    <td colspan="2">
                        {{$exam_dental->tongue}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <table width="100%" border="1"
            align="center" cellpadding="5"
            cellspacing="0"
            style="font-size: 10px;"
            class="table">
            <tbody>
                <tr>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth18}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth17}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth16}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth15}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth14}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth13}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth12}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth11}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth21}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth22}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth23}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth24}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth25}}
                    </td>
                    <td width="3%"
                        align="center">
                        {{$exam_dental->tooth26}}
                    </td>
                    <td width="4%"
                        align="center">
                        {{$exam_dental->tooth27}}
                    </td>
                    <td width="54%"
                        align="center">
                        {{$exam_dental->tooth28}}
                    </td>
                </tr>
                <tr>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno18.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno17.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno15.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno15.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno14.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno13.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno12.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno11.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno21.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno22.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno23.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno24.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno25.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno26.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno27.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno28.jpg" width="20px" alt="">
                    </td>
                </tr>
                <tr>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition18}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition17}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition16}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition15}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition14}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition13}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition12}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition11}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition21}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition22}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition23}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition24}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition25}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition26}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition27}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition28}}
                    </td>
                </tr>
                <tr>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition48}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition47}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition46}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition45}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition44}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition43}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition42}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition41}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition38}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition37}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition36}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition35}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition34}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition33}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition32}}
                    </td>
                    <td align="center"
                        valign="middle">
                        {{$exam_dental->dentition31}}
                    </td>
                </tr>
                <tr>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno48.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno47.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno46.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno45.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno44.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno43.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno42.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno41.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno31.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno32.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno33.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno34.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno35.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno36.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno37.jpg" width="20px" alt="">
                    </td>
                    <td align="center"
                        valign="top">
                        <img src="../../../app-assets/images/dental/tno38.jpg" width="20px" alt="">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        {{$exam_dental->tooth48}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth47}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth46}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth45}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth44}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth43}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth42}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth41}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth31}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth32}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth33}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth34}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth35}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth36}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth37}}
                    </td>
                    <td align="center">
                        {{$exam_dental->tooth38}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>