<form class="row justify-content-center g-3 submitData" method="POST" action="{{ route('project.create') }}"
    enctype="multipart/form-data">
    @csrf
    <div class="col-md-12  col-lg-12">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" class="form-control" id="name" name="name">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="category_id" class="form-label fw-bold">Category Name</label>
        <select class="form-control" name="category_id" id="category_id" data-live-search="true">
            <option>Select</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <span class="text-danger category_id_error error text-bold" style="font-size: 13px;"></span>
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
