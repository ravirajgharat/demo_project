@extends('customer.layouts.parent')

@section('content')

<div class="container">

    <div class="step-one">
        <h2 class="heading">Track Order</h2>
    </div>

    @if ($message = Session::get('error'))

        <div class="alert alert-danger">
            <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
                {!! $message !!}
                <span style="float:right;"><i class="fa fa-times"></i></span>
            </h4>
        </div>
        <?php Session::forget('error');?>
        
    @endif

    <form action="{{ url('/cust/track/status') }}">

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="email">Email address</label>
            </div>
            <div class="col-sm-5">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            @error('email')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="order_id">Order ID</label>
            </div>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="order_id" name="order_id" aria-describedby="ordeidHelp" placeholder="Enter Order ID">
            </div>
            @error('order_id')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <button class="btn btn-primary" style="padding:10px 30px;" type="submit">Get Order Status</button>

    </form>

    <br>

</div>

@endsection