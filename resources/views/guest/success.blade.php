@extends('layouts.guest')

@section('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">  
@endsection

@section('pageTitle')

 Booleat | Success!
    
@endsection



@section('content')


<section class="  py-md-0 back-checkout">
    <div class="back-checkout-container">
        <div class=" container d-flex flex-column align-items-center mb-5 ">
            <div class="card register-card   mb-5 ">
                <div class="row  no-gutters ">
                    <div class="card-body d-flex flex-column align-items-center">
    
    
                        <div>
                            <a class="homebutton anchor-link" href="{{ url('/') }}">Torna alla home</a>
    
    
                            <h2 class="mt-1 mb-4 font-weight-bold">Il tuo ordine è stato effettuato correttamente!!</h2>
    
                            {{-- <p class="login-card-description">Inserisci ora i tuoi dati per completare l'ordine</p> --}}
                            <p class="col-form-label ">Un fattorino ha preso i dati del tuo ordine è sta arrivando da te!</p>

        
        
                            
    
                        </div>
    
                        <img class="image-fluid" src="{{asset('images/order-success.jpg')}}" alt="">
    
                    </div>
                </div>
            </div>
    
    
        </div>

    </div>



</section>

    
@endsection


@section('script')

<script src="{{ asset('js/success.js')}}"></script>

    
@endsection