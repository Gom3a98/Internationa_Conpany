@extends('user/layouts/user')
@section('Header')
<li class="active"><a href="/home">Home</a></li>
<li><a href="/contact">About</a></li>
<li><a href="news.html">Offer</a></li>
@endsection

@section('content')


		<div class="header_slide">
			<div class="header_bottom_left">
				<div class="categories">
					<ul>
						<h3>Categories</h3>
						@foreach ($categories as $category)
					<li><a href="/home/{{$category->id}}">{{$category->name}}</a></li>
						@endforeach
						
					</ul>
					
				</div>
				<div class="clearfix">
					{{$categories->links()}}
			   </div>
			</div>
			
			<div class="header_bottom_right">
				<div class="slider">
					<div id="slider">
						<div id="mover">
							<div id="slide-1" class="slide">
								<div class="slider-img">
									<a href="preview.html"><img style="height: 400px; width: 350px" src="{{ asset('user/images/main.jpg')}}"
											alt="learn more" /></a>
								</div>
								<div class="slider-text">
									<h1>Offer<br><span>SALE</span></h1>
									<h2>UPTo 20% OFF</h2>
									<div class="features_list">
										<h4>  بافضل الامكانيات لدينا افضل الاسعار و<br> الخصومات بافضل الحالات</h4>
									</div>
									<a href="preview.html" class="button">Shop Now</a>
								</div>
								<div class="clear"></div>
							</div>
							@foreach ($offers as $offer)
								<div class="slide">
									<div class="slider-text">
										<h1>{{$offer->name}}<br><span>SALE</span></h1>
										<h2>${{$offer->price}}.00</h2>
										<div class="features_list">
										<h4>{{$offer->desc}}</h4>
										</div>
										<a class="button orderReq"data-toggle="modal" id="{{$offer->product_id}}" href="#addRequestModal">Order Now</a>
									</div>
									<div class="slider-img">
										<a href="/preview/{{$offer->product_id}}"><img style="height: 400px; width: 350px" src="{{asset($offer->url)}}"
											
												alt="learn more" /></a>
									</div>
									<div class="clear"></div>
								</div>
							@endforeach

						</div>

					</div>

					<div class="clear"></div>
				</div>

			</div>
			<div class="clear"></div>
		</div>

	</div>
	<div class="main">
		<div class="content">
			<div class="content_top">
				<div class="heading">
					<h3>Our Products</h3>
				</div>
				<div class="see">
					<p><a href="#">See all Products</a></p>
				</div>
				<div class="clear"></div>
			</div>
			<div class="section group">
				@foreach ($products as $product)
					
				
				<div  class="grid_1_of_4 images_1_of_4">
				<a href="/preview/{{$product->id}}"><img style="height: 250px; width: 250px"src="{{asset($product->url)}}" alt="" /></a>
					<h2>{{$product->name}}</h2>
					
					<div class="price-details">
						<div class="price-number">
							<p><span class="rupees">${{$product->price}}</span></p>
						</div>
						<div class="add-cart">
							<h4><a class="orderReq"data-toggle="modal" id="{{$product->id}}" href="#addRequestModal">Order</a></h4>
							
						</div>
						<div class="clear"></div>
					</div>

				</div>
			@endforeach
			<div class="clearfix">
				{{$products->links()}}
		   </div>
			
			</div>
		</div>
	</div>
</div>



@endsection