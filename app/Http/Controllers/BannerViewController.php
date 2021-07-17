<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Banner;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class BannerViewController extends Controller
{
    public function banner_one(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-one', compact('value'));
    }
    public function banner_two(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-two', compact('value'));
    }
    public function banner_three(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-three', compact('value'));
    }
    public function banner_four(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-four', compact('value'));
    }
    public function banner_five(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-five', compact('value'));
    }
    public function banner_six(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-six', compact('value'));
    }
    public function banner_seven(Request $request, $id)
    {  $value=Banner::find($id);
       return view('website.banner-seven', compact('value'));
    }
}