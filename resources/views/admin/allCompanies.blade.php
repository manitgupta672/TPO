@extends('app')
@section('content')
<h1>Hi</h1>
<div>
	{!! Form::open(array('url'=>'/admin/setVisibility','method'=>'POST', 'id'=>'myform')) !!}
		@foreach($companies as $company)
			<!-- <a href="admin/companyManagement/{{$company->id}}">{{$company->name}}</a> -->
			<a href="{{ action('adminController@company',[$company->user_id]) }}">{{$company->name}}</a>
			<?php echo "<br/>";?>
			<hr/>
		@endforeach
		
			<!-- <button type="submit" value="<?php echo $company->user_id ; ?>" id="<?php echo $company->user_id ; ?>">Apply</button> -->
	{!! Form::close() !!}		
</div>

@endsection