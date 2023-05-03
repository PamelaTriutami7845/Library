<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    
    <!-- Scripts -->
    <script type="text/javascript">
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>    

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div style="background-color: #2b2b8e;">
                <div class="container">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>

                    <ul class="nav navbar-nav navbar-right nav-accounts">
                        <!-- Authentication Links -->
                        @guest
                            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown" id="notifications">
                                
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
            @auth
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <div class="container">
                    <ul class="nav navbar-nav secondary-nav">
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Files <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Information Files</li>
                                <li><a href="{{ route('product-profiles.index') }}">Product Profile</a></li>
                                <li><a href="{{ route('customer-profiles.index') }}">Customer Profile</a></li>
                                <li><a href="{{ route('supplier-profiles.index') }}">Supplier Profile</a></li>
                                <li><a href="{{ route('company-profiles.index') }}">Company Profile</a></li>
                                <li class="dropdown-header">Transaction Files</li>
                                <li><a href="{{ route('proforma-invoice.index') }}">Proforma Invoice</a></li>
                                <li><a href="{{ route('purchase-orders.index') }}">Purchase Order to Supplier</a></li>
                                <li><a href="#">Warehouse Delivery Receipt</a></li>
                                <li><a href="#">Cash Voucher</a></li>
                                <li><a href="#">Order List</a></li>
                                <li><a href="#">Packing List</a></li>
                                <li><a href="#">Sales Invoice</a></li>
                                <li><a href="{{ route('gate-pass.index') }}">Gate Pass</a></li>
                            </ul>
                        </li>
                        <li><a href="">Sales Transactions</a></li>
                        <li><a href="">Accounting Files</a></li>
                        <li><a href="">Purchasing</a></li>
                        <li><a href="">Accounting</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User Management <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('users.index')}}">All Users</a></li>
                                <li><a href="{{ route('roles.index')}}">Roles</a></li>
                            </ul>
                        </li>
                        <li><a href="">System Admin</a></li>
                    </ul>
                </div>
            </div>
            @endauth
        </nav>
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>
    @include ('footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
@satrio-87
 