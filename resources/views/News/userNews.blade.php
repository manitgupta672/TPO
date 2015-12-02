@extends('app')
@section('content')

	@foreach($myNews as $news)
		{{$news->title}}<br/>
		{{$news->body}}<br/>
		{{$news->created_at}}<hr/>
	@endforeach

@stop