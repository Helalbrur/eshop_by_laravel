<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    public function manage_order(){
    	return view('admin.manageorder');

    }
    public function vieworder($order_id){
    	return view('admin.vieworder',compact('order_id'));
    }
    public function getPDF(){
    	$pdf=PDF::loadView('admin.vieworder');
    	return $pdf->download('order.pdf');

    }
}
