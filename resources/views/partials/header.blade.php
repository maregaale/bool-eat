@guest
    <div class="main_nav_home">
        <a class="" href="{{ url('/') }}"> 
            <img src="{{asset('images/bool_eat.png')}}" alt="">
        </a>

        <div class="nav_top_right">
            <span class="hamburger_nav"><i class="fas fa-hamburger"></i></span>
            <button class="button_card_menu"><a><i class="material-icons">login</i><a class="ml-2" href="{{ route('login') }}"><span>{{ __('Login') }}</span></a></button>
            @if (Route::has('register'))
            <button class="button_card_menu"><a><i class="material-icons">face</i><a class="ml-2" href="{{ route('register') }}"><span>{{ __('Register') }}</span></a></button>                                    
        </div>
    </div>
        @endif
    </div>
    @else
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
@endguest