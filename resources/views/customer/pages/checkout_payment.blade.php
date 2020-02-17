@extends('customer.layouts.parent')

@section('content')

<section id="cart_items">
    <div class="container">

        <div class="step-one">
            <h2 class="heading">User Information</h2>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4 style="color:#FE980F;">{{ $user->firstname }} {{ $user->lastname }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <strong>Email</strong>
            </div>
            <div class="col-sm-6">
                {{ $user->email }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
                <strong>Address</strong>
            </div>
            <div class="col-sm-6">
                {{ $address->address }} <br>
                <strong>City : </strong> {{ $address->city }} <br>
                <strong>State : </strong> {{ $address->state }} <br>
                <strong>Pin Code : </strong>{{ $address->pin_code }} <br>
                <strong>Landmark : </strong>{{ $address->landmark }} <br>
            </div>
        </div>

        {{-- <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options-->

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Shopper Information</p>
                        <form>
                            <input type="text" placeholder="Display Name">
                            <input type="text" placeholder="User Name">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="Confirm password">
                        </form>
                        <a class="btn btn-primary" href="">Get Quotes</a>
                        <a class="btn btn-primary" href="">Continue</a>
                    </div>
                </div>
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>					
            </div>
        </div> --}}
        <div class="step-one">
            <h2 class="heading">Order Review</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($items as $item)

                            <tr>
                                <td class="cart_product">
                                    <img style="width:80px;height:auto" src="{{ url('/storage/' . App\Product_image::where('product_id', $item->id)->first()->product_image) }}" alt="">
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->name }}</a></h4>
                                    <p>Product ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $item->price }}</p>
                                </td>
                                
                                <td class="cart_price">
                                    <p>&nbsp;&times; {{ $item->qty }}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $item->price * $item->qty }}</p>
                                </td>
                            </tr>
                        
                        @endforeach

                    {{-- <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/two.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="images/cart/three.png" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">Colorblock Scuba</a></h4>
                            <p>Web ID: 1089772</p>
                        </td>
                        <td class="cart_price">
                            <p>$59</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="1" autocomplete="off" size="2">
                                <a class="cart_quantity_down" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">$59</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr> --}}
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Cart Sub Total</td>
                                    <td>Rs. {{ Cart::priceTotal() }}</td>
                                </tr>
                                <tr>
                                    <td>Eco Tax</td>
                                    <td>Rs. {{ $taxNo }}</td>
                                </tr>
                                <tr>
                                    <td>Discount</td>
                                    <td> Rs. {{ $discount }}</td>
                                </tr>
                                <tr class="shipping-cost">
                                    <td>Shipping Cost</td>
                                    <td>Rs. {{ $ship }}</td>										
                                </tr>
                                <tr>
                                    <td style="color:#FE980F;"><strong>Total</strong></td>
                                    <td><span>Rs. {{ $total }}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="step-one">
            <h2 class="heading">Select Payment Method</h2>
        </div>
        <div class="payment-options">
            <span>
                <a href="{{ url('/cust/checkout/success') }}" class="btn btn-primary">Cash on Delivery</a>
            </span>
            <span>
                <form action="{{ url('/cust/checkout/paypal') }}" method="post">
                    @csrf
                    {{-- @foreach($items as $item)
                        <input type="hidden" name="items[]" value="{{ $item }}">
                    @endforeach --}}
                    <button class="btn btn-primary">Pay with Paypal</button>
                </form>
            </span>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection