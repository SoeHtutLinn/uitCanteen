<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Fashion Gaze</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Fashion Gaze a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- gallery -->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/component.css" />

<!-- //gallery -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/modernizr.custom.js"></script>
<link href="css/view01Style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Covered+By+Your+Grace" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">
</head>
<!-- Head -->
<body>
<!-- Slider -->
<div class="w3-banner-info-agile">
		<div class="slider w3layouts agileits">
			<ul class="rslides w3layouts agileits" id="slider">
				<li>
						<div class="layer w3layouts agileits-banner">
							<h3>Skin Care</h3>
							<p>Phasellus fringilla faucibus ipsum, id pharetra massa consequat ac. Nullam at tempus urna.</p>
						</div>
				</li>
			</ul>
		</div>
</div>
<!-- //Slider -->
<!-- banner -->
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
                    <h1><a class="navbar-brand" href="/home">Skin Care</a></h1>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/home"><span data-hover="Home">Home</span></a></li>
                        <li><a class="active scroll" href="#models"><span data-hover="Skin Care">Skin Care</span></a></li> 
                        <li><a class="scroll" href="#services"><span data-hover="Services">Services</span></a></li>
                        <li><a class="scroll" href="#brands"><span data-hover="Products">Products</span></a></li>  
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

	<!-- skin care -->
		<div class="agileits-w3layouts-specials" id="models">
			<h3>Skin CARE</h3>
			<span></span>
				<div class="special-grids">
					<div class="col-md-6 special-left l-grids">
						<a href="/drySkinCare">
							<figure class="effect-bubba">
								<img src="images/dryskincareWallpaper1.jpg" alt=""/>
								<figcaption>
									<h4>Dry Skin Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>													
								</figcaption>			
						 </figure>
						</a>
					</div>
					<div class="col-md-6 special-right">
						<div class="sp-wid">
							<h4>Dry Skin Care</h4>
							<ul>
								<li><p>A lack of moisture in its corneous layer, resulting in tightness and even flaking</p>
								</li>
								<li><p>Appears dull, especially on the cheeks and around the eyes</p>
								</li>
								<li><p>Shows signs of cracking and fissuring</p>
								</li>
								<li><p>A natural consequence of the ageing process, as sebum production slows down.</p>
								</li>
							</ul>
							
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="where-spl">
					<div class="col-md-6 special-right l-left">
						<div class="l-wid">
							<h4>Normal Skin Care</h4>
							<ul>
								<li><p>Displays a smooth texture and a rosy, clear surface, with fine pores</p>
								</li>
								<li><p>No visible blemishes, greasy patches or flaky areas</p>
								</li>
								<li><p>Well-balanced of Sebum production, moisture content, keratinisation and desquamation</p>
								</li>
								<li><p>Often found in young persons</p>
								</li>
							</ul>
						</div>
						
					</div>
					<div class="col-md-6 special-left l-right l-grids">
						<a href="/normalSkinCare">
						 <figure class="effect-bubba">
								<img src="images/normalSkinCare.jpg" alt=""/>
								<figcaption>
									<h4>Normal Skin Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>																
								</figcaption>			
						 </figure>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="where-spl">
					<div class="col-md-6 special-left l-grids">
						<a href="combinationSkinCare">
						 <figure class="effect-bubba">
								<img src="images/combinationSkinCare.jpg" alt=""/>
								<figcaption>
									<h4>Combination Skin Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>													
								</figcaption>			
						 </figure>
						 </a>
					</div>
					<div class="col-md-6 special-right">
						<div class="sp-wid">
							<h4>Combination Skin Care</h4>
							<ul>
								<li><p>Rather dry in some parts of the body and oily in other localisations.</p>
								</li>
								<li><p>Tends toward dryness on the cheeks and around the eyes while being oily in the t-zone (nose, forehead, chin)</p>
								</li>
								<li><p>Dry parts and the oily parts require different skin care regimens</p>
								</li>
								<li><p>Very common skin type</p>
								</li>
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>

				<div class="where-spl">
					<div class="col-md-6 special-right l-left">
						<div class="l-wid">
							<h4>Oily Skin Care</h4>
							<ul>
								<li><p>Characterised by an increased amount of lipids on the skin surface due to overactive sebaceous glands.</p>
								</li>
								<li><p>Is shiny and thick, often with enlarged pores.</p>
								</li>
								<li><p>Is prone to blackheads and other blemishes.</p>
								</li>
								<li><p>Occurs more often in men than in women</p>
								</li>
							</ul>
						</div>
						
					</div>
					<div class="col-md-6 special-left l-right l-grids">
						<a href="/oilySkinCare">
						 <figure class="effect-bubba">
								<img src="images/oilySkinCareWallpaper.jpg" alt=""/>
								<figcaption>
									<h4>Oily Skin Care</h4>
									<p>In sit amet sapien eros quibusdam et aut officiis debitis aut rerum Integer in tincidunt labore et dolore magna aliqua</p>																
								</figcaption>			
						 </figure>
						</a>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
		<!-- skin care-->

<!--services-->
	<div id="services" class="services">
		<!-- container -->
		<div class="container">
			<h3 class="title wow zoomInLeft animated" data-wow-delay=".5s">Skin Care Services</h3>
			<div class="services-row">
				<div class="col-md-3 services-grid services-grid1" style="width: 25%;">
					<span class="glyphicon glyphicon-check effect-1" aria-hidden="true"></span>
					<div class="services-text">
						<h4>Dry Skin</h4>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Donec vel felis vehicula erat</p> -->
					</div>
				</div>
				<div class="col-md-3 services-grid services-grid1" style="width: 25%;">
					<span class="glyphicon glyphicon-user effect-1" aria-hidden="true"></span>
					<div class="services-text">
						<h4>Normal Skin</h4>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Donec vel felis vehicula erat</p> -->
					</div>
				</div>
				<div class="col-md-3 services-grid services-grid2" style="width: 25%;">
					<span class="glyphicon glyphicon-heart-empty effect-1" aria-hidden="true"></span>
					<div class="services-text">
						<h4>Combination Skin</h4>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Donec vel felis vehicula erat</p> -->
					</div>
				</div>
				<div class="col-md-3 services-grid services-grid2" style="width: 25%;">
					<span class="glyphicon glyphicon-heart-empty effect-1" aria-hidden="true"></span>
					<div class="services-text">
						<h4>Oily Skin</h4>
						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit Donec vel felis vehicula erat</p> -->
					</div>
				</div>
				
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<!--//container-->
	</div>
	<!--//services-->

	<!-- top-brands -->
	<div class="top-brands" id="brands">
		<div class="container">
			<div class="top-brands-agile-head">
			<h3>Skin Care Products</h3>
			</div>
			@php
			$random=$product->random(10);
			@endphp
			<div class="sliderfig brands-agile-grids">
				<ul id="flexiselDemo1">
					@foreach($random as $product)
						<li>
							<img src="inventory/{{$product->p_img}}" alt=" " class="img-responsive" />
						</li>
					@endforeach
				</ul>
			</div>
			
		</div>
	</div>
	<!-- //top-brands --> 

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
				<p>© 2017 Fashion Gaze . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts.</a></p>
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

