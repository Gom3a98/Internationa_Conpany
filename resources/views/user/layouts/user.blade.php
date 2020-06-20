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
					<ul>
						
						<li><a href="/register">Register</a></li>
						<li><a href="/login">Login</a></li>
						<li><a href="/home">Home</a></li>
						<li><a href="/admin">Checkout</a></li>
						<li><a href="/admin">My Account</a></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
			<div class="header_top">
				<div class="logo">
					<a href="/home"><img src="{{ asset('user/images/logo.png')}}" alt="" /></a>
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
		</div></div>
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
						<div class="col_1_of_4 span_1_of_4" >
							{{-- <h4>My account</h4>
						<ul>
							<li><a href="/login">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul> --}}
							<h4>FIND US</h4>
							<div class="map"style="margin-left: 10px">
								<iframe width="100%" height="165" frameborder="1" scrolling="no" marginheight="0" marginwidth="0"src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3455.9195834263887!2d31.1766729!3d29.981741!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU4JzU0LjMiTiAzMcKwMTAnNDMuOSJF!5e0!3m2!1sen!2seg!4v1592621632780!5m2!1sen!2seg" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								{{-- <iframe width="100%" height="175" frameborder="1" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small> --}}
					   </div>
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
				<h4 class="modal-title">Order Product <h6>we will contact you. (wait us...)</h6>
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
			<div class="modal-body">
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control user_address" required="" name="user_address">
				</div>
			</div>
			<div class="modal-footer">
				<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
				<input type="submit" class="btn btn-success saveOrder" value="Order">
			</div>

		</div>
	</div>
</div>
<script>
	var Selectedid = -1;
	$(document).on("click", ".add-cart .orderReq", function () {
		// alert("hi")
		Selectedid = $(this).attr('id');
	});
	$(document).on("click", ".modal-footer .saveOrder", function () {
		// alert("hii");
		var user_name = $(".user_name").val();
		var user_phone = $(".user_phone").val();
		var user_address= $(".user_address").val();
		// alert(user_name)
		$.ajax({
			
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: '/orderProduct/' + Selectedid,
			type: 'post',
			data: {'user_name': user_name, 'user_phone': user_phone ,'user_address':user_address},
			success: function (result) {
				alert("Submited you Order");
				location.reload();
			}
		});
	});

</script>