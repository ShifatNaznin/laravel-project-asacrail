@extends('layouts.website')

@section('content')
<!-- About Photo Contests Start Here -->
<div class="home-about-photo-contest-area pt-100 pb-100">
  <div class="container">
    <div class="row fullwidth-photocontst">
      <div class="col-sm-12">
        <div class="section-img">
          <img src="{{ asset('uploads/news-blog/'.$news->blog_photo) }}" alt="single Images" />
        </div>
        <div class="single-content-details">
          <h3 class="headding-title">{{$news->blog_title}}</h3>
          <ul id="meta-text">
            {{-- <li class="date"><i class="fa fa-calendar-check-o"></i>{!!$news->created_at->format('d M,Y a')!!}</li> --}}

          </ul>
          <p class="des">{!!$news->blog_description!!}</p>
          <!-- <div class="col-lg-6 col-md-6 col-sm-12 text-right"> -->
          <!--<div class="blog-content-share-social-icons">-->
          <!--  <ul>-->
          <!--    <li> <span>Share: </span> </li>-->
          <!--    <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
          <!--    <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
          <!--    <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
          <!--    <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>-->
          <!--    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
          <!--    <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
          <!--  </ul>-->
          <!--</div>-->
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Photo Contests End Here -->
@endsection