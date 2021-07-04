@guest

    <div class="main_nav_home">
        <div class="div">
        <a class="" href="{{ url('/') }}"> 
            <img src="{{asset('images/bool_eat.png')}}" alt="">
        </a>
        <div id="dark" v-on:click="darkThemeSwitch(); toggleTheme()" class="wrapper">
            <input type="checkbox" name="checkbox" v-model="checked" class="switch">
        </div>
    </div>


        <div class="nav_top_right">
            <span class="hamburger_nav"><i class="fas fa-hamburger"></i></span>
            <a class="ml-2 " href="{{ route('login') }}">
                <button class="button_card_menu ">
                    <i class="fas fa-external-link-square-alt"></i>
                        <span>{{ __('Login') }}</span>
                </button>
            </a>
            @if (Route::has('register'))
            <a class="ml-2 " href="{{ route('register') }}"><button class="button_card_menu"><i class="fas fa-address-card"></i><span>{{ __('Register') }}</span></button></a>     
            
                             
        </div>
        @endif

    </div>
    


    @else



    {{-- navbar dei poveri --}}


    {{-- <div class="dashboard_left_info">
 
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
    </div> --}}

 {{--  --}}
 <div class="main_nav_home">
    <a class="ml-2 " href="{{ route('logout') }}">
        <button class="button_card_menu " onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
                <span>{{ __('Logout') }}</span>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
            @csrf
        </form>  

    </a>

    <a class="ml-2 mr-4" href="{{route('home')}}">
        <button class="button_card_menu " >
            <i class="fas fa-chart-line"></i>
            <span>Torna alla Dashboard</span>
        </button>

    </a>

    


</div>


    <div class="nav_top_right">

        

                         
    </div>
    

</div>
</div>
@endguest