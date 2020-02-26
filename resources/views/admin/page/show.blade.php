@extends('layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="container">
        <div class="row">

                    <div class="card-body">
                        <h2>Static Page - {{ $page->page }}</h2>
                        <hr>
                        <a href="{{ url('/admin/page') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/page/' . $page->id . '/edit') }}" title="Edit Page"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/page' . '/' . $page->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Page" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $page->id }}</strong></td>
                                    </tr>
                                    <tr><th class="text-primary">Page</th><td><strong>{{ $page->page }}</strong></td></tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-header bg-primary">Page Content</div>
                        <div class="card-body">
                            {!! $page->content !!}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection
