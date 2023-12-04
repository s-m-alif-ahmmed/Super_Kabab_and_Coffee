@extends('website.master')

@section('title')
    Sign Up Page | Super Kabab and Coffee
@endsection

@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="card border-0">
                        <div class="card-header border-0 text-center fw-bolder fs-3">Create Account</div>
                        <div class="card-body border-0">
                            <form method="POST" action="{{route('register')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="first_name" required autofocus autocomplete="first_name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="last_name" required autofocus autocomplete="last_name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Email Address</label>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password" required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">Confirm Password</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control" name="password_confirmation"  required autocomplete="new-password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-outline-success rounded-0" value="SIGN UP"/>
                                        <a href="{{route('login')}}" class="btn rounded-0" style="border: 2px solid darkslategrey">LOGIN</a>
                                    </div>
                                </div>

                                <hr/>

                                <div class="row mb-2 col-md-5 mx-auto">
                                    <a href="/auth/facebook/redirect" class="btn btn-primary">
                                            <span>
                                                <i class="fa-brands fa-facebook-f" style="color: #ebedef;"></i>
                                                SIGN UP WITH FACEBOOK
                                            </span>
                                    </a>
                                </div>
                                <div class="row mb-2 col-md-5 mx-auto">
                                    <a href="/auth/google/redirect" class="btn btn-danger">
                                            <span>
                                                <i class="fa-brands fa-google"></i>
                                                SIGN UP WITH GOOGLE
                                            </span>
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
