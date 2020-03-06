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
                    <button class="btn btn-primary">Pay with Paypal</button>
                </form>
            </span>
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection