@extends('customer.layouts.parent')

@section('content')

@if(Cart::count())
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="name"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td class="cart_product">
                                    <img style="width:100px;height:auto" src="{{ url('/storage/' . App\Product_image::where('product_id', $item->id)->first()->product_image) }}" alt="">
                                </td>
                                <td class="cart_description">
                                <h4><a href="{{ url('/cust/product/' . $item->id) }}">{{ $item->name }}</a></h4>
                                    <p>Product ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $item->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        @if((App\Product::find($item->id)->quantity) <= $item->qty)
                                            <a class="cart_quantity_up" onclick="return alert(&quot;Maximum Quantity Exceeded&quot;)">
                                                + 
                                            </a>
                                        @else
                                            <a class="cart_quantity_up" href="{{ url('/cust/cart/plus/' . $item->rowId) }}">
                                                + 
                                            </a>
                                        @endif
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href="{{ url('/cust/cart/minus/' . $item->rowId) }}">
                                            - 
                                        </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $item->price * $item->qty }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{ url('/cust/cart/remove/' . $item->rowId) }}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a class="btn btn-primary" style="float:right; padding:10px 50px;" href="{{ url('/cust/cart/clear') }}" onclick="return confirm(&quot;This will clear all items from Cart. Are you sure you want to proceed?&quot;)">
                Clear Cart
            </a>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <h3>Available Coupons</h3>
                            <hr>
                            <form action="{{ url('/cust/cart/coupon') }}">
                                @foreach($codes as $coupon)
                                    @if(App\Order::where('coupon', $coupon->coupon_code)->where('user_id', $user_id)->count() < $coupon->max_use)
                                        <li>
                                            <input type="radio" name="coupon" value="{{ $coupon->id }}">
                                            <label>
                                                <h4>
                                                    {{ $coupon->coupon_code }} - 
                                                    <span class="text-success">@if($coupon->format == 0)Rs. @endif{{ $coupon->discount }}@if($coupon->format == 1)%@endif OFF</span>
                                                </h4>
                                            </label>
                                            <hr>
                                        </li>
                                    @endif
                                @endforeach
                        </ul>
                            <button class="btn btn-primary" style="margin-left:40px;">Apply Coupon</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Cart Sub Total <span>Rs. {{ Cart::priceTotal() }}</span></li>
                            <li>Eco Tax <span>Rs. {{ $taxNo }}</span></li>
                            <li>Shipping Cost <span>Rs. {{ $ship }}</span></li>
                            <li>Coupon <span>{{ $coupon_code }}</span></li>
                            <li>Coupon Discount <span class="text-success">- Rs. {{ $discount }}</span></li>
                            <li>Total <span class="text-warning"><strong>Rs. {{ $total }}</strong></span></li>
                        </ul>

                        <form action="{{ url('/cust/checkout/address') }}" method="GET">
                            <input type="hidden" value="{{ $total }}" name="cartTotal">
                            <button class="btn btn-default check_out" style="margin-left:40px;">Check Out</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@else
    <div class="container text-center" style="padding:50px;">
        <h2 style="color:gray;">Cart is Empty.</h2>
        <a class="btn btn-primary" href="{{ url('/cust/shop') }}">
            Continue Shopping
        </a>
    </div>
@endif

@endsection