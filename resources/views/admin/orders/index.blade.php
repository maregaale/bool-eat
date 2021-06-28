@extends('layouts.app')


@section('page_title')
    Statistiche Ordini {{ $user->name }}
@endsection

@section('content')
    {{-- aside --}}
    @include('partials.aside_left')

        <div  v-dragscroll  class="dashboard_right" >
            {{-- visual statistiche  --}}
            <section class="container-fluid dashboard_right-sectioncharts">
    
                {{-- titolo  --}}
                <div class="mt-3 mb-1 title-padding">
                    <h4 class="text-uppercase">Grafico statistiche</h4>
                        <p>Controlla nello specifico quanti ordini e quanto hai guadagnato per ogni mese dell'anno corrente.</p>   
                </div>
                {{-- /titolo  --}}
    
                {{-- grafico statistiche --}}
                <div class="col-12 charts_container-row-box box-padding">
                    {{-- contenitore box --}}
                    <div class="col-12 charts_container-row-box-cont box-padding">
                        {{-- box chart--}}
                        <div class="charts_container-row-box-cont-chart">
                            {{-- sezione top --}}
                            <div id="stats" style="min-width:400px;">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /grafico statistiche --}}
            </section>
        </div> 
    

@endsection

@section('script')
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/vue-dragscroll"></script>

    {{-- dayjs --}}
    <script src="https://unpkg.com/dayjs@1.8.21/dayjs.min.js"></script>
    {{-- axios --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.js" integrity="sha512-otOZr2EcknK9a5aa3BbMR9XOjYKtxxscwyRHN6zmdXuRfJ5uApkHB7cz1laWk2g8RKLzV9qv/fl3RPwfCuoxHQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- vuejs --}}
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

    {{-- script statistiche--}}

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


        new Vue({
            el: '#stats',
            data: {
            orders: [],
            countOrder: [],
            countTotal: [],
            currentYear: new Date(),
            show: false,
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
                    }
                    
                    this.currentYear = this.currentYear.getFullYear();  
                                
                    this.statsMonths(); 
                });
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

                    // chartjs
                    var ctx = document.getElementById('myChart')
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [
                                {
                                    label: '#ordini',
                                    data: this.countOrder,
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
                                },
                                {
                                    label: 'Incasso',
                                    backgroundColor: 'rgb(042, 100, 120)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    data: this.countTotal,
                                }
                            ],
                        },
                        options: {
                            responsive: true,
                            // maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                },
            },
        });
    </script>
@endsection