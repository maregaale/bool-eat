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
          <div class="info-plate">
            <h2>{{$plate->name}}</h2>
            <h4>Ingredienti: </h4>
            <p>{{ $plate->ingredients }}</p>
            <span>Aggiungi al carrello</span>
              
            <button v-on:click="addElementsToCart({{ json_encode($plate->name) }}, {{ json_encode($plate->price) }}); totalPrice()" class="btn btn-success"><i class="fas fa-plus"></i></button>
            <p>Costo: {{$plate->price}} &euro;</p>
          </div>
          <div class="img-plate">
            <img src="{{ $plate->image }}" alt="">

          </div>
        </div>
          
      @endforeach
    </div>
    <div class="shopping_cart">
      <h2>Il tuo carrello</h2>
      
      <div class="elements_container">
        <div class="name">
          <p v-for="namePlate in namePlates">@{{namePlate}}</p>
        </div>
        <div class="price">
          <p v-for="price in prices">@{{price}} &euro;</p>
        </div>
        <div class="button">
          <button v-on:click="removeCartElement(index); removePrice(index, price)" v-for="(price, index) in prices" v-if="namePlates.length != 0" class="btn btn-danger">Elimina</button>
        </div>        
      </div>

      <div class="sum">
        <h3 v-if="namePlates.length != 0" >Totale: @{{sum}} &euro;</h3>
      </div>

      <div v-if="namePlates.length != 0" class="submit mt-3">
        <button class="btn btn-success">Completa l'ordine</button>
      </div>
    </div>
  </div>


@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest_cart.js')}}"></script>
@endsection