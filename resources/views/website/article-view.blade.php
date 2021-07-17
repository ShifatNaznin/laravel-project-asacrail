@extends('layouts.website')

@section('content')
<!-- About Photo Contests Start Here -->
<div class="home-about-photo-contest-area pt-100 pb-100">
  <div class="container">
    <div class="row fullwidth-photocontst">
      <div class="col-sm-12">
        <div class="section-img">
          <img src="{{ asset('uploads/article-blog/'.$article->article_photo) }}" alt="single Images" />
        </div>
        <div class="single-content-details">
          <h3 class="headding-title">{{$article->article_title}}</h3>
          <div class="topright"><i class="fa fa-camera"></i> <span>Photo Credit:</span> {{$article->photo_credit}}</div>
          <p class="des">{!!$article->article_description!!}</p>
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
          <style>
              .single-content-details ul li{
                  list-style-type: disc;
                  margin-left:45px;
              }
              .single-content-details ul li h2,
              .single-content-details ul li h3,
              .single-content-details ul li h4,
              .single-content-details ul li h5,
              .single-content-details ul li h1,
              .single-content-details ul li h6
              {
                  margin-bottom:0;
              }
          </style>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Photo Contests End Here -->
@endsection