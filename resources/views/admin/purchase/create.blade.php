<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('purchase.create') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-6  col-lg-6">
        <label for="product_name" class="form-label fw-bold">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" Placeholder="Asad Mahmood">
        <span class="text-danger product_name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="product_part_number" class="form-label fw-bold">Part Number</label>
        <input type="text" class="form-control" id="product_part_number" name="product_part_number"
            placeholder="0300-0000100">
        <span class="text-danger product_part_number_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6 search_select_box form-group">
        <label for="supplier_id" class="form-label fw-bold">Supplier Name</label>
        <select class="form-control" name="supplier_id" id="supplier_id" data-live-search="true">
            <option>Select</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
            @endforeach
        </select>
        <span class="text-danger supplier_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="supplier_email" class="form-label fw-bold">Photo</label>
        <input name="photo" type="file" class="form-control-file form-control-sm" id="photo">
        <span class="text-danger photo_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<script>
    $(document).ready(function() {
        // To style all selects
        $('.search_select_box select').selectpicker();
    });
</script>
