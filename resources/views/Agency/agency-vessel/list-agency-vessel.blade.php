<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover agency-vessel-table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Vessel Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>


@push('scripts')
    <script>
        let table;

        function loadTable() {
            table = $('.agency-vessel-table').DataTable({
                proccessing: true,
                pageLength: 10,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("agency_vessels_datatable") }}'
                },
                columns: [
                    {
                        data: 'id',
                    },
                    {
                        data: 'vesselname'
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

        $(document).on('click', '.edit-vessel', function (e) {
            let id = $(this).attr('id');
            $.ajax({
                url: `agency_vessel/show/${id}`,
                method: 'GET',
                success: function(response) {
                    if(response.status) {
                        $('#agency-vessel-form').attr('form-type-method', 'update');
                        $('.type-form-text').text('EDIT VESSEL'); 
                        $('#vesselname').val(response.agency_vessel.vesselname);
                        $('#vessel_id').val(response.agency_vessel.id);
                    }
                }
            });
        })

        $(document).on('click', '.add-vessel', function (e) {
            document.querySelector('#agency-vessel-form').reset();
            $('#agency-vessel-form').attr('form-type-method', 'create');
            $('.type-form-text').text('ADD VESSEL'); 
        })

        $(document).on('click', '.delete-vessel', function (e) {
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
                        url: '{{ route("agency_vessels_destroy") }}',
                        method: 'delete',
                        data: {
                            id: id,
                            _token: csrf
                        },
                        success: function(response) {
                            table.draw();
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