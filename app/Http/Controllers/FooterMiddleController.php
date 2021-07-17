<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\FooterMiddle;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class FooterMiddleController extends Controller
{
    public function index(){
        $value=FooterMiddle::orderBy('id','DESC')->get();
        return view('admin.footer.middle.index',compact('value'));
    }

    public function add() {
        return view('admin.footer.middle.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'link'=>'required',

            ]);
        $add=new FooterMiddle;
       
        $add->link=$request->link;

        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $data=FooterMiddle::find($id);
        return view('admin.footer.middle.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=FooterMiddle::find($id);
        return view('admin.footer.middle.update', compact('data'));
    }

    public function update(Request $request) {
        $add=FooterMiddle::find($request->id);
      
        $add->link=$request->link;

        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=FooterMiddle::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}