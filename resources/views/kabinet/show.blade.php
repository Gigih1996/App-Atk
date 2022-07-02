@extends('adminlte::page')
@section('title', 'Kabinet - Show')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Kabinet</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-border">
            <div class="card-header card-header-color">
                <div class="row">
                    <div class="col-6 font-weight-bold">Kabinet - Show #{{ $kabinets->id }}</div>
                    <div class="col-6 text-right">
                        @can('user-create')
                        <a href="{{ route('kabinet.index')}}" class="btn btn-dark btn-sm">
                            <i class="fas fa-backspace"></i> Back
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table striped mb-0">
                    <tbody>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#NOMOR BERKAS</th>
                            <td> {{ $kabinets->nomor_kabinet }}</td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#GRUB USER</th>
                            <td> {{ $role_name->getrolename($kabinets->roles_id) }}</td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#NAMA KABINET</th>
                            <td> {{ $kabinets->nama_kabinet }} </td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#URAIAN</th>
                            <td> {{ $kabinets->uraian }} </td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#KETERANGAN</th>
                            <td> {{ $kabinets->keterangan }} </td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#CREATED_AT</th>
                            <td> {{ $kabinets->created_at }} </td>
                        </tr>
                        <tr>
                            <th width="200" class="table-dark bg-dark">#UPDATED_AT</th>
                            <td> {{ $kabinets->updated_at }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
    <style>
        .card-border {
            border-color: #ABAFFB;
        }

        .card-header-color {
            background: #ABAFFB;
        }

        .breadcrumb li a {
            text-decoration: none !important;
        }
    </style>
@stop