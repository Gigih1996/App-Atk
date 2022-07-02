@extends('adminlte::page')
@section('title', 'User - Index')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Users</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Index</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-header color-head">
                <div class="row">
                    <div class="col-6 font-weight-bold">Users - Index</div>
                    <div class="col-6 text-right">
                        @can('user-create')
                        <a href="{{ route('users.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus-circle"></i> Create</a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(count($users) > 0)
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead class="table-dark bg-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Created</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item )
                        <tr>
                            <th class="text-center font-weight-normal">{{++$key}}</th>
                            <th class="font-weight-normal">{{ $item->name}}</th>
                            <th class="font-weight-normal">{{ $item->email}}</th>
                            <th>
                                @if (empty($item->getRoleNames()))
                                -
                                @else
                                @foreach ($item->getRoleNames() as $value)
                                <span class="badge badge-secondary">{{ $value }}</span>
                                @endforeach
                                @endif
                            </th>
                            <th class="font-weight-normal">{{ $item->created_at->diffForHumans() }}</th>
                            <th class="text-center">
                                <div class="btn-group">
                                    @can('user-list')
                                    <a href="{{ route('users.show', $item->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    @endcan
                                    @can('user-edit')
                                        @if (4 != $item->id)
                                            <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                    @endcan
                                    @can('role-delete')
                                    @if (1 != $item->id )
                                        <form action="{{ route('users.destroy', $item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}" data-name="{{ $item->name }}">
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
    $(document).ready(function() {
        $('#example').DataTable();
    });

    $('.delete').click(function(event) {
        event.preventDefault();
        var user_id = $(this).attr('data-id');
        var user_name = $(this).attr('data-name');

        swal({
                title: "Are you sure?",
                text: "You will delete user " + user_name + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "users/destroy/" + user_id + ""
                    swal("Data user has been delete successfully! ", {
                        icon: "success",
                    });
                } else {
                    swal("Data user has been cancel");
                }
            });
    });
</script>
@stop