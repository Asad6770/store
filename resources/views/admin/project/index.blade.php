@extends('admin.layouts.app')
@section('title')
    Project
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button href="{{ route('project.create') }}" type="button" class="btn btn-success modal-load"
                                data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                                Add Project
                            </button>
                            <hr>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Project Name</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Projects as $Project)
                                            <tr>
                                                <td>{{ $Project->name }}</td>
                                                <td>{{ $Project->project_category->name }}</td>
                                                <td>
                                                    <a href="{{ route('project.edit', $Project->id) }}"
                                                        class="text-white btn-info btn btn-sm modal-load"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                            class="nav-icon fas fa-edit"></i></a>

                                                    <a href="{{ route('project.delete', $Project->id) }}"
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
