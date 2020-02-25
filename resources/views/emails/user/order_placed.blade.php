@component('mail::message')
@component('mail::panel')
<div>
<div style="float:left;width:40%;">
<h2>THANK YOU FOR YOUR ORDER FROM MY SHOPPING CART.</h2><br>
<p>Once your package ships we will send an email with a link to track your order. Your order summary is below. Thank you again for your business.</p>
</div>
<div style="float:right;width:40%;">
<strong>Call Us:</strong> +91 -22 -40500699<br>
<strong>Email:</strong> info@shoppingcompany.com
</div>
</div>
@endcomponent
<div style="text-align:center;">
<h3>Your order # {{ $order->id }}</h3>
<p>Placed on {{ $order->created_at }}</p>    
</div>
<div>
<h3 style="float:right">
Total : {{ $order->order_price }}
</h3>
</div><br>
<span style="color:blue">PAYMENT METHOD:</span> <strong>{{ $order->payment_mode }}</strong>
@endcomponent