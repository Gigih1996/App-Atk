@extends('adminlte::page')
@section('title', 'Kabinet - Index')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Kabinets</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
</div>
<div class="row ">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-header color-head">
                <div class="row">
                    <div class="col-6 font-weight-bold">Kabinet - Index</div>
                    <div class="col-6 text-right">
                        @can('user-create')
                        <a href="{{ route('kabinet.create')}}" class="btn btn-dark btn-sm">
                            <i class="fas fa-plus-circle"></i> Create
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if(count($kabinets) > 0)
                <table id="example" class="display responsive nowrap" style="width:100%">
                    <thead class="table-dark bg-dark">
                        <tr>
                            <th class="text-center" width="8%">No</th>
                            <th class="text-center" width="12%">No.Kabinet</th>
                            <th width="25%">Name Kabinet</th>
                            <th class="text-center">Description</th>
                            <th class="text-center" width="30%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kabinets as $key => $item )
                        <tr>
                            <td class="text-center font-weight-normal">{{ ++$key }}</td>
                            <td class="text-center font-weight-normal">{{ $role_name->getrolename($item->roles_id) }} - {{ $item->nomor_kabinet }}</td>
                            <td class="font-weight-normal">{!! Str::ucfirst($item->nama_kabinet, 0) !!}</td>
                            <td class="font-weight-normal">{!! Str::words($item->uraian, 6, '...') !!}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @can('user-list')
                                    <a href="{{ route('kabinet.show', $item->id) }}" class="btn btn-success btn-sm">
                                        <i class="fas fa-search"></i>
                                    </a>
                                    @endcan
                                    @can('user-edit')
                                    <a href="{{ route('kabinet.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('user-delete')
                                    <form action="{{ route('kabinet.destroy', $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger btn-sm delete" data-id="{{ $item->id }}" data-name="{{ $item->nama_kabinet }}">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                    <span class="text-danger">The data is empty!</span>
                    @endif
                </table>
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
        var kabinet_id = $(this).attr('data-id');
        var kabinet_name = $(this).attr('data-name');

        swal({
                title: "Are you sure?",
                text: "You will delete kabinet " + kabinet_name + " ",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "kabinet/destroy/" + kabinet_id + ""
                    swal("Data kabinet has been delete successfully! ", {
                        icon: "success",
                    });
                } else {
                    swal("Data kabinet has been cancel");
                }
            });
    });
</script>
@stop