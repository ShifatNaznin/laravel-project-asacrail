@extends('layouts.website')

@section('content')
<!-- About Photo Contests Start Here -->
<div class="home-about-photo-contest-area pt-100 pb-100">
  <div class="container">
    <div class="row fullwidth-photocontst">
      <div class="col-sm-12">
        <div class="section-img">
          <img src="{{ asset('uploads/sectors/'.$value->photo) }}" alt="single Images" />
        </div>
        <div class="single-content-details">
          <h3 class="headding-title">{{$value->title}}</h3>
          <div class="topright"><i class="fa fa-camera"></i> <span>Photo Credit:</span> {{$value->photo_credit}}</div>
          <p class="des">{!!$value->description!!}</p>
    
        </div>
      </div>
    </div>
  </div>
</div>
<!-- About Photo Contests End Here -->
@endsection