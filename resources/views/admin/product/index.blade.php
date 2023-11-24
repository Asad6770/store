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
                            <button href="{{ route('product.create') }}" type="button"
                                class="btn btn-success modal-load" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Purchase
                            </button>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Items Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                     @if (count($types) > 0)
                                        <tbody>
                                            @foreach ($types as $type)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $type->name }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ route('product.edit', $type->id) }}"
                                                            class="text-white btn-info btn btn-sm modal-load"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="nav-icon fas fa-edit"></i></a>

                                                        <a href="{{ route('product.delete', $type->id) }}"
                                                            class="text-white btn-danger btn btn-sm delete"><i
                                                                class="nav-icon fas fa-trash"></i></a>

                                                        <a href="#"
                                                            class="text-white btn-success btn btn-sm"><i
                                                                class="nav-icon fas fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                            @else
                                                <td class="text-danger text-center fs-5 fw-bold" colspan="8">
                                                    No Record Found
                                                </td>
                                            </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination fw-bold justify-content-center">
                                {{ $types->links() }}
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
