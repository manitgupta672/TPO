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
		<th>CheckBox</th>
		<th>Email Id</th>
		<th>Rounds cleared till now</th>
	</thead>
	<tbody>
			{!! Form::open(array('url'=>'/admin/panel/campusProcedure/setRoundsData','method'=>'POST')) !!}
		@foreach($students as $student)
				<tr>
					<td><a href="/admin/panel/studentDetails/{{$student->student_id}}">{{$student->name}}</a></td>
					<td><input type="checkbox" name="{{$student->student_id}}" value="{{$student->student_id}}" style="position:relative;visibility:visible; left:20px;"/></td>
					<td>{{$student->email}}</td>
					<td>
					@if($student->level!=99)
						{{$student->level}}
					@else
						placed
					@endif
					</td>
				</tr>
		@endforeach
		<hr/><hr/>
		<input type="hidden" name="company_id" value="{{$company_id}}">
		
		<input type="text" name="roundName" placeholder="Name of the current round" required>
		
		<input type="submit" name="submit" value="Update">
			{!! Form::close() !!}
	</tbody>
</table>
</div>

<h2>Rounds Till Now</h2>
<div>
	<ol>
		@foreach($rounds as $round)
			<li>{{$round}}</li>
		@endforeach
	</ol>
</div>
<h3>To update the selected students, click on advanced.</h3>
<a href = "/admin/panel/campusProcedure/advanced/{{$company_id}}">Advanced>></a><br/>
<a href="/admin/panel/campusProcedure/setRoundsDataAbsent/{{$company_id}}">Mark Absentees</a>
@stop