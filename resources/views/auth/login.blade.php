@extends('layouts.app')

@section('content')


<div class="container-fluid bg-login "
    style="background-image: ur({{asset('contents/admin')}}/assets/images/images/banner.jpg); margin:0;padding:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 login-card">
                <div class="row">
                  
                    <div class="col-md-5 detail-part" style="background-image:linear-gradient(rgba(11, 30, 57, 0.88), rgba(11, 30, 57, 0.88)), url({{asset('contents/admin')}}/assets/images/images/side-banner.jpg); border-top-left-radius: 18px;
                        border-bottom-left-radius: 20px; background-repeat: no-repeat; background-size: cover;">
                        <div class="info clearfix">
                            <div class="logo-2">
                                <a href="{{('/')}}">
                                    <img src="/contents/website/images/Logo.png" alt="logo">
                                </a>
                            </div>
                            <h3 style="color: #ffffff; font-size: 23px; font-family: 'Roboto';">Welcome to ASAC</h3>
                            <div class="social-list">
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-7 logn-part">
                        <div class="row">
                            <div class="col-lg-10 col-md-12 mx-auto">
                                {{-- <div class="logo-cover">
                                    <img src="{{asset('contents/admin')}}/assets/images/images/final_logo.png" alt="">
                            </div> --}}
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-cover text-center">
                                    <h6 style="font-size: 25px; font-family: 'Roboto';">Login Here</h6>
                                    {{-- <input placeholder="Enter Username" type="text" class="form-control"> --}}
                                    <input placeholder="Email Address" id="email" type="email"
                                        class="form-control input-text @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- <input Placeholder="Enter PAssword" type="password" class="form-control"> --}}
                                    <input placeholder="Enter Password" id="password" type="password"
                                        class="form-control input-text @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="row form-footer">
                                        {{-- <div class="col-md-6 forget-paswd"> --}}
                                        {{-- <a href="">Forget Password ?</a> --}}
                                        {{-- </div> --}}
                                        <div class="col-md-12 button-div">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection