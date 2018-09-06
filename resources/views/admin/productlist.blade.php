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
                            <strong class="card-title">Product List</strong>
                            <a href="{{route('addproduct')}}" class="btn btn-sm btn-info float-right" style="border-radius: 50%"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="card-body">
		                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
		                    <thead>
		                      <tr>
		                        <th width="5%">id</th>
		                        <th width="15%">Product Name</th>
		                        <th width="10%">Product category</th>
		                        <th width="10%">Product brand</th>
		                   
		                        <th width="10%">Product price</th>
		                        <th width="10%">Product image</th>
		                     
		                        <th width="10%">Product status</th>
		                        <th width="20%">Action</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      
		                      	<?php 
		                      		$res=DB::table('products')->join('categories', 'products.id', '=', 'categories.category_id')
						            ->join('brands', 'products.id', '=', 'brands.id')
						            ->get();
		                      		
		                      		if($res){
		                      			$i=0;
		                      			foreach ($res as $data) { $i++; ?>
		                      				
		                      				<tr>
						                        <td><?php echo $i;?></td>
						                        <td><?php echo $data->product_name;?></td>
						                        <td><?php echo $data->category_name;?></td>
						                        <td><?php echo $data->brand_name;?></td>
						                   
						                        <td><?php echo $data->product_price;?></td>
						                        <?php $image="uploads/".(string)$data->product_image;?>
						                        <td><img src="{{URL::to($image)}}" width="80px" height="80px"></td>
						                       
						                        <td><?php
						                        	if($data->product_status==0){
						                        		 echo "<button class='btn btn-sm btn-danger'><i class='fa fa-toggle-off'></i></button>";
						                        	}else{
						                        		echo "<button class='btn btn-sm btn-success'><i class='fa fa-toggle-on'></i></button>";
						                        	}
						                        

						                         ?></td>
						           
						                        <td><a class="btn btn-sm btn-info" href="{{route('updateproductstatus',$data->id)}}"><i class="<?php if($data->product_status==0)
						                        	{
						                        		echo 'fa fa-thumbs-up';
						                        	}else{
						                        		echo 'fa fa-thumbs-down';
						                        	}
						                        ?>"></i></a>
						                        	<a class="btn btn-sm btn-primary" href="{{route('editproductdata',$data->id)}}"><i class="fa fa-edit"></i></a>
						                        	<a class="btn btn-sm btn-danger" href="{{route('deleteproductdata',$data->id)}}"><i class="fa fa-trash"></i></a></td>
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