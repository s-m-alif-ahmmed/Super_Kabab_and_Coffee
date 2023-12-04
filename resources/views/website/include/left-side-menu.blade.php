<div class="offcanvas offcanvas-start" style="width: 300px;" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
    <div class="offcanvas-header">
        <div class="row mt-3">
            <div class="col-12 d-flex">
                <div class="col-6 ">
                    <a href="{{route('search')}}" class="nav-link nav-hover text-black justify-content-start" style="font-size: 16px;">Search</a>
                </div>
                <div class="col-6 ">
                    @if(isset(Auth::user()->id))
                        <a href="{{route('login')}}" class="nav-link nav-hover text-black text-end" style="font-size: 16px; margin-left: 280%;">Account</a>
                    @else
                        <a href="{{route('login')}}" class="nav-link nav-hover text-black text-end" style="font-size: 16px; margin-left: 280%;">Account</a>
                    @endif
                </div>
            </div>
        </div>
        <button type="button" class="btn-close mt-1" data-bs-dismiss="offcanvas" aria-label="Close" style="margin-left: 66%"></button>
    </div>
    <div class="offcanvas-body p-0">
        <hr/>
        <ul class="navbar-nav fs-5">
            <li class="py-2">
                <a href="{{route('home')}}" class="nav-link nav-hover text-black mx-3" style="font-size: 14px;">HOME</a>
            </li>
            <li class="dropdown dropdown-mega position-static py-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMiddle" aria-controls="offcanvasMiddle" aria-expanded="false" aria-label="Toggle navigation">
                    <a class="nav-link nav-hover text-black mx-3" href="#" data-bs-auto-close="outside" style="font-size: 14px;">MENU <i class="fa fa-angle-left fa-rotate-180 mx-1 float-end"></i> </a>
                </button>
            </li>
            <li class="py-2">
                <a href="{{route('story')}}" class="nav-link nav-hover text-black mx-3" style="font-size: 14px;">OUR STORY</a>
            </li>
        </ul>
        <ul class="navbar navbar-nav align-content-start mx-3 my-5">
            <li class="order-border me-1">
                <a href="{{route('order.online')}}" class="nav-link text-pink px-2">ORDER ONLINE</a>
            </li>
        </ul>
    </div>
</div>

@include('website.include.middle-side')



