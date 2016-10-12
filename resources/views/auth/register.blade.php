@extends('preloginmaster')

@section('content')
@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<script>
    $(document).ready(function(){
        Materialize.toast('{{$error}}', 100000,'rounded');
    });
  </script>
	@endforeach
@endif

@if(!empty($error))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{$error}}', 10000,'rounded');
    });
  </script>
@endif

  <div class="row login-form" style="  margin-top: 50px !important; margin-bottom:50px;">
        <div class="col s12 m6 l6 push-l3 push-m3">
          <div class="card blue-grey darken-1 s12">
            <div class="card-content white-text center-align">
              <div class="row"><i class="fa fa-3x fa-pencil"></i></div>
              <span class="card-title">Register</span>
              <hr>

							<p class="white-text">
								<form class="col s12 m12" role="form" method="POST" action="{{ url('/auth/register') }}">
									{!! csrf_field() !!}
								<p class="col s3">
                  <input id="change-to-student" name="entity" type="radio" value="student"  checked="checked" />
                  <label class="white-text" for="change-to-student">Student</label>
                </p>
                <p class="col s3">
                  <input id="change-to-company" name="entity" type="radio" value="company"  />
                  <label class="white-text" for="change-to-company">Company</label>
                </p>
                <p class="col s3">
                  <input id="change-to-alumni" name="entity" type="radio" value="alumni"  />
                  <label class="white-text" for="change-to-alumni">Alumni</label>
                </p>
                <p class="col s3">
                  <input id="change-to-professor" name="entity" type="radio" value="professor"  />
                  <label class="white-text" for="change-to-professor">Professor</label>
                </p>

              <div class="row">

                  <div class="row">
                    
                    <div class="input-field col s12 m12 l6">
                      <i class="material-icons prefix icon-24px">face</i>
                      <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" autofocus>
                      <label for="name" id="label-name">Student's Name</label>
                    </div>
                    
                     <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">email</i>
                      <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
                      <label for="email">E-Mail</label>
                    </div>

                    <div class="input-field col s12 m12 l12">
                      <i class="material-icons prefix icon-24px">local_phone</i>
                      <input id="mobile" name="mobile" type="text" class="validate" value="{{ old('mobile') }}">
                      <label for="mobile">Mobile Number</label>
                    </div>

                    <div class="input-field col s12 m12 l12" id="show-if-student">
                      <i class="material-icons prefix icon-24px">play_arrow</i>
                      <input id="newRoll" name="newRoll" type="text" class="validate" value="{{ old('newRoll') }}" required pattern ="[0-9]{2}[A-Z]{3}[0-9]{5}">
                      <label for="newRoll">New Roll Number</label>
                    </div>
										
										<div class="input-field col s12 m12 l12" id="show-if-alumni">
											<select name="passOut" size="2">
												<option value="" disabled selected>Year</option>
												<?php
													for($i=2015; $i>=1951; $i--){
														echo "<option value=" . $i . ">" . $i . "</option>";
													}
												?>
											</select>
										</div>
										
                    <div class="input-field col s12 m12 l12 " id="show-if-professor">
                    <select name="branch">
                      <option value="" disabled selected>Branch</option>
                      <option value="CSE">Computer Science And Engineering</option>
                      <option value="ITE">Information Technology</option>
                      <option value="ECE">ELectronics And Communication Engineering</option>
                      <option value="EEE">Electrical And Electronics Engineering</option>
                      <option value="ECC">Electronics And Computer Engineering</option>
                      <option value="EEL">Electrical Engineering</option>
                      <option value="CIV">Civil Engineering</option>
                      <option value="BCT">Building And Construction Engineering</option>
                      <option value="CHE">Chemical Engineering</option>
                      <option value="MEC">Mechanical Engineering</option>
                      <option value="MIN">Mining Engineering</option>
                      <option value="PIE">Production & Industrial Engineering</option>
                    </select>
                  </div>

                    <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">lock</i>
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Password</label>
                    </div>

                    <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">lock</i>
                      <input id="password_confirmation" name="password_confirmation" type="password" class="validate">
                      <label for="password_confirmation">Confirm Password</label>
                    </div>



                    <div class="input-field col s12 m12 l12">
                       <button class="btn waves-effect waves-light col s12 center-align" type="submit" name="action">Register
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              </p>
            </div>
            <div class="card-action row">
              <a href="/auth/login" class="col s12 center-align">Already Registered ! Login...</a>
            </div>
          </div>
        </div>
		
  </div>
