<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Career;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class CareerController extends Controller
{
    public function index(){
        $value=Career::orderBy('id','DESC')->get();
        return view('admin.career.index',compact('value'));
    }



    public function view(Request $request, $id) {
        $data=Career::find($id);
        return view('admin.career.view', compact('data'));
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=Career::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }



    public function file_show($id){
          
        $value=Career::find($id);
        return view('admin.career.details',compact('value'));
    }
    public function download($file){
          
        return response()->download('files/'.$file);
    }
}