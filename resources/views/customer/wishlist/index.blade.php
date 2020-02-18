@extends('customer.layouts.parent')

@section('content')
    {{-- <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Wishlist</div>
                    <div class="card-body">

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Product Id</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlist as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->product_id }}</td>
                                        <td>
                                            <a href="{{ url('/cust/wishlist/' . $item->id) }}" title="View Wishlist"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/cust/wishlist/' . $item->id . '/edit') }}" title="Edit Wishlist"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/cust/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Wishlist" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $wishlist->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@if($wishlist)
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="name"></td>
                            <td class="price">Price</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($wishlist as $wislist_item)

                            <?php
                                $item = App\Product::find($wislist_item->product_id);
                            ?>

                            <tr>
                                <td class="cart_product">
                                    <img style="width:100px;height:auto" src="{{ url('/storage/' . App\Product_image::where('product_id', $item->id)->first()->product_image) }}" alt="">
                                </td>
                                <td class="cart_description">
                                <h4><a href="{{ url('/cust/wishlist/' . $item->id) }}">{{ $item->product_name }}</a></h4>
                                    <p>Product ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $item->price }}</p>
                                </td>
                                <td>
                                    <form method="POST" action="{{ url('/cust/wishlist' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-default btn-sm" title="Delete Wishlist" onclick="return confirm(&quot;Are you sure you want to remove product from wishlist?&quot;)"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                     
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        
    </section>
@endif

@endsection
