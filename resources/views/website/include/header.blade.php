{{--only home page show--}}

@if(url()->full() == 'https://superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif

@if(url()->full() == 'https://www.superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif

@if(url()->full() == 'www.superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif


@if(url()->full() == 'superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif

@if(url()->full() == 'http://www.superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif


@if(url()->full() == 'http://superkababandcoffee.com')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif


@if(url()->full() == 'https://www.superkababandcoffee.com/?fbclid=IwAR0ymd3lIHuRu_2g6X8OWRKKb5JoqSzgUPwDZb6gPKw0F6JKnBbspuW_s5o')
    <div class="banner"></div>
    <div class="container-fluid py-3 pt-4" style="background-color: #aa4723;">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center text-white" style="font-size: 14px;">
                <p>OPEN FOR PICKUPS AND DELIVERIES 12PM TO 11PM. CALL +8801705048030, +8801923281111, +8801672498561 OR <br/> ORDER ONLINE!</p>
            </div>
        </div>
    </div>
@endif



<nav class="navbar navbar-expand-md bg-body-tertiary">
    <div class="container-fluid" >
        <div class="demo-icon text-black" style="font-size: 16px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
            <button class="navbar-toggler p-1" type="button" style="font-size: 11px;" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
        </div>
        <ul class="navbar-nav fs-5 collapse navbar-collapse">
            <li>
                <a href="{{route('home')}}" class="nav-link nav-hover text-black mx-3" style="font-size: 14px;">HOME</a>
            </li>
            <li class="dropdown dropdown-mega position-static">
                <a class="nav-link nav-hover text-black mx-3" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" style="font-size: 14px;">MENU <i class="fa fa-angle-left fa-rotate-270 mx-1"></i> </a>
                <div class="dropdown-menu rounded-0 border-0 pt-5">
                    <div class="mega-content px-2">
                        <div class="container">
                            <div class="row">
                                @foreach($categories as $category)
                                    @if($category->status == 1)
                                    <div class="col-12 col-sm-4 col-md-4 py-2">
                                        <a href="{{ route('menu.page', Crypt::encryptString($category->id) ) }}" class=" nav-link text-black text-uppercase" style="font-size: 14px;">{{$category->name}}</a>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{route('story')}}" class="nav-link nav-hover text-black mx-3" style="font-size: 14px;">OUR STORY</a>
            </li>
        </ul>
        <div class="nav mx-auto pe-sm-5" >
            <a href="{{ route('home') }}">
                <img src="{{asset('/')}}website/img/logo.png" class="pe-md-3" style="height: 120px;">
            </a>
        </div>
        <ul class="navbar navbar-nav justify-content-end collapse navbar-collapse">
            @if(isset(Auth::user()->id))
                <li>
                    <a href="{{route('login')}}" class="nav-link text-black" style="font-size: 16px">Account</a>
                </li>
            @else
                <li>
                    <a href="{{route('login')}}" class="nav-link text-black" style="font-size: 16px">Account</a>
                </li>
            @endif
            <li>
            <li class=" m-2">
                <a href="{{route('search')}}">
                    <i class="fa fa-search text-black" style="font-size: 22px;"></i>
                </a>
            </li>
            <li class="order-border me-1">
                <a href="{{route('order.online')}}" class="nav-link text-dark">ORDER ONLINE</a>
            </li>
        </ul>
        <div class="demo-icon text-black icon-bag justify-content-end pe-3" style="font-size: 22px; margin-right: -15px" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"></div>
    </div>
</nav>

