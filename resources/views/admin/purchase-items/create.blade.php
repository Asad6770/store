<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('purchase-item.create') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="product_id" class="form-label fw-bold">Item Type</label>
        <select class="form-control" name="product_id" id="product_id" data-live-search="true">
            <option value="" selected >Select Item Type</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
        <span class="text-danger product_id_error error" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="purchase_id" class="form-label fw-bold">Purchase Item</label>
        <select class="form-control" name="purchase_id" id="purchase_id" data-live-search="true">
            <option value="" selected >Select Purchase Item</option>
            @foreach ($purchases as $purchase)
                <option value="{{ $purchase->id }}">{{ $purchase->name }}</option>
            @endforeach
        </select>
        <span class="text-danger purchase_id_error error" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="project_id" class="form-label fw-bold">Project Name</label>
        <select class="form-control" name="project_id" id="project_id" data-live-search="true">
            <option value="" selected >Select Project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
        <span class="text-danger project_id_error error" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-6  col-lg-6">
        <label for="serial_number" class="form-label fw-bold">Serial No</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number">
        <span class="text-danger serial_number_error error" style="font-size: 13px;" ></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="location" class="form-label fw-bold">Location</label>
        <input type="text" class="form-control" id="location" name="location">
        <span class="text-danger location_error error" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12">
        <label for="remarks" class="form-label fw-bold">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks">
        <span class="text-danger remarks_error error" style="font-size: 13px;"></span>
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
