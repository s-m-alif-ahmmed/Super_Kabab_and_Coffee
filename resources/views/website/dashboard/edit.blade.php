@extends('website.master')

@section('title')
     Edit Address | Super Kabab & Coffee
@endsection

@section('content')

    <section class="py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="card rounded-0 border-0">
                        <div class="card-header text-center border-0 fs-3 fw-bolder">Your Addresses</div>
                        <div class="card-body border-0">
                            <form method="POST" action="{{route('login')}}">
                                @csrf
                                <div class="from-row">
                                    <label class="form-row small"><p><a href="{{route('home')}}" class="text-decoration-underline small">Home</a>  &nbsp; /  &nbsp; <a href="{{route('login')}}" class="text-decoration-underline small">Account</a>  &nbsp; /  &nbsp; <small>Addresses</small></p></label>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-12 p-5 ms-3">
                                    <div class="">
                                        <div class="">
                                            <p class="text-muted text-center text-success">{{session('message')}}</p>
                                            <form class="form-horizontal" method="POST" action="{{route('address.update', $address->id)}}">
                                                @method('PUT')
                                                @csrf
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">FIRST NAME</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="first_name" value="{{ $address->first_name }}" placeholder="" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">LAST NAME</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="last_name" value="{{ $address->last_name }}" placeholder="" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">COMPANY</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="company" value="{{ $address->company }}" placeholder="" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">ADDRESS1</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="address" value="{{ $address->address }}" placeholder="" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">ADDRESS2</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="address_two" value="{{ $address->address_two }}" placeholder="" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">CITY</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="city" placeholder="" value="{{ $address->city }}" type="text" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">Country</label>
                                                    <div class="col-md-9 form-floating mb-3">
                                                        <select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example" required >
                                                            <option value="">Choose your country</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->country }}" {{ $country->country == $address->country ? 'selected' : '' }}> {{ $country->country }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">POSTAL/ZIP CODE</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="postal_code" value="{{ $address->postal_code }}" placeholder="" type="number" required />
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <label for="" class="col-md-3 form-label small">PHONE</label>
                                                    <div class="col-md-9">
                                                        <input class="form-control" name="mobile" value="{{ $address->mobile }}" placeholder="" type="number" required />
                                                    </div>
                                                </div>


                                                <button class="btn btn-dark border-0 rounded-0" type="submit">UPDATE ADDRESS</button>
                                                <label class="small"><a href="{{route('address.index')}}" class="text-decoration-underline small">CANCEL</a></label>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="row py-5">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header small">
                                            <a class="collapsed text-decoration-underline text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                ADD A NEW ADDRESS
                                            </a>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                <form class="form-horizontal" method="POST" action="{{ route('address.store') }}">
                                                    @csrf
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">FIRST NAME</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="first_name" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">LAST NAME</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="last_name" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">COMPANY</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="company" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">ADDRESS1</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="address" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">ADDRESS2</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="address_two" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">CITY</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="city" placeholder="" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">COUNTRY</label>
                                                        <div class="col-md-9">
                                                            <select class="form-select" id="floatingSelect" name="country" aria-label="Floating label select example" required >
                                                                <option value="">Choose your country</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->country }}" >{{ $country->country }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">POSTAL/ZIP CODE</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="postal_code" placeholder="" type="number" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small">PHONE</label>
                                                        <div class="col-md-9">
                                                            <input class="form-control" name="mobile" placeholder="" type="number"  required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small"></label>
                                                        <div class="col-md-9">
                                                            <input class="" name="default_status" value="1" placeholder="" type="checkbox" />Set as default address.
                                                        </div>
                                                    </div>
                                                    <div class="py-5">
                                                        <button class="btn btn-dark border-0 rounded-0" type="submit">ADD ADDRESS</button>
                                                        <label class="small"><a href="{{ route('login') }}" class="text-decoration-underline small">CANCEL</a></label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
