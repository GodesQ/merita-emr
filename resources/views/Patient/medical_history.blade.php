<fieldset>
    <form method="POST" id="update_patient_medical_history">
        @csrf
        <input type="hidden" name="main_id" value="{{ $patient->id }}">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped medical-table">
                    <tbody>
                        @if ($medicalHistory == null)
                            <td>
                                No Records Found
                            </td>
                        @else
                            <tr>
                                <th>Head and Neck Injury</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="head_and_neck_injury"
                                                id="head_and_neck_injury1"
                                                @php echo
                                            $medicalHistory->head_and_neck_injury
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="head_and_neck_injury1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="head_and_neck_injury"
                                                id="head_and_neck_injury2"
                                                @php echo
                                            $medicalHistory->head_and_neck_injury
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="head_and_neck_injury2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Frequent Headache</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="frequent_head_ache"
                                                id="frequent_head_ache1"
                                                @php echo
                                            $medicalHistory->frequent_headache
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="frequent_head_ache1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="frequent_head_ache"
                                                id="frequent_head_ache2"
                                                @php echo
                                            $medicalHistory->frequent_headache
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="frequent_head_ache2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Frequent Dizziness</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="frequent_dizziness"
                                                id="frequent_dizziness1"
                                                @php echo
                                            $medicalHistory->frequent_dizziness
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="frequent_dizziness1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="frequent_dizziness"
                                                id="frequent_dizziness2"
                                                @php echo
                                            $medicalHistory->frequent_dizziness
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="frequent_dizziness2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Fainting Spells, Fits</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="fainting_spells"
                                                id="fainting_spells1"
                                                @php echo
                                            $medicalHistory->fainting_spells_fits
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="fainting_spells1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="fainting_spells"
                                                id="fainting_spells2"
                                                @php echo
                                            $medicalHistory->fainting_spells_fits
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="fainting_spells2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Seizures</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="seizures" id="seizures1"
                                                @php
echo
                                            $medicalHistory->seizures
                                        ==
                                        1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="seizures1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="seizures" id="seizures2"
                                                @php
