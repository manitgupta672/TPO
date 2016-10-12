@extends('postloginmaster')
@section('content')
@if(session()->has('error_msg'))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
    });
  </script>
@endif
				<div class="col s8"><br></div> <!-- Line Break -->
        <div class="col s12 m9 l10"> <!-- First Row Starts -->
				{!! Form::open(['class'=>'col s12','method'=>'POST','url'=>'/student/panel/settings']) !!}
				{!! Form::model($data,['method'=>'POST','url'=>'/student/panel/settings']) !!}

					<div class="widget col s12 m12 l12 ">
          <div class="card cyan accent-4 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Settings</span>
              <hr>

                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">face</i>
										{!! Form::label('name','Name:') !!}
										{!! Form::text('name',null, ['class'=>'']) !!}
                  </div>
               
	                <!-- <form class="col s12"> -->
	                <div class="row">
	                    <div class="input-field col s12 l12">
		                    <select name="branch">
		            <option value="" disabled>Branch</option>
								<option value="CSE" <?php if($data['branch']=='CSE') echo " selected";?>>Computer Science And Engineering</option>
								<option value="ITE" <?php if($data['branch']=='ITE') echo " selected";?>>Information Technology</option>
								<option value="ECE" <?php if($data['branch']=='ECE') echo " selected";?>>ELectronics And Communication Engineering</option>
								<option value="EEE" <?php if($data['branch']=='EEE') echo " selected";?>>Electrical And Electronics Engineering</option>
								<option value="ECC" <?php if($data['branch']=='ECC') echo " selected";?>>Electronics And Computer Engineering</option>
								<option value="EEL" <?php if($data['branch']=='EEL') echo " selected";?>>Electrical Engineering</option>
								<option value="CIV" <?php if($data['branch']=='CIV') echo " selected";?>>Civil Engineering</option>
								<option value="BCT" <?php if($data['branch']=='BCT') echo " selected";?>>Building And Construction Engineering</option>
								<option value="CHE" <?php if($data['branch']=='CHE') echo " selected";?>>Chemical Engineering</option>
								<option value="MEC" <?php if($data['branch']=='MEC') echo " selected";?>>Mechanical Engineering</option>
								<option value="MIN" <?php if($data['branch']=='MIN') echo " selected";?>>Mining Engineering</option>
								<option value="PIE" <?php if($data['branch']=='PIE') echo " selected";?>>Production & Industrial Engineering</option>
							</select>
	                    </div>
	                </div>
	                
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">create</i>
										{!! Form::label('Mobile Number','Mobile Number') !!}
										{!! Form::text('mobile',null, ['class'=>' ' ]) !!}
                  </div>
									
									<div class="input-field col s12">
										<a href="/{{Request::segment(1)}}/updatePassword" class="btn red waves-effect waves-light col s12" type="submit">Change Password
											<i class="material-icons right">lock</i>
										</a>
									</div>
                
								</div>

							
              </div>
            </div>
          </div>
					<!-- First Card Ends -->
        
					</div> <!-- First Row Ends -->

					<div class="col s12 m9 l10"> <!-- Submit Row Starts -->
						<div class="widget col s12 m12 l12 "><!-- Second Card Begins -->
							<div class="card cyan accent-4 hoverable">
								<button class="btn waves-effect waves-light col s12" type="submit">Update Details
									<i class="material-icons right">send</i>
								</button>
								{!! Form::close() !!}
							</div>
						</div> <!-- Second submit Card Ends -->
					</div> <!-- Submit Row Ends -->

        </div>  <!-- Row Ends -->

@stop