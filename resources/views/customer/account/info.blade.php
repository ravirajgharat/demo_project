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

                        <form action="{{ url('cust/account/info/update') }}">

                            <div class="row form-group">
                                <label for="firstname" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-5">
                                    <input class="form-control" name="firstname" type="text" value="{{ $user->firstname }}">
                                </div>
                                @error('firstname')
                                    <div class="text-danger col-sm-5"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="row form-group">
                                <label for="lastname" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-5">
                                    <input class="form-control" name="lastname" type="text" value="{{ $user->lastname }}">
                                </div>
                                @error('lastname')
                                    <div class="text-danger col-sm-5"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="row form-group">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-5">
                                    <input class="form-control" name="email" type="text" value="{{ $user->email }}">
                                </div>
                                @error('email')
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