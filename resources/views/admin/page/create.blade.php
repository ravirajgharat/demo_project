@extends('layouts.master')

@section('content')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<div class="content-wrapper">
    <div class="fluid-container">
            
            <div class="card card-primary">
                    <div class="card-header bg-primary pb-1">
                    <h3 class="card-title">Create New Static Page</h3>
                    </div><br>

                        <form method="POST" action="{{ url('/admin/page') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.page.form', ['formMode' => 'create'])

                        </form>

                    </div>

    </div>
</div>
@endsection