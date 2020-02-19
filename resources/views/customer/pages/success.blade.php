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

<div class="container text-center">
    <a href={{ url('/cust/shop') }} class="btn btn-primary">Continue Shopping</a>
</div>
<br>
@endsection