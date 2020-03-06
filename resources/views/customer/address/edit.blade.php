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
                    <h2 class="title text-center">Update Address</h2>
                    <br />
                    <br />
                    <form method="POST" action="{{ url('/cust/address/' . $address->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @include ('customer.address.form', ['formMode' => 'edit'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
@endsection