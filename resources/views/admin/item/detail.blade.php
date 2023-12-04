@extends('admin.master')

@section('title')
    Menu Item Detail | Super Kabab & Coffee
@endsection

@section('content')

    <section class="mt-3 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Menu Item Detail Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Category Name</th>
                                    <td>{{$item->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Menu Item Name</th>
                                    <td>{{$item->name}}</td>
                                </tr>
                                <tr>
                                    <th>Menu Item Description</th>
                                    <td>{{$item->description}}</td>
                                </tr>
                                <tr>
                                    <th>Menu Item Price</th>
                                    <td>{{$item->price}}</td>
                                </tr>
                                <tr>
                                    <th>Menu Item Image</th>
                                    <td>
                                        <img src="{{asset($item->image)}}" alt="Category Image" height="100" width="100">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Menu Item Status</th>
                                    <td>
                                        @if($item->status == 1)
                                            <a href="{{route('item-change-status', $item->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Published</a>
                                        @elseif($item->status == 0)
                                            <a href="{{route('item-change-status', $item->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Unpublished</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <form action="{{route('item.destroy', $item->id)}}" onclick="return confirm('Are you sure to delete this menu item?')" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn-outline-danger">Delete</button>
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
