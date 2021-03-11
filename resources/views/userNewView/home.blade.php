@extends('userNewView/layouts/user')

@section('content')
	<!-- banner -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			{{-- <li data-target="#carouselExampleIndicators" data-slide-to="3"></li> --}}
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
								<span>coffee </span> machine</p>
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
								<span>Espresso</span>
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
			{{-- <div class="carousel-item item4">
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
			</div> --}}
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

			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
                        <!-- first section -->

                            <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
									<span>O</span>ur
									<span>C</span>ategorys</h3>
                                <div class="row">
									@foreach ($categories as $category)
                                        <div class="col-md-4 product-men mt-5">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                                <div class="men-thumb-item text-center">
                                                    
													<a href="/Home/{{$category->id}}">
														<img style="width: 200px ;height: 250px;" src="{{asset($category->imgURL)}}" alt="">
													</a>
                                                    {{-- <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
														<a href="/Preview/{{$category->id}}" class="link-product-add-cart">Quick View</a>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="item-info-product text-center border-top mt-4">
                                                    <h4 class="pt-1">
                                                        <a href="/Home/{{$category->id}}">{{$category->name}}</a>
                                                    </h4>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endforeach
                                </div>
                            </div>
						<!-- //second section -->

					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">

					


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