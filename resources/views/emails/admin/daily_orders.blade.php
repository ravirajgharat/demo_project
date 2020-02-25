@component('mail::message')
<h1>Today's Orders</h1><br>
<h2>Total Number of Orders Placed : {{ $orders->count() }}</h2>
<hr>
<table border="2px">
<tr><th style="width:20%;">Order ID</th><th style="width:20%;">User ID</th><th style="width:20%;">Price</th><th style="width:20%;">Payment</th></tr>
@foreach($orders as $order)
<tr><td style="text-align:center;">{{ $order->id }}</td><td style="text-align:center;">{{ $order->user_id }}</td><td style="text-align:center;">{{ $order->order_price }}</td><td style="text-align:center;">{{ $order->payment_mode }}</td></tr>
@endforeach
</table>
@endcomponent