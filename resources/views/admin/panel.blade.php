@extends('app')

@section('content')
<a href="{{ url('/admin/companyManagement') }}">
<div style="width:300px; height:100px; background-color:#ADD8E6; color:black; text-align:center; padding-top: 40px; border:3px solid black; border-radius:10px;">
	Companies
</div>
</a>

<a href="{{ url('/news') }}">
<div style="width:300px; height:100px; background-color:#ADD8E6; color:black; text-align:center; padding-top: 40px; border:3px solid black; border-radius:10px;">
	News
</div>
</a>

<a href="{{ url('news/create') }}">
<div style="width:300px; height:100px; background-color:#ADD8E6; color:black; text-align:center; padding-top: 40px; border:3px solid black; border-radius:10px;">
	Add News
</div>
</a>

<a href="{{ url('news') }}">
<div style="width:300px; height:100px; background-color:#ADD8E6; color:black; text-align:center; padding-top: 40px; border:3px solid black; border-radius:10px;">
	Edit News
</div>
</a>

@endsection