@extends('admin.master')

@section('title')
    Admin Dashboard | Super Kabab and Coffee
@endsection


@section('content')
    <section class="py-5">



        <!-- PAGE -->
        <div class="page">
            <div class="page-main">

                <!-- CONTAINER -->
                <div class="main-container container-fluid">

                    <!-- ROW-1 OPEN -->
                    <div class="row" id="user-profile">
                        <div class="col-lg-12">
                            <div class="tab-content">

                                <div class="card">
                                    <div class="card-body border-0">
                                        <div class="form-horizontal">
                                            <div class="row mb-4">
                                                <p class="mb-4 text-17">Personal Info</p>
                                                <form class="" action="{{route('profile.update')}}" method="post">
                                                    @csrf
                                                    @method('patch')

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm">
                                                                <div class="col-md-3">
                                                                    <label for="first_name" class="form-label">First Name</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter first name" value="{{Auth::user()->first_name}}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm">
                                                                <div class="col-md-3">
                                                                    <label for="last_name" class="form-label">Last Name</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter last name" value="{{Auth::user()->last_name}}" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm">
                                                                <div class="col-md-3">
                                                                    <label for="email" class="form-label">Email</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="{{Auth::user()->email}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button class="btn btn-info" type="submit">save changes</button>
                                                    </div>
                                                </form>
                                            </div>


                                            <div class="row mb-4">
                                                <p class="mb-4 text-17">Profile Picture</p>
                                                <form class="" action="{{route('photo.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="row row-sm">
                                                                <div class="me-5 my-3 text-center">
                                                                    <img src="{{asset($user->photo)}}" alt="Profile Photo" class="border-2 rounded-3" height="150" width="150" />
                                                                </div>
                                                                <p class="text-center text-muted my-2">{{session('message')}}</p>
                                                                <div class="col-md-3">
                                                                    <label for="photo" class="form-label">Profile Picture</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <input type="file" class="form-control" id="photo" name="photo" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="btn btn-info" type="submit">save changes</button>
                                                    </div>
                                                </form>
                                            </div>

{{--                                            Password Changes--}}

                                            <div>
                                                <p class="mb-4 text-17">Password Info</p>
                                                <form class="" action="{{route('password.update')}}" method="post">
                                                    @csrf
                                                    @method('put')

                                                    @if(session('status') === 'password-updated')
                                                        <p
                                                            x-data="{ show: true}"
                                                            x-show ="show"
                                                            x-transition
                                                            x-init="setTimeout(() => show = false, 2000)"
                                                            class="text-sm text-gray-600"
                                                            >
                                                            {{__('Password Update Successfully')}}
                                                        </p>
                                                   @endif

                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label for="current_password" class="form-label">Current Password</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="password" name="current_password" class="form-control" id="current_password" placeholder="current password" value="">
                                                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label for="password" class="form-label">New Password</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="password" name="password" class="form-control" id="password" placeholder="new password" value="">
                                                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm password" value="">
                                                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <button class="btn btn-info" type="submit">save changes</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div>
                                                <p class="mb-4 text-17">Delete Account</p>
                                                <form method="post" action="{{route('profile.destroy')}}" class="p-6" id="deleteProfile">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <p class="fs-6">If you want to delete this account , enter your current password.</p>
                                                        </div>
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label for="password" class="form-label">Current Password</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="current password" value="">
                                                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                                <a href="" onclick="event.preventDefault(); document.getElementById('deleteProfile').submit(); ">
                                                    <div class="text-center">
                                                        <button class="btn btn-info" type="submit" id="deleteProfile">Delete Account</button>
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- COL-END -->
                    </div>
                    <!-- ROW-1 CLOSED -->

                </div>
            </div>
        </div>
        <!-- CONTAINER CLOSED -->

    </section>
@endsection
