@extends('layouts.website')

@section('content')

<div class="inner-page-header"
  style="background-image: linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)),url({{asset('contents/website')}}/images/banner/2.jpg);">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-title">
          <h2>Our Team </h2>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="header-page-locator">
          <ul>
            <li><a href="{{'/'}}">Home / </a>Our Team </li>
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
        $value=App\CareerLink::where('id',2)->get()
        @endphp
        @foreach ($value as $data)
        <h3>Team Members</h3>
        <p>{!!$data->heading!!}</p>
        @endforeach
        <div class="accordion" id="accordion">
          <div class="row">
            @php
            $i=1;
            $value=App\OurTeam::Orderby('id','ASC')->get()
            @endphp
            @foreach ($value as $data)


            <div class="col-6">
              <div class="card">
                <div class="card-header" id="headingOne{{$i}}">
                  <h5 class="card-title">
                    <button class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne{{$i}}"
                      aria-expanded="true" aria-controls="collapseOne{{$i}}">
                      <div class="checkbox">
                        <label>
                          <div class="row">

                            <div class="col-3">
                              <img src="{{ asset('uploads/our-team/'.$data->photo) }}" alt=""
                                style="height: auto; width:100%;">
                            </div>
                            <div class="col-9">
                              <h2 style="font-size: 18px; margin: 0 0 11px;">{{$data->name}}</h2>
                              <p style="font-size: 15px; font-weight:normal;">{{$data->position}}</p>

                            </div>
                          </div>

                        </label>
                      </div>
                    </button>
                  </h5>
                </div>
                <div id="collapseOne{{$i}}" class="collapse" aria-labelledby="headingOne{{$i}}"
                  data-parent="#accordion">
                  <div class="card-body">
                    {!!$data->summary!!}
                  </div>
                </div>
              </div>
            </div>

            @php
            $i++;
            @endphp
            @endforeach


          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection