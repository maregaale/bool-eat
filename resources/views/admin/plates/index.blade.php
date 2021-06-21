@extends('layouts.app')

@section('pageTitle')
    Menu
@endsection

@section('content')
<div class="wrapper">

  {{-- <div class="main_logo container">
      <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
  </div> --}}

  <div class=" dashboard">

    @include('partials.aside_left')

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
        <div id="app" class="dashboard-right">
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
              {{-- stampa piatti --}}
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
              {{-- /stampa piatti --}}
            </tbody>
          </table>
        </div>
      </div>
    </div> 
    {{-- /dashboard right (menu) --}}
  </div>

</div>
@endsection