echo
                                            $medicalHistory->seizures
                                        ==
                                        0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="seizures2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Other neurological disorders
                                </th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required"
                                                name="other_neurological_disorders" id="other_neurological_disorders1"
                                                @php echo
                                            $medicalHistory->other_neurological_disorders
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="other_neurological_disorders1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required"
                                                name="other_neurological_disorders" id="other_neurological_disorders2"
                                                @php echo
                                            $medicalHistory->other_neurological_disorders
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="other_neurological_disorders2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Insomia or Sleep disorder</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="insomia_or_sleep_disorder"
                                                id="insomia_or_sleep_disorder1"
                                                @php echo
                                            $medicalHistory->insomia_or_sleep_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="insomia_or_sleep_disorder1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="insomia_or_sleep_disorder"
                                                id="insomia_or_sleep_disorder2"
                                                @php echo
                                            $medicalHistory->insomia_or_sleep_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="insomia_or_sleep_disorder2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Depression, other mental
                                    disorder
                                </th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required"
                                                name="depression_or_other_mental_disorder"
                                                id="depression_or_other_mental_disorder1"
                                                @php echo
                                            $medicalHistory->depression_other_mental_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="depression_or_other_mental_disorder1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required"
                                                name="depression_or_other_mental_disorder"
                                                id="depression_or_other_mental_disorder2"
                                                @php echo
                                            $medicalHistory->depression_other_mental_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="depression_or_other_mental_disorder2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Eye problems / Error of
                                    refraction
                                </th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required"
                                                name="eye_problems_or_error_of_refraction"
                                                id="eye_problems_or_error_of_refraction1"
                                                @php echo
                                            $medicalHistory->eye_problems_or_error_refraction
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="eye_problems_or_error_of_refraction1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required"
                                                name="eye_problems_or_error_of_refraction"
                                                id="eye_problems_or_error_of_refraction2"
                                                @php echo
                                            $medicalHistory->eye_problems_or_error_refraction
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="eye_problems_or_error_of_refraction2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Deafness / Ear disorder</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="deafness_or_ear_disorder"
                                                id="deafness_or_ear_disorder1"
                                                @php echo
                                            $medicalHistory->deafness_or_ear_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="deafness_or_ear_disorder1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="deafness_or_ear_disorder"
                                                id="deafness_or_ear_disorder2"
                                                @php echo
                                            $medicalHistory->deafness_or_ear_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="deafness_or_ear_disorder2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Nose or Throat disorder</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="nose_or_throat_disorder"
                                                id="nose_or_throat_disorder1"
                                                @php echo
                                            $medicalHistory->nose_or_throat_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="nose_or_throat_disorder1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="nose_or_throat_disorder"
                                                id="nose_or_throat_disorder2"
                                                @php echo
                                            $medicalHistory->nose_or_throat_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="nose_or_throat_disorder2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Tuberculosis</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="tuberculosis"
                                                id="tuberculosis1"
                                                @php echo
                                            $medicalHistory->tuberculosis
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="tuberculosis1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="tuberculosis"
                                                id="tuberculosis2"
                                                @php echo
                                            $medicalHistory->tuberculosis
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="tuberculosis2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Signed off as sick</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="signed_off_as_sick"
                                                id="signed_off_as_sick1"
                                                @php echo
                                            $medicalHistory->signed_off_as_sick
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="signed_off_as_sick1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="signed_off_as_sick"
                                                id="signed_off_as_sick2"
                                                @php echo
                                            $medicalHistory->signed_off_as_sick
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="signed_off_as_sick2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Repatriation form ship</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="repatriation_form_ship"
                                                id="repatriation_form_ship1"
                                                @php echo
                                            $medicalHistory->signed_off_as_sick
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="repatriation_form_ship1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="repatriation_form_ship"
                                                id="repatriation_form_ship2"
                                                @php echo
                                            $medicalHistory->signed_off_as_sick
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="repatriation_form_ship2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Declared Unfit for sea duty</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required"
                                                name="declared_unfit_for_sea_duty" id="declared_unfit_for_sea_duty1"
                                                @php echo
                                            $medicalHistory->declared_unfit_for_sea_duty
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="declared_unfit_for_sea_duty1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required"
                                                name="declared_unfit_for_sea_duty" id="declared_unfit_for_sea_duty2"
                                                @php echo
                                            $medicalHistory->declared_unfit_for_sea_duty
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="declared_unfit_for_sea_duty2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Previous Hospitalization</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="previous_hospitalization"
                                                id="previous_hospitalization1"
                                                @php echo
                                            $medicalHistory->previous_hospitalization
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="previous_hospitalization1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="previous_hospitalization"
                                                id="previous_hospitalization2"
                                                @php echo
                                            $medicalHistory->previous_hospitalization
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="previous_hospitalization2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Do you feel healthy /<br>Fit to
                                    perform
                                    duties of <br> designed position
                                </th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="feel_healthy"
                                                id="feel_healthy1"
                                                @php echo
                                            $medicalHistory->feel_healthy
                                        == 1
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="feel_healthy1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="feel_healthy"
                                                id="feel_healthy2"
                                                @php echo
                                            $medicalHistory->feel_healthy
                                        == 0
                                        ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="feel_healthy2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-striped col-md-12  medical-table">
                    <tbody>
                        <tr>
                            <th>Other Lung disorder</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="other_lung_disorder"
                                            id="other_lung_disorder1"
                                            @php echo
                                            $medicalHistory->other_lung_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="other_lung_disorder1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="other_lung_disorder"
                                            id="other_lung_disorder2"
                                            @php echo
                                            $medicalHistory->other_lung_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="other_lung_disorder2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>High Blood Pressure</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="high_blood_pressure"
                                            id="high_blood_pressure1"
                                            @php echo
                                            $medicalHistory->high_blood_pressure
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="high_blood_pressure1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="high_blood_pressure"
                                            id="high_blood_pressure2"
                                            @php echo
                                            $medicalHistory->high_blood_pressure
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="high_blood_pressure2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Heart Disease / Vascular</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="heart_disease_or_vascular"
                                            id="heart_disease_or_vascular1"
                                            @php echo
                                            $medicalHistory->heart_disease_or_vascular
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="heart_disease_or_vascular1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="heart_disease_or_vascular"
                                            id="heart_disease_or_vascular2"
                                            @php echo
                                            $medicalHistory->heart_disease_or_vascular
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="heart_disease_or_vascular2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Chest pain</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="chest_pain" id="chest_pain1"
                                            @php echo
                                            $medicalHistory->chest_pain
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="chest_pain1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="chest_pain" id="chest_pain2"
                                            @php echo
                                            $medicalHistory->chest_pain
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="chest_pain2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Rheumatic Fever</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="rheumatic_fever"
                                            id="rheumatic_fever1"
                                            @php echo
                                            $medicalHistory->rheumatic_fever
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="rheumatic_fever1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="rheumatic_fever"
                                            id="rheumatic_fever2"
                                            @php echo
                                            $medicalHistory->rheumatic_fever
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="rheumatic_fever2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Diabetes Mellitus</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="diabetes_mellitus"
                                            id="diabetes_mellitus1"
                                            @php echo
                                            $medicalHistory->diabetes_mellitus
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="diabetes_mellitus1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="diabetes_mellitus"
                                            id="diabetes_mellitus2"
                                            @php echo
                                            $medicalHistory->diabetes_mellitus
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="diabetes_mellitus2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Endocrine disorders (goiter)
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="endocrine_disorders"
                                            id="endocrine_disorders1"
                                            @php echo
                                            $medicalHistory->endocrine_disorders
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="endocrine_disorders1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="endocrine_disorders"
                                            id="endocrine_disorders2"
                                            @php echo
                                            $medicalHistory->endocrine_disorders
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="endocrine_disorders2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Cancer or Tumor</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="cancer_or_tumor"
                                            id="cancer_or_tumor1"
                                            @php echo
                                            $medicalHistory->cancer_or_tumor
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="cancer_or_tumor1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="cancer_or_tumor"
                                            id="cancer_or_tumor2"
                                            @php echo
                                            $medicalHistory->cancer_or_tumor
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="cancer_or_tumor2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Blood disorder</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="blood_disorder"
                                            id="blood_disorder1"
                                            @php echo
                                            $medicalHistory->blood_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="blood_disorder1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="blood_disorder"
                                            id="blood_disorder2"
                                            @php echo
                                            $medicalHistory->blood_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="blood_disorder2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Stomach pain, Gastritis</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="stomach_pain_or_gastritis"
                                            id="stomach_pain_or_gastritis1"
                                            @php echo
                                            $medicalHistory->stomach_pain_or_gastritis
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="stomach_pain_or_gastritis1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="stomach_pain_or_gastritis"
                                            id="stomach_pain_or_gastritis2"
                                            @php echo
                                            $medicalHistory->stomach_pain_or_gastritis
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="stomach_pain_or_gastritis2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Ulcer</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="ulcer" id="ulcer1"
                                            @php
