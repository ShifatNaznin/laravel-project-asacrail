@extends('layouts.website')

@section('content')


<!-- Inner Page Header serction start here -->
<div class="inner-page-header"
  style="background-image: linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)),url({{asset('contents/website')}}/images/banner/2.jpg);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-title">
          <h2>Contact Us</h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-locator">
          <ul>
            <li><a href="#">Home /</a> Contact Us</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Inner Page Header serction end here -->

<!-- Login and Registration start Here -->
<div class="loginregistration-area pt-100 pb-100">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
        <div class="login-area">
          <h2>SEND YOUR MESSAGE</h2>
          <form method="post" action="{{route('contact_us_store')}}" enctype="multipart/form-data">
            @csrf
            <fieldset>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Email</label>
                  <input id="emailAdd" name="email" placeholder="Enter Your Email" type="email" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" id="phoneNo" name="phone" placeholder="Enter Your Phone Number"
                    class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" id="mailSubject" name="subject" placeholder="Subject" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="yourMessage">Message</label>
                  <textarea id="yourMessage" class="form-control" name="message" placeholder="Message"
                    style="background-color: white;"></textarea>
                </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                  <button class="btn-send" type="submit">SEND</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.553503527281!2d151.09453951521044!3d-33.87539608065441!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12bad9284a1743%3A0x201db3f5de19de11!2s14%2F4%20Morwick%20St%2C%20Strathfield%20NSW%202135%2C%20Australia!5e0!3m2!1sen!2sbd!4v1592938407891!5m2!1sen!2sbd"
          width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
          tabindex="0"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Login and Registration End Here -->


@endsection