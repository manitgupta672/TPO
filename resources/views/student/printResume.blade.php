<?php
function branch_name($branch)
{
	switch ($branch) {
        case 'ARC':
            $branch_fname = "Architecture and Town Planning";
            break;
        case "BCT":
            $branch_fname = "Building and Construction";
            break;
        case "CHE":
            $branch_fname = "Chemical Engineering";
            break;
        case "CIV":
            $branch_fname = "Civil Engineering";
            break;
        case "CSE":
            $branch_fname = "Computer Science and Engineering";
            break;
        case "ITE":
            $branch_fname = "Information Technology";
            break;
        case "EEL":
            $branch_fname = "Electrical Engineering";
            break;
        case "ECE":
            $branch_fname = "Electronics and Communication Engineeing";
            break;            
        case "EEE":
            $branch_fname = "Electronics and Electrical Engineering";
            break;
        case 'ECC':
            $branch_fname = "Electronics and Computers Engineering";
            break;
        case "MEC":
            $branch_fname = "Mechanical Engineering";
            break;
        case "MIN":
            $branch_fname = "Mining Engineering";
            break;
        case "PIE":
            $branch_fname = "Production and Industrial Engineering";
            break;
        case "STR":
            $branch_fname = "Structural Engineering";
            break;
        case "MCA":
            $branch_fname = "Master of Computer Application";
            break;
        default:
            $branch_fname = 0;
            break;
    }
    return $branch_fname;
}
?>


<?php
$name = $resume['name'];
$fatherName = $resume['fatherName'];
$dob = $resume['dob'];
$email = $resume['email'];
$mobile = $resume['mobile'];
$gender = $resume['gender'];
$address = $resume['address'];
$city = $resume['city'];
$pinCode = $resume['pinCode'];
$state = $resume['state'];
$degree = $resume['degree'];
$currentSem = $resume['currentSem'];
$branch = branch_name($resume['branch']);
$facultyNo = $resume['facultyNo'];
$enrollmentNo = $resume['enrollmentNo'];
$board10 = $resume['board10'];
$board12 = $resume['board12'];
$board10Percent = $resume['board10Percent'];
$board12Percent = $resume['board12Percent'];
// $hsc_ed = $resume['hsc_ed'];
//$d_institute = $resume['d_institute'];
//$d_percent = $resume['d_percent'];
//$d_ed = $resume['d_ed'];
$sem1 = $resume['sem1'];
$sem1MM = $resume['sem1MM'];
$sem1Percent = $resume['sem1Percent'];
$sem1_kt = $resume['sem1_kt'];
$sem2 = $resume['sem2'];
$sem2MM = $resume['sem2MM'];
$sem2Percent = $resume['sem2Percent'];
$sem2_kt = $resume['sem2_kt'];
$sem3 = $resume['sem3'];
$sem3MM = $resume['sem3MM'];
$sem3Percent = $resume['sem3Percent'];
$sem3_kt = $resume['sem3_kt'];
$sem4 = $resume['sem4'];
$sem4MM = $resume['sem4MM'];
$sem4Percent = $resume['sem4Percent'];
$sem4_kt = $resume['sem4_kt'];
$sem5 = $resume['sem5'];
$sem5MM = $resume['sem5MM'];
$sem5Percent = $resume['sem5Percent'];
$sem5_kt = $resume['sem5_kt'];
$sem6 = $resume['sem6'];
$sem6MM = $resume['sem6MM'];
$sem6Percent = $resume['sem6Percent'];
$sem6_kt = $resume['sem6_kt'];
$sem7 = $resume['sem7'];
$sem7MM = $resume['sem7MM'];
$sem7Percent = $resume['sem7Percent'];
$sem7_kt = $resume['sem7_kt'];
$sem8 = $resume['sem8'];
$sem8MM = $resume['sem8MM'];
$sem8Percent = $resume['sem8Percent'];
$sem8_kt = $resume['sem8_kt'];
$aggregatePercent = $resume['aggregatePercent'];
$proj1 = $resume['proj1'];
$proj2 = $resume['proj2'];
$extraCurricular = $resume['extraCurricular'];
$objective = $resume['objective'];

