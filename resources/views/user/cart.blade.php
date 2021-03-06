<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>UIT Canteen</title>

	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style-cart.css">
	<script src="{{ asset('js/cookies.js') }}"></script>
	


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

	<link rel="stylesheet" href="css/responsive.css">

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
	<div id="carthead" class="text-center">
		<h3>Your Cart</h3>
	</div><!--carthead-->
	<div id="shopvoc">
	@if(!empty($order))
		<form action="order" method="post" id="form">
		@csrf
		
		@foreach($order as $shopKey=> $item)
		
			<div id="Menu{{$shopKey}}">
				<div class="shopvoc-header text-center pt-2">
					<h3>{{$item->shop}}</h3>
				</div>
				<div id="Shop{{$shopKey}}">
				@foreach($item->menu as $key=> $data)
				<div class="shopvoc-itemslist" id="shopvoc-item{{$key}}">
					<div class="shopvoc-item d-flex">
						<div class="shopvoc-item-img">
							<img src="uploads/menu/{{$data[0]->img}}" alt="">
						</div>

						<div class="shopvoc-item-info">
							<p>{{$data[0]->name}}</p>
							<input type="hidden" name="item{{$shopKey}}{{$key}}" value="{{$data[0]->id}}">
							<p id ="price" value ='{{$data[0]->price}}'>{{$data[0]->price}}</p><p> MMK</p>
							<div class="d-flex">
								<div>Quantity</div>
								<div>

									<select name="item-qty{{$shopKey}}{{$key}}" id="menuQty" onchange="change('{{$item->shopId}}','{{$key}}','{{$shopKey}}')" onclick="qtyChange('{{$shopKey}}','{{$key}}')">
										<option hidden value="{{$item->quantity[$key]}} ">{{$item->quantity[$key]}}</option>

										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										

									</select>
								</div>
							</div>
						</div>
						<div class="shopvoc-item-delete align-self-center">
							<i class="fas fa-trash-alt fa-lg" onclick="remove('{{$shopKey}}','{{$key}}','{{$data[0]->id}}','{{$item->shopId}}')"></i>
						</div>
					</div>
				</div>
				
				<input type="hidden" name="shop{{$shopKey}}" value="{{$item->shopId}}">
				<!-- <input type="hidden" name="quantity{{$shopKey}}{{$key}}" value="{{$item->quantity[$key]}}"> -->

				@endforeach
				
				</div>
				<div class="item-total d-flex justify-content-around">
					<div class="p-1">
						<h5>Total</h5>
					</div>
					<div class="p-1">

						<h5 id="money"></h5> MMK
					</div>
				</div>
				
				<input type="hidden" name="total{{$shopKey}}" id="total{{$shopKey}}"  value="">
					
		</div>
		
		@endforeach
		
		<div class="item-time d-flex justify-content-around">
			<div class="p-1">
				<h5>Time</h5>
				
			</div>
			<div class="p-1">
				
				<select name="time" id="time" class="form-control">
					$order[0]->time->addHours(1);
					@foreach($order[0]->timeArray as $timeDetail => $time)
							<option value="{{$order[0]->time->addHours(1)}}">{{$time}}</option>
					@endforeach
				</select>
			</div>
		</div>


		<input type="hidden" name="user" value="{{Auth::user()->id}}">
		<input type="hidden" name="shopcount" id="shopcount" value="{{$shopKey}}">
		<div class="checkout d-flex align-items-center">
			<button class="btn btn-checkout" type="submit" onclick="deleteCookies()">Okay<i class="fas fa-caret-right fa-lg"></i></button>
		</div>
		</form>
	@else
	 <h5>There is nothing in your cart</h5>

	@endif

		<script src="{{ asset('js/cart.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</div>
	
</body>
</html>