<div class="offcanvas offcanvas-start" style="width: 300px;" tabindex="-1" id="offcanvasMiddle" aria-labelledby="offcanvasMiddleLabel">
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
            <li>
                <div class="demo-icon text-black" style="font-size: 16px;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="d-flex"> <i class="fa fa-angle-left px-3"></i> <p class="px-5 ms-4">Back</p> </span>
                    </button>
                </div>
            </li>
            <li class="position-static">
                <table class="table table-striped table-responsive rounded-0">
                    <thead>
                        <tr>
                            <th class="fs-6 fw-light">MENU</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>
                                @foreach($categories as $category)
                                    @if($category->status == 1)
                                    <a href="{{ route('menu.page', Crypt::encryptString($category->id) ) }}" class=" nav-link text-black text-uppercase" style="font-size: 14px;">{{$category->name}}</a>
                                    <hr/>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </li>
        </ul>
        <ul class="navbar navbar-nav align-content-start mx-3 my-5">
            <li class="order-border me-1">
                <a href="{{route('order.online')}}" class="nav-link text-pink px-2">ORDER ONLINE</a>
            </li>
        </ul>
    </div>
</div>



