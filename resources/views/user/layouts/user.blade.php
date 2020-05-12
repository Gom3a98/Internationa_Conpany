<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>International Company</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="{{ asset('user/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
	<link href="{{ asset('user/css/slider.css')}}" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="{{ asset('user/js/jquery-1.7.2.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('user/js/move-top.js')}}"></script>
	<script type="text/javascript" src="{{ asset('user/js/easing.js')}}"></script>
	<script type="text/javascript" src="{{ asset('user/js/startstop-slider.js')}}"></script>

</head>

<body style="color: black;">




	<div class="wrap">
		<div class="header">
			<div class="headertop_desc">
				<div class="call">
					<p><span>Need help?</span> call us <span class="number">01121833830</span></span></p>
				</div>
				<div class="account_desc">
					
				</div>
				<div class="clear"></div>
			</div>
			<div class="header_top">
				<div class="logo">
					<a href="/home"><img style="width: 200px" src="{{ asset('user/images/main.jpg')}}" alt="" /></a>
				</div>
				<div class="cart">
					<p>Welcome to International Company!</p>
				</div>

				<div class="clear"></div>
			</div>
			<div class="header_bottom">
				<div class="menu">
					<ul>
						@yield('Header')
						
						<div class="clear"></div>
					</ul>
				</div>
				<div class="search_box">
					<form>
						<input type="text" value="Search" onfocus="this.value = '';"
							onblur="if (this.value == '') {this.value = 'Search';}"><input type="submit" value="">
					</form>
				</div>
				<div class="clear"></div>
			</div>


			@yield('content')

			<div class="footer">
				<div class="wrap">
					<div class="section group">
						<div class="col_1_of_4 span_1_of_4">
							<h4>Information</h4>
							<ul>
								<li><a href="/contact">About Us</a></li>
								<li><a href="/contact">Customer Service</a></li>
								<li><a href="#">Advanced Search</a></li>
								<li><a href="/contact">Orders and Returns</a></li>
								<li><a href="/contact">Contact Us</a></li>
							</ul>
						</div>
						<div class="col_1_of_4 span_1_of_4">
							<h4>Why buy from us</h4>
							<ul>
								<li><a href="/contact">About Us</a></li>
								<li><a href="/contact">Customer Service</a></li>
								<li><a href="/home">Privacy Policy</a></li>
								<li><a href="/contact">Site Map</a></li>
								<li><a href="/home">Search Terms</a></li>
							</ul>
						</div>
						<div class="col_1_of_4 span_1_of_4">
							<h4>My account</h4>
							<ul>
								<li><a href="contact.html">Sign In</a></li>
								<li><a href="/home">View Cart</a></li>
								<li><a href="/home">My Wishlist</a></li>
								<li><a href="/home">Track My Order</a></li>
								<li><a href="/contact">Help</a></li>
							</ul>
						</div>
						<div class="col_1_of_4 span_1_of_4">
							<h4>Contact</h4>
							<ul>
								<li><span>+01119555809</span></li>
								<li><span>+01147708069</span></li>
							</ul>
							<div class="social-icons">
								<h4>Follow Us</h4>
								<ul>
									<li><a href="https://www.facebook.com/%D8%A7%D9%84%D8%B4%D8%B1%D9%83%D9%87-%D8%A7%D9%84%D8%B9%D8%A7%D9%84%D9%85%D9%8A%D9%87-%D9%84%D8%A7%D8%B3%D8%AA%D9%8A%D8%B1%D8%A7%D8%AF-%D9%85%D8%B9%D8%AF%D8%A7%D8%AA-%D8%A7%D9%84%D9%85%D8%B7%D8%A7%D8%A8%D8%AE-%D9%88%D8%A7%D9%84%D9%81%D9%86%D8%A7%D8%AF%D9%82-%D9%88%D8%A7%D9%84%D9%83%D8%A7%D9%81%D9%8A%D9%87%D8%A7%D8%AA-1815681062025786/?epa=SEARCH_BOX"
											target="_blank"><img src="{{ asset('user/images/facebook.png')}}"
												alt="" /></a>
									</li>
									<li><a href="#" target="_blank"><img src="{{ asset('user/images/twitter.png')}}"
												alt="" /></a>
									</li>
									<li><a href="#" target="_blank"><img src="{{ asset('user/images/skype.png')}}"
												alt="" /> </a>
									</li>
									<li><a href="#" target="_blank"> <img src="{{ asset('user/images/dribbble.png')}}"
												alt="" /></a>
									</li>
									<li><a href="#" target="_blank"> <img src="{{ asset('user/images/linkedin.png')}}"
												alt="" /></a>
									</li>
									<div class="clear"></div>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="copy_right">
					<p>&copy; 2020 StartUp. All rights reserved | Design by Abnabi-Fahmy-Gomaa</a></p>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function () {
					$().UItoTop({ easingType: 'easeOutQuart' });
				});
			</script>
			<a href="#" id="toTop"><span id="toTopHover"> </span></a>

			<meta name="csrf-token" content="{{ csrf_token() }}">
</body>

</html>
<!-- Edit Modal HTML add request-->
<div id="addRequestModal" class="modal fade in" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Order Product <h6>we will contact with you wait us...</h6>
				</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Your Name</label>
					<input type="text" class="form-control user_name" required="" name="user_name">
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Phone Number</label>
					<input type="text" class="form-control user_phone" required="" name="user_phoneNumber">
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				<input type="submit" class="btn btn-success saveOrder" value="SaveReq">
			</div>

		</div>
	</div>
</div>
<script>
	var Selectedid = -1;
	$(document).on("click", ".add-cart .orderReq", function () {
		Selectedid = $(this).attr('id');
	});
	$(document).on("click", ".modal-footer .saveOrder", function () {
		var user_name = $(".user_name").val();
		var user_phone = $(".user_phone").val();
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/orderProduct/' + Selectedid,
			type: 'post',
			data: { 'user_name': user_name, 'user_phone': user_phone },
			success: function (result) {
				alert("Submited you Order");
				location.reload();
			}
		});
	});

</script>