@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="fluid-container">
            
                    
                        <div class="card card-primary">
                                <div class="card-header alert-primary">
                                    <h3 class="card-title">Edit Coupon #{{ $coupon->id }}</h3>
                                </div><br>

                        <form method="POST" action="{{ url('/admin/coupon/' . $coupon->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.coupon.form', ['formMode' => 'edit'])

                        </form>

                    </div>
               
    </div>
</div>
@endsection