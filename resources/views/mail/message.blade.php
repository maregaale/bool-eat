@extends('layouts.main')

@section('pageTitle')
Mail
    
@endsection

@section('content')

<h1> Ciao {{ $order->name }} , Abbiamo ricevuto il tuo ordine!!</h1>

<h3>Riepilogo Ordine: </h3>

<ul>
    @foreach ($order->plates as $plate)
        <li>
            {{$plate->name }} prezzo: {{$plate->price }}€
        </li>
    @endforeach
</ul>

<h5>Totale: {{ $order->total}}</h5>


<a class="" href="{{ url('/') }}"> 
    <img src="{{asset('images/bool_eat.png')}}" style="width: 100px" alt="logo">
</a>
    
@endsection



