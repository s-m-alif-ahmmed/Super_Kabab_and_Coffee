@extends('admin.master')

@section('title')
    Coupon Detail | Super Kabab & Coffee
@endsection

@section('content')

    <section class="mt-3 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Coupon Detail Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th> Code</th>
                                    <td>{{$coupon->code}}</td>
                                </tr>
                                <tr>
                                    <th> Name</th>
                                    <td>{{$coupon->name}}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{$coupon->description}}</td>
                                </tr>
                                @php
                                    $totalUse = 0;
                                    foreach ($orders as $order) {
                                        if ($order->coupon_id == $coupon->id) {
                                            $totalUse++;
                                        }
                                    }
                                    $totalLeft = $coupon->max_uses - $totalUse;
                                @endphp

                                <tr>
                                    <th>Total Coupon Use Done</th>
                                    <td>{{ $totalUse }}</td>
                                </tr>
                                <tr>
                                    <th>Total Coupon Use Left</th>
                                    <td>{{ $totalLeft }}</td>
                                </tr>
                                <tr>
                                    <th>Total Max Uses</th>
                                    <td>{{$coupon->max_uses}}</td>
                                </tr>
                                <tr>
                                    <th>Max Uses User</th>
                                    <td>{{$coupon->max_uses_user}}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{$coupon->type}}</td>
                                </tr>
                                <tr>
                                    <th>Discount Amount</th>
                                    <td>{{$coupon->discount_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Minimum Amount</th>
                                    <td>{{$coupon->min_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Starts At</th>
                                    <td>{{$coupon->starts_at}}</td>
                                </tr>
                                <tr>
                                    <th>Expires At</th>
                                    <td>{{$coupon->expires_at}}</td>
                                </tr>
                                <tr>
                                    <th>Coupon Status</th>
                                    <td>
                                        @if($coupon->status == 1)
                                            <a href="{{route('coupon.status', $coupon->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Active</a>
                                        @elseif($coupon->status == 0)
                                            <a href="{{route('coupon.status', $coupon->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-danger btn-sm">Inactive</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <a href="{{route('coupon.edit', Crypt::encryptString($coupon->id) )}}" class="btn btn-success btn-sm my-1">Edit</a>
                                        <form action="{{route('coupon.destroy', $coupon->id)}}" onclick="return confirm('Are you sure to delete this coupon?')" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
