@extends('layouts.website')

@section('content')
<!-- Inner Page Header serction start here -->
<div class="inner-page-header"
  style="background-image: linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)),url({{asset('contents/website')}}/images/banner/2.jpg);">
<div class="container">
  <div class="row align-items-center">
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="header-page-title">
        <h2>Projects </h2>
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12">
      <div class="header-page-locator">
        <ul>
          <li><a href="#">Home / </a>Projects </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Inner Page Header serction end here -->


<!-- Blog Page Start Here -->
<div class="blog-page-area pb-100">
  <div class="container">
      @php
            $head =App\ProjectHeading::orderBy('id', 'DESC')->take(1)->get();
            @endphp

            @foreach ($head as $data)
            <p>
              {!!Str::words($data->description)!!}
            </p>
            @endforeach
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 mb-sm-30">
        <div class="row">

          <div class="col-12">

            
            <div id="search_result">


              @php
              $project =App\ProjectBlog::orderBy('id', 'ASC')->take(10)->get();
              @endphp
              <div class="row">
                @foreach ($project as $data)
                <div class="col-lg-6 col-md-6 col-sm-12 mb-30">
                  <div class="single-blog-slide">
                    <div class="images">
                      <a href="{{url('/project-view',$data->id)}}"><img
                          src="{{ asset('uploads/project-blog/'.$data->project_photo) }}" alt=""
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
                        <h3><a href="{{url('/project-view',$data->id)}}">{{$data->project_title}}</a></h3>
                        <p>
                          {!!strip_tags(Str::words($data->project_description,30))!!}
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

            </div>
          </div>

        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <form style="" id="search_box" action="{{ route('search_project') }}" method="Post">
          @csrf
          <div class=" sidebar-area">
            <div class="single-sidebar">
              <h2>SEARCH</h2>
              <div class="sidebar-search"><input name="search_box" type="text" placeholder="Search Here..." /><span>
                  <button type="submit"><i id="search-btn" class="fa fa-search"></i></button></span>
              </div>
            </div>
          </div>
        </form>

        @push('js')
        <script src="{{asset('')}}js/axios.js"></script>
        <script>
          $(document).ready(function(){
    
              function search_init() {
                  $('#search_box').off().keyup(debounce(function (e) {
                      e.preventDefault;
                      e.stopPropagation();
                      e.stopImmediatePropagation;
                      var formdata = new FormData(this);
                      // formdata.append('search',121212);
    
                      axios.post('/project-immediate', formdata)
                      .then(function (response) {
                          console.log(response);
                          $('#search_result').html(response.data);
                      })
                      .catch(function (error) {
                          console.log('error');
                      })
                      .then(function () {
                          // always executed
                      }); 
    
                      // $.ajax({
                      //     url: window.location.origin+'/admin/vops/search',
                      //     type: 'GET',
                      //     dataType: 'HTML',
                      //     data: formdata,
                      //     cache: false,
                      //     contentType: false,
                      //     processData: false,
                      //     success: function(response){
                      //         console.log(response,window.location.origin+'/admin/vops/search');
                      //         // $('#product_category').html(response);
                      //     }
                      // });
    
                  },500));
                  return false;
              }
              search_init();
              function debounce(fn, delay) {
                  var timer = null;
                  return function () {
                      var context = this,
                          args = arguments;
                      clearTimeout(timer);
                      timer = setTimeout(function () {
                          fn.apply(context, args);
                      }, delay);
                  };
              };
    
              // $("#btnPrint").on("click", function (e) {
              //     e.preventDefault();
              //     var printWindow = window.open(location.origin+'/admin/vops/print-invoice','popUpWindow','height=800,width=768,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');
              //     printWindow.print();
              // });
    
          });
        </script>
        @endpush

      </div>
    </div>
    {{-- <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <div class="pagination-area">
          <ul>
            <li>
              <a href="#"><i class="fa fa-angle-left"></i></a>
            </li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li>
              <a href="#"><i class="fa fa-angle-right"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div> --}}
  </div>
</div>
<!-- Blog Page End Here -->
@endsection