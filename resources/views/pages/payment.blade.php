@extends('layouts.master')
@section('content')
	    <section id="cart_items">
        <div class="container col col-sm-12">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Home</a></li>
                  <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contents =Cart::content();?>
                        @foreach($contents as $content)
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="{{URL::to('uploads/'.$content->options->image)}}" alt=""></a>
                            </td>
                            
                            <td class="cart_price">
                                <p>{{$content->price}}</p>
                            </td>
                            <td class="cart_quantity">
                                
                                <form method="post" action="{{route('update_cart')}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="rowId" value="{{$content->rowId}}">
                                   
                                        <input class="float-left" type="text" name="qty" value="{{$content->qty}}" autocomplete="off" size="2">
                                    
                                        <input type="submit" name="submit" value="Update" class="float-right" style="background: lightgreen; border-radius: 10%">
                                    
                                </form>
                            
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{$content->total}}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href="{{route('delete_cart',$content->rowId)}}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>

                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container col-sm-12">
            <div class="row">
               <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
                            <li>Eco Tax <span>{{Cart::tax()}}</span></li>
                            <li>Shipping Cost <span>Free</span></li>
                            <li>Total <span>{{Cart::total()}}</span></li>
                        </ul>
                           
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section><!--/#do_action-->
    <section>

    <div class="card">

    	<div class="card-header" style="overflow:hidden;border:1px solid #ddd; background: #efefef; padding: 5px;">
    		<h1 class="card-title" >Select Payment method</h1>

    	</div>
    	<div class="card-body">
    		<form method="post" action="{{route('select_payment_method')}}">
    			@csrf
    			<div class="form-group">
    				<label for="cod">COD</label>
    				<input type="radio" name="payment_method"  id="cod" value="COD">
    			</div>
    			<div class="form-group">
    				<label for="paypla">Paypal</label>
    				<input type="radio" name="payment_method"  id="paypla" value="Paypal">
    			</div>
    			<div class="form-group">
    				<label for="bank">Bank</label>
    				<input type="radio" name="payment_method"  id="bank" value="Bank">
    			</div>
    			<div class="form-group">
    				<label for="bkash">bkash</label>
    				<input type="radio" name="payment_method"  id="bkash" value="bkash">
    			</div>
    			<div class="form-group">
    				<input type="submit" value="Submit" class="btn btn-sm btn-info">
    			</div>
    			

    		</form>
    	</div>
    </div>
    </section>
@endsection