<!-- Single Photo Contest Start Here -->
<div class="home-single-contest pt-90 gray-bg pb-90 white-bg">
    <div class="home-single single-photo-contest-area inner" style="background: #f5f5f5;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="about-content">
                        <h2 style="font-style: italic; color: #d32f2f;">
                            Sectors
                        </h2>
                        <ul class="home-single-slide">
                            @php

                            $value = App\Sectors::orderBy('id', 'ASC')->get();
                            @endphp
                            @foreach ($value as $data)
                            <li>
                                <div class="item">
                                    <div class="about-image">
                                        <a href="{{url('/sectors-view',$data->id)}}"> <img
                                                src="{{ asset('uploads/sectors/'.$data->photo) }}" alt=""
                                                style="height: 213px;" /></a>

                                    </div>
                                    <div class="about-text">
                                        {{-- <h4>{!!$data->created_at->format('d M,Y a')!!}</h4> --}}
                                        <h3>
                                            <a href="{{url('/sectors-view',$data->id)}}">{{$data->title}}
                                            </a>
                                        </h3>
                                        <p>
                                            {!!Str::words($data->description,20)!!}
                                        </p>
                                        <div class="read-more">
                                            <a href="{{url('/sectors-view',$data->id)}}" style="color: #d32f2f;">Read
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

            <a class="radius-0" href="{{url('/sector')}}">See All Sectors <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</div>
<!-- Single Photo Contest End Here -->