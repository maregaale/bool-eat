@guest
    <div class="main_nav_home">
        <a class="" href="{{ url('/') }}"> 
            <img src="{{asset('images/bool_eat.png')}}" alt="">
        </a>

        <div class="nav_top_right">
            <span class="hamburger_nav"><i class="fas fa-hamburger"></i></span>
            <a><a class="ml-2" href="{{ route('login') }}"><button class="button_card_menu"><i class="material-icons">login</i><span>{{ __('Login') }}</span></button></a>
            @if (Route::has('register'))
            <a><a class="ml-2" href="{{ route('register') }}"><button class="button_card_menu"><i class="material-icons">face</i><span>{{ __('Register') }}</span></button></a>                                  
        </div>
    </div>
        @endif
    </div>
    @else
    <div class="dashboard_left_info">
 
     <div class="dash-link">
        <a href="{{route('home')}}"><span class="mr-2 "><i class="fas fa-home  fa-2x  mr-2"></i></span><h5>Torna alla Dashboard</h5></a>
    </div>

    <div class="logout_btn">
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
@endguest