@extends('app')
@section('content')
	<h1>{{$news->title}}</h1><br/>
	{{$news->body}}<br/>
	<b>This news is visible to :</b><br/> 
	<?php
		if(strpos($news->visibleTo, 'S'))
			echo "Students" . "<br/>";
		if(strpos($news->visibleTo, 'T'))
			echo " Teachers" . "<br/>";
		if(strpos($news->visibleTo, 'C'))
			echo " Company" . "<br/>";
		if(strpos($news->visibleTo, 'A'))
			echo " Alumni" . "<br/>";
		?>
	<br/>Last Updated On : {{$news->updated_at}}<br/>
	<a href="/news/{{$news->id}}/edit">Edit</a>
@stop
