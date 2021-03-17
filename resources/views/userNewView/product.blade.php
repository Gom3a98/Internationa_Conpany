@extends('userNewView/layouts/user')

@section('content')


<!-- page -->
<div class="agile_inner_breadcrumb">
	<div class="container">
		<ul class="w3_short">
			<li>
				<a href="/Home">Home</a>
				<i>|</i>
			</li>
			<li>
				<a href="/Home/{{$category->id}}">{{$category->name}}</a>
				<i>|</i>
			</li>
			<li>{{$product->name}}</li>
		</ul>
	</div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">

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
							معدات مطاعم,معدات فنادق - معدات كافيهات - استيراد معدات المطاعم ,استيراد - ايطاليا - حرق اسعار - جديد,معدات جديدة - فنادق - كافيهات - تجهيزات فنادق - معدات مطاعم - تجهيزات الكافيه - معدات ايطاليه ١٠٠٪؜ 
							<br>
							kitchen - hotel - cafe
							,commercial kitchen equipment - kitchen equipment list - kitchen equipment for restaurant - kitchen equipment for sale - types of kitchen equipment - best kitchen tools - sell					
						</li>
						<li class="mb-1">
							نبذه عن وارداتنا:
							بوتاجاز - فراير - جريل - بان مارى - باستاكوك -حله بخاريه -مربع ارز - فرن بيتزا - فرن كونفكشن - فرن كومبى ستيمر - ثلاجات ستيل رأسيه ١و٢باب ثلاجات الاندر كاونتر الأفقية ستيل ٢ و٣و ٤و٥ابواب - ماكينات القهوه الاسبريسو - مطاحن البٌن -ايس ميكر - خلاط - مبرد عصائر سلاش - عجانات -مضارب - خلاط - ثلاجات حلوانى- فرن بيتزا -قطاعة بسطرمة - قطاعة خضار - هوت كابين - ريشو - بان مارى - بلاست شيلار - ديب فريزر - ثلاجات جارد مانجيه- نافوره الشيكولاته - خلاط كاتم صوت - سوفتينر - ثلاجات عرض مشروبات - مربع ارز - حله شوربه - غسالات اوانى واكواب - مخمره عجين - ثلاجات السوشى- ترابيزات هود - حوض غسيل - ستاندات
							بوتجاز - افران,كونفيكشن - ثلاجات منزلى - ثلاجات استلس,2باب - 1باب - زجاج - فرش سوبرماركت - سوبر ماركت - هايبر ماركت - مجانا - فرش مطاعم,بولر,ويليم,فوستر,ترو امريكى,العالمية,استيراد,زيرو,كسر الزيرو
							قلايات - جريلات - ايس ميكر - غسالات - غسالات اطباق - غسالات حلل - غسالات اطباق,بيع - اليكتروليكس - ريشو,مالتى ديك - سخن
							<br>
							supermarket - hypermarket - polar - william - foster - true - new - copy - class washer - dish washer - washer - dryer - electrolux - multi deck - hot line - import - export

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




		<!-- first section -->
		{{-- @foreach ($categoriesProduct as $category) --}}
			<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
				<h3 class="heading-tittle text-center font-italic">Related Product</h3>
				<div class="row">
					@foreach ($products as $product)
						<div class="col-md-4 product-men mt-5">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item text-center">
									
									<a href="/Preview/{{$product->id}}">
										<img style="width: 200px ;height: 250px;" src="{{asset($product->url)}}" alt="">
									</a>
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
										<a href="/Preview/{{$product->id}}" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
								</div>
								<div class="item-info-product text-center border-top mt-4">
									<h4 class="pt-1">
										<a href="/Preview/{{$product->id}}">{{$product->name}}</a>
									</h4>
									<div class="info-product-price my-2">
										
										
											<div style="float: left;">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>

												
												</div>
												<div style="float: right;">
													Code:{{$product->id}}

													
													</div>
													<br>
													<div style="float: center;">
														<img src="https://media.nisbets.com/images/availability/en/inStock.png" alt="In Stock Next Working Day Delivery" title="In Stock Next Working Day Delivery">
														<span class="prod-availability-msg">In Stock </span>

														
														</div>	
										{{-- <del>{{$product->price}}</del> --}}
									</div>
									
									<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
									<input type="submit" id="{{$product->id}}" data-toggle="modal" href="#addRequestModal{{$product->id}}" name="submit" value="order" class="orderReq button btn" />	
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
						
					@endforeach
				</div>
			</div>



@endsection
