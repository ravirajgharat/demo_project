@extends('customer.layouts.parent')

@section('content')




    <section><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1"> 
                    
                    <div class="login-form">                                    <!--login form-->
                        <h2>Login to your account</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- <input type="email" placeholder="Email Address" /> --}}
                            <input type="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="password" placeholder="Password" /> --}}
                            <input type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span>
                                <input type="checkbox" class="checkbox" {{ old('remember') ? 'checked' : '' }}> 
                                Remember Me
                            </span>

                            <button type="submit" class="btn btn-default">Login</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                        <br>
                        <a href="{{ url('/google') }}" class="btn btn-lg btn-block" style="background-color:#4285f4;color:white;">
                            {{-- <i class="fa fa-google"></i> --}}
                            Login With Google
                        </a>
                        <a href="{{ url('/facebook') }}" class="btn btn-lg btn-block" style="background-color:#4267B2;color:white;">
                            {{-- <i class="fa fa-google"></i> --}}
                            Login With Facebook
                        </a>
                        <a href="{{ url('/twitter') }}" class="btn btn-lg btn-block" style="background-color:#00acee;color:white;">
                            {{-- <i class="fa fa-google"></i> --}}
                            Login With Twitter
                        </a>
                    
                    </div><!--/login form-->
                </div>

                <div class="col-sm-1">
                    <h2 class="or" style="margin:200px 0;">OR</h2>
                </div>

                <div class="col-sm-4">
                    <div class="signup-form">                                   <!--sign up form-->
                        <h2>New User Registration!</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- <input type="text" placeholder="First Name"/> --}}
                            <input id="firstname" type="text" placeholder="First Name" class="@error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="text" placeholder="Last Name"/> --}}
                            <input id="lastname" type="text" placeholder="Last Name" class="@error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="email" placeholder="Email Address"/> --}}
                            <input id="register_email" type="email" placeholder="Email Address" class="@error('register_email') is-invalid @enderror" name="register_email" value="{{ old('register_email') }}" required autocomplete="email">
                                @error('register_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="password" placeholder="Password"/> --}}
                            <input id="register_password" type="password" placeholder="Password" class="@error('register_password') is-invalid @enderror" name="register_password" required autocomplete="new-password">
                                @error('register_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="password" placeholder="Retype Password"/> --}}
                            <input id="password-confirm" type="password" placeholder="Retype Password" class="" name="register_password_confirmation" required autocomplete="new-password">

                            <br>
                            <button type="submit" class="btn btn-default">Register</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
    <br>

@endsection
