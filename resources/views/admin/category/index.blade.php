@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
                <li class="breadcrumb-item active">Category</li>  
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
                        <a href="{{ url('/admin/category/create') }}" class="btn btn-success btn-sm" title="Add New Banner">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/category') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table table-hover table-bordered table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th><th>Category</th><th>Hierarchy</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $item->categoryname }}
                                            {{-- <ul style="list-style:none;">
                                                    <li><strong>{{ $item->categoryname }}</strong></li>
                                                    
                                                    @foreach ($item->childrenCategories as $childCategory)
                                                        <ul style="list-style:none;"> @include('admin.category.child_category', ['child_category' => $childCategory]) </ul>
                                                    @endforeach
                                            </ul> --}}
                                        </td>
                                        <td>
                                            @if(is_object($item->parent)) 
                                                <ul style="list-style:none;">
                                                    <li>{{ $item->parent->categoryname }}</li>
                                                    @foreach($item->parent->categories as $subcat)
                                                        @if($item->categoryname == $subcat->categoryname)
                                                            <ul><strong>{{ $subcat->categoryname }}</strong></ul>
                                                        @else
                                                            <ul>{{ $subcat->categoryname }}</ul>
                                                        @endif
                                                    @endforeach
                                                </ul>  
                                            @else 
                                                <ul style="list-style:none;">
                                                    <li><strong>{{ $item->categoryname }}</strong></li>
                                                    @foreach($item->categories as $subcat)
                                                        <ul>{{ $subcat->categoryname }}</ul>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/category/' . $item->id) }}" title="View Category"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/category/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>

                                            <form method="POST" action="{{ url('/admin/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $category->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                        
                                {{-- @foreach ($categories as $category)
                                    <ul style="list-style:none;">
                                        <li style="list-style:none;"><strong>{{ $category->categoryname }}</strong></li>
                                        
                                        @foreach ($category->childrenCategories as $childCategory)
                                            <ul style="list-style:none;">@include('admin.category.child_category', ['child_category' => $childCategory]) </ul>
                                        @endforeach
                                    </ul>        
                                @endforeach --}}
                                {{-- @foreach ($parents as $category)
                                    <ul style="list-style:none;">
                                        <li style="list-style:none;"><strong>{{ $category->categoryname }}</strong></li>
                                        
                                        @foreach ($category->parentCategories as $parentCategory)
                                            <ul style="list-style:none;"> @include('admin.category.parent_category', ['parent_category' => $parentCategory]) </ul>
                                        @endforeach
                                    </ul>        
                                @endforeach --}}

                </div>
            </div>

        </div>
        
    </div>




    
@endsection
