@extends('postloginmaster')
@section('content')

{!! Form::open(array('url'=>'/passwordChangeByAdmin','method'=>'POST')) !!}
	Email<input type="email" name="email"><br/>
	Password<input type="password" name="password"><br/>
	<input type="submit" value="Change">

</form>


@stop