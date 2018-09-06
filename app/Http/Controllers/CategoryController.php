<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use DB;

class CategoryController extends Controller
{
    public function index(){
    	return view('admin.categorylist');
    }
    public function addcategory(Request $request){
    	return view('admin.addcategory');

    }
    public function savecategory(Request $request){
    	$this->validate(request(),[
    		'category_name'        => 'required',
            'category_description'  => 'required'
    	]);
    	category::create(request(['category_name','category_description','category_status']));
    	return redirect(route('addcategory'))->with('msg','Category successfully added');
    }
    public function updatecategorystatus($category_id){
    	$cat=DB::table('categories')->where('category_id',$category_id)->first();
    	$value;
    	if($cat->category_status==0){
    		$value=1;
    	}else{
    		$value=0;
    	}
    	//dd($value);
    	//$data=array('category_status' => $value );
    	DB::table('categories')->where('category_id', $category_id)
            ->update(['category_status' => $value]);
    	return redirect(route('categorylist'))->with('msg','Category status updated');
    }
    public function editcategorydata($category_id){
    	$cat=DB::table('categories')->where('category_id',$category_id)->first();
    	return view('admin.editcategory',compact('cat'));

    }
    public function updatecategorydata(Request $request,$category_id){
    	$this->validate(request(),[
    		'category_name'        => 'required',
            'category_description'  => 'required'
    	]);
    	$data= array('category_name' => $request->category_name,'category_description' => $request->category_description,'category_status' => $request->category_status);
    	DB::table('categories')->where('category_id', $category_id)->update($data);
    	return redirect(route('categorylist'))->with('msg','Category updated successfully');
    }
    public function deletecategorydata($category_id){
    		DB::table('categories')->where('category_id',$category_id)->delete();
    		return redirect(route('categorylist'))->with('msg','Category deleted successfully');
    }

    public function products_by_category($id){ //forntend
        $products_by_category=DB::table('products')->join('brands','products.id','=','brands.id')
        ->where('category_id',$id)->limit(9)->get();
        return view('pages.product_by_category',compact('products_by_category'));
    }
}