?>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/mbm.ico" type="image/x-icon" />
		<title>MBM : <?php echo strtoupper(Request::segment(1)); ?> PANEL </title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <link rel="shortcut icon" href="img/mbm.ico">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href={{ URL::asset('/css/materialize.min.css') }}  media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('/css/customstyle.css') }}>
		<script type="text/javascript" src="{{ URL::asset('/js/jquery.js') }}"></script>
		<script type="text/javascript" src="/js/materialize.js"></script>
 </head>

    <body>
            
					<!-- Header Start -->
         <nav class="blue-grey darken-3 z-depth-3" style="border-radius:0 0 5px 5px;" >
          <div class="nav">
            <a href="" class="brand-logo valign" style="border-radius:50% 50%; margin:5px;"><img src="/img/logo.png"/></a>
            
            <ul class="hide-on-med-and-up col m12 l12 s12">
              <li class="waves-effect waves-light dropdown-button" data-activates="dropdown3"><i class="medium material-icons">list</i></li>
            </ul>
            <ul id="dropdown3" class="dropdown-content col s12 m12 l12 ">
              <li class="teal lighten-1 textwhite"><a href="javascript:void(0);" class="textwhite">Jump To</a></li>
<!--           For All   -->
							<li><a href="/{{Request::segment(1)}}/panel">Dashboard</a></li>
              <li><a href="/{{Request::segment(1)}}/panel/news">News</a></li>
							
<!--					For Student		-->
							@if(Auth::user()->entity == 1)
              <li><a href="/student/panel/fellowStudents">Fellow Mates</a></li>
							<li><a href="/student/panel/resume">Resume</a></li>
							@endif

<!--					For all except Company		-->
							@if(Auth::user()->entity != 2)
							<li><a href="/{{Request::segment(1)}}/panel/placements">Companies</a></li>
							@endif
							
<!--					Company-->
							@if(Auth::user()->entity == 2)
							<li><a href="/company/panel/jaf">Job Application Form</a></li>
							<li><a href="/company/panel/myStudents">Students For Your Company</a></li>
							@endif
							
<!--					Alumni-->
							@if(Auth::user()->entity == 3)
							<li><a href="/alumni/panel/currentBranches">Students</a></li>
              <li><a href="/alumni/panel/fellowAlumni">Fellow Alumni</a></li>
							@endif
							
<!--							Professor-->
							@if(Auth::user()->entity==4)
							<li><a href="/professor/panel/currentBranches">Students</a></li>
							<li><a href="/professor/panel/alumni">Alumni</a></li>
							@endif
            </ul>

            <ul id="nav-mobile" class="right">
              <ul id="dropdown2" class="dropdown-content right">
                
                <li class="teal lighten-1 textwhite"><a href="" class="textwhite"><i class="tiny material-icons">perm_identity </i>{{ auth()->user()->name }}</a></li>
                <li><a href="/{{Request::segment(1)}}/panel/settings"><i class="tiny material-icons">insert_chart</i> Account Settings</a></li>
                <li><a href="/auth/logout"><i class="tiny material-icons">power_settings_new</i> Logout</a></li>
              </ul>
              <li><a class="btn dropdown dropdown-button right col" href="" data-activates="dropdown2"><span class="hide-on-small-only ">{{ auth()->user()->name }} </span><i class="line-height mdi-navigation-arrow-drop-down-circle right"></i></a></li>
            </ul>
						
          </div>
      </nav>
      <!-- Header Ends -->

					 
				<div class="row " style="margin-bottom:0;">
				<div class="row " style="margin-bottom:0;">
        
	
	

