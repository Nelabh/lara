@if($data['load'] == 'true')
	@extends('common.leaderboardjs')
	@extends('common.default')
	
@endif

@section('content')
<div id = 'entry'>
@foreach ($data['emails'] as $x)
	<p>The current value is:: {{$x}} </p>
@endforeach 
</div>

<button class = 'but' yr ='1'>1</button>
<button class = 'but' yr ='2'>2</button>
<button class = 'but' yr ='3'>3</button>
<button class = 'but' yr ='0'>Global</button>

@stop