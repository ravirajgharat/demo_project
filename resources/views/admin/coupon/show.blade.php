@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            
                    <div class="card-body">
                        <h2>Coupon #{{ $coupon->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/coupon') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/coupon/' . $coupon->id . '/edit') }}" title="Edit Coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/coupon' . '/' . $coupon->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $coupon->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary"> Coupon Code </th><td><strong>{{ $coupon->coupon_code }}</strong></td></tr>
                                    <tr><th class="text-primary"> Discount </th><td><strong>@if(!$coupon->format)Rs. @endif {{ $coupon->discount }} @if($coupon->format) % @endif</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
@endsection