@extends('layouts.guest')

@section('style')
  <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')
  Booleat | Home
@endsection

@section('content')

  @include('partials.header')
   
  <!-- Jumbotron -->
  <div class="mb-3 jumbotron_wrapper">
    <div class="text-center height-text-jumbotron">
      <div class="d-flex justify-content-center align-items-center "> 
        {{-- jumbotron_content --}}
        <div class="jumbotron_content text-white">
             <img src="" alt="">
            <h1 class="mb-3">Benvenuto su Booleat</h1>
            <div class="title">
              {{-- <h1>Benvenuto<br/>su Booleat</h1> --}}
             </div>
            <h2 class="mb-3">Affidati al top del top, scopri i nostri ristoranti!</h2>
        </div>
      </div>
    </div>
  </div>

  <!-- Jumbotron search -->
  <div id="app">  
    <div class="text-center jumbotron_bottom">
      <div class="d-flex justify-content-center align-items-center ">
        <div class="text-white mt-3">
            <h2 class="mb-4">Cerca e ordina!</h2>
            {{-- Search names --}}
            <input  type="text" placeholder="Nome ristorante" value="" v-model="restaurantName">
            <button type="button" name="button" v-on:click="searchName">Search</button>
            {{-- Search names --}}
        </div>
      </div>
    </div>

    <div class="wrapper_genres">
      {{-- <h2>...puoi sempre cercare per genere. Facile no?</h2> --}}
      <div id="navbarNav" class="navbar_genres">
        <div class="navbar_genres">
          <div class="active genres_content" v-for="genre in genres">
            <a class="btn-genres"  v-on:click="filterGenreButtons(genre.name)" href="javascript:;"><img v-bind:src="genre.logo" alt="">@{{ genre.name }}<span class="sr-only">(current)</span></a>
          </div>
        </div>
      </div>
    </div>
  
    <div class="container_card">
      <div class="card_restaurant" v-for="user in users">
          <img v-bind:src="user.logo" alt="">
          <h4>@{{user.restaurant_name}}</h4>
        <div class="overlay">
          <p class="text card_address mt-2">@{{user.address}}</p>
          <button class="btn_menu_overlay button_card_menu"><a :href="'http://localhost:8000/show/'+ user.id">Visualizza menù</a></button>
        </div>
      </div>
    {{-- /card Ricerca Nome --}}

    {{-- Card ricerca categorie --}}
      <div class="card_restaurant" v-for="restaurant in restaurants">
        <img v-bind:src="restaurant.logo" alt="">
        <h4>@{{restaurant.restaurant_name}}</h4>
      <div class="overlay">
        <p class="text card_address mt-2">@{{restaurant.address}}</p>
        <button class="btn_menu_overlay button_card_menu"><a :href="'http://localhost:8000/show/'+ restaurant.id">Visualizza menù</a></button>
      </div>
    </div>
    {{-- /Card ricerca categorie --}}
   </div>

  <div class="card_container_2">
    <div class="div text-center">
      {{-- <h1><span>S</span><span>c</span><span>o</span><span>p</span><span>r</span><span>i</span> <span>i</span> <span>n</span><span>o</span><span>s</span><span>t</span><span>r</span><span>i</span> <span>r</span><span>i</span><span>s</span><span>t</span><span>o</span><span>r</span><span>a</span><span>n</span><span>t</span><span>i</span></h1> --}}
      <h2>Scopri i nostri ristoranti!</h2>
    </div>

    <div class="container_card">
      {{-- Tutti i ristoranti --}}
        @foreach ($users as $user)
            <div class="card_restaurant"> 
              <img src="{{$user->logo}}" alt="">
              <h4>{{$user->restaurant_name}}</h4> 
              <div class="overlay">
                <p class="text card_address mt-2">{{$user->address}}</p>
                <button class="btn_menu_overlay button_card_menu"><a v-on:click="message({{ json_encode($user->id) }})" href="{{ route('guest.show' , ['user' => $user->id])}}">Vai al Menù</a></button>
              </div>
          </div>
        @endforeach
      {{-- /Tutti i ristoranti --}}
    </div>
  </div>

    <section id="vegan">
       {{-- <h2>I Consigli per i piatti vegani</h2> --}}
       <div v-for="plate in vegans">
         <h4>@{{ plate.name }}</h4>
       </div>
    </section>
</div>   

@include('partials.footer')

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