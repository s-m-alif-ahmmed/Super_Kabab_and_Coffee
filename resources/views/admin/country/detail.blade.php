@extends('admin.master')

@section('title')
    Country Detail | Super Kabab & Coffee
@endsection

@section('content')

    <section class="mt-3 py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Country Detail Page</div>
                        <p class="text-success text-center">{{session('message')}}</p>
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th>Country ID</th>
                                    <td>{{$country->id}}</td>
                                </tr>
                                <tr>
                                    <th>Country Name</th>
                                    <td >{{$country->country}}</td>
                                </tr>
                                <tr>
                                    <th>Country Status</th>
                                    <td>
                                        @if($country->status == 1)
                                            <a href="{{route('country-change-status', $country->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Published</a>
                                        @elseif($country->status == 0)
                                            <a href="{{route('country-change-status', $country->id)}}" onclick="return confirm('Are you sure to change status?')" class="btn btn-success btn-sm">Unpublished</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Action</th>
                                    <td>
                                        <form action="{{route('country.destroy', $country->id)}}" onclick="return confirm('Are you sure to delete this country?')" method="post" >
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
