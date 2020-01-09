<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Electronics Shop</title>
    <!-- Font Awesome -->

    <link rel="stylesheet" type="text/css" href="{{URL ::to('panel/fontawesome-free-5.8.1-web/css/all.css')}}">
    <!-- Bootstrap core CSS -->
    <link href="{{URL ::to('panel/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{URL ::to('panel/css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{URL ::to('panel/css/style.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('panel/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{asset('panel/js/popper.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('panel/js/bootstrap.min.js')}}"></script>
    <!-- MDB core JavaScript -->
    
</head>

<body>

    <!-- Start your project here-->
    <!-- navigation menu -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a href="#" class="navbar-brand text-warning">&nbsp;&nbsp;
           Electronics Shop</a>
        <button class="navbar-toggler " data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ URL :: to('/') }}" class="nav-link">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        </i>About</a>
                </li>
                <li class="nav-item">
                    <a href="{{URL :: to('/products') }}" class="nav-link">
                        <i class="fab fa-product-hunt"></i>Products</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                @if(Session :: get('user_name') === 'admin')
                <li class="nav-item">
                    <a href="{{ URL :: to('/admin') }}" class="nav-link">
                        <i class="fas fa-chart-bar"></i>Admin Panel</a>
                </li>
                @endif

                @if(Session :: get('user_name') == null)
                <li class="nav-item">
                    <a href="{{ URL :: to('/signup') }}" class="nav-link">
                        <i class="fas fa-user-plus"></i>Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{ URL :: to('/login') }}" class="nav-link">
                        <i class="fas fa-sign-in-alt"></i>Login</a>
                </li>
                @endif

                @if(Session :: get('user_name') !== 'admin')
                <li class="nav-item">
                <a href="{{ URL :: to('/contact')}}" class="nav-link">
                        <i class="fas fa-envelope"></i>Contact Us</a>
                </li>
                @endif
                @if(Session :: get('user_name'))
                <li class="nav-item">
                    <div class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-user"></i>{{ Session :: get('user_name') }}</a>
                        <div class="dropdown-menu">
                        @if(Session :: get('user_name') !== 'admin')
                        <a class="dropdown-item" href="{{ URL :: to('/edit-profile') }}"><i class="fas fa-user-edit"></i>Edit Profile</a>
                        @endif
                        <a class="dropdown-item" href="{{ URL :: to('/logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </div>
                      
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    @yield('body')
    <script type="text/javascript" src="{{asset('panel/js/mdb.min.js')}}"></script>