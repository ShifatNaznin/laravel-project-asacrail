<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Contact;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class ContactController extends Controller
{
    public function index(){
        $value=Contact::orderBy('id','DESC')->get();
        return view('admin.contact.index',compact('value'));
    }



    public function view(Request $request, $id) {
        $data=Contact::find($id);
        return view('admin.contact.view', compact('data'));
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=Contact::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }
}