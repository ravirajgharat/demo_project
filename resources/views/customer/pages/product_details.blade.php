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


<!----------------------------------------------- product details -------------------------------------------->
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Product</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="" style="color:#f0900f;">{{ $product->product_name }}</h2>
                            <hr>
                            <p>{{ $product->product_description }}</p>
                            <hr>
                            <h2>Rs. {{ $product->price }}</h2>
                            @if($product->quantity != 0)
                                @if($exist)
                                    <a style="padding:15px 50px;" class="btn btn-primary" href="{{ url('/cust/cart') }}">
                                        Added To Cart
                                    </a>
                                @else
                                    <a style="padding:15px 50px;" class="btn btn-primary" href="{{ url('/cust/cart/add/' . $product->id) }}">
                                        Add To Cart
                                    </a>
                                @endif
                            @else
                                <a style="padding:15px 50px;" class="btn btn-primary">
                                    Out of Stock
                                </a>
                            @endif

                            @if(App\Wishlist::where('user_id', Auth::User()->id)->where('product_id', $product->id)->count())
                                <a style="padding:15px 40px;" class="btn btn-primary" href="{{ url('/cust/wishlist') }}">
                                    Added To Wishlist
                                </a>
                            @else
                                <a style="padding:15px 40px;" class="btn btn-primary" href="{{ url('/cust/wishlist/add/' . $product->id) }}">
                                    Add To Wishlist
                                </a>
                            @endif
                        </div>
                        <div class="col-sm-6">
                            @php $n = 1; @endphp
                            @foreach($product->images as $image)
                                <img class="col-sm-5 col-sm-offset-1" style="height:100px;margin-bottom:20px;" src="{{ url('/storage/' . $image->product_image) }}" alt="" />
                                @if($n++ == 6)
                                    @php break; @endphp
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Important : </h4>
                            <ol>
                                @foreach($params as $param)
                                    <li>{{ $param->product_parameter }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!----------------------------------------------- /product details-------------------------------------------->

@endsection