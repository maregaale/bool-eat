@extends('layouts.app')


@section('content')

  {{-- toast  --}}
  @if (session('save_name'))
  <div class="alert alert-danger">
      {{ session('save_name') }}
  </div>
  @endif
  {{-- /toast  --}}
  
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
<div class="container">
 {{-- form di modifica piatto --}}
 <form class="mt-5 register_form" action="{{route('admin.user.update', ['user' => Auth::user()->id] )}}" method="POST" enctype="multipart/form-data">
     @method('PUT')
     @csrf

     {{-- input info piatto --}}
     <h1 class="mb-3 text-center">Modifica i tuoi dati comodamente</h1>


     <div class="form-group form-fields">
         <label for="restaurant_name">Nome del Ristorante</label>
         <input type="text" class="form-control" name="restaurant_name" id="restaurant_name" placeholder="Inserisci il prezzo" value="{{Auth::user()->restaurant_name}}">
     </div>

     <div class="form-group form-fields">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Indirizzo" value="{{Auth::user()->address}}">
    </div>

    <div class="form-group form-fields">
        <label for="phone_number">Numero di telefono</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Inserisci il numero di cellulare" value="{{Auth::user()->phone_number}}">
    </div>

    <div class="form-group form-fields">
        <label for="vat_number">Partita IVA</label>
        <input type="text" class="form-control" name="vat_number" id="vat_number" placeholder="Inserisci l' Iva" value="{{Auth::user()->vat_number}}">
    </div>

    {{-- <h3>Categorie Ristorante</h3>
    @foreach ($genres as $genre)
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{$genre->id}}" id="{{$genre->name}}" name="genres[]" {{ Auth::user()->genres->contains($genre) ? 'checked' : ''}}>
        <label class="form-check-label" for="{{$genre->name}}">
          {{$genre->name}}
        </label>
              {{-- check checkbox --}}
              {{-- <span class="form-check-sign">
                <span class="check"></span>
              </span> --}}
              {{-- /check checkbox --}}
      {{-- </div> --}}
    {{-- @endforeach --}}

        {{-- modifica immagine --}}
        <div class="form-group form-file-upload form-file-simple mt-3 form-fields">
            <label for="logo">Logo</label>
            {{-- <input type="text" class="form-control" id="image" name="image" placeholder="Image"> --}}
            <input type="file"  class="inputFileHidden" id="logo" name="logo" value="{{Auth::user()->logo}}">
        </div>
        {{-- /modifica immagine --}}


     {{-- bottone submit --}}
    <div class="form-fields">
     <button type="submit" class="btn btn-success mt-3">Salva!</button>
    </div>
     {{-- /bottone submit --}}

 </form>
 {{-- /form di modifica piatto --}}
</div>

    
@endsection