@extends('frontend.master')


@section('content')

<section id="cart_items">
		<div class="container ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="active">Shopping Cart</li>
                        </ol>
                    </div>
                    <div class="table-responsive cart_info">
                        <?php
                             $contents=Cart::content();

                        ?>
                        <table class="table table-condensed">
                            <thead>
                                <tr class="cart_menu">
                                    <td class="image">Image</td>
                                    <td class="description">Name</td>
                                    <td class="price">Price</td>
                                    <td class="quantity">Quantity</td>
                                    <td class="total">Total</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contents as $item)


                                <tr>
                                    <td class="cart_product">
                                      <a href=""><img src="{{url($item->options->image)}}" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{$item->name}}</a></h4>
                                        <p>Web ID: 1089772</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{$item->price}} Tk.</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                          <form action="{{url('/update_cart')}}" method="POST">
                                                @csrf
                                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">
                                                <input  type="hidden" name="rowId" value="{{$item->rowId}}">
                                                <input type="submit" value="update" class="btn btn-sm btn-default ">
                                          </form>
                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{$item->total}}</p>
                                    </td>
                                    <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{url('/delete_cart')}}/{{$item->rowId}}"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
			<div class="row">
                <div class="col-lg-12">
                    <section id="do_action">
                        <div class="container">
                            <div class="heading">
                                <h3>What would you like to do next?</h3>
                                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                            </div>
                            <div class="breadcrumbs">
                                <ol class="breadcrumb">
                                  <li><a href="#">Home</a></li>
                                  <li class="active">Payment method</li>
                                </ol>
                            </div>
                            <div class="paymentCont col-sm-8">
                                        <div class="headingWrap">
                                                <h3 class="headingTop text-center">Select Your Payment Method</h3>
                                                <p class="text-center">Created with bootsrap button and using radio button</p>
                                        </div>
                                      <form action="{{url('/order_place')}}" method="POST">
                                            @csrf
                                            <div class="paymentWrap">
                                                <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                                    <label class="btn paymentMethod active">
                                                        <div class="method visa"></div>
                                                        <input type="radio" name="payment_gateway" value="hand_cash"  checked>
                                                    </label>
                                                    <label class="btn paymentMethod">
                                                        <div class="method master-card"></div>
                                                        <input type="radio" name="payment_gateway" value="paypal">
                                                    </label>
                                                    <label class="btn paymentMethod">
                                                        <div class="method amex"></div>
                                                        <input type="radio" name="payment_gateway" value="bkash">
                                                    </label>
                                                    <label class="btn paymentMethod">
                                                        <div class="method vishwa"></div>
                                                        <input type="radio" name="payment_gateway" value="pyza">
                                                    </label>


                                                </div>
                                            </div>

                                            <div class="footerNavWrap clearfix">
                                                <input type="submit" class="btn btn-success pull-left btn-fyi">
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </section><!--/#do_action-->
                </div>
            </div>
		</div>
	</section> <!--/#cart_items-->


@endsection
