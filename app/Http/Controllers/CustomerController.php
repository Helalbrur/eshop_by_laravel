<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customer;
use Session;
session_start();

class CustomerController extends Controller
{
    public function login_register(){
    	return view('pages.login_register');
    }
    public function customer_sign_in(Request $request){
    	$this->validate(request(),[
    		
    		'customer_firstname' => 'required',
    		'customer_lastname' => 'required',
    		'customer_email' => 'required|email',
    		'customer_password' => 'required',
    		'customer_mobile' => 'required',
    	]);
    	$data['customer_firstname']=$request->customer_firstname;
    	$data['customer_lastname']=$request->customer_lastname;
    	$data['customer_email']=$request->customer_email;
    	$data['customer_password']=md5($request->customer_password);
    	$data['customer_mobile']=$request->customer_mobile;

    	//$customer_id=DB::table('customers')->insertGetId($data);
    	$customer=customer::create($data);
    	//dd($customer->id); //this give the last inserted id
    	return redirect(route('home'));
    }
    public function customer_login(Request $request){
    	$email=$request->customer_email;
    	$password=md5($request->customer_password);

    	$login=DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
    	if($login->customer_email==$email && $login->customer_password==$password){
    		Session::put('customer_login',true);
    		Session::put('customer_id',$login->id);
    		//dd(Session::get('cutomer_login'));
    		return redirect(route('home'));

    	}

    }
    public function customer_logout(){
    	Session::put('customer_login',false);
    	Session::put('customer_id',null);
    	return redirect(route('home'));
    }
    public function checkout(){
    	return view('pages.checkout');
    }
}
