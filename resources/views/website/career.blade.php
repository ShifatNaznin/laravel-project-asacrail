@extends('layouts.website')

@section('content')


<!-- Inner Page Header serction start here -->
<div class="inner-page-header"
  style="background-image: linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)),url({{asset('contents/website')}}/images/banner/2.jpg);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-title">
          <h2>Career</h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-locator">
          <ul>
            <li><a href="{{'/'}}">Home /</a> Career</li>
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
    @php
    $head =App\CareerLink::where('id', 1)->get();
    @endphp

    @foreach ($head as $data)
    <p>{!!$data->heading!!}</p>
      @endforeach
    <div class="row no-gutters">
    
      <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
        <div class="login-area">
          <h2>Career Submission</h2>
          <form method="post" action="{{route('career_store')}}" enctype="multipart/form-data">
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
                  <label>Submission File</label>
                  <input type="file" name="file" class="form-control">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <button class="btn-send" type="submit">SUBMIT</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      @php
      $head =App\CareerLink::orderBy('id', 'DESC')->take(1)->get();
      @endphp

      @foreach ($head as $data)
      <div class="col-lg-6 col-md-6 col-sm-12">

        <div class="fb-page"
          data-href="https://www.facebook.com/Australian-System-Assurance-Engineering-Company-102828104780668/"
          data-tabs="timeline" data-width="800" data-height="600" data-small-header="false"
          data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/Australian-System-Assurance-Engineering-Company-102828104780668/"
            class="fb-xfbml-parse-ignore"><a href="{{$data->description}}">Australian
              System Assurance Engineering Company</a></blockquote>
        </div>



        {{-- {{$data->description}} --}}
        @endforeach
      </div>
    </div>
  </div>
</div>
<!-- Login and Registration End Here -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0"
  nonce="JZfwMWjc"></script>
@endsection