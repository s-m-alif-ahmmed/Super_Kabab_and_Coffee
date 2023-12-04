@extends('website.master')

@section('title')
    Order Details
@endsection

@section('content')

    <section class="p-5">
        <div class="container">
            <div class="row">
                <table class="table table-responsive">
                    <thead>
                    <tr>
                        <th> Item Name </th>
                        <th> Item Price </th>
                        <th> Item Quantity </th>
                        <th> Total </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $orderId = $order->id;
                        $sum = 0;
                    @endphp

                    @foreach($order_details as $order_detail)
                        @if($order_detail->order_id == $orderId)
                            <tr>
                                <td>
                                    @php
                                        $product = App\Models\Item::find($order_detail->product_id);
                                    @endphp

                                    @if ($product)
                                        <a href="{{ route('item.detail', Crypt::encryptString($product->id)) }}" class="text-decoration-none text-black">
                                            {{ $order_detail->product_name }}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $order_detail->price }} Tk.
                                </td>
                                <td> {{ $order_detail->quantity }} </td>
                                <td> {{ $order_detail->price * $order_detail->quantity }} Tk. </td>
                            </tr>
                            @php
                                $sum += ($order_detail->price * $order_detail->quantity);
                            @endphp
                        @endif
                    @endforeach

                    <tr>
                        <td colspan="3">Total</td>
                        <td>{{ $sum }} Tk.</td>
                    </tr>
                    <tr>
                        <td colspan="3">Tax (25%)</td>
                        <td>{{ $sum * 0.25 }} Tk.</td>
                    </tr>
                    <tr>
                        <td colspan="3">Total with Tax</td>
                        <td>{{ $sum * 1.25 }} Tk.</td>
                    </tr>
                    @if($order->coupon_id)
                    <tr>
                        <td colspan="3">Discount Amount</td>
                        <td>{{ $order->discount_amount }} Tk.</td>
                    </tr>
                    <tr>
                        <td colspan="3">Estimated Total</td>
                        <td>{{ $order->istimate_total }} Tk.</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection
