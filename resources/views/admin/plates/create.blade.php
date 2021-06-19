@extends('layouts.app')

@section('pageTitle')
    Add Plate
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
                    <a href="{{route('home')}}"><span class="mr-2"><i class="fas fa-edit"></i></span> Dashboard</a>
                    {{-- <a href="{{ route('admin.plates.index') }}"><span class="mr-2"><i class="fas fa-edit"></i></span> Modifica i tuoi dati</a> --}}
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

        {{-- dashboard right (info piatti, statistiche) --}}
        <div class="dashboard_right">

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

{{-- form creazione piatto--}}
<form action="{{route('admin.plates.store')}}" method="POST" enctype="multipart/form-data">
    @method('POST')
    @csrf

    {{-- input info piatto --}}
    <h1 class="mb-3">Aggiungi nuovo piatto</h1>

    <div class="form-group">
        <label for="name">Nome piatto</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci un piatto">
    </div>

    <div class="form-group">
        <label for="ingredients">Ingredienti</label>
        <textarea class="form-control" name="ingredients" id="ingredients" placeholder="Inserisci gli ingredienti"></textarea>
    </div>

    <div class="form-group">
        <label for="price">Prezzo</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Inserisci il prezzo">
    </div>

    <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea name="description" class="form-control" id="description" rows='4' placeholder="Descrizione"></textarea>
    </div>

    <div class="form-group">
        <label for="scope">Portata</label>
        <input type="text" class="form-control" name="scope" id="scope" placeholder="Inserisci il tipo di portata">
    </div>
    {{-- /input info piatto --}}

    {{-- checkbox pubblicazione--}}
    <div class="form-check form-check-inline d-block mt-2">
        <input class="form-check-input" type="checkbox" id="visible" name="visible">
        <label class="form-check-label" for="visible">Pubblica piatto</label>
         {{-- check checkbox --}}
         <span class="form-check-sign">
            <span class="check"></span>
       </span>
        {{-- /check checkbox --}}
    </div>
    {{-- checkbox pubblicazione--}}
    
    {{-- checkboxes tipologia--}}
    <h2 class="mt-5">Tipologia</h2>

    <div class="form-check form-check-inline mt-3">
        <input class="form-check-input" type="checkbox" id="vegan" name="vegan">
        <label class="form-check-label" for="vegan">Vegano</label>
         {{-- check checkbox --}}
         <span class="form-check-sign">
            <span class="check"></span>
       </span>
        {{-- /check checkbox --}}
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian">
        <label class="form-check-label" for="vegetarian">Vegetariano</label>
         {{-- check checkbox --}}
         <span class="form-check-sign">
            <span class="check"></span>
       </span>
        {{-- /check checkbox --}}
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="gluten_free" name="gluten_free">
        <label class="form-check-label" for="gluten_free">Senza glutine</label>
         {{-- check checkbox --}}
         <span class="form-check-sign">
            <span class="check"></span>
       </span>
        {{-- /check checkbox --}}
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="hot" name="hot">
        <label class="form-check-label" for="hot">Piccante</label>
         {{-- check checkbox --}}
         <span class="form-check-sign">
            <span class="check"></span>
       </span>
        {{-- /check checkbox --}}
    </div>
    {{-- /checkboxes tipologia--}}

    {{-- upload immagine --}}
    <div class="form-group mt-3">
        <label for="image">Immagine</label>
        {{-- <input type="text" class="form-control" id="image" name="image" placeholder="Image"> --}}
        <input type="file" id="image" name="image">
         {{-- button upload --}}
         <span class="input-group-btn">
            <button type="button" class="btn btn-fab btn-round btn-primary">
                <i class="material-icons"><i class="fas fa-paperclip"></i></i>
            </button>
        </span>
        {{-- /button upload --}}
    </div>
    {{-- /upload immagine --}}

    {{-- bottone submit --}}
    <button type="submit" class="btn btn-success mt-3">Salva!</button>
    {{-- /bottone submit --}}
</form>
{{-- /form creazione piatto--}}

        </div> 
    </div>
@endsection


