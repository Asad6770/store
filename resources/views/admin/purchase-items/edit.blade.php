<form class="row justify-content-center g-3 submitData" method="POST"
    action="{{ route('purchase-item.update', $Purchase_item->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="product_id" class="form-label fw-bold">Item Type</label>
        <select class="form-control" name="product_id" id="product_id" data-live-search="true">
            <option>Select</option>
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $type->id == $Purchase_item->product_id ? 'selected' : '' }}>
                    {{ $type->name }}</option>
            @endforeach
        </select>
        <span class="text-danger product_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="purchase_id" class="form-label fw-bold">Purchase</label>
        <select class="form-control" name="purchase_id" id="purchase_id" data-live-search="true">
            <option>Select</option>
            @foreach ($purchases as $purchase)
                <option value="{{ $purchase->id }}"
                    {{ $purchase->id == $Purchase_item->purchase_id ? 'selected' : '' }}>
                    {{ $purchase->name }}</option>
            @endforeach
        </select>
        <span class="text-danger purchase_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="project_id" class="form-label fw-bold">Project Name</label>
        <select class="form-control" name="project_id" id="project_id" data-live-search="true">
            <option>Select</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" {{ $project->id == $Purchase_item->project_id ? 'selected' : '' }}>
                    {{ $project->name }}</option>
            @endforeach
        </select>
        <span class="text-danger project_id_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-6  col-lg-6">
        <label for="serial_number" class="form-label fw-bold">Serial No</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number"
            value="{{ $Purchase_item->serial_number }}">
        <span class="text-danger serial_number_error error"></span>
    </div>
    <div class="col-md-6 col-lg-6">
        <label for="location" class="form-label fw-bold">Location</label>
        <input type="text" class="form-control" id="location" name="location"
            value="{{ $Purchase_item->location }}">
        <span class="text-danger location_error error"></span>
    </div>
    <div class="col-md-12 col-lg-12">
        <label for="remarks" class="form-label fw-bold">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks" value="{{ $Purchase_item->remarks }}">
        <span class="text-danger remarks_error error"></span>
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
