@extends('layouts.app')
@section('pageTitle')
    Menu
@endsection
@section('content')
    <div class="main_logo container">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div>
    <div class="container dashboard_container">
      <aside class="dashboard_left">
        {{-- dahsboard left (modifica dati vari, visualizza) --}}
        <div class="container_aside">
          <div class="box_info">
              {{-- logo --}}
              <img src="{{ Auth::user()->logo }}" alt="">
              {{-- <img src="https://www.freeiconspng.com/thumbs/restaurant-icon-png/restaurant-icon-png-7.png" alt=""> --}}
              {{-- Restaurant name --}}
              <h3 class="mt-5 font-weight-bold">{{ Auth::user()->restaurant_name }}</h3>
          </div>
                
          {{-- modifiche varie --}}
          <div class="dashbord_left_info">
              <a href="{{route('home')}}"><span class="mr-2"><i class="fas fa-home"></i></span> Dashboard</a>
              <a class="" href="{{ route('admin.plates.index') }}"><span class="mr-2"><i class="fas fa-eye"></i></span> Visualizza Menù</a>
              <a href="{{route('admin.plates.create')}}"><span class="mr-2"><i class="fas fa-plus-circle"></i></span> Aggiungi Piatto</a>
          </div>

                {{-- button logout --}}
          <div class="dashbord_left_info logout_btn">
              <button class="btn btn-info" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </button>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                  @csrf
              </form>
          </div>
        </div>
      </aside>

      {{-- dashboard right (menu) --}}
      <div class="dashboard_right">
        <h3 class="font-weight-bold">Menu</h3>
          {{-- toast success --}}
          @if (session('update'))
          <div class="alert alert-success">
              {{ session('update') }}
              <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          {{-- /toast success --}}
        
          {{-- toast delete --}}
          @if (session('delete'))
          <div class="alert alert-success">
              {{ session('delete') }}
              <button type="button" class="ml-2 mb-1 close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
          {{-- /toast delete --}}
        
          {{-- stampiamo i menu --}}
          <div id="app">
            <table class="table align-middle">
              <thead>
                <tr>
                  <th scope="col">Immagine</th>
                  <th scope="col">Nome piatto</th>
                  <th scope="col">Prezzo</th>
                  <th scope="col">Portata</th>
                  <th scope="col">Stato</th>
                  <th scope="col">Azioni</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($plates as $plate)
                  <tr>
                    <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 
                    <td>{{$plate->name}}</td>
                    <td>{{$plate->price}} €</td>
                    <td>{{$plate->scope}}</td>
                    <td>{!!$plate->visible ? '<i class="far fa-check-circle text-success "></i>' : '<i class="far fa-times-circle text-secondary"></>' !!}</td>
                    <td>
                      <span>                     
                        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><i class="fas fa-edit text-dark"></i></a>
                        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><i class="fas fa-eye text-secondary"></i></a>
                        {{-- form della delete --}}
                        <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                        </form>  
                        {{-- /form della delete --}} 
                        {{-- <a href="" v-on:click="showModal = true" data-id="{{$plate->id}}" ><i class="fas fa-trash-alt text-danger"></i></i></a> --}}
                      </span>
                    </td>
                  </tr>                    
                @endforeach
              </tbody>
            </table>
            {{-- nome del ristorante dell'utente --}}
            {{-- <h1>{{ Auth::user()->restaurant_name }}</h1> --}}
          </div>
        </div>
      </div> 
    </div>
@endsection


