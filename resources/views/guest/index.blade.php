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
        {{-- <select v-model="search" v-on:change="filterGenre">
            <option value="">All</option>
            @foreach ($genres as $genre)
                
                <option value="{{ $genre->id }}">
                    {{ $genre->name }}
                </option>
                
            @endforeach
        </select>
        <ul  v-if= "search == '' ">
            <li v-for="restaurant in restaurants">
                @{{ restaurant.restaurant_name }}
            </li>
        </ul> 
    
         <ul v-else>
            @foreach ($users as $user)
                <li>
                    {{ $user->restaurant_name }}
                </li>
            @endforeach
        </ul> --}}
        <input  type="text" placeholder="cerca categorie" value="" v-model="search">
        <button class="btn btn-success" type="button" name="button" v-on:click="filterGenre">Search</button>
         <div class="container" v-for="restaurant in restaurants">
            
             <h3>@{{ restaurant.restaurant_name }}</h3>
            
         </div>

        
           <div v-for="genre in genres">
            <button class="btn-primary" v-on:click="filterGenreButtons(genre.name)">@{{ genre.name }}</button>
           </div>
                
                
          

            {{-- <select class="choose-genre" name="" v-model="selectRestaurant" v-on:change="filterGenre">
                <option value="">All</option>
                <option v-for="genre in genres">@{{ genre.name }}</option>
              </select>

              <div v-for="restaurant in restaurants" v-if="selectRestaurant == restaurant.genres[0].name">
                  <h3>@{{ restaurant.name }}</h3>

              </div> --}}
       
       
     </div>
    
</div>   


    
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/guest-index.js')}}"></script>
    
@endsection