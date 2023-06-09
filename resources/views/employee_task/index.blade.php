@include('layouts.head')
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>


    <body class="g-sidenav-show   bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>

        <main class="main-content position-relative border-radius-lg ">

@include('layouts.components.alert')

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Welcome Back, {{ Auth::user()->name }}</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('logout') }}" class="nav-link text-white font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </main>


    <body>

        <div class="container mt-4">

            <div class="card">
                <div class="m-3">
                    <h2 push-left>Tasks</h2>
                </div>

                <div class="card-body">

                    <table class="table table-bordered table-striped " id="datatables-example">
                        <thead class="thead-dark">
                            <tr>
                                <th>Subject</th>
                                <th>Tasks</th>
                                <th>status</th>
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
                        ajax: "{{ route('employee_task.index') }}",
                        columns: [
                            {
                                data: 'subject',
                                name: 'subject'
                            },
                            {
                                data:'task',
                                name:'task'
                            },
                            {
                                data:'status',
                                name:'status'
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
    @include('layouts.footer')
