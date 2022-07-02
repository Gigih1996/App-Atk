@extends('adminlte::page')
@section('title', 'User - Show')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-6 font-weight-bold">Users - Show #{{ $user->id }}</div>
                        <div class="col-6 text-right"><a href="{{ route('users.index') }}" class="btn btn-dark btn-sm">
                                <i class="fas fa-backspace"></i> Back</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Nama</label>
                        <div>{{ $user->name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <div>{{ $user->email }}</div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Role</label>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $item)
                                <div><span class="badge badge-secondary">{{ $item }}</span></div>
                            @endforeach
                        @endif
                    </div>
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
