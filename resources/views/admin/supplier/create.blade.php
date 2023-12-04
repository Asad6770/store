<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
@csrf
    <div class="col-md-6  col-lg-6">
        <label for="name" class="form-label fw-bold" >Full Name</label>
        <input type="text" class="form-control" id="name" name="name">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="number" class="form-label fw-bold" >Phone Number</label>
        <input type="text" class="form-control" id="umber" name="number">
        <span class="text-danger number_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="cnic" class="form-label fw-bold" >CNIC</label>
        <input type="text" class="form-control" id="cnic" name="cnic">
        <span class="text-danger cnic_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-6 col-lg-6">
        <label for="email" class="form-label fw-bold" >E-mail</label>
        <input type="text" class="form-control" id="email" name="email">
        <span class="text-danger mail_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-12 col-lg-12">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="address" name="address">
        <span class="text-danger address_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>

</form>
