@extends('user/layouts/user')
@section('Header')
<li><a href="/home">HOME</a></li>
<li><a href="news.html">OFFER</a></li>
<li><a href="/about">ABOUT</a></li>
<li><a href="/news">NEWS</a></li>
<li class="active"><a href="/contact">CONTACT</a></li>

@endsection
@section('content')
<div class="section group">
    <div class="col span_2_of_3">
      <div class="contact-form">
          <h2>Contact Us</h2>
            <form>
                <div>
                    <span><label>Name</label></span>
                    <span><input type="text" class="textbox" ></span>
                </div>
                <div>
                    <span><label>E-mail</label></span>
                    <span><input type="text" class="textbox"></span>
                </div>
                <div>
                     <span><label>Company Name</label></span>
                    <span><input type="text" class="textbox"></span>
                </div>
                <div>
                    <span><label>Subject</label></span>
                    <span><textarea> </textarea></span>
                </div>
               <div>
                       <span><input type="submit" value="Submit"  class="myButton"></span>
              </div>
            </form>
      </div>
      </div>
    <div class="col span_1_of_3">
        <div class="contact_info">
             <h3>Find Us Here</h3>
                  <div class="map">
                           <iframe width="100%" height="175" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3455.9195834263887!2d31.1766729!3d29.981741!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjnCsDU4JzU0LjMiTiAzMcKwMTAnNDMuOSJF!5e0!3m2!1sen!2seg!4v1592621632780!5m2!1sen!2seg"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#666;text-align:left;font-size:12px">View Larger Map</a></small>
                  </div>
          </div>
      <div class="company_address">
               <p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
       </div>
     </div>
  </div>
  @endsection