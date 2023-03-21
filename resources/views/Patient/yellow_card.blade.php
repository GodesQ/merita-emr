<div class="container">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Yellow Card Form</h2>
        </div>
        <div class="card-body">
            <form action="/store_yellow_card" method="POST" class="form table-responsive">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                @php $count = 1; @endphp
                @if (count($yellow_card_records) > 0)
                    <input type="hidden" name="action" value="update">
                    <table class="table table-bordered">
                        <tbody id="repeating_yellow_form">
                            <tr>
                                <td><b>Vaccine</b></td>
                                <td><b>Date</b></td>
                                <td><b>Manufacturer and batch No. <br> of vaccine or prophylaxis</b></td>
                                <td><b>Certificate valid <br> from..... Until......</b></td>
                                <td><b>Official Stamp of <br> administering centre</b></td>
                                <!-- <td><b>Action</b></td> -->
                            </tr>
                            @foreach ($yellow_card_records as $yellow_card_record)
                                <tr class="entry">
                                    <td class="d-none">
                                        <input type="hidden" name="count[]" value="{{ $yellow_card_record->count }}"
                                            id="count" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="vaccine[]" readonly
                                            value="{{ $yellow_card_record->vaccine }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="date" name="date[]" max="2050-12-31"
                                            value="{{ $yellow_card_record->date }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="manufacturer[]"
                                            value="{{ $yellow_card_record->manufacturer }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="cert_valid[]"
                                            value="{{ $yellow_card_record->cert_valid }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="official_stamp[]"
                                            value="{{ $yellow_card_record->official_stamp }}" class="form-control">
                                    </td>
                                    <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <input type="hidden" name="action" value="store">
                    <table class="table table-bordered">
                        <tbody id="repeating_yellow_form">
                            <tr>
                                <td><b>Vaccine</b></td>
                                <td><b>Date</b></td>
                                <td><b>Manufacturer and batch No. <br> of vaccine or prophylaxis</b></td>
                                <td><b>Certificate valid <br> from..... Until......</b></td>
                                <td><b>Official Stamp of <br> administering centre</b></td>
                                <!-- <td><b>Action</b></td> -->
                            </tr>
                            <tr class="entry">
                                <td class="d-none">
                                    <input type="hidden" name="count[]" value="1" id="count"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="vaccine[]" readonly value="Yellow Fever"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="date[]" max="2050-12-31" value=""
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="manufacturer[]" value="" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="cert_valid[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="official_stamp[]" value="" class="form-control">
                                </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                            </tr>
                            <tr class="entry">
                                <td class="d-none">
                                    <input type="hidden" name="count[]" value="2" id="count"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="vaccine[]" readonly value="COVID 19 FIRST DOSE"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="date[]" max="2050-12-31" value=""
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="manufacturer[]" value="" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="cert_valid[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="official_stamp[]" value=""
                                        class="form-control">
                                </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                            </tr>
                            <tr class="entry">
                                <td class="d-none">
                                    <input type="hidden" name="count[]" value="3" id="count"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="vaccine[]" readonly value="COVID 19 SECOND DOSE"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="date[]" max="2050-12-31" value=""
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="manufacturer[]" value="" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="cert_valid[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="official_stamp[]" value=""
                                        class="form-control">
                                </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                            </tr>
                            <tr class="entry">
                                <td class="d-none">
                                    <input type="hidden" name="count[]" value="4" id="count"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="vaccine[]" readonly value="MMR"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="date[]" max="2050-12-31" value=""
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="manufacturer[]" value="" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="cert_valid[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="official_stamp[]" value=""
                                        class="form-control">
                                </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                            </tr>
                            <tr class="entry">
                                <td class="d-none">
                                    <input type="hidden" name="count[]" value="5" id="count"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="vaccine[]" readonly value="VARCIELLA"
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="date" name="date[]" max="2050-12-31" value=""
                                        class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="manufacturer[]" value="" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="cert_valid[]" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="official_stamp[]" value=""
                                        class="form-control">
                                </td>
                                <!-- <td>
                                    <button type="button" class="btn btn-success btn-add"><span class="fa fa-plus" aria-hidden="true"></span></button>
                                </td> -->
                            </tr>
                        </tbody>
                    </table>
                @endif
                <button class="btn btn-primary btn-solid">Submit and Print</button>
            </form>
        </div>
    </div>
</div>

<script>
    // $(function() {
    //     $(document).on('click', '.btn-add', function(e) {
    //         e.preventDefault();
    //         var controlForm = $('#repeating_yellow_form:first'),
    //             currentEntry = $(this).parents('.entry:first'),
    //             newEntry = $(currentEntry.clone()).appendTo(controlForm);
    //         newEntry.find('input').val('');
    //         newEntry.find('#count').val('{{ $count }}');
    //         controlForm.find('.entry:not(:last) .btn-add')
    //             .removeClass('btn-add').addClass('btn-remove')
    //             .removeClass('btn-success').addClass('btn-danger')
    //             .html('<i class="fa fa-trash"></i>');
    //     }).on('click', '.btn-remove', function(e) {
    //         e.preventDefault();
    //         $(this).parents('.entry:first').remove();
    //         return false;
    //     });
    // });
</script>