echo
                                            $medicalHistory->ulcer
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="ulcer1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="ulcer" id="ulcer2"
                                            @php
echo
                                            $medicalHistory->ulcer
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="ulcer2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Other Abdominal Disorder</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="other_abdominal_disorder"
                                            id="other_abdominal_disorder1"
                                            @php echo
                                            $medicalHistory->other_abdominal_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="other_abdominal_disorder1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="other_abdominal_disorder"
                                            id="other_abdominal_disorder2"
                                            @php echo
                                            $medicalHistory->other_abdominal_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="other_abdominal_disorder2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Medical certificate restricted
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required"
                                            name="medical_certificate_restricted" id="medical_certificate_restricted1"
                                            @php echo
                                            $medicalHistory->medical_certificate_restricted
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="medical_certificate_restricted1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required"
                                            name="medical_certificate_restricted" id="medical_certificate_restricted2"
                                            @php echo
                                            $medicalHistory->medical_certificate_restricted
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="medical_certificate_restricted2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Medical certificate revoked</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="medical_certificate_revoked"
                                            id="medical_certificate_revoked1"
                                            @php echo
                                            $medicalHistory->medical_certificate_revoked
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="medical_certificate_revoked1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="medical_certificate_revoked"
                                            id="medical_certificate_revoked2"
                                            @php echo
                                            $medicalHistory->medical_certificate_revoked
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="medical_certificate_revoked2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Aware of any medical problems
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="aware_of_medical_problems"
                                            id="aware_of_medical_problems1"
                                            @php echo
                                            $medicalHistory->aware_of_any_medical_problems
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="aware_of_medical_problems1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="aware_of_medical_problems"
                                            id="aware_of_medical_problems2"
                                            @php echo
                                            $medicalHistory->aware_of_any_medical_problems
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="aware_of_medical_problems2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Aware of any disease / illness <br>
                                <br><input name="illness_other" type="input" id="illness_other"
                                    value="{{ $medicalHistory->illness_other }}">
                            </th>
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required"
                                            name="aware_of_any_disease_or_illness"
                                            id="aware_of_any_disease_or_illness1"
                                            @php echo
                                            $medicalHistory->aware_of_any_disease_or_illness
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="aware_of_any_disease_or_illness1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required"
                                            name="aware_of_any_disease_or_illness"
                                            id="aware_of_any_disease_or_illness2"
                                            @php echo
                                            $medicalHistory->aware_of_any_disease_or_illness
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="aware_of_any_disease_or_illness2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Operation(s)</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="operation" id="operation1"
                                            @php
