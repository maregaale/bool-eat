@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')

Booleat
    
@endsection


@section('content')
<div id="app">
    <h1 class="text-center">Benvenuto su Booleat</h1>
     <div class="container text-center">
  
        <input  type="text" placeholder="cerca categorie" value="" v-model="search">
        <button class="btn btn-success" type="button" name="button" v-on:click="filterGenre">Search</button>
    </div>

        <nav class="nav_btn">
           <div v-for="genre in genres">
            <button class="btn_genre" v-on:click="filterGenreButtons(genre.name)">@{{ genre.name }}</button>
           </div>
        </nav>

     <div v-if="restaurants.length > 0" class="results">
        <h2  class="text-center">I risultati della tua ricerca</h2>
        <i class="fas fa-arrow-alt-circle-down"></i>
     </div>

     <div v-if="restaurants.length == 0" class="results">
        <h2  class="text-center">Cerca per categoria di ristorante </h2>
        <i class="fas fa-arrow-circle-up"></i>
     </div>
        
        <div class="container_card" >
            <div class="card_restaurant" v-for="restaurant in restaurants">
                 
                <h3>Ristorante: @{{ restaurant.restaurant_name }}</h3>
                <h4>Indirizzo: @{{ restaurant.address }}</ </h4>
                <p>Telefono: @{{ restaurant.phone_number }}</p>

            </div>
            
            
           
           </div>
                
                
          
       
       
     
    
</div>   


    
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/guest-index.js')}}"></script>
    
@endsection