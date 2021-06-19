
@extends('layouts.app')
@section('pageTitle')
    {{$plate->name}}    
@endsection
@section('content')

    <div class="main_logo container">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div>
    
    <div class="container dashboard_container">
        
        @include('partials.aside_left')

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
        {{-- /dashboard right (menu) --}}
    </div>
@endsection



