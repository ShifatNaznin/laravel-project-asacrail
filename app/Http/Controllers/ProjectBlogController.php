<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ProjectBlog;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class ProjectBlogController extends Controller
{
    public function index() {
        return view('admin.project-blog.index');
    }

    public function add() {
        return view('admin.project-blog.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'title'=>'required',
            'description'=>'required',
            ]);
        $project=new ProjectBlog;
       
        $project->project_title=$request->title;
        $project->project_description=$request->description;
        $project->photo_credit=$request->photo_credit;



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
            $img_canvas->save(base_path('public/uploads/project-blog/'. $image_name));
            $project->project_photo=$image_name;
        }

        $project->save();

        if($project) {
            Session::flash('success', 'value');
            return redirect('admin/project-blog/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/project-blog/add');
        }
    }

    public function view(Request $request, $id) {
        $project=ProjectBlog::find($id);
        return view('admin.project-blog.view', compact('project'));
    }

    public function edit(Request $request, $id) {
        $project=ProjectBlog::find($id);
        return view('admin.project-blog.update', compact('project'));
    }

    public function update(Request $request) {
        $project=ProjectBlog::find($request->id);
      
        $project->project_title=$request->title;
        $project->project_description=$request->description;
        $project->photo_credit=$request->photo_credit;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/project-blog/'.$project->project_photo)) Storage::disk('public')->delete('uploads/project-blog/'.$project->project_photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/project-blog/'. $image_name));
            $project->project_photo=$image_name;
        }

        $project->save();

        if($project) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=ProjectBlog::where('project_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}