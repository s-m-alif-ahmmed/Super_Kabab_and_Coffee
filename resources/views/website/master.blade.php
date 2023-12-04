<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}website/img/logo.png">
    
    <!--facebook business app verification code-->
    <meta name="facebook-domain-verification" content="ykmcchpi2bvzus4cvbvhx7j6xjb332" />


    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/my_style.css">

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('/')}}admin/assets/plugins/icons/icons.css" rel="stylesheet" />

    <!-- INTERNAL Switcher css -->
    <link href="{{asset('/')}}admin/assets/switcher/css/switcher.css" rel="stylesheet">
    <link href="{{asset('/')}}admin/assets/switcher/demo.css" rel="stylesheet">


    <!--- FONT-ICONS CSS -->
    <link href="{{asset('/')}}website/assets/plugins/icons/icons.css" rel="stylesheet" />


    <style>

            @font-face {
                font-family: Karla;
                src: url("https://superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @if(url()->full() == 'https://superkababandcoffee.com')

            @font-face {
                font-family: Karla;
                src: url("https://superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @endif

        @if(url()->full() == 'https://www.superkababandcoffee.com')

            @font-face {
                font-family: Karla;
                src: url("https://www.superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @endif

        @if(url()->full() == 'www.superkababandcoffee.com')

            @font-face {
                font-family: Karla;
                src: url("www.superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @endif

        @if(url()->full() == 'http://www.superkababandcoffee.com')

            @font-face {
                font-family: Karla;
                src: url("http://www.superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @endif



        @if(url()->full() == 'http://superkababandcoffee.com')

            @font-face {
                font-family: Karla;
                src: url("http://superkababandcoffee.com//website/fonts/Karla/Karla-VariableFont_wght.ttf");
            }

        @endif


        body
        {
            border: 15px solid #aa4723;
            font-family: Karla, 'sans-serif';
        }
    </style>

</head>
<body class="ltr app sidebar-mini">

<!-- app-Header -->
@include('website.include.header')
<!-- /app-Header -->

<!-- PAGE -->
<div class="page">

    @include('website.include.left-side-menu')

    <div class="page-main">

        @yield('content')

    </div>

    @include('website.include.cart')

</div>
<!-- page -->

<!-- FOOTER -->
@include('website.include.footer')
<!-- FOOTER CLOSED -->




<script src="{{asset('/')}}website/js/all.js"></script>
<script src="{{asset('/')}}website/js/bootstrap.bundle.js"></script>
<script src="{{asset('/')}}website/js/fontawesome.js"></script>


<!-- JQUERY JS -->
<script src="{{asset('/')}}admin/assets/plugins/jquery/jquery.min.js"></script>

<!-- Perfect SCROLLBAR JS-->
<script src="{{asset('/')}}admin/assets/plugins/p-scroll/perfect-scrollbar.js"></script>

<!-- SWITCHER JS -->
<script src="{{asset('/')}}admin/assets/switcher/js/switcher.js"></script>



<!-- BOOTSTRAP JS -->
<script src="{{asset('/')}}website/assets/plugins/bootstrap/js/popper.min.js"></script>

<!-- PROFILE JS -->
<script src="{{asset('/')}}website/assets/js/profile.js"></script>


<!-- COLOR THEME JS -->
<script src="{{asset('/')}}website/assets/js/themeColors.js"></script>

<!-- CUSTOM JS -->
<script src="{{asset('/')}}website/assets/js/custom.js"></script>



</body>
</html>
