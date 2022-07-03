<div class="modal fade" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white font-weight-bold">
                <h5 class="modal-title"><i class="far fa-id-card"></i> Create Outgoing Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'transactionoutcoming.store', 'method' => 'POST', 'id' => 'createForm', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    <label for="employee_id" class="font-weight-bold">Employee<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="employee_id" id="employee_id"
                        data-width="100%" data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($optionEmployee as $item)
                            <option value="{{ $item->id }}"
                                @if (old('employee_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_employee">The employee field is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="product_id" class="font-weight-bold">Product<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="product_id" id="product_id"
                        data-width="100%" data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($optionProduct as $item)
                            <option value="{{ $item->id }}"
                                @if (old('product_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_product">The product field is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="unit_id" class="font-weight-bold">Unit<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="unit_id" id="unit_id" data-width="100%"
                        data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($optionUnit as $item)
                            <option value="{{ $item->id }}"
                                @if (old('unit_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_unit">The unit field is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="total" class="font-weight-bold">Total<span class="text-danger">*</span></label>
                    {!! Form::number('total', null, ['placeholder' => 'Total', 'class' => 'form-control', 'required', 'id' => 'total']) !!}
                    <div class="text-danger" style="display: none;" id="total">The total field is required</div>
                </div>
                <div class="form-group">
                    <label for="supplier_id" class="font-weight-bold">Unit<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="supplier_id" id="supplier_id"
                        data-width="100%" data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($optionSupplier as $item)
                            <option value="{{ $item->id }}"
                                @if (old('supplier_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_unit">The supplier field is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="date" class="font-weight-bold">Date<span class="text-danger">*</span></label>
                    {!! Form::date('date', null, ['placeholder' => 'Date', 'class' => 'form-control', 'required', 'id' => 'date']) !!}
                    <div class="text-danger" style="display: none;" id="date">The total field is required</div>
                </div>



                {!! Form::close() !!}
            </div>

            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-md btn-primary" id="submit" onclick="StoreCreateEmployee()">
                    <i class="fa fa-plus-circle fa-sm"></i> Store
                </button>
                <button type="button" class="btn btn-md btn-primary" id="loading" style="display:none;">
                    <div class="spinner-border text-light spinner-border-sm" role="status">
                    </div> Process
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fas fa-door-closed"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
