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
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
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
                
                <div class="category-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#shoes" data-toggle="tab">Shoes</a></li>
                            <li><a href="#blazers" data-toggle="tab">Shirts </a></li>
                            <li><a href="#sunglass" data-toggle="tab">Bags</a></li>
                            <li><a href="#kids" data-toggle="tab">Pants</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="shoes" >
                            @foreach($tab_shoes as $ts)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:200px;height:100px;" src="{{ url('/storage/' . $ts->images->first()->product_image) }}" alt="" />
                                                <h2>{{ $ts->price }}</h2>
                                                <p>{{ $ts->product_name }}</p>
                                                <a href="{{ url('cust/product/' . $ts->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="tab-pane fade" id="blazers" >
                            @foreach($tab_shirts as $ts)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:200px;height:100px;" src="{{ url('/storage/' . $ts->images->first()->product_image) }}" alt="" />
                                                <h2>{{ $ts->price }}</h2>
                                                <p>{{ $ts->product_name }}</p>
                                                <a href="{{ url('cust/product/' . $ts->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="tab-pane fade" id="sunglass" >
                            @foreach($tab_backpacks as $ts)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:200px;height:100px;" src="{{ url('/storage/' . $ts->images->first()->product_image) }}" alt="" />
                                                <h2>{{ $ts->price }}</h2>
                                                <p>{{ $ts->product_name }}</p>
                                                <a href="{{ url('cust/product/' . $ts->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="tab-pane fade" id="kids" >
                            @foreach($tab_pants as $ts)
                                <div class="col-sm-3">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:200px;height:100px;" src="{{ url('/storage/' . $ts->images->first()->product_image) }}" alt="" />
                                                <h2>{{ $ts->price }}</h2>
                                                <p>{{ $ts->product_name }}</p>
                                                <a href="{{ url('cust/product/' . $ts->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>
                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                @foreach($rec_act as $ra)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:300px;height:150px;" src="{{ url('/storage/' . $ra->images->first()->product_image) }}" alt="" />
                                                    <h2>{{ $ra->price }}</h2>
                                                    <p>{{ $ra->product_name }}</p>
                                                    <a href="{{ url('cust/product/' . $ra->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="item">
                                @foreach($rec as $r)
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img style="width:300px;height:150px;" src="{{ url('/storage/' . $r->images->first()->product_image) }}" alt="" />
                                                    <h2>{{ $r->price }}</h2>
                                                    <p>{{ $r->product_name }}</p>
                                                    <a href="{{ url('cust/product/' . $r->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>			
                    </div>
                </div><!--/recommended_items-->
            </div>
        </div>
    </div>
</section>
<br>
<!----------------------------------------------- /products -------------------------------------------->

@endsection