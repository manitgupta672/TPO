@extends('app')
@section('content')

	@foreach($myStudents as $myStudent)
		{{$myStudent->name}}
		{{$myStudent->branch}}
	<?php echo '<br/>'; ?>

	@endforeach

	<hr/>
	<p>Branch check</p>
	<p>Current Sem check</p>
	<p>Percentage Check
	<p>Either of the aggregate or average % should be greater than cut off by the company.</p>
	</p>
	<p>KT check</p>

@stop