<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\product;
use App\brand;
use DB;
use File;

class ProductController extends Controller
{
    

    public function index(){
    	return view('admin.productlist');
    }
    public function addproduct(){
    	return view('admin.addproduct');
    }
    public function saveproduct(Request $request){
    	$this->validate(request(),[
    		
    		'product_category' => 'required',
    		'product_brand' => 'required',
    		'product_name' => 'required',
    		'product_description' => 'required',
    		'product_price' => 'required',
    		'product_image' => 'required',
    		'product_size' => 'required',
    		'product_color' => 'required',
    	]);
    	if($request->hasFile('product_image')){
    		$file=$request->file('product_image');
    		$filename=time().'.'.$file->getClientOriginalExtension();
    		Image::make($file)->resize(255,233)->save(public_path('uploads/'.$filename));
    		$data = array('category_id' => $request->product_category ,
    						'brand_id' => $request->product_brand,
    						'product_name' => $request->product_name,
    						'product_description' => $request->product_description,
    						'product_price' => $request->product_price,
    						'product_image' => $filename,
    						'product_size' => $request->product_size,
    						'product_color' => $request->product_color,
    						'product_status' => $request->product_status,
    						'created_at' => $request->created_at,
    						'updated_at' => $request->updated_at,
    					);
    		product::create($data);
    		return redirect(route('addproduct'))->with('msg','product added successfully');
    
    		

    	}

    	
    		//return redirect(route('addproduct'))->with('msg','product added successfully');

    	return redirect(route('addproduct'))->with('msg','product is not added');

    }
    public function updateproductstatus($id){
    	$pr=product::find($id);
    	$value;
    	if($pr->product_status==0){
    		$value=1;
    	}
    	else{
    		$value=0;
    	}
    	$pr->product_status=$value;
    	$pr->save();

    	return redirect(route('productlist'))->with('msg','product status updated');
    }
    public function deleteproductdata($id){
        $image=product::find($id);
    	
        $image_path = "uploads/".$image->product_image;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
            $data=product::find($id)->delete();
            if($data){
             return redirect(route('productlist'))->with('msg','product deleted');
            }
        }
    	
    	return redirect(route('productlist'))->with('msg','product not deleted');
    }

    public function editproductdata($id){
    	$product=product::find($id);
    	$category=DB::table('categories')->where('category_id',$product->category_id)->first();
    	$brand=brand::find($product->brand_id);
    	$productinfo = array('category_id' => $category->category_id,
						'brand_id' => $brand->id,
						'product_name' => $product->product_name,
						'product_description' => $product->product_description,
						'product_price' => $product->product_price,
						'product_image' => $product->product_image,
						'product_size' => $product->product_size,
						'product_color' => $product->product_color,
						'product_status' => $product->product_status,
						'product_category' => $category->category_name,
						'product_brand' => $brand->brand_name,
					);						
    	return view('admin.editproduct',compact('productinfo'));
    }






    //forntend

    public function product_details_by_id($id){// forntend

        $product=product::find($id);

        return view('pages.product_details_by_id',compact('product'));
    }

    	
}
