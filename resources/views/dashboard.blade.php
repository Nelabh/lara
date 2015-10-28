@extends('common.dashjs')
@extends('common.default')

@section('content')
  <div class="container-fluid background-3" >

        <div class="row">
        <div class="col-md-2 aside">
            <h1 id="dashboard">DASHBOARD</h1>
            <h2>Points</h2>
            <div class="circle" id = "points">{{ $user['points'] }}</div>
            <h1>{{ $user['name'] }}</h1>
            <h2 id = 'rank'>Global Rank : {{ $user['globalRank'] }}</h2>
            </div>
        <div class="col-md-8 battleground">
            <div class="row">
            <div class="col-md-12">
            <h1 id = "level">LEVEL - {{ $user ['level'] }}</h1>
                </div>
                </div>
                
                       
         
 
        <div class="row" style="width:100%">
            <div class="col-md-offset-4 col-md-4 question-container" style="width:90%; margin-left:5%">
            	
                <p id = 'question'>{!! $user['question'] !!}</p>
            </div>
        </div>
        
                <input id = 'answer' type="text" name = '<?php echo  csrf_token(); ?>' placeholder="Try your luck here... " style="margin-bottom:0px;">
        <div class="signup-form" id="error">
           
            <p id="msg">{{Session::get('message')}}</p>
           
        </div>
               <div class="col-md-offset-5 col-md-3">
                <button type= "submit" id='but' class="button button--wayra button--border-thick button--text-upper button--size-s">Submit</button>
 
            </div>
            
            </div>

            <div class="col-md-2"> 
            @if ($user['level']==15)
            	<p hidden>A note is found in the hands of the dead body, which reads:
"Second of January, Third of July, Fourth of April, Second of October, Fourth of December"

The note was all the detective want to find the killer. Can you find out the killer.........

X is Alice
Y is Debra
Z is Sia
</p>
            @endif
                                                 
   <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Go to 
    <span class="caret"></span></button>
    <ul class="dropdown-menu" id = 'list' style="overflow:auto; height:200%">
        @for ($i=0; $i<= $user['level'] ; $i++)
            <li><a class = 'navigate' x='{{ $i }}'>LEVEL - {{ $i }}</a></li>
        @endfor
    </ul>
  </div> 
</div>
        </div>
        </div>

        @stop