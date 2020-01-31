<!DOCTYPE html>
<html>
<head>

    @include('customer.stylesheets')

</head>

<body>

    <header id="header">

        @include('customer.header_top')

        @include('customer.header_middle')

        @include('customer.header_bottom')

    </header>

    @yield('content')

    <footer id="footer">

        @include('customer.footer')

    </footer>
        
    @include('customer.scripts')  
        
</body>
</html>