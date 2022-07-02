@extends('adminlte::page')
@section('title', 'Role - Show')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles</a></li>
            <li class="breadcrumb-item active"><a href="#">Show #{{ $role->id}}</a></li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-header color-head">
                <div class="row">
                    <div class="col-6 font-weight-bold">Roles - Show #{{ $role->id }}</div>
                    <div class="col-6 text-right">
                        <a href="{{ route('roles.index')}}" class="btn btn-dark btn-sm">
                            <i class="fas fa-backspace"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Nama</label>
                    <div> {{ $role->name }}</div>
                </div>
                <div class="form-group">
                    <label for="permission" class="font-weight-bold">Permission</label>
                    <div>
                        @if (!empty($rolePermission))
                        @foreach ($rolePermission as $key => $item)
                        <span class="badge badge-secondary">{{ $item->name }}</span>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop