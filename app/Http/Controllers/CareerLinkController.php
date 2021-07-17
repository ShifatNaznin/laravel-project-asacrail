<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\CareerLink;
use Carbon\Carbon;
use Session;
use Image;
use Storage;


class CareerLinkController extends Controller
{
    public function index() {
        return view('admin.career-link.index');
    }

    public function add() {
        return view('admin.career-link.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'heading'=>'required',
            'description'=>'required',
            
            ]);
        $project=new CareerLink;
       
        $project->heading=$request->heading;
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
        $project=CareerLink::find($id);
        return view('admin.career-link.view', compact('project'));
    }

    public function edit(Request $request, $id) {
        $project=CareerLink::find($id);
        return view('admin.career-link.update', compact('project'));
    }

    public function update(Request $request) {
        $project=CareerLink::find($request->id);
      
        $project->heading=$request->heading;
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
        $delete=CareerLink::where('project_status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}