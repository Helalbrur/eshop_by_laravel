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
		                  	<form method="post" action="{{route('saveslider')}}" enctype="multipart/form-data">
		                  		{{csrf_field()}}
				  
							   
							     <div class="form-group ml-4 mr-4">
							      <label for="title">Slider Title</label>
							      <input type="text" class="form-control" id="title" name="title" placeholder="Title">
							    </div>
							     <div class="form-group ml-4 mr-4">
							      <label for="slogan">Slider Slogan</label>
							      <input type="text" class="form-control" id="slogan" name="slogan" placeholder="Slider slogan">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="body">Slider Description</label>
							      <input type="text" class="form-control" id="body" name="body" placeholder="Slider Description">
							    </div>
							    
							   
							    <div class="form-group ml-4 mr-4">
							      <label for="image">Slider Image</label>
							      <input type="file" class="form-control" id="image" name="image">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="price_image">Price Image</label>
							      <input type="file" class="form-control" id="price_image" name="price_image">
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