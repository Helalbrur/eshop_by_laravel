<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use Cart;

class CardController extends Controller
{
    public function add_to_card(Request $request){
    	//dd($request->all());
    	$product=product::find($request->id);
    	
    	$data['id']=$request->id;
    	$data['name']=$product->product_name;
    	$data['qty']=$request->qty;
    	$data['price']=$product->product_price;
    	$data['options']['image']=$product->product_image;
    	Cart::add($data);

    	return view('pages.cart');
    }

    public function update_cart(Request $request){

    	Cart::update($request->rowId, $request->qty);
    	return view('pages.cart');
    }

    public function delete_cart($rowId){
    	Cart::remove($rowId);
    	return view('pages.cart');
    }
    public function card(){
    	return view('pages.cart');
    }
    	
}
