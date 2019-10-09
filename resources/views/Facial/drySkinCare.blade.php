<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Fashion</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">


<!-- gallery -->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/component.css" />

<!-- //gallery -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/view02Style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/main.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/modernizr.custom.js"></script>
<link href="//fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">

<script type="text/javascript" src="{{ URL::asset('js/cookies.js') }}"></script>

<!--Start-slider-script-->


<script src="js/modernizr.js"></script> 
</head>
<!-- Head -->
<body>

<!-- Slider -->
<div class="w3-banner-info-agile">
		<div class="slider w3layouts agileits">
			<ul class="rslides w3layouts agileits" id="slider">
				<li>
						<div class="layer w3layouts agileits-banner drySkin">
							<h3>Dry Skin Care</h3>
							
						</div>
				</li>
			</ul>
		</div>
</div>
<!-- //Slider -->

<!-- banner --><!-- banner -->
<div class="banner" id="home">
        <!-- <div class="container"> -->
            <nav class="navbar navbar-default cl-effect-5"  id="cl-effect-5">
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h1><a class="navbar-brand" href="/home" style="overflow: visible; size: 1em;">Skin Care</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><span data-hover="Home">Home</span></a></li>
          
                        <li><a class="scroll" href="#brands"><span data-hover="Products">Products</span></a></li> 
                        <li><a class="scroll" href="#services"><span data-hover="Services">Services</span></a></li>
                        
                        
                        <li><a class="scroll" href="#contact"><span data-hover="Contact">Contact</span></a></li> 
                         @guest
                            <li>
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li >
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>     
        <!-- </div> -->
</div>
<!-- //banner -->  
@php
	$item1;
	$quantity1 = 0;

	$item2;
	$quantity2 = 0;

	$item3;
	$quantity3 = 0;

	$item4;
	$quantity4 = 0;

	$item5;
	$quantity5 = 0;


	foreach($product as $product)
	{
		if($product->p_cosmetic == 'Makeup Remover')
		{
			$item1[$quantity1] = $product; 
			$quantity1 +=1;
		}
		if($product->p_cosmetic == 'Facial Wash')
		{
			$item2[$quantity2] = $product; 
			$quantity2 +=1;
		}
		if($product->p_cosmetic == 'Toner')
		{
			$item3[$quantity3] = $product; 
			$quantity3 +=1;
		}
		if($product->p_cosmetic == 'Moisturizer')
		{
			$item4[$quantity4] = $product; 
			$quantity4 +=1;
		}
		if($product->p_cosmetic == 'Sunscreen')
		{
			$item5[$quantity5] = $product; 
			$quantity5 +=1;
		}
	}
@endphp


