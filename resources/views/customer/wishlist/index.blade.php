@extends('customer.layouts.parent')

@section('content')
  
@if($count)
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
@else
    <div class="container text-center" style="padding:50px;">
        <h2 style="color:gray;">Wishlist is Empty.</h2>
        <a class="btn btn-primary" href="{{ url('/cust/shop') }}">
            Continue Shopping
        </a>
    </div>
@endif

@endsection
