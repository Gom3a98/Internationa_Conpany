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
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ffer
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				<h4 class="mb-sm-4 mb-3">
                    {{$offersDetails[0]->title}}
                   
				</h4>
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>SL No.</th>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>

								<th>Price</th>
								<th>Original Price</th>
							</tr>
						</thead>
						<tbody>
                            
                            @foreach ($offersDetails[0]->products as $productOffer)
                                
                            
							<tr class="rem1">
								<td class="invert">{{ $loop->index +1}}</td>
								<td class="invert-image">
									<a href="/Preview/{{$productOffer->url}}">
										<img style="width: 200px; height: 200px;" src="{{$productOffer->url}}" alt=" " class="img-responsive">
									</a>
								</td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											
											<div class="entry value">
												<span>{{$productOffer->count}}</span>
											</div>
											
										</div>
									</div>
								</td>
								<td class="invert">{{$productOffer->name}}</td>
								<td class="invert">{{$productOffer->productPrice}}</td>
								<td class="invert">
									<del>{{$productOffer->price}}</del>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
            </div>
            

            
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">{{number_format($offersDetails[0]->offerPrice,2)}}</h4>
					{!! nl2br(e($offersDetails[0]->desc)) !!}
					<div class="checkout-right-basket">
						<a href="/Contact">Make a Payment
							<span class="far fa-hand-point-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

@endsection