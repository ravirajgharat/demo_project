@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Template</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Template</li>  
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
                        <!-- <a href="{{ url('/admin/template/create') }}" class="btn btn-success btn-sm" title="Add New Template">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a> -->

                        <form method="GET" action="{{ url('/admin/template') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
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
                            <table class="table table-hover table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Name</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($template as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->template_name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/template/' . $item->id) }}" title="View Template"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/template/' . $item->id . '/edit') }}" title="Edit Template"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/template' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Template" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $template->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
        </div>
    </div>
</div>
@endsection
            
