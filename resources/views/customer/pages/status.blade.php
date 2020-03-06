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

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
            {!! $message !!}
            <span style="float:right;"><i class="fa fa-times"></i></span>
        </h4>
    </div>
    <?php Session::forget('error');?>  
@endif

<div class="container text-center">
    <a href="{{ url('/cust/shop') }}" class="btn btn-primary" style="padding:10px 30px;">
        Continue Shopping
    </a>
</div>
<br>

@endsection