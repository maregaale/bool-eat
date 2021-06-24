@extends('layouts.guest')


@section('style')
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')

Booleat | Completa l'Ordine
    
@endsection


@section('content')
<div class="body_checkout">


    <div class="container text-center">
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

    <form id="pay_form" method="POST" action="{{route('guest.checkout.store')}}"  enctype="multipart/form-data"> 
        @csrf
        @method('POST')
    

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
        
        <div id="dropin-container"></div>
        <input type="submit" class="btn btn-primary mb-2" value="Completa l'ordine">
        <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </form>

        
    </div>
    <img class="icon-rider" src="{{asset('images/uber-for-food.png')}}">  
</div>
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
