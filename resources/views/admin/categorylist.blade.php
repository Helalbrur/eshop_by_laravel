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
      		<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Officer List</strong>
                            <a href="{{route('addcategory')}}" class="btn btn-sm btn-info float-right" style="border-radius: 50%"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
		                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>id</th>
		                        <th>Category Name</th>
		                        <th>Category Description</th>
		                        <th>Category status</th>
		                        <th>Action</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('categories')->get();
		                      		
		                      		if($res){
		                      			$i=0;
		                      			foreach ($res as $data) { $i++; ?>
		                      				
		                      				<tr>
						                        <td><?php echo $i;?></td>
						                        <td><?php echo $data->category_name;?></td>
						                        <td><?php echo $data->category_description;?></td>
						                        <td><?php
						                        	if($data->category_status==0){
						                        		 echo "<button class='btn btn-sm btn-danger' href='{{route('updatecategorystatus',$data->category_id)}}'><i class='fa fa-toggle-off'></i></button>";
						                        	}else{
						                        		echo "<button class='btn btn-sm btn-success' href='{{route('updatecategorystatus',$data->category_id)}}'><i class='fa fa-toggle-on'></i></button>";
						                        	}
						                        

						                         ?></td>
						           
						                        <td><a class="btn btn-sm btn-info" href="{{route('updatecategorystatus',$data->category_id)}}"><i class="<?php if($data->category_status==0)
						                        	{
						                        		echo 'fa fa-thumbs-up';
						                        	}else{
						                        		echo 'fa fa-thumbs-down';
						                        	}
						                        ?>"></i></a>
						                        	<a class="btn btn-sm btn-primary" href="{{route('editcategorydata',$data->category_id)}}"><i class="fa fa-edit"></i></a>
						                        	<a class="btn btn-sm btn-danger" href="{{route('deletecategorydata',$data->category_id)}}"><i class="fa fa-trash"></i></a></td>
						                     </tr>
		                      		<?php	}
		                      		}

		                      	?>

		                    </tbody>
		                  </table>
                        </div>
                    </div>
                </div>
             </div>
	</div>

@endsection