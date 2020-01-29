@extends('layouts.master')

@section('content')
<div class="content-wrapper">
        <div class="fluid-container">
                
                <div class="card card-primary">
                        <div class="card-header alert-primary">
                          <h3 class="card-title">Create New Product</h3>
                        </div><br>

                        <form method="POST" action="{{ url('/admin/product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.product.form', ['formMode' => 'create'])

                        </form>

                    </div>

                </div>
            </div>
@endsection