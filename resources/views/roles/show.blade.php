@extends('adminlte::page')
@section('title', 'Role - Show')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-6 font-weight-bold">Roles - Show #{{ $role->id }}</div>
                        <div class="col-6 text-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-dark btn-sm">
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
