@extends('user/layouts/user')
@section('Header')
<li><a href="/home">HOME</a></li>
<li><a href="#">OFFER</a></li>
<li><a href="/about">ABOUT</a></li>
<li><a href="/news">NEWS</a></li>
<li><a href="/contact">CONTACT</a></li>

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

<!--global.css-->
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
										<a href="#" target="_blank"><img  src="{{asset($image->url)}}" alt=" " /></a>
										@endforeach
									</div>
									<ul class="pagination">
										@foreach ($images as $image)
										<li><a href="#"><img  src="{{asset($image->url)}}" alt=" " /></a>
										</li>
										@endforeach

									</ul>
								</div>
							</div>
						</div>
					</div>
					

					<div class="desc span_3_of_2">
						
						
						<h2>{{$product->name}} </h2>
								<p>{{$product->description}}.</p>
								<div class="price">
									<p>Price: <span>${{$product->price}}</span></p>
								</div>
								<div class="available"></div>
								<div class="share-desc">
									<div class="share">
										<p>Shop Product :</p>
										<ul>
											<a class="share" href="http://www.facebook.com/sharer/sharer.php?u=http://internationalnabil.herokuapp.com/preview/{{$product->id}}&amp;title=amr relief package provides another platform for bad actors" data-config-metrics-group="social_shares" 
											data-config-metrics-title="facebook_shares" 
											data-config-metrics-item="facebook_share" 
											onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><img class="share_image" src="{{ asset('user/images/facebook.png')}}" alt="share on facebook"></a>

											<a href="#"><img src="{{ asset('user/images/twitter.png')}}" alt="" /></a>
											<a target="_blsnk" id="whatsapp-icon" href="https://wa.me/01148593387"><img style="width: 30px;height: 30px;" src="https://cdn.shortpixel.ai/client/q_glossy,ret_img/https://eostudy.com/wp-content/uploads/2019/09/whats-app-icon.png"></a>			    
										</ul>
									</div>
									{{-- <div class="button"><span><a href="#">Add to Cart</a></span></div>	 --}}
									{{-- <div><span><a class="button orderReq" data-toggle="modal"
										id="{{$product->id}}" href="#addRequestModal">order</a></span></div> --}}
									<div class="add-cart">
										<h4><a class="orderReq" data-toggle="modal" id="{{$product->id}}" href="#addRequestModal">Shop
												Now</a></h4>
				
									</div>				
									<div class="clear"></div>
								</div>
								

					</div>
					<div class="clear"></div>
				</div>
				<div class="product_desc">	
					<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>Product Details</li>
							
							<li>Warranty Terms and conditions</li>
							
							<div class="clear"></div>
						</ul>
						<div class="resp-tabs-container">
							<div class="product-desc">
								<p>{{$product->description}}</p>
							</div>
		
						 <div class="product-tags">
							 	 
								 <p>-The warranty period is 6 months</p>
								 <p>-This Warranty covers the defects resulting from defective parts, materials or manufacturing, if such defects are revealed during the period of 12 months since the date of purchase.</p>
								 <p>-The Warranty does not cover consumables or parts of limited regular functionality due to their natural wear and tear.</p>
								 <p>-After the period of warranty the  spare parts are available for In exchange for money.</p>
								 
								 {{-- <p>--------------------------------------------</p>
								 <p>-ضمان 6 اشهر </p>
								 <p>-ضمان مدة عام واحد ضد عيوب الصناعة</p>
								 <p>-بعد مدة الضمان تتوافر جميع قطع الغيار بمقابل مادى</p>
								  --}}
								 
								 {{-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p> --}}
							{{-- <h4>Add Your Tags:</h4>
							<div class="input-box">
								<input type="text" value="">
							</div>
							<div class="button"><span><a href="#">Add Tags</a></span></div> --}}
						</div>	
		

					</div>
				 </div>
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
						<p><a href="/contact">Contact US</a></p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="section group">
					@foreach ($products as $product)


					<div class="grid_1_of_4 images_1_of_4">
						<a href="/preview/{{$product->id}}"><img  style="" 
							src="{{asset($product->url)}}" alt=""></a>
						<h2>{{$product->name}}</h2>
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
				<h2>CATEGORIES</h2>
				<ul class="side-w3ls">
					@foreach ($categories as $category)
					<li><a href="/home/{{$category->id}}">{{$category->name}}</a></li>
					@endforeach
				
				
			</div>
		</ul>
		<div class="clearfix">
			{{$categories->links()}}
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