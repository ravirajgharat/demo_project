<!DOCTYPE html>
<html>
<head>

    @include('customer.layouts.stylesheets')

</head>

<body>

    <header id="header">

        @include('customer.layouts.header_top')

        @include('customer.layouts.header_middle')

        @include('customer.layouts.header_bottom')

    </header>

    @yield('content')

    <footer id="footer">

        @include('customer.layouts.footer')

    </footer>
        
    @include('customer.layouts.scripts')  
        
</body>
</html>