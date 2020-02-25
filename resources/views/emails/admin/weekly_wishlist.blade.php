@component('mail::message')
<h1>This week's Wishlist Items</h1><br>
<h2>Total Number of Wishlist Items : {{ $items->count() }}</h2>
<hr>
<table border="2px">
<tr><th style="width:20%;">User ID</th><th style="width:20%;">Product ID</th></tr>
@foreach($items as $item)
<tr><td style="text-align:center;">{{ $item->user_id }}</td><td style="text-align:center;">{{ $item->product_id }}</td></tr>
@endforeach
</table>
@endcomponent