<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  


    <title>Document</title>
  </head>
  <body>
      
      <div class="container chart_container" style="width: 400px">
      <div class="" id="stats">
        @foreach ($plates as $key => $plate)
        @if ($key == 0)
        <p>{{ $plate->user_id }}</p>
        <button v-on:click="getOrders({{ json_encode($plate->user_id) }})">CXiao</button>
            
        @endif
        
        @endforeach
        
        
        

        <canvas id="myChart" width="400" height="400"></canvas>
      </div>
         
        
      </div>


    {{-- <script>

       
     

      var ctx = document.getElementById('myChart');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              
              labels: [@foreach($orders as $order) "{{$order->name}}", @endforeach ],
              datasets: [{
                  label: '# of Votes',
                  data: [@foreach($orders as $order) "{{$order->total}}", @endforeach ],
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.10.5/dayjs.min.js" integrity="sha512-n6mJ6AqoohFfbgx3x7N162B/zRNs5x8uvsStlHC+LCvqwKW7oiucE07Ehatg62ybx6Vo1ctaZwm/4sSRUTSIQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
<script src="{{ asset('js/stats.js')}}"></script>
    
  </body>
</html>