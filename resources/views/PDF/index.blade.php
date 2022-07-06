@extends('adminlte::page')
@section('title', 'Reporting - Index')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-7 col-lg-6">
                            <h3><i class="far fa-file-alt"></i> Reporting - Index</h3>
                        </div>
                        <div class="col-md-5 col-lg-6 text-right">
                            <a href="{{ route('pdf_index') }}" class="btn btn-md btn-danger">
                                <i class="far fa-file-pdf"></i> Export PDF
                            </a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>

                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
