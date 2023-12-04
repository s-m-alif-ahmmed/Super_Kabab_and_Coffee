@extends('admin.master')

@section('title')
    Add Country | Super Kabab & Coffee
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
                    <h3 class="card-title">Add Country Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted text-center text-success">{{session('message')}}</p>

                    <form class="form-horizontal" method="POST" action="{{route('country.store')}}">
                        @csrf
                        @method('post')

                        <div class="row mb-4">
                            <label for="country" class="col-md-3 form-label">Country Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="country" id="country" placeholder="Enter your Country name" type="text" required />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New Country</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
