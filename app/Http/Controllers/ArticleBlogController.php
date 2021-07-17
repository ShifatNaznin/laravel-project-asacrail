<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ArticleBlog;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class ArticleBlogController extends Controller
{
    public function index() {
        return view('admin.article-blog.index');
    }

    public function add() {
        return view('admin.article-blog.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'title'=>'required',
            'description'=>'required',
            ]);
        $article=new ArticleBlog;
        
        $article->article_title=$request->title;
        $article->article_description=$request->description;
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
            $img_canvas->save(base_path('public/uploads/article-blog/'. $image_name));
            $article->article_photo=$image_name;
        }

        $article->save();

        if($article) {
            Session::flash('success', 'value');
            return redirect('admin/article-blog/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/article-blog/add');
        }
    }

    public function view(Request $request, $id) {
        $article=ArticleBlog::find($id);
        return view('admin.article-blog.view', compact('article'));
    }

    public function edit(Request $request, $id) {
        $article=ArticleBlog::find($id);
        return view('admin.article-blog.update', compact('article'));
    }

    public function update(Request $request) {
        $article=ArticleBlog::find($request->id);
       
        $article->article_title=$request->title;
        $article->article_description=$request->description;
        $article->photo_credit=$request->photo_credit;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/article-blog/'.$article->article_photo)) Storage::disk('public')->delete('uploads/article-blog/'.$article->article_photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/article-blog/'. $image_name));
            $article->article_photo=$image_name;
        }

        $article->save();

        if($article) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=ArticleBlog::where('article_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}