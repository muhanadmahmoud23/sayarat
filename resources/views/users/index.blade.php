@extends('layouts.main')
@section('title', 'Employee')
@section('content')

    <body>

        <div class="container mt-4">

            <div class="card">
                <div class="m-3">
                    <h2 push-left>employee</h2>
                    <a href="{{ route('employee.create') }}" id="btn-btn-create" class="btn btn-primary pull-left "
                        title="Add New Company"><i class="fa fa-plus"></i> Add New employee</a>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Last Name</th>
                                <th>Salary</th>
                                <th>Image</th>
                                <th>Manager First Name</th>
                                <th>Full Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>

                </div>

            </div>
            <script type="text/javascript">
                var storagePath = "{!! asset('storage/images/employee/')!!}";

                $(document).ready(function() {
                    $('#datatables-example').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ route('employee.index') }}",
                        columns: [{
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'last_name',
                                name: 'last_name'
                            },
                            {
                                data: 'salary',
                                name: 'salary'
                            },
                            {
                                data: 'image',
                                render: function(data, type, row, meta) {
                                    return '<img src=' + storagePath + '/'+data +
                                        '  height="50" width="50"/>';
                                }
                            }, {
                                data: 'manager_name',
                                name: 'manager_name'
                            },
                            {
                                data: 'full_name',
                                name: 'full_name'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ]
                    });
                });
            </script>
        </div>
    </body>

@endsection
