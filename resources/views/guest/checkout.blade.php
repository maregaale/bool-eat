@extends('layouts.guest')


@section('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')

Booleat | Completa l'Ordine
    
@endsection


@section('content')
<div class="container text-center">

 <form id="pay_form" method="POST" enctype="multipart/form-data"> 
    @csrf
    @method('POST')
    <div >
        <label for="name">Nome</label>
        <input type="text"  id="name" name="name"  placeholder="Inserisci il nome" required>
    </div>
    <div >
        <label for="lastname">Cognome</label>
        <input type="text" id="lastname" name="lastname"  placeholder="Inserisci il cognome" required>
    </div>
    <div >
        <label for="email">Email</label>
        <input type="email"  name="email" id="email" placeholder="Inserisci l'email" required>
    </div>
    <div >
        <label for="address">Inserisci l'indirizzo</label>
        <input type="text"  id="address" name="address" placeholder="Indirizzo">
    </div>
    <div>

        <label  for="phone_number">Inserisci il numero di telefono</label>
        <input  type="tel" id="phone_number" name="phone_number">  

    </div>

    <button class="btn-success" type="submit" >Completa l' Ordine</button>

    
 </form>
</div>
    
@endsection


@section('script')

@endsection