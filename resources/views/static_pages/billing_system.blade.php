@extends('customer.layouts.parent')

@section('content')

<div class="container">
    <div class="step-one">
        <h2 class="heading">Billing System</h2>
    </div>
    <div>
        {!! $page->content !!}
    </div>
    <br>
</div>

@endsection