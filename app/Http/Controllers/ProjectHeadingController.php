<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\ProjectHeading;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class ProjectHeadingController extends Controller
{
    public function index() {
        return view('admin.project-head.index');
    }

    public function add() {
        return view('admin.project-head.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'description'=>'required',
            
            ]);
        $project=new ProjectHeading;
       
        $project->description=$request->description;
       


        $project->save();

      
        if($project) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $project=ProjectHeading::find($id);
        return view('admin.project-head.view', compact('project'));
    }

    public function edit(Request $request, $id) {
        $project=ProjectHeading::find($id);
        return view('admin.project-head.update', compact('project'));
    }

    public function update(Request $request) {
        $project=ProjectHeading::find($request->id);
      
        $project->description=$request->description;

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
        $delete=ProjectHeading::where('project_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}