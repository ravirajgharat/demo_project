{{-- @if(session('success'))
    <div class="fluid-container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif --}}

@if ($message = Session::get('flash_message'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{{ $message }}</strong>
    </div>
@endif