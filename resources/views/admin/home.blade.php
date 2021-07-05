@extends('layouts.app')

@section('page_title')
    Booleat | La Tua Dashboard
@endsection

@section('content')
    {{-- <div class="main_logo ">
        <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
    </div> --}}
    <div class="dashboard_container">
        
        @include('partials.aside_left')
        

        {{-- dashboard right (info piatti, statistiche) --}}
        <div id="app">
            <div  v-dragscroll.y  class="dashboard_right">
                
                {{-- sezione piatti --}}
                <section class="container-fluid dashboard_right-section">

                    {{-- titolo  --}}
                    <div class="mt-4 mb-0 box-padding">
                        <h4 class="text-uppercase">Ultimi piatti</h4>
                            <p>Accedi subito agli ultimi piatti aggiunti</p>   
                    </div>  
    
                    <div v-dragscroll.x class="dashboard_right-card grid-margin row">
        
                            @foreach ($plates as $plate)
                            <div class="box-padding dashboard_right-card-plate ">
                                <div class="box-padding dashboard_right-card-plate-box">
                                    <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}">
                                        <div class="dashboard_right-card-plate-box-card" style="">
                                            <img src="{{ asset('storage/' . $plate->image )}}" alt="{{$plate->name}}" style="">
                                            
                                        </div>
                                    </a>
                                    <div class="dashboard_right-card-plate-box-card-text">
                                        <h5 class="text-truncate">
                                          {{$plate->name}}
                                        </h5>
                                      </div>
                                </div>
                            </div>
                        @endforeach 
                    </div>
    

                </section>

                <section class="container-fluid">
                    <div class="mt-2 mb-0 box-padding">
                        <h4 class="text-uppercase">Info generali ristorante</h4>
                            {{-- <p >Accedi subito agli ultimi piatti aggiunti</p>    --}}
                    </div>  

                    <div class="col-12 charts_container-row-boxinfo box-padding">
                        <div class="col-12 charts_container-row-boxinfo-cont box-padding">

                            <div class="charts_container-row-box-cont-chart">
                                <div class="inline-flex"><h3>Indirizzo</h3></div>                               
                                <h5 class="mr-2">{{$user->address}}</h5>
                            </div>

                            <div class="charts_container-row-box-cont-chart">
                                <div class="inline-flex"><h3>Partita IVA</h3></div>                               
                                <h5 class="mr-2">{{$user->vat_number}}</h5>
                            </div>

                            <div class="charts_container-row-box-cont-chart">
                                <div class="inline-flex"><h3>Telefono</h3></div>                               
                                <h5 class="mr-2">{{$user->phone_number}}</h5>
                            </div>

                            <div class="charts_container-row-box-cont-chart">
                                <div class="inline-flex"><h3>E-mail</h3></div>                               
                                <h5 class="mr-2">{{$user->email}}</h5>
                            </div>
                        </div>
                        
                    </div>

                    <a href="{{ url('/') }}" >
                        <button class="col-xl-12 col-sm-12 col-12 container box-padding btn" href="{{ url('/') }}">       
                            {{-- contenitore box --}}
                            <div class="col-12 stats_container-row-box-cont box-padding " >
                                {{-- testi --}}
                                <div class=" text-left">
                                    <h3>Vai a Booleat</h3>
                                </div>
                                <img style="width:50px;" src="{{asset('images/bool_eat.png')}}" alt="">
                            </div>
                            </button>
                    </a>
                </section>
            </div> 

            <script src="https://unpkg.com/vue@next"></script>
                <script src="https://unpkg.com/vue-dragscroll"></script>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>               
                    const App = {
                    data() {
                    }
                    }
                
                    const app = Vue.createApp(App);
                    app.directive('dragscroll', VueDragscroll);
                    app.mount('#app')

                </script>
        </div>
    </div>
@endsection
