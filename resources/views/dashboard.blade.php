@extends('common.dashjs')
@extends('common.default')

@section('content')
  <div class="container-fluid background-3" >
 @if(Session::has('message'))
    <div id="error">
           
            <p id="msg">{{Session::get('message')}}</p>
           
        </div>
         @endif
        <div class="row">
        <div class="col-md-2 aside">
            <h1 id="dashboard">DASHBOARD</h1>
            <h2 id="points">Points</h2>
            <div class="circle">50</div>
            <h1>{{ $user['name'] }}</h1>
            <h2>Global Rank : {{ $user['globalRank'] }}</h2>
            </div>
        <div class="col-md-10 battleground">
            <div class="row">
            <div class="col-md-12">
            <h1>LEVEL - {{ $user ['level'] }}</h1>
                </div>
                </div>
        <div class="row">
            <div class="col-md-offset-4 col-md-4 question-container">
            
            <p id = 'question'>{{ $user['question'] }}</p>
            </div>
        </div>
                <input id = 'answer' type="text" name = '<?php echo  csrf_token(); ?>' placeholder="Try your luck here... ">
               <div class="col-md-offset-5 col-md-3">
                <button type= "submit" id='but' class="button button--wayra button--border-thick button--text-upper button--size-s">Submit</button>
            </div>
            </div>    
        </div>
        </div>

        @stop