<div class="header-bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li>
                            @if(Auth::check())
                                <a href="{{ url('/cust/shop') }}" class="active">Home</a>
                            @else
                                <a href="{{ url('/') }}" class="active">Home</a>
                            @endif
                        </li>
                        @guest
                        @else
                            <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/cust/account/info') }}">Account</a></li>
                                    <li><a href="{{ url('/cust/wishlist') }}">Wishlist</a></li> 
                                    <li><a href="{{ url('/cust/address') }}">Address</a></li> 
                                    <li><a href="{{ url('/cust/cart') }}">Cart</a></li>
                                </ul>
                            </li>
                        @endguest
                        @guest
                            <li>
                                <a href="{{ url('/cust/track') }}">
                                    Track Order
                                </a>
                            </li>
                        @endguest
                        {{-- <li><a href="404.html">404</a></li> --}}
                        <li><a href="{{ url('/cust/contact') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="search_box pull-right">
                    <input type="text" placeholder="Search"/>
                </div>
            </div>
        </div>
    </div>
</div>