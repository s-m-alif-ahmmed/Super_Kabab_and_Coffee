@extends('admin.master')

@section('title')
    Menu Item Edit | Super Kabab & Coffee
@endsection

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Form Layouts</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
            </ol>
        </div>
    </div>

    <div class="row row-deck">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Menu Item Edit Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('item.update', $item->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3"> Category :</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{$category->id == $item->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="name" class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$item->name}}" placeholder="Enter your item name" type="text" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea rows="3" class="form-control" name="description" placeholder="Enter your item description" type="text" required>{{$item->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="price" class="col-md-3 form-label">Price</label>
                            <div class="col-md-9">
                                <input type="number" placeholder="Menu Item Price" value="{{$item->price}}" class="form-control" name="price" required />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="file" name="image" type="file" />
                                <img src="{{asset($item->image)}}" alt="" height="80" width="100"/>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
