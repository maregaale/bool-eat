@extends('layouts.app')

@section('content')
    <div class="container d-flex">
        <aside class="dashbord_left">
            {{-- dahsboard left (modifica dati vari, visualizza) --}}
            <div class="container_aside">
                <div class="box_info">
                    <img src="" alt="">
                    {{-- Restaurant name --}}
                    <h2 class="mt-5">{{ Auth::user()->restaurant_name }}</h2>
                </div>
                
                {{-- modifiche varie --}}
                <div class="dashbord_left_info">
                    <a href=""><i class="fas fa-edit"></i> Modifica i tuoi dati</a>
                    <a class="" href="{{ route('admin.plates.index') }}"><i class="fas fa-eye"></i> Visualizza Menù</a>
                    <a href="{{route('admin.plates.create')}}"><i class="fas fa-plus-circle"></i> Aggiungi Piatto</a>
                </div>

                {{-- button logout --}}
                <div class="dashbord_left_info logout_btn">
                    <button class="btn btn-secondary" href="{{ route('logout') }}"
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
               
        </div>  
    </div>
@endsection
