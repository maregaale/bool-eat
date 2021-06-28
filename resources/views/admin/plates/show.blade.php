@extends('layouts.app')

@section('page_title')
    Booleat | Il Piatto | {{$plate->name}}    
@endsection

@section('content')

    {{-- <div class="main_logo container">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div> --}}
    
    <div class="dashboard_container">

        
        @include('partials.aside_left')

        {{-- dashboard right (menu) --}}
        <div class="dashboard_right">



                <section class="container-fluid">

                    {{-- titolo  --}}
        
                
                    {{-- errori --}}
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{-- /errori --}}
                    
                     
        
        
                </section>
        

        
                {{-- piatto --}}

                <div class="container-fluid">

                    <div class="col-12">
        
                        <div class="dashboard_right-showplate">
        
                            <div class="dashboard-right box-padding">

                                <div class="plate">
                                    <h2 >{{$plate->name}}</h2>
                    
                                    {{-- immagine con storage --}}
                                    {{-- <img class="mb-5 mt-5" src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}"> --}}
                                    {{-- /immagine con storage --}}
                    
                                    {{-- immagine con remoto --}}
                                    <img src="{{ asset('storage/' . $plate->image )}}" alt="{{$plate->name}}" style="">
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
                                    <div class="type_block mb-3">
                                        <h4>Tipologia: </h4>
                                        <div class="dashboard_right-showplate-card">
                                            <div class="types col-6 {!! $plate->vegan ? 'bg-good' : 'bg-wrong'!!} box-padding">
                                                <p>Vegan:</p>
                                                <p class="par">{!! $plate->vegan ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle "></i>'!!}</p>
                                            </div>
            
                                            <div class="types col-6 {!! $plate->gluten_free ? 'bg-good' : 'bg-wrong'!!} box-padding">
                                                <p>Gluten Free:</p>
                                                <p class="par">{!! $plate->gluten_free ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                            </div>
            
                                            <div class="types col-6 {!! $plate->vegetarian ? 'bg-good' : 'bg-wrong'!!} box-padding">
                                                <p>Vegetarian:</p>
                                                <p class="par">{!! $plate->vegetarian ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'!!}</p>
                                            </div>
            
                                            <div class="types col-6 {!! $plate->hot ? 'bg-good' : 'bg-wrong'!!} box-padding">
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
                        </div>
                    </div>
                </div>
        
                <div class="plate_container">

                </div>
                {{-- /piatto --}}
        </div> 
        {{-- /dashboard right (menu) --}}
    </div>
@endsection



