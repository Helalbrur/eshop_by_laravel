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
                            <strong class="card-title">Add Brand</strong>
                          
                        </div>
                        <div class="card-body">
		                  	<form method="post" action="{{route('savebrand')}}">
		                  		{{csrf_field()}}
				  
							    <div class="form-group ml-4 mr-4">
							      <label for="brand_name">Brand Name</label>
							      <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Name">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="brand_des">Brand Description</label>
							      <textarea type="text" class="form-control" id="brand_des" name="brand_description" rows="3"></textarea>
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="brand_st">Brand status</label>
							      <input type="checkbox"  id="cat_st" name="brand_status" value="1">
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