<style>
		body,html{
			background-color:#fff;
		}
		td{
			padding:5px 5px;
		}
	</style>
	<div class="row" style="background-color:#fff;">
		
		<div class="row">
			<br>
			<div class="col s12">
				<a href="/student/panel" class="col s12 m3 l2 offset-l2 btn">Dashboard</a>
				<a href="javascript:printMe();" class="col s12 m3 l2 push-m1 push-l1 btn">Print</a>
				<a href="/student/panel/resume" class="col s12 l2 m3 push-m3 push-l2 btn">Edit</a>
			</div>		
		</div>
		
		<br>
		<div class="col s8 push-s2 blue-grey lighten-5 z-depth-2">
			<br>
			<div class="row"  style="border:1px dashed black;" style="margin-bottom: 2px;">
			<div class="col l6 s12 m6">
				<div class="col s12 center-align " style="font-size:3em; min-height:130px; padding-top:50px;">
						{{$name}}
				</div>
				<div class="col s12 center-align ">
					{{$currentSem}}<sup>th</sup> Semester, {{$branch}},<br>
					MBM Engineering College, Jodhpur.
				</div>
			</div>
			<div class="col l6 s12 m6">
				<br>
				<table class="bordered textwhite teal lighten-2" >
					<tbody>
						<tr>
							<td><i class="tiny material-icons">email</i> Email</td><td>: {{$email}}</td>
						</tr>
						<tr>
							<td><i class="tiny material-icons" >local_phone</i> Mobile</td><td>: +91 : {{$mobile}}</td>
						</tr>
						<tr>
							<td><i class="tiny material-icons">face</i> Father's Name</td><td>: {{$fatherName}}</td>
						</tr>
						<tr>
							<td><i class="tiny material-icons">business_center</i> Gender</td><td>: {{$gender}}</td>
						</tr>
						<tr>
							<td><i class="tiny material-icons">cake</i> Date of Birth</td><td>: {{$dob}}</td>
						</tr>
						<tr>
							<td><i class="tiny material-icons">pin_drop</i> Address</td><td>: {{$address}}</td>
						</tr>
					</tbody>
				 </table>
				</div>
				<div class="row col s11">
					<br>
					<strong style="font-size:1.4em;">Objective : </strong> 
					<i class="tiny material-icons">format_quote</i> 
					{{$objective}} 
					<i class="tiny material-icons">format_quote</i>
				</div>
				
				<div class="row col s10 push-s1" style="border:1px dashed #4db6ac;"></div>
				<div class="row">
					<div class="col s12 l3 left-align">
						Academics :
					</div>
					<div class="col s12 l8">
						 <table class="">
                <thead>
                  <tr>
										<th data-field="exam">Examination</th>
										<th data-field="board">Board</th>
										<th data-field="percent">Percentage</th>
                  </tr>
                </thead>
                <tbody>
									<tr><td>Class X</td><td>{{$board10}}</td><td>{{$board10Percent}}</td></tr>
									<tr><td>Class XII</td><td>{{$board12}}</td><td>{{$board12Percent}}</td></tr>
							 </tbody>
						</table>
						<table>
 							<thead>
								<tr>
									<th data-field="Semester">Semester</th>
									<th data-field="Marks">Marks</th>
									<th data-field="percent">Percentage</th>
									<th data-field="atkt">AT/KT</th>
								</tr>
              </thead>						
							<tr><td>I </td><td>{{$sem1}}/{{$sem1MM}}</td><td>{{$sem1Percent}}%</td><td>{{$sem1_kt}}</td></tr>
							<tr><td>II</td><td>{{$sem2}}/{{$sem2MM}}</td><td>{{$sem2Percent}}%</td><td>{{$sem2_kt}}</td></tr>
							<tr><td>III</td><td>{{$sem3}}/{{$sem3MM}}</td><td>{{$sem3Percent}}%</td><td>{{$sem3_kt}}</td></tr>
							<tr><td>IV</td><td>{{$sem4}}/{{$sem4MM}}</td><td>{{$sem4Percent}}%</td><td>{{$sem4_kt}}</td></tr>
							<tr><td>V</td><td>{{$sem5}}/{{$sem5MM}}</td><td>{{$sem5Percent}}%</td><td>{{$sem5_kt}}</td></tr>
							<tr><td>VI</td><td>{{$sem6}}/{{$sem6MM}}</td><td>{{$sem6Percent}}%</td><td>{{$sem6_kt}}</td></tr>
							<tr><td>VII</td><td>{{$sem7}}/{{$sem7MM}}</td><td>{{$sem7Percent}}%</td><td>{{$sem7_kt}}</td></tr>
							<tr><td>VIII</td><td>{{$sem8}}/{{$sem8MM}}</td><td>{{$sem8Percent}}%</td><td>{{$sem8_kt}}</td></tr>
					</table>
					</div>
				</div>
				
				<div class="row col s10 push-s1" style="border-bottom:1px dashed #4db6ac;"></div>
				
				<div class="row">
					<div class="col s12 l3 left-align">
						Second Year Project :
					</div>
					<div class="col s12 l8">
						{{ $proj1 }}
					</div>
				</div>
				
				<div class="row col s10 push-s1" style="border-bottom:1px dashed #4db6ac;"></div>
				
				<div class="row">
					<div class="col s12 l3 left-align">
						Third Year Project :
					</div>
					<div class="col s12 l8">
						{{ $proj2 }}
					</div>
				</div>
				
				<div class="row col s10 push-s1" style="border-bottom:1px dashed #4db6ac;"></div>
				
				<div class="row">
					<div class="col s12 l3 left-align">
						Extra-Curricular :
					</div>
					<div class="col s12 l8">
						{{ $extraCurricular }}
					</div>
				</div>
				
				
			</div>
			<div class="row center-align" style="margin-bottom:10px;">
				<i class="tiny material-icons">chevron_right</i> {{$name}} | +91 - {{$mobile}} | {{$email}} <i class="tiny material-icons">chevron_left</i> 

			</div>
		</div>
	</div>
	
	<div>
	<h4>Applied in</h4>
		@if(!empty($allApplieds))
		<ol>
			@foreach($allApplieds as $applied)
			<li>{{$applied->name}}</li>
				 <p>cleared till level {{$applied->level}}</p>
				 <p>falls in slab {{$applied->slab}}</p>
			@endforeach
		</ol>
		@else
			<p>Did not apply in any of the companies</p>
		@endif

	

	<h4>Placed in</h4>
		@if(!empty($placedIn))	
			<ol>
				@foreach($placedIn as $placed)
				<li>{{$placed->name}}</li>
				<p>falls in slab {{$placed->slab}}</p>
				@endforeach
			</ol>
		@else
			<p>Not placed in any company yet.</p>
		@endif
	</div>
	
	<script type="text/javascript">
		function printMe(){
			window.print();
		}
	</script>
					
					<!-- Footer Starts -->
      <div class="blue-grey darken-3 textwhite center-align"> Designed & Developed By : Manit Gupta & Vedant Jain </div>
      <!-- Footer Ends -->
			<!-- Lines background -->
	    	
        <canvas id="lines-canvas" style="position: fixed;
                      top: 0;
                      left: 0;
                      z-index: -20;"></canvas>
        <script src="/js/lines.min.js"></script>
        <script>
            // set canvas width and height based on the window
            var canvas = $('#lines-canvas');
            canvas.attr('height',$(window).height());
            canvas.attr('width',$(window).width());

            new lines().draw();
        </script>
        <!-- Lines End -->

      	
<!--	To be shifted to panel-->
        <script src="/js/counter.js"></script>
        <script src="/js/jquery.knob.modified.js"></script>
<!--	Till here-->

				<!--			Custom JS-->
				<script type="text/javascript" src="/js/customjs.js" ></script>

    </body>
  </html>


	
