@extends('app')
@section('content')

	{!! Form::open(['url'=>'news']) !!}
		<div class="six columns offset-by-three">
			{!! Form::label('title','Title : ') !!}
		  	<span class="fa fa-user"></span>
			{!! Form::text('title',null,['class'=>'twelve columns','placeholder'=>'Title of the news']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('body','News : ') !!}
		  	<span class="fa fa-user"></span>
			{!! Form::textarea('body',null,['class'=>'twelve columns','placeholder'=>'News']) !!}
		</div>

		<div>
			<input type="checkbox" value="S" name="student"/>Students<br/>
			<input type="checkbox" value="C" name="company"/>Company<br/>
			<input type="checkbox" value="A" name="alumni"/>Alumni<br/>
			<input type="checkbox" value="T" name="teacher"/>Teachers<br/>
		</div>
		{!! Form::submit('Add',['class'=>'twelve columns btn button-primary']) !!}

	{!!Form::close()!!}
@stop