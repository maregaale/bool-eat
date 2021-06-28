 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
    <link  rel= "apple-touch-icon"  size = "57x57"  href= "{{asset('apple-icon-57x57.png')}}"> 
    <link  rel= "apple-touch-icon"  size= "60x60"  href= "{{asset('apple -icon-60x60.png')}}"> 
    <link  rel= "apple-touch-icon  " size = "72x72"  href= "{{asset('apple-icon-72x72.png')}}"> 
    <link  rel= "apple-touch-icon"  size= "76x76"  href= "{{asset('apple-icon-76x76.png')}}"> 
    <link  rel= "apple-touch-icon  " size = "114x114"  href= "{{asset('apple-icon-114x114.png')}}"> 
    <link  rel= "apple-touch-icon"  size = "120x120"  href= "{{asset('apple-icon-120x120.png')}}"> 
    <link  rel= "apple-touch-icon"  size= "144x144"  href= "{{asset('apple-icon-144x144.png')}}"> 
    <link  rel = "apple-touch-icona"  dimensioni = "152x152"  href= "{{asset('apple-icon-152x152.png')}}"> 
    <link  rel = "apple-touch-icona"  taglie = "180x180"  href= "{{asset('apple-icon-180x180.png')}}"> 
    <link  rel= "icon"  type= "image/png"  size= "192x192"  href= "{{asset('android-icon-192x192.png')}}"> 
    <link  rel= "icon"  type= "image/png  " size = "32x32"  href= "{{asset('favicon-32x32.png')}}"> 
    <link  rel= "icon"  type = "image / jpeg"  dimensioni = "96x96"  href = "{{asset('favicon-96x96.png')}}"> 
    <link  rel = "icona"  type = "/ png immagine"  dimensioni = "16x16"  href = "{{asset('favicon-16x16. png')}}"> 
    <link  rel= "manifesto" href= "/manifest.json"> 
    <meta  name="msapplication-TileColor"  content= "#ffffff"> 
    <meta  name= "msapplication-TileImage"  content= "/ms-icon-144x144.png"> 
    <meta  name= "theme-color"  content= "#ffffff">

    <!-- Fonts and icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

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

                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

    <script src="{{ asset('js/dark_mode.js')}}"></script>
    @yield('script')
</body>
</html>