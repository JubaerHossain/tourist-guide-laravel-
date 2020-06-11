<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="{{asset('asset/back')}}/images/icon/logo.png">
    <link rel="stylesheet" href="{{asset('assets/frontend')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/toastr.css')}}">
    @yield('style')	
    <style>
    body{
    background-image: url('{{asset('assets/frontend')}}/images/login/login1.jpeg');
    background-repeat: repeat-x;
    animation: slideleft 20000s infinite linear;
    -webkit-animation: slideleft 20000s infinite linear;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-attachment: fixed;
    position: relative;
    min-height: 100vh;background-position: center; 
    }
    .back{background: rgba(0, 0, 0, 0.7);
    min-height: 100vh;}
    </style>
</head>

<body class="body-bg">
<div class="back">
        <div id="preloader">
          <div class="loader"></div>
        </div>
            <div class="container">
                <!-- sidebar menu area end -->
                <!-- main content area start -->
                <div class="main-content">
                    <div class="main-content-inner">                            
                        @yield('content')
                    </div>
                </div>
                <!-- main content area end -->
                <!-- footer area start-->
                <footer class="py-3">
                    <div class="footer-area">
                    <p class="text-center text-white">© Copyright {{ now()->year }}. All right reserved by <a href="{{route('front.home')}}" target="_blank">TouristGuide</a>.</p>
                    </div>
                </footer>
                <!-- footer area end-->
            </div>
</div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="{{asset('asset/back')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/frontend/js/toastr.js')}}"></script>
    {!! Toastr::message() !!}
    <script>
        @if($errors->any())
        @foreach($errors->all() as $error)
        toastr.error('{{ $error }}','Error',{
            closeButton:true,
            progressBar:true,
        });
        @endforeach
        @endif
    </script>
    @yield('script')
</body>

</html>
