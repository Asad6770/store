<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('purchase.create') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-6  col-lg-6">
        <label for="name" class="form-label fw-bold">Item Name</label>
        <input type="text" class="form-control" id="name" name="name">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="part_number" class="form-label fw-bold">Part Number</label>
        <input type="text" class="form-control" id="part_number" name="part_number">
        <span class="text-danger part_number_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="supplier_id" class="form-label fw-bold">Contractor Name</label>
        <select class="form-control custom-select" name="supplier_id" id="supplier_id" data-live-search="true">
            <option value="" selected >Select Contractor</option>
            @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
        <span class="text-danger supplier_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12">
        <label for="photo" class="form-label fw-bold">Photo</label>
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
