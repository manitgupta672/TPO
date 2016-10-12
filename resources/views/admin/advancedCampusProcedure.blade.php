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
			{!! Form::open(array('url'=>'/admin/panel/campusProcedure/setRoundsDataAdvanced','method'=>'POST')) !!}
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
		
		<input type="text" name="roundNumber" placeholder="New Round Value" required pattern="*[0-9]">
		
		<input type="submit" name="submit" value="Update">
			{!! Form::close() !!}
	</tbody>
</table>
<p>To update placed students, enter 99 in round number.</p>
</div>

<h2>Rounds Till Now</h2>
<div>
	@foreach($rounds as $round)
		{{$round}}<br><br>
	@endforeach
</div>
@stop