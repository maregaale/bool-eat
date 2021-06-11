@extends('layouts.main')

@section('pageTitle')
    Plates
@endsection


@section('content')  

    <a href="{{route('admin.plates.create')}}"><button type="button" class="btn btn-success"> Aggiungi Piatto</button></a>

    @foreach ($plates as $plate)
        <h3>{{$plate->name}}</h3>
    <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">

        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><button>Modifica piatto</button></a>
        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><button>Vai al piatto</button></a>
        <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger ml-4">Elimina piatto</button>
          </form>   
    @endforeach

    {{-- toast success --}}
  @if (session('update'))
  <div class="alert alert-success">
      {{ session('update') }}
  </div>
  @endif

  {{-- toast delete --}}
  @if (session('delete'))
  <div class="alert alert-success">
      {{ session('delete') }}
  </div>
  @endif

@endsection

