@extends('layouts.app')


@section('page_title')
    Statistiche Ordini {{ $user->name }}
@endsection

@section('content')


@include('partials.aside_left')

    <div id="stats" class="dashboard-right">
        {{-- Grafico--}}
        <div class="graph_mounths" style="width: 600px">
            <h2 class="mb-2">Totale ordini per mese</h2>
            <canvas  id="myChart"></canvas>   
        </div>
        {{-- /Grafico --}}
        {{-- Orders --}}
            <h2>Tutti gli ordini presso il tuo ristorante</h2>

            <div class="list-orders">
                <ul v-for="order in orders">
                     <li>Data: @{{ order.date }}</li>
                     <li>Indirizzo: @{{ order.address}}</li>
                     <li>Totale: @{{ order.total}} &euro;</li>
                </ul>
            </div>
        {{-- /Orders --}}
    </div>
    

    
{{-- <script>
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
  </script> --}}

    
@endsection

@section('script')
{{-- dayjs --}}
<script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
{{-- axios --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- vuejs --}}
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

{{-- script stats --}}
<script>
new Vue({
    el: '#stats',
    data: {
       orders: [],
       countOrder: [],
       countTotal: [],
       currentYear: new Date()
    },
    mounted:function(){
        axios.get('http://localhost:8000/api/user/orders',{
            params: {
                id : {{ $user->id }} 
            }
        })
        .then((result) => {
            for (var i = 0; i < result.data.length; i++) {
                if (!this.orders.some(order => order.id === result.data[i].id)) {
                    
                    var data = new Date(result.data[i].created_at);
                    var hour, day, month, year;
                    day = data.getDate() + "/";
                    month = data.getMonth() + 1 + "/";
                    hour = data.getHours() + ":";
                    year = data.getFullYear() + " - ";
                    result.data[i].date= ( day + month + year + hour );
                    //console.log(result.data[i].date)
                    this.orders.push(result.data[i]);
                    //console.log(this.orders);
                    
                }                   
            }
            for (var j = 0; j < 12; j++) {
                var totOrders = 0;
                var earning = 0;
                for (var i = 0; i < this.orders.length; i++) {
                    let date = new Date(this.orders[i].created_at)
                    if (date.getMonth() == j) { 
                        earning += this.orders[i].total;
                        totOrders++;
                    }                                                      
                }
            this.countTotal.push(earning); 
            this.countOrder.push(totOrders); 
            //console.log(this.countTotal);
            //console.log(this.countOrder);
                     
            }
            
            this.currentYear = this.currentYear.getFullYear();               
        });
        this.statsMonths();                 
    },


    methods:{   

        statsMonths: function(){
            const labels = [
            'Gennaio',
            'Febbraio',
            'Marzo',
            'Aprile',
            'Maggio',
            'Giugno',
            'Luglio',
            'Agosto',
            'Settembre',
            'Ottobre',
            'Novembre',
            'Dicembre'
        ];
        const data = {
            labels: labels,
            datasets: [{
                label: '#ordini',
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
                ],
                borderWidth: 1,
                data: this.countOrder,
            },
            {
                label: 'Incasso',
                backgroundColor: 'rgb(042, 100, 120)',
                borderColor: 'rgb(255, 99, 132)',
                data: this.countTotal,
            }]
        };
        const config = {
            type: 'bar',
            data,
            options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true
                }
              }
           }
        };
        
        var myChart = new Chart(
            document.getElementById('myChart'), 
            config                
        );
      }
    }
});

</script>
    
@endsection