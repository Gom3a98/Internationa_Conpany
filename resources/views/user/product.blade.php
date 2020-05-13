@extends('user/layouts/user')
@section('Header')
<li class="active"><a href="/home">Home</a></li>
<li><a href="/contact">About</a></li>
<li><a href="news.html">Offer</a></li>

@endsection
@section('content')

<script src="{{ asset('user/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>


<link href="{{ asset('user/css/easy-responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="{{ asset('user/css/global.css')}}">
<script src="{{ asset('user/js/slides.min.jquery.js')}}"></script>

<script>
	$(function () {
		$('#products').slides({
			preload: true,
			preloadImage: 'img/loading.gif',
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: 350,
			fadeSpeed: 500,
			generateNextPrev: true,
			generatePagination: false
		});
	});
</script>


<div class="main">
	<div class="content">

		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<div class="product-details">
					<div class="grid images_3_of_2">
						<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
										@foreach ($images as $image)
										<a href="#" target="_blank"><img style="margin-left: 170px" src="{{asset($image->url)}}" alt=" " /></a>
										@endforeach

									</div>
									<ul class="pagination">
										@foreach ($images as $image)
										<li><a href="#"><img style="width:50px; height:30px;" src="{{asset($image->url)}}" alt=" " /></a>
										</li>
										@endforeach

									</ul>
								</div>
							</div>
						</div>
					</div>


					<div class="desc span_3_of_2">
						

					</div>
					<div class="clear"></div>
				</div>
				
				<script type="text/javascript">
					$(document).ready(function () {
						$('#horizontalTab').easyResponsiveTabs({
							type: 'default', //Types: default, vertical, accordion           
							width: 'auto', //auto or any width like 600px
							fit: true   // 100% fit in a container
						});
					});
				</script>
				<div class="content_bottom">
					<div class="heading">
						<h3>Related Products</h3>
					</div>
					<div class="see">
						<p><a href="#">See all Products</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					@foreach ($products as $product)


					<div class="grid_1_of_4 images_1_of_4">
						<a href="/preview/{{$product->id}}"><img  style="height: 250px; width: 250px" src="{{asset($product->url)}}" alt=""></a>
						<div class="price" style="border:none">
							<div class="add-cart" style="float:none">
								<h4><a class="orderReq" data-toggle="modal" id="{{$product->id}}"
										href="#addRequestModal">Order</a></h4>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					@endforeach

				</div>
			</div>
			<div class="rightsidebar span_3_of_1"><br>
				<h2>Product Info</h2>
				<h2>{{$product->name}} </h2>
						<p>{{$product->description}}.</p>
						<div class="price">
							<p>Price: <span>${{$product->price}}</span></p>
						</div>
						<div class="available"></div>
						<div class="share-desc">
							<div class="share">
								<p>Share Product :</p>
								<ul>
									<li><a href="#"><img src="{{ asset('user/images/facebook.png')}}" alt="" /></a></li>
									<li><a href="#"><img src="{{ asset('user/images/twitter.png')}}" alt="" /></a></li>
								</ul>
							</div>
							
							<div class="clear"></div>
						</div>
				<div><span><a class="button orderReq" data-toggle="modal"
					id="{{$product->id}}" href="#addRequestModal">order</a></span></div><br><br><br>
				<h2>CATEGORIES</h2>
				<ul class="side-w3ls">
					@foreach ($categories as $category)
					<li><a href="/home/{{$category->id}}">{{$category->name}}</a></li>
					@endforeach
				</ul>
				<div class="clearfix">
					{{$categories->links()}}
				</div>
				
			</div>
		</div>
	</div>

</div>
{{-- <script type="text/javascript">
	$(document).ready(function () {
		$().UItoTop({ easingType: 'easeOutQuart' });

	});
</script>
		<a href="#" id="toTop"><span id="toTopHover"> </span></a> --}}


@endsection