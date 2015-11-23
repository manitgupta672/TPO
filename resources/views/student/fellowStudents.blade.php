@extends('app')
@section('content')

@foreach($fellowStudents as $fellowStudent)
<!-- {{$fellowStudent->user_id}} -->
<!-- {{$fellowStudent->id}} -->
	<a href="{{ action('studentController@fellowStudentProfile',[$fellowStudent->user_id]) }}">{{$fellowStudent->name}}</a>
	<br/>
@endforeach

@stop