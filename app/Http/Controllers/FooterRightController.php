<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\FooterRight;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class FooterRightController extends Controller
{
    public function index(){
        $value=FooterRight::orderBy('id','DESC')->get();
        return view('admin.footer.right.index',compact('value'));
    }

    public function add() {
        return view('admin.footer.right.add');
    }

  
    public function store(Request $request) {
        $this->validate($request, [ 
           
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            ]);
        $add=new FooterRight;

        $add->email=$request->email;
        $add->phone=$request->phone;
        $add->address=$request->address;


        $add->save();

        if($add) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function view(Request $request, $id) {
        $data=FooterRight::find($id);
        return view('admin.footer.right.view', compact('data'));
    }

    public function edit(Request $request, $id) {
        $data=FooterRight::find($id);
        return view('admin.footer.right.update', compact('data'));
    }

    public function update(Request $request) {
        $add=FooterRight::find($request->id);
    
        $add->email=$request->email;
        $add->phone=$request->phone;
        $add->address=$request->address;


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
        $delete=FooterRight::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
    }