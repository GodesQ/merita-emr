<div class="row my-1">
    <div class="col-6">
        <a href="/edit_misc?id={{$examlab_misc->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/examlab_misc_print?id={{$examlab_misc->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" border="0" cellpadding="2"
    cellspacing="2"
    class="table table-bordered">
    <tbody>
        <tr>
            <td align="left"><b>EXAM</b></td>
            <td>
                {{$examlab_misc->exam}}
            </td>
        </tr>
        <tr>
            <td width="12%" align="left">
                <b>RESULT</b>
            </td>
            <td width="88%">@php echo
                nl2br($examlab_misc->result)
                @endphp</td>
        </tr>
        <tr>
            <td colspan="2" align="left">
                <table width="100%"
                    class="table table-bordered"
                    cellspacing="2"
                    cellpadding="4">
                    <tbody>
                        <tr>
                            <td width="34%">
                                <b>COLUMN1</b>
                            </td>
                            <td width="34%">
                                <b>COLUMN2</b>
                            </td>
                            <td width="32%">
                                <b>COLUMN3</b>
                            </td>
                        </tr>
                        <tr>
                            <td>@php echo
                                nl2br($examlab_misc->col1)
                                @endphp</td>
                            <td>@php echo
                                nl2br($examlab_misc->col2)
                                @endphp</td>
                            <td>@php echo
                                nl2br($examlab_misc->col3)
                                @endphp</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>