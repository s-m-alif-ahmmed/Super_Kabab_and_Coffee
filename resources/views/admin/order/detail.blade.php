@extends('admin.master')

@section('title')
     Order Detail Page
@endsection

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Item Information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table class="table table-bordered table-hover" id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Item Name</th>
                            <th>Item Price</th>
                            <th>Item Quantity</th>
                            <th>Total Price</th>
                            <th>Tax</th>
                            <th>Sub Total</th>
                        </tr>
                        </thead>
                        @php
                            $totalPrice = 0;
                            $totalTax = 0;
                        @endphp

                        <tbody>
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
                </div>
            </div>
            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Order Basic Information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th>Order No</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at->setTimezone('Asia/Dhaka')->format('M d, Y') }}</td>
                        </tr>
                        <tr>
                            <th>Order Time</th>
                            <td>{{ $order->created_at->setTimezone('Asia/Dhaka')->format('h:ia') }}</td>
                        </tr>
                        <tr>
                            <th>User Id</th>
                            <td>{{ $order->user->id }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$order->first_name}} {{$order->last_name}}</td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td>{{$order->mobile}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Apartment, Suite, etc.</th>
                            <td>{{$order->address_two}}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{$order->company}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$order->country}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$order->city}}</td>
                        </tr>
                        <tr>
                            <th>Postal Code</th>
                            <td>{{$order->postal_code}}</td>
                        </tr>
                        <tr>
                            <th>Payment type</th>
                            <td>Cash On Delivery</td>
                        </tr>
                        <tr>
                            <th>Delivery Status</th>
                            <td>
                                @if($order->status == 0)
                                    <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-danger btn-sm">Pending</a>
                                @elseif($order->status == 1)
                                    <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-success btn-sm">Complete</a>
                                @elseif($order->status == 2)
                                    <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-danger btn-sm">Canceled</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td>
                                <a href="{{route('admin.order-invoice', $order->id)}}" class="btn btn-success btn-sm">Invoice</a>
                                <form action="{{ route('admin.order-delete', $order->id) }}" method="POST" onclick="return confirm('Are you sure to delete this order?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

