@extends('app')
@section('content')

	{!! Form::model($news,['method'=>'PATCH','url'=>'news/'.$news->id]) !!}
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
				<input type="checkbox" value="S" name="student" <?php if(in_array('S',$visibleTo)) echo "checked='checked'"; ?> />Students<br/>
				<input type="checkbox" value="C" name="company" <?php if(in_array('C',$visibleTo)) echo "checked='checked'"; ?> />Company<br/>
				<input type="checkbox" value="A" name="alumni" <?php if(in_array('A',$visibleTo)) echo "checked='checked'"; ?> />Alumni<br/>
				<input type="checkbox" value="T" name="teacher" <?php if(in_array('T',$visibleTo)) echo "checked='checked'"; ?> />Teachers<br/>
		</div>
		{!! Form::submit('Add',['class'=>'twelve columns btn button-primary']) !!}
	{!!Form::close()!!}
@stop