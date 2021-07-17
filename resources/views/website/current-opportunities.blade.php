@extends('layouts.website')

@section('content')

<div class="inner-page-header"
  style="background-image: linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)),url({{asset('contents/website')}}/images/banner/2.jpg);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-title">
          <h2>Current opportunities </h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-locator">
          <ul>
            <li><a href="{{'/'}}">Home / </a>Current opportunities </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="shipping-area section pt-90 pb-100">
  <div class="container">

    <div style="clear: both"></div>
    <div class="row">
      <div class="col-lg-12">
        @php
        $value=App\CareerLink::where('id',3)->get()
        @endphp
        @foreach ($value as $data)
        <h3>Current opportunities</h3>
        <p>{!!$data->heading!!}</p>
        @endforeach
      
      </div>
    </div>
  </div>
</div>

@endsection