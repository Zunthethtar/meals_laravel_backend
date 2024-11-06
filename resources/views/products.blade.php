@extends('master')

@section('content')

<style>
    .product-container {
        margin-top: 20px; /* Adjust the top margin as needed */
    }

    .product-image {
        max-width: 200px;
        max-height: 400px; /* Adjust the maximum height as needed */
        display: block;
        margin: 0 auto; /* Center the image horizontally */
    }
</style>

<div class="container product-container">

    <div class="row">

        @foreach($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card">
                    @if ($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top product-image">
                    @else
                        <img src="{{ asset('images/no-image.jpg') }}" alt="No Image" class="card-img-top product-image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>

                        <p class="mb-2"><strong>Category: </strong>{{ $product->category ? $product->category->name : "null" }}</p>
                        <p class="mb-2"><strong>Price: </strong>{{ $product->price }} MMK</p>

                        <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="cart-btn mt-3 " role="button"><img src="{{asset('assets/images/cart2.svg')}}"> Add to cart</a></p>
                    </div>
                </div>

            </div>

        @endforeach

    </div>
    <div class="mt-3">
        @include('custom-pagination', ['paginator' => $products])
    </div>
</div>

@endsection
