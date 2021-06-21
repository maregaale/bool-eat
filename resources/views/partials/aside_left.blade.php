{{-- dahsboard left (modifica dati vari, visualizza) --}}
<aside class="dashboard_left">
  <div class="container_aside">
    <div class="box_info">
      {{-- logo --}}
      <img src="{{ Auth::user()->logo }}" src="{{Auth::user()->logo ? asset('storage/' . Auth::user()->logo) : 'https://via.placeholder.com/200'}}" alt="">

      {{-- <img src="https://www.freeiconspng.com/thumbs/restaurant-icon-png/restaurant-icon-png-7.png" alt=""> --}}
      
      {{-- Restaurant name --}}
      <h3 class="mt-5 font-weight-bold">{{ Auth::user()->restaurant_name }}</h3>

      {{-- bottone modifica dati --}}
      <a href="{{route('admin.user.edit' , ['user' => Auth::user()->id])}}"><span class="mr-2"><i class="fas fa-plus-circle"></i></span> Modifica i tuoi dati</a>
    </div>
          
    {{-- modifiche varie --}}
    <div class="dashbord_left_info">

      <a href="{{route('home')}}"><span class="mr-2"><i class="fas fa-home"></i></span> Dashboard</a>

      <a class="" href="{{ route('admin.plates.index') }}"><span class="mr-2"><i class="fas fa-eye"></i></span> Visualizza Menù</a>

      <a href="{{route('admin.plates.create')}}"><span class="mr-2"><i class="fas fa-plus-circle"></i></span> Aggiungi Piatto</a>
    </div>
    {{-- /modifiche varie --}}


    {{-- button logout --}}
    <div class="dashbord_left_info logout_btn">
      <button class="btn btn-logout" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </button>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
          @csrf
      </form>
    </div>
  </div>
</aside>
{{-- /dahsboard left (modifica dati vari, visualizza) --}}