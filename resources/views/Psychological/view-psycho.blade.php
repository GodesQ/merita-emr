<div class="row my-1">
    <div class="col-6">
        <a href="edit_psycho?id={{$exam_psycho->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_psycho_print?id={{$exam_psycho->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%" cellspacing="0"
    cellpadding="0" class="table">
    <tbody>
        <tr>
            <td align="center" width="19%">
                <b>Test
                    Administered</b>
            </td>
            <td align="center" width="25%">
                {{$exam_psycho->test_administered}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Intellectual
                    Level</b>
            </td>
            <td align="center" colspan="4">
                <div class="col-md-8">
                    {{$exam_psycho->intellectual}}
                </div>
            </td>
        </tr>
    </tbody>
</table>
<center>
    <table align="center" width="321"
    cellpadding="5" cellspacing="2"
    style="border: 2px black solid;"
    class="my-2 mx-1">
    <tbody>
        <tr>
            <td colspan="3"><b>LEGEND </b></td>
        </tr>
        <tr>
            <td width="37">&nbsp;</td>
            <td width="130" align="top">1-Very
                Low<br>
                2-Low<br>
                3-Low Average<br>
                4-Average<br></td>
            <td width="112" align="top">5-High
                Average<br>
                6-High<br>
                7-Very High</td>
        </tr>
    </tbody>
    </table>
</center>
<div class="row">
    <div class="col-md-12 col-xl-6">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <b>Sense of
                            Responsibility</b>
                    </td>
                </tr>
                <tr>
                    <td>Perseverance</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->responsibility1}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Obedience</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->responsibility2}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Self-discipline /
                        Orderly
                    </td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->responsibility3}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Enthusiasm</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->responsibility4}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Initiative</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->responsibility5}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 col-xl-6">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"
                        bgcolor="#ececec">
                        <b>Emotional
                            Stability</b>
                    </td>
                </tr>
                <tr>
                    <td>Can withstand boredom
                        and
                        work alone
                    </td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->stability1}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Tolerance to stress,
                        pressure
                        and
                        inconveniences
                    </td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->stability2}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Faces reality</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->stability3}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Confidence</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->stability4}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Relaxed</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->stability5}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xl-6">
        <table width="80%" cellpadding="0"
            cellspacing="1"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"
                        bgcolor="#ececec">
                        <b>Objectivity</b>
                    </td>
                </tr>
                <tr>
                    <td width="83%">
                        Tough-mindedness
                    </td>
                    <td width="17%">
                        <div class="col-md-10">
                            {{$exam_psycho->objectivity1}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Adaptability</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->objectivity2}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Practicality</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->objectivity3}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 col-xl-6">
        <table width="80%" cellpadding="0"
            cellspacing="1"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"
                        bgcolor="#ececec">
                        <b>Interpersonal and
                            Personal
                            Adjustment</b>
                    </td>
                </tr>
                <tr>
                    <td width="83%">Relationship
                        with
                        Peers
                        and Co-workers
                        (Teamsmanship)</td>
                    <td width="17%">
                        <div class="col-md-10">
                            {{$exam_psycho->adjustment1}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Relationship with
                        Superiors,
                        Employers and Authority
                        Figures (Deference)</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->adjustment2}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Self-esteem</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->adjustment3}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Aggressive tendencies
                    </td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->adjustment4}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-xl-6">
        <table width="80%" cellpadding="0"
            cellspacing="1"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"
                        bgcolor="#ececec">
                        <b>Motivation</b>
                    </td>
                </tr>
                <tr>
                    <td width="83%">
                        Assertiveness
                    </td>
                    <td width="17%">
                        <div class="col-md-10">
                            {{$exam_psycho->motivation1}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Independence</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->motivation2}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Resourcefulness</td>
                    <td>
                        <div class="col-md-10">
                            {{$exam_psycho->motivation3}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12 col-xl-6">
        <table width="80%" cellpadding="0"
            cellspacing="1"
            class="table table-bordered">
            <tbody>
                <tr>
                    <td colspan="2"
                        bgcolor="#ececec">
                        <b>Goal
                            Orientation</b>
                    </td>
                </tr>
                <tr>
                    <td width="83%">Directs
                        one's
                        effort
                        towards clear cut
                        objective</td>
                    <td width="17%">
                        <div class="col-md-10">
                            {{$exam_psycho->goal1}}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<table width="100%" cellspacing="0"
    cellpadding="2" class="table">
    <tbody>
        <tr>
            <td align="center" width="13%">
                <b>Conclusion:</b>
            </td>
            <td align="center">
                {{$exam_psycho->conclusion}}
            </td>
        </tr>
        <tr>
            <td align="center"><b>Remarks:</b>
            </td>
            <td align="center" width="87%">
                {{$exam_psycho->remarks}}
            </td>
        </tr>
    </tbody>
</table>