echo
                                            $medicalHistory->operations
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="operation1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="operation" id="operation2"
                                            @php
echo
                                            $medicalHistory->operations
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="operation2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                </table>
            </div>
            <div class="col-md-12">
                <table class="table table-striped col-md-12 medical-table">
                    <tbody>
                        <tr>
                            <th>Gynecological Disorders</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="gynecological_disorder"
                                            id="gynecological_disorders1"
                                            @php echo
                                            $medicalHistory->gynecological_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="gynecological_disorders1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="gynecological_disorder"
                                            id="gynecological_disorders2"
                                            @php echo
                                            $medicalHistory->gynecological_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="gynecological_disorders2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Last Menstrual Period</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="last_menstrual_period"
                                            id="last_menstrual_period1"
                                            @php echo
                                            $medicalHistory->last_menstrual_period
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="last_menstrual_period1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="last_menstrual_period"
                                            id="last_menstrual_period2"
                                            @php echo
                                            $medicalHistory->last_menstrual_period
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="last_menstrual_period2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Pregnancy</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="pregnancy" id="pregnancy1"
                                            @php
echo
                                            $medicalHistory->pregnancy
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="pregnancy1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="pregnancy" id="pregnancy2"
                                            @php
echo
                                            $medicalHistory->pregnancy
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="pregnancy2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Kidney or Bladder Disorder</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="kidney_or_bladder_disorder"
                                            id="kidney_or_bladder_disorder1"
                                            @php echo
                                            $medicalHistory->kidney_or_bladder_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="kidney_or_bladder_disorder1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="kidney_or_bladder_disorder"
                                            id="kidney_or_bladder_disorder2"
                                            @php echo
                                            $medicalHistory->kidney_or_bladder_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="kidney_or_bladder_disorder2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Back Injury / Joint pain</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="back_injury_or_joint_pain"
                                            id="back_injury_or_joint_pain1"
                                            @php echo
                                            $medicalHistory->back_injury_or_joint_pain
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="back_injury_or_joint_pain1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="back_injury_or_joint_pain"
                                            id="back_injury_or_joint_pain2"
                                            @php echo
                                            $medicalHistory->back_injury_or_joint_pain
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="back_injury_or_joint_pain2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Arthritis</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="arthritis" id="arthritis1"
                                            @php
echo
                                            $medicalHistory->arthritis
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="arthritis1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="arthritis" id="arthritis2"
                                            @php
