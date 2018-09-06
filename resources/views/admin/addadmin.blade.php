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
                            <strong class="card-title">Add Admin</strong>
                          
                        </div>
                        <div class="card-body">
		                  	<form method="post" action="{{route('saveadmin')}}" enctype="multipart/form-data">
		                  		{{csrf_field()}}
				  
							   
							     <div class="form-group ml-4 mr-4">
							      <label for="name">Name</label>
							      <input type="text" class="form-control" id="name" name="name" placeholder="Name">
							    </div>
							     <div class="form-group ml-4 mr-4">
							      <label for="email">Email</label>
							      <input type="email" class="form-control" id="email" name="email" placeholder="Email">
							    </div>
							    <div class="form-group ml-4 mr-4">
							      <label for="password">Password</label>
							      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
							    </div>
							    
							   
							    <div class="form-group ml-4 mr-4">
							      <label for="image">Profile image</label>
							      <input type="file" class="form-control" id="image" name="image">
							    </div>
							    <div class="form-group ml-4 mr-4">
							    	<select name="role" class="form-control">
							    		<option value="">Select admin Role</option>
							    		<option value="admin">Admin</option>
							    		<option value="editor">Editor</option>
							    		<option value="controller">Controller</option>
							    	</select>
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