@extends('website.master')

@section('title')
    Super Kabab & Coffee
@endsection

@section('content')

    <section>

        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-3 px-5 text-white " style="background-color: #aa4723;">
                    <div class="position-relative top-50 start-50 translate-middle text-center">
                        <p class="fw-bold" style="font-size: 25px;">Order from the comfort of your home</p>
                        <p class="">Super Kabab & Coffee is introducing delivery for all </p>
                    </div>
                </div>
                <div class="col-md-9 img-border"></div>
            </div>
        </div>



        <div class="container py-5">
            <div class="text-center">
                <h3 class="fw-bold">New In</h3>
            </div>
            <br/>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($items as $latest_item)
                            @if($latest_item->status ==1)
                            <div class="col-md-6 mb-2 px-4">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2" >{{$latest_item->name}} </p>
                                    <p class="mb-2" >TK {{$latest_item->price}} </p>
                                </div>
                                <hr class="mt-0 mb-2" />
                                <p>{{$latest_item->description}}</p>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="background-color: #f7f7f7">
            <div class="row py-5 justify-content-center">
                <div class="col-md-4 text-center">
                    <p>“Good restaurant is about achieving equilibrium between the food, service, and design – in effect, telling a complete story.” At Super Kabab & Coffee we believe in this saying and we strive to provide you with the best food experience.</p>
                </div>
            </div>
        </div>

        <br/>
        <div class="py-3">
            <div class="container-fluid mb-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4 px-3">
                                <div class="text-center">
                                    <h3 style="color: black" class="fw-bold">Find Us</h3>
                                    <br/>
                                    <p style="color: #AA4723">Location:</p>

                                    <p class="text-muted">
                                        Ground Floor & 1st Floor,<br/>
                                        Motalib Plaza Shopping Complex,<br/>
                                        South-West corner, Dhaka – 1205.<br/>
                                        Contact number: +8801705048030, +8801923281111, +8801672498561
                                    </p>
                                    <a href="https://goo.gl/maps/HicT29XCnnnUGWG3A" class="text-decoration-none text-color" >
                                        <span class="text-dark" style="font-size: 14px;">OPEN IN MAPS</span>
                                    </a>
                                    <br/>

                                    <hr class="mt-1 mb-0 mx-auto" style="width: 100px; color: black;" />
                                    <hr class="mt-1 mb-0 mx-auto" style="width: 100px; color: black;"/>

                                    <p class="text-muted">
                                        Sunday - Saturday<br/>
                                        12pm - 11pm
                                    </p>
                                </div>
                            </div>
                            <div class="col">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1478366287156!2d90.3896621759721!3d23.74210698909356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b932c62b376f%3A0xcf36572299f25c84!2sSuper%20Kabab%20%26%20Coffee!5e0!3m2!1sen!2sbd!4v1690674073419!5m2!1sen!2sbd" class="w-100" height="350" style="border:0; " allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>

    </section>

@endsection

