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
                            
                        </div>
                        <div class="card-body">
		                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>id</th>
		                        <th>Customer Name</th>
		                        <th>Order Total</th>
		                        <th>Order status</th>
		                        <th>Action</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('orders')
		                      			->join('customers','orders.customer_id','=' ,'customers.id')
		                      			->select('orders.*','customers.customer_firstname','customers.customer_lastname')
		                      			->get();
		                      		
		                      		if($res){
		                      			$i=0;
		                      			foreach ($res as $data) { $i++; ?>
		                      				
		                      				<tr>
						                        <td><?php echo $i;?></td>
						                        <td><?php echo $data->customer_firstname ." ".$data->customer_lastname;?></td>
						                        <td><?php echo $data->order_total;?></td>
						                        <td><?php echo $data->order_status;?></td>
						           
						                        <td><a class="btn btn-sm btn-info" href="{{route('updatecategorystatus',$data->id)}}"><i class="<?php if($data->order_status=='pending')
						                        	{
						                        		echo 'fa fa-thumbs-up';
						                        	}else{
						                        		echo 'fa fa-thumbs-down';
						                        	}
						                        ?>"></i></a>
						                        	<a class="btn btn-sm btn-primary" href="{{route('vieworder',$data->id)}}"><i class="fa fa-edit"></i></a>
						                        	<a class="btn btn-sm btn-danger" href="{{route('deletecategorydata',$data->id)}}"><i class="fa fa-trash"></i></a></td>
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