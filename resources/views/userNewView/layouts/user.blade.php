<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta name="keywords" content="kitchen, hotel,cafe,معدات مطاعم,معدات فنادق , معدات كافيهات , استيراد معدات المطاعم ,استيراد , ايطاليا,حرق اسعار,جديد,معدات جديدة,فنادق,كافيهات,بوتجاز,
	افران,كونفيكشن,ثلاجات منزلى,ثلاجات استلس,2باب,1باب,زجاج,فرش سوبرماركت,سوبر ماركت,هايبر ماركت,مجانا,فرش مطاعم,supermarket,hypermarket,بولر,polar,william,ويليم,فوستر,foster,true,ترو امريكى,العالمية,استيراد,زيرو,كسر الزيرو,new,copy,commercial kitchen equipment,kitchen equipment list,kitchen equipment for restaurant,
	
kitchen equipment for sale,types of kitchen equipment,best kitchen tools,بيع,sell,قلايات,جريلات,ايس ميكر,غسالات,غسالات اطباق,غسالات حلل,غسالات اطباق,class washer,dish washer,washer,dryer,electrolux,اليكتروليكس,
ريشو,مالتى ديك,سخن,multi deck,hot line,import,export" />
	<meta name="description" content=" شركة النبيل هيا شركة متخصصة فى استيراد معدات المطاعم و الفنادق و الكافيهات مستعملة و جديدة بافضل الحالات و افضل الاسعار و ضمان للمعدات و كما توفر جميع قطع الغيار بعد فترة الضمان بمقابل مادى بسيط
	ANE is specialized in importing, distributing, and maintaining hotels, restaurants, and cafes equipment.">
	<meta name="google-site-verification" content="GJESow8-VDozZNfIXmozb81quMIxO_XrT0tTbvumwZg" />
	<title>Al Nabil Equipment</title>
	<link href = "{{ asset('user/images/dribbble.png')}}" rel="icon" type="image/gif">
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="{{ asset('newUser/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="{{ asset('newUser/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="{{ asset('newUser/css/fontawesome-all.css')}}">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="{{ asset('newUser/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="{{ asset('newUser/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>
<style>
	h6{
    display: inline;
	color: black;
	}
</style>
<body>
	<!-- top-header -->
	<div class="agile-main-top">
		<div class="container-fluid">
			<div class="row main-top-w3l py-2">
				<div class="col-lg-4 header-most-top">
					<p class="text-white text-lg-left text-center">
						<a href="/" style="color: inherit; ">Al Nabil Equipment</a> 
						<i class="fas fa-shopping-cart ml-1"></i>
					</p>
				</div>
				<div class="col-lg-8 header-right mt-lg-0 mt-2">
					<!-- header lists -->
					<ul>

						<li class="text-center border-right text-white">
							<i class="fas fa-phone mr-2"></i> 01118122288
						</li>
						{{-- <li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
						</li> --}}
						<li class="text-center text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i> Log In </a>
						</li>
					</ul>
					<!-- //header lists -->
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal(select-location) -->

	<!-- //shop locator (popup) -->
	<!-- modals -->
	<!-- log in -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-center">Log In</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('login') }}" method="POST">
						@csrf
						<div class="form-group">
							<label class="col-form-label">email</label>
							
							<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						</div>
						<div class="form-group">
							<label class="col-form-label">Password</label>
							<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="right-w3l">
							<input type="submit" class="form-control" value="Log in">
							
						</div>
						<div class="sub-w3l">
							<div class="custom-control custom-checkbox mr-sm-2">
								<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
								<label class="custom-control-label" for="customControlAutosizing">Remember me?</label>
							</div>
						</div>
						<p class="text-center dont-do mt-3">Don't have an account?
							<a href="#" data-toggle="modal" data-target="#exampleModal2">
								Register Now</a>
						</p>
						@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif 
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- register -->
	{{-- <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div> --}}
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">
					<h1>
						{{-- <img src="{{ asset('newUser/images/logo2.png')}}" width="200px" alt=" " class="img-fluid"> --}}
						{{-- <br> --}}
						{{-- <a href="/Home" class="font-weight-bold font-italic">A<h6>L</h6> N<h6>abil</h6> E<h6>quipment</h6></a> --}}
						<br>
						
					</h1>
				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="/search" method="GET">
								<input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search" required>
								<button class="btn my-2 my-sm-0" type="submit">Search</button>
							</form>
						</div>
						<!-- //search -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->


	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="agileits-navi_search">
					<form action="#" method="post">
						<select id="agileinfo-nav_search" onchange="location = this.value;" name="agileinfo_search" class="border" required="">
							<option value="/Home">All Categories</option>
							@foreach ($categories as $category)
								<option value="/Home/{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
					</form>
				</div>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item  mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						{{-- <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Offers
							</a>
							
							<div class="dropdown-menu">
								@foreach ($offers as $offer)
									@if (count($offer->products)!=0)
										<div class="agile_inner_drop_nav_info p-4">
											<h5 class="mb-3"><a href="/OffersDetails/{{$offer->id}}">{{$offer->title}}</a> </h5>
											
											<div class="row">
												<div class="col-sm-6 multi-gd-img">
													<ul class="multi-column-dropdown">
															@foreach ($offer->products as $product)
																<li>
																	<a href="/Preview/{{$product->id}}">{{$product->name}}</a>
																</li>
															@endforeach
													</ul>
												</div>
												<div class="col-sm-6 multi-gd-img">
													<img  src="{{asset($offer->img)}}" alt="" class="img-fluid">
													
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</div>
						</li> --}}
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/About">About Us</a>
						</li>
						{{-- <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="/AllProduct">All Products</a>
						</li> --}}
						{{-- <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="/admin">Admin Controll Panel</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/admin/bills">Bill</a>
								<a class="dropdown-item" href="/admin/product">Price View</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/admin/offers">Offer</a>
								<a class="dropdown-item" href="/admin/requests">Customer Request</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/admin/category">Category</a>
								<a class="dropdown-item" href="/admin/product">Product</a>
							</div>
						</li> --}}
						<li class="nav-item">
							<a class="nav-link" href="/Contact">Contact Us</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

<!-------------------------------------------body--------------------------------------------------------------------->

	@yield('content')

	<!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Electronics :</h2>
				<p class="footer-main mb-4">
					If you're considering a new fridge, looking for a powerful new hotel equiptment, we make it easy to
					find exactly what you need at a price you can afford. We offer Every Day Low Prices on Fridge, under counter, Cooker, Fridge 2 door
					and more.</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free Delivery</h3>
								<p>on orders over 200.000 LE</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Fast Delivery</h3>
								<p>World Wide</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Big Choice</h3>
								<p>of Products</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Categories</h3>
						<ul>
							@foreach ($categories as $category)
								<li class="mb-3"><a href="/Home/{{$category->id}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
						<ul>
							<li class="mb-3">
								<a href="/About">About Us</a>
							</li>
							<li class="mb-3">
								<a href="/Contact">Contact Us</a>
							</li>
							<li class="mb-3">
								<a href="/Help">Help</a>
							</li>
							<li class="mb-3">
								<a href="/Faqs">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="/Terms">Terms of use</a>
							</li>
							<li>
								<a href="/Privacy">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> MASR LLTIRAN, GIZA, Egypt.</li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i>+2  01118122288 </li>
							<li class="mb-3">
								<i class="fas fa-phone"></i> +2 01147708069 </li>
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:alnabilequipment@gmail.com"> alnabilequipment@gmail.com</a>
							</li>

							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:mohamed.nabil.1998@gmail.com"> mohamed.nabil.1998@gmail.com</a>
							</li>

							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:amrfahmy3210@gmail.com"> amrfahmy3210@gmail.com</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Newsletter</h3>
						<p class="mb-3">Free Delivery on orders over 200.000 LE!</p>
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="https://www.facebook.com/ANE-Al-Nabil-Equipment-101674608158937">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="https://www.instagram.com/aneequipment/">
											<i class="fab fa-instagram"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="#">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a class="icon gp" href="https://www.google.com/search?client=opera&hs=3sr&sxsrf=ALeKk01cWIlt0gWos5Dbwnlryqht8t59zw:1615739352815&q=al+nabil+equipment&spell=1&sa=X&ved=2ahUKEwim6rGRmrDvAhWhqHEKHVc7BisQBSgAegQIARAv&biw=1279&bih=674">
											<i class="fab fa-google-plus-g"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
			{{-- <div class="agile-sometext py-md-5 py-sm-4 py-3">
				<div class="container">
					<!-- brands -->
					@foreach ($categoriesProduct as $categoryI)
						
						
						<div class="sub-some mt-4">
							<h5 class="font-weight-bold mb-2">{{$categoryI->name}}:</h5>
							<ul>
								@foreach ($categoryI->products as $product)
									<li class="m-sm-1">
										<a href="/Preview/{{$product->id}}" class="border-right pr-2">{{$product->name}}</a>
									</li>
								@endforeach
							</ul>
						</div>
					@endforeach
					
					<!-- //brands -->
					<!-- payment -->
					<div class="sub-some child-momu mt-4">
						<h5 class="font-weight-bold mb-3">Payment Method</h5>
						<ul>
							<li>
								<img src="{{ asset('newUser/images/pay2.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay5.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay1.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay4.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay6.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay3.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay7.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay8.png')}}" alt="">
							</li>
							<li>
								<img src="{{ asset('newUser/images/pay9.png')}}" alt="">
							</li>
						</ul>
					</div>
					<!-- //payment -->
				</div>
			</div> --}}
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2020 Electro Store. All rights reserved | Design by
				<a href="https://www.facebook.com/amrfahmy123/"> Fahmy.</a>
			</p>
		</div>
	</div>
	<!-- //copyright -->







	<!-- js-files -->
	<!-- jquery -->
	<script src="{{ asset('newUser/js/jquery-2.2.3.min.js')}}"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="{{ asset('newUser/js/jquery.magnific-popup.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="{{ asset('newUser/js/minicart.js')}}"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = -1,
				i;

			
			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
				
			}

			if (total > 0) {
				console.log(items);
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->

	<!-- //password-script -->
	
	<!-- scroll seller -->
	<script src="{{ asset('newUser/js/scroll.js')}}"></script>
	<!-- //scroll seller -->

	<!-- smoothscroll -->
	<script src="{{ asset('newUser/js/SmoothScroll.min.js')}}"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="{{ asset('newUser/js/move-top.js')}}"></script>
	<script src="{{ asset('newUser/js/easing.js')}}"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{ asset('newUser/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

		<!-- imagezoom -->
		<script src="{{asset('newUser/js/imagezoom.js')}}"></script>
		<!-- //imagezoom -->
	
		<!-- flexslider -->
		<link rel="stylesheet" href="{{asset('newUser/css/flexslider.css')}}" type="text/css" media="screen" />
	
		<script src="{{asset('newUser/js/jquery.flexslider.js')}}"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->











</body>
</html>