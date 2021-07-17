<!-- Single Photo Contest Start Here -->
<div class="home-single-contest pt-90 pb-90 white-bg">
    <div class="home-single single-photo-contest-area inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-content">
                        <h2 style="font-style: italic; color: #d32f2f;">
                            News
                        </h2>
                        <ul class="home-single-slide">
                            @php

                            $news = App\NewsBlog::orderBy('id', 'ASC')->take(6)->get();
                            // $news = App\NewsBlog::orderBy('id', 'desc')->get();
                            @endphp
                            @foreach ($news as $data)
                            <li>
                                <div class="item">
                                    <div class="about-image">
                                        <a href="{{url('/news-view',$data->id)}}"><img
                                                src="{{ asset('uploads/news-blog/'.$data->blog_photo) }}" alt=""
                                                style="height: 213px;" /></a>
                                    </div>
                                    <div class="about-text">
                                        <h4>{!!$data->created_at->format('d M,Y a')!!}</h4>
                                        <h3>
                                            <a href="{{url('/news-view',$data->id)}}">{{$data->blog_title}}
                                            </a>
                                        </h3>
                                        <p>
                                            {!!Str::words($data->blog_description,20)!!}
                                        </p>
                                        <div class="read-more">
                                            <a href="{{url('/news-view',$data->id)}}" style="color: #d32f2f;">Read
                                                More..</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>

            <a class="radius-0" href="{{url('/news')}}">See All News <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div>
<!-- Single Photo Contest End Here -->