@extends('postloginmaster')
@section('content')
@if(!empty($error_msg))
	<script>
		$(document).ready(function(){
				Materialize.toast('{{ $error_msg }}', 10000,'rounded');
		});
	</script>
@endif
          <div class="col s8"><br></div>
		 
		 			<div class="col s12 m9 l10"> <!-- cancel Row Starts -->
        		<div class="widget col s12 m12 l12 ">
          		<div class="card cyan accent-4 hoverable waves-effect">
            		<a href="/company/panel" class="btn red darken-2 waves-effect waves-light col s12" type="submit" >Cancel
              	<i class="material-icons right">cancel</i>
            		</a>
            	</div>
          	</div> <!-- cancel Card Ends -->
		 			</div>

					<!-- First Row Starts -->
        
         <div class="col s12 m9 l10">
         
         <div class="widget col s12 m12 l6 ">  <!-- Card One Starts -->
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Contact Information</span>
              <hr>
              
              <div class="row">
              	{!! Form::open(['method'=>'POST','url'=>'/company/panel/jaf']) !!}
								{!! Form::model($data,['method'=>'POST','url'=>'/company/panel/jaf']) !!}
								{{ csrf_field() }}
      							<div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">face</i>
                      {!! Form::text('hrName',null,['class'=>'validate']) !!}
                      {!! Form::label('hrName','H.R. Name:') !!}
										</div>
								
										<div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">stay_current_potrait</i>
											{!! Form::label('hrMob','H.R. Mobile') !!}
                      {!! Form::text('hrMob',null,['class'=>'validate','maxlength'=>'10','minlength'=>'10']) !!}
										</div>
                    
                    <div class="input-field col s12 m12 l12">

<!--                      <input id="compUrl" type="text" class="validate">
                      <label for="compUrl">Company URL</label>
-->
                      <i class="material-icons prefix icon-24px">web</i>
											{!! Form::label('compUrl','Company URL') !!}
                     {!! Form::textarea('compUrl',null, ['class'=>'materialize-textarea','style' =>'padding-top: 2.6rem']) !!}
                    </div>
										
                   <div class="input-field col s12 m12 l12">
										 <i class="material-icons prefix icon-24px">location_on</i> 
										 {!! Form::label('compAdd','Company Full Address') !!}
                     {!! Form::textarea('compAdd',null, ['class'=>'materialize-textarea', 'style' =>'padding-top: 3.5rem']) !!}
                    </div>
										
										<div class="input-field col s6">
                      <i class="material-icons prefix icon-24px">location_city</i>
											{!! Form::label('compCity','Recruitment Office City') !!}
                      {!! Form::text('compCity',null, ['class'=>'validate']) !!}
										</div>
										
										<div class="input-field col s6">
                      <i class="material-icons prefix icon-24px">local_phone</i>
											{!! Form::label('hrPhone','H.R. Phone Alternative :') !!}
											{!! Form::text('hrPhone',null, ['class'=>'validate']) !!}
										</div>
             	</div>

						</div>
        	</div>
         </div> 	<!-- Card One Ends -->
					 
				 	<div class="widget col s12 m12 l6 ">  <!-- Card Two Starts -->
          <div class="card blue darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Job Related</span>
              <hr>
              
              <div class="row">
      							<div class="input-field col s12 m12 l12">
                      <i class="material-icons prefix icon-24px">location_on</i>
											{!! Form::label('cityPost','Place of Joining :') !!}
											{!! Form::text('cityPost',null, ['class'=>'validate']) !!}
										</div>
	
								
										<div class="input-field col s12 m6 l6">
<!--                      <i class="material-icons prefix icon-24px"></i>-->
<!--											{!! Form::label('accom','Accomodation is Provided?') !!}-->
											<select name="accom">
												<option value="" disabled selected>Accomodation is Provided?</option>
												<option value="YES" <?php if($data['accom']=='YES') echo " selected";?>>YES</option>
												<option value="NO" <?php if($data['accom']=='NO') echo " selected";?>>NO</option>
											</select>
<!--												{!! Form::text('accom',null, ['class'=>'validate']) !!}-->
										</div>
		
                    <div class="input-field col s12 m6 l6">
                      <select name="bond">
												<option value="" disabled selected>If Bond is signed?</option>
												<option value="YES" <?php if($data['bond']=='YES') echo " selected";?>>YES</option>
												<option value="NO" <?php if($data['bond']=='NO') echo " selected";?>>NO</option>
											</select>
                    </div>
	
										<div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>
											{!! Form::label('cutOff','Cut-Off Percentage:') !!}
                      {!! Form::text('cutOff',null, ['class'=>'validate']) !!}
										</div>
								
										<div class="input-field col s12 m6 l6">
											<i class="material-icons prefix icon-24px">indeterminate_check_box</i>
											{!! Form::label('ktAllowed','No. Of KT\'s Allowed') !!}
                      {!! Form::text('ktAllowed',null, ['class'=>'validate']) !!}
                    </div>
             	</div>

						</div>
        	</div>
         </div> 	<!-- Card Two Ends -->
					 
				<div class="widget col s12 m12 l6 ">  <!-- Card Three Starts -->
          <div class="card deep-orange darken-3 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Company Overview</span>
              <hr>
              
              <div class="row">
      							<div class="input-field col s12 m12 l12">
                      <i class="material-icons prefix icon-24px">work</i>
									{!! Form::label('compOver','Company Overview :') !!}
											{!! Form::textarea('compOver',null, ['class'=>'materialize-textarea','style' =>'padding-top: 4.4rem']) !!}
										</div>
		
             	</div>

						</div>
        	</div>
         </div> 	<!-- Card Three Ends -->
					 
				
				 <div class="widget col s12 m12 l12 ">  <!-- Card Four Starts -->
          <div class="card lime darken-4 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Job Description & Selection Procedure</span>
              <hr>
              
              <div class="row">
								<div class="input-field col s12 m12 l12">
									<i class="material-icons prefix icon-24px">description</i>
									{!! Form::label('jobDesc','Job Description :') !!}
									{!! Form::textarea('jobDesc',null, ['class'=>'materialize-textarea','style' =>'padding-top: 4.4rem']) !!}
								</div>
								<p>Package Range Offered : </p>
								<!-- <div class="input-field col s6 m6 l6">
									<i class="material-icons prefix icon-24px">description</i>
									{!! Form::label('minPackage','Min :') !!}
									{!! Form::textarea('minPackage',null, ['class'=>'materialize-textarea','style' =>'padding-top: 4.4rem']) !!}
								</div>
								<div class="input-field col s6 m6 l6">
									<i class="material-icons prefix icon-24px">description</i>
									{!! Form::label('maxPackage','Max :') !!}
									{!! Form::textarea('maxPackage',null, ['class'=>'materialize-textarea','style' =>'padding-top: 4.4rem']) !!}
								</div> -->
								
								<div class="input-field col s12 m12 l12">
									<i class="material-icons prefix icon-24px">format_list_numbered</i>
									{!! Form::label('selPro','Selection Procedure :') !!}
									{!! Form::textarea('selPro',null, ['class'=>'materialize-textarea','style' =>'padding-top: 4.4rem','placeholder'=>'Round One: Aptitude Test, Round Two: GD , Round Three: Interview']) !!}
								</div>
             	</div>

						</div>
        	</div>
         </div> 	<!-- Card Four Ends -->
					 
					 		 <div class="widget col s12 m12 l12 ">  <!-- Card Five Starts -->
          <div class="card brown lighten-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Elligible Branches</span>
              <hr>
              
              <div class="row white-text">
								
								<div>
									<p class="col s12 m12 l6 ">
										<input type="checkbox" name="CSEBE" id="CSEBE" value="CSEBE" <?php if(strpos($data['openFor'], 'CSEBE') !== false) echo "checked"; ?> />
										<label for="CSEBE" class="">Computer Science & Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="ITEBE" id="ITEBE" value="ITEBE" <?php if(strpos($data['openFor'], 'ITEBE') !== false) echo "checked"; ?> />
									<label for="ITEBE">Information Technology</label>
										</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="ECEBE" id="ECEBE" value="ECEBE" <?php if(strpos($data['openFor'], 'ECEBE') !== false) echo "checked"; ?> />
									<label for="ECEBE">Electronics & Communication Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="ECCBE" id="ECCBE" value="ECCBE" <?php if(strpos($data['openFor'], 'ECCBE') !== false) echo "checked"; ?> />
									<label for="ECCBE">Electronics & Computer Engg.</label>
										</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="EEEBE" id="EEEBE" value="EEEBE" <?php if(strpos($data['openFor'], 'EEEBE') !== false) echo "checked"; ?> />
									<label for="EEEBE">Electronics & Electrical Engg.</label>
									</p>

									<p class="col s12 m12 l6">
									<input type="checkbox" name="EELBE" id="EELBE" value="EELBE" <?php if(strpos($data['openFor'], 'EELBE') !== false) echo "checked"; ?> />
									<label for="EELBE">Electrical Engineering</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="BCTBE" id="BCTBE" value="BCTBE" <?php if(strpos($data['openFor'], 'BCTBE') !== false) echo "checked"; ?> />
									<label for="BCTBE">Building & Construction</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="CIVBE" id="CIVBE" value="CIVBE" <?php if(strpos($data['openFor'], 'CIVBE') !== false) echo "checked"; ?> />
									<label for="CIVBE">Civil Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="MECBE" id="MECBE" value="MECBE" <?php if(strpos($data['openFor'], 'MECBE') !== false) echo "checked"; ?> />
									<label for="MECBE">Mechanical Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="CHEBE" id="CHEBE" value="CHEBE" <?php if(strpos($data['openFor'], 'CHEBE') !== false) echo "checked"; ?> />
									<label for="CHEBE">Chemical Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="MINBE" id="MINBE" value="MINBE" <?php if(strpos($data['openFor'], 'MINBE') !== false) echo "checked"; ?> />
									<label for="MINBE">Mining Engg.</label>
									</p>
									
									<p class="col s12 m12 l6">
									<input type="checkbox" name="MCA" id="MCA" value="MCA" <?php if(strpos($data['openFor'], 'MCA') !== false) echo "checked"; ?> />
									<label for="MCA">Master of Computer Appln</label>
									</p>
							</div>
								
             	</div>

						</div>
        	</div>
         </div> 	<!-- Card Five Ends -->
		 		</div>
		 		<!--  First Row Ends -->
		 
		 		<div class="col s12 m9 l10"> <!-- cancel Row Starts -->
        		<div class="widget col s12 m12 l12 ">
          	<div class="card cyan accent-4 hoverable">
            <button class="btn waves-effect waves-light col s12" type="submit">Submit
              <i class="material-icons right">send</i>
            </button>
            </div>
          </div> <!-- cancel Card Ends -->
		 			</div>
		 					 </form>

		 		
</div> <!--- Row Ends -->
<style>
	label{
		color:#fff;
	}
</style>
@stop