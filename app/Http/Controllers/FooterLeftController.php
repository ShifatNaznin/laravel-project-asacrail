<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\FooterLeft;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class FooterLeftController extends Controller
{
    public function index(){
        $value=FooterLeft::orderBy('id','DESC')->get();
        return view('admin.footer.left.index',compact('value'));
    }

    public function add() {
        return view('admin.footer.left.add');
    }

  
    public function store(Request $request) {
        // $this->validate($request, [ 
        //     'heading'=>'required',
        //     'facebook_link'=>'required',
        //     'twitter_link'=>'required',
        //     'instagram_link'=>'required',
        //     'pinterest_link'=>'required',
         
        //     ]);
        $add=new FooterLeft;
        $add->heading=$request->heading;
        $add->facebook_link=$request->facebook_link;
        $add->twitter_link=$request->twitter_link;
        $add->instagram_link=$request->instagram_link;
        $add->pinterest_link=$request->pinterest_link;
       
        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $data=FooterLeft::find($id);
        return view('admin.footer.left.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=FooterLeft::find($id);
        return view('admin.footer.left.update', compact('data'));
    }

    public function update(Request $request) {
        $add=FooterLeft::find($request->id);
        $add->heading=$request->heading;
        $add->facebook_link=$request->facebook_link;
        $add->twitter_link=$request->twitter_link;
        $add->instagram_link=$request->instagram_link;
        $add->pinterest_link=$request->pinterest_link;

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
        $delete=FooterLeft::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}