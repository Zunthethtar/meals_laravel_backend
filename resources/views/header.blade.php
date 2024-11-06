	<!DOCTYPE html>
	<html lang="en">
		<head>

			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		
			<!-- CSRF Token -->
			<meta name="csrf-token" content="{{ csrf_token() }}">
		
			<title>{{ config('app.name', 'Laravel') }}</title>
		
			<!-- Fonts -->
			<link rel="dns-prefetch" href="//fonts.bunny.net">
			<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
		
			<!-- Scripts -->
			@vite(['resources/sass/app.scss', 'resources/js/app.js'])
		
			<title>Laravel Add To Cart Function - ItSolutionStuff.com</title>
		
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		
		  
		
			<link href="{{ asset('css/style.css') }}" rel="stylesheet">
		
		</head>
	<body>
		

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.html">
								<img src="{{asset('assets/images/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li class="current-list-item"><a href="#">Home</a>
									<ul class="sub-menu">
										<li><a href="index.html">Static Home</a></li>
										<li><a href="index_2.html">Slider Home</a></li>
									</ul>
								</li>
								<li><a href="{{ route('about') }}">About</a></li>
								<li><a href="#">Pages</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="{{ route('about') }}">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul>
								</li>
								<li><a href="news.html">News</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="shop.html">Shop</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<!-- ... (previous code) ... -->

										<div class="dropdown">
											<a type="button" class="shopping-cart" data-toggle="dropdown">
												<img src="{{asset('assets/images/cart2.svg')}}" alt="">
												<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
											</a>

											<div class="dropdown-menu cart-dropdown">
												<div class="total-header-section">
													<div class="cart-icon">
														<img src="{{asset('assets/images/cart2.svg')}}" alt="">
														<span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
													</div>
													@php $total = 0 @endphp

													@foreach((array) session('cart') as $id => $details)
							
														@php $total += $details['price'] * $details['quantity'] @endphp
							
													@endforeach
													<div class="total-section text-right">
														<p>Total: <span class="text-info"> {{ $total }} MMK</span></p>
													</div>
												</div>

												@if(session('cart'))
													@foreach(session('cart') as $id => $details)
														<div class="row cart-detail">
															<div class="col-4 cart-detail-img">
																<img src="{{ asset('images/' . $details['image']) }}" alt="{{ $details['name'] }}" class="img-fluid">
															</div>
															<div class="col-8 cart-detail-product">
																<p>{{ $details['name'] }}</p>
																<span class="price text-info"> {{ $details['price'] }} MMK</span>
																<span class="count"> Quantity:{{ $details['quantity'] }}</span>
															</div>
														</div>
													@endforeach
												@endif

												<div class="row">
													<div class="col-12 text-center checkout">
														<a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
													</div>
												</div>
											</div>
											<a class="mobile-hide search-bar-icon" href="#"><img src="{{asset('assets/images/search.svg')}}" alt=""></a>
										</div>

<!-- ... (remaining code) ... -->

										
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
    	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		
	
	</body>
	</html>