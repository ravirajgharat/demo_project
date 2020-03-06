@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Query</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Query</li>  
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
          <hr>
        </div><!-- /.container-fluid -->
      </div>
    <!-- /.content-header -->
    <div class="container-fluid">
        <div class="row">
                    
                    <div class="card-body">        
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
                                        <th>#</th><th>Name</th><th>Email</th><th>Contact No.</th><th>Reply</th><th>Actions</th>
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
                                            @if($item->reply) <i class="fa fa-check text-success" aria-hidden="true"></i>
                                            @else <i class="fa fa-times text-danger" aria-hidden="true"></i>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/contact/' . $item->id) }}" title="View Contact"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            {{-- <a href="{{ url('/admin/contact/' . $item->id . '/reply') }}" title="Reply"><button class="btn btn-primary btn-sm"><i class="fa fa-reply" aria-hidden="true"></i></button></a> --}}

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