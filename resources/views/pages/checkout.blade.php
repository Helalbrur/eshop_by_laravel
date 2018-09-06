@extends('layouts.master')
@section('content')
<section id="cart_items">
	<div class="container">
		
		
		<div class="row">
			<div class=" col-sm-10" style="border:1px solid #ddd; padding: 5px; background: #efefef;">
				<p class="text-center">Shipping Details</p>
			</div>
			<div class="col-sm-2"></div>
		</div>
		
		
		<div class="row">
			<div class="col-sm-2 clearfix"></div>
			<div class="col-sm-8 clearfix">
				<div class="bill-to">
					<p>Bill To</p>
					<div class="form-one">
						
						<form action="{{route('save_shipping')}}" method="post">
							@csrf
							<div class="form-group">
								<input type="text" placeholder="First name *" class="form-control" name="shipping_first_name">
								@if($errors->has('shipping_first_name'))
									<div class="alert alert-danger">First name is required</div>
								@endif
							</div>
							<div class="form-group">
								<input type="text" placeholder="Last name *" class="form-control" name="shipping_last_name">
								@if($errors->has('shipping_last_name'))
									<div class="alert alert-danger">Last name is required</div>
								@endif
							</div>
							<div class="form-group">
								<input type="email" placeholder="Email *" name="shipping_email" class="form-control">
								@if($errors->has('shipping_email'))
									<div class="alert alert-danger">Email is required Or give a valid email</div>
								@endif
							</div>
							<div class="form-group">
								<input type="text" placeholder="Moblie *" name="shipping_mobile" class="form-control">
								@if($errors->has('shipping_mobile'))
									<div class="alert alert-danger">Mobliee is required</div>
								@endif
							</div>
							<div class="form-group">
								<input type="text" placeholder="Address  *" name="shipping_address" class="form-control">
								@if($errors->has('shipping_address'))
									<div class="alert alert-danger">Address is required</div>
								@endif
							</div>
							<div class="form-group">
								<input type="submit" value="Submit" class="btn btn-sm btn-info" class="form-control">
							</div>
							
							
						</form>
					</div>
					
				</div>
			</div>
			<div class="col-sm-2 clearfix"></div>				
		</div>	
	</div>
</section> <!--/#cart_items-->
@endsection
