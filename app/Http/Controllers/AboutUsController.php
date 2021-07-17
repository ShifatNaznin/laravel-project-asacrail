<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\AboutUs;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class AboutUsController extends Controller
{
    public function index(){
        $value=AboutUs::orderBy('id','DESC')->get();
        return view('admin.about.index',compact('value'));
        
        // return view('admin.about.index');
    }

    public function add() {
        return view('admin.about.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
            'title'=>'required',
            'description'=>'required',
            'photo'=>'required',
            
            ]);
        $add=new AboutUs;
        $add->title=$request->title;
        $add->description=$request->description;
        $add->photo_credit=$request->photo_credit;
        
        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/aboutus/'. $image_name));
            $add->photo=$image_name;
        }

        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $data=AboutUs::find($id);
        return view('admin.about.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=AboutUs::find($id);
        return view('admin.about.update', compact('data'));
    }

    public function update(Request $request) {
        $add=AboutUs::find($request->id);
        $add->title=$request->title;
        $add->description=$request->description;
        $add->photo_credit=$request->photo_credit;

        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/aboutus/'.$add->photo)) Storage::disk('public')->delete('uploads/aboutus/'.$add->photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/aboutus/'. $image_name));
            $add->photo=$image_name;
        }


        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=AboutUs::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}