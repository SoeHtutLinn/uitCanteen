<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>UIT Canteen</title>

	<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style-profile.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

	
	<script src="{{ asset('js/cookies.js') }}"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	

	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>
	<div id="header">
		<div class="pos-f-t">
			<nav class="navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="toggle-uit">
						<i class="fas fa-bars"></i>
					</span>
				</button>
				<div class="logo">
					<img src="/uploads/uitlogo.png" alt="uitlogo">
				</div>
				<div class="cart">
					<i class="fas fa-shopping-cart fa-2x"></i>
				</div>
			</nav>
			<div class="collapse tog-akc" id="navbarToggleExternalContent">
				<div class="bg-color">
					<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="nav-link" href="/canteen">Home <span class="sr-only">(current)</span></a>
						</li>

						@foreach($shop as $link)
						<li class="nav-item">
							<a class="nav-link" href="/menu/{{ $link->id }}">{{ $link->name }}</a>
						</li>
						@endforeach
						<li class="nav-item">
							<a class="nav-link" href="/cart">Cart</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/profile">Profile</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div><!--header-->

	 @yield('content')

	 </body>
</html>