<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" crossorigin="anonymous">
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">
    <title>Twyla Books Reivew</title>
</head>
<body class="text-center">

<form class="form-signin" method="post" action="{{url('/register')}}">
    {{ csrf_field() }}
    @if (Session::has('error'))
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>
    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Usename" required="" autofocus="">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    <p class="mt-5 mb-3 text-muted">© 2017-2018</p>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.slim.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/popper.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap.min.js')}}" crossorigin="anonymous"></script>
</body>
</html>