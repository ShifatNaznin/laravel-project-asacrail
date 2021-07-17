@php

$banner = App\Banner::orderBy('id', 'ASC')->take(1)->get();
// $news = App\NewsBlog::orderBy('id', 'desc')->get();
@endphp
@foreach ($banner as $data)
<!-- Slider Area Start Here-->
<div class="slider-area">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="{{url('/article-view/1')}}">
                <img src="{{ asset('uploads/banner/'.$data->photo) }}" class="d-block w-100" alt="..."> </a>
               
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                           
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/1')}}">
                                                    {{$data->title}}
                                                </a>
                                            </h1>
<div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Ricardo Gomez Angel @unsplash.com</div>
                                    </div>
                                </div>
    
                        </div>
                    </div>
                </div>

            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_two) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                           
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/2')}}">
                                                    {{$data->title_two}}
                                                </a>
                                            </h1>
                                            <div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Benn McGuinness @unsplash.com</div>

                                    </div>
                                </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_three) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                           
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/3')}}">
                                                    {{$data->title_three}}
                                                </a>
                                            </h1>
                                            <div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Brandon Compagne @unsplash.com</div>

                                    </div>
                                </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_four) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                           
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/4')}}">
                                                    {{$data->title_four}}
                                                </a>
                                            </h1>
<div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Thomas Ashlock @unsplash.com</div>
                                    </div>
                                </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_five) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                           
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/6')}}">
                                                    {{$data->title_five}}
                                                </a>
                                            </h1>
                                            <div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Max McKinnon @unsplash.com</div>

                                    </div>
                                </div>
    
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_six) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">

                                        <h1><a href="{{url('/article-view/6')}}">
                                                    {{$data->title_six}}
                                                </a>
                                            </h1>
                                            <div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> Hugh Han @unsplash.com</div>
                                    </div>
                                </div>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/banner/'.$data->photo_seven) }}" class="d-block w-100" alt="...">
                <div class="overlay_banner">
                    <div class="carousel-caption">
                        <div class="container">
                                <div class="col-lg-12 text-center">
                                    <div class="banner_content">
                                        <h1><a href="{{url('/article-view/7')}}">
                                                    {{$data->title_seven}}
                                                </a>
                                            </h1>
                                            <div class="topright-two"><i class="fa fa-camera"></i> <span>Photo Credit:</span> NASA @unsplash.com</div>
                                    </div>
                                </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<!-- Slider Area End Here-->
@endforeach