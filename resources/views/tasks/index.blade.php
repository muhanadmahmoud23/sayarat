@extends('layouts.main')
@section('title','task')
@section('content')

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="m-3">
                <h2 push-left>task</h2>
                <a href="{{ route('task.create') }}" id="btn-btn-create" class="btn btn-primary pull-left "
                    title="Add New Company"><i class="fa fa-plus"></i> Add New task</a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped " id="datatables-example">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Subject</th>
                            <th>Task</th>
                            <th>Employee Name</th>
                            <th>Status</th>
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
                    ajax: "{{ route('task.index') }}",
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'subject',
                            name: 'subject'
                        },
                        {
                            data:'task',
                            name:'task'
                        },
                        {
                            data:'name',
                            name:'name'
                        },
                        {
                            data:'status',
                            name:'status'
                        },
                    ]
                });
            });
        </script>
    </div>
</body>

@endsection
