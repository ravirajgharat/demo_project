<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>My Account</h2>
            
                
            <div class="brands_products">
                <div class="brands-name">

                    <ul class="nav nav-pills nav-stacked">

                            <li>
                                <a href="{{url('/cust/account/info')}}">
                                    Information
                                </a>
                            </li>

                            <li>
                                <a href="{{url('/cust/address')}}">
                                    My addresses
                                </a>
                            </li>

                            <li>
                                <a href="{{url('/cust/wishlist')}}">
                                    Wishlist <span class="pull-right badge badge-pill badge-success">{{ App\Wishlist::where('user_id', Auth::User()->id)->distinct('product_id')->count() }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{url('/cust/cart')}}">
                                    Cart <span class="pull-right badge badge-pill">{{ Cart::content()->count() }}</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{url('/cust/order')}}">
                                    Previous Orders
                                </a>
                            </li>

                    </ul>

                </div>
            </div>
    </div>
</div>