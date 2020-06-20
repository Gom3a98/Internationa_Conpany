@extends('user/layouts/user')
@section('Header')
<li ><a href="/home">Home</a></li>
<li class="active"><a href="/contact">About</a></li>
<li><a href="news.html">Offer</a></li>
@endsection
@section('content')

<body>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
					  <h2>Find Us Here</h2>
					  <div class="map">
							   <iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
							   src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3455.9195834263887!2d31.1766729!3d29.981741!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU4JzU0LjMiTiAzMcKwMTAnNDMuOSJF!5e0!3m2!1sen!2seg!4v1592621632780!5m2!1sen!2seg"></iframe>

					  </div>
				  </div>
  				</div>
				<div class="col span_1_of_3">
					<div class="contact_info">
    	 				
      				</div>
      			<div class="company_address">
				     	<h3>Company Information :</h3>
						    	<p>سلم مصر للطيران دائرى المنيب</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>EGY</p>
						   <p>Phone Nabil:(2)0 111 955 5809</p>
						   <p>Phone Moham:(2)0 114 770 8069</p>
						   <p>Phone Ahmed:(2)0 112 299 5553</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span><a href="mailto:@example.com">info@mycompany.com</a></span></p>
				   		<p>Follow on: <span><a href="https://www.facebook.com/%D8%A7%D9%84%D8%B4%D8%B1%D9%83%D9%87-%D8%A7%D9%84%D8%B9%D8%A7%D9%84%D9%85%D9%8A%D9%87-%D9%84%D8%A7%D8%B3%D8%AA%D9%8A%D8%B1%D8%A7%D8%AF-%D9%85%D8%B9%D8%AF%D8%A7%D8%AA-%D8%A7%D9%84%D9%85%D8%B7%D8%A7%D8%A8%D8%AE-%D9%88%D8%A7%D9%84%D9%81%D9%86%D8%A7%D8%AF%D9%82-%D9%88%D8%A7%D9%84%D9%83%D8%A7%D9%81%D9%8A%D9%87%D8%A7%D8%AA-1815681062025786/?epa=SEARCH_BOX">Facebook</a> </span>, <span>Twitter</span></p>
				   </div>
				 </div>
				 
			  </div>	
			  


         </div> 
	</div>
	<div class="main">
		<div class="content">
			<div class="section group">
					<div class="col_1_of_3 span_1_of_3">
						<h3>Who We Are</h3>
						<img  src="{{ asset('user/images/main.jpg')}}" alt="learn more" />
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
					<div class="col_1_of_3 span_1_of_3">
						<h3>Our History</h3>
					 <div class="history-desc">
						<div class="year"><p>1998 -</p></div>
						<p class="history">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					 <div class="clear"></div>
					</div>
					 <div class="history-desc">
						<div class="year"><p>2001 -</p></div>
						<p class="history">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
					 <div class="clear"></div>
					</div>
					 <div class="history-desc">
						<div class="year"><p>2006 -</p></div>
						<p class="history">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					 <div class="clear"></div>
					</div>
					 <div class="history-desc">
						<div class="year"><p>2010 -</p></div>
						<p class="history">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					 <div class="clear"></div>
					</div>
					<div class="history-desc">
						<div class="year"><p>2013 -</p></div>
						<p class="history">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
					 <div class="clear"></div>
					</div>
				</div>
					<div class="col_1_of_3 span_1_of_3">
						<h3>Opportunities</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
						<div class="list">
							 <ul>
								 <li><a href="#">Text of the printing</a></li>
								 <li><a href="#">Lorem Ipsum has been the standard</a></li>
								 <li><a href="#">Dummy text ever since the 1500s</a></li>
								 <li><a href="#">Unknown printer took a galley</a></li>
								 <li><a href="#">Led it to make a type specimen</a></li>
								 <li><a href="#">Not only five centuries</a></li>
								 <li><a href="#">Electronic typesetting</a></li>
								 <li><a href="#">Unchanged. It was popularised</a></li>
								 <li><a href="#">Sheets containing Lorem Ipsume</a></li>
							 </ul>
						 </div>
						 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					</div>
				</div>			
		</div>
	 </div>

  

@endsection