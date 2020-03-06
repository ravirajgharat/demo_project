@extends('layouts.master')

@section('content')
<div class="content-wrapper">
        <div class="container">
            <div class="row">

                    <div class="card-body">
                        <h2>Template {{ $template->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/template') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/template/' . $template->id . '/edit') }}" title="Edit Template"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/template' . '/' . $template->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Template" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td><strong>{{ $template->id }}</strong></td>
                                    </tr><tr><th class="text-primary"> Name </th><td><strong>{{ $template->template_name }}</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-header bg-primary">Email Template</div>
                        <div class="card-body border border-primary">
                            {!! $template->template !!}
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        
@endsection
