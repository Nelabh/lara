@if($data['load'] == 'true')
	@extends('common.default')
@endif

@section('content')
<div class = 'entry'>
@foreach ($data['emails'] as $x)
	<p>The current value is:: {{$x}} </p>
@endforeach 
</div>

@stop