echo
                                            $medicalHistory->arthritis
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="arthritis2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Genetic, Heredity or Familial
                                Dis.
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required"
                                            name="genetic_or_heredity_or_familial_dis"
                                            id="genetic_or_heredity_or_familial_dis1"
                                            @php echo
                                            $medicalHistory->genetic_heredity_or_familial_dis
                                        == 1
                                        ? "checked" : "" @endphps>
                                        <label class="custom-control-label"
                                            for="genetic_or_heredity_or_familial_dis1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required"
                                            name="genetic_or_heredity_or_familial_dis"
                                            id="genetic_or_heredity_or_familial_dis2"
                                            @php echo
                                            $medicalHistory->genetic_heredity_or_familial_dis
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="genetic_or_heredity_or_familial_dis2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Sexually Transmitted Disease
                                (Syphilis)
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="sexually_transmitted_disease"
                                            id="sexually_transmitted_disease1"
                                            @php echo
                                            $medicalHistory->sexually_transmitted_disease
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="sexually_transmitted_disease1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="sexually_transmitted_disease"
                                            id="sexually_transmitted_disease2"
                                            @php echo
                                            $medicalHistory->sexually_transmitted_disease
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="sexually_transmitted_disease2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Tropical Disease - Malaria</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="tropical_disease"
                                            id="tropical_disease1"
                                            @php echo
                                            $medicalHistory->tropical_disease_or_malaria
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="tropical_disease1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="tropical_disease"
                                            id="tropical_disease2"
                                            @php echo
                                            $medicalHistory->tropical_disease_or_malaria
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="tropical_disease2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Thypoid Fever</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="thypoid_fever"
                                            id="thypoid_fever1"
                                            @php echo
                                            $medicalHistory->thypoid_fever
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="thypoid_fever1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="thypoid_fever"
                                            id="thypoid_fever2"
                                            @php echo
                                            $medicalHistory->thypoid_fever
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="thypoid_fever2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Schistosomiasis</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="schistosomiasis"
                                            id="schistosomiasis1"
                                            @php echo
                                            $medicalHistory->depression_other_mental_disorder
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="schistosomiasis1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="schistosomiasis"
                                            id="schistosomiasis2"
                                            @php echo
                                            $medicalHistory->depression_other_mental_disorder
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="schistosomiasis2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Asthma</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="asthma" id="asthma1"
                                            @php
echo
                                            $medicalHistory->asthma
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="asthma1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="asthma" id="asthma2"
                                            @php
echo
                                            $medicalHistory->asthma
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="asthma2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Allergies</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="allergies" id="allergies1"
                                            @php
echo
                                            $medicalHistory->allergies
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="allergies1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="allergies" id="allergies2"
                                            @php
echo
                                            $medicalHistory->allergies
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="allergies2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Smoking <br><input name="smoking_other" type="input" id="smoking_other"
                                    value="{{ $medicalHistory->smoking_other }}"></th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="smoking" id="smoking1"
                                            @php
echo
                                            $medicalHistory->smoking
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="smoking1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="smoking" id="smoking2"
                                            @php
echo
                                            $medicalHistory->smoking
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="smoking2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Taking medication for
                                Hypertension
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required"
                                            name="taking_medication_for_hypertension"
                                            id="taking_medication_for_hypertension1"
                                            @php echo
                                            $medicalHistory->taking_medication_for_hypertension
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="taking_medication_for_hypertension1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required"
                                            name="taking_medication_for_hypertension"
                                            id="taking_medication_for_hypertension2"
                                            @php echo
                                            $medicalHistory->taking_medication_for_hypertension
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="taking_medication_for_hypertension2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Taking medication for Diabetes
                            </th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required"
                                            name="taking_medication_for_diabetes" id="taking_medication_for_diabetes1"
                                            @php echo
                                            $medicalHistory->taking_medication_for_diabetes
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="taking_medication_for_diabetes1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required"
                                            name="taking_medication_for_diabetes" id="taking_medication_for_diabetes2"
                                            @php echo
                                            $medicalHistory->taking_medication_for_diabetes
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label"
                                            for="taking_medication_for_diabetes2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <th>Vaccination</th>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="1"
                                            class="custom-control-input required" name="vaccination"
                                            id="vaccination1"
                                            @php echo
                                            $medicalHistory->vaccination
                                        == 1
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="vaccination1">YES</label>
                                    </div>
                                </fieldset>
                            </td>
                            <td>
                                <fieldset>
                                    <div class="custom-control custom-radio">
                                        <input required type="radio" value="0"
                                            class="custom-control-input required" name="vaccination"
                                            id="vaccination2"
                                            @php echo
                                            $medicalHistory->vaccination
                                        == 0
                                        ? "checked" : "" @endphp>
                                        <label class="custom-control-label" for="vaccination2">NO</label>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        @endif
                </table>
            </div>
            @if ($medicalHistory != null)
                <div class="col-3">
                    <button type="submit" class="btn btn-solid btn-primary">Submit</button>
                </div>
            @endif
        </div>
    </form>
</fieldset>
