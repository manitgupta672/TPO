@extends('app')

@section('datatables-stylesheet-and-js')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
@stop


@section('content')
<table id="fellowStudents">
	<thead>
		<tr>
			<th>Name</th>
			<th>Branch</th>
			<th>Semester</th>
		</tr>
	</thead>
	<tbody>
		@foreach($fellowStudents as $fellowStudent)
			<tr>
				<td><a href="{{ action('studentController@fellowStudentProfile',[$fellowStudent->user_id]) }}">{{$fellowStudent->name}}</a></td>
				<td>{{$fellowStudent->branch}}</td>
				<td>{{$fellowStudent->currentSem}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

<script type="text/javascript">
	$(document).ready( function () {
	    $('#fellowStudents').DataTable();
	} );
</script>
@stop