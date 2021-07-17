<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\OurTeam;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class OurTeamController extends Controller
{
    public function index() {
        return view('admin.our-team.index');
    }

    public function add() {
        return view('admin.our-team.add');
    }

  
    public function store(Request $request) {
        // $this->validate($request, [ 
           
        //     'name'=>'required',
        //     'position'=>'required',
        //     'summary'=>'required',
        //     ]);
        $data=new OurTeam;
        
        $data->name=$request->name;
        $data->position=$request->position;
        $data->summary=$request->summary;



        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100, 100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/our-team/'. $image_name));
            $data->photo=$image_name;
        }

        $data->save();

        if($data) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $data=OurTeam::find($id);
        return view('admin.our-team.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=OurTeam::find($id);
        return view('admin.our-team.update', compact('data'));
    }

    public function update(Request $request) {
        $data=OurTeam::find($request->id);
       
        $data->name=$request->name;
        $data->position=$request->position;
        $data->summary=$request->summary;


        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/our-team/'.$data->photo)) Storage::disk('public')->delete('uploads/our-team/'.$data->photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(100, 100);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/our-team/'. $image_name));
            $data->photo=$image_name;
        }

        $data->save();

        if($data) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=OurTeam::where('article_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}