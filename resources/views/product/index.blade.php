@extends('adminlte::page')
@section('title', 'Product - Index')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-7 col-lg-6">
                            <h3><i class="fas fa-building font-weight-bold"></i> Product - Index</h3>
                        </div>
                        <div class="col-md-5 col-lg-6 text-right">
                            <button class="btn btn-md btn-dark" data-toggle="modal" onclick="CreateAction()"
                                data-target="#createModal">
                                <i class="fa fa-plus-circle fa-sm"></i> Create
                            </button>
                        </div>
                    </div>
                    @include('product.create')
                    @include('product.edit')
                    @include('sweetalert::alert')

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- {{-- @if (count($karyawan) > 0) --}} -->
                        <table class="table table-bordered table-striped" width="100%" id="TableList">
                            <thead>
                                <tr>
                                    <th class="text-center font-weight-bold text-dark" width="45">No</th>
                                    <th class="text-center font-weight-bold text-dark">Name</th>
                                    <th class="text-center font-weight-bold text-dark">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

{{-- CSS --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" defer>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap4.min.css" defer>
<style>
    .sorting_1 {
        text-align: center;
    }

    .select2-container--default.select2-container--open.select2-container--below .select2-selection--single,
    .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
        border-color: #56abdd;

    }


    .select2-container--default .select2-selection--single:focus {
        border-color: rgb(50 151 211 / 78%) !important;
        border-color: #56abdd !important;
    }

    .select2-container--default .select2-selection--single {
        height: 2.5rem;
        border-color: #CAD1D7;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 35px;
        font-size: 11px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 6.2px;
        right: 5px;
    }

    .select2-search--dropdown .select2-search__field {
        outline: none;
    }

    .select2-search--dropdown .select2-search__field:focus {
        border-color: #56ABDD !important;
    }


    div.dataTables_processing {
        background-color: transparent;
        border: none;
    }

    .select2-dropdown {
        border: 1px solid #56abdd;
    }

    .no-search .select2-search {
        display: none !important
    }
</style>

{{-- JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap4.min.js" defer></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js" defer></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js" defer></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.10/sorting/numeric-comma.js" defer></script> --}}

<script>
    $(function() {
        $('.js-example-basic-hide-search').select2({
            minimumResultsForSearch: Infinity
        });
    });
    $(document).ready(function() {

        var table = $('#TableList').DataTable({
            processing: true,
            lengthChange: false,

            pagingType: "simple_numbers",
            oLanguage: {
                oPaginate: {
                    sNext: '<span> Next </span>',
                    sPrevious: '<span> Previous </span>'
                },
            },
            language: {
                processing: '<i class="fa fa-spinner fa-spin text-primary fa-3x fa-fw"></i>'
            },

            serverSide: true,
            ajax: "{{ route('product.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'action',
                    sortable: false,
                    searchable: false
                },
            ],
            columnDefs: [{
                targets: [-1],
                className: 'dt-body-center'
            }]
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    function CreateAction() {
        $('#nameCreate').removeClass('is-invalid');
        $('#error_name').hide();
        $('#error_type').hide();
        $('#error_unit').hide();
        $('#error_stock').hide();

        $('#nameCreate').val('');
        $('#typeIdCreate').val('').select2('');
        $('#unitIdCreate').val('').select2('');
        $('#stockCreate').val('');

        $('#loading').hide();
        $('#submit').show();
    }

    function StoreCreate() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var formSet = $("#createForm").serializeArray();
        console.log(formSet);
        var error = 0;
        $.each(formSet, function(key, value) {
            if (value.value == '') {
                $('#' + value.name).addClass('is-invalid');
                $('#error_' + value.name).show();
                error++;
            }
        });

        if (error == 0) {
            $.ajax({
                type: 'POST',
                url: "{{ route('product.store') }}",
                data: formSet,
                beforeSend: function() {
                    $('#loading').show();
                    $('#submit').hide();
                },
                success: function(data) {
                    $('#createModal').modal('hide');
                    $('#TableList').DataTable().ajax.reload();
                    swal("Success!", "The Divisi create has been successfully!", "success");
                    $('#success').show();
                    $('#loading').hide();

                    $('#createForm')[0].reset();
                },

            });
        }
    }

    function EditAction(a,b,c,d,e) {
        $('#idUpdate').val(a);
        $('#nameUpdate').val(b);
        $('#typeIdUpdate').val(c).select2('');
        $('#unitIdUpdate').val(d).select2('');
        $('#stockUpdate').val(e);
    }

    function StoreUpdate() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var id = $('#idUpdate').val();
        var name = $('#nameUpdate').val();
        var type = $('#typeIdUpdate').val();
        var unit = $('#unitIdUpdate').val();
        var stock = $('#stockUpdate').val();
        // console.log(formSet);
        $.ajax({
            type: 'PUT',
            url: "{{ route('product_update') }}",
            data: {
                id: id,
                name: name,
                type_id: type,
                unit_id: unit,
                stock: stock
            },
            beforeSend: function() {
                $('#submit_edit').hide();
                $('#loading_edit').show();
            },
            success: function(data) {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                $('#updateModal').modal('hide');
                $('#TableList').DataTable().ajax.reload();
                swal("Success!", "The Divisi edit has been successfully!", "success");
                $('#loading_edit').hide();
                $('#submit_edit').show();
            }
        });
    };

    function DeleteAction(id, name) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        swal({
                title: "Are You Sure Delete Product?",
                text: "You Will Delete! " + name,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    // swal("Poof! Your imaginary file has been deleted!", {
                    //     icon: "success",
                    // });

                    $.ajax({
                        type: "POST",
                        url: "{{ route('product_destroy') }}",
                        data: {
                            '_method': 'DELETE',
                            id: id,
                            name: name
                        },

                        success: function(response) {
                            $("html, body").animate({
                                scrollTop: 0
                            }, "slow");
                            swal({
                                type: 'success',
                                title: 'Success!',
                                text: 'Data has been deleted!'
                            });
                            $('#TableList').DataTable().ajax.reload();

                        },
                        error: function(xhr) {
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!'
                            });
                        }
                    });

                } else {
                    swal("Your Files Are Safe Not Delete!");
                }
            });



    }
</script>
