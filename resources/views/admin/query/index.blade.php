@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
                    
                    <div class="card-body">
                        <h2>User Queries</h2>
                        <hr>        
                        {{-- <a href="{{ url('/admin/configuration/create') }}" class="btn btn-success btn-sm" title="Add New Configuration">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> --}}

                        <form method="GET" action="{{ url('/admin/contact') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" onkeyup="search()" name="search" placeholder="Search..." id="myInput">
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
                            <table class="table table-hover table-bordered table-striped" id="myTable ">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Name</th><th>Email</th><th>Contact No.</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($query as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->firstname }} {{ $item->lastname }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->contact }}</td>
                                        <td>
                                            <a href="{{ url('/admin/contact/' . $item->id) }}" title="View Contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            {{-- <a href="{{ url('/admin/configuration/' . $item->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a> --}}

                                            <form method="POST" action="{{ url('/admin/contact' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $query->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                
        </div>
    </div>
</div>

@endsection