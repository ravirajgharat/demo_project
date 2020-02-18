@extends('customer.layouts.parent')

@section('content')

@if ($message = Session::get('success'))

    <div class="alert alert-success">            
        <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
            {!! $message !!}
            <span style="float:right;"><i class="fa fa-check"></i></span>
        </h4>
    </div>
    <?php Session::forget('success');?>

@endif

<section>
    <div class="container">
        <div class="row">

<!-------------------------------------- sidebar ---------------------------------------------------->

@include('customer.layouts.account_sidebar')

<!----------------------------------------------- /sidebar -------------------------------------------->


<!-------------------------------------- content ---------------------------------------------------->
                
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Order # {{ $order->id }}</h2>

                    <div style="float-left" class="step-one">
                        <h4 class="heading">Order Status : <span style="color:#FE980F;">{{ $order->order_status }}</span></h4>
                    </div>
                    
                    <section id="cart_items">
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="image">Item</td>
                                        <td></td>
                                        <td></td>
                                        <td class="description" style="padding-left:20px;"></td>
                                        <td class="price">Price</td>
                                        <td class="quantity">Quantity</td>
                                        <td class="total">Total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr> --}}
                                        <?php $sum = 0; ?>
                                        @foreach($details as $product)
                                            
                                            <?php
                                                $prod = App\Product::where('product_name', $product->product)->first();
                                                $sum = $sum + $product->price * $product->quantity;
                                            ?>

                                            <tr>
                                                <td class="cart_product">
                                                    <img style="width:100px;height:auto" src="{{ url('/storage/' . App\Product_image::where('product_id', $prod->id)->first()->product_image) }}" alt="">
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td class="cart_description" style="padding-left:20px;">
                                                    <h4><a href="">{{ $product->product }}</a></h4>
                                                    <p>Product ID: {{ $prod->id }}</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>Rs. {{ $product->price }}</p>
                                                </td>
                                                
                                                <td class="cart_quantity">
                                                    <p>&nbsp; &nbsp;&times; {{ $product->quantity }}</p>
                                                </td>
                                                <td class="cart_total">
                                                    <p class="cart_total_price">Rs. {{ $product->price * $product->quantity }}</p>
                                                </td>
                                            </tr>
                                        
                                        @endforeach

                                    <tr>
                                        <td colspan="4">&nbsp;</td>
                                        <td colspan="2">
                                            <table class="table table-condensed total-result">
                                                <tr>
                                                    <td>Placed On</td>
                                                    <td>{{ $order->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Cart Sub Total</td>
                                                    <td>Rs. {{ $sum }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Eco Tax</td>
                                                    <td>Rs. {{ $sum*5/100 }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Coupon Applied</td>
                                                    <td>{{ $order->coupon }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Coupon Discount</td>
                                                    <td> Rs. {{ $order->discount }}</td>
                                                </tr>
                                                <tr class="shipping-cost">
                                                    <td>Shipping Cost</td>
                                                    <td>
                                                        Rs. 
                                                        @if($sum > 500) {{ 0 }}
                                                        @else {{ 50 }}
                                                        @endif
                                                    </td>										
                                                </tr>
                                                <tr>
                                                    <td style="color:#FE980F;"><strong>Total</strong></td>
                                                    <td><span style="color:#FE980F;">Rs. {{ $order->order_price }}</span></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
            
</section>
<br>

@endsection