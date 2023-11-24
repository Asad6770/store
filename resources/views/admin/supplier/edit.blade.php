<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('update', $supplier->id) }}"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-6  col-lg-6">
        <label for="name" class="form-label fw-bold">Full Name</label>
        <input type="text" class="form-control" id="name" name="name"
            value="{{ $supplier->name }}">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="number" class="form-label fw-bold">Phone Number</label>
        <input type="text" class="form-control" id="number" name="number"
            value="{{ $supplier->number }}">
        <span class="text-danger number_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="cnic" class="form-label fw-bold">CNIC</label>
        <input type="text" class="form-control" id="cnic" name="cnic"
            value="{{ $supplier->cnic }}">
        <span class="text-danger cnic_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-6 col-lg-6">
        <label for="supplier_email" class="form-label fw-bold">E-mail</label>
        <input type="text" class="form-control" id="email" name="email"
            value="{{ $supplier->email }}">
        <span class="text-danger email_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-12 col-lg-12">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="address" name="address"
            value="{{ $supplier->address }}">
        <span class="text-danger address_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
