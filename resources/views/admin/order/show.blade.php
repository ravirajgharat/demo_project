@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            
                    <div class="card-body">
                        <h2>Order #{{ $order->id }}</h2>
                        <hr>

                        <a href="{{ url('/admin/order') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        <form method="POST" action="{{ url('admin/order' . '/' . $order->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th>
                                        <td style="width:75%;"><strong>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> User </th>
                                        <td><strong> {{ $order->user->email }} </strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Address </th>
                                        <td>
                                            {{ $order->address->address }} <br>
                                            <strong>City :</strong> {{ $order->address->city }}<br>
                                            <strong>State :</strong> {{ $order->address->state }}<br>
                                            <strong>Pin Code :</strong> {{ $order->address->pin_code }}<br>
                                            <strong>Landmark :</strong> {{ $order->address->landmark }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> 
                                            Order Status
                                            <a href="{{ url('/admin/order/' . $order->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-sm pull-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                        </th>
                                        <td><strong> {{ $order->order_status }} </strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Payment Mode </th>
                                        <td><strong> {{ $order->payment_mode }} </strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Order Total </th>
                                        <td><strong>Rs. {{ $order->order_price }} </strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Coupon Applied </th>
                                        <td><strong> {{ $order->coupon }} </strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Coupon Discount </th>
                                        <td><strong>Rs. {{ $order->discount }} </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead class="thead-dark">
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @foreach($order->details as $detail)

                                            <tr>
                                                <td>{{ $detail->product }}</td>
                                                <td>&nbsp; &times; {{ $detail->quantity }}</td>
                                                <td>Rs. {{ $detail->price }}</td>
                                                <td>Rs. {{ $detail->quantity * $detail->price }}</td>
                                            </tr>
                                            
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                    </div>
                
        </div>
    </div>
</div>
@endsection