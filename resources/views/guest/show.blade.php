@extends('layouts.guest')

@section('style')

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
@endsection

@section('pageTitle')
  {{$user->name}}
@endsection

@section('content')
  <div id="app" class="container">
    <h1>{{$user->restaurant_name}}</h1>

    @foreach ($user->plates as $plate)
        <div class="restaurant_plate">
          <p>{{$plate->name}}</p>
          <button class="btn btn-success">aggiungi al carrello</button>
        </div>
        <p>{{$plate->price}} &euro;</p>
    @endforeach
  </div>


  <div class="shopping_cart">
    ciao
  </div>
@endsection

@section('script')
  <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
  <script src="{{ asset('js/guest_cart.js')}}"></script>
@endsection