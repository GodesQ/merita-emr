<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover agency-principal-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Principal Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@push('scripts')
<script>
    let agency_principal_table;

    function loadTable() {
        agency_principal_table = $('.agency-principal-table').DataTable({
            proccessing: true,
            pageLength: 10,
            responsive: true,
            serverSide: true,
            ajax: {
                url: '{{ route("agency_principals_datatable") }}'
            },
            columns: [
                {
                    data: 'id',
                },
                {
                    data: 'principal_name'
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'actions',
                }
            ]
        });
    }

    loadTable();

    $(document).on('click', '.edit-principal', function (e) {
            let id = $(this).attr('id');
            $.ajax({
                url: `agency_principal/show/${id}`,
                method: 'GET',
                success: function(response) {
                    if(response.status) {
                        $('#agency-principal-form').attr('form-type-method', 'update');
                        $('.type-form-text').text('EDIT Principal'); 
                        $('#principalname').val(response.agency_principal.principalname);
                        $('#principal_id').val(response.agency_principal.id);
                    }
                }
            });
        })

        $(document).on('click', '.add-principal', function (e) {
            document.querySelector('#agency-principal-form').reset();
            $('#agency-principal-form').attr('form-type-method', 'create');
            $('.type-form-text').text('ADD Principal'); 
        })

        $(document).on('click', '.delete-principal', function (e) {
            console.log("TRUE");
            // e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            Swal.fire({
                title: 'Are you sure you want to delete it?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("agency_principals_destroy") }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            agency_principal_table.draw();
                            if(response.status) {
                                Swal.fire({title: `${response.message}`, icon: 'success'});
                            }
                        }
                    });
                }
            })
        })

</script>
@endpush