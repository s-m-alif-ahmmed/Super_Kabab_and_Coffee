@extends('website.master')

@section('title')
    Cart | Super Kabab & Coffee
@endsection

@section('content')

   <section class="h-100 h-custom">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2 border-0 " style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-12">
                                    <div class="p-5">
                                        <h3 class="text-center pt-5 fw-bold">Your Cart</h3>
                                        <p class="text-center text-muted text-success">{{session('message')}}</p>
                                        <hr class="my-4">
                                        @php($sum = 0)
                                        @foreach($cart_products as $cart_product)
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <a href="{{route('item.detail', Crypt::encryptString($cart_product->id) )}}" class="img">
                                                    <img src="{{ asset($cart_product->attributes->image) }}" class="img-fluid rounded-3" alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 py-2 text-center">
                                                <a href="{{route('item.detail', Crypt::encryptString($cart_product->id) )}}" class="nav-link">
                                                    <h5 class="text-black mb-0">{{$cart_product->name}}</h5>
                                                </a>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2 offset-lg-1 text-center">
                                                <h6 class="mb-0 text-muted">TK {{$cart_product->price}}.00</h6>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2 d-flex justify-content-center ps-3">
                                                <form action="{{ route('cart.update', $cart_product->id) }}" method="POST">
                                                    @csrf
                                                    <div class="input-group w-auto align-items-center py-1">
                                                        <input type="button" onclick="changeQuantity({{ $cart_product->id }}, 'decrement')" value="-" class="button-minus border icon-shape icon-sm px-2">
                                                        <input type="number" step="1" max="100" value="{{ $cart_product->quantity }}" name="quantity[{{ $cart_product->id }}]" class="quantity-field border text-center" style="width: 50px;" onchange="updateCartQuantity(this, {{ $cart_product->id }})">
                                                        <input type="button" onclick="changeQuantity({{ $cart_product->id }}, 'increment')" value="+" class="button-plus border icon-shape icon-sm px-1">
                                                        <button type="submit" class="text-decoration-none text-white bg-dark border py-1 my-1 px-2 rounded-0 ms-1">Update</button>
                                                    </div>
                                                    <a title="Remove this item" onclick="return confirm('Are you sure to delete this..')" class="remove px-3 nav-link text-decoration-underline py-1" href="{{ route('cart.remove',  $cart_product->id )}}">Remove</a>
                                                </form>
                                            </div>
                                            <div class="col-md-2 col-lg-2 col-xl-2 offset-lg-1 text-center">
                                                <h6 class="mb-0 text-muted">Tk {{$cart_product->price * $cart_product->quantity}}.00</h6>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                            @php($sum = $sum + ($cart_product->price * $cart_product->quantity))
                                        @endforeach
                                        <div class="pt-5">
                                            <div class="row">
                                                <div class="col float-start"></div>
                                                    <div class="float-end ">

                                                    <!-- Calculate and display the total -->
                                                        <div class="text-end">
                                                            <h5 class="">Total</h5>
                                                            <h5 class="total_sum">TK {{ session('newTotal',$sum) }}.00 BDT</h5>
                                                            <p class="text-muted">Shipping & taxes calculated at checkout</p>
                                                        </div>

                                                      

                                                        <!-- Display the discount amount -->
                                                        @if (session('discountAmount'))
                                                            <div class="col-md-12">
                                                                <p>Discount Amount: ৳{{ session('discountAmount') }}</p>
                                                            </div>
                                                        @endif

                                                        <div class="float-md-end">
                                                            <ul class="nav">
                                                                <li class="float-sm-end">
                                                                    <a href="{{ route('order.online') }}" class="nav-link text-white bg-dark border p-3 rounded-0">CONTINUE SHOPPING</a>
                                                                </li>
                                                                <li class="float-sm-end">
                                                                    <a href="{{ route('info') }}" class="nav-link text-white bg-dark border p-3 rounded-0">CHECKOUT</a>
                                                                </li>
                                                            </ul>
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
                </div>
            </div>
        </div>
    </section>

    <script>
    
        function changeQuantity(productId, action) {
            var inputElement = document.querySelector('input[name="quantity[' + productId + ']"]');
            var currentVal = parseInt(inputElement.value, 10);

            if (!isNaN(currentVal)) {
                if (action === 'increment') {
                    inputElement.value = currentVal + 1;
                } else if (action === 'decrement') {
                    if (currentVal > 1) {
                        inputElement.value = currentVal - 1;
                    }
                }
            }
        }

   </script>


@endsection





