@extends('admin.master')

@section('title')
    Order Invoice Page #00{{$order->id}} | Super Kabab & Coffee
@endsection

@section('content')

    <section class="py-5">

        <!-- CONTAINER -->
        <div class="main-container container-fluid">


            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div>
                    <h1 class="page-title">Invoice-Details</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Invoices</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
                    </ol>
                </div>
            </div>
            <!-- PAGE-HEADER END -->

            <!-- ROW-1 OPEN -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-body">
                                <div class="invoice-box">
                                    <table class="table" cellpadding="3" cellspacing="3">
                                        <tr class="top">
                                            <td >
                                                <table class="table table-responsive">
                                                    <tr>
                                                        <td >
                                                            <h3 class="text-muted">Order Invoice</h3>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="title">
                                                            <h4>Super Kabab and Coffee</h4>
                                                        </td>
                                                        <td>
                                                            Invoice #: 00{{$order->id}}<br />
                                                            Order Tracking Id: {{$order->tracking_id}}<br />

                                                            <?php
                                                            $invoiceDate = new DateTime('2023-11-07 14:30:00', new DateTimeZone('Asia/Dhaka'));
                                                            ?>

                                                            Invoice date: {{ $invoiceDate->setTimezone(new DateTimeZone('Asia/Dhaka'))->format('M d, Y') }}
                                                            <br/>
                                                            Invoice time: {{ $invoiceDate->setTimezone(new DateTimeZone('Asia/Dhaka'))->format('h:ia') }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="information">
                                            <td colspan="12">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <h5>Billing Info</h5>
                                                            {{$order->user->first_name}} {{$order->user->last_name}}<br />
                                                            {{$order->user->email}}<br />
                                                            {{$order->user->mobile}}
                                                        </td>
                                                        <td>
                                                            <h5>Delivery Address</h5>
                                                            {{$order->address}}<br/>
                                                            {{$order->address_two}}<br/>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr class="heading justify-content-between">
                                            <td colspan="6">Payment Method</td>
                                            <td colspan="6">Cash On Delivery</td>
                                        </tr>
                                        <tr class="details">
                                            <td>{{$order->order_total}}</td>
                                        </tr>
                                        <tr>
                                            <table class="table text-center">
                                                <thead>
                                                <tr class="heading">
                                                    <th>Sl No</th>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Tax</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $totalPrice = 0;
                                                    $totalTax = 0;
                                                @endphp

                                                @foreach($order->orderDetails as $orderDetail)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td class="text-center">{{$orderDetail->product_name}}</td>
                                                        <td class="text-center">{{$orderDetail->price}} Tk.</td>
                                                        <td>{{$orderDetail->quantity}}</td>
                                                        <td>{{$orderDetail->price * $orderDetail->quantity}} Tk.</td>
                                                        <td>
                                                            @php
                                                                $subtotal = $orderDetail->price * $orderDetail->quantity;
                                                                $taxAmount = $subtotal * (25 / 100);
                                                                $totalTax += $taxAmount;
                                                            @endphp
                                                            {{ $taxAmount }} Tk.
                                                        </td>
                                                        <td>
                                                            @php
                                                                $subtotal = $orderDetail->price * $orderDetail->quantity;
                                                                $totalAmount = $subtotal + $taxAmount;
                                                                $totalPrice += $subtotal;
                                                            @endphp
                                                            {{$totalAmount}} Tk.
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <table class="table text-center">
                                                <thead>
                                                <tr class="heading">
                                                    <th>Total</th>
                                                    @if($order->coupon_id)
                                                        <th>Discount Amount</th>
                                                        <th>Estimate Total</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        {{ $totalPrice + $totalTax }} Tk.
                                                    </td>
                                                    @if($order->coupon_id)
                                                        <td>
                                                            {{ $order->discount_amount }} Tk.
                                                        </td>
                                                        <td>
                                                            {{ $order->istimate_total }} Tk.
                                                        </td>
                                                    @endif
                                                </tr>
                                                </tbody>
                                            </table>


                                            <h5 class="text-center">
                                                <a href="https:://www.superkababandcoffee.com/" class="text-decoration-none">www.superkababandcoffee.com</a>
                                            </h5>

                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-info mb-1" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                        </div>
                    </div>
                </div><!-- COL-END -->
            </div>
            <!-- ROW-1 CLOSED -->

        </div>

        <!-- CONTAINER CLOSED -->

    </section>

@endsection
