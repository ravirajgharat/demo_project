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
            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ url('/cust/account/info') }}">
                                @guest @else<i class="fa fa-user"></i>@endguest
                                @guest
                                    {{-- Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span> --}}
                                @else
                                    My Account
                                @endguest
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/cust/wishlist') }}">
                                @guest @else<i class="fa fa-star"></i>@endguest
                                @guest
                                    {{-- Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span> --}}
                                @else
                                    Wishlist <span class="badge badge-pill badge-success">{{ App\Wishlist::where('user_id', Auth::User()->id)->distinct('product_id')->count() }}</span>
                                @endguest
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/cust/cart') }}">
                                @guest @else<i class="fa fa-shopping-cart"></i>@endguest
                                @guest
                                    {{-- Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span> --}}
                                @else 
                                    Cart <span class="badge badge-pill badge-success">{{ Cart::content()->count() }}</span>
                                @endguest
                            </a>
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
                                        <a class="" href="{{ route('logout') }}"
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