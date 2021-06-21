@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')
  {{$user->restaurant_name}} | Menu
@endsection

@section('content')
  <div id="cart" class="">
    @if (count($user->plates) > 0)
        
    <div class="menu">
      <h1 class="">{{$user->restaurant_name}}</h1>
      <div class="wrapper_plate">

      @foreach ($user->plates as $plate)
        {{-- piatto singolo e info--}}
        <div class="restaurant_plate">
          <div class="info-plate">
            <h3>{{$plate->name}}</h3>
            {{-- <h4>Ingredienti: </h4> --}}
            <p>{{ $plate->ingredients }}</p>
            <h4>{{$plate->price}} &euro;</h4>
            <span>Aggiungi al carrello</span>
              
            <button v-on:click="removePrevCart({{ json_encode($plate->name) }}, {{ json_encode($plate->price) }}, {{ json_encode($plate->user_id) }}); totalPrice({{ json_encode($plate->price) }})" class="btn btn-success"><i class="fas fa-plus"></i></button>
            <p>Costo: {{$plate->price}} &euro;</p>
          </div>
          <div class="img-plate">
            <img src="{{ $plate->image }}" alt="">
          </div>
        </div>
      @endforeach
    </div>
    </div>
    @else
    <h1>Non ci sono piatti per questo Ristorante!</h1>
    @endif

    @if (count($user->plates) > 0)
    <div class="shopping_cart">
      
      <h3 class="text-right">Carrello</h3>
      <hr>
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

      <div class="sum mt-4 mb-4">
        <h3 v-if="namePlates.length != 0" >Totale: @{{sum}} &euro;</h3>
      </div>

      <div class="checkout" v-if="namePlates.length != 0" class="submit mt-3">
        <button v-if class="btn"><a href="{{ route('guest.checkout' , $user->id)}}">Completa l'ordine</a></button>
      </div>
    
    </div>
    @endif
    
  </div>

 @include('partials.footer')

@endsection


@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest_cart.js')}}"></script>
@endsection

