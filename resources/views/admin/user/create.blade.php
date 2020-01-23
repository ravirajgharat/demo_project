@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="fluid-container">
        

                    <div class="card card-primary">
                        <div class="card-header alert-primary">
                          <h3 class="card-title">Create New User</h3>
                        </div><br>
                        
                            <form class="form-horizontal" method="POST" action="{{ url('/admin/user') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @include ('admin.user.form', ['formMode' => 'create'])

                            </form>    
                    </div>

        
    </div>
</div>

@endsection
