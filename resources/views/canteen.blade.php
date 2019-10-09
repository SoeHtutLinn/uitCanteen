@extends('layouts.layout')

@section('content')

	<div id="shops-box" class="row">

		@foreach($shop as $count)

			<div class="shop1 col-ls-6">
				<div class="shop-hov">
					<div class="image-shop">
						<img src="uploads/shop/{{ $count->img }}" alt="{{ $count->name }}" class="rounded mx-auto d-block">
					</div>
					<div class="overlay mx-auto d-block rounded">
						<div class="text">
							<h1 class="shop-name">{{ $count->name }}</h1>
							<p>{{ $count->description }}</p>
							<p class="abt"><a href="menu/{{$count->id}}">About</a></p>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	
	</div><!--shops-box-->
@endsection