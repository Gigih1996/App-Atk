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
                    <form action="">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="start_date">Start Date<span class="text-danger">*</span></label>
                                        {!! Form::date('start_date', null, ['class' => 'form-control', 'placeholder' => 'Start Date', 'id'=>'start_date', 'required']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label for="start_date">End Date<span class="text-danger">*</span></label>
                                        {!! Form::date('end_date', null, ['class' => 'form-control', 'placeholder' => 'End Date','id'=>'end_date', 'required']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-lg" type="button" style="width: 100%;" id="ActionDate"
                                onclick="CreateDate()">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                        <button type="button" class="btn btn-lg btn-success" style="width: 100%; display:none;"
                            id="ProcessDate">
                            <div class="spinner-border text-light spinner-border-sm" role="status">
                            </div> Process
                        </button>
                    </form>
                    <h2>Start Date</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="TableReporting" style="display:none;">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Divisi </th>
                                    <th>Total Pemakaian</th>
                                    <th class="text-center">Persentase Pemakaian</th>
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
<script>
    $(function() {
        $('.js-example-basic-hide-search').select2({
            minimumResultsForSearch: Infinity
        });

        $('.js-example-basic-single').select2();
    });

    function ListTable(start_date,end_date) {
        $('#TableReporting').show();


        var table = $('#TableReporting').DataTable({
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
            ajax: "{{ route('reporting_index') }}"+'?startDate='+start_date,
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'products'
                },
                {
                    data: 'departement'
                },
                {
                    data: 'total_sum'
                },
                {
                    data: 'persen'
                }
            ],
            columnDefs: [{
                targets: [-1, -2, -3, -4],
                className: 'dt-body-center'
            }]
        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-md-6:eq(0)');
    };


    function CreateDate() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();
        // var formSet = $("#TableReporting").serializeArray();

        $.ajax({
            // type: 'POST',
            // url: "{{ route('product.store') }}",
            // data: formSet,
            beforeSend: function() {
                $('#ProcessDate').show();
                $('#ActionDate').hide();

            },
            success: function() {
                ListTable(startDate,endDate);
                $('#TableReporting').DataTable().ajax.reload();
                // swal("Success!", "The Divisi create has been successfully!", "success");
                $('#ActionDate').show();
                $('#ProcessDate').hide();
                // $('#createForm')[0].reset();
            },

        });
    }
</script>
