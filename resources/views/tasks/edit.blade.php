@extends('layouts.main')
@section('title','task')
@section('content')

    <div id="kt_content_container" class="container">
        <div class="card">
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bolder fs-3 mb-1">Add New task</span>
                </h3>
            </div>
            <div class="card-body py-3">
                {!! Form::model($task, ['route' => ['task.update', $task->id], 'method' => 'put']) !!}
                    @csrf
                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> Name</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('name', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-md-2">
                            <label class="form-label required"> Last Name</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('last_name', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('last_name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> Salary</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::number('salary', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('salary')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-md-2">
                            <label class="form-label required"> Email</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('email', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="row  align-items-center">
                                {!! Form::hidden('password', null, ['class' => 'form-control form-control-lg form-control-solid', 'required','readonly','hidden']) !!}
                           {!! Form::hidden('id', null, ['class' => 'form-control form-control-lg form-control-solid', 'required','readonly','hidden']) !!}

                        <div class="col-md-2">
                            <label class="form-label required"> Manager ID</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::select('manager_id', $managers, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                            </div>
                        </div>
                        @error('manager_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="row  align-items-center">


                        <div class="col-md-2">
                            <label class="form-label required"> Image</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::file('image', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('image')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                </div>
                <div class="row ">
                    <div class="col text-center mt-1">
                        <button class="btn btn-primary px-20 mt-1">Save </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
