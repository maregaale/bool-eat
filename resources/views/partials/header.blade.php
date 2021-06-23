@guest
    <div class="main_nav_home">
        <a class="" href="{{ url('/') }}"> 
            <img src="{{asset('images/bool_eat.png')}}" alt="">
        </a>
        <div class="text_icon_nav_top">
            <h2 class="d-inline-block">Affidati al top del top. Scegli Booleat!</h2>
        </div>

            <div class="nav_top_right">
                <span class="hamburger_nav"><i class="fas fa-hamburger"></i></span>
                <button class="button_card_menu"><a><i class="material-icons">login</i><a class="ml-2" href="{{ route('login') }}">{{ __('Login') }}</a></button>
                @if (Route::has('register'))
                <button class="button_card_menu"><a><i class="material-icons">face</i><a class="ml-2" href="{{ route('register') }}">{{ __('Register') }}</a></button>                                    
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