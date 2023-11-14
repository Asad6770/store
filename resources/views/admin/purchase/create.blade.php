<form class="row justify-content-center g-3 submitData" method="POST" action="{{ url('admin/purchase/create') }}" enctype="multipart/form-data">

    <div class="col-md-4  col-lg-4">
        <label for="supplier_name" class="form-label fw-bold">Full Name</label>
        <input type="text" class="form-control" id="supplier_name" name="supplier_name">
        <span class="text-danger supplier_name_error error"></span>
    </div>
    <div class="col-md-4 col-lg-4">
        <label for="supplier_number" class="form-label fw-bold">Phone Number</label>
        <input type="text" class="form-control" id="supplier_number" name="supplier_number">
        <span class="text-danger supplier_number_error error"></span>
    </div>
    <div class="col-md-4 col-lg-4">
        <label for="supplier_cnic" class="form-label fw-bold">CNIC</label>
        <input type="text" class="form-control" id="supplier_cnic" name="supplier_cnic">
        <span class="text-danger supplier_cnic_error error"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="supplier_address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="supplier_address" name="supplier_address">
        <span class="text-danger supplier_address_error error"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="supplier_email" class="form-label fw-bold">E-mail</label>
        <input type="text" class="form-control" id="supplier_email" name="supplier_email">
        <span class="text-danger supplier_email_error error"></span>
    </div>
    <br>
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

</form>
