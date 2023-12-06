@extends ('admin.layouts.master')
@section('content')

    <div class="main-content">
        <div class="page-content">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="container-fluid">
                <form method='POST'action="{{ url('products/update/' . $product->id) }}">
                    @csrf
                    <label class="form-label mt-3">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                    <label class="form-label mt-3">Category</label>
                    <select name="category_id" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <label class="form-label mt-3">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="Current Image" class="mt-2" height="50">
                    @endif
                    <label class="form-label mt-3">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $product->price }}">
                    <div class="mt-2">

                        <button class="btn btn-sm btn-success edit-item-btn"type="submit"> Edit</button>

                    </div>
                </form>

                <a href="{{ url('products/index') }}"><button
                    class="btn btn-sm btn-primary ">Cancel</button></a>
            </div>
        </div>
    </div>
@endsection
