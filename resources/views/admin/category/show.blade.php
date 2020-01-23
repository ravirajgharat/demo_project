@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

                    <div class="card-body">
                        <h2>Category #{{ $category->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/category') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/category/' . $category->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/category' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td><strong>{{ $category->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary"> Category </th><td><strong>{{ $category->categoryname }}</strong></td></tr>
                                    <tr><th class="text-primary"> Parent Category </th>
                                        <td> 
                                            @if(is_object($category->parent))
                                                <strong>{{ $category->parent->categoryname }}</strong>
                                            @else
                                                <strong>Main Category</strong>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
@endsection
