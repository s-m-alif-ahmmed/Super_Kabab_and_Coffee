@extends('website.master')

@section('title')

    Menu Page | Super Kabab & Coffee

@endsection

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <p class="text-success text-muted text-center">{{session('message')}}</p>
            
                @foreach($items as $item)
                    @if($item->status == 1)
                    @if (!isset($categoryName))
                            <h4 class="fw-bolder text-uppercase text-center py-5">{{$item->category->name}}</h4>
                                <?php $categoryName = $item->category->name; ?>
                        @endif
                    
                    <div class="col-md-6">
                        <div class="card mb-3 border-0 shadow-none" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="{{route('item.detail', Crypt::encryptString($item->id) )}}" class="">
                                        <img src="{{asset($item->image)}}" class="img-fluid rounded-0 w-100" alt="menu imgae" style="height: 220px;" />
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('item.detail', Crypt::encryptString($item->id) ) }}" class="text-decoration-none text-muted" style="font-size: 20px;">{{$item->name}}</a>
                                            <p class="text-muted">Tk. {{$item->price}}</p>
                                        </div>
                                        <p class="card-text text-body-secondary">{{$item->description}}</p>
                                        <form action="{{route('cart.add', $item->id)}}" method="POST" class="cart">
                                            @csrf
                                            <button class="btn rounded-0 bg-white text-black" type="submit">+ ADD</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                    @endif
                @endforeach
                <div class="pagination-simple col-md-12 pt-5">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>

@endsection
