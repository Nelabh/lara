@extends('common.dashjs')
@extends('common.default')

@section('content')
  <div class="container-fluid">
        <div class="row">
        <div class="col-md-2 aside">
            <h1>Points</h1>
            <div class="circle">50</div>
            <h1>{{ $user['name'] }}</h1>
            <h2>Global Rank : {{ $user['globalRank'] }}</h2>
            </div>
        <div class="col-md-10 battleground">
            <h1 id = 'level'>LEVEL - {{ $user ['level'] }}</h1>
            <p id = 'question'>{{ $user['question'] }}</p>
            
                <input id = 'answer' type="text" name = '<?php echo  csrf_token(); ?>' placeholder="Try your luck here... ">
                <button type= "submit" id='but' class="button button--wayra button--border-thick button--text-upper button--size-s">Submit</button>
            
            </div>    
        </div>
        </div>

        @stop