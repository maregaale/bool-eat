@extends('layouts.main')

@section('pageTitle')
	Modifica: {{$plate->name}}
@endsection

@section('content')
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

    {{-- form di modifica piatto --}}
    <form class="mt-5" action="{{route('admin.plates.update', ['plate' => $plate->id])}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        {{-- input info piatto --}}
        <h1 class="mb-3">Modifica il piatto</h1>

        <div class="form-group">
            <label for="name">Nome piatto</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci un piatto" value="{{$plate->name}}">
        </div>

        <div class="form-group">
            <label for="ingredients">Ingredienti</label>
            <textarea class="form-control" name="ingredients" id="ingredients" placeholder="Inserisci gli ingredienti" value="{{$plate->ingredients}}">{{$plate->ingredients}}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prezzo</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Inserisci il prezzo" value="{{$plate->price}}">
        </div>

        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" class="form-control" id="description" rows='4' placeholder="Descrizione" value="{{$plate->description}}">{{$plate->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="scope">Portata</label>
            <input type="text" class="form-control" name="scope" id="scope" placeholder="Inserisci il tipo di portata" value="{{$plate->scope}}">
        </div>
        {{-- /input info piatto --}}

        {{-- checkbox pubblicazione--}}
        <div class="form-check form-check-inline d-block mt-2">
            <input class="form-check-input" type="checkbox" id="visible" name="visible" value="{{$plate->visible}}" {{$plate->visible ? 'checked' : ''}}>
            <label class="form-check-label" for="visible">Pubblica piatto</label>
        </div>
        {{-- /checkbox pubblicazione--}}

        {{-- checkboxes tipologia--}}
        <h2 class="mt-5">Tipologia</h2>

        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" type="checkbox" id="vegan" name="vegan" value="{{$plate->vegan}}" {{$plate->vegan ? 'checked' : ''}}>
            <label class="form-check-label" for="vegan">Vegano</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian" value="{{$plate->vegetarian}}" {{$plate->vegetarian ? 'checked' : ''}}>
            <label class="form-check-label" for="vegetarian">Vegetariano</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="gluten_free" name="gluten_free" value="{{$plate->gluten_free}}" {{$plate->gluten_free ? 'checked' : ''}}>
            <label class="form-check-label" for="gluten_free">Senza glutine</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="hot" name="hot" value="{{$plate->hot}}" {{$plate->hot ? 'checked' : ''}}>
            <label class="form-check-label" for="hot">Piccante</label>
        </div>
        {{-- /checkboxes tipologia--}}

        {{-- modifica immagine --}}
        <div class="form-group mt-3">
            <label for="image">Immagine</label>
            {{-- <input type="text" class="form-control" id="image" name="image" placeholder="Image"> --}}
            <input type="file" id="image" name="image" value="{{$plate->image}}">
        </div>
        {{-- /modifica immagine --}}

        {{-- bottone submit --}}
        <button type="submit" class="btn btn-success mt-3">Salva!</button>
        {{-- /bottone submit --}}

    </form>
    {{-- /form di modifica piatto --}}
@endsection