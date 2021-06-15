@extends('layouts.main')

@section('pageTitle')
    Plates
@endsection


@section('content') 
    <div id="app">
    {{-- nome del ristorante dell'utente --}}
    <h1>{{ Auth::user()->restaurant_name }}</h1>
    {{-- /nome del ristorante dell'utente --}}
    {{-- bottone aggiunta piatto --}}
    <a href="{{route('admin.plates.create')}}"><button type="button" class="btn btn-secondary"> Aggiungi Piatto</button></a>
    {{-- /bottone aggiunta piatto --}}
    {{-- bottone back to dashboard --}}
    <a href="{{route('home')}}"><button type="button" class="btn btn-success"> Torna alla Dashboard</button></a>
    {{-- /bottone back to dashboard --}}

    {{-- stampa piatti --}}
    @foreach ($plates as $plate)
        <h3>{{$plate->name}}</h3>
        {{-- prova stampa img --}}
       {{-- <img src="{{ $plate->image }}" alt="{{ $plate->name }}" style="width: 100px">  --}}
        {{-- /prova stampa img --}}
        <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">

        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><button>Modifica piatto</button></a>
        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><button>Vai al piatto</button></a>

        {{-- button che attiva il modale --}}
        <button v-on:click="showModal = true" data-id="{{$plate->id}}" class="btn btn-danger ml-4">Elimina piatto</button>  
        {{-- /button che attiva il modale --}}

        {{-- form della delete --}}
        {{-- <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-4">Elimina piatto</button>
        </form>   --}}
        {{-- /form della delete --}}
    @endforeach
    {{-- /stampa piatti --}}

    {{-- toast success --}}
    @if (session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
    @endif
    {{-- /toast success --}}

    {{-- toast delete --}}
    @if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
    @endif
    {{-- /toast delete --}}

    {{-- modale cancellazione piatto --}}
    <div v-if="showModal" class="our_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog .modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <p>Confermi di voler eliminare il piatto?</p>
            </div>
            <div class="modal-footer">
                {{-- form della delete --}}
                <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4">Sì</button>
                </form>  
                {{-- /form della delete --}} 
              <button type="button" class="btn btn-secondary" v-on:click="showModal = false">No</button>
            </div>
          </div>
        </div>
      </div>
    {{-- /modale cancellazione piatto --}}
    </div>

    
    {{-- script Vue e js --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="{{asset('js/modal_delete.js')}}"></script>
    {{-- /script Vue e js --}}
@endsection

