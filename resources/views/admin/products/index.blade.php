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
                            </div>
                            <!-- end card header -->

                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <a href="{{ url('products/create') }}">
                                                    <button class="btn btn-success me-md-2 mb-2 ">+ Add</button>
                                                </a>
                                            </div>
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

                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                                        </div>
                                                    </th>
                                                    <th class="sort" data-sort="name">Product name</th>
                                                    <th class="sort" data-sort="name">Category name</th>
                                                    <th class="sort" data-sort="name">Description</th>
                                                    <th class="sort" data-sort="name">Image</th>
                                                    <th class="sort" data-sort="name">Price</th>
                                                    <th class="sort">Process</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->category ? $product->category->name : "null" }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>
                                                            @if ($product->image)
                                                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" height="90">
                                                            @else
                                                                No Image
                                                            @endif
                                                        </td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            <div class=" d-flex  ">
                                                                <a href="{{ url('products/' . $product->id . '/edit') }}">
                                                                    <button class="btn btn-sm btn-success edit-item-btn">Edit</button>
                                                                </a>
                                                                <a href="{{ url('products/' . $product->id . '/delete') }}">
                                                                    <button class="btn btn-sm btn-danger remove-item-btn ms-1">Delete</button>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
            </div>
        </div>
    </div>
@endsection

