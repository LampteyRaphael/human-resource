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
    <div id="app">
        <nav class="navbar navbar-expand-md  shadow-sm" id="nav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="" id="admins" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                    Human Resource Department
                                </a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="admins">
                                    <a href="{{route('Annual-leave-application.create')}}" class="dropdown-item">Apply For Leave</a>
                                    <a href="{{route('Annual-leave-application.index')}}" class="dropdown-item">Leave Application</a>
                                    <a href="{{route('department.index')}}" class="dropdown-item">Department</a>
                                    <a href="{{route('job-title.index')}}" class="dropdown-item">Job Title</a>
                                    <a href="" class="dropdown-item">Create Signature</a>
                                    <a href="" class="dropdown-item">List of Signature</a>
                                    <a href="" class="dropdown-item">Recommendation && Approval</a>
                                    <a href="{{route('Admins.index')}}" class="dropdown-item">Administrators</a>
                                    <a href="{{route('ranks.index')}}" class="dropdown-item">List Of Ranks</a>
                                    <a href="{{route('promotion.index')}}" class="dropdown-item">Promotion Due List</a>
                                    <a href="{{route('retirement.index')}}" class="dropdown-item">Retirement List</a>
                                </div>
                            </li>
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a href="" id="admins" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>--}}
{{--                                    Admins--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu" aria-labelledby="admins">--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a href="" id="admins" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>--}}
{{--                                    Admins--}}
{{--                                </a>--}}
{{--                                <div class="dropdown-menu dropdown-menu" aria-labelledby="admins">--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                    <a href="" class="dropdown-item">Create</a>--}}
{{--                                    <a href="" class="dropdown-item">Update</a>--}}
{{--                                    <a href="" class="dropdown-item">Delete</a>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @include('sweetalert::alert')
        </main>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $("#approve").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var ids=button.data('ids');
                var name = button.data('names');
                var job = button.data('job');
                var department = button.data('department');
                var applyfor=button.data('applyfor');
                var year =button.data('year');
                var effective=button.data('effective');
                var signs=button.data('sign');
                var recommendedBy=button.data('recommended');
                var approved=button.data('approved');
                var modal=$(this)
                modal.find(".modal-body #ids").val(ids);
                modal.find('.modal-title').text('Form Approval');
                modal.find(".modal-body #user_id ").val(name).attr('selected', 'selected');

                modal.find(".modal-body #title_id ").val(job).attr('selected', 'selected');
                modal.find(".modal-body #department_id ").val(department).attr('selected', 'selected');
                modal.find(".modal-body #applyfor").val(applyfor);
                modal.find(".modal-body #year").val(year);
                modal.find(".modal-body #effectiveDate").val(effective);
                modal.find(".modal-body #signatureID").val(signs).attr('selected', 'selected');
                modal.find(".modal-body #recommendedBy").val(recommendedBy).attr('selected', 'selected');
                modal.find(".modal-body #approvedBy").val(approved).attr('selected', 'selected');
            });



            $("#approveAdmin").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var ids=button.data('ids');
                var name = button.data('names');
                var email = button.data('email');
                var telephone = button.data('telephone');
                var dateOfAppointment=button.data('dateofappointment');
                var rank =button.data('rank');

                var modal=$(this)
                modal.find(".modal-body #ids").val(ids);
                // modal.find('.modal-title').text('Form Approval');
                modal.find(".modal-body #name ").val(name);
                modal.find(".modal-body #email ").val(email);
                modal.find(".modal-body #telephone ").val(telephone);
                modal.find(".modal-body #dateOfAppointment").val(dateOfAppointment);
                modal.find(".modal-body #rank ").val(rank).attr('selected','selected');
            });



            $("#addupdate").on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var ids=button.data('ids');
                var name = button.data('names');
                var modal=$(this)
                modal.find('.modal-title').text('Form Approval');
                modal.find(".modal-body #ids").val(ids);
                modal.find(".modal-body #name").val(name);
            });




        });
    </script>

</body>
</html>
