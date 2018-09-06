<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use DB;

class BrandController extends Controller
{
     public function index(){
    	return view('admin.brandlist');
    }
    public function addbrand(Request $request){
    	return view('admin.addbrand');

    }
    public function savebrand(Request $request){
    	$this->validate(request(),[
    		'brand_name'        => 'required',
            'brand_description'  => 'required'
    	]);
    	brand::create(request(['brand_name','brand_description','brand_status']));
    	return redirect(route('addbrand'))->with('msg','Brand successfully added');
    }
    public function updatebrandstatus($id){
    	$cat=DB::table('brands')->where('id',$id)->first();
    	$value;
    	if($cat->brand_status==0){
    		$value=1;
    	}else{
    		$value=0;
    	}
    	//dd($value);
    	//$data=array('category_status' => $value );
    	DB::table('brands')->where('id', $id)
            ->update(['brand_status' => $value]);
    	return redirect(route('brandlist'))->with('msg','Brand status updated');
    }
    public function editbranddata($id){
    	$brand=DB::table('brands')->where('id',$id)->first();
    	return view('admin.editbrand',compact('brand'));

    }
    public function updatebranddata(Request $request,$id){
    	$this->validate(request(),[
    		'brand_name'        => 'required',
            'brand_description'  => 'required'
    	]);
    	$data= array('brand_name' => $request->brand_name,'brand_description' => $request->brand_description,'brand_status' => $request->brand_status);
    	DB::table('brands')->where('id', $id)->update($data);
    	return redirect(route('brandlist'))->with('msg','Brand updated successfully');
    }
    public function deletebranddata($id){
    		DB::table('brands')->where('id',$id)->delete();
    		return redirect(route('brandlist'))->with('msg','Brand deleted successfully');
    }
    
}
