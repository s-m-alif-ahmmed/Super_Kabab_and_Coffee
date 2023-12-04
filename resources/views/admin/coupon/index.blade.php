@extends('admin.master')

@section('title')
    Add Coupon | Super Kabab & Coffee
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
                    <h3 class="card-title">Add Coupon Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" method="POST" action="{{route('coupon.store')}}">
                        @csrf

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Code</label>
                            <div class="col-md-9">
                                <input class="form-control" name="code" placeholder="Enter coupon code" type="text" required />
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" placeholder="Enter coupon code name" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="Enter coupon description" type="text"></textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Max Uses</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="max_uses" placeholder="Max Uses">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Max Uses User</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="max_uses_user" placeholder="Max Uses User">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="type" class="col-md-3 form-label">Type</label>
                            <div class="col-md-9">
                                <select name="type" id="type" class="form-control" required />
                                    <option value="percent">Percent</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Discount Amount</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="discount_amount" placeholder="Enter discount amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Minimum Amount</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="min_amount" placeholder="Enter minimum amount">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Coupon Status</label>
                            <div class="col-md-9">
                                <select name="status" id="status" class="form-control" required >
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="starts_at" class="col-md-3 form-label">Starts At</label>
                            <div class="col-md-9">
                                <input type="datetime-local" class="form-control" name="starts_at" id="starts_at" step="1">
                                @if($errors->has('starts_at'))
                                    <div class="alert alert-danger fs-6 my-2 py-0">{{ $errors->first('starts_at') }}</div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="expires_at" class="col-md-3 form-label">Expires At</label>
                            <div class="col-md-9">
                                <input type="datetime-local" class="form-control" name="expires_at" id="expires_at" step="1">
                                @if($errors->has('expires_at'))
                                    <div class="alert alert-danger fs-6 my-2 py-0">{{ $errors->first('expires_at') }}</div>
                                @endif
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Create New Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to format the current date and time in 'Asia/Dhaka' timezone
        function getCurrentDateTimeInDhaka() {
            const now = new Date();
            const options = {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit'
            };
            return now.toLocaleString('en-US', options, { timeZone: 'Asia/Dhaka' }).replace(',', 'T');
        }

        // Set the current date and time in 'Asia/Dhaka' as the default values for the input fields
        document.getElementById('starts_at').value = getCurrentDateTimeInDhaka();
        document.getElementById('expires_at').value = getCurrentDateTimeInDhaka();
    </script>


@endsection


