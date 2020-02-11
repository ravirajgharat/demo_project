@extends('customer.layouts.parent')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h2>Select Address</h2></div>
                    <hr>
                    <div class="card-body">
                        <form action="{{ url('/cust/checkout/address/add') }}">
                            {{-- <input type="hidden" name="cartTotal" value="{{ $cartTotal }}"> --}}
                            <button type="submit">
                                    <i class="fa fa-plus" class="btn btn-primary btn-sm" aria-hidden="true"></i> Add New
                            </button>
                        
                        </form>
                        {{-- <form method="GET" action="{{ url('/cust/address') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form> --}}
                    <form action="{{ url('/cust/checkout/payment') }}">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Select</th><th>Address</th><th>City</th><th>State</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($address as $item)
                                    <tr>
                                        <td><input type="radio" name="address" value="{{ $item->id }}"></td>
                                        <td>{{ $item->address }}</td><td>{{ $item->city }}</td><td>{{ $item->state }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- <div class="pagination-wrapper"> {!! $address->appends(['search' => Request::get('search')])->render() !!} </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
            {{-- <input type="hidden" name="cartTotal" value="{{ $cartTotal }}"> --}}
            <button type="submit" class="btn btn-primary">Proceed To Payment</button>
        </form>
    </div><br>
@endsection