<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Sectors;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class SectorsController extends Controller
{
    public function index() {
        return view('admin.sectors.index');
    }

    public function add() {
        return view('admin.sectors.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'title'=>'required',
            'description'=>'required',
            ]);
        $news=new Sectors;
     
        $news->title=$request->title;
        $news->description=$request->description;
        $news->photo_credit=$request->photo_credit;



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
            $img_canvas->save(base_path('public/uploads/sectors/'. $image_name));
            $news->photo=$image_name;
        }

        $news->save();

        if($news) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $news=Sectors::find($id);
        return view('admin.sectors.view', compact('news'));
    }

    public function edit(Request $request, $id) {
        $news=Sectors::find($id);
        return view('admin.sectors.update', compact('news'));
    }

    public function update(Request $request) {
        $news=Sectors::find($request->id);
     
        $news->title=$request->title;
        $news->description=$request->description;
        $news->photo_credit=$request->photo_credit;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/sectors/'.$news->photo)) Storage::disk('public')->delete('uploads/sectors/'.$news->photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1170, 530, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1170, 530);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/sectors/'. $image_name));
            $news->photo=$image_name;
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
        $delete=Sectors::where('blog_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

}