<div class="modal fade" id="CreateEmployeeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white font-weight-bold">
                <h5 class="modal-title"><i class="far fa-id-card"></i> Create Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'employee.store', 'method' => 'POST', 'id' => 'CreateEmployeeForm', 'autocomplete' => 'off']) !!}
                <div class="form-group">
                    <label for="kode_pengguna" class="font-weight-bold">
                        Kode Pengguna<span class="text-danger">*</span>
                    </label>
                    {!! Form::text('kode_pengguna', 'Auto Generate', ['placeholder' => 'Auto Generate', 'class' => 'form-control is-valid', 'id' => 'KodePenggunaCreate', 'readonly']) !!}
                </div>
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name<span class="text-danger">*</span></label>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required', 'id' => 'nameCreate']) !!}
                    <div class="text-danger" style="display: none;" id="error_name">The name field is required</div>
                </div>
                <div class="form-group">
                    <label for="divisi_id" class="font-weight-bold">Divisi<span class="text-danger">*</span></label>
                    <select class="form-control js-example-basic-single" name="divisi_id" id="divisiIdCreate"
                        data-width="100%" data-placeholder="-- Choose Unit --">
                        <option value=""></option>
                        @foreach ($divisi as $item)
                            <option value="{{ $item->id }}"
                                @if (old('divisi_id') == $item->id) selected="selected" @endif>
                                {{ $item->name }} </option>
                        @endforeach
                    </select>
                    <div class="text-danger" style="display: none;" id="error_divisi_id">The divisi field is required
                    </div>
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
