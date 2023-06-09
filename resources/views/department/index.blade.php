@extends('layouts.main')
@section('title','department')
@section('content')

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="m-3">
                <h2 push-left>department</h2>
                <a href="{{ route('department.create') }}" id="btn-btn-create" class="btn btn-primary pull-left "
                    title="Add New Company"><i class="fa fa-plus"></i> Add New department</a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped " id="datatables-example">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>Deparment Total Employees</th>
                            <th>Department Total Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatables-example').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('department.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data:'name',
                            name:'name'
                        },

                        {
                            data: 'sum_users',
                            name: 'sum_users'
                        },
                        {
                            data:'sum_salary',
                            name:'sum_salary'
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
