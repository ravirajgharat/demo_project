@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            
                    <div class="card-body">
                        <h2>Query #{{ $query->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/contact') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        {{-- <a href="{{ url('/admin/configuration/' . $configuration->id . '/edit') }}" title="Edit Configuration"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> --}}

                        <form method="POST" action="{{ url('admin/contact' . '/' . $query->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Query" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $query->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary"> Name </th><td><strong>{{ $query->firstname }} {{ $query->lastname }}</strong></td></tr>
                                    <tr><th class="text-primary"> Email </th><td><strong>{{ $query->email }}</strong></td></tr>
                                    <tr><th class="text-primary"> Contact No. </th><td><strong>{{ $query->contact }}</strong></td></tr>
                                    <tr><th class="text-primary"> Query </th><td><p>{{ $query->query }}</p></td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                
        </div>
    </div>
</div>
@endsection