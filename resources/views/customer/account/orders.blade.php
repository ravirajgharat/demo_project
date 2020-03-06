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
                    <h2 class="title text-center">My Orders</h2>
                    @if($orders)
                        <section id="cart_items">
                            <div class="table-responsive cart_info">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="">ID</td>
                                            <td class="name">Products</td>
                                            <td class="price">Price</td>
                                            <td class="">Status</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->id }}</td>
                                                <td class="cart_description">
                                                    @foreach($order->details as $product)
                                                        <p>{{ $product->product }}</p>
                                                    @endforeach
                                                </td>
                                                <td class="cart_price">
                                                    <p>Rs. {{ $order->order_price }}</p>
                                                </td>
                                                <td>
                                                    <p style="color:#FE980F;">{{ $order->order_status }}</p>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" href="{{ url('/cust/order/'. $order->id) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<br>

@endsection