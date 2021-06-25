@extends('layouts.app')

@section('page_title')
    Booleat | Il Tuo Menu
@endsection

@section('content')
<div class="wrapper">

  {{-- <div class="main_logo container">
      <img src="{{asset('storage/image/bool_eat.png')}}" alt=""></a>
  </div> --}}

  <div class=" dashboard">

    @include('partials.aside_left')

  </div>

</div>

<div class="dashboard_container">
        
  @include('partials.aside_left')
  

  {{-- dashboard right (menu) --}}
  <div id="appscroll">
      <div  v-dragscroll.y  class="dashboard_right ">
          
          {{-- sezione menu --}}
          <section class="container-fluid">

              {{-- titolo  --}}

              <div class="mt-4 mb-0 box-padding">
                  <h2 class="text-uppercase">Il tuo menu</h2>
                      <p >Qui puoi controllare i tuoi piatti, modificarli o cancellarli.</p>   
              </div>  
             
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



          </section>
          


          <section class="container-fluid">

              {{-- grafico statistiche --}}

              <div class="col-12 ">
                  {{-- contenitore box --}}
                  <div class="col-12  ">

                      {{-- table dekstop --}}
                      <div class="dashboard_right-tabledekstop mb-3 align-items-center">
                                {{-- stampiamo i menu --}}
                        <div id="app" class="dashboard-right box-padding">



                           {{-- DA NASCONDERE --}}


                           {{-- ANTIPASTI --}}


                          
                          <div class="mt-4 mb-0 ">
                            <h4 class="text-uppercase">Antipasti</h4>
                          </div>  

                       

                          <table class="dashboard_right-table table ">
                            <thead>
                              <tr>
                                <th scope="col">Immagine</th>
                                <th scope="col">Piatto</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Portata</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Azioni</th>
                              </tr>
                            </thead>

                            <tbody>
                              {{-- stampa piatti --}}
                              @foreach ($plates as $plate)
                              @if ($plate->scope == 'antipasto' | $plate->scope == 'Antipasto' | $plate->scope == 'antipasti' | $plate->scope == 'Antipasti')


                              <tr>
                                <td class="dashboard_right-table-img"><img src="{{ asset('storage/' . $plate->image )}}" alt="{{$plate->name}}" style=""></td> 

                                <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                <td>{{$plate->price}} €</td>

                                <td class="text-capitalize">{{$plate->scope}}</td>

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
                                    {{-- Bottone che richiama la modale  --}}
                                    <button data-toggle="modal" data-target="#deleteModal" data-value="{{$plate->id}}" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                                  </span>
                                </td>
                              </tr>                    

                              @endif

                            @endforeach

                              {{-- /stampa piatti --}}
                            </tbody>
                          </table>
                          {{-- PRIMI --}}

                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Primi</h4>
                            </div>  
          
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                  <th scope="col">Immagine</th>
                                  <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Portata</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>
                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)
                                @if ($plate->scope == 'primo' | $plate->scope == 'Primo' | $plate->scope == 'primi' | $plate->scope == 'Primi')


                                  <tr>
                                    <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>

                                    <td class="text-capitalize">{{$plate->scope}}</td>

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
                                         {{-- Bottone che richiama la modale  --}}
                                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{$plate->id}}" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                                      </span>
                                    </td>
                                  </tr>                    
                                  @endif

                                @endforeach

                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>                       

                          {{-- SECONDI --}}


                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Secondi</h4>
                            </div>  
            
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                  <th scope="col">Immagine</th>
                                  <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Portata</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>
  
                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)

                                @if ($plate->scope == 'secondo' | $plate->scope == 'Secondo' | $plate->scope == 'secondi' | $plate->scope == 'Secondi')

                                <tr>
                                  <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                  <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                  <td>{{$plate->price}} €</td>

                                  <td class="text-capitalize">{{$plate->scope}}</td>

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

                                @endif

                              @endforeach

                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>
                           {{-- PIZZE --}}


                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Pizze</h4>
                            </div>  
            
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                  <th scope="col">Immagine</th>
                                  <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Portata</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>

                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)

                                @if ($plate->scope == 'pizza' | $plate->scope == 'Pizza' | $plate->scope == 'pizze' | $plate->scope == 'Pizze')

                                <tr>
                                  <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                  <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                  <td>{{$plate->price}} €</td>

                                  <td class="text-capitalize">{{$plate->scope}}</td>

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

                                @endif
                                @endforeach


                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>
                         
                           {{-- DOLCI --}}


                              <div class="mt-4 mb-0 ">
                                <h4 class="text-uppercase">Dolci</h4>
                              </div>  
              
                              <table class="dashboard_right-table table ">
                                <thead>
                                  <tr>
                                    <th scope="col">Immagine</th>
                                    <th scope="col">Piatto</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Portata</th>
                                    <th scope="col">Stato</th>
                                    <th scope="col">Azioni</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  {{-- stampa piatti --}}
                                  @foreach ($plates as $plate)
                                  @if ($plate->scope == 'dolce' | $plate->scope == 'Dolci' | $plate->scope == 'Dolce' | $plate->scope == 'dolci')


                                  <tr>
                                    <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>

                                    <td class="text-capitalize">{{$plate->scope}}</td>

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

                                  @endif
                                @endforeach

                                  {{-- /stampa piatti --}}
                                </tbody>
                              </table>

                         


                          {{-- esempio breve--}}
                          {{-- @if ($plate->scope == 'dolce' | $plate->scope == 'Dolce' | $plate->scope == 'dolci' | $plate->scope == 'Dolci')
                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Pizze</h4>
                            </div> 
                           

                            <table class="dashboard_right-table table ">
                              <tbody>
                                @foreach ($plates as $plate)


                                  <tr>
                                    <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>

                                    <td class="text-capitalize">{{$plate->scope}}</td>

                                    <td>{!!$plate->visible ? '<i class="far fa-check-circle text-success "></i>' : '<i class="far fa-times-circle text-secondary"></>' !!}</td>
                                    <td>
                                      <span>     

                                        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><i class="fas fa-edit text-dark"></i></a>

                                        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><i class="fas fa-eye text-secondary"></i></a>

                                        <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
                                          @method('DELETE')
                                          @csrf
                                          <button type="submit" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>  
                                      </span>
                                    </td>
                                  </tr>                    


                                @endforeach

                              </tbody>
                            </table>


                          @endif       --}}
                        </div>   

                      </div>


                      {{-- table mobile--}}
                      <div class="dashboard_right-tablemobile mb-3 align-items-center">
                        {{-- stampiamo i menu --}}
                        <div id="app" class="dashboard-right box-padding">



                          {{-- DA NASCONDERE --}}


                          {{-- ANTIPASTI --}}


                          
                          <div class="mt-4 mb-0 ">
                            <h4 class="text-uppercase">Antipasti</h4>
                          </div>  

                      

                          <table class="dashboard_right-table table ">
                            <thead>
                              <tr>
                                <th scope="col">Piatto</th>
                                <th scope="col">Prezzo</th>
                                <th scope="col">Stato</th>
                                <th scope="col">Azioni</th>
                              </tr>
                            </thead>

                            <tbody>
                              {{-- stampa piatti --}}
                              @foreach ($plates as $plate)
                              @if ($plate->scope == 'antipasto' | $plate->scope == 'Antipasto' | $plate->scope == 'antipasti' | $plate->scope == 'Antipasti')


                              <tr>

                                <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                <td>{{$plate->price}} €</td>


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
                                     {{-- Bottone che richiama la modale  --}}
                                     <button data-toggle="modal" data-target="#deleteModal-{{$plate->id}}" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                                  </span>
                                </td>
                              </tr>                    

                              @endif

                            @endforeach

                              {{-- /stampa piatti --}}
                            </tbody>
                          </table>

                      
                          {{-- PRIMI --}}

                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Primi</h4>
                            </div>  
          
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                    <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>
                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)
                                @if ($plate->scope == 'primo' | $plate->scope == 'Primo' | $plate->scope == 'primi' | $plate->scope == 'Primi')


                                  <tr>

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>


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
                                  @endif

                                @endforeach

                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>                       

                          {{-- SECONDI --}}


                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Secondi</h4>
                            </div>  
            
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                    <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>

                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)

                                @if ($plate->scope == 'secondo' | $plate->scope == 'Secondo' | $plate->scope == 'secondi' | $plate->scope == 'Secondi')

                                <tr>

                                  <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                  <td>{{$plate->price}} €</td>


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

                                @endif

                              @endforeach

                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>
                          {{-- PIZZE --}}


                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Pizze</h4>
                            </div>  
            
                            <table class="dashboard_right-table table ">
                              <thead>
                                <tr>
                                    <th scope="col">Piatto</th>
                                  <th scope="col">Prezzo</th>
                                  <th scope="col">Stato</th>
                                  <th scope="col">Azioni</th>
                                </tr>
                              </thead>

                              <tbody>
                                {{-- stampa piatti --}}
                                @foreach ($plates as $plate)

                                @if ($plate->scope == 'pizza' | $plate->scope == 'Pizza' | $plate->scope == 'pizze' | $plate->scope == 'Pizze')

                                <tr>

                                  <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                  <td>{{$plate->price}} €</td>


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

                                @endif
                                @endforeach


                                {{-- /stampa piatti --}}
                              </tbody>
                            </table>
                        
                          {{-- DOLCI --}}


                              <div class="mt-4 mb-0 ">
                                <h4 class="text-uppercase">Dolci</h4>
                              </div>  
              
                              <table class="dashboard_right-table table ">
                                <thead>
                                  <tr>
                                    <th scope="col">Piatto</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Stato</th>
                                    <th scope="col">Azioni</th>
                                  </tr>
                                </thead>

                                <tbody>
                                  {{-- stampa piatti --}}
                                  @foreach ($plates as $plate)
                                  @if ($plate->scope == 'dolce' | $plate->scope == 'Dolci' | $plate->scope == 'Dolce' | $plate->scope == 'dolci')


                                  <tr>

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>


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

                                  @endif
                                @endforeach

                                  {{-- /stampa piatti --}}
                                </tbody>
                              </table>

                        


                          {{-- esempio breve--}}
                          {{-- @if ($plate->scope == 'dolce' | $plate->scope == 'Dolce' | $plate->scope == 'dolci' | $plate->scope == 'Dolci')
                            <div class="mt-4 mb-0 ">
                              <h4 class="text-uppercase">Pizze</h4>
                            </div> 
                          

                            <table class="dashboard_right-table table ">
                              <tbody>
                                @foreach ($plates as $plate)


                                  <tr>
                                    <td class="dashboard_right-table-img"><img src="{{$plate->image}}" alt="{{$plate->title}}" style=""></td> 

                                    <td class="dashboard_right-table-name"><p>{{$plate->name}}</p></td>

                                    <td>{{$plate->price}} €</td>

                                    <td class="text-capitalize">{{$plate->scope}}</td>

                                    <td>{!!$plate->visible ? '<i class="far fa-check-circle text-success "></i>' : '<i class="far fa-times-circle text-secondary"></>' !!}</td>
                                    <td>
                                      <span>     

                                        <a href="{{route('admin.plates.edit', ['plate' => $plate->id] )}}"><i class="fas fa-edit text-dark"></i></a>

                                        <a href="{{route('admin.plates.show', ['plate' => $plate->id] )}}"><i class="fas fa-eye text-secondary"></i></a>

                                        <form class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
                                          @method('DELETE')
                                          @csrf
                                          <button type="submit" class="btn_invisible"><i class="fas fa-trash-alt text-danger"></i></button>
                                        </form>  
                                      </span>
                                    </td>
                                  </tr>                    


                                @endforeach

                              </tbody>
                            </table>


                          @endif       --}}
                        </div>   

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
          app.mount('#appscroll')
        </script>

  </div>

 

</div>

 <!-- Modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Elimina piatto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           {{-- Intestazione form  --}}
          <form id="deletePlateForm" class="d-inline-block" action="{{route('admin.plates.destroy', ['plate' => $plate->id] )}}" method="POST"> 
          @method('DELETE')
          @csrf
          <h5>Confermi di voler eliminare questo piatto?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary" name="delete_button">Sì</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
$(document).ready(function (e) {
    $(document).on("click", "#deleteModal", function (e) {
        var delete_id = $(this).attr('data-value');
        $('button[name="delete_button"]').val(delete_id);
    });
});
</script>
@endsection


