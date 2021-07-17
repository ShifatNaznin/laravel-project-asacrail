<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\TopBlog;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class TopBlogController extends Controller
{
    public function index() {
        return view('admin.top-blog.index');
    }

    public function add() {
        return view('admin.top-blog.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
            'name'=>'required|min:5|max:190',
            'title'=>'required|min:5|max:190',
            'description'=>'required|min:5|max:10000000',
            ]);
        $top=new TopBlog;
        $top->top_name=$request->name;
        $top->top_title=$request->title;
        $top->top_description=$request->description;
        $top->author_name=$request->author_name;
        $top->author_title=$request->author_title;



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
            $img_canvas->save(base_path('public/uploads/top-blog/'. $image_name));
            $top->top_photo=$image_name;
        }
        if ($request->hasFile('author_photo')) {
            $file=$request->file('author_photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100,100, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100,100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/top-blog/'. $image_name));
            $top->author_photo=$image_name;
        }

        $top->save();

        if($top) {
            Session::flash('success', 'value');
            return redirect('admin/top-blog/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/top-blog/add');
        }
    }

    public function view(Request $request, $id) {
        $top=TopBlog::find($id);
        return view('admin.top-blog.view', compact('top'));
    }

    public function edit(Request $request, $id) {
        $top=TopBlog::find($id);
        return view('admin.top-blog.update', compact('top'));
    }

    public function update(Request $request) {
        $top=TopBlog::find($request->id);
        $top->top_name=$request->name;
        $top->top_title=$request->title;
        $top->top_description=$request->description;
        $top->author_name=$request->author_name;
        $top->author_title=$request->author_title;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/top-blog/'.$top->top_photo)) Storage::disk('public')->delete('uploads/top-blog/'.$top->top_photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/top-blog/'. $image_name));
            $top->top_photo=$image_name;
        }

        if ($request->hasFile('author_photo')) {
            if(Storage::disk('public')->exists('uploads/top-blog/'.$top->author_photo)) Storage::disk('public')->delete('uploads/top-blog/'.$top->author_photo);
            $file=$request->file('author_photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100,100, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100,100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/top-blog/'. $image_name));
            $top->author_photo=$image_name;
        }

        $top->save();

        if($top) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=TopBlog::where('top_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}