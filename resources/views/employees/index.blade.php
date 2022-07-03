@extends('adminlte::page')
@section('title', 'Employee - Index')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-3">
            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <div class="row">
                        <div class="col-md-7 col-lg-6">
                            <h3><i class="far fa-id-card"></i> Employee - Index</h3>
                        </div>
                        <div class="col-md-5 col-lg-6 text-right">
                            <button class="btn btn-md btn-dark" data-toggle="modal" onclick="CreateEmployee()"
                                data-target="#createEmployeeModal">
                                <i class="fa fa-plus-circle fa-sm"></i> Create
                            </button>
                        </div>
                    </div>
                    @include('employees.create')
                    @include('employees.edit')
                    @include('sweetalert::alert')

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- {{-- @if (count($karyawan) > 0) --}} -->
                        <table class="table table-bordered table-striped" width="100%" id="TableEmployee">
                            <thead>
                                <tr>
                                    <th class="text-center font-weight-bold text-dark" width="45">No</th>
                                    <th class="text-center font-weight-bold text-dark">Kode Pengguna</th>
                                    <th class="text-center font-weight-bold text-dark">Nama Pengguna</th>
                                    <th class="text-center font-weight-bold text-dark">Divisi</th>
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
        line-height: 26px;
        font-size: 15px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 0.2px;
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

        $('.js-example-basic-single').select2();

    });

    $(document).ready(function() {

        var table = $('#TableEmployee').DataTable({
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
            ajax: "{{ route('employee.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id',
                },
                {
                    data: 'name',
                },
                {
                    data: 'divisi_name'
                },
                {
                    data: 'action',
                    sortable: false,
                    searchable: false
                },
            ],
            columnDefs: [{
                targets: [-1, -4],
                className: 'dt-body-center'
            }]
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    });

    function CreateEmployee() {
        $('#nameCreate').removeClass('is-invalid');
        $('#divisiIdCreate').val('').select2();
        $('#error_name').hide();
        $('#error_divisi_id').hide();
        $('#divisi_id').hide();
        $('#nameCreate').val('');
        $('#loading').hide();
        $('#submit').show();
    }

    function StoreCreateEmployee() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var formSet = $("#CreateEmployeeForm").serializeArray();
        // console.log(formSet);
        var error = 0;
        $.each(formSet, function(key, value) {
            if (value.value == '') {
                $('#' + value.name).addClass('is-invalid');
                $('#error_' + value.name).show();
                error++;
            }
        });
        console.log(formSet);

        if (error == 0) {
            $.ajax({
                type: 'POST',
                url: "{{ route('employee_store') }}",
                data: formSet,
                beforeSend: function() {
                    $('#loading').show();
                    $('#submit').hide();
                },
                success: function(data) {
                    $('#CreateEmployeeModal').modal('hide');
                    $('#TableEmployee').DataTable().ajax.reload();
                    swal("Success!", "The Employee create has been successfully!", "success");
                    $('#success').show();
                    $('#loading').hide();

                    $('#CreateEmployee')[0].reset();
                },

            });
        }
    }

    function UpdateEmployee() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formSet = $("#EmployeeFormUpdate").serializeArray();
        // console.log(formSet);
        $.ajax({
            type: 'PUT',
            url: "{{ route('employee_update') }}",
            data: formSet,
            beforeSend: function() {
                $('#submit_edit_employee').hide();
                $('#loading_edit_employee').show();
            },
            success: function(data) {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow");
                $('#EditEmployeeModal').modal('hide');
                $('#TableEmployee').DataTable().ajax.reload();
                swal("Success!", "The Divisi edit has been successfully!", "success");
                $('#loading_edit_employee').hide();
                $('#submit_edit_employee').show();
            }
        });
    };

    function DeleteEmployee(id, name) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        swal({
                title: "Are You Sure Delete Employee?",
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
                        url: "{{ route('employee_destroy') }}",
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
                            $('#TableEmployee').DataTable().ajax.reload();

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
