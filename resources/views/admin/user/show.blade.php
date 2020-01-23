@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

            
                    <div class="card-body">
                        <h2>User #{{ $user->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/user') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/user/' . $user->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/user' . '/' . $user->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $user->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary"> Firstname </th><td><strong>{{ $user->firstname }}</strong></td></tr>
                                    <tr><th class="text-primary"> Lastname </th><td><strong>{{ $user->lastname }}</strong></td></tr>
                                    <tr><th class="text-primary"> Email </th><td><strong>{{ $user->email }}</strong></td></tr>
                                    <tr><th class="text-primary"> Role </th><td><strong>{{ $user->roles->first()['name'] }}</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                
        </div>
    </div>
</div>

@endsection
