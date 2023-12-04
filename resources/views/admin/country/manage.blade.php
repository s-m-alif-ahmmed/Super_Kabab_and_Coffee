@extends('admin.master')

@section('title')
    Country Manage | Super Kabab & Coffee
@endsection

@section('content')

    <div class="page-header">
        <div>
            <h1 class="page-title">Manage</h1>
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
                                <th class="wd-15p border-bottom-0">Country</th>
                                <th class="wd-10p border-bottom-0">Status</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td >{{$country->country}}</td>
                                    <td>
                                        @if($country->status == 1)
                                            <a href="{{route('country-change-status', $country->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Published</a>
                                        @elseif($country->status == 0)
                                            <a href="{{route('country-change-status', $country->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Unpublished</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('country.edit', Crypt::encryptString($country->id) )}}" class="btn btn-success btn-sm my-1">Edit</a>
                                        <a href="{{route('country.show', Crypt::encryptString($country->id) )}}" class="btn btn-success btn-sm my-1">Detail</a>

                                        <form action="{{route('country.destroy', $country->id)}}" onclick="return confirm('Are you sure to delete this country?')" method="post" >
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
