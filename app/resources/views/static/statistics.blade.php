@extends('layouts.app')

@section('title','Statistics page')

@section('content')

<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/canvasjs/1.7.0/jquery.canvasjs.min.js"></script>
<link href="{{ asset('css/statistics.css') }}" rel="stylesheet">
<script src="{{ asset('js/Chart.bundle.min.js') }}"></script>

<div class="text-center">
  <h3><b>Let's see what our statistics have to say!</b></h3>
</div>
<div class="container">
  <div class="col-md-4">
    <h3>Most wanted products</h3>
    <div class="row white text-center">
      <canvas id="myChart"></canvas>
    </div>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
          type: 'pie',
          data: {
              labels: {!! json_encode($wanted_name) !!},
              datasets: [{
                  label: '# of Votes',
                  data: {!! json_encode($wanted_views) !!} ,
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                  ],
                  borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {

          }
        });
      </script>
    </div>


    <div class="col-md-4">
      <h3>Most unwanted products</h3>
      <div class="row white text-center">
        <canvas id="myChart2"></canvas>
      </div>
      <script>
        var ctx = document.getElementById("myChart2");
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($unwanted_name) !!},
                datasets: [{
                    label: '# of Votes',
                    data: {!! json_encode($unwanted_views) !!},
                    backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                    ],
                    borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)',
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {

            }
          });
        </script>
      </div>


      <div class="col-md-4">
        <h3>Users with most preferences</h3>
        <div class="row white text-center">
          <canvas id="myChart3"></canvas>
        </div>
        <script>
          var ctx = document.getElementById("myChart3");
          var myChart = new Chart(ctx, {
              type: 'pie',
              data: {
                  labels: ["mama", "Blue", "Yellow", "Green", "Purple", "Orange","tata"],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3,20],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
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

              }
            });
          </script>
        </div>


        <div class="col-md-4">
          <h3>User with least preferences</h3>
          <div class="row white text-center">
            <canvas id="myChart4"></canvas>
          </div>
          <script>
            var ctx = document.getElementById("myChart4");
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["mama", "Blue", "Yellow", "Green", "Purple", "Orange","tata"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3,20],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
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

                }
              });
            </script>
          </div>

  </div> <!-- end row -->
</div> <!-- end container -->
<style>

.col-md-4 {
  margin-left: 100px;
  margin-top: 70px;
  margin-right:50px;
}
h3 {
  margin-top: 50px;
}
</style>

@endsection
