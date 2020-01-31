@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

                    <div class="card-body">
                        <h2>Product_parameter #{{ $product_parameter->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/product_parameter') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product_parameter/' . $product_parameter->id . '/edit') }}" title="Edit Product_parameter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/product_parameter' . '/' . $product_parameter->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product_parameter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $product_parameter->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary"> Product Parameter </th><td><strong>{{ $product_parameter->product_parameter }}</strong></td></tr>
                                    {{-- <tr><th class="text-primary"> Product Id </th><td> {{ $product_parameter->product_id }} </td></tr> --}}
                                </tbody>
                            </table>
                        </div>

                    </div>

        </div>
    </div>
</div>
@endsection
