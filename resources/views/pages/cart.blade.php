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
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="{{route('checkout')}}">Check Out</a>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection