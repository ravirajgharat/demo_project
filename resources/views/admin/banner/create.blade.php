@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

            
                    <div class="card-body">
                        <h2>Create New Banner</h2>
                        <hr>
                        <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        {{-- @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif --}}

                        <form method="POST" action="{{ url('/admin/banner') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.banner.form', ['formMode' => 'create'])

                        </form>

                    </div>
                
        </div>
    </div>
</div>
@endsection
