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
                                HASIL PEMUNGUTAN SUARA CAMAT
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                @foreach ($camat as $p)
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="col mb-4">
                                                    <div class="card">
                                                        <center>    
                                                        <img src="{{ asset('images/camat/'. $p->foto) }}" class="img img-responsive" alt="Responsive image">
                                                            <div class="card-body">
                                                            <h5 class="card-title">Nomor Urut : {{$p->norut}}</h5>
                                                            <p class="card-text">{{$p->nama}}</p>
                                                            </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                @endforeach
                                <div class="col-sm-8" style="margin-left: 18%">
                                    <canvas id="myChart" width="200" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </section>
@endsection
@section('chart')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!!json_encode($nama)!!},
                datasets: [{
                    label: '# of Votes',
                    data: {!!json_encode($hasil)!!},
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(54, 162, 235)',
                        'rgba(255, 206, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(153, 102, 255)',
                        'rgba(255, 159, 64)'
                    ],
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