<!--products -->
<div class="agileits-w3layouts-specials" id="brands">
	<h3>Dry Skin Care Products</h3>
	
	<div class="special-grids">
		<div class="col-md-12 special-right extends" style="background-color: white;">
			<div class="sp-wid">
				<h4 style="color: black;">Makeup Remover</h4>
				<p>Should use right before bedtime. Helps to clean environmental dust and dirts. Without makeup remover, white heads, blackheads and blemish may occur.
				</p>

				<!-- items  -->
				<section id="example">
					
					@foreach($item1 as $item)
						<div class="content-grid-agileits">
							<form class="Box_S" action="#" method="post">
								<fieldset>
									<img src="inventory/{{$item->p_img}}" alt="">
									<p><a href="#">{{$item->p_name}}</a></p>
									<ul>
										<li><span>({{$item->p_quantity}})</span></li>
										<li><span>${{$item->p_price}}</span></li>
									</ul>
									<ul>
										<li> </li>
									</ul>
									
									<div class="item-interaction">
										<a href="#0" class="btn-add-to-cart add-to-cart" data-name="{{$item->p_name}}" data-price="{{$item->p_price}}"data-id="{{$item->p_img}}"><img src="images/cart.png" alt="w3layouts" class="cart-agile"></a>
									</div> 
								</fieldset>
							</form>
						</div>
					@endforeach

					<div class="clear"> </div>
				</section>
			</div>
		</div>
	</div>

	<div class="special-grids">
		<div class="col-md-12 special-right extends" style="background-color: white;">
			<div class="sp-wid">
				<h4 style="color: black;">Facial Wash</h4>
				<p>To clean leftover makeup and other dirts, facial wash should use right after makeup remover and in the morning. Can nourish skin and solve skin concerns. Without facial wash, you can’t get purified skin

				</p>

				<!-- items  -->
				<section id="example">
					
					@foreach($item2 as $item)
						<div class="content-grid-agileits">
							<form class="Box_S" action="#" method="post">
								<fieldset>
									<img src="inventory/{{$item->p_img}}" alt="">
									<p><a href="#">{{$item->p_name}}</a></p>
									<ul>
										<li><span>({{$item->p_quantity}})</span></li>
										<li><span>${{$item->p_price}}</span></li>
									</ul>
									<ul>
										<li> </li>
									</ul>
									
									<div class="item-interaction">
										<a href="#0" class="btn-add-to-cart add-to-cart" data-name="{{$item->p_name}}" data-price="{{$item->p_price}}"data-id="{{$item->p_img}}"><img src="images/cart.png" alt="w3layouts" class="cart-agile"></a>
									</div> 
								</fieldset>
							</form>
						</div>
					@endforeach

					<div class="clear"> </div>
				</section>
			</div>
		</div>
	</div>

	<div class="special-grids">
		<div class="col-md-12 special-right extends" style="background-color: white;">
			<div class="sp-wid">
				<h4 style="color: black;">Toner</h4>
				<p>To clean remaining tiny dirt in pores. Can control pores and helps to get clear skin. Without toner, enlarging pores and other skin problems may occur.

				</p>

				<!-- items  -->
				<section id="example">
					
					@foreach($item3 as $item)
						<div class="content-grid-agileits">
							<form class="Box_S" action="#" method="post">
								<fieldset>
									<img src="inventory/{{$item->p_img}}" alt="">
									<p><a href="#">{{$item->p_name}}</a></p>
									<ul>
										<li><span>({{$item->p_quantity}})</span></li>
										<li><span>${{$item->p_price}}</span></li>
									</ul>
									<ul>
										<li> </li>
									</ul>
									
									<div class="item-interaction">
										<a href="#0" class="btn-add-to-cart add-to-cart" data-name="{{$item->p_name}}" data-price="{{$item->p_price}}"data-id="{{$item->p_img}}"><img src="images/cart.png" alt="w3layouts" class="cart-agile"></a>
									</div> 
								</fieldset>
							</form>
						</div>
					@endforeach

					<div class="clear"> </div>
				</section>
			</div>
		</div>
	</div>

	<div class="special-grids">
		<div class="col-md-12 special-right extends" style="background-color: white;">
			<div class="sp-wid">
				<h4 style="color: black;">Moisturizer</h4>
				<p>For healthy and hydrating skin, should use right after Toner. Hydrating skin can prevent environmental skin issues. Without moisturizer, skin will be dull and unhealthy because of environmental  problems

				</p>

				<!-- items  -->
				<section id="example">
					
					@foreach($item4 as $item)
						<div class="content-grid-agileits">
							<form class="Box_S" action="#" method="post">
								<fieldset>
									<img src="inventory/{{$item->p_img}}" alt="">
									<p><a href="#">{{$item->p_name}}</a></p>
									<ul>
										<li><span>({{$item->p_quantity}})</span></li>
										<li><span>${{$item->p_price}}</span></li>
									</ul>
									<ul>
										<li> </li>
									</ul>
									
									<div class="item-interaction">
										<a href="#0" class="btn-add-to-cart add-to-cart" data-name="{{$item->p_name}}" data-price="{{$item->p_price}}"data-id="{{$item->p_img}}"><img src="images/cart.png" alt="w3layouts" class="cart-agile"></a>
									</div> 
								</fieldset>
							</form>
						</div>
					@endforeach

					<div class="clear"> </div>
				</section>
			</div>
		</div>
	</div>

	<div class="special-grids">
		<div class="col-md-12 special-right extends" style="background-color: white;">
			<div class="sp-wid">
				<h4 style="color: black;">Sunscreen</h4>
				<p>Should use right after skincare. Protect UV rays from sun. Without  sunscreen, direct sunlight can cause skin cancers and other problems

				</p>

				<!-- items  -->
				<section id="example">
					
					@foreach($item5 as $item)
						<div class="content-grid-agileits">
							<form class="Box_S" action="#" method="post">
								<fieldset>
									<img src="inventory/{{$item->p_img}}" alt="">
									<p><a href="#">{{$item->p_name}}</a></p>
									<ul>
										<li> <span>{{$item->p_price}}</span></li>
									</ul>
									<ul>
										<li> <span>{{$item->p_quantity}}</span></li>
									</ul>
									<div class="item-interaction">
										<a href="#0" class="btn-add-to-cart add-to-cart" data-name="{{$item->p_name}}" data-price="{{$item->p_price}}"data-id="{{$item->p_img}}"><img src="images/cart.png" alt="w3layouts" class="cart-agile"></a>
									</div> 
								</fieldset>
							</form>
						</div>
					@endforeach

					<div class="clear"> </div>
				</section>
			</div>
		</div>
	</div>



