 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    {{-- fontawesome --}}
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- axios --}}
     <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('style')
    <title>@yield('pageTitle')</title>
</head>
<body>
    {{-- <nav class="navbar-expand-md"> --}}
            {{-- <div class="container">   --}}
                 
                 {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul> 

                    <!-- Right Side Of Navbar -->
                     <ul class="">
                        <!-- Authentication Links -->
                         @guest
                        {{-- <div class="main_nav_home">
                            <a class="" href="{{ url('/') }}"> 
                                <img src="{{asset('images/bool_eat.png')}}" alt=""></a>
                             </a> 
                             <div>
                            <a class="">
                                <button class="btn btn-primary btn-round"><i class="material-icons">login</i><a class="ml-2" href="{{ route('login') }}">{{ __('Login') }}</a></button>
                            </a>
                            @if (Route::has('register'))
                                <a class="">
                                    <button class="btn btn-primary btn-round"><i class="material-icons">face</i><a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a></button>                                    
                                </a>
                            </div>
                            @endif
                        </div> --}}
                        @else
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.plates.index') }}">I tuoi Piatti</a>
                        </li> 
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> 

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    - <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <div class="dashbord_left_info logout_btn">
                                        <button class="btn btn-info" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </button>
                    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            {{-- </div> --}}
    {{-- </nav>  --}}

    @yield('content')
    

    @yield('script')
</body>
</html>