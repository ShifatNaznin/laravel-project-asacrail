<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Logo;
use App\Sectors;
use App\AboutUs;
use App\Contact;
use App\Career;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class WebsiteNewController extends Controller
{
    public function index()
    {
       return view('website.index');
    }
    public function footer_left()
    {
       return view('website.index');
    }
    public function footer_middle()
    {
       return view('website.index');
    }
    public function footer_right()
    {
       return view('website.index');
    }
   //  public function sector_link(Request $request, $id)
   //  {
   //      $value=Sectors::find($id);
   //     return view('website.sectors-view', compact('value'));
     
   //  }
   //  public function service_link(Request $request, $id)
   //  {
   //      $value=Sectors::find($id);
   //     return view('website.sectors-view', compact('value'));
     
   //  }

    public function contactus()
    {
       return view('website.contactus');
    }
    public function store(Request $request) {

      $add=new Contact;
      $add->name=$request->name;
      $add->email=$request->email;
      $add->phone=$request->phone;
      $add->subject=$request->subject;
      $add->message=$request->message;


      $add->save();

      if($add) {
          
            return redirect('contactus');
      }

  }
    public function career()
    {
       return view('website.career');
    }
    public function career_store(Request $request) {
    
      $add=new Career;
      $add->name=$request->name;
      $add->email=$request->email;
      $add->phone=$request->phone;
      $add->subject=$request->subject;
      $add->message=$request->message;
       
      if ($request->file('file')) {
        
         $file=$request->file('file');
         $filename=time(). '-'.'.'. $file->getClientOriginalExtension();
        
         $request->file->move('files/',$filename);
         $add->file=$filename;
     }
     
     $add->save();
// dd($request);
     if($add) {
         
           return redirect('career');
     }

  }

  public function about_head()
  {

   //  $value =AboutUs::orderBy('id', 'DESC')->take(1)->get();


     return view('website.aboutus');
  }
  public function careerlink()
  {

   //  $value =AboutUs::orderBy('id', 'DESC')->take(1)->get();


     return view('website.career');
  }
  public function ourteam()
  {

   //  $value =AboutUs::orderBy('id', 'DESC')->take(1)->get();


     return view('website.our-team');
  }
  public function opportunities()
  {

   //  $value =AboutUs::orderBy('id', 'DESC')->take(1)->get();


     return view('website.current-opportunities');
  }
}