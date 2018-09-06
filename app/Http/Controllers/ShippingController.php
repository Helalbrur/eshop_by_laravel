<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shipping;
use Session;
session_start();

class ShippingController extends Controller
{
    public function save_shipping(Request $request){
    	$this->validate(request(),[
    		'shipping_first_name' =>'required',
    		'shipping_last_name' =>'required',
    		'shipping_email' =>'required|email',
    		'shipping_address' =>'required',
    		'shipping_mobile' =>'required',
    	]);
    	$shipping=shipping::create($request->all());
    	Session::put('shipping_id',$shipping->id);
    	return redirect(route('payment'));
    }
}
