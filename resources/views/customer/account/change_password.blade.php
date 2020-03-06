@extends('customer.layouts.parent')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">            
        <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
            {!! $message !!}
            <span style="float:right;"><i class="fa fa-check"></i></span>
        </h4>
    </div>
    <?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">            
        <h4 style="padding-top:10px;" id="id1" onclick="this.parentElement.style.display='none'">
            {!! $message !!}
            <span style="float:right;"><i class="fa fa-times"></i></span>
        </h4>
    </div>
    <?php Session::forget('success');?>
@endif

<section>
    <div class="container">
        <div class="row">

<!-------------------------------------- sidebar ---------------------------------------------------->

@include('customer.layouts.account_sidebar')

<!----------------------------------------------- /sidebar -------------------------------------------->


<!-------------------------------------- content ---------------------------------------------------->
                
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Information</h2>

                    <form action="{{ url('cust/account/password/update') }}">

                        <div class="row form-group">
                            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" name="current_password" type="password" placeholder="Enter Current Password">
                            </div>
                            @error('current_password')
                                <div class="text-danger col-sm-5"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" name="new_password" type="password" placeholder="Enter New Password">
                            </div>
                            @error('new_password')
                                <div class="text-danger col-sm-5"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>

                        <div class="row form-group">
                            <label for="new_password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" name="new_password_confirmation" type="password" placeholder="Re-Enter New Password">
                            </div>
                            @error('new_password_confirmation')
                                <div class="text-danger col-sm-5"><strong>{{ $message }}</strong></div>
                            @enderror
                        </div>
                        <button class="btn btn-primary" style="padding:10px 30px;" type="submit">Update</button>
                        
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection