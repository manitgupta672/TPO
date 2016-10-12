@extends('postloginmaster')

@section('content')
@if(session()->has('error_msg'))
	<script>
		$(document).ready(function(){
				Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
		});
	</script>
@endif
<div class="container" >
<table>
	<thead>
		<th>Name</th>
		<th>Email Id</th>
		<th>Rounds cleared till now</th>
		<th>Absent</th>
	</thead>
	<tbody>
			{!! Form::open(array('url'=>'/admin/panel/campusProcedure/setRoundsDataAbsent','method'=>'POST')) !!}
		@foreach($students as $student)
				<tr>
					<td><a href="/admin/panel/studentDetails/{{$student->student_id}}"> {{$student->name}}</a></td>
					<td>{{$student->email}}</td>
					<td>
					@if($student->level!=99)
						{{$student->level}}
					@else
						placed
					@endif
					</td>
					<td><input type="checkbox" name="{{$student->student_id}}" value="{{$student->student_id}}" style="position:relative;visibility:visible; left:20px;"/></td>
				</tr>
		@endforeach
		<hr/><hr/>
		<input type="hidden" name="company_id" value="{{$company_id}}">
		
		<input type="submit" name="submit" value="Update">
			{!! Form::close() !!}
	</tbody>
</table>
</div>
<h2>Rounds Till Now</h2>
<div>
	@foreach($rounds as $round)
		{{$round}}<br><br>
	@endforeach
</div>
@stop
