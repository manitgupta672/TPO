@extends('app')
@section('content')
	@foreach($news as $new)
		<h2>{{$new->title}}</h2>
		<h6>{{$new->body}}</h6>
		<br/>Last Updated On : {{$new->updated_at}}<br/>
		<a href="/news/{{$new->id}}">View</a>
		<a href="/news/{{$new->id}}/edit">Edit</a>
		<hr/>
	@endforeach
@stop