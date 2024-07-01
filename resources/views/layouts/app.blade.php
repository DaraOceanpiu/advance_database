<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STAFF-MANAGEMENT</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #ffeeba;
        }

        .navbar,
        .navbar-nav .nav-link, .btn-custom {
            background-color: #ff7f00;
            color: white;
        }

        .navbar .nav-link:hover,
        .list-group-item:hover {
            background-color: #ff9f40;
            color: white;
        }

        .active-page {
            background-color: #ff9f40 !important;
            color: white !important;
        }

        .container-fluid {
            padding: 0;
        }

        .sidebar {
            background-color: #333;
            min-height: 100vh;
        }

        .sidebar .list-group-item {
            background-color: #333;
            color: white;
        }

        .sidebar .list-group-item.active,
        .sidebar .list-group-item:hover {
            background-color: #ff7f00;
            color: white;
        }

        .card-title {
            color: #ff7f00;
        }

        .auth-button {
            width: 100%;
            margin-top: 10px;
            background-color: #ff7f00;
            color: white;
        }

        .auth-button:hover {
            background-color: #ff9f40;
            color: white;
        }

        .auth-link {
            color: #ff7f00;
            text-decoration: none;
            padding-left: 10px;
        }

        .auth-link:hover {
            color: #ff9f40;
            text-decoration: underline;
        }

        .navbar-brand {
            font-family: 'Roboto', sans-serif;
            font-size: 1.5em;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    STAFF-MANAGEMENT
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if (!Request::is('login') && !Request::is('register'))
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-md-3 sidebar">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('dashboard') }}"
                                class="list-group-item list-group-item-action {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
                            <a href="{{ route('staff.index') }}"
                                class="list-group-item list-group-item-action {{ Request::is('staff*') ? 'active' : '' }}">Staff</a>
                            <a href="{{ route('roles.index') }}"
                                class="list-group-item list-group-item-action {{ Request::is('roles*') ? 'active' : '' }}">Roles</a>
                            <a href="{{ route('departments.index') }}"
                                class="list-group-item list-group-item-action {{ Request::is('departments*') ? 'active' : '' }}">Departments</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        @else
            <main class="py-4">
                @yield('content')
            </main>
        @endif
    </div>
    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
