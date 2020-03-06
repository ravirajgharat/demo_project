@extends('customer.layouts.parent')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h2>Select Address</h2></div>
                <hr>
                <div class="card-body">
                    @if($address->count() < 4)
                        <form action="{{ url('/cust/checkout/address/add') }}">
                            {{-- <input type="hidden" name="cartTotal" value="{{ $cartTotal }}"> --}}
                            <button type="submit">
                                    <i class="fa fa-plus" class="btn btn-success btn-sm" aria-hidden="true"></i> Add New
                            </button>
                        </form>
                    @endif
                    <br/>
                <form action="{{ url('/cust/checkout/payment') }}">
                    <div class="row">
                        @foreach($address as $item)
                            <div class="col-sm-4" style="margin-bottom:25px;">
                                <div style="border:solid 1px; padding:10px;">
                                    {{ $item->address }} <br>
                                    <strong>City : </strong>{{ $item->city }} <br>
                                    <strong>State : </strong>{{ $item->state }} <br>
                                    <strong>Pin Code : </strong>{{ $item->pin_code }} <br>
                                    <strong>Landmark : </strong>{{ $item->landmark }} <br>
                                    
                                    <label class="btn btn-primary" for="address">
                                        <input type="radio" name="address" value="{{ $item->id }}">
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Proceed To Payment</button>
    </form>
</div>
<br>

@endsection