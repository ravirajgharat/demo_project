@component('mail::message')
@component('mail::panel')
<div>
<div style="float:left;width:50%;border-right:dotted;">
<h2>THANK YOU FOR YOUR ORDER FROM INDIA BBT.</h2><br>
<p>You can check the status of your order by <a href="http://localhost/demo_project/public/login">logging into your account</a> or by clicking <a href="http://localhost/demo_project/public/cust/track">here</a>.</p>
</div>
<div style="float:right;width:45%;">
<strong>Call Us:</strong> +91 -22 -40500699<br>
<strong>Email:</strong> info@shoppingcompany.com
</div>
</div>
@endcomponent
<div style="text-align:center;">
<h2>Your Shipment # {{ $order->id }}</h2>
</div>
<table><tr><th style="width:50%;">Tracking Code</th><td style="width:50%;">{{ $order->id }}</td></tr></table>
<br>
<strong>PAYMENT METHOD:</strong> {{ $order->payment_mode }}