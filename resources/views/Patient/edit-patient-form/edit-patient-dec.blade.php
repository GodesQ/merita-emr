<fieldset>
    <form id="update_patient_declaration_form" method="POST">
        @csrf
        <input type="hidden" name="main_id" value="{{ $patient->id }}">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">
                        Have you travelled abroad recently?
                        <span class="danger">*</span>
                    </label>
                    <fieldset>
                        <div class="custom-control custom-radio">
                            <input required type="radio" class="custom-control-input required"
                                name="travelled_abroad_recently" id="travelled_abroad_recently1" value="1"
                                {{ $declarationForm->travelled_abroad_recently == '1' ? 'checked' : null }}
                                onchange="isTravelAbroadRecently(this)">
                            <label class="custom-control-label" for="travelled_abroad_recently1">YES</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="custom-control custom-radio">
                            <input required type="radio" value="0" class="custom-control-input required"
                                name="travelled_abroad_recently" id="travelled_abroad_recently2"
                                {{ $declarationForm->travelled_abroad_recently == '0' ? 'checked' : null }}
                                onchange="isTravelAbroadRecently(this)">
                            <label class="custom-control-label" for="travelled_abroad_recently2">No</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-12 travel isTravel">
                <div class="form-group">
                    <label for="">Name of the area(s) visited
                        <span class="danger">*</span>
                    </label>
                    <fieldset>
                        <input name="area_visited" type="text" id="" placeholder="Country, State, City"
                            class="form-control" value="{{ $declarationForm->area_visited }}" />
                    </fieldset>
                </div>
            </div>
            <div class="col-md-12 travel isTravel">
                <div class="form-group ">
                    <label for="">Date of travel
                        <span class="danger">*</span>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="">Arrival</label>
                            <input name="travel_arrival_date" id="" placeholder="" class="form-control"
                                type="date" max="2050-12-31" value="{{ $declarationForm->travel_arrival }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="">Return</label>
                            <input name="travel_return_date" id="" placeholder="" class="form-control"
                                type="date" max="2050-12-31" value="{{ $declarationForm->travel_return }}" s />
                        </div>
                    </div>
                </div>
            </div>
            </hr>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="">
                        Have you been in contact with people
                        being
                        infected,
                        suspected or diagnosed with COVID-19?
                        <span class="danger">*</span>
                    </label>
                    <fieldset>
                        <div class="custom-control custom-radio">
                            <input required type="radio" value="1" class="custom-control-input required"
                                name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
                                id="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1"
                                {{ $declarationForm->contact_with_people_being_infected_suspected_diagnose_with_cov == '1' ? 'checked' : null }}
                                onchange="hasContactWithPeopleInfected(this)">
                            <label class="custom-control-label"
                                for="contact_with_people_being_infected_suspected_or_diagnosed_with_covid1">YES</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="custom-control custom-radio">
                            <input required type="radio" value="0" class="custom-control-input required"
                                name="contact_with_people_being_infected_suspected_or_diagnosed_with_covid"
                                {{ $declarationForm->contact_with_people_being_infected_suspected_diagnose_with_cov == '0' ? 'checked' : null }}
                                id="contact_with_people_being_infected_suspected_or_diagnosed_with_covid2"
                                onchange="hasContactWithPeopleInfected(this)">
                            <label class=" custom-control-label"
                                for="contact_with_people_being_infected_suspected_or_diagnosed_with_covid2">No</label>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col-md-12 mt-2 show-if-contact hide">
                <div class="form-group">
                    <label for="">Your relationship with the people and your
                        last contact date with them
                        <span class="danger">*</span>
                    </label>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="">Relationship</label>
                            <input name="relationship_with_last_people" id="" placeholder=""
                                class="form-control" type="text"
                                value="{{ $declarationForm->relationship_with_last_people }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="">Last
                                contact
                                date</label>
                            <input name="last_contact_date" id="" placeholder="" class="form-control"
                                type="date" max="2050-12-31" value="{{ $declarationForm->last_contact_date }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <label for="">Please state whether you've
                        experienced/are
                        experiencing the following
                        <span class="danger">*</span>
                    </label>
                    <div class="row">
                        <table class="table table-striped ml-1">
                            <tr>
                                <th>Fever</th>
                                <td>
                                    <fieldset>

                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="fever" id="fever1"
                                                @php
echo
                                                $declarationForm->fever
                                            == 1
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="fever1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="fever" id="fever2"
                                                @php
echo
                                                $declarationForm->fever
                                            == 0
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="fever2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Cough</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="cough" id="cough1"
                                                @php
echo
                                                $declarationForm->cough
                                            == 1
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="cough1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="cough" id="cough2"
                                                @php
echo
                                                $declarationForm->cough
                                            == 0
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="cough2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Shortness of Breath</th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required" name="shortness_of_breath"
                                                id="shortness_of_breath1"
                                                @php echo
                                                $declarationForm->shortness_of_breath
                                            == 1
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="shortness_of_breath1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required" name="shortness_of_breath"
                                                id="shortness_of_breath2"
                                                @php echo
                                                $declarationForm->shortness_of_breath
                                            == 0
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label" for="shortness_of_breath2">NO</label>
                                        </div>
                                    </fieldset>
                                </td>
                            </tr>
                            <tr>
                                <th>Persistent Pain in the Chest
                                </th>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="1"
                                                class="custom-control-input required"
                                                name="persistent_pain_in_the_chest" id="persistent_pain_in_the_chest1"
                                                @php echo
                                                $declarationForm->persistent_pain_in_chest
                                            == 1
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="persistent_pain_in_the_chest1">YES</label>
                                        </div>
                                    </fieldset>
                                </td>
                                <td>
                                    <fieldset>
                                        <div class="custom-control custom-radio">
                                            <input required type="radio" value="0"
                                                class="custom-control-input required"
                                                name="persistent_pain_in_the_chest" id="persistent_pain_in_the_chest2"
                                                @php echo
                                                $declarationForm->persistent_pain_in_chest
                                            == 0
                                            ? "checked" : "" @endphp>
                                            <label class="custom-control-label"
                                                for="persistent_pain_in_the_chest2">NO</label>
                                        </div>
                                    </fieldset>

                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-2">
                        <button type="submit" class="btn btn-solid btn-primary">Submit</button>
                    </div>
                </div>
            </div>
    </form>
</fieldset>
