@extends('layouts.main')

@section('pageTitle')
    Plates
@endsection


@section('content')  

    
    <a href="{{route('admin.plates.create')}}"><button type="button" class="btn btn-success"> Aggiungi Piatto</button></a>

    @foreach ($plates as $plate)
        <h3>{{$plate->name}}</h3>
        <button>Modifica piatto</button>
        <a href=""><button>Vai al piatto</button></a>
    @endforeach

    {{-- @dd($plates); --}}

@endsection

