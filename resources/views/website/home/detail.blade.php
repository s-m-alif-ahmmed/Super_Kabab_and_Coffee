@extends('website.master')

@section('title')

    Menu Item Detail | Super Kabab & Coffee

@endsection

@section('content')
    <section class="py-5 ms-4">
        <div class="container-fluid">
             <p class="text-success text-muted text-center">{{session('message')}}</p>
            <div class="row ">
                <div class="col-md-8 text-center pe-5">
                    <img src="{{asset($item->image)}}" class="img-fluid pb-5" width="600" height="600" />
                </div>
                <div class="col-md-4 p-5">
                    <h3>{{$item->name}}</h3>
                    <p>{{$item->description}}</p>
                    <span class="text-muted"><p style="font-size: 20px;">TK {{$item->price}}</p></span>
                    <form action="{{route('cart.add', $item->id)}}" method="POST" class="cart">
                        @csrf
                        <button class=" btn rounded-0 py-3  p-127 border btn-border text-black" type="submit">Add to cart</button>
                    </form>
                    <form action="{{route('checkout.info', Crypt::encryptString($item->id) )}}" method="POST" class="cart">
                        @csrf
                        <button class=" btn rounded-0 py-3 px-4 p-127 border btn-border text-black" type="submit">BUY IT NOW </button>
                    </form>

                    <p class="pt-5">SHARE</p>
                    <ul class="nav">
                        <li class="">
                            <a href="https://www.facebook.com/sharer.php?u=https://www.superkababandcoffee.com/items/" target="_blank" class="btn btn-lg text-green"><i class="fa-brands fa-facebook"></i></a>
                        </li>
                        <li class="">
                            <a href="https://twitter.com/intent/tweet?text=Check%20out%20this%20product:+https://www.superkababandcoffee.com/items/" target="_blank" class="btn btn-lg text-green"><i class="fa-brands fa-twitter"></i></a>
                        </li>
                        <li class="">
                            <a href="https://www.pinterest.com/pin-builder/https://www.superkababandcoffee.com/items/" target="_blank" class="btn btn-lg text-green"><i class="fa-brands fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12 text-center my-3">
                        <hr/>
                        <h2>You may also like</h2>
                        <hr/>
                    </div>
                    <br/>
                    @foreach($item->category->items()->latest()->limit(4)->get() as $categoryItem)
                        @if($categoryItem->status == 1)
                            <div class="col-md-3 px-3">
                                <a href="{{route('item.detail', Crypt::encryptString($item->id) )}}" class="">
                                    <img src="{{asset($categoryItem->image)}}" class="py-2"/>
                                </a>
                                <h3 class="px-4 pt-3 text-muted">
                                    <a href="{{route('item.detail', Crypt::encryptString($item->id) )}}" class="text-decoration-none nav-link text-muted" style="font-size: 20px;">{{$categoryItem->name}}</a>
                                </h3>
                                <p class="text-muted px-4">TK {{$categoryItem->price}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
