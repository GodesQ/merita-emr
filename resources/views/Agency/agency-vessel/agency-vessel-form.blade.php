<div class="card">
    <div class="card-header">
        <div class="card-title">
            Agency Vessel Form - <span class="type-form-text">ADD VESSEL</span>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="POST" id="agency-vessel-form" form-type-method="create">
            @csrf
            <input type="hidden" name="id" id="vessel_id">
            <input type="hidden" name="main_id" value="{{ $agency->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="vesselname" class="form-label">Vessel Name</label>
                        <input type="text" class="form-control" name="vesselname" id="vesselname" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Save Vessel</button>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $('#agency-vessel-form').submit(function (e) {
            e.preventDefault();
            const fd = new FormData(this);
            let form_type_method = $(this).attr('form-type-method');

            if(form_type_method == 'create') {
                $url = '{{ route("agency_vessels_store") }}';
            }

            if(form_type_method == 'update') {
                $url = '{{ route("agency_vessels_update") }}';
            }

            $.ajax({
                url: $url,
                method: 'POST',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status) {
                        Swal.fire({title: `${response.message}`, icon: 'success'}).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('#agency-vessel-form').reset();
                                table.draw(); // this table is from the list-agency-vessel.blade.php;

                            }
                        });
                    } else {
                        Swal.fire('Failed!', 'Something Went Wrong!', 'danger');
                    }
                }
            });
        })
    </script>
@endpush