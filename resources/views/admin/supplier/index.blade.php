@extends('admin.layouts.app')
@section('title')
    Contactor
@endsection
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
                            <hr>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            {{--  <th>ID</th>  --}}
                                            <th>Full Name</th>
                                            <th>Mobile Number</th>
                                            <th>CNIC</th>
                                            <th>E-mail</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Suppliers as $supplier)
                                            <tr>
                                                {{--  <td>{{ $loop->index + 1 }}</td>  --}}
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->number }}</td>
                                                <td>{{ $supplier->cnic }}</td>
                                                <td>{{ $supplier->email }}</td>
                                                <td>{{ $supplier->address }}</td>
                                                <td>
                                                    <a href="{{ route('edit', $supplier->id) }}"
                                                        class="text-white btn-info btn btn-sm modal-load"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="nav-icon fas fa-edit"></i></a>
                                                    <a href="{{ route('delete', $supplier->id) }}"
                                                        class="text-white btn-danger btn btn-sm delete"><i
                                                            class="nav-icon fas fa-trash"></i></a>
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
