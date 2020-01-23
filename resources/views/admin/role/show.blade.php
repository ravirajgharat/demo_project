@extends('layouts.master')

@section('content')
<div class="content-wrapper">
        <div class="container">
            <div class="row">

                    <div class="card-body">
                            <h2>Role #{{ $role->id }}</h2>
                            <hr>
                            <a href="{{ url('/admin/role') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            <a href="{{ url('/admin/role/' . $role->id . '/edit') }}" title="Edit Role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
    
                        <form method="POST" action="{{ url('admin/role' . '/' . $role->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Role" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td>{{ $role->id }}</td>
                                    </tr>
                                    <tr><th class="text-primary"> Name </th><td><strong>{{ $role->name }}</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                    
                    </div>
                
                </div>
            </div>
        </div>
        
@endsection
