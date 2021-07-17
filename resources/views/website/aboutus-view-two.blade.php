@extends('layouts.website')

@section('content')
@php
// dd('perfect');
$article = App\AboutUs::where('id',2)->get();

@endphp
@foreach ($article as $data)
<div class="home-about-photo-contest-area pt-100 pb-100">
  <div class="container">
    <div class="row fullwidth-photocontst">
      <div class="col-sm-12">
        <div class="section-img">
          <img src="{{ asset('uploads/aboutus/'.$data->photo) }}" alt="single Images" />
        </div>
        <div class="single-content-details">
          {{-- <h3 class="headding-title">{{$data->title}}</h3> --}}
          <h3 class="headding-title">{{$data->title}}</h3>
          {{-- <ul id="meta-text">
            <li class="topright"><i class="fa fa-camera"></i><span>Photo Credit:</span> {{$data->photo_credit}}</li>

          </ul> --}}
         <div class="topright"><i class="fa fa-camera"></i> <span>Photo Credit:</span> {{$data->photo_credit}}</div>
          <p class="des">{!!$data->description!!}</p>
          <!--<div class="col-lg-6 col-md-6 col-sm-12 text-right"> -->
          <div class="blog-content-share-social-icons">
            @php
            $value = App\FooterLeft::orderBy('id', 'desc')->take(1)->get();
            @endphp
            @foreach ($value as $data)
            {{-- <div id="fb-root"></div> --}}
            <ul>
              
              <li><iframe
                  src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fasacrail.com%2Faboutus-view%2F2&layout=button_count&size=large&width=88&height=28&appId"
                  width="88" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                  allowTransparency="true" allow="encrypted-media"></iframe></li>
            </ul>

            {{--           
             <li><a href="{{$data->facebook_link}}"><i class="fa fa-facebook"></i></a></li>
            <li><a href="{{$data->twitter_link}}"><i class="fa fa-twitter"></i></a></li>
            <li><a href="{{$data->instagram_link}}"><i class="fa fa-linkedin"></i></a></li> --}}


            @endforeach
          </div>
          <!--</div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<!-- About Photo Contests End Here -->
@endsection