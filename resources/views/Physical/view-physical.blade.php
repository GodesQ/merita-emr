<style>
.nav.nav-tabs.nav-top-border .nav-item a.nav-link.active {
    border-top: 3px solid #00b5b8;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    color: #555;
}
</style>
<div class="row">
<div class="col-6">
    <a href="edit_physical?id={{$exam_physical->admission_id}}"
        class="btn btn-solid btn-primary">Edit</a>
    <button
        onclick='window.open("/exam_physical_print?id={{$exam_physical->admission_id}}", "width=800,height=650").print()'
        class="btn btn-dark btn-solid"
        title="Print">Print</button>
</div>
</div>

    <ul class="nav nav-tabs nav-top-border mt-1 no-hover-bg"
        role="tablist">
        <li class="nav-item">
            <a class="nav-link primary active"
                id="base-tab10"
                data-toggle="tab"
                aria-controls="tab10"
                href="#tab10" role="tab"
                aria-selected="true">Medical
                History
                1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link primary"
                id="base-tab11"
                data-toggle="tab"
                aria-controls="tab11"
                href="#tab11" role="tab"
                aria-selected="true">Medical
                History
                2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link primary"
                id="base-tab12"
                data-toggle="tab"
                aria-controls="tab12"
                href="#tab12" role="tab"
                aria-selected="false">Medical
                History 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link primary"
                id="base-tab13"
                data-toggle="tab"
                aria-controls="tab13"
                href="#tab13" role="tab"
                aria-selected="false">Physical
                Examination
                1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link primary"
                id="base-tab14"
                data-toggle="tab"
                aria-controls="tab14"
                href="#tab14" role="tab"
                aria-selected="false">Physical
                Examination
                2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link primary"
                id="base-tab15"
                data-toggle="tab"
                aria-controls="tab15"
                href="#tab15" role="tab"
                aria-selected="false">Physical
                Examination
                3</a>
        </li>
    </ul>
    <div class="tab-content px-1 pt-1">
        <div class="tab-pane active"
            id="tab10" role="tabpanel"
            aria-labelledby="base-tab10">
            <table
                class="table table-bordered table-responsive"
                width="100%">
                <tbody>
                    <tr>
                        <td colspan="6"
                            align="center">
                            <b>PAST
                                MEDICAL
                                HISTORY</b>:
                            has
                            applicant
                            suffered
                            from
                            been
                            told he
                            has any of the
                            following
                            (<b>Answer
                                YES</b>
                            or
                            <b>NO</b>).(to
                            be answered by
                            patient.)
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Head
                            or
                            Neck Injury</td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick1"
                                type="radio"
                                id="sick1"
                                value="1"
                                @php echo
                                $exam_physical->sick1
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick1
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick1"
                                type="radio"
                                id="sick1"
                                value="0"
                                @php echo
                                $exam_physical->sick1
                            ==
                            "No" ||
                            $exam_physical->sick1
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Other
                            Lung Disorders
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick11"
                                type="radio"
                                id="sick11"
                                value="1"
                                @php echo
                                $exam_physical->sick11
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick11
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick11"
                                type="radio"
                                id="sick11"
                                value="0"
                                @php echo
                                $exam_physical->sick11
                            ==
                            "No"
                            ||
                            $exam_physical->sick11
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Kidney or
                            Bladder Disorder
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick22"
                                type="radio"
                                id="sick22"
                                value="1"
                                @php echo
                                $exam_physical->sick22
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick22
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick22"
                                type="radio"
                                id="sick22"
                                value="0"
                                @php echo
                                $exam_physical->sick22
                            ==
                            "No"
                            ||
                            $exam_physical->sick22
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            height="33"
                            align="center">
                            Frequency
                            Headaches
                        </td>
                        <td align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick2"
                                type="radio"
                                id="sick2"
                                value="1"
                                @php echo
                                $exam_physical->sick2
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick2
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick2"
                                type="radio"
                                id="sick2"
                                value="0"
                                @php echo
                                $exam_physical->sick2
                            ==
                            "No" ||
                            $exam_physical->sick2
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            High
                            Blood Pressure
                        </td>
                        <td align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick12"
                                type="radio"
                                id="sick12"
                                value="1"
                                @php echo
                                $exam_physical->sick12
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick12
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick12"
                                type="radio"
                                id="sick12"
                                value="0"
                                @php echo
                                $exam_physical->sick12
                            ==
                            "No"
                            ||
                            $exam_physical->sick12
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Back
                            Injury, Joint <br>
                            Pain/Arthritis/Rheumatic
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick23"
                                type="radio"
                                id="sick23"
                                value="1"
                                @php echo
                                $exam_physical->sick23
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick23
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick23"
                                type="radio"
                                id="sick23"
                                value="0"
                                @php echo
                                $exam_physical->sick23
                            ==
                            "No"
                            ||
                            $exam_physical->sick23
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Frequency
                            Dizziness</td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick3"
                                type="radio"
                                id="sick3"
                                value="1"
                                @php echo
                                $exam_physical->sick3
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick3
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick3"
                                type="radio"
                                id="sick3"
                                value="0"
                                @php echo
                                $exam_physical->sick3
                            ==
                            "No" ||
                            $exam_physical->sick3
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Heart
                            Disease/Chest
                            Pain
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick13"
                                type="radio"
                                id="sick13"
                                value="1"
                                @php echo
                                $exam_physical->sick13
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick13
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick13"
                                type="radio"
                                id="sick13"
                                value="0"
                                @php echo
                                $exam_physical->sick13
                            ==
                            "No"
                            ||
                            $exam_physical->sick13
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Genetic,
                            Hereditary or <br>
                            Familial
                            Disorders
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick24"
                                type="radio"
                                id="sick24"
                                value="1"
                                @php echo
                                $exam_physical->sick24
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick24
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick24"
                                type="radio"
                                id="sick24"
                                value="0"
                                @php echo
                                $exam_physical->sick24
                            ==
                            "No"
                            ||
                            $exam_physical->sick24
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Fainting
                            Spells,Fits,
                            Seizures or <br>
                            Other
                            Neurological
                            Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick4"
                                type="radio"
                                id="sick4"
                                value="1"
                                @php echo
                                $exam_physical->sick4
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick4
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick4"
                                type="radio"
                                id="sick4"
                                value="0"
                                @php echo
                                $exam_physical->sick4
                            ==
                            "No" ||
                            $exam_physical->sick24
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Rheumatic
                            Fever</td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick14"
                                type="radio"
                                id="sick14"
                                value="1"
                                @php echo
                                $exam_physical->sick14
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick14
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick14"
                                type="radio"
                                id="sick14"
                                value="0"
                                @php echo
                                $exam_physical->sick14
                            ==
                            "No"
                            ||
                            $exam_physical->sick14
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Sexually
                            Transmitted <br>
                            Diseases
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick25"
                                type="radio"
                                id="sick25"
                                value="1"
                                @php echo
                                $exam_physical->sick25
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick25
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick25"
                                type="radio"
                                id="sick25"
                                value="0"
                                @php echo
                                $exam_physical->sick25
                            ==
                            "No"
                            ||
                            $exam_physical->sick25
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Insomia
                            Or Sleep
                            Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick5"
                                type="radio"
                                id="sick5"
                                value="1"
                                @php echo
                                $exam_physical->sick5
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick5
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick5"
                                type="radio"
                                id="sick5"
                                value="0"
                                @php echo
                                $exam_physical->sick5
                            ==
                            "No" ||
                            $exam_physical->sick5
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Diabetes
                            Mellitus</td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick15"
                                type="radio"
                                id="sick15"
                                value="1"
                                @php echo
                                $exam_physical->sick15
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick15
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick15"
                                type="radio"
                                id="sick15"
                                value="0"
                                @php echo
                                $exam_physical->sick15
                            ==
                            "No"
                            ||
                            $exam_physical->sick15
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Tropical
                            Diseases
                            <br>(e.g.Malaria,  Filariaris <br>
                            Schistosomiasis - <br>
                            Specific Date)
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick26"
                                type="radio"
                                id="sick26"
                                value="1"
                                @php echo
                                $exam_physical->sick26
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick26
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick26"
                                type="radio"
                                id="sick26"
                                value="0"
                                @php echo
                                $exam_physical->sick26
                            ==
                            "No"
                            ||
                            $exam_physical->sick26
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Depression,Other
                            Mental
                            Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick6"
                                type="radio"
                                id="sick6"
                                value="1"
                                @php echo
                                $exam_physical->sick6
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick6
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick6"
                                type="radio"
                                id="sick6"
                                value="0"
                                @php echo
                                $exam_physical->sick6
                            ==
                            "No" ||
                            $exam_physical->sick6
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Other
                            Endocrine <br>
                            Disorders(e.g.Goiter)
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick16"
                                type="radio"
                                id="sick16"
                                value="1"
                                @php echo
                                $exam_physical->sick16
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick16
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick16"
                                type="radio"
                                id="sick16"
                                value="0"
                                @php echo
                                $exam_physical->sick16
                            ==
                            "No"
                            ||
                            $exam_physical->sick16
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Asthma
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick27"
                                type="radio"
                                id="sick27"
                                value="1"
                                @php echo
                                $exam_physical->sick27
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick27
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick27"
                                type="radio"
                                id="sick27"
                                value="0"
                                @php echo
                                $exam_physical->sick27
                            ==
                            "No"
                            ||
                            $exam_physical->sick27
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Trachoma,Other
                            Eye
                            Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick7"
                                type="radio"
                                id="sick7"
                                value="1"
                                @php echo
                                $exam_physical->sick7
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick7
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick7"
                                type="radio"
                                id="sick7"
                                value="0"
                                @php echo
                                $exam_physical->sick7
                            ==
                            "No" ||
                            $exam_physical->sick7
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Cancer or
                            Tumor</td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick17"
                                type="radio"
                                id="sick17"
                                value="1"
                                @php echo
                                $exam_physical->sick17
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick17
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick17"
                                type="radio"
                                id="sick17"
                                value="0"
                                @php echo
                                $exam_physical->sick17
                            ==
                            "No"
                            ||
                            $exam_physical->sick17
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Allergies(Specify)<br><input
                                disabled
                                name="allergies"
                                type="input"
                                id="allergies"
                                value="{{$exam_physical->allergies}}">
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick30"
                                type="radio"
                                id="sick30"
                                value="1"
                                @php echo
                                $exam_physical->sick30
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick30
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick30"
                                type="radio"
                                id="sick30"
                                value="0"
                                @php echo
                                $exam_physical->sick30
                            ==
                            "No"
                            ||
                            $exam_physical->sick30
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>

                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Deafness,
                            Other Ear
                            Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick8"
                                type="radio"
                                id="sick8"
                                value="1"
                                @php echo
                                $exam_physical->sick8
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick8
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick8"
                                type="radio"
                                id="sick8"
                                value="0"
                                @php echo
                                $exam_physical->sick8
                            ==
                            "No" ||
                            $exam_physical->sick8
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Blood
                            Disorders</td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick18"
                                type="radio"
                                id="sick18"
                                value="1"
                                @php echo
                                $exam_physical->sick18
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick18
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick18"
                                type="radio"
                                id="sick18"
                                value="0"
                                @php echo
                                $exam_physical->sick18
                            ==
                            "No"
                            ||
                            $exam_physical->sick18
                            == "0" ?
                            "checked" :
                            ""
                            @endphp >
                        </td>
                        <td align="center">
                            Operations
                            (Specify)
                            <br><input
                                name="operations"
                                disabled
                                type="input"
                                id="operations"
                                value="{{$exam_physical->operations}}">
                        </td>
                        <td align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick31"
                                type="radio"
                                id="sick31"
                                value="1"
                                @php echo
                                $exam_physical->sick31
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick31
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick31"
                                type="radio"
                                id="sick31"
                                value="0"
                                @php echo
                                $exam_physical->sick31
                            ==
                            "No"
                            ||
                            $exam_physical->sick31
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Nose
                            or
                            Throat Disorders
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick9"
                                type="radio"
                                id="sick9"
                                value="1"
                                @php echo
                                $exam_physical->sick9
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick9
                            ==
                            "1" ?
                            "checked" : ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick9"
                                type="radio"
                                id="sick9"
                                value="0"
                                @php echo
                                $exam_physical->sick9
                            ==
                            "No" ||
                            $exam_physical->sick9
                            ==
                            "0" ?
                            "checked" : ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Stomach
                            Pain, Gastritis
                            or
                            Ulcer
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick19"
                                type="radio"
                                id="sick19"
                                value="1"
                                @php echo
                                $exam_physical->sick19
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick19
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick19"
                                type="radio"
                                id="sick19"
                                value="0"
                                @php echo
                                $exam_physical->sick19
                            ==
                            "No"
                            ||
                            $exam_physical->sick19
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="146"
                            align="center">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            Tuberculosis
                        </td>
                        <td width="90"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick10"
                                type="radio"
                                id="sick10"
                                value="1"
                                @php echo
                                $exam_physical->sick10
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick10
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick10"
                                type="radio"
                                id="sick10"
                                value="0"
                                @php echo
                                $exam_physical->sick10
                            ==
                            "No"
                            ||
                            $exam_physical->sick10
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="154"
                            align="center">
                            Other
                            Abdominal
                            Disorders
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick20"
                                type="radio"
                                id="sick20"
                                value="1"
                                @php echo
                                $exam_physical->sick20
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick20
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick20"
                                type="radio"
                                id="sick20"
                                value="0"
                                @php echo
                                $exam_physical->sick20
                            ==
                            "No"
                            ||
                            $exam_physical->sick20
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Hepatitis
                            A,B,C</td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick28"
                                type="radio"
                                id="sick28"
                                value="1"
                                @php echo
                                $exam_physical->sick28
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick28
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick28"
                                type="radio"
                                id="sick28"
                                value="0"
                                @php echo
                                $exam_physical->sick28
                            ==
                            "No"
                            ||
                            $exam_physical->sick28
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td width="154"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="90"
                            align="right">
                        </td>
                        <td width="154"
                            align="center">
                            Gynaecological
                            Disorders
                        </td>
                        <td width="96"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick21"
                                type="radio"
                                id="sick21"
                                value="1"
                                @php echo
                                $exam_physical->sick21
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick21
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick21"
                                type="radio"
                                id="sick21"
                                value="0"
                                @php echo
                                $exam_physical->sick21
                            ==
                            "No"
                            ||
                            $exam_physical->sick21
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td width="132"
                            align="center">
                            Last
                            Menstrual Period
                        </td>
                        <td width="146"
                            align="center">
                            <label
                                for="checkbox">YES</label>
                            <input disabled
                                name="sick29"
                                type="radio"
                                id="sick29"
                                value="1"
                                @php echo
                                $exam_physical->sick29
                            ==
                            "Yes"
                            ||
                            $exam_physical->sick29
                            == "1" ?
                            "checked" :
                            ""
                            @endphp>
                            <label
                                for="checkbox">NO</label>
                            <input disabled
                                name="sick29"
                                type="radio"
                                id="sick29"
                                value="0"
                                @php echo
                                $exam_physical->sick29
                            ==
                            "No"
                            ||
                            $exam_physical->sick29
                            == "0" ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Others
                        </td>
                        <td colspan="5">
                            <textarea
                                disabled
                                name="others"
                                cols="20"
                                rows="2"
                                id="others"
                                class="form-control">{{$exam_physical->others}}</textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab11"
            role="tabpanel"
            aria-labelledby="base-tab11">
            <table width="100%" border="0"
                cellpadding="0"
                cellspacing="5"
                class="table table-responsive">
                <tbody>
                    <tr>
                        <td width="525"
                            height="88"
                            colspan="4"
                            valign="top">
                            <table
                                width="100%"
                                border="0"
                                cellpadding="0"
                                cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td
                                            height="20">
                                            &nbsp;
                                        </td>
                                        <td height="20"
                                            valign="bottom">
                                            1.Have
                                            you
                                            ever
                                            been
                                            signed
                                            off
                                            as
                                            sick
                                            or
                                            repatriated
                                            from
                                            a
                                            ship?
                                        </td>
                                        <td width="48"
                                            align="center"
                                            valign="bottom">
                                            <input
                                                disabled
                                                name="question1"
                                                type="radio"
                                                id="question1"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question1
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question1
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td width="43"
                                            align="center"
                                            valign="bottom">
                                            <input
                                                disabled
                                                name="question1"
                                                type="radio"
                                                id="question1"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question1
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question1
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>2.
                                            Have
                                            you
                                            ever
                                            been
                                            hospitalized?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question2"
                                                type="radio"
                                                id="question2"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question2
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question2
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question2"
                                                type="radio"
                                                id="question2"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question2
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question2
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>3.Have
                                            you
                                            ever
                                            been
                                            declared
                                            unfit
                                            sea
                                            duty?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question3"
                                                type="radio"
                                                id="question3"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question3
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question3
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question3"
                                                type="radio"
                                                id="question3"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question3
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question3
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>4.Has
                                            your
                                            medical
                                            certificate
                                            ever
                                            been
                                            restricted
                                            or
                                            revoked?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question4"
                                                type="radio"
                                                id="question4"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question4
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question4
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question4"
                                                type="radio"
                                                id="question4"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question4
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question4
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            width="15">
                                            &nbsp;
                                        </td>
                                        <td
                                            width="434">
                                            5.Are
                                            you
                                            aware
                                            that
                                            you
                                            have
                                            any
                                            medical
                                            problem,
                                            disease
                                            or
                                            illness?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question5"
                                                type="radio"
                                                id="question5"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question5
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question5
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question5"
                                                type="radio"
                                                id="question5"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question5
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question5
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>6.Do
                                            you
                                            feel
                                            healthy
                                            and
                                            fit
                                            to
                                            perform
                                            the
                                            duties
                                            of
                                            your
                                            designated
                                            position/occupation?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question6"
                                                type="radio"
                                                id="question6"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question6
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question6
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question6"
                                                type="radio"
                                                id="question6"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question6
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question6
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>7.Are
                                            you
                                            allergic
                                            to
                                            any
                                            medication?
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question7"
                                                type="radio"
                                                id="question7"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question7
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question7
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                        <td
                                            align="center">
                                            <input
                                                disabled
                                                name="question7"
                                                type="radio"
                                                id="question7"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question7
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question7
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            ""
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td>Comments:
                                            <textarea
                                                disabled
                                                name="comments"
                                                cols="40"
                                                rows="2"
                                                id="comments"
                                                class="form-control">{{$exam_physical->comments}}</textarea>
                                        </td>
                                        <td
                                            align="center">
                                            &nbsp;
                                        </td>
                                        <td
                                            align="center">
                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>.
                                        </td>
                                        <td>8.Are
                                            you
                                            taking
                                            any
                                            non
                                            -
                                            prescription
                                            or
                                            prescription
                                            medication?<br>
                                            if
                                            <b>YES</b>,
                                            please
                                            list
                                            the
                                            medication(s)
                                            taken/being
                                            taken,
                                            and
                                            the
                                            purpose(s)
                                            and
                                            dosage(s):<br>
                                            <textarea
                                                disabled
                                                name="purpose"
                                                cols="40"
                                                rows="2"
                                                id="purpose"
                                                class="form-control">{{$exam_physical->purpose}}</textarea>
                                        </td>
                                        <td align="center"
                                            valign="top">
                                            <input
                                                disabled
                                                name="question8"
                                                type="radio"
                                                id="question8"
                                                value="1"
                                                @php
                                                echo
                                                $exam_physical->question8
                                            ==
                                            "Yes"
                                            ||
                                            $exam_physical->question8
                                            ==
                                            "1"
                                            ?
                                            "checked"
                                            :
                                            "";
                                            @endphp>
                                        </td>
                                        <td align="center"
                                            valign="top">
                                            <input
                                                disabled
                                                name="question8"
                                                type="radio"
                                                id="question8"
                                                value="0"
                                                @php
                                                echo
                                                $exam_physical->question8
                                            ==
                                            "No"
                                            ||
                                            $exam_physical->question8
                                            ==
                                            "0"
                                            ?
                                            "checked"
                                            :
                                            "";
                                            @endphp>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;
                                        </td>
                                        <td
                                            colspan="3">
                                            <b>(to
                                                Nurses/Doctors:
                                                inquire
                                                details
                                                of
                                                "Yes"
                                                answer)</b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td width="414"
                            valign="top">
                            <b>Write
                                Here The
                                Details<br>
                                <textarea
                                    disabled
                                    name="details"
                                    cols="15"
                                    rows="18"
                                    id="details"
                                    class="form-control">{{$exam_physical->details}}</textarea>
                            </b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab12"
            role="tabpanel"
            aria-labelledby="base-tab12">
            <table border="0"
                cellpadding="0"
                cellspacing="0"
                class="table-sm table-responsive">
                <tbody>
                    <tr>
                        <td height="31">
                            <p><b>PAST
                                    PEME</b>:
                                (Where was
                                the
                                last PEME,
                                what
                                were
                                the
                                Findings,when)
                            </p>
                            <textarea
                                disabled
                                name="past_peme"
                                cols="10"
                                rows="2"
                                id="past_peme"
                                class="form-control">{{$exam_physical->past_peme}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="15">
                            <p><b>FAMILY
                                    HISTORY:</b>
                                (To
                                be
                                Filled up by
                                the
                                Historian.)
                            </p>
                            <textarea
                                disabled
                                name="family_history"
                                cols="10"
                                rows="2"
                                id="family_history"
                                class="form-control">{{$exam_physical->family_history}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="16">
                            <p><b>PRESENT
                                    ILLNESS</b>
                                :
                            </p>
                            <p>
                                <textarea
                                    disabled
                                    name="present_illness"
                                    cols="10"
                                    rows="2"
                                    id="present_illness"
                                    class="form-control">{{$exam_physical->present_illness}}</textarea>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td height="31">
                            <p><b>SOCIAL
                                    HISTORY</b>:
                                (SMOKING,ALCOHOL
                                DRUGS,DIETARY
                                HABITS)
                                To
                                be filled up
                                the
                                Historian.
                            </p>
                            <textarea
                                disabled
                                name="social_history"
                                cols="10"
                                rows="2"
                                id="social_history"
                                class="form-control">{{$exam_physical->social_history}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="31">
                            <p><b>OB AND
                                    GYNECOLOGIC
                                    HISTORY:</b>
                                (For female
                                patients.)
                            </p>
                            <textarea
                                disabled
                                name="gynecologic_history"
                                cols="10"
                                rows="2"
                                id="gynecologic_history"
                                class="form-control">{{$exam_physical->gynecologic_history}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="31">
                            <p><b>OCCUPATIONAL
                                    HISTORY:</b>
                                Please note
                                the
                                number of
                                years
                                patient had
                                been
                                working on
                                boards; what
                                the
                                particular
                                type
                                of
                                ships
                                (tanker ,
                                cargo,
                                passenger,
                                offshore,etc)
                                What
                                particular
                                job he does.
                                What
                                particular
                                route they
                                take.
                                Ask
                                if all
                                contracts
                                are
                                finished,
                                why
                                if
                                not. Ask
                                about
                                the
                                latest
                                contract,
                                when
                                was
                                the last
                                departure
                                and
                                arrival.
                                Other
                                relevant
                                information
                                that
                                can
                                help in the
                                evaluation
                                of
                                fitness.
                            </p>
                            <textarea
                                disabled
                                name="occupational_history"
                                cols="20"
                                rows="2"
                                id="occupational_history"
                                class="form-control">{{$exam_physical->occupational_history}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td height="31">
                            <p><b>REVIEW OF
                                    SYMPTOMS:
                                </b>Please
                                pay
                                particular
                                attention to
                                the
                                present
                                symptoms
                                and
                                if
                                there
                                are
                                medications
                                being taken.
                            </p>
                            <textarea
                                disabled
                                name="symptoms"
                                cols="20"
                                rows="2"
                                id="symptoms"
                                class="form-control">{{$exam_physical->symptoms}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><b>OTHER
                                PERTINENT
                                INFORMATION:</b>
                            To be filled up
                            by
                            the
                            historian. ( OLD
                            MEDICAL
                            RECORD;
                            if
                            patient is
                            re-medical)
                            <p></p>
                            <textarea
                                disabled
                                name="pertinent_info"
                                cols="20"
                                rows="2"
                                id="pertinent_info"
                                class="form-control">{{$exam_physical->pertinent_info}}</textarea>
                        </td>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab13"
            role="tabpanel"
            aria-labelledby="base-tab13">
            <table width="100%" border="0"
                cellspacing="0"
                cellpadding="0">
                <tbody>
                    <tr>
                        <td colspan="10"
                            align="center">
                            <table
                                width="100%"
                                border="0"
                                cellspacing="2"
                                cellpadding="2">
                                <tbody>
                                    <tr>
                                        <td width="10%"
                                            align="center">
                                            <b>WEIGHT
                                                (kg)</b>
                                        </td>
                                        <td width="11%"
                                            align="center">
                                            <b>HEIGHT
                                                (cm)</b>
                                        </td>
                                        <td width="19%"
                                            align="center">
                                            <b>BMI</b>
                                        </td>
                                        <td width="14%"
                                            align="center">
                                            <b>BLOOD
                                                PRESSURE</b>
                                        </td>
                                        <td width="14%"
                                            align="center">
                                            <b>PULSE
                                                (min)</b>
                                        </td>
                                        <td width="17%"
                                            align="center">
                                            <b>RESPIRATION</b>
                                        </td>
                                        <td width="15%"
                                            align="center">
                                            <b>RHYTHM</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="weight"
                                                    type="text"
                                                    class="form-control"
                                                    id="weight"
                                                    value="{{$exam_physical->weight}}"
                                                    size="5"
                                                    onkeyup="computeBMI();">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="height"
                                                    type="text"
                                                    class="form-control"
                                                    id="height"
                                                    value="{{$exam_physical->height}}"
                                                    size="5"
                                                    onkeyup="computeBMI();">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="bmi"
                                                    type="text"
                                                    class="form-control"
                                                    id="bmi"
                                                    value="{{$exam_physical->bmi}}"
                                                    size="20"
                                                    readonly="">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="systollic"
                                                    type="text"
                                                    class="form-control"
                                                    id="systollic"
                                                    placeholder="Systollic"
                                                    value="{{$exam_physical->systollic}}"
                                                    size="10">
                                                <input
                                                    disabled
                                                    name="diastollic"
                                                    type="text"
                                                    class="form-control"
                                                    id="diastollic"
                                                    placeholder="Diastollic"
                                                    value="{{$exam_physical->diastollic}}"
                                                    size="10">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="pulse"
                                                    type="text"
                                                    class="form-control"
                                                    id="pulse"
                                                    value="{{$exam_physical->pulse}}"
                                                    size="5">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="respiration"
                                                    type="text"
                                                    class="form-control"
                                                    id="respiration"
                                                    value="{{$exam_physical->respiration}}"
                                                    size="10">
                                            </div>
                                        </td>
                                        <td
                                            align="center">
                                            <div
                                                class="col-md-12">
                                                <input
                                                    disabled
                                                    name="rhythm"
                                                    type="text"
                                                    id="rhythm"
                                                    value="{{$exam_physical->rhythm}}"
                                                    size="10"
                                                    class="form-control">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td width="30%">
                            &nbsp;
                        </td>
                        <td width="7%"
                            colspan="-1"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="3%"
                            colspan="-1"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="4%"
                            colspan="-1"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="16%"
                            colspan="-1"
                            align="center">
                            &nbsp;
                        </td>
                        <td width="40%"
                            colspan="3">
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="100%" border="0"
                cellpadding="0"
                cellspacing="0"
                class="table table-bordered table-responsive">
                <tbody>
                    <tr>
                        <td width="140"
                            height="37"
                            align="center">
                            <b>A</b>
                        </td>
                        <td width="29"
                            align="center">
                            YES
                        </td>
                        <td width="196"
                            align="center">
                            Significant
                            Findings
                        </td>
                        <td width="135"
                            align="center">
                            <b>B</b>
                        </td>
                        <td width="146"
                            align="center">
                            YES
                        </td>
                        <td width="154"
                            align="center">
                            Significant
                            Findings
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="38"
                            align="center">
                            Skin
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a1"
                                type="checkbox"
                                id="a1" @php
                                echo
                                $exam_physical->a1
                            ==
                            "Yes" ?
                            "checked" :
                            ""
                            @endphp
                            value="Yes">
                        </td>
                        <td align="center">
                            <input disabled
                                name="a1_findings"
                                type="text"
                                id="a1_findings"
                                value="{{$exam_physical->a1_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Neck,
                            Lymph
                            Node,Thyroid
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b1"
                                type="checkbox"
                                id="b1" @php
                                echo
                                $exam_physical->b1
                            ==
                            "Yes" ?
                            "checked" :
                            ""
                            @endphp
                            value="Yes">
                        </td>
                        <td align="center">
                            <input disabled
                                name="b1_findings"
                                type="text"
                                id="b1_findings"
                                value="{{$exam_physical->b1_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="36"
                            align="center">
                            Head,
                            Neck,Scalp
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a2"
                                type="checkbox"
                                id="a2" @php
                                echo
                                $exam_physical->a2
                            ==
                            "Yes" ?
                            "checked" :
                            ""
                            @endphp
                            value="Yes">
                        </td>
                        <td align="center">
                            <input disabled
                                name="a2_findings"
                                type="text"
                                id="a2_findings"
                                value="{{$exam_physical->a2_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Neurology
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b7"
                                type="checkbox"
                                id="b7"
                                value="Yes"
                                @php echo
                                $exam_physical->b7
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b2_findings"
                                type="text"
                                id="b2_findings"
                                value="{{$exam_physical->b2_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="33"
                            align="center">
                            Eyes(external)
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a3"
                                type="checkbox"
                                id="a3"
                                value="Yes"
                                @php echo
                                $exam_physical->a3
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="a3_findings"
                                type="text"
                                id="a3_findings"
                                value="{{$exam_physical->a3_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Breast,Axilla
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b2"
                                type="checkbox"
                                id="b2"
                                value="Yes"
                                @php echo
                                $exam_physical->b2
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b3_findings"
                                type="text"
                                id="b3_findings"
                                value="{{$exam_physical->b3_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="34"
                            align="center">
                            Pupils
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a4"
                                type="checkbox"
                                id="a4"
                                value="Yes"
                                @php echo
                                $exam_physical->a4
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="a4_findings"
                                type="text"
                                id="a4_findings"
                                value="{{$exam_physical->a4_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Chest
                            and
                            Lungs</td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b3"
                                type="checkbox"
                                id="b3"
                                value="Yes"
                                @php echo
                                $exam_physical->b3
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b4_findings"
                                type="text"
                                id="b4_findings"
                                value="{{$exam_physical->b4_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="34"
                            align="center">
                            Ears
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a5"
                                type="checkbox"
                                id="a5"
                                value="Yes"
                                @php echo
                                $exam_physical->a5
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="a5_findings"
                                type="text"
                                id="a5_findings"
                                value="{{$exam_physical->a5_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Heart
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b4"
                                type="checkbox"
                                id="b4"
                                value="Yes"
                                @php echo
                                $exam_physical->b4
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b5_findings"
                                type="text"
                                id="b5_findings"
                                value="{{$exam_physical->b5_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="37"
                            align="center">
                            Nose,Sinuses
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a6"
                                type="checkbox"
                                id="a6"
                                value="Yes"
                                @php echo
                                $exam_physical->a6
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="a6_findings"
                                type="text"
                                id="a6_findings"
                                value="{{$exam_physical->a6_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Abdomen,Liver,Spleen
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b5"
                                type="checkbox"
                                id="b5"
                                value="Yes"
                                @php echo
                                $exam_physical->b5
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b6_findings"
                                type="text"
                                id="b6_findings"
                                value="{{$exam_physical->b6_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td width="140"
                            height="14"
                            align="center">
                            Mouth,Throat
                        </td>
                        <td width="29"
                            align="center">
                            <input disabled
                                name="a7"
                                type="checkbox"
                                id="a7"
                                value="Yes"
                                @php echo
                                $exam_physical->a7
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="a7_findings"
                                type="text"
                                id="a7_findings"
                                value="{{$exam_physical->a7_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td width="135"
                            align="center">
                            Back
                        </td>
                        <td width="146"
                            align="center">
                            <input disabled
                                name="b6"
                                type="checkbox"
                                id="b6"
                                value="Yes"
                                @php echo
                                $exam_physical->b6
                            == "Yes"
                            ?
                            "checked" :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="b7_findings"
                                type="text"
                                id="b7_findings"
                                value="{{$exam_physical->b7_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"
                            align="center">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7"
                            align="center">
                            <b>C</b>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;
                        </td>
                        <td align="center">
                            YES
                        </td>
                        <td align="center">
                            Significant
                            Findings
                        </td>
                        <td align="center">
                            &nbsp;
                        </td>
                        <td align="center">
                            YES
                        </td>
                        <td align="center">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Anus-Rectum</td>
                        <td align="center">
                            <input disabled
                                name="c1"
                                type="checkbox"
                                id="c1"
                                value="Yes"
                                @php echo
                                $exam_physical->c1
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c1_findings"
                                type="text"
                                id="c1_findings"
                                value="{{$exam_physical->c1_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td align="center">
                            Genito-Urinary
                            System
                        </td>
                        <td align="center">
                            <input disabled
                                name="c2"
                                type="checkbox"
                                id="c2"
                                value="Yes"
                                @php echo
                                $exam_physical->c2
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c2_findings"
                                type="text"
                                id="c2_findings"
                                value="{{$exam_physical->c2_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Inguinals,Genitals
                        </td>
                        <td align="center">
                            <input disabled
                                name="c3"
                                type="checkbox"
                                id="c3"
                                value="Yes"
                                @php echo
                                $exam_physical->c3
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c3_findings"
                                type="text"
                                id="c3_findings"
                                value="{{$exam_physical->c3_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td align="center">
                            Extremities</td>
                        <td align="center">
                            <input disabled
                                name="c4"
                                type="checkbox"
                                id="c4"
                                value="Yes"
                                @php echo
                                $exam_physical->c4
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c4_findings"
                                type="text"
                                id="c4_findings"
                                value="{{$exam_physical->c4_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            Reflexes
                        </td>
                        <td align="center">
                            <input disabled
                                name="c5"
                                type="checkbox"
                                id="c5"
                                value="Yes"
                                @php echo
                                $exam_physical->c5
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c5_findings"
                                type="text"
                                id="c5_findings"
                                value="{{$exam_physical->c5_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                        <td align="center">
                            Dental(Teeth/Gums)
                        </td>
                        <td align="center">
                            <input disabled
                                name="c6"
                                type="checkbox"
                                id="c6"
                                value="Yes"
                                @php echo
                                $exam_physical->c6
                            == "Yes" ?
                            "checked"
                            :
                            ""
                            @endphp>
                        </td>
                        <td align="center">
                            <input disabled
                                name="c6_findings"
                                type="text"
                                id="c6_findings"
                                value="{{$exam_physical->c6_findings}}"
                                size="10"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6"
                            align="center">
                            &nbsp;
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab14"
            role="tabpanel"
            aria-labelledby="base-tab14">
            <table width="100%" border="0"
                cellpadding="0"
                cellspacing="0"
                class="table table-bordered table-responsive">
                <tbody>
                    <tr>
                        <td height="21"
                            colspan="4">
                            <b>RESULTS
                                OF ANCILLARY
                                EXAMINATIONS</b>
                        </td>
                    </tr>


                    <tr>
                        <td width="16%"
                            height="21">
                            A.CHEST
                            XRAY
                        </td>
                        <td width="13%"
                            height="21">
                            <input disabled
                                name="chest"
                                type="radio"
                                id="radio88"
                                value="normal"
                                @php echo
                                $exam_physical->chest
                            ==
                            "normal" ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="chest"
                                type="radio"
                                id="radio89"
                                value="findings"
                                @php echo
                                $exam_physical->chest
                            ==
                            "findings"
                            ?
                            "checked" : ""
                            @endphp>
                            With Findings
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            B.ECG
                        </td>
                        <td height="21">
                            <input disabled
                                name="ecg"
                                type="radio"
                                id="radio90"
                                value="normal"
                                @php echo
                                $exam_physical->ecg
                            ==
                            "normal"
                            ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="ecg"
                                type="radio"
                                id="radio91"
                                value="findings"
                                @php echo
                                $exam_physical->ecg
                            ==
                            "findings"
                            ?
                            "checked" : ""
                            @endphp>
                            With Findings
                        </td>
                    </tr>
                    <tr>
                        <td height="21">
                            C.CBC
                        </td>
                        <td height="21">
                            <input disabled
                                name="cbc"
                                type="radio"
                                id="radio92"
                                value="normal"
                                @php echo
                                $exam_physical->cbc
                            ==
                            "cbc"
                            ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="cbc"
                                type="radio"
                                id="radio93"
                                value="findings"
                                @php echo
                                $exam_physical->cbc
                            ==
                            "findings"
                            ?
                            "checked" : ""
                            @endphp>
                            With Findings
                        </td>
                    </tr>




                    <tr>
                        <td height="21">
                            D.URINALYSIS
                        </td>
                        <td height="21">
                            <input disabled
                                name="urinalysis"
                                type="radio"
                                id="radio94"
                                value="normal"
                                @php echo
                                $exam_physical->urinalysis
                            ==
                            "normal"
                            ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="urinalysis"
                                type="radio"
                                id="radio95"
                                value="findings"
                                @php echo
                                $exam_physical->urinalysis
                            ==
                            "findings"
                            ?
                            "checked" : ""
                            @endphp>
                            With Findings
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            E.STOOL
                            EXAM
                        </td>
                        <td height="21">
                            <input disabled
                                name="stool"
                                type="radio"
                                id="radio96"
                                value="normal"
                                @php echo
                                $exam_physical->stool
                            ==
                            "normal"
                            ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="stool"
                                type="radio"
                                id="radio97"
                                value="findings"
                                @php echo
                                $exam_physical->stool
                            ==
                            "findings"
                            ?
                            "checked" : ""
                            @endphp>
                            With Findings
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            F.HEPATITIS
                            B</td>
                        <td height="21">
                            <input disabled
                                name="hepa_b"
                                type="radio"
                                id="radio98"
                                value="Reactive"
                                @php echo
                                $exam_physical->hepa_b
                            ==
                            "Reactive" ||
                            $exam_physical->hepa_b
                            ==
                            "reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Reactive
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="hepa_b"
                                type="radio"
                                id="radio99"
                                value="Non Reactive"
                                @php echo
                                $exam_physical->hepa_b
                            ==
                            "Non Reactive"
                            ||
                            $exam_physical->hepa_b
                            ==
                            "non-reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Non-Reactive
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            G.HIV/AID
                            TEST</td>
                        <td height="21">
                            <input disabled
                                name="hiv"
                                type="radio"
                                id="radio100"
                                value="Reactive"
                                @php echo
                                $exam_physical->hiv
                            ==
                            "Reactive" ||
                            $exam_physical->hiv
                            ==
                            "reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Reactive
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="hiv"
                                type="radio"
                                id="radio101"
                                value="Non Reactive"
                                @php echo
                                $exam_physical->hiv
                            ==
                            "Non Reactive"
                            ||
                            $exam_physical->hiv
                            ==
                            "non-reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Non-Reactive
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            H.RPR
                        </td>
                        <td height="21">
                            <input disabled
                                name="rph"
                                type="radio"
                                id="radio102"
                                value="Reactive"
                                @php echo
                                $exam_physical->rph
                            ==
                            "Reactive" ||
                            $exam_physical->rph
                            ==
                            "reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Reactive
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="rph"
                                type="radio"
                                id="radio103"
                                value="Non Reactive"
                                @php echo
                                $exam_physical->rph
                            ==
                            "Non Reactive"
                            ||
                            $exam_physical->rph
                            ==
                            "non-reactive"
                            ?
                            "checked" : ""
                            @endphp>
                            Non-Reactive
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            PSYCHOLOGICAL
                            TEST
                        </td>
                        <td height="21">
                            <input disabled
                                name="psychological"
                                type="radio"
                                id="radio104"
                                value="normal"
                                @php echo
                                $exam_physical->psychological
                            ==
                            "normal"
                            ?
                            "checked" : ""
                            @endphp>
                            Normal
                        </td>
                        <td height="21"
                            colspan="2">
                            <input disabled
                                name="psychological"
                                type="radio"
                                id="radio105"
                                value="evaluation"
                                @php echo
                                $exam_physical->psychological
                            == "evaluation"
                            ?
                            "checked" : ""
                            @endphp>
                            For Further
                            Evaluation
                        </td>
                    </tr>


                    <tr>
                        <td height="21">
                            BLOOD
                            TYPE
                        </td>
                        <td height="21"
                            colspan="3">
                            <input disabled
                                type="text"
                                name="blood_type"
                                value="{{$exam_physical->blood_type}}"
                                class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td height="21"
                            colspan="4">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td height="21"
                            colspan="4">
                            <p>Additional
                                Laboratory
                                TEST(Specify):e.g.
                                Blood
                                Chemistry,
                                Drug
                                Test,
                                Alcohol
                                Test,
                                Liver
                                Function
                                Test,
                                Stool
                                Culture,
                                etc
                            </p>
                            <textarea
                                disabled
                                name="additional_labtest"
                                cols="70"
                                rows="2"
                                id="additional_labtest"
                                class="form-control">{{$exam_physical->additional_labtest}}</textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="tab-pane" id="tab15"
            role="tabpanel"
            aria-labelledby="base-tab15">
            <table border="0"
                cellpadding="0"
                cellspacing="0"
                class="table table-bordered table-responsive">
                <tbody>
                    <tr>
                        <td width="387"
                            height="39">
                            Basic
                            DOH
                            Mandatory
                            Medical
                            Examinations:
                        </td>
                        <td width="203">
                            <input disabled
                                name="summary_medexam"
                                type="radio"
                                id="summary_medexam"
                                value="passed"
                                @php echo
                                $exam_physical->summary_medexam
                            == "passed" ?
                            "checked" : ""
                            @endphp>
                            PASSED
                        </td>
                        <td width="651">
                            <input disabled
                                name="summary_medexam"
                                type="radio"
                                id="summary_medexam"
                                value="findings"
                                @php echo
                                $exam_physical->summary_medexam
                            == "findings" ?
                            "checked" : ""
                            @endphp>
                            WITH SIGNIFICANT
                            FINDINGS
                        </td>
                    </tr>
                    <tr>
                        <td width="387"
                            height="39">
                            Additional
                            Laboratory
                            Test:
                        </td>
                        <td width="203">
                            <input disabled
                                name="summary_labtest"
                                type="radio"
                                id="summary_labtest"
                                value="passed"
                                @php echo
                                $exam_physical->summary_labtest
                            == "passed" ?
                            "checked" : ""
                            @endphp>
                            PASSED
                        </td>
                        <td width="651">
                            <input disabled
                                name="summary_labtest"
                                type="radio"
                                id="summary_labtest"
                                value="findings"
                                @php echo
                                $exam_physical->summary_labtest
                            == "findings" ?
                            "checked" : ""
                            @endphp>
                            WITH SIGNIFICANT
                            FINDINGS
                        </td>
                    </tr>
                    <tr>
                        <td width="387"
                            height="39">
                            Flag Host
                            Medical
                            and
                            Laboratory
                            Requirments:
                        </td>
                        <td width="203">
                            <input disabled
                                name="summary_labrequirements"
                                type="radio"
                                id="summary_labrequirements"
                                value="passed"
                                @php echo
                                $exam_physical->summary_labrequirements
                            == "passed" ?
                            "checked" : ""
                            @endphp>
                            PASSED
                        </td>
                        <td width="651">
                            <input disabled
                                name="summary_labrequirements"
                                type="radio"
                                id="summary_labrequirements"
                                value="findings"
                                @php echo
                                $exam_physical->summary_labrequirements
                            == "findings" ?
                            "checked" : ""
                            @endphp>
                            WITH SIGNIFICANT
                            FINDINGS
                        </td>
                    </tr>
                    <tr>
                        <td height="20"
                            colspan="3">
                            <p><b>REMARKS/SPECIAL
                                    NEEDS</b>(Specify
                                e.g.
                                with
                                medication,
                                diet
                                restriction
                                etc.)
                            </p>
                            <textarea
                                disabled
                                name="remarks"
                                cols="70"
                                rows="3"
                                id="remarks"
                                class="form-control">{{$exam_physical->remarks}}</textarea>
                        </td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                        <td height="39"
                            colspan="3">
                            <table
                                width="100%"
                                border="0"
                                cellpadding="0"
                                cellspacing="0"
                                class="table">
                                <tbody>
                                    <tr>
                                        <td height="29"
                                            colspan="5">
                                            <div
                                                class="box box-success box-solid">
                                                <div
                                                    class="box-header with-border">
                                                    <h3 class="box-title">
                                                        ASSESSMENT
                                                        OF
                                                        FITNESS
                                                    </h3>
                                                    On
                                                    the
                                                    basis
                                                    of
                                                    the
                                                    examinee's
                                                    personal
                                                    declaration,
                                                    my
                                                    clinical
                                                    examination
                                                    and
                                                    diagnostic
                                                    test
                                                    results
                                                    recorded
                                                    above,
                                                    ideclare
                                                    the
                                                    examinee
                                                    medically
                                                </div>
                                                <div
                                                    class="box-body">
                                                    <table
                                                        class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <td
                                                                    height="29">
                                                                    <table
                                                                        width="75%"
                                                                        border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    align="center">
                                                                                    <b> LOOK
                                                                                        OUT
                                                                                        DUTY
                                                                                    </b>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    FIT
                                                                                    <input
                                                                                        disabled
                                                                                        name="duty"
                                                                                        type="radio"
                                                                                        id="duty"
                                                                                        value="Fit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->duty
                                                                                    ==
                                                                                    "Fit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td width="16%"
                                                                                    align="center">
                                                                                    UNFIT
                                                                                    <input
                                                                                        disabled
                                                                                        name="duty"
                                                                                        type="radio"
                                                                                        id="duty"
                                                                                        value="Unfit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->duty
                                                                                    ==
                                                                                    "Unfit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td colspan="2"
                                                                                    align="center">
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td width="27%"
                                                                                    align="center">
                                                                                    <b>
                                                                                    </b>
                                                                                </td>
                                                                                <td width="12%"
                                                                                    align="center">
                                                                                    FIT
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="fit"
                                                                                        id="fit"
                                                                                        value="Fit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->fit
                                                                                    ==
                                                                                    "Fit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    UNFIT
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="fit"
                                                                                        id="fit"
                                                                                        value="Unfit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->fit
                                                                                    ==
                                                                                    "Unfit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td width="22%"
                                                                                    align="center">
                                                                                    <span
                                                                                        style="font-size: 14px">Unfit
                                                                                        Temporarily</span>
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="fit"
                                                                                        id="fit"
                                                                                        value="Unfit_temp"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->fit
                                                                                    ==
                                                                                    "Unfit_temp"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td width="23%"
                                                                                    align="center">
                                                                                    <span
                                                                                        style="font-size: 14px">Pending</span>
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="fit"
                                                                                        id="fit"
                                                                                        value="Pending"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->fit
                                                                                    ==
                                                                                    "Pending"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    align="center">
                                                                                    <b>RESULT</b>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    FIT
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="seastatus"
                                                                                        id="seafit"
                                                                                        value="seafit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->seastatus
                                                                                    ==
                                                                                    "seafit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    UNFIT
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="seastatus"
                                                                                        id="seaunfit"
                                                                                        value="seaunfit"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->seastatus
                                                                                    ==
                                                                                    "seaunfit"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    Pending
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="seastatus"
                                                                                        id="seapending"
                                                                                        value="seapending"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->seastatus
                                                                                    ==
                                                                                    "seapending"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td>&nbsp;
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    align="left">
                                                                    <table
                                                                        width="75%"
                                                                        border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="197"
                                                                                    align="center">
                                                                                    <b>Tier
                                                                                        2</b>
                                                                                </td>
                                                                                <td width="188"
                                                                                    align="center">
                                                                                    <b>Tier
                                                                                        3</b>
                                                                                </td>
                                                                                <td width="258"
                                                                                    align="center">
                                                                                    <b>Tier
                                                                                        4</b>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><span
                                                                                        style="text-align: center"
                                                                                        class="col-md-12">
                                                                                        {{$exam_physical->tier2_choice}}
                                                                                    </span>
                                                                                </td>
                                                                                <td><span
                                                                                        style="text-align: center"
                                                                                        class="col-md-12">
                                                                                        {{$exam_physical->tier3_choice}}
                                                                                    </span>
                                                                                </td>
                                                                                <td><span
                                                                                        style="text-align: center"
                                                                                        class="col-md-12">
                                                                                        {{$exam_physical->tier4_choice}}
                                                                                    </span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    align="left">
                                                                    <table
                                                                        class="table"
                                                                        border="1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td align="center"
                                                                                    valign="bottom">
                                                                                    <b>VISUAL
                                                                                        AIDS
                                                                                        REQUIRED</b>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    SPECTACLES
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="visual_required"
                                                                                        id="visual_required0"
                                                                                        value="Spectacles"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->visual_required
                                                                                    ==
                                                                                    "Spectacles"
                                                                                    ||
                                                                                    $exam_physical->visual_required
                                                                                    ==
                                                                                    "spectacle"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    CONTACT
                                                                                    LENSES
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="visual_required"
                                                                                        id="visual_required1"
                                                                                        value="Contact Lenses"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->visual_required
                                                                                    ==
                                                                                    "Contact
                                                                                    Lenses"
                                                                                    ||
                                                                                    $exam_physical->visual_required
                                                                                    ==
                                                                                    "contact
                                                                                    lenses"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td
                                                                                    align="center">
                                                                                    NONE
                                                                                    <input
                                                                                        disabled
                                                                                        type="radio"
                                                                                        name="visual_required"
                                                                                        id="visual_required2"
                                                                                        value=""
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->visual_required
                                                                                    ==
                                                                                    ""
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    align="center">
                                                                    <table
                                                                        class
                                                                        border="1">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    width="23%">
                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;<b>WITH
                                                                                        RESTRICTIONS</b>
                                                                                    <input
                                                                                        disabled
                                                                                        name="restriction"
                                                                                        type="radio"
                                                                                        id="restriction"
                                                                                        value="with restriction"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->restriction
                                                                                    ==
                                                                                    "with
                                                                                    restriction"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                                <td><b>&nbsp;&nbsp;&nbsp;&nbsp;WITHOUT
                                                                                        RESTRICTIONS</b>
                                                                                    <input
                                                                                        disabled
                                                                                        name="restriction"
                                                                                        type="radio"
                                                                                        id="restriction"
                                                                                        value="without restriction"
                                                                                        @php
                                                                                        echo
                                                                                        $exam_physical->restriction
                                                                                    ==
                                                                                    "without
                                                                                    restriction"
                                                                                    ?
                                                                                    "checked"
                                                                                    :
                                                                                    ""
                                                                                    @endphp>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td
                                                                                    colspan="2">
                                                                                    <div
                                                                                        class="col-md-12">
                                                                                        Describe
                                                                                        restrictions
                                                                                        **
                                                                                        (Refer
                                                                                        to
                                                                                        standard
                                                                                        restriction
                                                                                        at
                                                                                        the
                                                                                        bottom
                                                                                        of
                                                                                        this
                                                                                        page).
                                                                                        <textarea
                                                                                            disabled
                                                                                            name="describe_restriction"
                                                                                            cols="70"
                                                                                            rows="3"
                                                                                            style="border-color: green"
                                                                                            id="describe_restriction"
                                                                                            class="form-control">{{$exam_physical->describe_restriction}}</textarea>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    align="left">
                                                                    <table
                                                                        width="100%"
                                                                        border="1"
                                                                        cellspacing="1"
                                                                        cellpadding="2">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="45%"
                                                                                    align="left"
                                                                                    bgcolor="#FFFFFF">
                                                                                    <b>Findings</b>
                                                                                </td>
                                                                                <td width="34%"
                                                                                    bgcolor="#FFFFFF">
                                                                                    <b>Recommendations</b>
                                                                                </td>
                                                                                <td width="21%"
                                                                                    align="center"
                                                                                    bgcolor="#FFFFFF">
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="left"
                                                                                    valign="middle">
                                                                                    <span
                                                                                        class="col-md-8">
                                                                                        <textarea
                                                                                            disabled
                                                                                            name="finding"
                                                                                            rows="5"
                                                                                            class="form-control"
                                                                                            id="finding">{{$exam_physical->finding}}</textarea>
                                                                                    </span>
                                                                                </td>
                                                                                <td
                                                                                    valign="middle">
                                                                                    <span
                                                                                        class="col-md-8">
                                                                                        <textarea
                                                                                            disabled
                                                                                            name="recommendations"
                                                                                            rows="5"
                                                                                            class="form-control"
                                                                                            id="recommendations">{{$exam_physical->recommendations}}</textarea>
                                                                                    </span>
                                                                                </td>
                                                                                <td>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    align="left">
                                                                    <table
                                                                        width="100%"
                                                                        style="border-top: 5px solid;border-bottom: 5px solid;"
                                                                        class="table table-bordered"
                                                                        border="0"
                                                                        cellpadding="0"
                                                                        cellspacing="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td
                                                                                    width="41%">
                                                                                    <b>DATE
                                                                                        OF
                                                                                        EXAMINATION</b><br>
                                                                                    <input
                                                                                        disabled
                                                                                        name="date_examination"
                                                                                        type="text"
                                                                                        id="date_examination"
                                                                                        value="{{$exam_physical->date_examination}}"
                                                                                        size="5"
                                                                                        class="form-control"
                                                                                        style="width:150px">
                                                                                </td>
                                                                                <td
                                                                                    width="59%">
                                                                                    <b>DATE
                                                                                        OF
                                                                                        ISSUANCE</b><br>
                                                                                    <input
                                                                                        disabled
                                                                                        name="peme_date"
                                                                                        type="text"
                                                                                        id="peme_date"
                                                                                        value="{{$exam_physical->peme_date}}"
                                                                                        size="10"
                                                                                        class="form-control"
                                                                                        style="width:150px">
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><b>MEDICAL
                                                                                        EXAM
                                                                                        REPORT
                                                                                        NO.<br>
                                                                                        <input
                                                                                            disabled
                                                                                            name="examination_number"
                                                                                            type="text"
                                                                                            id="examination_number"
                                                                                            value="{{$exam_physical->examination_number}}"
                                                                                            size="5"
                                                                                            class="form-control"
                                                                                            style="width:150px">
                                                                                    </b>
                                                                                </td>
                                                                                <td><b>DATE
                                                                                        OF
                                                                                        EXPIRATION<br>
                                                                                        <input
                                                                                            disabled
                                                                                            name="date_expiration"
                                                                                            type="text"
                                                                                            id="date_expiration"
                                                                                            value="{{$exam_physical->date_expiration}}"
                                                                                            size="10"
                                                                                            class="form-control"
                                                                                            style="width:150px">
                                                                                    </b>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
