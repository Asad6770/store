<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('product-consumption.create') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="user_id" class="form-label fw-bold">User Name</label>
        <select class="form-control custom-select" name="user_id" id="user_id" data-live-search="true">
            <option>Select</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
        <span class="text-danger user_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12  col-lg-12">
        <label for="date" class="form-label fw-bold">Date</label>
        <input type="date" class="form-control" id="date" name="date">
        <span class="text-danger date_error error"></span>
    </div>
    <div class="col-md-12 col-lg-12">
        <label for="remarks" class="form-label fw-bold">Remarks</label>
        <input type="text" class="form-control" id="remarks" name="remarks">
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
