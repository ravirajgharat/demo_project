@extends('customer.layouts.parent')

@section('content')

<div class="container">
    <div class="step-one">
        <h2 class="heading">Partners</h2>
    </div>
    <div class="text-center">
        {!! $page->content !!}
    </div>
    <br>
</div>

@endsection