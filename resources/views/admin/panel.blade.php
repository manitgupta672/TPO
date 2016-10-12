@extends('postloginmaster')

@section('content')
@if(session()->has('error_msg'))
	<script>
		$(document).ready(function(){
				Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
		});
	</script>
@endif
@if(!empty($error_msg))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{$error_msg}}', 10000,'rounded');
    });
  </script>
@endif
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

<a href="{{ url('passwordChangeByAdmin') }}">
<div style="width:300px; height:100px; background-color:#ADD8E6; color:black; text-align:center; padding-top: 40px; border:3px solid black; border-radius:10px;">
	Change A Password
</div>
</a>

@endsection