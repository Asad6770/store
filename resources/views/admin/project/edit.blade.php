<form class="row justify-content-center g-3 submitData" method="POST"
    action="{{ route('project.update', $Projects->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12  col-lg-12">
        <label for="name" class="form-label fw-bold">Project Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $Projects->name }}">
        <span class="text-danger name_error error text-bold" style="font-size: 13px;"></span>
    </div>

    <div class="col-md-12 col-lg-12 search_select_box form-group">
        <label for="category_id" class="form-label fw-bold">Category Name</label>
        <select class="form-control" name="category_id" id="category_id" data-live-search="true">
            <option>Select</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }} " {{ $category->id == $Projects->category_id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
            @endforeach
        </select>
        <span class="text-danger supplier_id_error error text-bold" style="font-size: 13px;"></span>
    </div>
    <br>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
