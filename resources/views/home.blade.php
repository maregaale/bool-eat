@extends('layouts.app')

@section('content')
    <div class="container d-flex">
        <aside class="dashboard_left">
            {{-- dahsboard left (modifica dati vari, visualizza) --}}
            <div class="container_aside">
                <div class="box_info">
                    {{-- logo --}}
                    {{-- <img src="{{ Auth::user()->logo }}" alt=""> --}}
                    <img src="https://img.pixers.pics/pho_wat(s3:700/FO/25/09/75/16/700_FO25097516_638a15bb28cd857f65c21d3eb26a2227.jpg,700,699,cms:2018/10/5bd1b6b8d04b8_220x50-watermark.png,over,481,650,jpg)/carte-da-parati-icona-chef-del-ristorante.jpg.jpg" alt="">
                    {{-- Restaurant name --}}
                    <h2 class="mt-5 font-weight-bold">{{ Auth::user()->restaurant_name }}</h2>
                </div>
                
                {{-- modifiche varie --}}
                <div class="dashbord_left_info">
                    <a href="{{ route('admin.plates.index') }}"><i class="fas fa-edit"></i> Modifica i tuoi dati</a>
                    <a class="" href="{{ route('admin.plates.index') }}"><i class="fas fa-eye"></i> Visualizza Menù</a>
                    <a href="{{route('admin.plates.create')}}"><i class="fas fa-plus-circle"></i> Aggiungi Piatto</a>
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
            <h2 class="font-weight-bold">Ultimi piatti</h2>
            {{-- stampiamo i piatti in dashboard --}}
            <div class="dashboard_right-card">
                    @foreach ($plates as $plate)
                    <div class="box">
                        <img src="{{$plate->image}}" alt="">
                        <h3 class="mt-2">{{$plate->name}}</h3>
                    </div>
                @endforeach 
            </div>

            {{-- visual statistiche  --}}
            <div class="stats_container">
                <h2 class="font-weight-bold mt-3">Statistiche ordini</h2>
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
                      <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                </div>
            </div>
        </div> 
    </div>
@endsection
