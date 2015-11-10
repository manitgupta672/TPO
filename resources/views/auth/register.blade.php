@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						{!! csrf_field() !!}
						<div class="form-group">
							Student<input id="change-to-student" class="" type="radio" name="entity" value="student">
							Company<input class="" type="radio" name="entity" value="company">
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label" id="label-name">Student Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Mobile Number</label>
							<div class="col-md-6">
								<input type="mobile" class="form-control" name="mobile" value="{{ old('mobile') }}">
							</div>
						</div>
						
						<div class="form-group" id="show-if-student">
							<label class="col-md-4 control-label">New Roll Number</label>
							<div class="col-md-6">
								<input type="text" required pattern ="[0-9]{2}[A-Z]{3}[0-9]{5}" class="form-control" name="newRoll" value="{{ old('newRoll') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="show-me" style='display:none'>
	<h2>Hi</h2>
</div>
<script type="text/javascript">
	
	$(document).ready(function() {
	   $('input[type="radio"]').click(function() {
	       if($(this).attr('id') == 'change-to-student') {
	            $('#label-name').html("Student Name");
	            $('#show-if-student').show();           
	       }

	       else {
	       	//this runs when Company registers
	       		$('#show-if-student').hide();
	       		$('input[name="newRoll"]').removeAttr("required pattern");
	            $('#label-name').html("Company Name");   
	       }
	   });
	});

</script>
@endsection
