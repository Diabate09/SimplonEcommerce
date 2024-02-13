<!DOCTYPE html>
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
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
                <link href="{{ asset('css/style.css') }}" rel="stylesheet">

              <title>Details</title>
              <!-- Bootstrap CSS -->
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
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0 d-flex">
                        <!-- Les éléments de la première liste -->
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li><a class="nav-link" href="{{ route('shopshow') }}">Shop</a></li>
                        <li><a class="nav-link" href="{{ route('elements.about_show') }}">Info</a></li>
                        <li><a class="nav-link" href="{{ route('service.show') }}">Fonction</a></li>
                        <li class="nav-item">
                            <form class="d-flex" action="{{ route('search') }}" method="GET" style="width: 250px">
                                <input class="form-control me-2" type="search" name="query" placeholder="Rechercher..." aria-label="Search">
                                <button class="btn btn-outline-light" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </li>
                        <li><a class="nav-link" href="{{ route('contacts.nosContact') }}">Contact</a></li>

                        <!-- Les éléments de la deuxième liste -->
                        <li><a class="nav-link" href="#"><img src="{{ asset('Images/user.svg') }}"></a></li>
                        <li>
                            <a class="nav-link" href="{{ route('elements.cart_show_show') }}">
                                <img src="{{ asset('Images/cart.svg') }}">
                                <span style="display: inline-block; background-color: red; color: white; border-radius: 50%; padding: 3px 5px;">
                                    {{ count(session('cart', [])) }}
                                </span>
                            </a>
                        </li>
                    </ul>
				</div>
			</div>

		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="grid grid-cols-4 grid-gap-4">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>

					</div>
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
                     <div class="container">
                            <div class="row">
                                    <div class="col-4 mb-3">
                                        <a class="product-item" href="{{route('home')}}">
                                            <img src="{{ $product->image }}" class="img-fluid product-thumbnail" style="width: 200px">
                                            <h3 class="product-title">{{ $product->name }}</h3>
                                            <p class="product-description">{{ $product->description }}</p>
                                            <strong class="product-price">{{ $product->price }}FCFA</strong>
                                            <a href="{{ route('elements.cart_show', ['id' => $product->id]) }}" class="product-item">
                                                <button class="btn btn-primary">
                                                    Ajouter Au Panier
                                                    <i class="fas fa-shopping-cart"></i> <!-- Utilisez la classe d'icône de panier de Font Awesome -->
                                                </button>
                                            </a>
                                        </a>
										@if(session('error'))
											<div class="alert alert-danger">
												{{ session('error') }}
											</div>
										@endif

										</div>


																	</div>
</div>
 </div>
</div>



		<!-- Start Blog Section -->
		<div class="blog-section">
			<div class="container">
				<div class="row mb-5">
					<div class="col-md-6">
						<h2 class="section-title">Recent Blog</h2>
					</div>

				</div>

				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="{{asset('Images/post-1.jpg')}}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">First Time Home Owner Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 19, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="{{asset('Images/post-2.jpg')}}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">How To Keep Your Furniture Clean</a></h3>
								<div class="meta">
									<span>by <a href="#">Robert Fox</a></span> <span>on <a href="#">Dec 15, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
						<div class="post-entry">
							<a href="#" class="post-thumbnail"><img src="{{asset('Images/post-3.jpg')}}" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Small Space Furniture Apartment Ideas</a></h3>
								<div class="meta">
									<span>by <a href="#">Kristin Watson</a></span> <span>on <a href="#">Dec 12, 2021</a></span>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Blog Section -->
</body>
</html>
