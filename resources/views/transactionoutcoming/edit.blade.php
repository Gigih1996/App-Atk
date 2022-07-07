<div class="modal fade" id="updateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white font-weight-bold">
                <h5 class="modal-title"><i class="fas fa-box-open"></i> Edit Transaction Outgoing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DepartementFormUpdate" autocomplete="off">
                    <input type="hidden" id="idUpdate" name="id">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Employee Name<span
                                class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-hide-search" name="employee_id"
                            id="employeeIdUpdate" data-width="100%" data-placeholder="-- Choose Employee --">
                            <option value=""></option>
                            @foreach ($optionEmployee as $item)
                                <option value="{{ $item->id }}"
                                    @if (old('employee_id') == $item->id) selected="selected" @endif>
                                    {{ $item->name }} </option>
                            @endforeach
                        </select>
                        <div class="text-danger" style="display: none;" id="error_employee_id">The Employee field is
                            required</div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Product Name<span
                                class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-hide-search" name="product_id" id="productIdUpdate"
                            data-width="100%" data-placeholder="-- Choose Product --">
                            <option value=""></option>
                            @foreach ($optionProduct as $item)
                                <option value="{{ $item->id }}"
                                    @if (old('unit_id') == $item->id) selected="selected" @endif>
                                    {{ $item->name }} </option>
                            @endforeach
                        </select>
                        <div class="text-danger" style="display: none;" id="error_product_id">The Product field is
                            required</div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Unit<span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-hide-search" name="unit_id" id="unitIdUpdate"
                            data-width="100%" data-placeholder="-- Choose Unit --">
                            <option value=""></option>
                            @foreach ($optionUnit as $item)
                                <option value="{{ $item->id }}"
                                    @if (old('unit_id') == $item->id) selected="selected" @endif>
                                    {{ $item->name }} </option>
                            @endforeach
                        </select>
                        <div class="text-danger" style="display: none;" id="error_unit_id">The Unit field is required
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Total<span class="text-danger">*</span></label>
                        {!! Form::number('total', null, ['placeholder' => 'Total', 'class' => 'form-control', 'required', 'id' => 'totalUpdate']) !!}
                        <div class="text-danger" style="display: none;" id="error_total">The Total field is required
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Date<span class="text-danger">*</span></label>
                        {!! Form::date('date', null, ['placeholder' => 'Stock', 'class' => 'form-control', 'required', 'id' => 'dateUpdate']) !!}
                        <div class="text-danger" style="display: none;" id="error_date">The Date field is required</div>
                    </div>
                </form>
            </div>

            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-md btn-primary" id="submit_edit" onclick="StoreUpdate()">
                    <i class="fas fa-edit fa-sm"></i> Update
                </button>
                <button type="button" class="btn btn-md btn-primary" id="loading_edit" style="display:none;">
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
