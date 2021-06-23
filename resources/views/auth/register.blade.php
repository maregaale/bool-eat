@extends('layouts.app')

@section('page_title')
    Booleat | Registrazione
@endsection

@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container ">
      <div class="card register-card ">
        <div class="row no-gutters ">
          <div class="col-md-5">
            <img src="{{asset('images/delivery.jpg')}}" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              {{-- <div class="brand-wrapper">
                <img src="{{asset('images/bool_eat.png')}}" alt="logo" class="logo">
              </div> --}}

                <div class="d-flex justify-content-start ">
                    
                        <button type="submit" class="form-group mb-1 btn">
                            <a class="homebutton" href="{{ url('/') }}">Torna alla home</a>
                        </button>
    
                    
                </div>



              <p class="login-card-description">Registrati</p>
              <form method="POST" action="{{ route('register') }}" >
                @csrf

                {{-- NOME --}}
                    <div class="form-group">

                        <label for="email" class="col-form-label text-md-right">{{ __('Nome') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Inserisci il tuo nome">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                {{-- COGNOME --}}
                <div class="form-group mb-1">

                    {{-- new --}}
                    <label for="lastname" class="col-form-label text-md-right">{{ __('Cognome') }}</label>
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Inserisci il tuo cognome">
                    @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- RISTO NOME --}}

                <div class="form-group mb-1">                  
                   

                    {{-- new --}}

                    <label for="restaurant_name" class="col-form-label text-md-right">{{ __('Nome del tuo ristorante') }}</label>
                    <input id="restaurant_name" type="text" class="form-control @error('restaurant_name') is-invalid @enderror" name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" autofocus placeholder="Nome del ristorante">
                    @error('restaurant_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- INDIRIZZO --}}

                <div class="form-group mb-1">                  

                    {{-- new --}}

                    <label for="address" class="col-form-label text-md-right">{{ __('Indirizzo') }}</label>
                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Indirizzo del ristorante">
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- CELL --}}

                <div class="form-group mb-1">                  

                    {{-- new --}}

                    <label for="phone_number" class="col-form-label text-md-right">{{ __('Recapito Telefonico') }}</label>
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus placeholder="Recapito telefonico">

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- CITTA --}}

                <div class="form-group mb-1">                  

                    {{-- new --}}

                    <label for="city" class="col-form-label text-md-right">{{ __('Città') }}</label>
                    <select id="city" type="select" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="Città">
                        <option selected value="">Scegli...</option>
                        <option value="Milano">Milano</option>
                    </select>


                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- VAT N --}}

                <div class="form-group mb-1">                  

                    {{-- new --}}

                    <label for="vat_number" class="col-form-label text-md-right">{{ __('Partita Iva') }}</label>
                    <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus placeholder="Partita IVA">

                    @error('vat_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <p class="login-card-description">Seleziona il tipo di cucina del ristorante</p>

                {{-- GENERI RIST --}}

                <div class="form-group mb-4">  

                    {{-- new --}}
                    
                    @foreach ($genres as $genre)
                    
                    <div class="form-check mb-1">
                        {{-- <img src="{{ $genre->logo }}" alt="" style="width: 100px"> --}}
                      <input class="form-check-input" type="checkbox" value="{{$genre->id}}" id="{{$genre->name}}" name="genres[]">
                      <label class="form-check-label" for="{{$genre->name}}">
                        {{$genre->name}}
                      </label>
                      {{-- check checkbox --}}
                        <span class="form-check-sign">
                          <span class="check"></span>
                        </span>
                      {{-- /check checkbox --}}
                    </div>
                    @endforeach          

                </div>

                {{-- EMAIL --}}

                <div class="form-group mb-1">                  

                    {{-- new --}}

                    <label for="name" class="col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="emailristorante@booleat.com">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- PASSWORD --}}

                <div class="form-group mb-1">       
                               
                    {{-- new --}}

                    <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Inserisci la password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                {{-- PASSWORD CONFIRM--}}

                    {{-- new --}}

                    <label for="password-confirm" class="col-form-label text-md-right">{{ __('Conferma Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Conferma la password">

                </div>
               


                <input name="login" id="register" class="form-group mb-1 btn btn-block login-btn mb-4" type="submit" value="{{ __('Registrati') }}">
                
                
                  {{-- <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrati') }}
                        </button>
                    </div>
                </div> --}}


                </form>

                {{-- <p class="login-card-footer-text">Non hai un account? <a href="{{ route('register') }}" class="text-reset">Registrati qui</a></p> --}}
                {{-- <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection