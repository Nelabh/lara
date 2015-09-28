@extends('common.leaderboardjs')
@extends('common.default')



@section('content')
<div class="container-fluid background">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class = 'but' class="active" yr = '0'><a>All</a></li>
                        <li role="presentation" class = 'but' yr = '1'><a>1st year</a></li>
                        <li role="presentation" class = 'but' yr = '2'><a>2nd Year</a></li>
                        <li role="presentation" class = 'but' yr = '3'><a>3rd Year</a></li>
                    </ul>
              </div>
                <div class="col-md-offset-4 col-md-4 leaderboard">
                <!-- <ul id ="entry">
                    @foreach ($data as $users)
                        <li>{{ $users-> fname ." ". $users-> lname }}</li>
                    @endforeach
                </ul> -->

                <table id= 'table'>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Score</th>

                    @for ($i = 0; $i < count($data); $i++)
                        <tr>
                            <td>{{ ($i+1) }}</td>
                            <td>{{ $data[$i]-> fname ." ". $data[$i]-> lname }}</td>
                            <td>{{ $data[$i]-> points }}</td>
                        </tr>
                    @endfor
                </table>
                </div>
            </div>
        </div>
        
@stop