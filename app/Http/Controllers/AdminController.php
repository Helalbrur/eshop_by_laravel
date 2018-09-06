<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use DB;
use Image;
use Illuminate\Support\Facades\Input;
use Session;
session_start();

class AdminController extends Controller
{
    
    public function addadmin(){
    	return view('admin.addadmin');
    }
    public function adminlist(){
    	return view('admin.adminlist');
    }
    public function login(){
    	return view('admin.login');
    }
    public function logout(){
    	Session::flush();
    	return redirect(route('login'));
    }
    public function loginpanel(Request $request){

		if(admin::where('email','=', Input::get('email'))->exists()){
			$admin=DB::table('admins')->where('email',$request->email)->first();
			if($admin->email==$request->email && $admin->password==md5($request->password)){
				Session::put('id',$admin->id);
				Session::put('name',$admin->name);
				Session::put('email',$admin->email);
				Session::put('image',$admin->image);
				Session::put('role',$admin->role);
				Session::put('login',true);
				return redirect(route('adminindex'))->with('msg','Login success');

			}
			
			
		}
		return view('admin.index',compact('msg'));
		
		// dd($request->all());
		//return view('admin.index',compact('msg'));

    }
    public function saveadmin(Request $request){
    	$this->validate(request(),[
    		
    		'name' => 'required',
    		'email' => 'required|email',
    		'image' => 'required',
    		'password' => 'required',
    		'role' => 'required',
    	]);

    	//$user = admin::where('email', '=', Input::get('email'))->first();
		if (!admin::where('email','=', Input::get('email'))->exists()) {
		   if( $request->hasFile('image'))
	    	{
	    		$image=$request->file('image');
	    		$image_filename=time().'.'.$image->getClientOriginalExtension();
	    		Image::make($image)->resize(512,512)->save(public_path('uploads/'.$image_filename));
	    		$data = array('name' => $request->name ,
							'email' => $request->email,
							'password' => md5($request->password),
							'image' => $image_filename,
							'role' => $request->role
	    					);
	    		admin::create($data);
	    		return redirect(route('addadmin'))->with('msg','admin added successfully');
	    	}
		}
    	else{
    		return redirect(route('addadmin'))->with('msg','email already exist');
    	}

    	
    	return redirect(route('addadmin'))->with('msg','admin is not added');
	}
}
