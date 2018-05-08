<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/fontawesome-all.min.css')}}" crossorigin="anonymous">

    <title>Twyla Books Reivew</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Twyla Books</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{url('books')}}">Books <span class="sr-only">(current)</span></a>
            </li>


        </ul>

        <ul class="navbar-nav float-right">
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Welcome, {{$_COOKIE['username']}}
                </a>
                <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                </div>
            </li>


        </ul>


    </div>
</nav>
<div class="container mt-4">
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
<!-- Content here -->
    @yield('content')
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</body>
</html>