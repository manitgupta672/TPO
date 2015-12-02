@extends('app')
@section('content')

	<h3>This is Company admin panel</h3>
	<a href="/company/panel/jaf" class="button">Fill / Edit JAF</a>
	<!-- <a href="/company/panel/edit" class="button">Edit Profile & Login</a> -->
	<a href="/company/panel/myStudents" class="button">Students for Your Company</a>
	<a href="/company/panel/news" class="button">News for You</a>
	<a href="/auth/logout" class="button">Logout</a>

	<p>Company can see data of students who are elligible for them. Eligibility based on their cutOff percent in the JAF filled. Students of branches selected by the company will only be shown.</p>
@stop