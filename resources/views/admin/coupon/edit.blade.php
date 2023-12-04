@extends('admin.master')

@section('title')
    Coupon Edit | Super Kabab & Coffee
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
                    <h3 class="card-title">Coupon Edit </h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('coupon.update', $coupon->id)}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Code</label>
                            <div class="col-md-9">
                                <input class="form-control" name="code" placeholder="Enter coupon code" value="{{$coupon->code}}" type="text" required />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" placeholder="Enter coupon code name" value="{{$coupon->name}}" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="Enter coupon description" type="text">{{$coupon->description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Max Uses</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="max_uses" value="{{$coupon->max_uses}}" placeholder="Max Uses">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Max Uses User</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="max_uses_user" value="{{$coupon->max_uses_user}}" placeholder="Max Uses User">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="type" class="col-md-3 form-label">Type</label>
                            <div class="col-md-9">
                                <select name="type" id="type" class="form-control" required>
                                    <option value="percent" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>Percent</option>
                                    <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Discount Amount</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="discount_amount" value="{{$coupon->discount_amount}}" placeholder="Enter discount amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Minimum Amount</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="min_amount" value="{{$coupon->min_amount}}" placeholder="Enter minimum amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Coupon Status</label>
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control" required >
                                    <option value="1" {{ old('status', $coupon->status) == 1 ? 'selected' : '' }} >Active</option>
                                    <option value="0" {{ old('status', $coupon->status) == 0 ? 'selected' : '' }} >Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="starts_at" class="col-md-3 form-label">Starts At</label>
                            <div class="col-md-9">
                                <input type="datetime-local" class="form-control" name="starts_at" value="{{$coupon->starts_at}}" id="starts_at" step="1">
                                @if($errors->has('starts_at'))
                                    <div class="alert alert-danger fs-6 my-2 py-0">{{ $errors->first('starts_at') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="expires_at" class="col-md-3 form-label">Expires At</label>
                            <div class="col-md-9">
                                <input type="datetime-local" class="form-control" value="{{$coupon->expires_at}}" name="expires_at" id="expires_at" step="1">
                                @if($errors->has('expires_at'))
                                    <div class="alert alert-danger fs-6 my-2 py-0">{{ $errors->first('expires_at') }}</div>
                                @endif
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
