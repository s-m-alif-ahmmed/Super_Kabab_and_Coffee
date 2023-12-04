
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search Result | Super Kabab and Coffee</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/')}}website/img/logo.png">

    <link rel="stylesheet" href="{{asset('/')}}website/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/all.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}website/css/my_style.css">

    <style>
        body
        {
            border: 15px solid #aa4723;
        }
    </style>

</head>
<body>

    <div>
        <div class="container-fluid">
            <div class="row  mx-auto">
                <form action="{{ route('search') }}" method="GET" class="d-flex p-3">
                    @csrf
                    <div class="d-flex w-100">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}" id="search" placeholder="SEARCH STORE" class="form-control border-0 border-white" />
                        </div>
                        <a href="{{ route('home') }}" class="p-2 justify-content-end">
                            <i class="fa fa-2x fa-xmark text-black"></i>
                        </a>
                    </div>
                </form>
                <p class="text-success text-center">{{session('message')}}</p>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 py-3">
                    <div class="d-flex justify-content-between" style="font-size: 15px;">
                        @if($searchItems->isEmpty())
                        @else
                            <a href="{{route('search.items', ['search' => isset($_GET['search']) ?  $_GET['search'] : ''])}}" class="nav-link px-3 text-muted">Products</a>
                            <a href="{{route('search.items', ['search' => isset($_GET['search']) ?  $_GET['search'] : ''])}}" class="text-decoration-underline text-muted nav-link px-3"><p>VIEW ALL</p></a>
                        @endif
                    </div>
                    <hr class="p-0 m-0"/>
                    <div class="row justify-content-center">
                        <p class="text-success text-muted text-center">{{session('message')}}</p>
                        @if($searchItems->isEmpty())
                            <p>No matching results found.</p>
                        @else
                            @foreach($searchItems as $item)
                                @if($item->status == 1)
                                <div class="col-md-4 py-5">
                                    <div class="">
                                        <a href="{{route('item.detail', Crypt::encryptString($item->id) )}}"><img src="{{asset($item->image)}}" class=" h-25" /></a>
                                        <a class="text-decoration-none text-black text-color" href="{{route('item.detail', Crypt::encryptString($item->id) )}}"><h5 class="text-color">{{ $item->name }}</h5></a>
                                        <li class="nav"><span class="text-muted">TK {{ $item->price }}</span></li>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                                <!-- Pagination links -->
                                {{ $searchItems->appends(request()->input())->links('pagination::bootstrap-5') }}
                        @endif
                    </div>

                </div>
            </div>
        </div>

        <script src="{{asset('/')}}website/js/all.js"></script>
        <script src="{{asset('/')}}website/js/bootstrap.bundle.js"></script>
        <script src="{{asset('/')}}website/js/fontawesome.js"></script>

    </div>
</body>
</html>

