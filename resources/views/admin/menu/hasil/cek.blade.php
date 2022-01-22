@extends('admin.master')
@section('konten')
    <section class="content">
        <div class="container-fluid">
            <!-- Widgets -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                STATISTIK PEMILU ONLINE 2020
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                                <div class="col-sm-6" style="margin-top: 20px">
                                    <p>Total Pemilik Suara : {{$sum}}</p>
                                    <p>Total Tempat Pemungutan Suara : {{$tps}}</p>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Lihat Hasil Suara
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                          <li><a href="{{ route('hasil_camat') }}">Camat</a></li>
                                          <li><a href="{{ route('menu_lurah') }}">Lurah</a></li>
                                        </ul>
                                      </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <canvas style="margin-left: 10px" id="myLine"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection
@section('chart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:{!!json_encode($asal_desa)!!},
                datasets: [{
                    label: 'Pemilik Hak Suara',
                    data:{!!json_encode($total)!!},
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)',
                        'rgba(206, 104, 247)',
                        'rgba(58, 182, 201)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)',
                        'rgba(182, 49, 235)',
                        'rgba(17, 161, 184)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
</script>
@endsection
@section('line')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        var ctx = document.getElementById('myLine').getContext('2d');
        var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

            // The data for our dataset
            data: {
                labels: {!!json_encode($asal_desa)!!},
                datasets: [{
                    label: 'Voters Telah Memilih',
                    backgroundColor: 'rgb(204, 240, 86)',
                    borderColor: 'rgb(204, 240, 86)',
                    data: {!!json_encode($vote)!!}
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>
@endsection
    