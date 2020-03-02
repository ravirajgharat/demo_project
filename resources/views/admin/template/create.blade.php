@extends('layouts.master')

@section('content')
<div class="content-wrapper">
        <div class="fluid-container">
            
    
                        <div class="card card-primary">
                            <div class="card-header bg-primary pb-1">
                              <h3 class="card-title">Create New Template</h3>
                            </div><br>

                        <form method="POST" action="{{ url('/admin/template') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('admin.template.form', ['formMode' => 'create'])

                        </form>

                    </div>

        
                </div>
            </div>
</div>
@endsection
