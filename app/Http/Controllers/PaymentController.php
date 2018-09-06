<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment;
use App\order;
use App\order_details;
use Cart;
use Session;
session_start();

class PaymentController extends Controller
{
    public function payment(){
    	return view('pages.payment');
    }
    public function select_payment_method(Request $request){
    	$this->validate(request(),[
    		'payment_method' =>'required',
    	]);

    	$payment=payment::create($request->all());
    	$orderdata=array();
    	$orderdata['customer_id']=Session::get('customer_id');
    	$orderdata['shipping_id']=Session::get('shipping_id');
    	$orderdata['payment_id']=$payment->id;
    	$orderdata['order_total']=Cart::total();
    	//dd($orderdata);
    	// var_dump(Cart::total());

    	$order=order::create($orderdata);

    	$content=Cart::content();
    	$orderdetailsdata=array();
    	foreach ($content as $value) {
    		$orderdetailsdata['order_id']=$order->id;
    		$orderdetailsdata['product_id']=$value->id;
    		$orderdetailsdata['product_name']=$value->name;
    		$orderdetailsdata['product_price']=$value->price;
    		$orderdetailsdata['product_sales_quantity']=$value->qty;
    		order_details::create($orderdetailsdata);
    		
    	}
    	Cart::destroy();

    	return redirect(route('ticket'));

    }
}
