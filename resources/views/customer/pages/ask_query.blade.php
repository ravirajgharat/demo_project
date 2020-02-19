@extends('customer.layouts.parent')

@section('content')

<div class="container">

    <div class="step-one">
        <h2 class="heading">Ask Query</h2>
    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
                {!! $message !!}
                <span style="float:right;"><i class="fa fa-check"></i></span>
            </h4>
        </div>
        <?php Session::forget('error');?>
        
    @endif

    <form action="{{ url('/cust/contact/query') }}">

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="firstname">First Name</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="firstnameHelp" placeholder="Enter First Name">
            </div>
            @error('firstname')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="lastname">Last Name</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp" placeholder="Enter Last Name">
            </div>
            @error('lastname')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="email">Email address</label>
            </div>
            <div class="col-sm-5">
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
            </div>
            @error('email')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="contact">Contact No.</label>
            </div>
            <div class="col-sm-5">
                <input type="number" class="form-control" id="contact" name="contact" aria-describedby="contactHelp" placeholder="Enter Contact No.">
            </div>
            @error('contact')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="query">Message</label>
            </div>
            <div class="col-sm-5">
                <textarea name="query" id="query" cols="40" rows="5" class="form-control" placeholder="Ask Query"></textarea>
            </div>
            @error('query')
                <div class="text-danger col-sm-5">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

        </div>

        <button class="btn btn-primary" style="padding:10px 30px;" type="submit">Submit Query</button>

    </form>

    <br>

</div>

@endsection