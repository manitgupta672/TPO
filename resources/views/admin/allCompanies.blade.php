
@extends('postloginmaster')
@section('content')
<h2>Companies that have registered and filled their Jaf's : </h2>
<div>
	{!! Form::open(array('url'=>'/admin/setVisibility','method'=>'POST', 'id'=>'myform')) !!}
		@if(!empty($companies))
			@foreach($companies as $company)
			<!-- <a href="admin/companyManagement/{{$company->id}}">{{$company->name}}</a> -->
			<h3><a href="{{ action('adminController@company',[$company->user_id]) }}">{{$company->name}}</a></h3>
			<?php echo "<br/>";?>
			<hr/>
			@endforeach
		@else
			No Companies Registered Yet!
		@endif
		
	{!! Form::close() !!}		
</div>

@endsection