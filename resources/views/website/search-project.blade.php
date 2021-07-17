<div class="row">
    @foreach ($project as $data)

    <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
        <div class="single-blog-slide">
            <div class="images">
                <a href="#"><img src="{{ asset('uploads/project-blog/'.$data->project_photo) }}" alt=""
                        style="height: 283px;" /></a>
                <div class="overley">
                    <ul>
                        <li>
                            <a href="{{url('/project-view',$data->id)}}"><i class="fa fa-eye"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="blog-informations">
                <div class="blog-details">
                    <h3><a href="#">{{$data->project_title}}</a></h3>
                    <p>
                        {!!Str::words($data->project_description,10)!!}
                    </p>
                    <div class="read-more">
                        <a href="{{url('/project-view',$data->id)}}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>