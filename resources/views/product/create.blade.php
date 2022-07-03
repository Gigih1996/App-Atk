<div class="modal fade" id="createModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white font-weight-bold">
                <h5 class="modal-title"><i class="fas fa-box"></i> Create Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'id' => 'createForm', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required', 'id' => 'nameCreate']) !!}
                    <div class="text-danger" style="display: none;" id="error_name">The name field is required</div>
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Type<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-hide-search" name="type_id" id="typeIdCreate"
                        data-width="100%" data-placeholder="-- Choose Type --">
                        <option value=""></option>
                        @foreach ($optionType as $item)
                            <option value="{{ $item->id }}"
                                @if (old('type_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_type">The name field is required</div>
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Unit<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-hide-search" name="unit_id" id="unitIdCreate"
                        data-width="100%" data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($optionUnit as $item)
                            <option value="{{ $item->id }}"
                                @if (old('unit_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_unit">The name field is required</div>
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Stock<span class="text-danger">*</span></label>
                    {!! Form::number('stock', null, ['placeholder' => 'Stock', 'class' => 'form-control', 'required', 'id' => 'stockCreate']) !!}
                    <div class="text-danger" style="display: none;" id="error_stock">The name field is required</div>
                </div>

                {!! Form::close() !!}
            </div>

            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-md btn-primary" id="submit" onclick="StoreCreate()">
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
