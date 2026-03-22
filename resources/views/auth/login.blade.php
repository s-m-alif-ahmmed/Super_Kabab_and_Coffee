@extends('website.master')

@section('title')
    @if(isset(Auth::user()->id))
        Dashboard | Super Kabab and Coffee
    @else
        Login Page | Super Kabab and Coffee
    @endif
@endsection

@section('content')

    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                @if(isset(Auth::user()->id))
                    <div class="col-md-7 mx-auto">
                        <div class="card rounded-0 border-0">
                            <div class="card-header text-center border-0 fs-3 fw-bolder">My Account</div>
                            <div class="card-body border-0 text-muted">
                                <div class="from-row">
                                    <label class="form-row"><p class="d-flex"><a href="{{route('home')}}" class="text-decoration-underline nav-link small">Home</a>  &nbsp; /  &nbsp; <span >Account</span></p></label>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-md-6 text-black fs-5 text-muted">{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</label>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-md-6 text-muted">{{ Auth::user()->email }}</label>
                                </div>
                                <div class="row mb-2">
                                    <label class="col-md-6 text-muted">, Bangladesh</label>
                                </div>
                                <div class="from-row mb-2">
                                    <label class="form-row"><p><a href="{{route('address.create')}}" class="text-decoration-underline nav-link fs-6">VIEW ADDRESSES</a></p></label>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-md-6 fs-5">Orders</label>
                                </div>
                                <div class="row mb-4">
                                    @php
                                        $myOrders = \App\Models\Order::where('user_id', Auth::user()->id)->get();
                                    @endphp

                                    @if($myOrders->isEmpty())
                                        <label class="col-md-6">You haven't placed any orders yet.</label>
                                    @else
                                        <div class="table-responsive ms-1">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th> Order Date </th>
                                                    <th> Order ID </th>
                                                    <th> Order Status </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($myOrders as $order)
                                                    <tr>
                                                        <td class="text-muted">
                                                            {{ date('d-m-y', strtotime($order->created_at)) }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('order.detail', Crypt::encryptString($order->id)) }}" class="text-decoration-none text-muted">
                                                                {{ $order->tracking_id }}
                                                            </a>
                                                        </td>
                                                        <td class="text-muted">
                                                            @if($order->status == 0)
                                                                Pending
                                                            @elseif($order->status == 1)
                                                                Completed
                                                            @elseif($order->status == 2)
                                                                Canceled
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                                <div class="row  mb-2">
                                    <label class="col-md-3"></label>
                                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                                        @csrf
                                        @method('POST')
                                        <a href="" class="text-decoration-underline nav-link" onclick="event.preventDefault(); document.getElementById('logoutForm').submit(); ">Log Out</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-7 mx-auto">
                        <div class="card rounded-0 border-0">
                            <div class="card-header text-center border-0 fs-3 fw-bolder">Login</div>

{{--                            <x-validation-errors class="mb-4" />--}}

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="card-body border-0">
                                <form method="POST" action="{{route('login')}}">
                                    @csrf

                                    <div class="mb-4 pb-3 border-bottom">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="fw-bold mb-2 small text-muted text-uppercase">Demo Access</p>
                                                <div class="table-responsive">
                                                    <table class="table table-sm table-bordered mb-0" style="font-size: 13px;">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th>Role</th>
                                                                <th>Email</th>
                                                                <th>Password</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="fw-bold">Admin</td>
                                                                <td>admin@admin.com</td>
                                                                <td>12345678</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="fw-bold">User</td>
                                                                <td>user@gmail.com</td>
                                                                <td>12345678</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-3">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control" name="email" required/>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-md-3">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" class="form-control" name="password" required/>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="submit" class="btn bg-color text-white rounded-0 px-4" value="LOGIN"/>
                                            <a href="{{route('register')}}" class="btn btn-border text-black rounded-0 px-4">SIGN UP</a>
                                        </div>
                                        @if (Route::has('password.request'))
                                        <div class="col-md-6 text-end pt-2">
                                            <a href="{{route('password.request')}}" class="text-decoration-none ">Forget your password</a>
                                        </div>
                                        @endif
                                    </div>

                                    <!-- <hr/> -->

                                    <!-- <div class="row mb-2 col-md-5 mx-auto">
                                        <a href="/auth/facebook/redirect" class="btn btn-primary">
                                            <span>
                                                <i class="fa-brands fa-facebook-f" style="color: #ebedef;"></i>
                                                SIGN IN WITH FACEBOOK
                                            </span>
                                        </a>
                                    </div>
                                    <div class="row mb-2 col-md-5 mx-auto">
                                        <a href="/auth/google/redirect" class="btn btn-danger">
                                            <span>
                                                <i class="fa-brands fa-google"></i>
                                                SIGN IN WITH GOOGLE
                                            </span>
                                        </a>
                                    </div> -->

                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

