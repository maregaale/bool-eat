@extends('layouts.guest')


@section('style')
<script src="https://js.braintreegateway.com/web/dropin/1.30.1/js/dropin.min.js"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
@endsection

@section('pageTitle')

Booleat | Completa l'Ordine
    
@endsection

@section('content')
<div class="container text-center">
   

  <form id="payment-form" action="/route/on/your/server" method="post"> 
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

    {{-- <button class="btn-success" type="submit" >Completa l' Ordine</button> --}}

     <!-- Step one: add an empty container to your page -->
    <div id="dropin-container"></div>
    <input type="submit" />
    <input type="hidden" id="nonce" name="payment_method_nonce"/>
 </form>
</div>
    
@endsection


@section('script')
<script type="text/javascript">
    const form = document.getElementById('payment-form');
    // call `braintree.dropin.create` code here
    // Step two: create a dropin instance using that container (or a string
    //   that functions as a query selector such as `#dropin-container`)
    braintree.dropin.create({
        // Step three: get client token from your server, such as via
        //    templates or async http request
        authorization: sandbox_4xdmykmg_6fgmgkg9h9rz85kp,
        container: document.getElementById('dropin-container'),
        // ...plus remaining configuration
    }, (error, dropinInstance) => {
        // Use `dropinInstance` here
        if (error) console.error(error);

        form.addEventListener('submit', event => {
            event.preventDefault();

            dropinInstance.requestPaymentMethod((error, payload) => {
                if (error) console.error(error);
                // Step four: when the user is ready to complete their
                //   transaction, use the dropinInstance to get a payment
                //   method nonce for the user's selected payment method, then add
                //   it a the hidden field before submitting the complete form to
                //   a server-side integration
                document.getElementById('nonce').value = payload.nonce;
                form.submit();
            });
        });
        // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
    });
</script>
@endsection