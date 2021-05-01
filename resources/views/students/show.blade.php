<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/style.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">



    <style>
        #nav{
            background-color: #4267b2;
            border-bottom: 1px solid #29487d;
            font-family:San Francisco ;
            color: #fff;
        }

        .remove{
            /*background-color: #4267b2;*/
            color: #fff;
        }

        .navbar-nav .nav-item .nav-link{
            color: #fff;
        }
        .navbar-nav .dropdown-menu a:hover{
            background-color: #4267b2;
            color: #fff;
        }

        .navbar-brand{
            color: #fff;

        }

        .table  .action{
            background-color:#4267b2;
            color: #fff;
        }

        .table  .action a{
            background-color:#4267b2;
            color: #fff;
        }

        .table  .action a:hover{
            background-color:#fff;
            color: #000;
            overflow: hidden;
        }
    </style>
</head>
<body>



<h1 class="btn-danger">This is the view page of show</h1>


<h1 class="btn-primary">{{$id}}</h1>

<h1 class="btn-danger">{{$name}}</h1>
</body>
</html>
