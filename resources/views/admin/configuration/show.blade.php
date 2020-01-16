@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            
                    <div class="card-body">
                        <h2>Configuration #{{ $configuration->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/configuration') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/configuration/' . $configuration->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/configuration' . '/' . $configuration->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Configuration" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $configuration->id }}</td>
                                    </tr>
                                    <tr><th> Configuration Name </th><td> {{ $configuration->configname }} </td></tr><tr><th> Configuration Value </th><td> {{ $configuration->configvalue }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
@endsection
