@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')

Booleat
    
@endsection


@section('content')
   
<div id="app">

      <!-- Jumbotron -->
      <div
      class=" text-center "
      style="      background-color: rgba(0, 0, 0, 0.6);;      height: 300px;">
         
            <div class="d-flex justify-content-center align-items-center ">
               <div class="text-white mt-5">
                  <h1 class="mb-3">Benvenuto su Booleat</h1>
                  <h4 class="mb-3">cerca e ordina!</h4>
                  
                  <input  type="text" placeholder="cerca il ristorante" value="" v-model="restaurantName">
                  <button class="btn btn-outline-light btn-success btn-lg" type="button" name="button" v-on:click="searchName">Search</button>
               </div>
            </div>
         
      </div>
      <!-- Jumbotron -->   
    {{-- <h1 class="text-center"></h1> --}}
     {{-- <div class="container text-center btn-5">  
        <input  type="text" placeholder="cerca categorie" value="" v-model="search">
        <button class="btn btn-success" type="button" name="button" v-on:click="filterGenre">Search</button>
    </div> --}}
    <div class="container_card" >
      <div class="card_restaurant" v-for="user in users">
         <h2>@{{user.restaurant_name}}</h2>
         <p>@{{user.name}}  @{{user.lastname}} </p>

     </div>
   </div>

        <nav class="nav_btn mt-5">
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
                <a :href="'http://localhost:8000/show/'+ restaurant.id">Visualizza menù</a>
            </div>
            
            
           
           </div>
      
                
                
          
       
       
     
    
</div>   


    
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/guest-index.js')}}"></script>
    
@endsection