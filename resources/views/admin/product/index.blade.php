@extends('admin.layouts.app')
@section('title')
    Product Type
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('product.create') }}" type="button" class="btn btn-success modal-load"
                                data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Item Type
                            </button>
                            <hr>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Items Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($types as $type)
                                            <tr>
                                                <td>{{ $type->name }}</td>
                                                <td>
                                                    <a href="{{ route('product.edit', $type->id) }}"
                                                        class="text-white btn-info btn btn-sm modal-load"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="nav-icon fas fa-edit"></i></a>

                                                    <a href="{{ route('product.delete', $type->id) }}"
                                                        class="text-white btn-danger btn btn-sm delete"><i
                                                            class="nav-icon fas fa-trash"></i></a>

                                                    <a href="#" class="text-white btn-success btn btn-sm"><i
                                                            class="nav-icon fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
