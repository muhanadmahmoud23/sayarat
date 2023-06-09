@include('layouts.head')
<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>


    <body class="g-sidenav-show   bg-gray-100">
        <div class="min-height-300 bg-primary position-absolute w-100"></div>

        <main class="main-content position-relative border-radius-lg ">

@include('layouts.components.alert')

    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Edit Task</span>
                    <a href="{{ route('employee_task.index') }}" id="btn-btn-create" class="btn btn-primary pull-left "
                    title="Add New Company"><i class="fa fa-back"></i> Back</a>
                </h3>
            </div>
            <div class="card-body py-3">
                {!! Form::model($employee_task, ['route' => ['employee_task.update', $employee_task->id], 'method' => 'put']) !!}
                    @csrf
                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> Subject</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                {!! Form::text('subject', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('subject')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-md-2">
                            <label class="form-label required">Task</label>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                {!! Form::text('task', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('task')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    {!! Form::hidden('user_id', null, ['class' => 'form-control form-control-lg form-control-solid', 'required','readonly','hidden']) !!}
                <div class="row ">
                    <div class="col text-center mt-1">
                        <button class="btn btn-primary px-20 mt-1">Save </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@include('layouts.footer')
