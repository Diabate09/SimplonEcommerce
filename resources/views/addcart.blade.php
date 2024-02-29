<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />
<!-- Exemple pour le fichier bootstrap.min.css dans le dossier public -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Exemple pour les autres fichiers CSS -->
<link href="{{ asset('css/tiny-slider.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<title>Panier </title>

	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="{{route('home')}}">Home</a>
						</li>
						<li><a class="nav-link" href="{{route('shopshow')}}">Shop</a></li>
						<li><a class="nav-link" href="{{route('elements.about_show')}}">About us</a></li>
						<li><a class="nav-link" href="{{route('service.show')}}">Services</a></li>
						<li><a class="nav-link" href="{{route('contacts.nosContact')}}">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="{{asset('Images/user.svg')}}"></a></li>
						<li>
                            <a class="nav-link" href="{{ route('elements.cart_show_show') }}">
                                <img src="{{ asset('Images/cart.svg') }}">
                                <span style="display: inline-block; background-color: red; color: white; border-radius: 50%; padding: 3px 5px;">
                                    {{ count($cart) }}
                                </span>
                            </a>
                        </li>
					</ul>
				</div>
			</div>

		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">

						</div>
					</div>
                    @if(session('success'))
							<div class="alert alert-danger">
							{{ session('success') }}
							</div>
					@endif
                    @if(session('error'))
							<div class="alert alert-danger">
							{{ session('error') }}
							</div>
					@endif
				</div>
			</div>
		<!-- End Hero Section -->



		<div class="untree_co-section before-footer-section">
            <div class="container">
				<div class="row mb-5">
					<form class="col-md-12" method="post">
						<div class="site-blocks-table">
							<table class="table">
								<thead>
									<tr>
										<th class="product-thumbnail">Image</th>
										<th class="product-name">Product</th>
										<th class="product-price">Price</th>
										<th class="product-quantity">Quantity</th>
										<th class="product-total">Total</th>
										<th class="product-remove">Remove</th>
									</tr>
								</thead>
                          <!-- ... autres parties de votre tableau ... -->

                          <tbody>

                            @foreach($cart as $productId => $product)
                                <tr id="cart-row-{{ $productId }}">
                                    <td class="product-thumbnail">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
                                    </td>
                                    <td class="product-name">
                                        <h2 class="h5 text-black">{{ $product->name }}</h2>
                                    </td>
                                    <td class="unit-price">{{ $product->price }}</td>
                                    <td>
                                        <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                                            <div class="input-group-prepend">
                                              <button onclick="window.location='{{route('elements.addqtyofcartproductmoin' , ['id'=>$product->id_cart] )}}' " class="btn btn-outline-black decrease" type="button">&minus;</button>
                                            </div>
                                            <input type="number" class="form-control text-center quantity-amount" value="{{ $product->quantity }}" placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1">
                                            <div class="input-group-append">
                                              <button onclick="window.location='{{route('elements.addqtyofcartproduct' , ['id'=>$product->id_cart] )}}' " class="btn btn-outline-black increase" type="button">&plus;</button>
                                            </div>
                                          </div>

                                    </td>
                                    <!-- ... autres colonnes ... -->
                                    <td class="total-price">FCFA{{ $product->quantity * $product->price }}</td>
                                    <td>
                                        <!-- Lien de suppression avec une classe btn et btn-sm pour le style -->
                                        <a href="{{ route('elements.remove_cart', ['id' => $product->id_cart]) }}" class="btn btn-black btn-sm">X</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>


<!-- ... autres parties de votre tableau ... -->



							</table>
						</div>
					</form>
				</div>


              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <a href="{{route('home')}}">
                            <button class="btn btn-outline-black btn-sm btn-block">
                                Continue Shopping
                            </button>
                        </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                            <strong class="text-black" id="cart-total">{{ number_format($totalPrice, 2) }}FCFA</strong>
                        </div>
					  </div>
					  <div class="col-md-12">
						@if(count($cart) > 0)
                        <button onclick="window.location='{{ route('checkout.show') }}'" id="btnValidate" type="submit" class="btn btn-black btn-lg py-3 btn-block">
                            Proceed To Checkout</button>
						@endif
					</div>


                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="{{asset('Images/sofa.png')}}" alt="Image" class="img-fluid">
				</div>


				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="{{route('contacts.nosContact')}}">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
     <!-- Inclure Bootstrap JS (jQuery est requis pour Bootstrap JS) -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>



</body>
</html>
