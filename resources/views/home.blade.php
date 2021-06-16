@extends('layouts.app')

@section('pageTitle')
    Dashboard
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
                    <a href="{{route('home')}}"><span class="mr-2"><i class="fas fa-edit"></i></span> Dashboard</a>
                    {{-- <a href="{{ route('admin.plates.index') }}"><span class="mr-2"><i class="fas fa-edit"></i></span> Modifica i tuoi dati</a> --}}
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

        {{-- dashboard right (info piatti, statistiche) --}}
        

        <div class="dashboard_right">

            <h3 class="font-weight-bold">Ultimi piatti</h3>
            {{-- stampiamo i piatti in dashboard --}}
            <div v-dragscroll.x class="dashboard_right-card">

                    @foreach ($plates as $plate)
                    <div  class="box_plate">
                        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}">
                            <div class="box_plate-img"><img src="{{$plate->image}}" alt=""></div>
                            <p class="mt-2">{{$plate->name}}</p>
                        </a>
                    </div>
                @endforeach 
            </div>

            {{-- visual statistiche  --}}
            <div class="stats_container">
                <h3 class="font-weight-bold mt-3">Statistiche ordini | Andamento vendite</h3>
                <div class="stats mt-3">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                </div>
            </div>
        </div> 
    
       
    
    </div>
@endsection
