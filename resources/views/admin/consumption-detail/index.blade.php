@extends('admin.layouts.app')
@section('title')
    Consumption Detail
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('consumption-detail.create') }}" type="button"
                                class="btn btn-success modal-load" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Consumption Detail
                            </button>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Items Type</th>
                                            <th>Item Name</th>
                                            <th>Issued Type</th>
                                            <th>Serial No</th>
                                            <th>Date</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if (count($comsumption_details) > 0)
                                        <tbody>
                                            @foreach ($comsumption_details as $comsumption_detail)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td>{{ $comsumption_detail->product_type->name}}</td>
                                                    <td>{{ $comsumption_detail->purchase->name }}</td>
                                                    <td>{{ $comsumption_detail->type }}</td>
                                                    <td>{{ $comsumption_detail->serial_number }}</td>
                                                    <td>{{ $comsumption_detail->date }}</td>
                                                    <td>{{ $comsumption_detail->remarks }}</td>
                                                

                                                    <td>
                                                        <a href="{{ route('consumption-detail.edit', $comsumption_detail->id) }}"
                                                            class="text-white btn-info btn btn-sm modal-load"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="nav-icon fas fa-edit"></i></a>

                                                        <a href="{{ route('consumption-detail.delete', $comsumption_detail->id) }}"
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
                                {{ $comsumption_details->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
