@extends('admin.layouts.app')
@section('title')
Purchase
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('purchase.create') }}" type="button" class="btn btn-success modal-load"
                                data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Purchase
                            </button>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Items Name</th>
                                            <th>Part Number</th>
                                            <th>Contractor</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if (count($Purchases) > 0)
                                        <tbody>
                                            @foreach ($Purchases as $Purchase)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $Purchase->name }}</td>
                                                    <td>{{ $Purchase->part_number }}</td>
                                                    <td>{{ $Purchase->supplier->name }}</td>
                                                    <td>
                                                        <img class="rounded-circle"src="{{ url('/storage/files/' . $Purchase->photo) }}"
                                                            width="40" height="40" alt="{{ $Purchase->photo }}">
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('purchase.edit', $Purchase->id) }}"
                                                            class="text-white btn-info btn btn-sm modal-load"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="nav-icon fas fa-edit"></i></a>

                                                        <a href="{{ route('purchase.delete', $Purchase->id) }}"
                                                            class="text-white btn-danger btn btn-sm delete"><i
                                                                class="nav-icon fas fa-trash"></i></a>

                                                        <a href="{{ route('purchase.show', $Purchase->id) }}"
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
                                {{ $Purchases->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
