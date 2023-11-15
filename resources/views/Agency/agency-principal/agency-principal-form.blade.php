<div class="card">
    <div class="card-header">
        <div class="card-title">
            Agency Principal Form - <span class="type-form-text">ADD PRINCIPAL</span>
        </div>
    </div>
    <div class="card-body">
        <form action="#" method="POST" id="agency-principal-form" form-type-method="create">
            @csrf
            <input type="hidden" name="id" id="principal_id">
            <input type="hidden" name="main_id" value="{{ $agency->id }}">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="principal_name" class="form-label">Principal Name</label>
                        <input type="text" class="form-control" name="principal_name" id="principal_name" required>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary">Save Principal</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $('#agency-principal-form').submit(function (e) {
        e.preventDefault();
        const fd = new FormData(this);
        let form_type_method = $(this).attr('form-type-method');

        if(form_type_method == 'create') {
            $url = '{{ route("agency_principals_store") }}';
        }

        if(form_type_method == 'update') {
            $url = '{{ route("agency_principals_update") }}';
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
                            document.querySelector('#agency-principal-form').reset();
                            agency_principal_table.draw(); // this table is from the list-agency-principal.blade.php;

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