@extends('layouts.guest')


@section('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')

Booleat | Completa l'Ordine
    
@endsection


@section('content')

<section class="  py-md-0 back-checkout">
    <div class="back-checkout-container">
        <div class=" container d-flex flex-column align-items-center mb-5 ">
            <div class="card register-card   mb-5 ">
                <div class="row  no-gutters ">
                    <div class="card-body d-flex flex-column align-items-center">
                                {{-- errori --}}
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                {{-- /errori --}}
    
    
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <div>
                            <a class="homebutton anchor-link" href="{{ url('/') }}">Torna alla home</a>
    
    
                            <h3 class="mt-1 mb-4">Checkout</h3>
    
                            {{-- <p class="login-card-description">Inserisci ora i tuoi dati per completare l'ordine</p> --}}
        
        
                            <form id="pay_form" method="POST" action="{{route('guest.checkout.store')}}"  enctype="multipart/form-data">
                              @csrf
                              @method('POST')
    
        
              
                                    {{-- TOTAL --}}
    
                                    <div class="form-group fullwidth">
              
                                        <label for="total" class="col-form-label text-md-right">Total</label>
        
                                        <input type="text" id="total" name="total" class="form-control" v-model="sum" readonly="readonly" required >
                                        
                                    </div>

                                    {{-- NAME --}}
    
                                    <div class="form-group fullwidth">
                        
              
                                        <label for="name" class="col-form-label text-md-right">Nome</label>
        
                                        <input type="text" id="name" name="name"  placeholder="Inserisci il nome" required class="form-control" >
                                        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    {{-- COGNOME --}}
                                    
                    
                                    <div class="form-group fullwidth">
                        
              
                                        <label for="lastname" class="col-form-label text-md-right">Cognome</label>
        
                                        <input type="text" id="lastname" name="lastname"  placeholder="Inserisci il cognome" required class="form-control" >
                                        
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    {{-- MAIL --}}
                                    
                    
                                    <div class="form-group fullwidth">
                        
              
                                        <label for="email" class="col-form-label text-md-right">Email</label>
        
                                        <input type="email"  name="email" id="email" placeholder="Inserisci l'email" required class="form-control" >
                                        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                   
                                    {{-- ADRESS --}}
                                    
                   
                    
                                    <div class="form-group fullwidth">
                        
              
                                        <label for="address" class="col-form-label text-md-right">Inserisci l'indirizzo</label>
        
                                        <input type="text"  id="address" name="address" placeholder="Indirizzo" required class="form-control" >
                                        
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>         
                                        @enderror
                                    </div>
                                   
                                    {{-- TEL --}}
                   
                   
                    
                                    <div class="form-group fullwidth">
                        
              
                                        <label for="phone_number" class="col-form-label text-md-right">Inserisci il numero di telefono</label>
        
                                        <input  type="tel" id="phone_number" name="phone_number" placeholder="Numero di telefono" required class="form-control" >
                                        
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div id="plates">

                                        <input  v-for="plate in plates" type="hidden" v-bind:value="plate.id" name="plates_id[]">
                                    </div>
                        
                                   

                                    <div id="dropin-container"></div>
                                    <input type="submit" class="btn btn-block login-btn mb-4" value="Completa l'ordine">
                                    <input type="hidden" id="nonce" name="payment_method_nonce"/>

                           
        
                                    {{-- <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="{{ __('Send Password Reset Link') }}"> --}}
        
                            </form>
        
    
                        </div>
    
    
                    </div>
                </div>
            </div>
    
    
        </div>
        <img class="icon-rider" src="{{asset('images/booleatdelivery.png')}}">  

    </div>



</section>
{{-- <div  class="body_checkout">


    <div  class="container text-center">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    
    

        <h3 class="mt-5 mb-4">Inserisci ora i tuoi dati per completare l'ordine</h3>

        <form id="pay_form" method="POST" action="{{route('guest.checkout.store')}}"  enctype="multipart/form-data"> 
            @csrf
            @method('POST')
            <div >
                <label class="style_aligned" for="total">Total</label>
                <input type="text" id="total" name="total" class="input_total" v-model="sum" readonly="readonly" required>
            </div>
            
            <div >
                <label class="style_aligned" for="name">Nome</label>
                <input type="text" id="name" name="name"  placeholder="Inserisci il nome" required>
            </div>
            <div >
                <label class="style_aligned" for="lastname">Cognome</label>
                <input type="text" id="lastname" name="lastname"  placeholder="Inserisci il cognome" required>
            </div>
            <div >
                <label class="style_aligned" for="email">Email</label>
                <input type="email"  name="email" id="email" placeholder="Inserisci l'email" required>
            </div>
            <div >
                <label class="style_aligned" for="address">Inserisci l'indirizzo</label>
                <input type="text"  id="address" name="address" placeholder="Indirizzo">
            </div>
            <div>
                <label class="style_aligned" for="phone_number">Inserisci il numero di telefono</label>
                <input  type="tel" id="phone_number" name="phone_number">  
            </div>

            <div id="plates">

                <input  v-for="plate in plates" type="hidden" v-bind:value="plate.id" name="plates_id[]">
            </div>
        
            <div id="dropin-container"></div>
            <input type="submit" class="btn btn-primary mb-2" value="Completa l'ordine">
            <input type="hidden" id="nonce" name="payment_method_nonce"/>

        
        </form>

        
    </div>
    <img class="icon-rider" src="{{asset('images/uber-for-food.png')}}">  
</div> --}}
@endsection


@section('script')
<script src="{{ asset('js/total.js')}}"></script>


<script src="https://js.braintreegateway.com/js/braintree-2.32.1.min.js"></script>

 <script src="https://js.braintreegateway.com/web/dropin/1.10.0/js/dropin.js"></script>

 
 
 
 <script>
    

var form = document.querySelector('#pay_form');
var token = "{{ $token }}"
braintree.dropin.create({
authorization: token,
selector: '#dropin-container'
}, function (err, instance) {
form.addEventListener('submit',function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
            if (err) {
                console.log('Request Payment Method Error', err);
                return;
            }
            // Add the nonce to the form and submit
            document.querySelector('#nonce').value = payload.nonce;
            form.submit();
        });
    })
});
 
</script> 



@endsection