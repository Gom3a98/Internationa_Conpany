@extends('userNewView/layouts/user')

@section('content')
	
    
	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
                        <!-- first section -->
                        {{-- @foreach ($categoriesProduct as $category) --}}
                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <h3 class="heading-tittle text-center font-italic">{{$category->name}}</h3>
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
						<!-- //second section -->
						{{-- @endforeach --}}
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Search Here..</h3>
							<form class="form-inline" action="/search" method="GET">
								<input type="search" placeholder="Product name..." name="key" required="">
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


						<!-- customer  -->
						<div class="f-grid py-2">
							<h3 class="agileits-sear-head mb-3">Our Customer</h3>
							<div class="box-scroll">
								<div class="scroll">
                                   
									
									
									{{-- @foreach ($offers as $offer) --}}
                                    <div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://upload.wikimedia.org/wikipedia/en/thumb/b/bf/KFC_logo.svg/1200px-KFC_logo.svg.png" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">KFC</a>
											
											
										</div>
									</div>
                                    {{-- @endforeach --}}

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