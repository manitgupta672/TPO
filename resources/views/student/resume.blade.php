@extends('app')
@section('content')
	<h2 style="text-align:center;">Fill Out Resume</h2>
	{!! Form::open(['method'=>'POST','url'=>'/student/panel/resume']) !!}
	{!! Form::model($data,['method'=>'POST','url'=>'/student/panel/resume']) !!}

		<!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->

		<div class="six columns offset-by-three">
			{!! Form::label('fatherName','Father\'s Name:') !!}
		  	<span class="fa fa-user"></span>
			{!! Form::text('fatherName',null,['class'=>'twelve columns','placeholder'=>'Father\'s Name']) !!}
		</div>

		<!-- <div class="two columns offset-by-two">
			{!! Form::label('date','Date Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			{!! Form::select('date',array('01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20', '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25', '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30', '31' => '31', ), '01'); !!}
		</div> -->
		<div class="two columns offset-by-two">
			{!! Form::label('date','Date Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			<select name="date">
			<?php
				for($i=01; $i<=31; $i++){
					echo "<option value=" . $i;
					if($data['date'] == $i){ echo " selected";}
					echo ">" . $i . "</option>";
				}
			?>
			</select>
			<!-- {!! Form::text('date',null, ['class'=>'twelve columns','placeholder'=>'02','maxlength'=>'2','minlength'=>'2']) !!} -->
		</div>
		<!-- <div class="two columns offset-by-two">
			{!! Form::label('month','Month Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			{!! Form::select('month',array('01' => 'January', '02' => 'February', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December'), '01'); !!}

		</div> -->
		<div class="two columns offset-by-two">
			{!! Form::label('month','Month Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			<select name="month">
			<?php
				for($i=01; $i<=12; $i++){
					echo "<option value=" . $i;
					if($data['month'] == $i){ echo " selected";}
					echo ">" . $i . "</option>";
				}
			?>
			</select>
			<!-- {!! Form::text('month',null, ['class'=>'twelve columns','placeholder'=>'02','maxlength'=>'2','minlength'=>'2']) !!} -->
		</div>

		<!-- <div class="two columns offset-by-two">
			{!! Form::label('year','Year Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			{!! Form::select('year', array('1990' => '1990', '1991' => '1991', '1992' => '1992', '1993' => '1993', '1994' => '1994', '1995' => '1995', '1996' => '1996', '1997' => '1997', '1998' => '1998', '1999' => '1999', '2000' => '2000', '2001' => '2001', '2002' => '2002', '2003' => '2003' ), '1990'); !!}
		</div> -->

		<div class="two columns offset-by-two">
			{!! Form::label('year','Year:') !!}
			<span class="fa fa-birthday-cake"></span>
			<select name="year">
			<?php
				for($i=1980; $i<2000; $i++){
					echo "<option value=" . $i;
					if($data['year'] == $i){ echo " selected";}
					echo ">" . $i . "</option>";
				}
			?>
			</select>
		</div>


		<!-- <div class="two columns offset-by-two">
			{!! Form::label('year','Year Of Birth:') !!}
			<span class="fa fa-birthday-cake"></span>
			{!! Form::text('year',null, ['class'=>'twelve columns','placeholder'=>'1990','maxlength'=>'4','minlength'=>'4']) !!}
		</div> -->



		<div class="six columns offset-by-three">
			{!! Form::label('mobile','Mobile :') !!}
			<span class="fa fa-mobile"></span>
			{!! Form::text('mobile',null, ['class'=>'twelve columns','placeholder'=>'Mobile Number','maxlength'=>'10','minlength'=>'10']) !!}
		</div>

		<div class="two columns offset-by-two">
			{!! Form::label('gender','Gender:') !!}
			<span class="fa fa-birthday-cake"></span>
			<select name="gender">
				<option value="Male" <?php if($data['gender'] == 'Male'){ echo "selected";} ?>>Male</option>
				<option value="Female" <?php if($data['gender'] == 'Female'){ echo "selected";} ?>>Female</option>
			</select>	
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('address','Address') !!}
			<span class="fa fa-home"></span>
			{!! Form::textarea('address',null, ['class'=>'twelve columns','placeholder'=>'Address']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('city','Hometown') !!}
			<span class="fa fa-map"></span>
			{!! Form::text('city',null, ['class'=>'twelve columns','placeholder'=>'Jodhpur']) !!}
		</div>
	
		<div class="six columns offset-by-three">
			{!! Form::label('pinCode','Pincode :') !!}
			<span class="fa fa-map-pin"></span>
			{!! Form::text('pinCode',null, ['required patern'=>'[0-9]{6}', 'class'=>'twelve columns','placeholder'=>'342008']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('state','State :') !!}
			<span class="fa fa-map"></span>
			{!! Form::text('state',null, ['class'=>'twelve columns','placeholder'=>'Rajasthan']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('degree','Degree') !!}
			<span class="fa fa-book"></span>
			<select name="degree">
				<option value="B.E." <?php if($data['degree']=='B.E.') echo " selected";?>>B.E.</option>
				<option value="M.C.A." <?php if($data['degree']=='M.C.A.') echo " selected";?>>M.C.A.</option>
				<option value="M.E." <?php if($data['degree']=='M.E.') echo " selected";?>>M.E.</option>
			</select>
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('branch','Branch :') !!}
			<span class="fa fa-file"></span>
			<select name="branch">
				<option value="CSE" <?php if($data['degree']=='CSE') echo " selected";?>>Computer Science And Engineering</option>
				<option value="ITE" <?php if($data['degree']=='ITE') echo " selected";?>>Information Technology</option>
				<option value="ECE" <?php if($data['degree']=='ECE') echo " selected";?>>ELectronics And Communication Engineering</option>
				<option value="EEE" <?php if($data['degree']=='EEE') echo " selected";?>>Electrical And Electronics Engineering</option>
				<option value="ECC" <?php if($data['degree']=='ECC') echo " selected";?>>Electronics And Computer Engineering</option>
				<option value="EEL" <?php if($data['degree']=='EEL') echo " selected";?>>Electrical Engineering</option>
				<option value="CIV" <?php if($data['degree']=='CIV') echo " selected";?>>Civil Engineering</option>
				<option value="BCT" <?php if($data['degree']=='BCT') echo " selected";?>>Building And Construction Engineering</option>
				<option value="CHE" <?php if($data['degree']=='CHE') echo " selected";?>>Chemical Engineering</option>
				<option value="MEC" <?php if($data['degree']=='MEC') echo " selected";?>>Mechanical Engineering</option>
				<option value="MIN" <?php if($data['degree']=='MIN') echo " selected";?>>Mining Engineering</option>
			</select>
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('currentSem','Current Semester') !!}
			<span class="fa fa-hand-o-up"></span>
			<select name="currentSem">
			<?php
				for($i=1; $i<=8; $i++){
					echo "<option value=" . $i;
					if($data['currentSem'] == $i){ echo " selected";}
					echo ">" . $i . "</option>";
				}
			?>
			</select>
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('facultyNo','Faculty No:') !!}
			<span class="fa fa-caret-right"></span>
			{!! Form::text('facultyNo',null, ['required pattern' =>'[0-9]{2}/[0-9]{5}','class'=>'twelve columns','placeholder'=>'12/18390','minlength'=>'8','maxlength'=>'8']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('enrollmentNo','Enrollment No:') !!}
			<span class="fa fa-caret-right"></span>
			{!! Form::text('enrollmentNo',null, ['required pattern' =>'[0-9]{2}/[0-9]{5}','class'=>'twelve columns','placeholder'=>'12/15399','minlength'=>'8','maxlength'=>'8']) !!}
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('board10','10th Board:') !!}
			<span class="fa fa-university"></span>
			<select name="board10">
				<option value="CBSE" <?php if($data['board10']=='CBSE') echo " selected";?>>CBSE</option>
				<option value="RBSE" <?php if($data['board10']=='RBSE') echo " selected";?>>RBSE</option>
				<option value="Other" <?php if($data['board10']=='Other') echo " selected";?>>Other</option>
			</select>
		</div>

		<div class="six columns offset-by-three">
			{!! Form::label('board10Percent','10th Board Percentage ') !!}
			<span class="fa fa-check-circle-o"></span>
			{!! Form::text('board10Percent',null, ['class'=>'twelve columns','placeholder'=>'95% or CGPA']) !!}
		</div>

		Diploma<input id="isDiploma" type="radio" name="isDiploma" value="1" <?php if($data['isDiploma']==1) echo "checked='checked'";?>>
		12th<input id="istwelfth" type="radio" name="isDiploma" value="0" <?php if($data['isDiploma']==0) echo "checked='checked'";?>>
		
		<script type="text/javascript">
			$(document).ready(function(){
				if(document.getElementById('isDiploma').checked){
					$('.forbe').hide();
					$('.fordiploma').show();
				} else {
					$('.forbe').show();
					$('.fordiploma').hide();
				}
				
				$('input[type="radio"]').click(function(){
					if($(this).attr('id')=='isDiploma'){
						$('.forbe').hide();
						$('.fordiploma').show();
					} else {
						$('.forbe').show();
						$('.fordiploma').hide();
					}
				});
			});
		</script>

		<div class="six columns offset-by-three">
			{!! Form::label('board12','12th Board:',['id'=>'lbl','class'=>'forbe']) !!}
			<span class="fa fa-university forbe"></span>
			<select name="board12" class="forbe">
				<option value="CBSE" <?php if($data['board12']=='CBSE') echo " selected";?>>CBSE</option>
				<option value="RBSE" <?php if($data['board12']=='RBSE') echo " selected";?>>RBSE</option>
				<option value="Other" <?php if($data['board12']=='Other') echo " selected";?>>Other</option>
			</select>
		</div>
<!-- for diploma Candidates -->
		<div class="six columns offset-by-three">
			{!! Form::label('diplomaCollege','Diploma College:',['class'=>'fordiploma']) !!}
			<span class="fa fa-check-circle-o fordiploma"></span>
			{!! Form::text('diplomaCollege',null, ['class'=>'twelve columns fordiploma','placeholder'=>'Lachoo Memorial College, Jodhpur']) !!}
		</div>
<!-- Diploma Candidates ends -->
		<div class="six columns offset-by-three">
			{!! Form::label('board12Percent','12th Board Percentage:',['class'=>'forbe']) !!}
			{!! Form::label('board12Percent','Diploma Percentage:',['class'=>'fordiploma']) !!}
			<span class="fa fa-check-circle-o fordiploma"></span>
			{!! Form::text('board12Percent',null, ['class'=>'twelve columns','placeholder'=>'95%']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem1','Sem 1 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem1',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 1st Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem1MM','Sem 1 Max Marks:') !!}
			<span class="fa  fa-arrow-circle-up"></span>
			{!! Form::text('sem1MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 1st Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem1kt','Sem 1 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem1kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		

		<div class="six columns offset-by-three">
			{!! Form::label('sem2','Sem 2 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem2',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 2nd Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem2MM','Sem 2 Max Marks:') !!}
			<span class="fa  fa-arrow-circle-up"></span>
			{!! Form::text('sem2MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 2nd Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem2kt','Sem 2 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem2kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem3','Sem 3 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem3',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 3rd Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem3MM','Sem 3 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem3MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 3rd Sem']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem3kt','Sem 3 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem3kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem4','Sem 4 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem4',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 4th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem4MM','Sem 4 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem4MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 4th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem4kt','Sem 4 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem4kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>				
		<div class="six columns offset-by-three">
			{!! Form::label('sem5','Sem 5 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem5',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 5th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem5MM','Sem 5 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem5MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 5th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem5kt','Sem 5 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem5kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem6','Sem 6 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem6',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 6th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem6MM','Sem 6 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem6MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 6th Sem']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem6kt','Sem 6 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem6kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem7','Sem 7 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem7',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 7th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem7MM','Sem 7 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem7MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 7th Sem']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem7kt','Sem 7 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem7kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem8','Sem 8 Marks:') !!}
			<span class="fa fa-external-link-square"></span>
			{!! Form::text('sem8',null, ['class'=>'twelve columns','placeholder'=>'Marks Obtained in 8th Sem']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('sem8MM','Sem 8 Max Marks:') !!}
			<span class="fa fa-arrow-circle-up"></span>
			{!! Form::text('sem8MM',null, ['class'=>'twelve columns','placeholder'=>'Max Marks in 8th Sem']) !!}
		</div>		
		<div class="six columns offset-by-three">
			{!! Form::label('sem8kt','Sem 8 Current Backlog:') !!}
			<span class="fa  fa-asterisk"></span>
			{!! Form::text('sem8kt',null, ['class'=>'twelve columns','placeholder'=>'800']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('proj1','Major Project 1:') !!}
			<span class="fa fa-tachometer"></span>
			{!! Form::textarea('proj1',null, ['class'=>'twelve columns','placeholder'=>'Shopping Cart based on Servlets and JSP']) !!}
		</div>	
		<div class="six columns offset-by-three">
			{!! Form::label('proj2','Major Project 2:') !!}
			<span class="fa fa-flask"></span>
			{!! Form::textarea('proj2',null, ['class'=>'twelve columns','placeholder'=>'Projector Bot in ESRC']) !!}
		</div>
		<div class="six columns offset-by-three">
			{!! Form::label('extraCurricular','Extra Curriculum :') !!}
			<span class="fa fa-life-ring"></span>
			{!! Form::textarea('extraCurricular',null, ['class'=>'twelve columns','placeholder'=>'Lead Pianist in College Band!']) !!}
		</div>

		<div class="six columns offset-by-three">			

		</div>

		<div class="six columns offset-by-three">
			{!! Form::submit('Submit',['class'=>'twelve columns btn button-primary']) !!}
		</div>
			<a href="/company/panel" class="button six columns offset-by-three">Cancel</a>

	{!! Form::close() !!}
@stop