@extends('admin.layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('create') }}" type="button" class="btn btn-success modal-load"
                                data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Contactor
                            </button>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Full Name</th>
                                            <th>Mobile Number</th>
                                            <th>CNIC</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th scope="col" colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    @if (count($Suppliers) > 0)
                                        <tbody>
                                            @foreach ($Suppliers as $supplier)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $supplier->supplier_name }}</td>
                                                    <td>{{ $supplier->supplier_number }}</td>
                                                    <td>{{ $supplier->supplier_cnic }}</td>
                                                    <td>{{ $supplier->supplier_email }}</td>
                                                    <td>{{ $supplier->supplier_address }}</td>
                                                    <td>
                                                        <a href="{{ route('edit', $supplier->id) }}"
                                                            class="text-white btn-info btn btn-sm modal-load"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="nav-icon fas fa-edit"></i></a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('delete', $supplier->id) }}"
                                                            class="text-white btn-danger btn btn-sm delete"><i
                                                                class="nav-icon fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <tr>
                                            @else
                                                <td class="text-danger text-center fs-5 fw-bold" colspan="8">
                                                    No Record Found
                                                </td>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="pagination fw-bold justify-content-center">
                            {{ $Suppliers->links() }}
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
@endsection
