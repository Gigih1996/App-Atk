@extends('adminlte::page')
@section('title', 'User - Create')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-6 font-weight-bold">Users - Create</div>
                        <div class="col-6 text-right">
                            <a href="{{ route('users.index') }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-backspace"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['route' => 'users.store', 'method' => 'post', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        <label for="name">Nama<span class="text-danger">*</span></label>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Password<span class="text-danger">*</span></label>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Confirm Password</label>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                        @error('confirm-password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Role<span class="text-danger">*</span></label>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                        @error('role')
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
    <style>
        .card-bordered {
            border-color: #ABAFFB;
        }

        .color-head {
            background: #ABAFFB;
        }
    </style>
@stop
