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
                            <strong class="card-title">Slider List</strong>
                            <a href="{{route('addslider')}}" class="btn btn-sm btn-info float-right" style="border-radius: 50%"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
		                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th width="5%">id</th>
		                        <th width="10%">Name</th>
		                        <th width="10%">Email</th>
		                        <th width="25%">Image</th>
		                        <th width="15%">Role</th>
		                        <th width="20%">Action</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('admins')
						            ->get();
		                      		
		                      		if($res){
		                      			$i=0;
		                      			foreach ($res as $data) { $i++; ?>
		                      				
		                      				<tr>
						                        <td><?php echo $i;?></td>
						                        <td><?php echo $data->name;?></td>
						                        <td><?php echo $data->email;?></td>
						                       
						                   
						               
						                        <?php $image="uploads/".(string)$data->image;?>
						                       
						                        <td><img src="{{URL::to($image)}}" width="150px" height="150px"></td>
						                        <td><?php echo $data->role;?></td>
						                        <td>
						                        	<a class="btn btn-sm btn-primary" href="{{route('editslider',$data->id)}}"><i class="fa fa-edit"></i></a>
						                        	<a class="btn btn-sm btn-danger" href="{{route('deleteslider',$data->id)}}"><i class="fa fa-trash"></i></a>
						                        </td>
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