<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Contactus;
use Carbon\Carbon;
use Session;

class ContactusController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        //$all=Contactus::where('conus_status',1)->orderBy('conus_id','DESC')->paginate(1);
        $all=Contactus::where('conus_status',1)->orderBy('conus_id','DESC')->get();
        return view('admin.contactus.all',compact('all'));
    }

    public function view($slug){
        $data=Contactus::where('conus_status',1)->where('conus_slug',$slug)->firstOrFail();
        return view('admin.contactus.view',compact('data'));
    }
}
