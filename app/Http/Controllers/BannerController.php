<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Banner;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class BannerController extends Controller {
    public function index() {
        // $allUser = User::orderBy('id', 'DESC')->get();
        return view('admin.banner.index');
    }

    public function add() {
        return view('admin.banner.add');
    }

    public function store(Request $request) {
        $this->validate($request, [ 
            'title'=>'required',
            'photo'=>'required',
            'title_two'=>'required',
            'photo_two'=>'required',
            ]);
        $banner=new Banner;

        $banner->title=$request->title;
        $banner->title_two=$request->title_two;
        $banner->title_three=$request->title_three;
        $banner->title_four=$request->title_four;
        $banner->title_five=$request->title_five;
        $banner->title_six=$request->title_six;
        $banner->title_seven=$request->title_seven;



        if ($request->hasFile('photo')) {
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo=$image_name;
        }
        if ($request->hasFile('photo_two')) {
            $file=$request->file('photo_two');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_two=$image_name;
        }
        if ($request->hasFile('photo_three')) {
            $file=$request->file('photo_three');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_three=$image_name;
        }
        if ($request->hasFile('photo_four')) {
            $file=$request->file('photo_four');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_four=$image_name;
        }
        if ($request->hasFile('photo_five')) {
            $file=$request->file('photo_five');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_five=$image_name;
        }
        if ($request->hasFile('photo_six')) {
            $file=$request->file('photo_six');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_six=$image_name;
        }
        if ($request->hasFile('photo_seven')) {
            $file=$request->file('photo_seven');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_seven=$image_name;
        }
       

        $banner->save();

        if($banner) {
            Session::flash('success', 'value');
            return redirect('admin/banner/add');
        }

        else {
            Session::flash('error', 'value');
            return redirect('admin/banner/add');
        }
    }

    public function view(Request $request, $id) {
        $banner=Banner::find($id);
        return view('admin.banner.view', compact('banner'));
    }

    public function edit(Request $request, $id) {
        $banner=Banner::find($id);
        return view('admin.banner.update', compact('banner'));
    }

    public function update(Request $request) {
        $banner=Banner::find($request->id);
        $banner->title=$request->title;
        $banner->title_two=$request->title_two;
        $banner->title_three=$request->title_three;
        $banner->title_four=$request->title_four;
        $banner->title_five=$request->title_five;
        $banner->title_six=$request->title_six;
        $banner->title_seven=$request->title_seven;



        if ($request->hasFile('photo')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo);
            $file=$request->file('photo');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo=$image_name;
        }
        if ($request->hasFile('photo_two')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_two)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_two);
            $file=$request->file('photo_two');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_two=$image_name;
        }
        if ($request->hasFile('photo_three')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_three)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_three);
            $file=$request->file('photo_three');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_three=$image_name;
        }
        if ($request->hasFile('photo_four')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_four)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_four);
            $file=$request->file('photo_four');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_four=$image_name;
        }
        if ($request->hasFile('photo_five')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_five)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_five);
            $file=$request->file('photo_five');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_five=$image_name;
        }
        if ($request->hasFile('photo_six')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_six)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_six);
            $file=$request->file('photo_six');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_six=$image_name;
        }
        if ($request->hasFile('photo_seven')) {
            if(Storage::disk('public')->exists('uploads/banner/'.$banner->photo_seven)) Storage::disk('public')->delete('uploads/banner/'.$banner->photo_seven);
            $file=$request->file('photo_seven');
            $image_name=str_replace(' ', '_', substr($request->product_name, 0, 5)) . '-'. uniqid() . '.'. $file->getClientOriginalExtension();
            $image=Image::make($file);

            $image->resize(1920, 999, function ($constraint) {
                    $constraint->aspectRatio();
                }

            );

            $img_canvas=Image::canvas(1920, 999);
            $img_canvas->insert($image, 'center');
            $img_canvas->save(base_path('public/uploads/banner/'. $image_name));
            $banner->photo_seven=$image_name;
        }

        $banner->save();

        if($banner) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }

    public function delete() {
        $id=$_POST['modal_id'];
        $delete=Banner::where('status',1)->where('id',$id)->delete();
        if($delete) {
            return back()->with('success', 'value');
        }

        else {
            return back()->with('error', 'value');
        }
    }


}