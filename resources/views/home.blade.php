@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
    <div class="pt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <div class="row pb-2">
        <div class="col-md-4">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3></h3>
                    <p>Total Purchase Order</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-archive"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gradient-info">
                <div class="inner">
                    <h3></h3>
                    <p>Total Receiver Order</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-archive"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3></h3>
                    <p>Total Request Employe</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-archive"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row pb-5">
        <div class="col-md-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3></h3>
                    <p>Request Progress</p>
                </div>
                <div class="icon">
                    <i class="far fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3></h3>
                    <p>Total Request</p>
                </div>
                <div class="icon">
                    <i class="far fa-envelope"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h3></h3>
                    <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="fixed-bottom">
        <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-dark">
            <div class="col-6">
                <small>&copy; PT. INTI NOMIKA INDONESIA</small>
            </div>
            <div class="col-6 text-right">
                <span>
                    Version 1.1
                </span>
            </div>
        </nav>
    </div>

@stop

@section('css')
    <style>
        .body-color {
            border: 1px solid #ABAFFB !important;
        }

        .header-color {
            background: #3B2667;
        }

        .header-color2 {
            background: linear-gradient(to right, #8e0e00, #1f1c18);
        }

        .color-head {
            background: #ABAFFB;
        }
    </style>
@stop
