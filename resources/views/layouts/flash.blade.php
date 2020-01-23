@if(session('success'))
    <div class="fluid-container">
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    </div>
@endif