<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/favicon.png')}}">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="{{asset('assets/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

</head>
<body>

@include('header')
@include('nav')
<div class="cart-section mt-150 mb-150">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="cart-table-wrap">
                    <table class="cart-table">
                        <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th style="width: 10%" class="product-remove"></th>
                                <th style="width: 20%" class="product-image">Product Image</th>
                                <th style="width: 20%" class="product-name">Name</th>
                                <th style="width: 15%" class="product-price">Price</th>
                                <th style="width: 15%" class="product-quantity">Quantity</th>
                                <th style="width: 20%" class="product-total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <td data-th="Remove" class="product-remove"><a href="#" class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></a></td>
                                        <td data-th="Product" class="product-image"><img src="{{ asset('images/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid"></td>
                                        <td data-th="Name" class="product-name">{{ $details['name'] }}</td>
                                        <td data-th="Price" class="product-price">{{ $details['price'] }} MMK</td>
                                        <td data-th="Quantity" class="product-quantity">
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" />
                                        </td>
                                        <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }} MMK</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="total-section">
                    <table class="total-table">
                        <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>{{ $total }} MMK</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>3000 MMK</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>{{ $total + 3000 }} MMK</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-buttons">
                        <a href="{{ url('admin/UI/products') }}" class="btn btn-warning"><img src="{{asset('assets/images/caret-left.svg')}}" alt=""><img src="{{asset('assets/images/caret-left.svg')}}">Continue Shopping</a>
                        <form method="POST" action="{{ route('check') }}">
                            @csrf
                            <button class="btn btn-success mt-3">Checkout</button>
                        </form>
                    </div>
                </div>

                <div class="coupon-section">
                    <h3>Apply Coupon</h3>
                    <div class="coupon-form-wrap">
                        <form action="index.html">
                            <p><input type="text" placeholder="Coupon"></p>
                            <p><input type="submit" value="Apply"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                   window.location.reload();
                }
            });
        });
    
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    
    </script>
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>