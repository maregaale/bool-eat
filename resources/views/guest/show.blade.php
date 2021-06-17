@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')
  {{$user->name}}
@endsection

@section('content')
  <div id="cart" class="container">
    <div class="menu">
      <h1>{{$user->restaurant_name}}</h1>

      @foreach ($user->plates as $plate)
          <div class="restaurant_plate">
            <p>{{$plate->name}}</p>
            <button v-on:click="addElementsToCart({{ json_encode($plate->name) }}, {{ json_encode($plate->price) }})" class="btn btn-success">aggiungi al carrello</button>
          </div>
          <p>{{$plate->price}} &euro;</p>
      @endforeach
    </div>
    <div class="shopping_cart">
      <h2>Il tuo carrello</h2>
      
      <p v-for="namePlate in namePlates">@{{namePlate}}</p>
      <p v-for="price in prices">@{{price}} &euro;</p>
    </div>
  </div>


@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest_cart.js')}}"></script>
@endsection