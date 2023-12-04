@extends('website.master')

@section('title')
    Dashboard | Super Kabab & Coffee
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
                                    <label class="form-row nav-link"><p><a href="{{route('home')}}" class="text-decoration-underline small fs-6">Home</a>  &nbsp; /  &nbsp; <a href="{{route('login')}}" class="text-decoration-underline fs-6 small" style="text-decoration: none;">Account</a>  &nbsp; /  &nbsp; <a href="#" class="fs-6 small" style="text-decoration: none;"> Addresses </a>  </p></label>
                                </div>
                            </form>

                            <!-- Display addresses here -->
                            @foreach ($addresses as $address)
                                <div class="row mb-3">
                                    <div class="from-row">
                                        <label class="form-row">
                                            <p class="d-flex">
                                                <a href="{{ route('address.edit', Crypt::encryptString($address->id) )}}" class="text-decoration-underline nav-link">EDIT</a>
                                                &nbsp; &nbsp;
                                                <form action="{{ route('address.destroy', $address->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-decoration-underlin nav-link" onclick="return confirm('Are you sure you want to delete this address?')">DELETE</button>
                                                </form>
                                            </p>
                                        </label>
                                    </div>
                                    <label class="col-md-6"><h6>{{ $address->default_status ? '(Default Address)' : '' }}</h6></label>
                                </div>

                                <div class="mb-3">
                                    <label class="col-md-6">{{ $address->first_name . ' ' . $address->last_name }}</label>
                                    <label class="col-md-6">{{ $address->country }}</label>
                                </div>
                            @endforeach

                            <div class="row py-5 mx-auto">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h6 class="accordion-header small">
                                            <a class="collapsed text-decoration-underline text-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                                ADD A NEW ADDRESS
                                            </a>
                                        </h6>
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
                                                            <input class="form-control" name="company" placeholder="" type="text" required >
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
                                                                <option value="">Select Category</option>
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
                                                            <input class="form-control" name="mobile" placeholder="" type="number" required />
                                                        </div>
                                                    </div>
                                                    <div class="row mb-4">
                                                        <label for="" class="col-md-3 form-label small"></label>
                                                        <div class="col-md-9">
                                                            <input class="" name="default_status" placeholder="" value="1" type="checkbox" />Set as default address.
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
