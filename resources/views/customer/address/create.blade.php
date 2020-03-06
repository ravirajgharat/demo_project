@extends('customer.layouts.parent')

@section('content')

<section>
    <div class="container">
        <div class="row">

<!-------------------------------------- sidebar ---------------------------------------------------->

@include('customer.layouts.account_sidebar')

<!----------------------------------------------- /sidebar -------------------------------------------->


<!-------------------------------------- content ---------------------------------------------------->
                
            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Add Address</h2>
                    <a href="{{ url('/cust/address') }}" title="Back"><button class="btn btn-primary btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <br />
                    <br />
                    <form method="POST" action="{{ url('/cust/address') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @include ('customer.address.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@endsection