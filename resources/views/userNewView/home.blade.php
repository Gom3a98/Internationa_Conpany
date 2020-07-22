@extends('userNewView/layouts/user')

@section('content')
	<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item item1 active">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get flat
								<span>10%</span> Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
								<span>Big</span>
								Sale
							</h3>
							<a class="button2" href="/Home">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item2">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>advanced
								<span>Wireless</span> earbuds</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
								<span>Headphone</span>
							</h3>
							<a class="button2" href="/Home">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item3">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get flat
								<span>10%</span> Cashback</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
								<span>Standard</span>
							</h3>
							<a class="button2" href="/Home">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item item4">
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<p>Get Now
								<span>40%</span> Discount</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
								<span>Discount</span>
							</h3>
							<a class="button2" href="/Home">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<!-- //banner -->

    
	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>N</span>ew
				<span>P</span>roducts</h3>
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
                        <!-- first section -->
                        @foreach ($categoriesProduct as $category)
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <h3 class="heading-tittle text-center font-italic">{{$category->name}}</h3>
                                <div class="row">
									@foreach ($category->products as $product)
                                        <div class="col-md-4 product-men mt-5">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                                <div class="men-thumb-item text-center">
                                                    <img style="width: 200px ;height: 250px;" src="{{asset($product->url)}}" alt="">
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
														
														<span class="item_price">{{number_format($product->from_price,2)}}</span>
														to
														<span class="item_price">{{number_format($product->price,2)}}</span>
                                                        {{-- <del>{{$product->price}}</del> --}}
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
                                        
                                    @endforeach
                                </div>
                            </div>
						<!-- //second section -->
						@endforeach
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Search Here..</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Product name..." name="search" required="">
								<input type="submit" value=" ">
							</form>
						</div>
						
						<!-- category -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Category</h3>
							<ul>
								@foreach ($categories as $category)
									<li>
										
										<a href="/Home/{{$category->id}}"><span class="span">{{$category->name}}</span></a>
										
									</li>
								@endforeach
								
							</ul>
						</div>


						<!-- reviews -->
						<div class="customer-rev border-bottom left-side py-2">
							<h3 class="agileits-sear-head mb-3">Customer Review</h3>
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>5.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>4.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>3.5</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<span>3.0</span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-star"></i>
										<i class="fas fa-star"></i>
										<i class="fas fa-star-half"></i>
										<span>2.5</span>
									</a>
								</li>
							</ul>
						</div>
						<!-- //reviews -->
						
						<!-- best seller -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Sales</h3>
							<div class="box-scroll">
								<div class="scroll">
                                    @foreach ($offers as $offer)
                                    <div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img style="width: 400px;height: 100px;" src="{{asset($offer->img)}}" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="/OffersDetails/{{$offer->id}}">{{$offer->title}} : {{$offer->desc}}</a>
											<a href="/OffersDetails/{{$offer->id}}" class="price-mar mt-2">{{number_format($offer->offerPrice,2)}}LE</a>
											
										</div>
									</div>
                                    @endforeach

								</div>
							</div>
						</div>
						<!-- //best seller -->
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->


@endsection