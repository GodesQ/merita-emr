
<div class="row my-1">
    <div class="col-6">
        <a href="/edit_psychobpi?id={{$exam_psychobpi->admission_id}}"
            class="btn btn-solid btn-primary">Edit</a>
        <button
            onclick='window.open("/exam_psychobpi_print?id={{$exam_psychobpi->admission_id}}", "width=800,height=650").print()'
            class="btn btn-dark btn-solid"
            title="Print">Print</button>
    </div>
</div>
<table width="100%"
    class="table table-bordered table-responsive">
    <tbody>
        <tr>
            <td align="center" width="12%">
                <b>SCALE</b>
            </td>
            <td align="center" width="11%">
                <b>RS</b>
            </td>
            <td align="center" width="10%">
                <b>SS</b>
            </td>
            <td align="center" width="26%">
                <b>Low
                    Scorer
                    Description</b>
            </td>
            <td align="center" width="5%">
                <b>Score</b>
            </td>
            <td align="center" width="20%">
                <b>High
                    Scorer
                    Description</b>
            </td>
        </tr>
        <tr>
            <td align="center">Hypochondriasis
            </td>
            <td align="center">
                {{$exam_psychobpi->hypochondriasis_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->hypochondriasis_ss}}
            </td>
            <td align="center">Without any
                exccessive
                concerns <br>
                on
                his physical
                appearance.</td>
            <td align="center">
                {{$exam_psychobpi->hypochondriasis_scores}}
            </td>

            <td align="center">Preoccupied in
                concerns
                with his <br>
                physical appearance
                and dysfunction.</td>
        </tr>
        <tr>
            <td align="center">Depression</td>
            <td align="center">
                {{$exam_psychobpi->depression_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->depression_ss}}
            </td>
            <td align="center">Optimistic
                attitudes
                on
                the
                future 
                even <br> when
                experiencing disappointments.
            </td>
            <td align="center">
                {{$exam_psychobpi->depression_scores}}
            </td>
            <td align="center">Looks at the
                future
                pessimistically; <br>
                inclined to be
                down hearted.</td>
        </tr>
        <tr>
            <td align="center">Denial</td>
            <td align="center">
                {{$exam_psychobpi->denial_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->denial_ss}}
            </td>
            <td align="center">Accepts feelings
                as
                part
                of self <br>
                and
                can show normal
                affect.</td>
            <td align="center">
                {{$exam_psychobpi->denial_scores}}
            </td>
            <td align="center">Lacks insight
                into
                feelings and
                the <br>
                causes of
                behavior avoids unpleasant
                topics.
            </td>
        </tr>
        <tr>
            <td align="center">Interpersonal
                Problems
            </td>
            <td align="center">
                {{$exam_psychobpi->problem_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->problem_ss}}
            </td>
            <td align="center">Cooperates fully
                with
                other <br>
                people
                and readily
                accepts criticism.</td>
            <td align="center">
                {{$exam_psychobpi->problem_scores}}
            </td>
            <td align="center">Reacts against
                discipline
                and <br>
                criticism; annoyed by
                life inconveniences.</td>
        </tr>
        <tr>
            <td align="center">Allenation</td>
            <td align="center">
                {{$exam_psychobpi->allenation_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->allenation_ss}}
            </td>
            <td align="center">Normally displays
                ethical
                and
                social <br>
                responsible
                attitudes and behavior.</td>
            <td align="center">
                {{$exam_psychobpi->allenation_scores}}
            </td>
            <td align="center">Expresses
                attitudes
                differently <br>
                from
                common social
                codes.</td>
        </tr>
        <tr>
            <td align="center">Persecutory Ideas
            </td>
            <td align="center">
                {{$exam_psychobpi->ideas_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->ideas_ss}}
            </td>
            <td align="center">Trusts others and
                does
                not feel
                threatened.</td>
            <td align="center">
                {{$exam_psychobpi->ideas_scores}}
            </td>
            <td align="center">Believes that
                certain
                people are
                hostile <br> and tries
                to make life difficult and
                unpleasant.
            </td>
        </tr>
        <tr>
            <td align="center">Anxiety</td>
            <td align="center">
                {{$exam_psychobpi->anxiety_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->anxiety_ss}}
            </td>
            <td align="center">Can remain calm
                in an
                unexpected <br>
                situation;
                maintains self-control.</td>
            <td align="center">
                {{$exam_psychobpi->anxiety_scores}}
            </td>
            <td align="center">Afraid of novelty
                and
                of 
                the
                possibility <br> of physical
                or interpersonal danger.</td>
        </tr>
        <tr>
            <td align="center">Thinking Disorder
            </td>
            <td align="center">
                {{$exam_psychobpi->thinking_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->thinking_ss}}
            </td>
            <td align="center">Has no difficulty
                in
                concentrating <br>
                normally towards
                reality.</td>
            <td align="center">
                {{$exam_psychobpi->thinking_scores}}
            </td>
            <td align="center">Confused,
                distractable
                and <br>
                disorganized with
                thoughts</td>
        </tr>
        <tr>
            <td align="center">Impulse
                Expression
            </td>
            <td align="center">
                {{$exam_psychobpi->impulse_rs}}
            <td align="center">
                {{$exam_psychobpi->impulse_ss}}
            </td>
            <td align="center">
                <p>Has the patience to do
                    lengthy
                    and
                    tedious <br>
                    task;
                    considers future before
                    acting.
                </p>
            </td>
            <td align="center">
                {{$exam_psychobpi->impulse_scores}}
            </td>
            <td align="center">Prone to
                undertake
                risky
                and 
                reckless <br>
                actions.
                Behaves irresponsible,easily
                bored.
            </td>
        </tr>
        <tr>
            <td align="center">Social
                Introversion
            </td>
            <td align="center">
                {{$exam_psychobpi->social_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->social_ss}}
            </td>
            <td align="center">Enjoys the
                company of
                the <br>
                people
                around him/her.
            </td>
            <td align="center">
                {{$exam_psychobpi->social_scores}}
            </td>
            <td align="center">Avoids people
                generally; <br>
                uncomfortable around others
            </td>
        </tr>
        <tr>
            <td align="center">Self Depreciation
            </td>
            <td align="center">
                {{$exam_psychobpi->self_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->self_ss}}
            </td>
            <td align="center">Manifest a high
                degree of
                self-assurance <br> in dealing 
                with otthers; speaks with
                confidence.
            </td>
            <td align="center">
                {{$exam_psychobpi->self_scores}}
            </td>
            <td align="center">Degrades self of
                being
                worthless,and <br>
                expresses low
                opinion of self</td>
        </tr>
        <tr>
            <td align="center">Deviation</td>
            <td align="center">
                {{$exam_psychobpi->deviation_rs}}
            </td>
            <td align="center">
                {{$exam_psychobpi->deviation_ss}}
            </td>
            <td align="center">Displays behavior
                patterns
                similar to <br>
                those of a
                majority of people.</td>
            <td align="center">
                {{$exam_psychobpi->deviation_scores}}
            </td>
            <td align="center">Displays behavior
                patterns very <br>
                different from most
                people.</td>
        </tr>
    </tbody>
</table>