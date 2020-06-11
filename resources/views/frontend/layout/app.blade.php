<!DOCTYPE html>
<html lang="en">  
<head>
    @include('frontend.partials.head')
    @stack('css')
</head>
<body>
    @include('frontend.partials.header')

    @yield('content')

    @include('frontend.partials.footer')

    @include('frontend.partials.script')
    
    @stack('js')
</body>
</html>