@extends('customer.layouts.parent')

@section('content')

<!-------------------------------------- slider ---------------------------------------------------->

@include('customer.layouts.slider')

<!----------------------------------------------- /slider -------------------------------------------->
<section>
    <div class="container">
        <div class="row">
<!----------------------------------------------- sidebar -------------------------------------------->

            @include('customer.layouts.sidebar')

<!----------------------------------------------- /sidebar -------------------------------------------->


<!----------------------------------------------- products -------------------------------------------->

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Featured Items</h2>
                    @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="width:300px;height:150px;" src="{{ url('/storage/' . $product->images->first()->product_image) }}" alt="" />
                                        <h2>Rs. {{ $product->price }}</h2>
                                        <p>{{ $product->product_name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>Rs. {{ $product->price }}</h2>
                                            <p>{{ $product->product_name }}</p>
                                            <a href="{{ url('cust/product/' . $product->id) }}" class="btn btn-default add-to-cart">
                                                <i class="fa fa-eye"></i>
                                                View
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li>
                                            @if(App\Wishlist::where('user_id', Auth::User()->id)->where('product_id', $product->id)->count())
                                            <a href="{{ url('/cust/wishlist') }}">
                                                <i class="fa fa-star"></i>Added to Wishlist
                                            </a>
                                            @else
                                                <a href="{{ url('/cust/wishlist/add/' . $product->id) }}">
                                                    <i class="fa fa-plus-square"></i>Add to Wishlist
                                                </a>
                                            @endif
                                        </li>
                                        @if($product->quantity != 0)
                                            <li>
                                                @if(in_array($product->id, $arr))
                                                    <a href="{{ url('/cust/cart/') }}"><i class="fa fa-shopping-cart"></i>Added to Cart</a>
                                                @else
                                                    <a href="{{ url('/cust/cart/add/' . $product->id) }}"><i class="fa fa-plus-square"></i>Add to Cart</a>
                                                @endif
                                            </li>
                                        @else
                                            <li>
                                                <a><i class="fa fa-frown-o"></i>Out of Stock</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>

<!----------------------------------------------- /products -------------------------------------------->

@endsection