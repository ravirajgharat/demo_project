@extends('customer.layouts.parent')

@section('content')

<h4 class="alert alert-success">Order Placed Successfully</h4>

<div class="container text-center">
    <a href={{ url('/cust/shop') }} class="btn btn-primary">Continue Shopping</a>
</div>
<br>
@endsection