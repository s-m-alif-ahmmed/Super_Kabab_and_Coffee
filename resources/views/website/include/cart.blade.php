<div class="offcanvas offcanvas-end" style="width: 300px;" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="margin-left: -45px;"></button>
    </div>
    <div class="offcanvas-body p-0">
        @if($cart_products->isEmpty())
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="fw-bolder">Your Cart</h3>
                    <p>Your cart is currently empty.</p>
                    <p><a href="{{route('order.online')}}" class="text-dark">Click here to continue shopping.</a></p>
                </div>
            </div>
        @else
            <h3 class="fw-bolder text-center">Your Cart</h3>
            <hr class="text-muted"/>
            @php($sum = 0)
            @foreach($cart_products as $cart_product)
                <h5 class="text-center text-muted">{{$cart_product->name}}</h5>
                <div class="row ms-2">
                    <div class="col-md-4">
                        <img src="{{ asset($cart_product->attributes->image) }}" class="w-35 h-35"/>
                    </div>
                    <div class="col-md-8 text-muted">
                        <p>TK {{$cart_product->price * $cart_product->quantity}}.00</p>
                        <div>
                            <form action="{{ route('cart.update', $cart_product->id )}}" method="POST">
                                @csrf
                                <div class="input-group w-auto align-items-center">
                                    <input type="button" onclick="changeQuantity({{ $cart_product->id }}, 'decrement')" value="-" class="button-minus border icon-shape icon-sm px-1">
                                    <input type="number" step="1" max="100" value="{{ $cart_product->quantity }}" name="quantity[{{ $cart_product->id }}]" class="quantity-field border text-center" style="width: 40px;" onchange="updateCartQuantity(this, {{ $cart_product->id }})">
                                    <input type="button" onclick="changeQuantity({{ $cart_product->id }}, 'increment')" value="+" class="button-plus border icon-shape icon-sm px-1">
                                    <button type="submit" class="text-decoration-none text-white bg-dark border py-1 px-2 rounded-0 ms-1">Update</button>
                                </div>
                                <a title="Remove this item" onclick="return confirm('Are you sure to delete this..')" class="remove px-3 nav-link text-decoration-underline" href="{{ route('cart.remove', $cart_product->id) }}">Remove</a>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="text-muted"/>
                @php($sum = $sum + ($cart_product->price * $cart_product->quantity))
            @endforeach

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <p class="text-center text-muted fs-5 ">Total<br/>TK {{$sum}}.00 BDT</p>
                    </div>
                    <div class="row ms-4">
                        <div class="text-muted ">
                            <p class="">Shipping & taxes calculated at checkout</p>
                            <p class="" style="font-size: 14px;" > <input type="checkbox" name="all_terms" value="agree" required /> I AGREE WITH THE <a href="{{route('policy.terms')}}">TERMS AND CONDITIONS</a> ,<a href="{{route('policy.privacy')}}">PRIVACY POLICY</a> AND <a href="{{route('policy.return')}}">RETURN REFUND POLICY</a> </p>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{route('info')}}" class="text-decoration-none rounded-2 m-3 text-white p-3 bg-dark nav-link"> CHECKOUT </a>
                        <p><a href="{{route('order.online')}}" class="text-dark text-decoration-underline">CONTINUE SHOPPING</a></p>
                    </div>
                </div>
            </div>
        @endif

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

    </div>


</div>



