@extends('layouts.app')
@section('extra-css')
    <style type="text/css">
        #example_wrapper .col-md-6{
            max-width: 100%;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 m-0 mt-5">
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold text-info">Standard Derivation for Students</span>
                </div>
                <div class="card-body p-0">
                    <canvas id="myChart"></canvas>

                </div>
            </div>
        </div>

        <div class="col-4 m-0 mt-5">
            <div class="card">
                <div class="card-header">
                    <span class="font-weight-bold text-info">Students information</span>
                </div>
                <div class="card-body">
                   <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                           <thead>
                               <tr>
                                   <th>Student_id</th>
                                   <th>Name</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($getStudent as $student)
                                   <tr>
                                           <td>{{ $student->id }}</td>
                                           <td>{{ $student->name }}</td>
                                   </tr>
                               @endforeach
                           </tbody>
                   </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('extra-js')

    <script type="text/javascript">
        var ctx = document.getElementById('myChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [{{$labels}}],
                datasets: [{
                    data: [{{$data}}],
                    backgroundColor: 'rgb(255, 99, 132)',
                    label: 'SD',
                }],
            },

            options: {
                scales: {
                    yAxes: [{ 
                      scaleLabel: {
                        display: true,
                        labelString: "Result",
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                        }
                      }
                    }],
                    xAxes: [{ 
                      scaleLabel: {
                        display: true,
                        labelString: "Student ID"
                      }
                    }]
                }
            },
        });
        // console.log('data:'+ ' {{$data}}');
        // console.log('labels:'+ ' {{$labels}}');
    </script>
@endsection
