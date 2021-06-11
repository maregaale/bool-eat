@extends('layouts.main')

@section('pageTitle')
    Plates
@endsection


@section('content')  
    {{-- bottone aggiunta piatto --}}
    <a href="{{route('admin.plates.create')}}"><button type="button" class="btn btn-success"> Aggiungi Piatto</button></a>
    {{-- /bottone aggiunta piatto --}}

    {{-- stampa piatti --}}
    @foreach ($plates as $plate)
        <h3>{{$plate->name}}</h3>
        
        <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">

        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><button>Modifica piatto</button></a>
        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><button>Vai al piatto</button></a>

        {{-- form della delete --}}
        <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-4">Elimina piatto</button>
        </form>  
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
@endsection

