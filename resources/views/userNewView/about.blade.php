@extends('userNewView/layouts/user')

@section('content')


	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="/Home">Home</a>
						<i>|</i>
					</li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>A</span>bout
				<span>U</span>s</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-6 welcome-left">
					<h3>Welcome</h3>
					<h4 class="my-sm-3 my-2">ANE(al nabil equipments) company is one of the most important company in  importing, selling, and maintaining the equipments of hotels, restaurants, and coffees.</h4>
					<p>we offer a product with greate price and after sales service that make a consumer satisfied.</p>
				</div>
				<div class="col-lg-6 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
						src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3455.9195834263887!2d31.1766729!3d29.981741!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU4JzU0LjMiTiAzMcKwMTAnNDMuOSJF!5e0!3m2!1sen!2seg!4v1592621632780!5m2!1sen!2seg"></iframe>

				</div>
			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- testimonials -->
	<div class="testimonials py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center text-white mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>C</span>ustomers
				<span>S</span>ays</h3>
			<!-- tittle heading -->
			<div class="row gallery-index">
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="{{ asset('newUser/images/user.jpg')}}" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Tyson</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="{{ asset('newUser/images/user.jpg')}}" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Alejandra</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left mt-sm-5 my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="{{ asset('newUser/images/user.jpg')}}" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Charles</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left mt-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="{{ asset('newUser/images/user.jpg')}}" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Jessie</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //testimonials -->

@endsection