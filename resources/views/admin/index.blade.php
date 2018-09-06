@extends('layouts.adminmaster')
@section('content')
<div class="container">
        <div class="row">
            <div class="col">
            	<div class="card">
            		<h1 class="card-title">Welcome {{Session::get('name')}}</h1>
            		@if(session('msg'))
            			<div class="alert alert-success">
            				<h1>{{session('msg')}}</h1>
            			</div>
            		@endif
            		
                </div>
            </div>
        </div>
</div> 
@endsection