@extends('adminlte::page')
@section('title', 'Reporting - index')
@section('content')
<div class="pt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Reporting</a></li>
            <li class="breadcrumb-item active">Index</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card card-bordered">
            <div class="card-body">
                @if(count($reporting) > 0)
                <table table id="example" class="display responsive nowrap" style="width:100%">
                    <thead class="table-dark bg-dark">
                        <tr>
                            <th class="text-center" width="10%">No</th>
                            <th class="text-center" width="22%">Kode Klasifikasi</th>
                            <th width="25%">Type Dokumen</th>
                            <th class="text-center" width="25%">Media Arsip</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reporting as $key => $item )
                        <tr>
                            <td class="text-center font-weight-normal">{{ ++$key}}</td>
                            <td class="text-center font-weight-normal">
                                {{ $role_name->getrole_name($item->archive->no_roles ) }} -
                                {{ $kabinet_nomor->getkabinet_nomor($item->archive->no_kabinet ) }} -
                                {{ $item->archive->nomor_berkas }} -
                                {{ $item->nomor_arsip}}
                            </td>
                            <td class="font-weight-normal">{{ $jenis_arsip->getjenisname($item->jenis_id) }}</td>
                            <td class="font-weight-normal">{{ $item->media->nama_media }}</td>
                            <td class="font-weight-normal">{{ $item->status->nama_status }}</td>
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
@stop
@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css" defer>
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" defer>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" defer>
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

<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js" defer></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel','print'
            ]
        });
    });
</script>
@stop