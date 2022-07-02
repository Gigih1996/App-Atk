@extends('adminlte::page')
@section('title', 'Error - 403')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb"></nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"></a>Home</li>
        <li class="breadcrumb-item"><a href="#"></a>403</li>
        <li class="breadcrumb-item active">Error</li>
    </ol>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-center align-items-center min-vh-65 text-muted">
            <h1 class="mr-3 pr-3 align-top border-right inline-block align-content-center">403</h1>
            <div class="inline-block align-middle">
                <h2 class="font-weight-normal lead">{{ $exception->getMessage() }}</h2>
            </div>
        </div>
    </div>
</div>
@stop