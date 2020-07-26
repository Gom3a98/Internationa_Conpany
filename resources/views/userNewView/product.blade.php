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
				<li>{{$product->name}}</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>S</span>ingle
			<span>P</span>age</h3>
		<!-- //tittle heading -->
		<div class="row">
			<div class="col-lg-5 col-md-8 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							@foreach ($images as $image)
								
								<li data-thumb="{{asset($image->url)}}">
									<div class="thumb-image">
										<img src="{{asset($image->url)}}" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							@endforeach
							
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<div class="col-lg-7 single-right-left simpleCart_shelfItem">
				<h3 class="mb-3">{{$product->name}}</h3>
				<p class="mb-3">
					<span class="item_price">{{number_format($product->from_price,2)}}</span>
					to
					<span class="item_price">{{number_format($product->price,2)}}</span>
					
					<del>Free delivery</del>
				</p>
				<div class="single-infoagile">
					<ul>
						<li class="mb-3">
							{!! nl2br(e("$product->description")) !!}.
						</li>
						
					</ul>
				</div>
				<div class="product-single-w3l">
					<p class="my-3">
						<i class="far fa-hand-point-right mr-2"></i>
						<label>6 Month</label>Manufacturer Warranty</p>
					<ul>
						<li class="mb-1">
							This Warranty covers the defects resulting from defective parts, materials or manufacturing, if such defects are revealed during the period of 12 months since the date of purchase.
						</li>
						<li class="mb-1">
							The Warranty does not cover consumables or parts of limited regular functionality due to their natural wear and tear.
						</li>
						<li class="mb-1">
							After the period of warranty the spare parts are available for In exchange for money.
						</li>
						<li class="mb-1">
							ضمان 6 اشهر
						</li>
						<li class="mb-1">
							ضمان مدة عام واحد ضد عيوب الصناعة
						</li>
						<li class="mb-1">
							بعد مدة الضمان تتوافر جميع قطع الغيار بمقابل مادى
						</li>
						
					</ul>
					<p class="my-sm-4 my-3">
						<i class="fas fa-retweet mr-3"></i>Net banking & Credit/ Debit/ ATM card
					</p>
				</div>
				<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
					<input type="submit" id="{{$product->id}}" data-toggle="modal" href="#addRequestModal{{$product->id}}" name="submit" value="Shop" class="orderReq button btn" />	
					</div>
				<!-- Edit Modal HTML add request-->
				<div id="addRequestModal{{$product->id}}" class="modal fade in" style="display: none;">
					<form action="/OrderProduct/{{$product->id}}" method="post">
						@csrf
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Order Product 
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Your Name</label>
										<input type="text" class="form-control" required="" name="user_name">
									</div>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Phone Number</label>
										<input type="text" class="form-control" required="" name="user_phone">
									</div>
								</div>
								<div class="modal-body">
									<div class="form-group">
										<label>Address</label>
										<input type="text" class="form-control"  name="user_address" required>
									</div>
								</div>
								<div class="modal-footer">
									<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
									<input type="submit" class="btn btn-success saveOrder" value="Order">
								</div>

							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- //Single Page -->





@endsection
