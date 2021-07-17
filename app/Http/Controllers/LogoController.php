<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Logo;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class LogoController extends Controller
{
    public function index(){
        $value=Logo::orderBy('id','DESC')->get();
        return view('admin.logo.index',compact('value'));
    }

    public function add() {
        return view('admin.logo.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
            'title'=>'required',
            'logo'=>'required',
            'icon'=>'required',

            ]);
        $add=new Logo;
        $add->title=$request->title;


        if ($request->hasFile('logo')) {
            $file=$request->file('logo');
            $image_name=str_replace(' ', '_', substr($request->title, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(126, 70, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(126, 70);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/logo/'. $image_name));
            $add->logo=$image_name;
        }
        
        if ($request->hasFile('icon')) {
            $file=$request->file('icon');
            $image_name=str_replace(' ', '_', substr($request->title, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(50, 50, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(50, 50);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/logo/'. $image_name));
            $add->icon=$image_name;
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
        $data=Logo::find($id);
        return view('admin.logo.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=Logo::find($id);
        return view('admin.logo.update', compact('data'));
    }

    public function update(Request $request) {
        $add=Logo::find($request->id);
        $add->title=$request->title;



        if ($request->hasFile('logo')) {
            if(Storage::disk('public')->exists('uploads/logo/'.$add->logo)) Storage::disk('public')->delete('uploads/logo/'.$add->logo);
            $file=$request->file('logo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(126, 70, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(126, 70);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/logo/'. $image_name));
            $add->logo=$image_name;
        }
        
        if ($request->hasFile('icon')) {
            if(Storage::disk('public')->exists('uploads/logo/'.$add->icon)) Storage::disk('public')->delete('uploads/logo/'.$add->icon);
            $file=$request->file('icon');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(50, 50, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(50, 50);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/logo/'. $image_name));
            $add->icon=$image_name;
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
        $delete=Logo::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}