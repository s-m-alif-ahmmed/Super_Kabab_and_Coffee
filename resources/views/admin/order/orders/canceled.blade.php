@extends('admin.master')
@section('title')
    Manage Order
@endsection
@section('content')
    <main>
        <div class="container-fluid px-4">

            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Order Information
                </div>
                <div class="card-body">
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <table  class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Order No</th>
                            <th>Name</th>
                            <th>User Email</th>
                            <th>Order Date</th>
                            <th>Order Time</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($orders->where('status', 2)->sortByDesc('created_at') as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>
                                    {{$order->first_name}} {{$order->last_name}}
                                </td>
                                <td>
                                    @if($order->user)
                                        {{$order->user->email}}
                                    @else
                                        User not available
                                    @endif
                                </td>
                                <td>{{ $order->created_at->setTimezone('Asia/Dhaka')->format('M d, Y') }}</td>
                                <td>{{ $order->created_at->setTimezone('Asia/Dhaka')->format('h:ia') }}</td>
                                <td>
                                    @if($order->status == 0)
                                        <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-danger btn-sm">Pending</a>
                                    @elseif($order->status == 1)
                                        <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-success btn-sm">Complete</a>
                                    @elseif($order->status == 2)
                                        <a href="{{route('order.status',$order->id)}}" onclick="return confirm('Are you sure to Change Status for this order?')" class="btn btn-danger btn-sm">Canceled</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.order-detail', Crypt::encryptString($order->id) )}}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{route('admin.order-invoice', $order->id)}}" class="btn btn-success btn-sm">Invoice</a>
                                    <form action="{{ route('admin.order-delete', $order->id) }}" method="POST" onclick="return confirm('Are you sure to delete this order?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection

