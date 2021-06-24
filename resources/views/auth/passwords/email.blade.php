@extends('layouts.app')

@section('page_title')
    Booleat | Reset Password
@endsection

@section('content')

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container ">
        <div class="card register-card ">
            <div class="row no-gutters ">
                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="homebutton anchor-link" href="{{ url('/') }}">Torna alla home</a>

                    <p class="login-card-description">{{ __('Reset Password') }}</p>


                    <form method="POST" action="{{ route('password.email') }}" >
                      @csrf


      
                            {{-- REGISTER --}}
                            <div class="form-group fullwidth">
      
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class=" form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Inserisci il tuo nome">
                                
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="{{ __('Send Password Reset Link') }}">

                    </form>
      

                </div>
            </div>
        </div>
    </div>
</main>


@endsection
