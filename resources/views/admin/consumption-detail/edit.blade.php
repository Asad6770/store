<form class="row justify-content-center g-3 submitData" method="POST"
    action="{{ route('consumption-detail.update', $comsumption_detail->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="product_id" class="form-label fw-bold">Item Type</label>
        <select class="form-control custom-select" name="product_id" id="product_id" data-live-search="true">
            <option>Select</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}"
                    {{ $product->id == $comsumption_detail->product_id ? 'selected' : '' }}>
                    {{ $product->name }}</option>
            @endforeach
        </select>
        <span class="text-danger product_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="purchase_id" class="form-label fw-bold">Item Name</label>
        <select class="form-control custom-select" name="purchase_id" id="purchase_id" data-live-search="true">
            <option>Select</option>
            @foreach ($purchases as $purchase)
                <option value="{{ $purchase->id }}"
                    {{ $purchase->id == $comsumption_detail->purchase_id ? 'selected' : '' }}>{{ $purchase->name }}
                </option>
            @endforeach
        </select>
        <span class="text-danger purchase_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="type" class="form-label fw-bold">Issued Type</label>
        <select class="form-control custom-select" name="type" id="type" data-live-search="true">
            <option>Select</option>
            <option value="issued" {{ 'issued' == $comsumption_detail->type ? 'selected' : '' }}>Issued</option>
            <option value="returned" {{ 'returned' == $comsumption_detail->type ? 'selected' : '' }}>Returned
            </option>
        </select>
        <span class="text-danger purchase_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12  col-lg-12">
        <label for="serial_number" class="form-label fw-bold">Serial No</label>
        <input type="text" class="form-control" id="serial_number" name="serial_number"
            value="{{ $comsumption_detail->serial_number }}">
        <span class="text-danger date_error error"></span>
    </div>
    <div class="col-md-12  col-lg-12">
        <label for="date" class="form-label fw-bold">Date</label>
        <input type="date" class="form-control" id="date" name="date"
            value="{{ $comsumption_detail->date }}">
        <span class="text-danger date_error error"></span>
    </div>
    <div class="col-md-12 col-lg-12">
        <label for="remarks" class="form-label fw-bold">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks"
            value="{{ $comsumption_detail->remarks }}">
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
