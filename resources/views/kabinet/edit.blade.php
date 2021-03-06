@extends('adminlte::page')
@section('title', 'Kabinet - Edit')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Kabinets</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-header color-head">
                <div class="row">
                    <div class="col-6 font-weight-bold">Kabinet - Edit</div>
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
                {!! Form::model($kabinet, ['route' => ['kabinet.update',$kabinet->id], 'method' => 'patch']) !!}
                <div class="form-group row">
                    <div class="col-6">
                        <label for="nomor_kabinet" class="font-weight-bold">Nomor Kabinet<span class="text-danger">*</span></label>
                        {!! Form::text('nomor_kabinet', null, ['placeholder' => 'Nomor Kabinet', 'class' => 'form-control']) !!}
                        @error('nomor_kabinet')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="roles_id" class="font-weight-bold">Grup User<span class="text-danger">*</span></label>
                        <select class="form-control  @error('roles_id') is-invalid @enderror" data-width="100%" name="roles_id" id="roles_id">
                            @foreach ($roles as $item)
                            <option value="{{ $item->id }}" @if($kabinet->roles_id == $item->id) selected="selected" @endif>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('roles_id')
                        <code>{{ $message }}</code>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_kabinet" class="font-weight-bold">Name Kabinet<span class="text-danger">*</span></label>
                    {!! Form::text('nama_kabinet', null, ['placeholder' => 'Nama Kabinet', 'class' => 'form-control']) !!}
                    @error('nama_kabinet')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="uraian" class="font-weight-bold">Uraian<span class="text-danger">*</span></label>
                    <textarea name="uraian" id="uraian" class="form-control @error('uraian') is-invalid @enderror">{{ $kabinet->uraian }}</textarea>
                    @error('uraian')
                    <code>{{ $message }}</code>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan" class="font-weight-bold">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control">{{ $kabinet->keterangan }}</textarea>
                </div>
                <button type="submit" class="btn  submit btn-primary"><i class="fas fa-edit"></i> Update</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container .select2-selection--single {
        height: 37px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 37px;
    }

    .select2-container--default .select2-selection--single {
        border-radius: 0.25rem;
        border: 1px solid #ced4da;
    }

    .card-bordered {
        border-color: #ABAFFB;
    }

    .color-head {
        background: #ABAFFB;
    }

    .breadcrumb li a {
        text-decoration: none !important;
    }
</style>
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
<script>
    $(function() {
        $('select').select2();

    });
</script>
@stop