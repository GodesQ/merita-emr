<div class="row my-1">
    <div class="col-6">
        <a href="/edit_urinalysis?id={{$examlab_urin->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_urinalysis_print?id={{$examlab_urin->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <table width="100%" border="0"
            cellpadding="2" cellspacing="2"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td width="186">
                        <b>MACROSCOPIC</b>
                    </td>
                    <td width="387"><span
                            class="brdBtm"><b>RESULTS</b></span>
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdAll">
                        Color</td>
                    <td>
                        {{$examlab_urin->color}}
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdAll">
                        Transparency
                    </td>
                    <td>
                        {{$examlab_urin->transparency}}
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdAll">
                        pH
                    </td>
                    <td>{{$examlab_urin->ph}}
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdAll">
                        Specific
                        Gravity
                    </td>
                    <td>{{$examlab_urin->spgravity}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Sugar</td>
                    <td>{{$examlab_urin->sugar}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Protein/Albumin</td>
                    <td>{{$examlab_urin->albumin}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Ketone</td>
                    <td>{{$examlab_urin->ketone}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Urobilinogen</td>
                    <td>{{$examlab_urin->urobilinogen}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Bilirubin</td>
                    <td>{{$examlab_urin->bilirubin}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Nitrite</td>
                    <td>{{$examlab_urin->nitrite}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Leukocyte</td>
                    <td>{{$examlab_urin->leukocyte}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdAll">
                        Blood Cell</td>
                    <td>{{$examlab_urin->blood}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table width="100%" border="0"
            cellpadding="2" cellspacing="2"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td width="24%">
                        <b>MICROSCOPIC</b>
                    </td>
                    <td><span
                            class="brdLeftBtm"><b>RESULTS</b></span>
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdLeft">Pus
                        Cells
                    </td>
                    <td>
                        {{$examlab_urin->pus}}
                    </td>
                </tr>
                <tr>
                    <td valign="top"
                        class="brdLeft">RBC
                    </td>
                    <td width="49%">
                        {{$examlab_urin->rbc}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdLeft">
                        Epithelial Cells</td>
                    <td>
                        {{$examlab_urin->epithelial}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdLeftTop">
                        Amorphous Urates</td>
                    <td>
                        {{$examlab_urin->urates}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdLeft">
                        Amorphous Phosphates
                    </td>
                    <td>
                        {{$examlab_urin->phosphates}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdLeft">
                        Mucus Threads</td>
                    <td>
                        {{$examlab_urin->mucus}}
                    </td>
                </tr>
                <tr>
                    <td height="30" valign="top"
                        class="brdLeft">
                        Bacteria</td>
                    <td>
                        {{$examlab_urin->bacteria}}
                    </td>
                </tr>
                <tr>
                    <td class="brdLeft">Others
                    </td>
                    <td colspan="2">
                        {{$examlab_urin->others}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>