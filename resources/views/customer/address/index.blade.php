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

<section>
    <div class="container">
        <div class="row">

<!-------------------------------------- sidebar ---------------------------------------------------->

@include('customer.layouts.account_sidebar')

<!----------------------------------------------- /sidebar -------------------------------------------->


<!-------------------------------------- content ---------------------------------------------------->
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">My Addresses</h2>
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
                        <a href="{{ url('/cust/address/create') }}" class="btn btn-primary btn-sm" title="Add New Address">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        
                        <div class="row">

                            @foreach($address as $item)
                            
                                <div class="col-sm-4" style="margin-bottom:25px;">
                                    <div style="border:solid 1px; padding:10px;">
                                        {{ $item->address }} <br>
                                        <strong>City : </strong>{{ $item->city }} <br>
                                        <strong>State : </strong>{{ $item->state }} <br>
                                        <strong>Pin Code : </strong>{{ $item->pin_code }} <br>
                                        <strong>Landmark : </strong>{{ $item->landmark }} <br>
                                        <br>
                                        <a href="{{ url('/cust/address/' . $item->id . '/edit') }}" title="Edit Address"><button class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
                                        <form method="POST" action="{{ url('/cust/address' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            
                            @endforeach

                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

@endsection
