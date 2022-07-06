<div class="modal fade" id="EditEmployeeModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white font-weight-bold">
                <h5 class="modal-title"><i class="far fa-id-card"></i> Employee Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="EmployeeFormUpdate" autocomplete="off">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold"><span class="text-danger">*</span> Name</label>
                        <input type="text" class="form-control" id="NameEditDivisi" name="name">
                        <input type="hidden" id="id_employee" name="id_employee">
                    </div>

                    <div class="form-group">
                        <label for="divisi_id" class="font-weight-bold">Divisi<span class="text-danger">*</span></label>
                        <select class="form-control js-example-basic-single" name="departement_id" id="divisi_id"
                            data-width="100%" data-placeholder="-- Choose Divisi --">
                            <option value=""></option>
                            @foreach ($divisi as $item)
                                <option value="{{ $item->id }}"
                                    @if (old('divisi_id') == $item->id) selected="selected" @endif>
                                    {{ $item->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>

            <div class="modal-footer mt-5">
                <button type="button" class="btn btn-md btn-primary" id="submit_edit_employee"
                    onclick="UpdateEmployee()">
                    <i class="fas fa-edit fa-sm"></i> Update
                </button>
                <button type="button" class="btn btn-md btn-primary" id="loading_edit_employee" style="display:none;">
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
<script>
    function EditEmployee(id, name, divisi_id) {
        $('#id_employee').val(id);
        $('#NameEditDivisi').val(name);
        $('#divisi_id').val(divisi_id).select2();
    };
</script>
