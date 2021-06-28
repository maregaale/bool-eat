@extends('layouts.app')

@section('page_title')
    Booleat | Aggiungi un Piatto
@endsection

@section('content')
    {{-- <div class="main_logo container">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div> --}}
    
    <div class="container dashboard_container">

        @include('partials.aside_left')

        {{-- dashboard right (info piatti, statistiche) --}}
        <div class="dashboard_right create_plate">

            <section class="container-fluid">

                {{-- titolo  --}}

                <div class="mt-4 mb-0 box-padding">
                    <h2 class="text-uppercase">Aggiungi nuovo piatto</h2>
                        <p >Nuovi piatti incuriosiscono sempre il cliente, faglieli provare!</p>   
                </div>  
            
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


            {{-- form creazione piatto--}}
            <form action="{{route('admin.plates.store')}}" method="POST" class="" enctype="multipart/form-data">
                @method('POST')
                @csrf


            <div class="container-fluid">

                <div class="col-12">

                    <div class="dashboard_right-editmenu">

                        <div class="dashboard-right box-padding">



                                        <div class="form-group form-fields mb-3">
                                            <label for="name">Nome piatto</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Inserisci un piatto" value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group form-fields mb-3" >
                                            <label for="ingredients"><h4>Ingredienti</h4></label>
                                            <textarea class="form-control" name="ingredients" id="ingredients" placeholder="Inserisci gli ingredienti" >{{ old('ingredients') }}</textarea>
                                        </div>

                                        <div class="form-group form-fields mb-3">
                                            <label for="price"><h4>Prezzo</h4></label>
                                            <input type="text" class="form-control" name="price" id="price" placeholder="Inserisci il prezzo" value="{{ old('price') }}">
                                        </div>

                                        <div class="form-group form-fields mb-3">
                                            <label for="description"><h4>Descrizione</h4></label>
                                            <textarea name="description" class="form-control" id="description" rows='4' placeholder="Descrizione">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group form-fields mb-3">
                                            <label for="scope"><h4>Portata</h4></label>
                                            <input type="text" class="form-control" name="scope" id="scope" placeholder="Inserisci il tipo di portata" value="{{ old('scope') }}">
                                        </div>
                                        {{-- /input info piatto --}}

                                        {{-- checkbox pubblicazione--}}
                                    <div class="form-fields">
                                        <div class="form-check form-check-inline d-block mt-2">
                                            <input class="form-check-input" type="checkbox" id="visible" name="visible">
                                            <label class="form-check-label" for="visible">Pubblica piatto</label>
                                            {{-- check checkbox --}}
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                        </span>
                                            {{-- /check checkbox --}}
                                        </div>
                                    </div>
                                        {{-- checkbox pubblicazione--}}
                                        
                                        {{-- checkboxes tipologia--}}
                                    <div class="form-fields">
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
                                    </div>

                                        {{-- upload immagine --}}
                                        <div class="form-group form-fields mt-3">
                                            <label for="image">Immagine</label>
                                            {{-- <input type="text" class="form-control" id="image" name="image" placeholder="Image"> --}}
                                            <input type="file" id="image" name="image">
                                        </div>
                                        {{-- /upload immagine --}}

                                        {{-- bottone submit --}}
                                    <div class="form-fields">
                                        <button type="submit" class="btn btn-success mt-3 ">Salva!</button>
                                        {{-- /bottone submit --}}
                                    </div>
                                    </form>
                                {{-- /form creazione piatto--}}
                            </div>
                        </div>
                    
                    </div>
                </div>
        </div> 
        {{-- /dashboard right (info piatti, statistiche) --}}
    </div>
@endsection


