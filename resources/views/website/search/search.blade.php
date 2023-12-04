<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search | Super Kabab and Coffee</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}website/img/logo.png">

    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/my_style.css">


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
            /*border: 15px solid #F50099;*/
            border: 15px solid #aa4723;
            font-family: Karla, 'sans-serif';
        }
    </style>

</head>
<body>
<div style="height: 850px;">

    <div class="container-fluid">
        <div class="row mx-auto">
            <div class="col-md-12">
                <form action="{{ route('search.result') }}" method="GET" class="d-flex p-3">
                    @csrf
                    <div class="d-flex w-100">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}" id="search" placeholder="SEARCH STORE" class="form-control border-0 border-white"  />
                        </div>
                        <a href="{{ route('home') }}" class="p-2 justify-content-end">
                            <i class="fa fa-2x fa-xmark text-black"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <p class="text-center fs-3 py-5">{{session('message')}}</p>



    <script src="{{asset('/')}}website/js/all.js"></script>
    <script src="{{asset('/')}}website/js/bootstrap.bundle.js"></script>
    <script src="{{asset('/')}}website/js/fontawesome.js"></script>

</div>
</body>
</html>
