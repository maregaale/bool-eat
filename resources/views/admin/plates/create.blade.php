@extends('layouts.main')

@section('PageTitle')
    Add Plate
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mt-5" action="{{route('admin.plates.store')}}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
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

        <div class="form-check form-check-inline d-block mt-2">
            <input class="form-check-input" type="checkbox" id="visible" name="visible">
            <label class="form-check-label" for="visible">Pubblica piatto</label>
        </div>

        <h2 class="mt-5">Tipologia</h2>

        <div class="form-check form-check-inline mt-3">
            <input class="form-check-input" type="checkbox" id="vegan" name="vegan">
            <label class="form-check-label" for="vegan">Vegano</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="vegetarian" name="vegetarian">
            <label class="form-check-label" for="vegetarian">Vegetariano</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="gluten_free" name="gluten_free">
            <label class="form-check-label" for="gluten_free">Senza glutine</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="hot" name="hot">
            <label class="form-check-label" for="hot">Piccante</label>
        </div>

        <div class="form-group mt-3">
			<label for="image">Immagine</label>
			{{-- <input type="text" class="form-control" id="image" name="image" placeholder="Image"> --}}
			<input type="file" id="image" name="image">
		</div>

        <button type="submit" class="btn btn-success mt-3">Salva!</button>
    </form>
        
    @endsection