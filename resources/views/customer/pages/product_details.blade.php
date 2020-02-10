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
                            <a style="padding:15px 50px;" class="btn btn-primary" href="{{ url('/cust/cart/add/' . $product->id) }}">
                                Add To Cart
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <img style="max-width:100%;max-height:auto" src="{{ url('/storage/' . $product->images->first()->product_image) }}" alt="" />
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Important : </h4>
                            <ul class="list-group">
                                @foreach($params as $param)
                                    <li class="list-group-item">{{ $param->product_parameter }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

</div>
</div>
</section>

<!----------------------------------------------- /product details-------------------------------------------->

@endsection