<script type="text/javascript">
  
  $(document).ready(function() {
		 $('#show-if-alumni').hide();        
     $('input[type="radio"]').click(function() {
         if($(this).attr('id') == 'change-to-student') {
              $('#label-name').html("Student Name");
              $('#show-if-student').show();
              $('#show-if-professor').show(); 
					 		$('#show-if-alumni').hide();        
         }
         else if($(this).attr('id') == 'change-to-company') {
          //this runs when Company registers
            $('#show-if-student').hide();
            $('#show-if-professor').hide();
            $('input[name="newRoll"]').removeAttr("required pattern");
            $('#label-name').html("Company Name"); 
					 	$('#show-if-alumni').hide();
         }
         else if($(this).attr('id') == 'change-to-alumni') {
          //this runs when Alumni registers
            $('#show-if-professor').show();        
            $('#show-if-student').hide();
            $('input[name="newRoll"]').removeAttr("required pattern");
            $('#label-name').html("Alumni Name"); 
					 	$('#show-if-alumni').show();        
					 
         }
         else if($(this).attr('id') == 'change-to-professor') {
          //this runs when Professor registers
            $('#show-if-professor').show();        
            $('#show-if-student').hide();
            $('input[name="newRoll"]').removeAttr("required pattern");
            $('#label-name').html("Professor Name");   
					 	$('#show-if-alumni').hide();
         }
     });
  });

</script>



<!--
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
							<div>
								
							Student<input id="change-to-student" type="radio" name="entity" value="student" checked="checked"><br/>
							Company<input id="change-to-company" type="radio" name="entity" value="company"><br/>
							Alumni<input id="change-to-alumni" type="radio" name="entity" value="alumni"><br/>
							Professor<input id="change-to-professor" type="radio" name="entity" value="professor"><br/>
							</div>

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
								<input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}">
							</div>
						</div>
						
						<div class="form-group" id="show-if-student">
							<label class="col-md-4 control-label">New Roll Number</label>
							<div class="col-md-6">
								<input type="text" required pattern ="[0-9]{2}[A-Z]{3}[0-9]{5}" class="form-control" name="newRoll" value="{{ old('newRoll') }}">
							</div>
						</div>

						<div class="form-group" id="show-if-professor">
							<label class="col-md-4 control-label">Branch</label>
							<div class="col-md-6">
								<select name="branch" class="col-md-12 form-control">
									<option value="CSE">Computer Science And Engineering</option>
									<option value="ITE">Information Technology</option>
									<option value="ECE">ELectronics And Communication Engineering</option>
									<option value="EEE">Electrical And Electronics Engineering</option>
									<option value="ECC">Electronics And Computer Engineering</option>
									<option value="EEL">Electrical Engineering</option>
									<option value="CIV">Civil Engineering</option>
									<option value="BCT">Building And Construction Engineering</option>
									<option value="CHE">Chemical Engineering</option>
									<option value="MEC">Mechanical Engineering</option>
									<option value="MIN">Mining Engineering</option>
									<option value="PIE">Production & Industrial Engineering</option>
								</select>
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
-->
<script type="text/javascript">
	
//	$(document).ready(function() {
//	   $('input[type="radio"]').click(function() {
//	       if($(this).attr('id') == 'change-to-student') {
//	            $('#label-name').html("Student Name");
//	            $('#show-if-student').show();
//	            $('#show-if-professor').show();        
//	       }
//	       else if($(this).attr('id') == 'change-to-company') {
//	       	//this runs when Company registers
//	       		$('#show-if-student').hide();
//	            $('#show-if-professor').hide();
//	       		$('input[name="newRoll"]').removeAttr("required pattern");
//	            $('#label-name').html("Company Name");   
//	       }
//	       else if($(this).attr('id') == 'change-to-alumni') {
//	       	//this runs when Alumni registers
//	            $('#show-if-professor').show();        
//	       		$('#show-if-student').hide();
//	       		$('input[name="newRoll"]').removeAttr("required pattern");
//	            $('#label-name').html("Alumni Name");   
//	       }
//	       else if($(this).attr('id') == 'change-to-professor') {
//	       	//this runs when Professor registers
//	            $('#show-if-professor').show();        
//	       		$('#show-if-student').hide();
//	       		$('input[name="newRoll"]').removeAttr("required pattern");
//	            $('#label-name').html("Professor Name");   
//	       }
//	   });
//	});

</script>


@endsection
