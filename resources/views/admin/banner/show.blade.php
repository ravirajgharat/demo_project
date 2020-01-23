@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
           
                    <div class="card-body">
                        <h2>Banner #{{ $banner->id }}</h2>
                        <hr>
                        <a href="{{ url('/admin/banner') }}" title="Back"><button class="btn btn-default btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/banner/' . $banner->id . '/edit') }}" title="Edit Banner"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/banner' . '/' . $banner->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Banner" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width:25%;" class="text-primary">ID</th><td style="width:75%;"><strong>{{ $banner->id }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Banner Name </th>
                                        <td><strong>{{ $banner->bannername }}</strong></td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary"> Banner Image </th>
                                        <td> <img src="{{ url('/storage/' . $banner->bannerimage) }}" style="max-width:100%; height:auto;"> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                
        </div>
    </div>
</div>
@endsection
