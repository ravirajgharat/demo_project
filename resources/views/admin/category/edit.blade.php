@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="fluid-container">
                
                        
                            <div class="card card-primary">
                                    <div class="card-header alert-primary">
                                        <h3 class="card-title">Edit Category #{{ $category->id }}</h3>
                                    </div><br>

                        <form method="POST" action="{{ url('/admin/category/' . $category->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.category.editForm', ['formMode' => 'edit'])

                        </form>

                    </div>
               
    </div>
</div>
@endsection
