<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar">
            <a href="{{url('admin')}}" class="logo logo-large"><img
                    src="{{asset('contents/admin')}}/assets/images/logo.png" class="img-fluid" alt="logo"></a>
            <a href="{{url('admin')}}" class="logo logo-small"><img
                    src="{{asset('contents/admin')}}/assets/images/icon.png" class="img-fluid" alt="logo"></a>
        </div>
        <div class="logobar">
            <a href="{{url('admin')}}" class="logo logo-large"><img src="/uploads/user/{{Auth::user()->pic}}"
                    class="img-fluid" alt="logo" style="width: 50px; border-radius:2px;"></a>

            <h5 style="color:#ffffff; margin-top:10px; ">{{Auth::user()->name}}</h5>
            <h5 style="color:#ffffff;">{{Auth::user()->email}}</h5>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <div class="scroll-side">
                <ul class="vertical-menu">
                    <li>
                        <a href="{{url('admin')}}">
                            <img src="{{asset('contents/admin')}}/assets/images/svg-icon/dashboard.svg"
                                class="img-fluid" alt="dashboard"><span>Dashboard</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('contents/admin')}}/assets/images/svg-icon/settings.svg" class="img-fluid"
                                alt="layouts"><span>Admin Management</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">
                            {{-- @if(Auth::user()->role_id==1) --}}
                            <li>
                                <a href="{{url('admin/user')}}">User</a>
                            </li>
                            {{-- @endif --}}
                        </ul>
                    </li>

                    <li>
                        <a href="javaScript:void();">
                            <img src="{{asset('contents/admin')}}/assets/images/svg-icon/components.svg"
                                class="img-fluid" alt="layouts"><span>Website Management</span><i
                                class="feather icon-chevron-right pull-right"></i>
                        </a>
                        <ul class="vertical-submenu">

                            <li><a href="{{route('logo')}}">Logo</a></li>
                            <li><a href="{{url('admin/banner')}}">Banner</a></li>
                            {{-- <li><a href="{{route('footer_left')}}">Social Link</a></li> --}}
                            <li><a href="#">Who We Are</a>
                                <ul class="vertical-submenu">

                                    <li><a href="{{route('about_head')}}">Description</a></li>
                                    <li><a href="{{route('about_us')}}">All</a></li>
                                   

                                </ul>
                            </li>
                            <li><a href="{{route('sectors')}}">Sectors</a></li>
                            <li><a href="{{url('admin/article-blog')}}">Services</a></li>

                            <li><a href="#">Projects</a>
                                <ul class="vertical-submenu">

                                    <li><a href="{{route('project_head')}}">Description</a></li>
                                    <li><a href="{{url('admin/project-blog')}}">All Project</a></li>
                                   

                                </ul>
                            </li>
                            {{-- <li><a href="{{url('admin/news-blog')}}">News</a></li> --}}
                            <li><a href="#">Footer</a>

                                <ul class="vertical-submenu">

                                    <li><a href="{{route('footer_left')}}">Who We Are</a></li>
                                    <li><a href="{{route('footer_middle')}}">What We Do</a></li>
                                    <li><a href="{{route('footer_right')}}">Contact</a></li>

                                </ul>

                            </li>
                        
                            <li><a href="#">Career</a>
                                <ul class="vertical-submenu">

                                    <li><a href="{{route('career')}}">Career Message</a></li>
                                    <li><a href="{{route('career_link')}}">Heading</a></li>
                                    <li><a href="{{route('our_team')}}">Our Team</a></li>
                                    

                                </ul>
                            </li>
                            <li><a href="{{route('contact_us')}}">Contact</a></li>
                        </ul>
                    </li>

                    {{-- @if(Auth::user()->role_id==1)
                <li>
                    <a href="{{url('admin/recycle')}}">
                    <img src="{{asset('contents/admin')}}/assets/images/svg-icon/ecommerce.svg" class="img-fluid"
                        alt="banner"><span>Recycle Bin</span></i>
                    </a>
                    </li>
                    @endif --}}
                    <li>
                        <a href="{{url('/')}}" target="_blank">
                            <img src="{{asset('contents/admin')}}/assets/images/svg-icon/widgets.svg" class="img-fluid"
                                alt="banner"><span>Live Site</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <img src="{{asset('contents/admin')}}/assets/images/svg-icon/logout.svg" class="img-fluid"
                                alt="logout"><span>Logout</span></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>