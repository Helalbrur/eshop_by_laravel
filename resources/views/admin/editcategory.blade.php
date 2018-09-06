@extends('layouts.adminmaster')
@section('content')
	<div class="container">
	@if(session('catsmg'))
      <div class="row">
          <div class="col col-md-12 justify-content-center">
              <div class="alert alert-success">
                  {{session('catsmg')}}
              </div>
          </div>
      </div>
      @endif
		<div class="row">
			<div class="col col-md-2"></div>
      		<div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Category</strong>
                      
                        </div>
                        <div class="card-body">
		                  	<form method="post" action="{{route('updatecategorydata',$cat->category_id)}}">
		                  		{{csrf_field()}}
				  
							    <div class="form-group ml-4 mr-4">
							      <label for="cat_name">Category Name</label>
							      <input type="text" class="form-control" id="cat_name" name="category_name" value="{{$cat->category_name}}">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="cat_des">Category Description</label>
							      <textarea type="text" class="form-control" id="cat_des" name="category_description" rows="3">{{$cat->category_description}}</textarea>
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="cat_st">Category status</label>
							      <input type="checkbox"  id="cat_st" name="category_status" value="1" <?php if($cat->category_status==1) echo "checked";;?>>
							    </div>
							  <div class="form-group ml-4">
							  	<button type="submit" class="btn btn-primary ">Submit</button>
							  </div>
					  
							</form>
                        </div>
                    </div>
                </div>
                <div class="col col-md-2"></div>
             </div>
	</div>

@endsection