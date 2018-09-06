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
                            <strong class="card-title">Brand List</strong>
                            <a target="_blank" href="{{route('addbrand')}}" class="btn btn-sm btn-info float-right" style="border-radius: 50%"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
		                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>id</th>
		                        <th>Brand Name</th>
		                        <th>Brand Description</th>
		                        <th>Brand status</th>
		                        <th>Action</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('brands')->get();
		                      		
		                      		if($res){
		                      			$i=0;
		                      			foreach ($res as $data) { $i++; ?>
		                      				
		                      				<tr>
						                        <td><?php echo $i;?></td>
						                        <td><?php echo $data->brand_name;?></td>
						                        <td><?php echo $data->brand_description;?></td>
						                        <td><?php
						                        	if($data->brand_status==0){
						                        		 echo "<button class='btn btn-sm btn-danger' href='{{route('updatebrandstatus',$data->id)}}'><i class='fa fa-toggle-off'></i></button>";
						                        	}else{
						                        		echo "<button class='btn btn-sm btn-success' href='{{route('updatebrandstatus',$data->id)}}'><i class='fa fa-toggle-on'></i></button>";
						                        	}
						                        

						                         ?></td>
						           
						                        <td><a class="btn btn-sm btn-info" href="{{route('updatebrandstatus',$data->id)}}"><i class="<?php if($data->brand_status==0)
						                        	{
						                        		echo 'fa fa-thumbs-up';
						                        	}else{
						                        		echo 'fa fa-thumbs-down';
						                        	}
						                        ?>"></i></a>
						                        	<a class="btn btn-sm btn-primary" href="{{route('editbranddata',$data->id)}}"><i class="fa fa-edit"></i></a>
						                        	<a class="btn btn-sm btn-danger" href="{{route('deletebranddata',$data->id)}}"><i class="fa fa-trash"></i></a></td>
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