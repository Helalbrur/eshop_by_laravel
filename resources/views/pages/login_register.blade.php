
@extends('layouts.master')
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="{{route('customer_login')}}" method="post">
							{{csrf_field()}}
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="password" placeholder="Password" name="customer_password" />
							<button type="submit" class="btn btn-default">Login</button>
							<br>
							
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-7">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{route('customer_sign_in')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="First Name" name="customer_firstname" />
							<input type="text" placeholder="Last Name" name="customer_lastname" />
							<input type="email" placeholder="Email Address" name="customer_email" />
							<input type="password" placeholder="Password" name="customer_password" />
							<input type="text" placeholder="Mobile" name="customer_mobile" />
							
							<button type="submit" class="btn btn-default">Signup</button>
							<br>
							
							@include ('layouts.errors')
						</form>
						 
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection