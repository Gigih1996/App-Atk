<div class="modal fade" id="updateModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white font-weight-bold">
                <h5 class="modal-title"><i class="fas fa-building"></i> Edit Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="DepartementFormUpdate" autocomplete="off">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold"><span class="text-danger">*</span> Name</label>
                        <input type="text" class="form-control" id="nameUpdate" name="name">
                        <input type="hidden" id="idUpdate" name="id">
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
<script>
    function EditDepartement(id, name) {
        $('#id_departement').val(id);
        $('#NameEditDepartement').val(name);
    };
</script>
