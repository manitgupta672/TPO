
@extends('app')
@section('content')
	
	<h3>This is Student admin panel</h3>
	<a href="/student/panel/resume" class="btn">Edit / Fill Resume</a>
	<a href="/student/panel/placements" class="btn">Your Companies</a>
	<a href="/student/panel/fellowStudents" class="btn">Your Fellow Mates</a>
	<a href="/student/panel/printResume" class="btn">My Resume</a>
	<a href="/student/panel/news" class="btn">Placement Notifications</a>
	<a href="/auth/logout" class="btn">Logout</a>

@stop