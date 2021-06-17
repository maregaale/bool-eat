@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')

Booleat
    
@endsection


@section('content')
   
<div id="app">
   <div class="container_card">
   <div class="row">
     <div class="card card-nav-tabs card_restaurant" style="width: 20rem;" >
      @foreach ($users as $user)
          
     
        <div class="card-header card-header-danger">
           
           <h4>{{$user->restaurant_name}}</h4> 
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
          <li class="list-group-item">Indirizzo: {{$user->address}}</li>
          <li class="list-group-item"><a href="{{ route('guest.show' , ['user' => $user->id])}}">Visualizza menù</a></li>
        </ul>
        @endforeach
      </div>
     </div>
   </div>


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

   {{-- <div class="container_card" >
      <div class="card_restaurant" v-for="user in users">
         <h2>@{{user.restaurant_name}}</h2>
         <p>@{{user.name}}  @{{user.lastname}} </p>

     </div>
   </div> --}}
   
 

   {{-- card top --}}
   <div class="container_card">
    <div class="row">
   <div class="card card-nav-tabs card_restaurant" style="width: 20rem;" v-for="user in users" >
      <div class="card-header card-header-danger">
         
         <h4>@{{user.restaurant_name}}</h4> 
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
        <li class="list-group-item">Indirizzo: @{{user.address}}</li>
        <li class="list-group-item"><a :href="'http://localhost:8000/show/'+ user.id">Visualizza menù</a></li>
      </ul>
    </div>
   </div>
 </div>
    {{-- card top --}}
    

        {{-- <nav class="nav_btn mt-5">
           <div v-for="genre in genres">
            <button class="btn_genre" v-on:click="filterGenreButtons(genre.name)">@{{ genre.name }}</button>
           </div>
        </nav> --}}

        <nav class="navbar navbar-expand-lg bg-primary nav_btn">
         <div class="container ">
      
           <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav list-btn">
               <li class="nav-item active" v-for="genre in genres">
                 <a class="nav-link"  v-on:click="filterGenreButtons(genre.name)" href="javascript:;">@{{ genre.name }}<span class="sr-only">(current)</span></a>
               </li>
               
             </ul>
           </div>
         </div>
       </nav>




     <div v-if="restaurants.length > 0" >
        <h2  class="text-center">I risultati della tua ricerca</h2>
        <i class="fas fa-arrow-alt-circle-down"></i>
     </div>

     <div v-if="restaurants.length == 0" class="results">
        <h2  class="text-center">Cerca per categoria di ristorante </h2>
        <i class="fas fa-arrow-circle-up"></i>
     </div>
        



      <div class="container_card">
         <div class="row">
        <div class="card card-nav-tabs card_restaurant" style="width: 20rem;" v-for="restaurant in restaurants" >
           <div class="card-header card-header-danger">
              
              <h4>@{{restaurant.restaurant_name}}</h4> 
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item"><img src="https://qul.imgix.net/6ec903c8-c731-4bd0-aadb-f8c68f23c169/528634_sld.jpg" alt=""></li>
             <li class="list-group-item">Indirizzo: @{{restaurant.address}}</li>
             <li class="list-group-item"><a :href="'http://localhost:8000/show/'+ restaurant.id">Visualizza menù</a></li>
           </ul>
         </div>
        </div>
      </div>
      
                
                
          
       
       
     
    
</div>   


    
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/guest-index.js')}}"></script>

<!--   Core JS Files   -->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
<script src="assets/js/plugins/moment.min.js"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.
    
@endsection