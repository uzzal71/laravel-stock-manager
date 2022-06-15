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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style type="text/css">
        ul.top-menu>li>a {
            color: #666;
            font-size: 12px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            border: 1px solid #666!important;
            padding: 5px 10px;
            margin-right: 10px;
            font-weight: bold;
        }

        ul.top-menu>li>.logout {
            color: #f2f2f2;
            font-size: 12px;
            border-radius: 4px;
            -webkit-border-radius: 4px;
            border: 1px solid #64c3c2!important;
            padding: 5px 10px;
            background: #68dff0;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: #ffd777 !important;border-bottom: 1px solid #c9aa5f;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Stock Manager') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto top-menu">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-barcode"></i>
                                    <span class="hidden-xs hidden-sm">Items</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-list"></i> List Items
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Item
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Item by csv
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-arrow-circle-up"></i>
                                    <span class="hidden-xs hidden-sm">Check-Ins</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-list"></i> List Check-ins
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> New Check-in
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Check-in by csv
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-arrow-circle-down"></i>
                                    <span class="hidden-xs hidden-sm">Check-Outs</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-list"></i>  List Check-outs
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> New Check-outs
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Check-out by csv
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-users"></i>
                                    <span class="hidden-xs hidden-sm">People</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('roles.index') }}">
                                        <i class="fa fa-list"></i> List Roles
                                    </a>

                                    <a class="dropdown-item" href="{{ route('roles.create') }}">
                                        <i class="fa fa-plus"></i> Add Role
                                    </a>
                                    <a class="dropdown-item" href="{{ route('users.index') }}">
                                        <i class="fa fa-list"></i> List Users
                                    </a>

                                    <a class="dropdown-item" href="{{ route('roles.create') }}">
                                        <i class="fa fa-plus"></i> Add User
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-list"></i> List Customers
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Customer
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-list"></i> List Suppliers
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Supplier
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-cogs"></i>
                                    <span class="hidden-xs hidden-sm">Settings</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-cogs"></i> Settings
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-folder"></i> Categories
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Category
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-folder"></i> Brands
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Brand
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-folder"></i> Barcodes
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-plus"></i> Add Barcode
                                    </a>

                                    <a class="dropdown-item" href="#">
                                        Backups
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle logout" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs hidden-sm capitalize">Hi! {{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-user"></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> 
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
        </main>
    </div>
</body>
</html>
