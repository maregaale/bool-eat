@extends('layouts.main')

@section('PageTitle')
    {{$plate->name}}
@endsection

@section('content')
    <h2>{{$plate->name}}</h2>
    <img src="{{$plate->image ? asset('storage/' . $plate->image) : 'https://via.placeholder.com/200'}}" alt="{{$plate->title}}" style="width: 200px">
@endsection

