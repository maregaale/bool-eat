@extends('layouts.main')

@section('PageTitle')
    {{$plate->name}}
@endsection

@section('content')
    <h2>{{$plate->name}}</h2>
    <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">
    <h4>Ingredienti:</h4>
    <p>{{ $plate->ingredients}}</p>
    <h4>Portata: </h4>
    <span>{{ $plate->scope }}</span>
@endsection

