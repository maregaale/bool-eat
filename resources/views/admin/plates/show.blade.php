
@extends('layouts.app')
@section('pageTitle')
    {{$plate->name}}    
@endsection
@section('content')
    <div class="main_logo container">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div>
    <div class="container dashboard_container">
        <aside class="dashboard_left">
            {{-- dahsboard left (modifica dati vari, visualizza) --}}
            <div class="container_aside">
                <div class="box_info">
                    {{-- logo --}}
                    <img src="{{ Auth::user()->logo }}" alt="">
                    {{-- <img src="https://www.freeiconspng.com/thumbs/restaurant-icon-png/restaurant-icon-png-7.png" alt=""> --}}
                    {{-- Restaurant name --}}
                    <h3 class="mt-5 font-weight-bold">{{ Auth::user()->restaurant_name }}</h3>
                </div>
                
                {{-- modifiche varie --}}
                <div class="dashbord_left_info">
                    <a href="{{route('home')}}"><span class="mr-2"><i class="fas fa-home"></i></span> Dashboard</a>
                    <a class="" href="{{ route('admin.plates.index') }}"><span class="mr-2"><i class="fas fa-eye"></i></span> Visualizza Menù</a>
                    <a href="{{route('admin.plates.create')}}"><span class="mr-2"><i class="fas fa-plus-circle"></i></span> Aggiungi Piatto</a>
                </div>

                {{-- button logout --}}
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
        </aside>

        {{-- dashboard right (menu) --}}
        <div class="dashboard_right">
            <a class="" href="{{ route('admin.plates.index') }}" ><button class="btn btn-secondary"> Torna indietro</button></a>
            {{-- stampiamo i menu --}}
            <div>
                <h2 class="font-weight-bold mt-4">{{$plate->name}}</h2>
                <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">
                <h4>Ingredienti:</h4>
                <p>{{ $plate->ingredients}}</p>
                <h4>Portata: </h4>
                <span>{{ $plate->scope }}</span>
            </div>
        </div> 
    </div>
@endsection



