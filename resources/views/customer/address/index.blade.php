@extends('customer.layouts.parent')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><h2>My Addresses</h2></div>
                    <hr>
                    <div class="card-body">
                        <a href="{{ url('/cust/address/create') }}" class="btn btn-success btn-sm" title="Add New Address">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

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

                        <br/>
                        <br/>
                        {{-- <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Address</th><th>City</th><th>State</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($address as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->address }}</td><td>{{ $item->city }}</td><td>{{ $item->state }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/cust/address/' . $item->id . '/edit') }}" title="Edit Address"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/cust/address' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Address" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                        </div>
                        <br> --}}

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
    </div>
    <br> 
@endsection