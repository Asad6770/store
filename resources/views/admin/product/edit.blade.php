<form class="row justify-content-center g-3 submitData" method="POST"
    action="{{ route('product.update', $type->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12  col-lg-12">
        <label for="name" class="form-label fw-bold">Item Type</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
