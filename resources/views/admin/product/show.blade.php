@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">

                    <div class="card-body">
                        <h2>Product {{ $product->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                    <tr><th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $product->id }}</td></tr>
                                    <tr><th class="text-primary"> Product </th><td><strong>{{ $product->product_name }}</strong></td></tr>
                                    <tr><th class="text-primary"> Description </th><td> {!! $product->product_description !!} </td></tr>
                                    <tr><th class="text-primary"> Price </th><td><strong>{{ $product->price }}</strong></td></tr>
                                    <tr><th class="text-primary"> Category </th><td><strong>@if(is_object($product->category)){{ $product->category->categoryname }} @else Main Category @endif</strong></td></tr>
                                    <tr>
                                        <th class="text-primary"> Parameters </th>
                                        <td>
                                            @foreach($product->parameters->unique('product_parameter    ') as $par)
                                                <strong> {{ $par->product_parameter }}</strong><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Images </th>
                                        <td>
                                            @foreach($product->images as $image)
                                                <div style="float:left;">
                                                    <img style="width:150px;" src="{{ url('/storage/' . $image->product_image) }}" alt="">
                                                </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
        </div>
    </div>
</div>
@endsection