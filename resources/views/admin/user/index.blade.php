@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

            
                    <div class="card-body">
                        <h2>Users</h2>
                        <hr>
                        <a href="{{ url('/admin/user/create') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/user') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" id="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($user as $item)
                                    {{-- @if(count($item->roles)) --}}
                                        <tr>
                                            {{--dd(array_keys($item->getRoles())[0])--}}
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->firstname }} {{ $item->lastname }}</td><td>{{ $item->email }}</td><td>{{ $item->roles->first()['name'] }}</td>
                                            <td>
                                                <a href="{{ url('/admin/user/' . $item->id) }}" title="View User"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                                <a href="{{ url('/admin/user/' . $item->id . '/edit') }}" title="Edit User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                                <form method="POST" action="{{ url('/admin/user' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete User" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $user->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
    
@endsection
