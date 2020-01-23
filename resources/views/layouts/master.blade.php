<!DOCTYPE html>
<html>
<head>

    @include('layouts.stylesheets')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layouts.navbar')

        @include('layouts.sidebar') 
        
        {{-- @include('layouts.flash')  --}}

        @yield('content')
    
        @include('layouts.footer')
    
    </div>
        
    @include('layouts.scripts')  
        
</body>
</html>
               