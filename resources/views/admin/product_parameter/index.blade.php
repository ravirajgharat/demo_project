@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
                    
                    <div class="card-body">
                        <h2>Parameter</h2>
                        <hr>
                        <a href="{{ url('/admin/product_parameter/create') }}" class="btn btn-success btn-sm" title="Add New Product_parameter">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/product_parameter') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Parameter</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product_parameter as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product_parameter }}</td>
                                        <td>
                                            {{-- <a href="{{ url('/admin/product_parameter/' . $item->id) }}" title="View Product_parameter"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a> --}}
                                            <a href="{{ url('/admin/product_parameter/' . $item->id . '/edit') }}" title="Edit Product_parameter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/product_parameter' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product_parameter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $product_parameter->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                
                </div>
            </div>
        </div>
@endsection