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
                    
                    </div><!--/login form-->
                </div>

                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
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
                            <input id="email" type="email" placeholder="Email Address" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="password" placeholder="Password"/> --}}
                            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror

                            {{-- <input type="password" placeholder="Retype Password"/> --}}
                            <input id="password-confirm" type="password" placeholder="Retype Password" class="" name="password_confirmation" required autocomplete="new-password">

                            <button type="submit" class="btn btn-default">Register</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
    <br>

@endsection
