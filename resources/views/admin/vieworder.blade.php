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
      		<div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Customer Details </strong>
                            
                        </div>
                        <div class="card-body">
		                  <table class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>Customer name</th>
		                        <th>Customer mobile</th>
		                        <th>Customer email</th>
		                        
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		
		                      		$res=DB::table('orders')
		                      			->join('customers','orders.customer_id','=' ,'customers.id')
		                      			->where('orders.id',$order_id)
		                      			->select('customers.*')
		                      			->get();
		                      		
		                      		if($res){
		                      			
		                      			foreach ($res as $data) {  ?>
		                      				
		                      				<tr>
						                        
						                        <td><?php echo $data->customer_firstname ." ".$data->customer_lastname;?></td>
						                        <td><?php echo $data->customer_mobile;?></td>
						                        <td><?php echo $data->customer_email;?></td>
						           
						                       
						                     </tr>
		                      		<?php	}
		                      		}

		                      	?>

		                    </tbody>
		                  </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Shipping Details </strong>
                            
                        </div>
                        <div class="card-body">
		                  <table  class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>Name</th>
		                        <th>Address</th>
		                        <th>Mobile</th>
		                        <th>Email</th>
		                        
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('orders')
		                      			->join('Shippings','orders.shipping_id','=' ,'shippings.id')
		                      			->where('orders.id',$order_id)
		                      			->select('Shippings.*')
		                      			->get(); 
		                      		
		                      		if($res){
		                      			
		                      			foreach ($res as $data) {  ?>
		                      				
		                      				<tr>
						                        
						                        <td><?php echo $data->shipping_first_name ." ".$data->shipping_last_name;?></td>
						                        <td><?php echo $data->shipping_address;?></td>
						                        <td><?php echo $data->shipping_mobile ;?></td>
						                        <td><?php echo $data->shipping_email  ;?></td>
						           
						                       
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
             <div class="row">
             	<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Product Details </strong>
                            
                        </div>
                        <div class="card-body">
		                  <table  class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th>Product Image</th>
		                        <th>Product name</th>
		                        <th>Product quantity</th>
		                        <th>Product price</th>
		                        
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('orders')
		                      			->join('order_details','orders.id','=' ,'order_details.order_id')
		                      			->where('orders.id',$order_id)
		                      			->select('order_details.*')
		                      			->get(); 
		                      		
		                      		if($res){
		                      			
		                      			foreach ($res as $data) { 

		                      					$product=DB::table('products')
				                      			->where('id',$data->product_id)
				                      			->first(); 
		                      			 ?>
		                      				
		                      				<tr>
						                        
						                        <td><img src="{{URL::to('uploads/'.$product->product_image)}}" height="100px" width="100px"></td>
						                        <td><?php echo $product->product_name;?></td>
						                         <td><?php echo $data->product_sales_quantity;?></td>
						                        <td><?php echo $product->product_price ;?></td>
						                       
						           
						                       
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
             <div class="row">
             	<a href="" class="btnprn btn btn-sm btn-info">Print Preview</a></center>

				
             </div>

	</div>
	

@endsection
