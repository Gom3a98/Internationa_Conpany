@extends('user/layouts/user')
@section('Header')
<li><a href="/home">HOME</a></li>
<li><a href="/offers">OFFER</a></li>
<li><a href="/about">ABOUT</a></li>
<li class="active"><a href="/news">NEWS</a></li>
<li><a href="/contact">CONTACT</a></li>

@endsection
@section('content')
<div class="image group">
    <div class="grid images_3_of_1">
        <img src="{{ asset('user/images/newsimg1.jpg')}}" alt="" />
    </div>
    <div class="grid news_desc">
        <h3>We launched a new website </h3>
        <h4>Posted on Jun 25th, 2020 by <span><a href="#">Three Brother</a></span></h4>
        <p>On Monday, June 17, we launched a new website of InterNational Company in English language. We believe that the new responsive website will bring you clearer information about our products, services and business. The following languages ​​will be added: Arabic, Russian, German. There are also new entries to the social networks Facebook, LinkedIn.</p>
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur <a href="#" title="more">[....]</a></p> --}}
   </div>
</div>	
<div class="image group">
    <div class="grid images_3_of_1">
        <img src="{{ asset('user/images/newsimg2.jpg')}}" alt="" />
    </div>
    <div class="grid news_desc">
        <h3>Opening Company In new Location</h3>
        <h4>Posted on Aug 8th, 2019 by <span><a href="#">Three Brother</a></span></h4>
        <p>Under the statue of Janošík in TERCHOVA, at the end of Aug 2019, we opened another store with our refrigeration cabinets.</p>
        <p>The sales area has ​​400m2 and for our client we supplied all the refrigeration furniture with technology, as well as a dry rack system and cash boxes. The serveover line consists of 3 pieces of KUBUS square refrigerated display cabinets with ventilated cooling. The set of wall positioned cabinets is made up of California showcases<a href="#" title="more">[....]</a></p>
   </div>
</div>
<div class="image group">
    <div class="grid images_3_of_1">
        <img src="{{ asset('user/images/newsimg3.jpg')}}" alt="" />
    </div>
    <div class="grid news_desc">
        <h3>Opening of a shop in Novokuznetsk </h3>
        <h4>Posted on SEB 1st, 2010 by <span><a href="#">Three Brother</a></span></h4>
        <p>In Oroba Street has been opened a new store of the network „InterNational Company“. Delivery and installation of shop equipment was carried out by the company „„InterNational Company“ – the official dealer of the company Pastorkalt. For the project were used serve over cabinets ZEUS, wall positioned cabinets KALIFORNIA and freezing islands SARDEGNA.</p>
        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur <a href="#" title="more">[....]</a></p> --}}
   </div>
</div>
<div class="content-pagenation">
            <li><a href="/news">Frist</a></li>
            <li class="active"><a href="#">1</a></li>
            {{-- <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><span>....</span></li> --}}
            <li><a href="/news">Last</a></li>
            <div class="clear"> </div>
        </div>	


        @endsection