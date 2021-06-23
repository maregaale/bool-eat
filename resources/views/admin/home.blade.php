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
                <section class="container-fluid">

                    {{-- titolo  --}}

                    <div class="mt-4 mb-0 box-padding">
                        <h4 class="text-uppercase">Ultimi piatti</h4>
                            <p >Accedi subito agli ultimi piatti aggiunti</p>   
                    </div>  
                   
    
                    <div v-dragscroll.x class="dashboard_right-card grid-margin row">
        
                            @foreach ($plates as $plate)
                            <div class="box-padding dashboard_right-card-plate ">
                                <div class="box-padding dashboard_right-card-plate-box">
                                    <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}">
                                        <div class="dashboard_right-card-plate-box-card" style="">
                                            <img
                                              src="{{$plate->image}}"
                                              class=""
                                              alt="..."
                                              style=""
                                            />
                                            
                                        </div>
                                    </a>
                                    <div class="dashboard_right-card-plate-box-card-text">
                                        <h5 class="text-truncate">
                                          {{$plate->name}}
                                        </h5>
                                      </div>
        
                                </div>
        
    
                            </div>
                            
                            {{-- <div  class="box_plate">
                                <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}">
                                    <div class="box_plate-img"><img src="{{$plate->image}}" alt=""></div>
                                    <p class="mt-2">{{$plate->name}}</p>
                                </a>
                            </div> --}}
                        @endforeach 
                    </div>
    

                </section>
                
    
                {{-- visual statistiche  --}}
                <section class="container-fluid stats_container grey-bg">
    
                    <div class="stats_container-row grid-margin">
    
                        {{-- box stats --}}
                        <div class="col-xl-4 col-sm-12 col-12 stats_container-row-box box-padding">
                            {{-- contenitore box --}}
                            <div class="col-12 stats_container-row-box-cont box-padding">

                             {{-- testi --}}
                            <div class=" text-left">
                                
                                <div class=" text-left">
                                    <h3>34</h3>
                                    <span><h5>Ordini totali</h5></span>
                                 </div>
                             </div>
                             {{-- icona box --}}
                             <div class="align-self-center stats_container-row-box-icon ">
                                <i class="fas fa-file-signature fa-4x"></i>
                             </div>
 
                            </div>
                            
                        </div>
                        {{-- box stats --}}
                        <div class="col-xl-4 col-sm-12 col-12 stats_container-row-box box-padding">
                            {{-- contenitore box --}}
                            <div class="col-12 stats_container-row-box-cont box-padding">

                             {{-- testi --}}
                            <div class=" text-left">
                                
                                <h3>78</h3>
                               <span><h5>Visualizzazioni </h5></span>
                             </div>
                             {{-- icona box --}}
                             <div class="align-self-center stats_container-row-box-icon ">
                                <i class="fas fa-info fa-4x"></i>
                             </div>
 
                            </div>
                            
                        </div>

                        {{-- box stats --}}
                        <div class="col-xl-4 col-sm-12 col-12 stats_container-row-box box-padding">
                            {{-- contenitore box --}}
                            <div class="col-12 stats_container-row-box-cont box-padding">

                             {{-- testi --}}
                            <div class=" text-left">
                                
                                <div class="inline-flex"><h3>356</h3><h3>€</h3></div>
                                <span><h5>Incasso totale</h5></span>
                             </div>
                             {{-- icona box --}}
                             <div class="align-self-center stats_container-row-box-icon ">
                                 <i class="fas fa-wallet  fa-4x"></i>
                             </div>
 
                            </div>
                            
                        </div>

                    </div>
    
                </section>

                <section class="container-fluid">

                    {{-- titolo  --}}
                
                    <div class="mt-3 mb-1 title-padding">
                        <h4 class="text-uppercase">Grafico statistiche</h4>
                            <p >Controlla nello specifico quanti ordini hai ricevuto in un determinato lasso di tempo</p>   
                    </div>


                    {{-- grafico statistiche --}}

                    <div class="col-12 charts_container-row-box box-padding">
                        {{-- contenitore box --}}
                        <div class="col-12 charts_container-row-box-cont box-padding">

                            <div class="charts_container-row-box-cont-top mb-3 align-items-center">
                                        
                                <h5 class="mr-2">Seleziona il range di date da</h5>
                                
                                {{-- <div class="align-self-center charts_container-row-box-icon ">
                                    <i class="fas fa-chart-area fa-2x"></i>
                                    
                                </div> --}}
                                
                                {{-- <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                                    <input placeholder="Select date" type="text" id="example" class="form-control">
                                    <label for="example">Try me...</label>
                                    <i class="fas fa-calendar input-prefix" tabindex=0></i>
                                  </div> --}}
                                  {{-- <div class ="form-group">  
                                    <div class = 'input-group date' id='datetimepicker3'>  
                                       <input type = 'text' class="form-control" />  
                                       <span class = "input-group-addon">  
                                       <span class = "glyphicon glyphicon-time"></span>  
                                       </span>  
                                    </div>  
                                 </div>   --}}
                                 <div id = "sandbox-container" class = "">
                                     
                                    <div class="input-daterange input-group align-items-center" id="datepicker">
                                        <input type="date" id="" class="field date-field dob-field input-sm form-control" min="1900-01-01" max="2015-09-18" name="start" >
                                        <h5 class="ml-2 mr-2">a</h5>
                                        <input type="date" id="" class="field date-field dob-field input-sm form-control" min="1900-01-01" max="2015-09-18" name="end">
                                    </div>
    

                                 </div>
    

                            </div>
                            {{-- box chart--}}
                            <div class="charts_container-row-box-cont-chart">
                                {{-- sezione top --}}
                                
                            </div>

                            


                        </div>
                        
                    </div>


                </section>
                
            </div> 
    

            <script src="https://unpkg.com/vue@next"></script>
            <script src="https://unpkg.com/vue-dragscroll"></script>
            <script>
                
    
                const App = {
                  data() {
                  }
                }
            
                const app = Vue.createApp(App);
                app.directive('dragscroll', VueDragscroll);
                app.mount('#app')
              </script>

              <script>
                  $('#sandbox-container .input-daterange').datepicker({
                    format: "dd/mm/yyyy",
                    language: "it",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
              </script>
        </div>
    
       
    
    </div>
@endsection
