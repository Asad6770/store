<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('update', $supplier->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-6  col-lg-6">
        <label for="supplier_name" class="form-label fw-bold">Full Name</label>
        <input type="text" class="form-control" id="supplier_name" name="supplier_name"
            value="{{ $supplier->supplier_name }}">
        <span class="text-danger supplier_name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="supplier_number" class="form-label fw-bold">Phone Number</label>
        <input type="text" class="form-control" id="supplier_number" name="supplier_number"
            value="{{ $supplier->supplier_number }}">
        <span class="text-danger supplier_number_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="supplier_cnic" class="form-label fw-bold">CNIC</label>
        <input type="text" class="form-control" id="supplier_cnic" name="supplier_cnic"
            value="{{ $supplier->supplier_cnic }}">
        <span class="text-danger supplier_cnic_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-6 col-lg-6">
        <label for="supplier_email" class="form-label fw-bold">E-mail</label>
        <input type="text" class="form-control" id="supplier_email" name="supplier_email"
            value="{{ $supplier->supplier_email }}">
        <span class="text-danger supplier_email_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-12 col-lg-12">
        <label for="supplier_address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="supplier_address" name="supplier_address"
            value="{{ $supplier->supplier_address }}">
        <span class="text-danger supplier_address_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
