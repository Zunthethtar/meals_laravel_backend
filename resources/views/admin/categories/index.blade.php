@extends('admin.layouts.master')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <a href="{{ url('categories/create') }}">
                                                <button style="background-color: #405189;"class="btn btn-primary">+ Add</button>

                                            </a>
                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control search" placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1 p-3">
                                        <table class="table table-bordered border-primary" id="customerTable">
                                            <thead style="background-color: #405189; color: white;">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="name">Category name</th>
                                                    <th class="sort" >Process</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->id }}</td>
                                                        <td>{{ $category->name }}</td>
                                                        <td>
                                                            <div class=" d-flex  ">
                                                                <a href="{{ url('categories/' . $category->id . '/edit') }}">
                                                                    <button class="btn btn-sm btn-success edit-item-btn">Edit</button>
                                                                    <a href="{{ url('categories/' . $category->id . '/delete') }}">
                                                                        <button class="btn btn-sm btn-danger remove-item-btn ms-1">Delete</button>
                            
                                                            </div>
                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>


                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
            </div>

        </div>
    </div>
@endsection
