var stats = new Vue({
    el: "#stats",
    data: {
        orders: [],
        year: new Date()
    },
    mounted: function() {




        // var ctx = document.getElementById('myChart');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Giugno'],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         responsive: true,
        //         maintainAspectRatio: true,
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    },
    created: function() {
    //   this.getOrders(); // get all messages automatically when the page is loaded
    },
    methods: {
      getOrders: function(user_id) {
  
        axios
          .get(
            "http://localhost:8000/api/orders/" + user_id 
          )
          .then(res => {
            //console.log(res.data);
            this.orders = res.data;
            console.log(this.orders);
            this.orders.forEach(element => {
                let months = dayjs(element.created_at).format('M');
                let earnings = element.total;
                if (!this.labels.includes(months)) {
                    this.labels.push(months) ;
                   
                }
                this.totals.push(earnings);
                console.log(this.labels);  
                console.log(this.totals);           
            });

            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [this.labels],
                    datasets: [{
                        label: '# of Votes',
                        data: [this.totals],
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
            
          });
      }
    }
  });