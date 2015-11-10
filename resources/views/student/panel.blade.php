
@extends('master')
@section('content')

	<h3>This is Student admin panel</h3>
	<a href="/student/panel/resume" class="button">Edit / Fill Resume</a>
	<a href="/student/panel/placements" class="button">Your Companies</a>
	<a href="/student/panel/fellowStudents" class="button">Your Fellow Mates</a>
	<a href="/student/panel/printResume" class="button">My Resume</a>
	<a href="/auth/logout" class="button">Logout</a>

@stop