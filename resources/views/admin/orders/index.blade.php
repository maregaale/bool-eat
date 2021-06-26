@extends('layouts.app')


@section('page_title')
    Booleat | Stats
@endsection

@section('content')


@if (count($orders) > 0 )

<h2>Statistiche</h2>

<div class="plates-ordered">
    <h2>I piatti piu ordinati</h2>
@foreach ($plates as $plate)

<p>{{ $plate->name }}</p>

@endforeach

<h3>Guadagno totale: {{ $earnings }} &euro;</h3>

<h4>Media Guadagni per mese: {{ $mediaTotal }}</h4>
 
<h4>Ordini di Gennaio</h4>
 <ul>
   @foreach ($january as $order)
  
    <li>{{ $order->name }}</li>
    <li>{{ $order->address }}</li>
    <li>{{ $order->total }}</li>
  @endforeach
 </ul>


</div>

@endif

<div class="container chart_container" style="width: 400px">
    <div class="" id="stats">

      <canvas id="myChart" width="400" height="400"></canvas>
    </div>
       
      
    </div>

    
<script>
    var earnings = [];

    var myLabels = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre" ];

    

    // if ({!! json_encode($user->id) !!}) {
      
      for (let i = 0; i < {!! json_encode($user->plates) !!}.length; i++) {

        console.log({!! json_encode($user->plates) !!}[i])
        
      }
    // }

    
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            
            
            labels: myLabels,
            datasets: [{
                label: 'Guadagno: ',
                data: [@if($user->id && count($user->plates) > 0)@foreach($orders as $order) "{{$order->total}}", @endforeach,@endif ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
  </script>

    
@endsection