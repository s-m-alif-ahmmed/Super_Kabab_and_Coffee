@extends('website.master')

@section('title')
    Shipping information | Super Kabab & Coffee
@endsection

@section('content')
    <section class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <form action="{{ route('order.new') }}" class="" method="POST">
                        @csrf
                        <div class="row py-5 d-flex">
                            <div class="col-md-7">
                                <div class="card card-body border-0">
                                    <h4 class="fw-bolder">Super Kabab & Coffee</h4>
                                    <div class="d-flex" style="font-size: 12px;">
                                        <a href="{{ route('cart.show') }}" class="nav-link pe-3">Cart </a>
                                        <span style="font-size: 12px;"><i class="fa fa-chevron-up fa-rotate-90"></i></span>
                                        <a href="" class="nav-link px-3"> Information </a>
                                        <span style="font-size: 12px;"><i class="fa fa-chevron-up fa-rotate-90"></i></span>
                                        <a href="{{ route('info') }}" class="nav-link px-3"> Shipping </a>
                                    </div>
                                    @if (isset(Auth::user()->id))
                                        <h6 class="fw-bold py-3 mb-0">Contact</h6>
                                        <p class="mb-1">{{ Auth::user()->first_name }}
                                            {{ Auth::user()->last_name }}({{ Auth::user()->email }})</p>
                                    @else
                                        <div class="d-flex justify-content-between">
                                            <h6 class="fw-bold py-3 mb-0">Contact</h6>
                                            <div class="d-flex pt-3">
                                                <p class="mb-1">Already have an account?</p>
                                                <a href="{{ route('login') }}" class="nav-link"> Log in</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-7 py-1">
                                                <input type="text" placeholder="Email or mobile phone number"
                                                       class="form-control" required />
                                            </div>
                                        </div>
                                    @endif
                                    <hr />
                                    <h5 class="fw-bolder m-0">Shipping address</h5>
                                    <hr />

                                    @if (!empty($address) && $address->default_status == 1)
                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" name="country"
                                                        aria-label="Floating label select example" required>
                                                    <option value="">Choose your country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->country }}"
                                                            {{ $country->country == $address->country ? 'selected' : '' }}>
                                                            {{ $country->country }} </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingSelect">Country/Region</label>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control"
                                                       value="{{ $address->first_name }}" name="first_name" id="floatingInput"
                                                       placeholder="First name(optional)" />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">First
                                                    name(optional)</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control"
                                                       value="{{ $address->last_name }}" name="last_name" id="floatingInput"
                                                       placeholder="Last name" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Last name</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="company"
                                                       value="{{ $address->company }}" id="floatingInput"
                                                       placeholder="Company(optional)">
                                                <label for="floatingInput"
                                                       class="fs-6 text-muted ms-2">Company(optional)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="address"
                                                       value="{{ $address->address }}" id="floatingInput"
                                                       placeholder="Address" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Address</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                       value="{{ $address->address_two }}" name="address_two"
                                                       placeholder="Apartment, suite, etc. (optional)">
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Apartment, suite,
                                                    etc. (optional)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-floating mb-3">
                                                <input type="text" class="form-control" name="city"
                                                       value="{{ $address->city }}" id="floatingInput" placeholder="City"
                                                       required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">City</label>
                                            </div>
                                            <div class="col-md-6 form-floating mb-3">
                                                <input type="number" class="form-control"
                                                       value="{{ $address->postal_code }}" name="postal_code"
                                                       id="floatingInput" placeholder="Postal code" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Postal
                                                    code</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control"
                                                       value="{{ $address->mobile }}" name="mobile" id="floatingInput"
                                                       placeholder="Phone" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Phone</label>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 form-floating mb-3">
                                                <textarea type="text" class="form-control" rows="5" name="note" id="floatingInput"> </textarea>
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Note</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10 py-3 mb-3">
                                                <p class="text-muted" style="font-size: 14px;"> <input type="checkbox"
                                                                                                       name="all_terms" value="agree" required /> I AGREE WITH THE <a
                                                        href="{{ route('policy.terms') }}">TERMS AND CONDITIONS</a> ,<a
                                                        href="{{ route('policy.privacy') }}">PRIVACY POLICY</a> AND <a
                                                        href="{{ route('policy.return') }}">RETURN REFUND POLICY</a> </p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <select class="form-select" id="floatingSelect" name="country"
                                                        aria-label="Floating label select example" required>
                                                    <option value="">Choose your country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->country }}">{{ $country->country }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="floatingSelect">Country/Region</label>
                                            </div>
                                        </div>

                                        <div class="row ">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="first_name"
                                                       id="floatingInput" placeholder="First name(optional)" />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">First
                                                    name(optional)</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="last_name"
                                                       id="floatingInput" placeholder="Last name" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Last name</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="company"
                                                       id="floatingInput" placeholder="Company(optional)">
                                                <label for="floatingInput"
                                                       class="fs-6 text-muted ms-2">Company(optional)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="address"
                                                       id="floatingInput" placeholder="Address" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Address</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" id="floatingInput"
                                                       name="address_two" placeholder="Apartment, suite, etc. (optional)">
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Apartment, suite,
                                                    etc. (optional)</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-floating mb-3">
                                                <input type="text" class="form-control" name="city"
                                                       id="floatingInput" placeholder="City" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">City</label>
                                            </div>
                                            <div class="col-md-6 form-floating mb-3">
                                                <input type="number" class="form-control" name="postal_code"
                                                       id="floatingInput" placeholder="Postal code" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Postal
                                                    code</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-floating mb-3">
                                                <input type="number" class="form-control" name="mobile"
                                                       id="floatingInput" placeholder="Phone" required />
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Phone</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 form-floating mb-3">
                                                <textarea type="text" class="form-control" rows="5" name="note" id="floatingInput"></textarea>
                                                <label for="floatingInput" class="fs-6 text-muted ms-2">Note</label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-10 py-3 mb-3">
                                                <p class="text-muted" style="font-size: 14px;"> <input type="checkbox"
                                                                                                       name="all_terms" value="agree" required /> I AGREE WITH THE <a
                                                        href="{{ route('policy.terms') }}">TERMS AND CONDITIONS</a> ,<a
                                                        href="{{ route('policy.privacy') }}">PRIVACY POLICY</a> AND <a
                                                        href="{{ route('policy.return') }}">RETURN REFUND POLICY</a> </p>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-between">
                                            <a href="{{ route('cart.show') }}" class="text-decoration-none pt-3">
                                                <span style="font-size: 14px;"><i
                                                        class="fa fa-chevron-up fa-rotate-270"></i> Return to cart</span>
                                            </a>
                                            <button type="submit" class="btn btn-dark p-3 bg-primary rounded-1">Continue
                                                to shipping</button>
                                        </div>
                                    </div>

                                    <hr />
                                    <p>All rights reserved Super Kabab & Coffee.</p>
                                </div>
                            </div>
                            <div class="col-md-5 card card-body border-0">
                                <div class="row p-5">
                                    @php($sum = 0)
                                    @foreach ($cart_products as $cart_product)
                                        <div class="col-md-3 mt-2">
                                            <p><img src="{{ asset($cart_product->attributes->image) }}"
                                                    style="width: 70px;" /></p>
                                        </div>
                                        <div class="col-md-9 d-flex justify-content-between pt-4"
                                             style="font-size: 14px;">
                                            <p>{{ $cart_product->name }}</p>
                                            <p>৳{{ $cart_product->price }}.00</p>
                                        </div>
                                        @php($sum = $sum + $cart_product->price * $cart_product->quantity)
                                    @endforeach
                                    <div class="col-md-12 py-3 pb-0 d-flex justify-content-between"
                                         style="font-size: 14px;">
                                        <p>Subtotal</p>
                                        <p>৳{{ $sum }}.00</p>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between" style="font-size: 14px;">
                                        <p>-</p>
                                        <p>-</p>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between" style="font-size: 14px;">
                                        <p>Estimated taxes</p>
                                        <p class="">৳{{ $tax = ($sum * 25) / 100 }}</p>
                                    </div>
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <p class="fw-bolder">Total </p>
                                        <p class="fw-bolder"><span class="text-muted" style="font-size: 12px;" id="total">BDT</span>
                                            ৳{{ $orderTotal = $sum + $tax }}</p>
                                    </div>
                                    <?php
                                    Session::put('order_total', $orderTotal);
                                    Session::put('tax_total', $tax);
                                    ?>

                                    <div class="row">
                                        <label for="" class="fs-6 ">Coupon :</label>
                                        <span id="cuponcheck-error" class="py-2" style="display:none;color: red;"></span>
                                        <input type="text" class="form-control " name="cupon_id" id="cupon" />
                                    </div>
                                    <div class="row py-3">
                                        <label for="" class="fs-6">Discount Amount :</label>
                                        <input type="text" class="form-control" name="discount_amount" id="discount_amount" readonly />
                                    </div>

                                    <div class="row py-3">
                                        <label for="" class="fs-6">Estimate Total :</label>
                                        <input type="text" class="form-control" name="istimate_total" id="istimate_total" readonly />
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Define a function to check if the coupon code already exists
            function cuponcheck(cupon, callback) {
                $.ajax({
                    url: '/cuponcheck',
                    type: 'GET',
                    data: {
                        cupon: cupon
                    },
                    success: function(data) {
                        if (data) {
                            // Log the data received from the server in the console
                            console.log(data);

                            // Clear the previous error message and reset discount_amount
                            $('#cuponcheck-error').hide().text('');
                            $('#discount_amount').val(0);

                            // Hide Estimated Total
                            $('#istimate_total').hide();

                            if (data.code) {

                                if (new Date(data.expires_at) <= new Date()) {
                                    $('#cuponcheck-error').text('Coupon has expired').show();
                                } else if (new Date(data.starts_at) >= new Date()) {
                                    $('#cuponcheck-error').text('Coupon does not starts yet.').show();
                                } else if (data.usage_count >= data.max_uses) {
                                    $('#cuponcheck-error').text('This coupon finised limit.')
                                        .show();
                                }else if (data.user_usage_count >= data.max_uses_user) {
                                    $('#cuponcheck-error').text('You have already used this coupon')
                                        .show();
                                }else if (data.type === 'fixed') {
                                    // Calculate the fixed discount
                                    var discountAmount = parseFloat(data.discount_amount);
                                    $('#discount_amount').val(discountAmount);

                                    // Calculate the updated total estimate
                                    var orderTotal = parseFloat('{{ $orderTotal }}');
                                    var updatedTotal = orderTotal - discountAmount;
                                    $('#istimate_total').val(updatedTotal);

                                    // Check if min_amount is less than or equal to the sum
                                    if (parseFloat(data.min_amount) <= orderTotal) {
                                        $('#cuponcheck-error').text('Coupon is valid').show();
                                        // Show Estimated Total if min_amount condition is met
                                        $('#istimate_total').show();
                                    } else {
                                        $('#cuponcheck-error').text('Your order amount is below ' + data.min_amount + ' tk.').show();
                                    }

                                } else if (data.type === 'percent') {
                                    // Calculate the percent discount
                                    var percentDiscount = parseFloat(data.discount_amount);
                                    var orderTotal = parseFloat('{{ $orderTotal }}');
                                    var discountAmount = (orderTotal * percentDiscount) / 100;
                                    $('#discount_amount').val(discountAmount);

                                    // Calculate the updated total estimate
                                    var updatedTotal = orderTotal - discountAmount;
                                    $('#istimate_total').val(updatedTotal);

                                    // Check if min_amount is less than or equal to the sum
                                    if (parseFloat(data.min_amount) <= orderTotal) {
                                        $('#cuponcheck-error').text('Coupon is valid').show();
                                        // Show Estimated Total if min_amount condition is met
                                        $('#istimate_total').show();
                                    } else {
                                        $('#cuponcheck-error').text('Your order amount is below ' + data.min_amount + ' tk.').show();
                                    }

                                }
                            } else {
                                $('#cuponcheck-error').text('Coupon is Invalid').show();
                            }
                        } else {
                            $('#cuponcheck-error').text('Coupon is Invalid').show();
                        }
                    },
                    error: function() {
                        callback(false);
                    }
                });
            }

            // Attach a change event listener to the input field
            $('#cupon').on('input', function() {
                var value = $(this).val();

                if (value.length >= 2) {
                    cuponcheck(value, function(exists) {});
                }
            });
        });
    </script>


@endsection
