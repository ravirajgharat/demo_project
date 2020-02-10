<div class="header-middle">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo pull-left">
                    @if(Auth::check())
                        <a href="{{ url('/cust/shop') }}"><img src="{{ asset('customer/images/home/logo.png') }}" alt="" /></a>
                    @else
                        <a href="{{ url('/') }}"><img src="{{ asset('customer/images/home/logo.png') }}" alt="" /></a>
                    @endif
                </div>
                <div class="btn-group pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            USA
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canada</a></li>
                            <li><a href="#">UK</a></li>
                        </ul>
                    </div>
                    
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                            DOLLAR
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">Canadian Dollar</a></li>
                            <li><a href="#">Pound</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                        <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                        <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                        <li>
                            <a href="{{ url('/cust/cart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                @guest
                                    Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span>
                                @else 
                                    Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span>
                                @endguest
                            </a>
                        </li>
                        <li>
                                @guest
                                @else
                                    <a href="{{ url('/cust/address') }}"><i class="fa fa-map-marker"></i>My Addresses</a>
                                @endguest
                        </li>
                        <li>
                            
                                
                            @guest
                                <a href="{{ url('/login') }}">
                                    <i class="fa fa-lock"></i> 
                                    Login
                                </a>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                                    </a>
                
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest

                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>