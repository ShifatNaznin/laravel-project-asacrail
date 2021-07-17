<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class UserController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('superadmin');
    }

    public function index(){
        $user=User::orderBy('id','DESC')->get();
        return view('admin.user.index',compact('user'));
    }

    public function add(){
        return view('admin.user.add');
    }
    public function insert(Request $request){
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required'],
        ],[
            'name.requied'=>"Please enter name!"
        ]);

        $insert=User::insertGetId([
            'name'=>$request['name'],
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
            'role_id'=>$request['role'],
            'pic'=>'',
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);
        if($request->hasFile('pic')){
            $image=$request->file('pic');
            $imageName='user_'.$insert.'_'.time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(100,100)->save('uploads/user/'.$imageName);
  
            User::where('id',$insert)->update([
                'pic'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
          }

        if($insert){
            Session::flash('success','value');
            return redirect('admin/user/add');
        }else{
           Session::flash('error','value');
           return redirect('admin/user/add');
        }
    }

    public function edit(Request $request, $id) {
        $user=User::find($id);
        return view('admin.user.update', compact('user'));
    }
    public function update(Request $request){
        $update=user::where('slug',$slug)->update([
            'name'=>$_POST['name'],
            'email' => $_POST['email'],
            'role_serial' => $_POST['role']
        ]);
        if($request->hasFile('photo')){
            $delete=user::where('slug',$slug)->select('photo')->firstOrFail();
            Storage::disk('public')->delete($delete->photo);
            $file=$request->file('photo');
            $path=Storage::putFile('uploads/user',$file);
            user::where('slug',$slug)->update([
                'photo'=>$path
            ]);
        }

        if($update){
            // Session::flash('success','value');
            return redirect()->route('user_index');
            // return response()->json($update);
        }
       
    }

    public function view(Request $request, $id) {
        $user=User::find($id);
        return view('admin.user.view', compact('user'));
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=User::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

}