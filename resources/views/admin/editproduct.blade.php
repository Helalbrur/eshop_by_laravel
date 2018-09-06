@extends('layouts.adminmaster')
@section('content')
	<div class="container">
	@if(session('msg'))
      <div class="row">
          <div class="col col-md-12 justify-content-center">
              <div class="alert alert-success">
                  {{session('msg')}}
              </div>
          </div>
      </div>
      @endif
		<div class="row">
			<div class="col col-md-2"></div>
      		<div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Add product</strong>
                          
                        </div>
                        <div class="card-body">
		                  	<form method="post" action="{{route('saveproduct')}}" enctype="multipart/form-data">
		                  		{{csrf_field()}}
				  
							   
							    <div class="form-group ml-4 mr-4">
							      <select class="form-control" name="product_category">
							      	<option value="">Select product category</option>
							      	<?php $category=DB::table('categories')->get();?>
							      	@foreach($category as $cat)
							      		<option value="{{$cat->category_id}}" 
							      			<?php if($productinfo['product_category']==$cat->category_name){
							      					echo "selected";
							      			}?>

							      		>{{$cat->category_name}}</option>
							      	@endforeach
							      </select>
							 
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <select class="form-control" name="product_brand">
							      	<option value="">Select product brand</option>
							      	<?php $brands=DB::table('brands')->get();?>
							      	@foreach($brands as $brand)
							      		<option value="{{$brand->id}}" 

							      			<?php if($productinfo['product_brand']==$brand->brand_name){
							      					echo "selected";
							      			}?>
							      			>{{$brand->brand_name}}</option>
							      	@endforeach
							      </select>
							 
							    </div>
							     <div class="form-group ml-4 mr-4">
							      <label for="product_name">Product Name</label>
							      <input type="text" class="form-control" id="product_name" name="product_name" value="{{$productinfo['product_name']}}">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_des">Product Description</label>
							      <textarea type="text" class="form-control" id="product_des" name="product_description" rows="3">{{$productinfo['product_description']}}</textarea>
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_price">Product price</label>
							      <input type="text" class="form-control" id="produc_price" name="product_price" value="{{$productinfo['product_price']}}">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_image">Product Image</label>
							      <input type="file" class="form-control" id="product_image" name="product_image">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_size">Product size</label>
							      <input type="text" class="form-control" id="produc_size" name="product_size" value="{{$productinfo['product_size']}}">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_color">Product color</label>
							      <input type="text" class="form-control" id="produc_color" name="product_color" value="{{$productinfo['product_color']}}">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="product_st">Product status</label>
							      <input type="checkbox"  id="prodcut_st" name="product_status" value="1"
							      	<?php if($productinfo['product_status']==1){
							      		echo "checked";
							      	}?>
							      >
							    </div>
							  <div class="form-group ml-4">
							  	<button type="submit" class="btn btn-primary ">Submit</button>
							  </div>
					  
							</form>
							 @include ('layouts.errors')
                        </div>
                    </div>
                </div>
                <div class="col col-md-2">
                	
                </div>
             </div>
	</div>

@endsection