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
         {{-- Select Genres --}}
        <select v-model="search" v-on:change="filterGenre">
            <option value="">All</option>
            @foreach ($genres as $genre)
                
                <option  v-bind:value="{{ $genre->id }}">
                    {{ $genre->name }}
                </option>
                
            @endforeach
        </select>
        {{-- /Select Genres --}}
     <div v-if="search != '' ">
        <ul>
            <li v-for="restaurant in restaurants">
                @{{ restaurant.restaurant_name }}
            </li>
        </ul> 
    </div>

    <div v-else>
        <ul>
          @foreach ($users as $user)
           <li>{{ $user->restaurant_name }}</li>
              
          @endforeach
        </ul> 
    </div>

    <div>

    </div>
    </div>
     
</div>


    
@endsection


@section('script')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/guest-index.js')}}"></script>
    
@endsection