</div>
<!-- eye products -->

<!-- eye services -->
<div class="agileits-w3layouts-specials" id="services">
			<h3 style="padding-top: 20px;">Dry Skin Services</h3>
			<!-- <span></span>
 -->				<div class="special-grids">
					<div class="col-md-6 special-left l-grids">
						 <figure class="effect-bubba">
								<img src="images/spa1.jpg" alt=""/>
								<figcaption>
									<h4>Jassimne for Her</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>													
								</figcaption>			
						 </figure>
					</div>
					<div class="col-md-6 special-right">
						<div class="sp-wid">
							<h4>Jassime For Her</h4>
							<p>Eye creams are formulated specifically for the delicate skin around the eye, so they tend to be thicker. ... Squinting and constant movement of the eyes also hasten the appearance of lines and wrinkles, and fluids collect under the eyes and cause puffiness and dark circles. Eye creams can address some of these issues.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="where-spl">
					<div class="col-md-6 special-right l-left">
						<div class="l-wid">
							<h4>Aria Nail Bar</h4>
							<p>They are ligher than creams, and are designed to target things like fine lines, puffiness, and dark circles. Some are designed also to hydrate or firm the delicate skin around the eyes. ... Our eye serum is jam packed with results driven ingredients.</p>
						</div>
						
					</div>
					<div class="col-md-6 special-left l-right l-grids">
						 <figure class="effect-bubba">
								<img src="images/spa2.jpg" alt=""/>
								<figcaption>
									<h4>Skin Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>																
								</figcaption>			
						 </figure>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="where-spl">
					<div class="col-md-6 special-left l-grids">
						 <figure class="effect-bubba">
								<img src="images/spa3.jpg" alt=""/>
								<figcaption>
									<h4>Neck Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>													
								</figcaption>			
						 </figure>
					</div>
					<div class="col-md-6 special-right">
						<div class="sp-wid">
							<h4>Mr.C Spa</h4>
							<p>Under-eye masks typically look like comma-shaped patches and are infused with lightweight but potent serums packed with innovative ingredients like retinol, hyaluronic acid and ceramides designed to plump your skin and bust dark circles.</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
		<!-- eye services-->
<!-- cart -->
		<div class="cart-container empty" id="cartEmpty">
	<a href="#0" class="cart-trigger">
		Cart
		<ul class="count"> <!-- cart items count -->
			<li>0</li>
			<li>0</li>
		</ul> <!-- .count -->
	</a>

	<div class="cart">
		<div class="wrapper">
			<header>
				<h2>Cart</h2>
				<!-- <span class="undo">Item removed. <a href="#0">Undo</a></span> -->
			</header>
			
			<div class="body">
				<ul>
					<!-- products added to the cart will be inserted here using JavaScript -->
				</ul>
			</div>

			<footer>
				<a href="/sendToAdmin" class="checkout btn"><em>Total - $<span>0</span></em></a>
			</footer>
		</div>
	</div> <!-- .cd-cart -->
</div> <!-- cd-cart-container -->

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="agile-footer-grids">
			<div class="col-md-4 w3-agile-footer-grid">
					<h3>Newsletter</h3>
					<form action="#" method="post">
						<input type="email" id="mc4wp_email" name="EMAIL" placeholder="Enter your email here" required="">
						<input type="submit" value="Subscribe">
					</form>
				</div>
				<div class="col-md-4 w3-agile-footer-grid">
					<h3>Navigation</h3>
					<ul>
						<li><a href="#home" class="scroll">Home</a></li>
						<li><a href="#models" class="scroll">About</a></li>
						<li><a href="#services" class="scroll">Services</a></li>
						<li><a href="#gallery" class="scroll">Gallery</a></li>
						<li><a href="#team" class="scroll">Team</a></li>
						<li><a href="#brands" class="scroll">Brands</a></li>
						<li><a href="#contact" class="scroll">contact Us</a></li>
					</ul>
				</div>
				<div class="col-md-4 w3-agile-footer-grid">
					<h3>Follow Us :</h3>
					<div class="footer-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
				<div class="clearfix"> </div>
				<div class="footer-bottom">
			</div>

</div>
	<!-- //footer -->
	<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<!-- Slider-JavaScript -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider, #slider1").responsiveSlides({
				auto: true,
				nav: true,
				speed: 1500,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>
<!-- //Slider-JavaScript -->
<!-- //Default-JavaScript-File -->
<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: { 
								portrait: { 
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: { 
									changePoint:640,
									visibleItems:2
								},
								tablet: { 
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						
					});
			</script>
			<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});
		});
   
    </script>
    <script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
<!-- start-smoth-scrolling -->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>

