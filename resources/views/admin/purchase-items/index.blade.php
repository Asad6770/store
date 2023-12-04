@extends('admin.layouts.app')
@section('title')
    Purchase Items
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('purchase-item.create') }}" type="button"
                                class="btn btn-success modal-load" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Purchase Items
                            </button>
                            <hr>
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Item Type</th>
                                            <th>Purchase Item</th>
                                            <th>Project Name</th>
                                            <th>Serial No</th>
                                            <th>Location</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                            @foreach ($Purchase_items as $Purchase_item)
                                                <tr>
                                                    <td>{{ $Purchase_item->product_type->name }}</td>
                                                    <td>{{ $Purchase_item->purchase->name }}</td>
                                                    <td>{{ $Purchase_item->project->name }}</td>
                                                    <td>{{ $Purchase_item->serial_number }}</td>
                                                    <td>{{ $Purchase_item->location }}</td>
                                                    <td>{{ $Purchase_item->remarks }}</td>

                                                    <td>
                                                        <a href="{{ route('purchase-item.edit', $Purchase_item->id) }}"
                                                            class="text-white btn-info btn btn-sm modal-load"
                                                            data-toggle="modal" data-target="#exampleModal"><i
                                                                class="nav-icon fas fa-edit"></i></a>

                                                        <a href="{{ route('purchase-item.delete', $Purchase_item->id) }}"
                                                            class="text-white btn-danger btn btn-sm delete"><i
                                                                class="nav-icon fas fa-trash"></i></a>

                                                        <a href="{{ route('purchase-item.show', $Purchase_item->id) }}"
                                                            class="text-white btn-success btn btn-sm"><i
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
