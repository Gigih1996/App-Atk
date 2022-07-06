<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
<h1 class="m-0">Dashboard</h1>
<p>Welcome Back</p>

<div class="row pb-2">
    <div class="col-md-4">
        <div class="small-box bg-gradient-success">
            <div class="inner">
                <h3>{{$label['product']}}</h3>
                <p>Product</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-archive"></i>
            </div>
            <a href="/product" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-info">
            <div class="inner">
                <h3>{{$label['incoming']}}</h3>
                <p>Incoming Transaction</p>
            </div>
            <div class="icon">
                <i class="fas fa-file-archive"></i>
            </div>
            <a href="/transactionincoming" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="small-box bg-gradient-danger">
            <div class="inner">
                <h3>{{$label['outgoing']}}</h3>
                <p>Outgoing </p>
            </div>
            <div class="icon">
                <i class="fas fa-file-archive"></i>
            </div>
            <a href="/product" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>
{{-- <div class="row pb-5">
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
</div> --}}
<div class="row pb-2">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Top 5 Requestor</h3>
                <div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-sync"></i>
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr class="text-center">
                            <th>Division</th>
                            <th>Quantity</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>                    
                    <tbody>
                        @foreach ($listRequestor as $row)
                        <tr class="text-center">
                            <td>{{$row->name}}</td>
                            <td >{{$row->qty}}</td>
                            <td>{{number_format($row->persen)}}%</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <canvas id="myChart" width="100%" height="50px"></canvas>
                    </div>
                    <div class="col-md-6 text-center ">
                        <h4 class="font-weight-bold ">TOTAL TRANSACTION <br> {{$label['outgoing']+$label['incoming']}}</h4>

                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6 col-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">{{$label['employee']}}</h5>
                            <span class="description-text">Employee</span>
                        </div>

                    </div>

                    <div class="col-md-6 col-6">
                        <div class="description-block border-right">
                            <h5 class="description-header">{{$label['division']}}</h5>
                            <span class="description-text">Division</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        {{-- <div class="fixed-bottom">
    <nav class="main-header navbar navbar-expand navbar-white navbar-dark bg-dark">
        <div class="col-6">
            <small>&copy; PT. ARTHA ASIA FINANCE</small>
        </div>
        <div class="col-6 text-right">
            <span>
                Version 1.1
            </span>
        </div>
    </nav>
</div> --}}

        <script>
            const ctx = document.getElementById('myChart');
            const myChart = new Chart(ctx, {
                type: 'pie'
                , data: {
                    labels: [
                        'Outoging',
                        'Incoming'
                    ]
                    , datasets: [{
                        label: 'My First Dataset'
                        , data: [{{$label['outgoing']}}, {{$label['incoming']}}]
                        , backgroundColor: [
                            'rgb(255, 99, 132)',
                            'rgb(54, 162, 235)'
                        ]
                        , hoverOffset: 4
                    }]
                }
                , options: {
                    plugins: {
                        legend: {
                            display: false
                            , labels: {
                                color: 'rgb(255, 99, 132)'
                            }
                        }
                        , datalabels: {
                            display: false
                        , }
                    }
                }
            });

        </script>

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
