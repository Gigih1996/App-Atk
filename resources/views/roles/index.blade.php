@extends('adminlte::page')
@section('title', 'Role - Index')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Roles</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-header color-head">
                <div class="row">
                    <div class="col-6 font-weight-bold">Roles - Index</div>
                    <div class="col-6 text-right">
                        @can('role-create')
                        <a href="{{ route('roles.create')}}" class="btn btn-dark btn-sm">
                            <i class="fas fa-plus-circle"></i> Create
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(count($roles) > 0)
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead class="table-dark bg-dark">
                        <tr>
                            <th class="text-center" width="10%">No</th>
                            <th>Name</th>
                            <th>Created</th>
                            <th class="text-center" width="25%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $item )
                        <tr>
                            <th class="text-center font-weight-normal">{{ ++$key }}</th>
                            <th class="font-weight-normal">{{ $item->name}}</th>
                            <th class="font-weight-normal">{{ $item->created_at->diffForHumans() }}</th>
                            <th class="text-center">
                                <div class="btn-group">
                                    @can('role-list')
                                    <a href="{{ route('roles.show', $item->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    @endcan
                                    @can('role-edit')
                                    <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('role-delete')
                                    @if (1 != $item->id)
                                    <form action="{{ route('roles.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm delete"
                                            data-id="{{ $item->id }}" data-name="{{ $item->name }}">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endif
                                    @endcan
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <span class="text-danger">The data is empty!</span>
                @endif
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@stop
@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" defer>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" defer>
<style>
    .card-bordered {
        border-color: #ABAFFB;
    }

    .color-head {
        background: #ABAFFB;
    }

    ul.pagination {
        margin-bottom: 0;
        float: right;

    }

    .breadcrumb li a {
        text-decoration: none !important;
    }
</style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" defer></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- SWEETALERT -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $('.delete').click(function (event) {
        event.preventDefault();
        var role_id = $(this).attr('data-id');
        var role_name = $(this).attr('data-name');

        swal({
            title: "Are you sure?",
            text: "You will delete role " + role_name + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "roles/destroy/" + role_id + ""
                    swal("Data role has been delete successfully! ", {
                        icon: "success",
                    });
                } else {
                    swal("Data role has been cancel");
                }
            });
    });
</script>
@stop
