@extends('website.master')

@section('title')

    Order Online | Super Kabab & Coffee

@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <h4 class="fw-bolder text-center py-5">Delivery Menu</h4>
                 <p class="text-success text-muted text-center">{{session('message')}}</p>
                @foreach($items as $item)
                    @if($item->status == 1)
                    <div class="card border-0 m-4 rounded-0 shadow-none" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="{{route('item.detail', Crypt::encryptString($item->id) ) }}">
                                    <img src="{{asset($item->image)}}" class="img-fluid rounded-0 w-100" alt="menu imgae" style="height: 220px;" />
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="d-flex justify-content-between">
                                        <a href="{{route('item.detail', Crypt::encryptString($item->id) ) }}" class="text-decoration-none text-muted">{{$item->name}}</a>
                                        <p class="text-muted">Tk. {{$item->price}}</p>
                                    </h6>
                                    <p class="card-text"><small class="text-body-secondary">{{$item->description}}</small></p>
                                    <form action="{{route('cart.add', $item->id)}}" method="POST" class="cart">
                                        @csrf
                                        <button class="btn rounded-0 bg-white text-black" type="submit">+ ADD</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                <div class="pagination-simple col-md-12 pt-5">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>

@endsection

