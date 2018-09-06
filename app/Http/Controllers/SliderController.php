<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use Image;
use File;
class SliderController extends Controller
{
    public function addslider(){
    	return view('admin.addslider');
    }
    public function sliderlist(){
    	return view('admin.sliderlist');
    }
    public function editslider($id){
    	$slider=slider::find($id);
    	return view('admin.editslider',compact('slider'));
    }
    public function deleteslider($id){

    	$slider=slider::find($id);
    	$price_image_path = "uploads/".$slider->price_image;  
    	$image_path = "uploads/".$slider->image;  
        if(File::exists($price_image_path)) {
            File::delete($price_image_path);
           
        }
        if(FILE::exists($image_path)){
        	FILE::delete($image_path);
        }

        $data=slider::find($id)->delete();
        if($data){
        	return redirect(route('sliderlist'))->with('msg','slider deleted successfully');
        }

        return redirect(route('sliderlist'))->with('msg','slider not deleted');
    }
    public function saveslider(Request $request){
    	$this->validate(request(),[
    		
    		'title' => 'required',
    		'slogan' => 'required',
    		'image' => 'required',
    		'price_image' => 'required',
    		'body' => 'required',
    	]);

    	if($request->hasFile('price_image') && $request->hasFile('image')){
    		$price_image=$request->file('price_image');
    		$price_image_filename=time().''.rand().'.'.$price_image->getClientOriginalExtension();
    		Image::make($price_image)->resize(255,233)->save(public_path('uploads/'.$price_image_filename));

    		$image=$request->file('image');
    		$image_filename=time().'.'.$image->getClientOriginalExtension();
    		Image::make($image)->resize(255,233)->save(public_path('uploads/'.$image_filename));
    		$data = array('title' => $request->title ,
						'slogan' => $request->slogan,
						'body' => $request->body,
						'image' => $image_filename,
						'price_image' => $price_image_filename,
						'created_at' => $request->created_at,
						'updated_at' => $request->updated_at,
    					);
    		slider::create($data);
    		return redirect(route('addslider'))->with('msg','slider added successfully');
    
    		

    	}
    	return redirect(route('addslider'))->with('msg','slider is not added');
    }
    public function updateslider(Request $request,$id){

    	$this->validate(request(),[
    		
    		'title' => 'required',
    		'slogan' => 'required',
    		'image' => 'required',
    		'price_image' => 'required',
    		'body' => 'required',
    	]);

    	if($request->hasFile('price_image') && $request->hasFile('image')){
    		$price_image=$request->file('price_image');
    		$price_image_filename=time().''.rand().'.'.$price_image->getClientOriginalExtension();
    		Image::make($price_image)->resize(255,233)->save(public_path('uploads/'.$price_image_filename));

    		$image=$request->file('image');
    		$image_filename=time().'.'.$image->getClientOriginalExtension();
    		Image::make($image)->resize(255,233)->save(public_path('uploads/'.$image_filename));
    		$data = array('title' => $request->title ,
						'slogan' => $request->slogan,
						'body' => $request->body,
						'image' => $image_filename,
						'price_image' => $price_image_filename,
						'updated_at' => $request->updated_at,
    					);
    			$slider=slider::find($id);
		    	$price_image_path = "uploads/".$slider->price_image;  
		    	$image_path = "uploads/".$slider->image;  
		        if(File::exists($price_image_path)) {
		            File::delete($price_image_path);
		           
		        }
		        if(FILE::exists($image_path)){
		        	FILE::delete($image_path);
		        }
    		$slider->update($data);
    		return redirect(route('sliderlist'))->with('msg','slider update successfully');

    	}
    	else if($request->hasFile('price_image')){
    		$price_image=$request->file('price_image');
    		$price_image_filename=time().''.rand().'.'.$price_image->getClientOriginalExtension();
    		Image::make($price_image)->resize(255,233)->save(public_path('uploads/'.$price_image_filename));

    		$data = array('title' => $request->title ,
						'slogan' => $request->slogan,
						'body' => $request->body,
						'price_image' => $price_image_filename,
						'updated_at' => $request->updated_at,
    					);
    		$slider=slider::find($id);
    		$price_image_path = "uploads/".$slider->price_image;
    		 if(File::exists($price_image_path)) {
		            File::delete($price_image_path);
		           
		        }

    		$slider->update($data);
    		return redirect(route('sliderlist'))->with('msg','slider update successfully');

    	}
    	else if($request->hasFile('image')){
    		$image=$request->file('image');
    		$image_filename=time().'.'.$image->getClientOriginalExtension();
    		Image::make($image)->resize(255,233)->save(public_path('uploads/'.$image_filename));
    		$data = array('title' => $request->title ,
						'slogan' => $request->slogan,
						'body' => $request->body,
						'image' => $image_filename,
						'updated_at' => $request->updated_at,
    					);
    		$slider=slider::find($id);
    		$image_path = "uploads/".$slider->image; 
    		 if(FILE::exists($image_path)){
		        	FILE::delete($image_path);
		      }
    		$slider->update($data);
    		return redirect(route('sliderlist'))->with('msg','slider update successfully');
    	}


    }
}
