<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\MiddleBanner;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class MiddleBannerController extends Controller
{
    public function index() {
        return view('admin.middle-blog-banner.index');
    }

    public function add() {
        return view('admin.middle-blog-banner.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
            'name'=>'required|min:5|max:190',
            ]);
        $middle=new MiddleBanner;
        $middle->name=$request->name;

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
            $img_canvas->save(base_path('public/uploads/middle-blog-banner/'. $image_name));
            $middle->banner=$image_name;
        }

        $middle->save();

        if($middle) {
            Session::flash('success', 'value');
            return redirect('admin/middle-blog-banner/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/middle-blog-banner/add');
        }
    }

    public function view(Request $request, $id) {
        $middle=MiddleBanner::find($id);
        return view('admin.middle-blog-banner.view', compact('middle'));
    }

    public function edit(Request $request, $id) {
        $middle=MiddleBanner::find($id);
        return view('admin.middle-blog-banner.update', compact('middle'));
    }

    public function update(Request $request) {
        $middle=MiddleBanner::find($request->id);
        $middle->name=$request->name;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/middle-blog-banner/'.$middle->banner)) Storage::disk('public')->delete('uploads/middle-blog-banner/'.$middle->banner);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/middle-blog-banner/'. $image_name));
            $middle->banner=$image_name;
        }

        $middle->save();

        if($middle) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=MiddleBanner::where('top_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}