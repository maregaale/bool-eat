@extends('layouts.guest')

@section('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">  
@endsection

@section('pageTitle')

 Booleat | Success!
    
@endsection


@section('content')

<section id="success">
    <div class="box_success">
     <h1>Il tuo ordine è stato effettuato correttamente!!</h1>
     <img src="{{ asset('images/delivery.jpg')}}" alt="delivery">
     <p>Un fattorino ha preso i dati del tuo ordine è sta arrivando da te!</p>
    </div>

</section>
    
@endsection


@section('script')

<script src="{{ asset('js/success.js')}}"></script>

    
@endsection