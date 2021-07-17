@php

$banner = App\Banner::orderBy('id', 'ASC')->take(1)->get();
// $news = App\NewsBlog::orderBy('id', 'desc')->get();
@endphp
@foreach ($banner as $data)
<!-- Slider Area Start Here-->
<div class="slider-area">
    <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            <img src="{{ asset('uploads/banner/'.$data->photo) }}" alt="" title="#slider-direction-1" />
            <img src="{{ asset('uploads/banner/'.$data->photo_two) }}" alt="" title="#slider-direction-2" />
            <img src="{{ asset('uploads/banner/'.$data->photo_three) }}" alt="" title="#slider-direction-3" />
            <img src="{{ asset('uploads/banner/'.$data->photo_four) }}" alt="" title="#slider-direction-4" />
            <img src="{{ asset('uploads/banner/'.$data->photo_five) }}" alt="" title="#slider-direction-5" />
            <img src="{{ asset('uploads/banner/'.$data->photo_six) }}" alt="" title="#slider-direction-6" />
            <img src="{{ asset('uploads/banner/'.$data->photo_seven) }}" alt="" title="#slider-direction-7" />
        </div>
        <!-- direction 2 -->
        <div id="slider-direction-1" class="slider-direction">
            <div class="slider-content t-cn s-tb slider-1">
                <div class="title-container s-tb-c">
                    <div class="row">
                        <div class="col-md-10 m-md-auto">
                            <h1 class="title1 uppercase">
                                <span> <a href="{{url('/article-view/1')}}">
                                        {{$data->title}}
                                    </a>
                                </span>
                            </h1>
                        </div>
                    </div>

                    {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/1')}}">Read More <i
                        class="fa fa-angle-right"></i></a>
                    <!--<a class="radius-0" href="{{route('banner_one',$data->id)}}">Read More <i-->
                    <!--            class="fa fa-angle-right"></i></a>-->
                    </li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <div id="slider-direction-2" class="slider-direction">
        <div class="slider-content t-cn s-tb slider-1">
            <div class="title-container s-tb-c">
                <div class="row">
                    <div class="col-md-10 m-md-auto">
                        <h1 class="title1 uppercase">
                            <span>
                                <a class="radius-0" href="{{url('/article-view/2')}}">
                                    {{$data->title_two}}
                                </a>
                            </span>
                        </h1>
                    </div>
                </div>

                {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/2')}}">Read More <i
                    class="fa fa-angle-right"></i></a>
                </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
<div id="slider-direction-3" class="slider-direction">
    <div class="slider-content t-cn s-tb slider-1">
        <div class="title-container s-tb-c">
            <div class="row">
                <div class="col-md-10 m-md-auto">
                    <h1 class="title1 uppercase">
                        <span>
                            <a class="radius-0" href="{{url('/article-view/3')}}">
                                {{$data->title_three}}
                            </a>
                        </span>
                    </h1>
                </div>
            </div>

            {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/3')}}">Read More <i
                class="fa fa-angle-right"></i></a>
            </li>
            </ul>
        </div> --}}
    </div>
</div>
</div>
<div id="slider-direction-4" class="slider-direction">
    <div class="slider-content t-cn s-tb slider-1">
        <div class="title-container s-tb-c">
            <div class="row">
                <div class="col-md-10 m-md-auto">
                    <h1 class="title1 uppercase">
                        <span>
                            <a class="radius-0" href="{{url('/article-view/4')}}">
                                {{$data->title_four}}
                            </a>
                        </span>
                    </h1>
                </div>
            </div>

            {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/4')}}">Read More <i
                class="fa fa-angle-right"></i></a>
            </li>
            </ul>
        </div> --}}
    </div>
</div>
</div>
<div id="slider-direction-5" class="slider-direction">
    <div class="slider-content t-cn s-tb slider-1">
        <div class="title-container s-tb-c">
            <div class="row">
                <div class="col-md-10 m-md-auto">
                    <h1 class="title1 uppercase">
                        <span>
                            <a class="radius-0" href="{{url('/article-view/5')}}">
                                {{$data->title_five}}
                            </a>
                        </span>
                    </h1>
                </div>
            </div>

            {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/5')}}">Read More <i
                class="fa fa-angle-right"></i></a>
            </li>
            </ul>
        </div> --}}
    </div>
</div>
</div>
<div id="slider-direction-6" class="slider-direction">
    <div class="slider-content t-cn s-tb slider-1">
        <div class="title-container s-tb-c">
            <div class="row">
                <div class="col-md-10 m-md-auto">
                    <h1 class="title1 uppercase">
                        <span>
                            <a class="radius-0" href="{{url('/article-view/6')}}">
                                {{$data->title_six}}
                            </a>
                        </span>
                    </h1>
                </div>
            </div>

            {{-- <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/6')}}">Read More <i
                class="fa fa-angle-right"></i></a>
            </li>
            </ul>
        </div> --}}
    </div>
</div>
</div>
<div id="slider-direction-7" class="slider-direction">
    <div class="slider-content t-cn s-tb slider-1">
        <div class="title-container s-tb-c">
            <div class="row">
                <div class="col-md-10 m-md-auto">
                    <h1 class="title1 uppercase">
                        <span>
                            <a class="radius-0" href="{{url('/article-view/7')}}">
                                {{$data->title_seven}}
                            </a>
                        </span>
                    </h1>
                </div>
            </div>
            {{-- 
                    <div class="slider-botton">
                        <ul>
                            <li class="acitve">
                                <a class="radius-0" href="{{url('/article-view/7')}}">Read More <i
                class="fa fa-angle-right"></i></a>
            </li>
            </ul>
        </div> --}}
    </div>
</div>
</div>
</div>
</div>
<!-- Slider Area End Here-->
@endforeach