<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\MiddleBlog;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class MiddleBlogController extends Controller
{
    public function index() {
        return view('admin.middle-blog.index');
    }

    public function add() {
        return view('admin.middle-blog.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
            'name'=>'required|min:5|max:190',
            'title'=>'required|min:5|max:190',
            'description'=>'required|min:5|max:10000000',
            ]);
        $middle=new MiddleBlog;
        $middle->middle_name=$request->name;
        $middle->middle_title=$request->title;
        $middle->middle_description=$request->description;
        $middle->author_name=$request->author_name;
        $middle->author_title=$request->author_title;



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
            $img_canvas->save(base_path('public/uploads/middle-blog/'. $image_name));
            $middle->middle_photo=$image_name;
        }
        if ($request->hasFile('author_photo')) {
            $file=$request->file('author_photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100, 100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/middle-blog/'. $image_name));
            $middle->author_photo=$image_name;
        }

        $middle->save();

        if($middle) {
            Session::flash('success', 'value');
            return redirect('admin/middle-blog/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/middle-blog/add');
        }
    }

    public function view(Request $request, $id) {
        $middle=MiddleBlog::find($id);
        return view('admin.middle-blog.view', compact('middle'));
    }

    public function edit(Request $request, $id) {
        $middle=MiddleBlog::find($id);
        return view('admin.middle-blog.update', compact('middle'));
    }

    public function update(Request $request) {
        $middle=MiddleBlog::find($request->id);
        $middle->middle_name=$request->name;
        $middle->middle_title=$request->title;
        $middle->middle_description=$request->description;
        $middle->author_name=$request->author_name;
        $middle->author_title=$request->author_title;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/middle-blog/'.$middle->middle_photo)) Storage::disk('public')->delete('uploads/middle-blog/'.$middle->middle_photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/middle-blog/'. $image_name));
            $middle->middle_photo=$image_name;
        }
        if ($request->hasFile('author_photo')) {
            if(Storage::disk('public')->exists('uploads/middle-blog/'.$middle->author_photo)) Storage::disk('public')->delete('uploads/middle-blog/'.$middle->author_photo);
            $file=$request->file('author_photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100, 100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/middle-blog/'. $image_name));
            $middle->author_photo=$image_name;
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
        $delete=MiddleBlog::where('middle_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}