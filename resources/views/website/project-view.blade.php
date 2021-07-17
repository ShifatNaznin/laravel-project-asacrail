@extends('layouts.website')

@section('content')
<!-- About Photo Contests Start Here -->
<div class="home-about-photo-contest-area pt-100 pb-100">
  <div class="container">
    <div class="row fullwidth-photocontst">
      <div class="col-sm-12">
        <div class="section-img">
          <img src="{{ asset('uploads/project-blog/'.$project->project_photo) }}" alt="single Images" />
        </div>
        <div class="single-content-details">
          <h3 class="headding-title">{{$project->project_title}}</h3>
          <div class="topright"><i class="fa fa-camera"></i> <span>Photo Credit:</span> {{$project->photo_credit}}</div>
          <p class="des">{!!$project->project_description!!}</p>
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