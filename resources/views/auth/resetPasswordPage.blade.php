@extends('preloginmaster')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Reset Password</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(['method'=>'POST','url'=>'/reset']) !!}
						<input type="hidden" name="confirmationCode" value="{{$confirmationCode}}">
					 	Password : <input id="pass" type="password" name="password" ><br>
					 	Confirm Password : <input id="confPass" type="password" name="confirm_password"><br>
	 					<button id="submit" class="btn waves-effect waves-light col s12" type="submit">Submit
		              	<i class="material-icons right">send</i>
		            	</button>
					{!! Form::close() !!}




				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#submit').click(function(){
	var pass = $('#pass').val();
	var confPass = $('#confPass').val();
		if( pass != confPass)
		{	Materialize.toast('Passwords Don\'t Match!!!', 10000,'rounded');
			return false;
		}
	});
});
</script>
@endsection
