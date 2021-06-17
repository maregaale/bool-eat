
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
            <div class="container show_container">
        
                {{-- piatto --}}
                <div class="plate_container">
                    <div class="plate">
                        <h2 >{{$plate->name}}</h2>
        
                        {{-- immagine con storage --}}
                        {{-- <img class="mb-5 mt-5" src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}"> --}}
                        {{-- /immagine con storage --}}
        
                        {{-- immagine con remoto --}}
                        <img class="mb-4 mt-4" src="{{$plate->image ? $plate->image : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}">
                        {{-- /immagine con remoto --}}
        
                        {{-- ingredienti --}}
                        <div class="block">
                            <h4>Ingredienti: </h4>
                            <p class="par"> {{ $plate->ingredients}}</p>
                        </div>
                        {{-- /ingredienti --}}
        
                        
                        {{-- Descrizione --}}
                        <div class="block">
                            <h4>Descrizione: </h4>
                            <p class="par">{{ $plate->description }}</p>
                        </div>
                        {{-- /Descrizione --}}

                        {{-- Tipologia --}}
                        <div class="type_block">
                            <h4>Tipologia: </h4>
                            <div class="text_container">
                                <div class="types">
                                    <p>Vegan:</p>
                                    <p class="par">{!! $plate->vegan ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                </div>

                                <div class="types">
                                    <p>Gluten Free:</p>
                                    <p class="par">{!! $plate->gluten_free ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                </div>

                                <div class="types">
                                    <p>Vegetarian:</p>
                                    <p class="par">{!! $plate->vegetarian ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                </div>

                                <div class="types">
                                    <p>Hot:</p>
                                    <p class="par">{!! $plate->hot ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                </div>

                            </div>
                        </div>
                        {{-- /Tipologia --}}
        
                        {{-- prezzo --}}
                        <div class="block">
                            <h4>Prezzo: </h4>
                            <p class="par">{{ $plate->price }} &euro;</p>
                        </div>
                        {{-- /prezzo --}}
        
                    </div>
                </div>
                {{-- /piatto --}}
            </div>
        </div> 
    </div>
@endsection



