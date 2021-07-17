<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\NewsBlog;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class NewsBlogController extends Controller
{
    public function index() {
        return view('admin.news-blog.index');
    }

    public function add() {
        return view('admin.news-blog.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'title'=>'required',
            'description'=>'required',
            ]);
        $news=new NewsBlog;
     
        $news->blog_title=$request->title;
        $news->blog_description=$request->description;



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
            $img_canvas->save(base_path('public/uploads/news-blog/'. $image_name));
            $news->blog_photo=$image_name;
        }

        $news->save();

        if($news) {
            Session::flash('success', 'value');
            return redirect('admin/news-blog/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/news-blog/add');
        }
    }

    public function view(Request $request, $id) {
        $news=NewsBlog::find($id);
        return view('admin.news-blog.view', compact('news'));
    }

    public function edit(Request $request, $id) {
        $news=NewsBlog::find($id);
        return view('admin.news-blog.update', compact('news'));
    }

    public function update(Request $request) {
        $news=NewsBlog::find($request->id);
     
        $news->blog_title=$request->title;
        $news->blog_description=$request->description;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/news-blog/'.$news->blog_photo)) Storage::disk('public')->delete('uploads/news-blog/'.$news->blog_photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/news-blog/'. $image_name));
            $news->blog_photo=$image_name;
        }

        $news->save();

        if($news) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=NewsBlog::where('blog_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    
}