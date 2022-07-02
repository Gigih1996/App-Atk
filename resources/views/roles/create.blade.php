@extends('adminlte::page')
@section('title', 'Role - Create')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-6 font-weight-bold">Roles - Create</div>
                        <div class="col-6 text-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-backspace"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'roles.store', 'method' => 'post']) !!}
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nama<span class="text-danger">*</span></label>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="permission" class="font-weight-bold">Permission<span
                                class="text-danger">*</span></label>
                        @foreach ($permission as $key => $item)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="permission{{ $key }}"
                                    name="permission[]" value="{{ $item->id }}">
                                <label for="permission{{ $key }}"
                                    class="custom-control-label">{{ $item->name }}</label>
                            </div>
                        @endforeach
                        @error('permission')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Store</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style type="text/css">
        .card-border {
            border-color: #ABAFFB;
        }

        .card-header-color {
            background: #ABAFFB;
        }

        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 500;
        }
    </style>
@stop
