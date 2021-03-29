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
											<img  src="https://images.deliveryhero.io/image/otlob/restaurants/degas_logo_637392423898614498.jpg" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Dega's</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="data:image/png;base64,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" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Aroma cafe</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="data:image/jpeg;base64,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" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Carbon Gastronomic Grill</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://menuegypt.com/restaurants_logos/Maison-Thomas_logo.jpg" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Maison thomas</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t1.0-9/60430006_446110276192834_5433973488819896320_o.png?_nc_cat=111&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeF7m6G49u3Qn97EKtUywKnGPAlZ5wX5H2Q8CVnnBfkfZCep3Xaq5q-CxdoOvwNQRF5vc6Geal-GQXpLoCuzAhjH&_nc_ohc=URMjurD1MDsAX99KaPM&_nc_ht=scontent.fcai2-2.fna&oh=a5dc963655f47726d3d89b00edb6e3e9&oe=606F295C" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">The Grand Hotel Hurghada</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t1.0-9/10983428_844504125606053_1191911751116667527_n.jpg?_nc_cat=109&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeG7OFG4ncpl1n3sAjkSi4NhVsm2IeGY2llWybYh4ZjaWclUqOX3DGSUlay75dTY2Nr6uNW6JoX41ZtZn_G8ztQX&_nc_ohc=OSEzkyH9MysAX9-6_Zk&_nc_ht=scontent.fcai2-2.fna&oh=f7e2e1d11466235c77071ace1aa1f45c&oe=6071A38D" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">SeaGull Beach Resort</a>
											
											
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-1.fna.fbcdn.net/v/t1.0-9/10153171_10152101702848214_7008542731901999396_n.jpg?_nc_cat=1&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeHuTANMzqd-OX05Lld3q4vHN6aro6t3N3I3pqujq3c3cjRkO4xp7MmzdQPBJF-BjRgR3viVW-fQ1kUPJut7E_8T&_nc_ohc=cgq9V0fa1ooAX-0B0gZ&_nc_ht=scontent.fcai2-1.fna&oh=c59fa697b3395dc9cab2f0784102e3b2&oe=606E42EF" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Chili's Grill & Bar</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://alborsaanews.com/app/uploads/2014/04/1486992041_130_53311_-770x435.jpg?x25543" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Amer Group</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-1.fna.fbcdn.net/v/t1.0-9/81845547_992533987790267_2966463048681783296_n.jpg?_nc_cat=106&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeE4ajGW-G6etcW8wZGuSqai4JUYogVFuRrglRiiBUW5GlnLpqwca_QZBwmHQCYrUT4BMjWlKOeULBEs7zvgvHvt&_nc_ohc=fZz0jJlj8SIAX8975Io&_nc_ht=scontent.fcai2-1.fna&oh=c452942874acff406819d63133d8fb32&oe=606F1DEC" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Bella Figura</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://static.wixstatic.com/media/f73908_5518380a40524ea6820fc624e0a1791f.png/v1/fill/w_160,h_119,al_c,q_85,usm_0.66_1.00_0.01/f73908_5518380a40524ea6820fc624e0a1791f.webp" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">The Tap Bar and Grill</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t31.0-8/27023556_354396908362884_8471835710944923568_o.jpg?_nc_cat=110&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeGj4dCrQJCsGAsykmKhALStxeE8gakXcI3F4TyBqRdwjWQ8rSXEF6NwvtGZq1Lq0sA6BXdAGYmvBsThUyqczIVP&_nc_ohc=h10Z-roXCyMAX9h9mvo&_nc_ht=scontent.fcai2-2.fna&oh=6d0b9b3dc552cd2a0f5fb7b11a57c587&oe=606E675D" alt="kfc" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Cairo Jazz</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t31.0-8/23632353_494495814239431_4734656168981445081_o.jpg?_nc_cat=100&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeFaY1R5eCbbxkg9I3xNlWGmn3lBOAiVljufeUE4CJWWO0K7yRTXC1dX9OPmXjVTT50bE1mC0nAyzGAG30LX_Fw8&_nc_ohc=J2MEP8RlXdwAX_iaIik&_nc_ht=scontent.fcai2-2.fna&oh=7a229772a796b84c89788cc6bf3df145&oe=607164B3" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Casper Restaurant</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t1.0-9/12592417_10153829911516031_8022737957635547807_n.png?_nc_cat=110&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeFrFSbqP608WTCwmdgESjYTmwamF7khxPebBqYXuSHE9yx-ToDRIvVntH60pXFbHzOTfdd2S4eXRFaxKbT4FaZO&_nc_ohc=OXNjieh6R0cAX9VZFFZ&_nc_ht=scontent.fcai2-2.fna&oh=b12df791d07d1dcde21de1102f0f08df&oe=60703EB5" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">Zitouni</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-lg-3 col-sm-2 col-3 left-mar">
											<img  src="https://scontent.fcai2-2.fna.fbcdn.net/v/t1.0-9/38006927_677404435957610_6680903491004661760_n.jpg?_nc_cat=105&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeH-DKA_qJ8r-RereRKqmBw9-pJZPG8i3Qn6klk8byLdCWcCYxpjA6YcetfWUzYTW5OLNeaB_6WrwwadIsa6ecq2&_nc_ohc=bqmB37h4VmQAX9OsHdL&_nc_ht=scontent.fcai2-2.fna&oh=0af0af5a26fd8e7856638a8e355c7cee&oe=607075C3" alt="" class="img-fluid">
										</div>
										<div class="col-lg-9 col-sm-10 col-9 w3_mvd">
										<a href="#">كزبرة - Kozbra</a>
										</div>
									</div>
									<br>
									
									

									

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