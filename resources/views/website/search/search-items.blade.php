@extends('website.master')

@section('title')
    Search Result | Super Kabab and Coffee
@endsection

@section('content')

    <section>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-5">
                    <div class="d-flex justify-content-between">
                        <p class="{{route('search.items', ['search' => isset($_GET['search']) ?  $_GET['search'] : ''])}}">Products</p>
                        <a href="{{route('search.items', ['search' => isset($_GET['search']) ?  $_GET['search'] : ''])}}" class="text-decoration-underline nav-link"><p>VIEW ALL</p></a>
                    </div>
                    <hr/>
                    <div class="row justify-content-center">
                        <p class="text-success text-muted text-center">{{session('message')}}</p>
                        @if($searchItems->isEmpty())
                            <p>No matching results found.</p>
                        @else
                            @foreach($searchItems as $item)
                                @if($item->status == 1)
                                <div class="col-md-4">
                                    <div class="">
                                        <a href="{{route('item.detail', Crypt::encryptString($item->id) )}}"><img src="{{asset($item->image)}}" class=" h-25" /></a>
                                        <a class="text-decoration-none text-black text-color" href="{{route('item.detail', Crypt::encryptString($item->id) )}}"><h5 class="text-color">{{ $item->name }}</h5></a>
                                        <li class="nav"><span class="text-muted">TK {{ $item->price }}</span></li>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection


