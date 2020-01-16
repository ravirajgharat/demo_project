@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            {{--dd($user->roles->first()->name)--}}
            
                    <div class="card-body">
                        <h2>Edit User #{{ $user->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        <form method="POST" action="{{ url('/admin/user/' . $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.user.editForm', ['formMode' => 'edit'])

                        </form>

                    </div>
                
        </div>
    </div>
</div>
@endsection
