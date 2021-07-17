<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- meta tag -->
  <meta charset="utf-8" />
  <meta name="description" content="{{ csrf_token() }}" />
  @php
  $value = App\Logo::orderBy('id', 'desc')->take(1)->get();
  @endphp
  @foreach ($value as $data)
  <title>{{$data->title}}</title>
  @endforeach
  <!-- responsive tag -->
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- favicon -->
  <link rel="apple-touch-icon" href="{{asset('contents/website')}}/apple-touch-icon.html" />
  @php
  $value = App\Logo::orderBy('id', 'desc')->take(1)->get();
  @endphp
  @foreach ($value as $data)
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('uploads/logo/'.$data->icon)}}" />
  @endforeach
  <!-- bootstrap v3.3.6 css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/bootstrap.min.css" />
  <!-- font-awesome css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/font-awesome.min.css" />
  <!-- jquery-ui.min css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/jquery-ui.min.css" />
  <!-- meanmenu css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/meanmenu.min.css" />
  <!-- owl.carousel css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/owl.carousel.css" />
  <!-- nivo slider CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/inc/custom-slider/css/nivo-slider.css" />
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/inc/custom-slider/css/preview.css" />
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/inc/custom-slider/css/default.css" /> --}}
  <!-- style css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/style.css" />
  @stack('css')
  <!-- responsive css -->
  <link rel="stylesheet" type="text/css" href="{{asset('contents/website')}}/css/responsive.css" />
  <!-- modernizr css -->
  <script src="{{asset('contents/website')}}/js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
  <!--Preview area start here-->

  <!--Header area start here-->
  <header>
    <div class="header-middle-area" id="sticky">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-2 col-sm-12">
            @php
            $value = App\Logo::orderBy('id', 'desc')->take(1)->get();
            @endphp
            @foreach ($value as $data)
            <div class="logo-area">
              <a href="{{url('/')}}"><img src="{{asset('uploads/logo/'.$data->logo)}}" alt="logo" /></a>
            </div>
            @endforeach
          </div>
          <div class="col-lg-6 col-md-5 col-sm-12" style="border-right: 1px solid #b9b9b9;">
            <div class="main-menu">
              <nav>
                <ul>
                  <li class="active">
                    <a href="{{'/'}}">Home</a>
                  </li>
                  <li>
                    <a href="{{url('/aboutus')}}">Who We Are</a>
                    <ul>
                      <li><a href="{{url('/aboutus-view-one')}}">About Us</a></li>
                      <li><a href="{{url('/aboutus-view-two')}}">Quality Management System (QMS)</a></li>

                    </ul>
                  </li>
                  {{-- <li>
                    <a href="{{url('/aboutus')}}">Who We Are</a>
                    <ul>
                      <li><a href="{{url('/aboutus-view/1')}}">About Us</a></li>
                      <li><a href="{{url('/aboutus-view/2')}}">Quality Management System (QMS)</a></li>

                    </ul>
                  </li> --}}
                  <li>
                    <a href="{{url('/sector')}}">Sectors</a>
                    {{-- @foreach ($value as $data) --}}
                    <ul>
                      <li><a href="{{url('/sectors-view/1')}}">Railway & Transportation</a></li>
                      <li><a href="{{url('/sectors-view/2')}}">Defence</a></li>
                      <li><a href="{{url('/sectors-view/3')}}">Space</a></li>
                      <li><a href="{{url('/sectors-view/4')}}">Aviation</a></li>

                      <li><a href="{{url('/sectors-view/5')}}">Mining, Oil & Gas</a></li>
                    </ul>
                    {{-- @endforeach --}}

                  </li>
                  <li>
                    <a href="{{url('/article')}}">Services</a>
                    <ul>
                      {{-- @foreach ($article as $data) --}}
                      <li><a href="{{url('/article-view/1')}}">Systems Engineering</a></li>
                      <li><a href="{{url('/article-view/2')}}">System Safety Assurance</a></li>
                      <li><a href="{{url('/article-view/3')}}">Quality Assurance</a></li>
                      <li><a href="{{url('/article-view/4')}}">Risk Management</a></li>
                      <li><a href="{{url('/article-view/5')}}">Railway Signalling</a></li>
                      <li><a href="{{url('/article-view/6')}}">Project Management</a></li>
                      <li><a href="{{url('/article-view/7')}}">Geospatial Intelligence</a></li>
                      {{-- @endforeach --}}
                    </ul>
                  </li>
                  <li>
                    <a href="{{url('/project')}}">Projects</a>

                  </li>

                </ul>
              </nav>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="main-menu">
              <nav>
                <ul>
                  {{-- <li class="active">
                    <a data-toggle="modal" data-target="#exampleModalCenter" href="#">News</a>
                  </li> --}}
                    {{-- <li class="active">
                    <a href="{{url('/news')}}">News</a>
                  </li> --}}
                  <li>
                    <a href="{{url('/career')}}">Career</a>
                    <ul>
                      <li><a href="{{url('/career')}}">Join Our Team</a></li>
                     
                      <li><a href="{{route('ourteam')}}">Meet Our Team</a></li>
                      <li><a href="{{route('opportunities')}}">Current Opportunities</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{url('/contactus')}}">Contact Us</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>



        </div>
      </div>
    </div>
    <!-- Slide Menu Section Start Here -->
    <div class="mobile-menu-area">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="mobile-menu">

              <nav id="dropdown">
                @php
                $value = App\Logo::orderBy('id', 'desc')->take(1)->get();
                @endphp
                @foreach ($value as $data)
                <div class="logo-area">
                  <a href="{{url('/')}}"><img src="{{asset('uploads/logo/'.$data->logo)}}" alt="logo" /></a>
                </div>
                @endforeach
                <ul>
                  <li class="active">
                    <a href="{{'/'}}">Home</a>
                  </li>
                  {{-- <li>
                    <a href="{{url('/aboutus')}}">Who We Are</a>
                    <ul>
                      <li><a href="{{url('/aboutus-view/1')}}">About Us</a></li>
                      <li><a href="{{url('/aboutus-view/2')}}">Quality Management System (QMS)</a></li>

                    </ul>
                  </li> --}}
                  <li>
                    <a href="{{url('/aboutus')}}">Who We Are</a>
                    <ul>
                      <li><a href="{{url('/aboutus-view-one')}}">About Us</a></li>
                      <li><a href="{{url('/aboutus-view-two')}}">Quality Management System (QMS)</a></li>

                    </ul>
                  </li>
                  <li>
                    <a href="{{url('/sector')}}">Sectors</a>
                    <ul>

                      <ul>
                        <li><a href="{{url('/sectors-view/1')}}">Railway & Transportation</a></li>
                        <li><a href="{{url('/sectors-view/2')}}">Defence</a></li>
                        <li><a href="{{url('/sectors-view/3')}}">Space</a></li>
                        <li><a href="{{url('/sectors-view/4')}}">Aviation</a></li>

                        <li><a href="{{url('/sectors-view/5')}}">Mining, Oil & Gas</a></li>
                      </ul>

                    </ul>

                  </li>
                  <li>
                    <a href="{{url('/article')}}">Services</a>
                    <ul>
                      <li><a href="{{url('/article-view/1')}}">Systems Engineering</a></li>
                      <li><a href="{{url('/article-view/2')}}">System Safety Assurance</a></li>

                      <li><a href="{{url('/article-view/3')}}">Quality Assurance</a></li>
                      <li><a href="{{url('/article-view/4')}}">Risk Management</a></li>
                      <li><a href="{{url('/article-view/5')}}">Railway Signalling</a></li>
                      <li><a href="{{url('/article-view/6')}}">Project Management</a></li>
                      <li><a href="{{url('/article-view/7')}}">Geospatial Intelligence</a></li>
                    </ul>
                  </li>
                  {{-- <li>
                    <a href="{{url('/career')}}">Career</a>
                    <ul>
                      <li><a href="{{url('/career')}}">Join Our Team</a></li>
                     
                    </ul>
                  </li> --}}
                  <li>
                    <a href="{{url('/project')}}">Projects</a>

                  </li>

                  {{-- <li class="active">
                    <a data-toggle="modal" data-target="#exampleModalCenter" href="#">News</a>
                  </li> --}}
                       {{-- <li class="active">
                    <a href="{{url('/news')}}">News</a>
                  </li> --}}
                  <li>
                    <a href="{{url('/career')}}">Career</a>
                    <ul>
                      <li><a href="{{url('/career')}}">Join Our Team</a></li>
                     
                    <li><a href="{{route('ourteam')}}">Maeet Our Team</a></li>
                    <li><a href="{{route('opportunities')}}">Current Opportunities</a></li>
                    </ul>
                  </li>
                  <li class="active">
                    <a href="{{url('/contactus')}}">Contact Us</a>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">This Page is Under Construction</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

  @yield('content')

  <!-- Footer Area Section Start Here -->
  <footer>
    <div class="footer-top-area pt-100 pb-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12">
            @php
            $value = App\FooterLeft::orderBy('id', 'desc')->take(1)->get();
            @endphp
            @foreach ($value as $data)
            <div class="single-footer footer-one">
              <h3>Who We Are</h3>
              <p>
                {!!$data->heading!!}

              </p>
              <div class="footer-social-media-area">
                <nav>
                  <ul>
                      <li>
                      <a href="{{$data->instagram_link}}"><i class="fa fa-linkedin"></i></a>
                    </li>
                 
                    <li>
                      <a href="{{$data->twitter_link}}"><i class="fa fa-twitter"></i></a>
                    </li>
                       <li>
                      <a href="{{$data->facebook_link}}"><i class="fa fa-facebook"></i></a>
                    </li>
                    {{-- <li>
                      <a href="{{$data->pinterest_link}}"><i class="fa fa-pinterest-p"></i></a>
                    </li> --}}
                    {{-- <li>
                      <a href="{{asset('contents/website')}}/#"><i class="fa fa-rss"></i></a>
                    </li>
                    <li>
                      <a href="{{asset('contents/website')}}/#"><i class="fa fa-instagram"></i></a>
                    </li> --}}
                  </ul>
                </nav>
              </div>
            </div>
            @endforeach
          </div>

          {{-- <div class="col-lg-6 col-md-3 col-sm-6">
            <div class="row"> --}}
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-footer footer-four margin-0">
                  <h3>What We Do</h3>
                  <nav>
                    @php
                    $value = App\FooterMiddle::orderBy('id', 'ASC')->take(10)->get();
                    @endphp
                    @foreach ($value as $data)
    
                    <ul>
                      @if ($data->id == 1)
                      <li>
    
                        <a href="{{url('/sector')}}">
                          {{$data->link}}
                        </a>
                      </li>
                      @endif
                      @if ($data->id == 2)
                      <li>
    
                        <a href="{{url('/article')}}">
                          {{$data->link}}
                        </a>
                      </li>
                      @endif
                      @if ($data->id == 3)
                      <li>
    
                        <a href="{{url('/project')}}">
                          {{$data->link}}
                        </a>
                      </li>
                      @endif
                      @if ($data->id == 4)
                      <li>
    
                        <a data-toggle="modal" data-target="#exampleModalCenter" href="#">
                          {{$data->link}}
                        </a>
                      </li>
                      @endif
                      @if ($data->id == 5)
                      <li>
    
                        <a href="#">
                          {{$data->link}}
                        </a>
                      </li>
                      @endif
                    </ul>
                    @endforeach
                  </nav>
                </div>
              </div>
    
    
              <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="single-footer footer-four footer-last">
                  <h3>Contact</h3>
                  <nav>
                    @php
                    $value = App\FooterRight::orderBy('id', 'desc')->take(1)->get();
                    @endphp
                    @foreach ($value as $data)
                    <ul>
                      <li>
                        <i class="fa fa-paper-plane-o"></i>{{$data->address}}
    
                      </li>
                      <li>
                        <i class="fa fa-phone"></i>
                        <a href="#">{{$data->phone}}</a>
                      </li>
                      <li>
                        <i class="fa fa-envelope-o"></i>
                        <a href="#">{{$data->email}}</a>
                      </li>
                      <!-- <li><i class="fa fa-fax"></i> Fax: (123) 4589761</li> -->
                    </ul>
                    @endforeach
                  </nav>
                </div>
              </div>
            {{-- </div>
          </div> --}}
       
        </div>
      </div>
    </div>
    <div class="footer-bottom-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="footer-bottom">
              <p>Copyrights &copy; 2020 ASAC || Developed by : <a href="http://hsblco.com/"><span
                    style="color: red;">HSBLCO</span></a> </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Area Section End Here -->

  <!-- jquery latest version -->
  <script src="{{asset('contents/website')}}/js/vendor/jquery-1.12.0.min.js"></script>
  <!-- bootstrap js -->
  <script src="{{asset('contents/website')}}/js/bootstrap.min.js"></script>
  <!-- owl.carousel js -->
  <script src="{{asset('contents/website')}}/js/owl.carousel.min.js"></script>
  <!-- owl.carousel js -->
  <script src="{{asset('contents/website')}}/js/owl.carousel.min.js"></script>
  <!-- meanmenu js -->
  <script src="{{asset('contents/website')}}/js/jquery.meanmenu.js"></script>
  <!-- jquery-ui js -->
  <script src="{{asset('contents/website')}}/js/jquery-ui.min.js"></script>
  <!-- wow js -->
  <script src="{{asset('contents/website')}}/js/wow.min.js"></script>
  <!-- jquery.counterup js -->
  <script src="{{asset('contents/website')}}/js/jquery.counterup.min.js"></script>
  <script src="{{asset('contents/website')}}/js/waypoints.min.js"></script>
  <!-- imagesloaded.pkgd.min js -->
  <script src="{{asset('contents/website')}}/js/imagesloaded.pkgd.min.js"></script>
  <!-- magnific popup -->
  <script src="{{asset('contents/website')}}/js/jquery.magnific-popup.min.js"></script>
  <!-- magnific popup -->
  <script src="{{asset('contents/website')}}/js/jquery.magnific-popup.min.js"></script>
  <!-- jQuery MixedIT Up -->
  <script src="{{asset('contents/website')}}/js/jquery.mixitup.min.js" type="text/javascript"></script>
  <!-- Counter Down js -->
  <script src="{{asset('contents/website')}}/js/simplyCountdown.min.js"></script>
  <!-- Nivo slider js -->
  <script src="{{asset('contents/website')}}/inc/custom-slider/js/jquery.nivo.slider.js"></script>
  <script src="{{asset('contents/website')}}/inc/custom-slider/home.js"></script>
  <!-- plugins js -->
  <script src="{{asset('contents/website')}}/js/plugins.js"></script>
  <!-- jquery weave effects -->
  <script src="{{asset('contents/website')}}/js/waves.js"></script>
  <!-- main js -->
  <script src="{{asset('contents/website')}}/js/main.js"></script>
  @stack('js')
</body>

</html>