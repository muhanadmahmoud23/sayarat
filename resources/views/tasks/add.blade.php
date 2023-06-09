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
                <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> subject</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('subject', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('subject')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror

                        <div class="col-md-2">
                            <label class="form-label required"> task</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::text('task', null, ['class' => 'form-control form-control-lg form-control-solid', 'required']) !!}
                            </div>
                        </div>
                        @error('task')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="row  align-items-center">
                        <div class="col-md-2">
                            <label class="form-label required"> Manager ID</label>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! Form::select('user_id', $employees, ['class' => 'form-control form-control-lg form-control-solid']) !!}
                            </div>
                        </div>
                        @error('user_id')
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
