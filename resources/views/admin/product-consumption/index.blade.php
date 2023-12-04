@extends('admin.layouts.app')
@section('title')
    Purchase Consumption
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('product-consumption.create') }}" type="button"
                                class="btn btn-success modal-load" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Consumption Items
                            </button>
                            <hr>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Date</th>
                                            <th>Remarks</th>
                                            <th>Create By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Product_consumptions as $Product_consumption)
                                            <tr>
                                                <td>{{ $Product_consumption->user->name }}</td>
                                                <td>{{ $Product_consumption->date }}</td>
                                                <td>{{ $Product_consumption->remarks }}</td>
                                                <td>{{ $Product_consumption->created_by->name }}</td>
                                                <td>
                                                    <a href="{{ route('product-consumption.edit', $Product_consumption->id) }}"
                                                        class="text-white btn-info btn btn-sm modal-load"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="nav-icon fas fa-edit"></i></a>

                                                    <a href="{{ route('product-consumption.delete', $Product_consumption->id) }}"
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
