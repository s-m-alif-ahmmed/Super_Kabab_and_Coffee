@extends('admin.master')

@section('title')
    Menu Item Detail | Super Kabab & Coffee
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Menu Items Manage</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
            </ol>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Responsive DataTable</h3>
                </div>
                <p class="text-muted text-center text-success">{{session('message')}}</p>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom w-100" id="responsive-datatable">
                            <thead>    <tr>
                                <th class="wd-15p border-bottom-0">SL</th>
                                <th class="wd-15p border-bottom-0">Item Name</th>
                                <th class="wd-15p border-bottom-0">Category Name</th>
                                <th class="wd-15p border-bottom-0">Image</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td><img src="{{asset($item->image)}}" alt="Item Image" height="80" width="75"/> </td>
                                    <td>
                                        @if($item->status == 1)
                                            <a href="{{route('item-change-status', $item->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Published</a>
                                        @elseif($item->status == 0)
                                            <a href="{{route('item-change-status', $item->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Unpublished</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('item.edit', Crypt::encryptString($item->id) )}}" class="btn btn-success btn-sm my-1">Edit</a>
                                        <a href="{{route('item.show', Crypt::encryptString($item->id) )}}" class="btn btn-success btn-sm my-1">Detail</a>
                                        <form action="{{route('item.destroy', $item->id)}}" onclick="return confirm('Are you sure to delete this menu item?')" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn-danger my-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
