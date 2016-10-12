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
    <link rel="stylesheet" type="text/css" href={{ URL::asset('/css/materialize-icon.css') }}>
    <!-- <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
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
                
                <li class="teal lighten-1 textwhite"><a href="javascript:void(0);" class="textwhite"><i class="tiny material-icons">perm_identity </i>{{ auth()->user()->name }}</a></li>
                <li><a href="/{{Request::segment(1)}}/panel/settings"><i class="tiny material-icons">insert_chart</i> Account Settings</a></li>
                <li><a href="/auth/logout" class="waves-effect"><i class="tiny material-icons">power_settings_new</i> Logout</a></li>
              </ul>
              <li><a class="btn dropdown dropdown-button right col waves-effect" href="" data-activates="dropdown2"><span class="hide-on-small-only ">{{ auth()->user()->name }} </span><i class="line-height mdi-navigation-arrow-drop-down-circle right"></i></a></li>
            </ul>
						
          </div>
      </nav>
      <!-- Header Ends -->

					 
			<div class="row " style="margin-bottom:0;">
        
<div class="row " style="margin-bottom:0;">
        
          <!-- Left Pane -->
					
<!--          	Student -->
						@if( Auth::user()->entity == 1 )
	
						<div class=" col s4 m3 l2 teal darken-2 card-panel hoverable textwhite hide-on-small-only left-pane " >

              <div class="collection left-pane-collection teal darken-2">
                <a href="/student/panel" class="collection-item waves-effect waves-teal dashboard"><i class="small material-icons">dashboard</i>Dashboard</a>
                <a href="/student/panel/news" class="collection-item waves-effect waves-teal news"><i class="small material-icons">notifications</i>News</a>                
                <a href="/student/panel/fellowStudents" class="collection-item waves-effect waves-teal fellowStudents"><i class="small material-icons">people_outline</i>Fellow Mates</a>
                <a href="/student/panel/resume" class="collection-item waves-effect waves-teal resume"><i class="small material-icons">description</i>Resume</a>
               <a id="" href="/student/panel/placements" class="collection-item waves-effect waves-teal placements"><i class="small material-icons">business_center</i>Companies</a>

              </div>

            </div>
	
	<!--          	Company -->
						@elseif( Auth::user()->entity == 2 )
	
						<div class=" col s4 m3 l2 teal darken-2 card-panel hoverable textwhite hide-on-small-only left-pane " >

              <div class="collection left-pane-collection teal darken-2">
                <a href="/company/panel" class="collection-item waves-effect waves-teal dashboard"><i class="small material-icons">dashboard</i>Dashboard</a>
                <a href="/company/panel/jaf" class="collection-item waves-effect waves-teal jaf"><i class="small material-icons">description</i>Job Application Form</a>
                <a href="/company/panel/branches" class="collection-item waves-effect waves-teal branches"><i class="small material-icons">people_outline</i>Your Branches</a>
                <a href="/company/panel/news" class="collection-item waves-effect waves-teal news"><i class="small material-icons">notifications</i>News</a>                
              </div>

            </div>
	
<!--						 Alumni	-->
						@elseif( Auth::user()->entity == 3 )
						  <div class=" col s4 m3 l2 teal darken-2 card-panel hoverable textwhite hide-on-small-only left-pane " >

              <div class="collection left-pane-collection teal darken-2">
                <a href="/alumni/panel" class="collection-item waves-effect waves-teal dashboard"><i class="small material-icons">dashboard</i>Dashboard</a>
                <a href="/alumni/panel/currentProfessors" class="collection-item waves-effect waves-teal currentProfessors"><i class="small material-icons">gavel</i>Current Professors</a>
								<a href="/alumni/panel/currentBranches" class="collection-item waves-effect waves-teal currentBranches"><i class="small material-icons">book</i>Current Branches</a>
                <a href="/alumni/panel/fellowAlumni" class="collection-item waves-effect waves-teal fellowAlumni"><i class="small material-icons">people_outline</i>Fellow Alumni</a>
                <a href="/alumni/panel/news" class="collection-item waves-effect waves-teal news"><i class="small material-icons">notifications</i>News</a>
								<a href="/alumni/panel/placements" class="collection-item waves-effect waves-teal placements"><i class="small material-icons">business_center</i>Companies</a>
              </div>

            </div>
	
	<!--						 Professor	-->
						@elseif( Auth::user()->entity == 4 )
						  <div class=" col s4 m3 l2 teal darken-2 card-panel hoverable textwhite hide-on-small-only left-pane " >

              <div class="collection left-pane-collection teal darken-2">
                <a id="" href="/professor/panel" class="collection-item waves-effect waves-teal dashboard"><i class="small material-icons">dashboard</i>Dashboard</a>
                <a id="" href="/professor/panel/students" class="collection-item waves-effect waves-teal students"><i class="small material-icons">school</i>Students</a>
                <a id="" href="/professor/panel/fellowProfessors" class="collection-item waves-effect waves-teal fellowProfessors"><i class="small material-icons">people_outline</i>Fellow Professors</a>
                <a id="" href="/professor/panel/news" class="collection-item waves-effect waves-teal news"><i class="small material-icons">notifications</i>News</a>
								<a id="" href="/professor/panel/placements" class="collection-item waves-effect waves-teal placements"><i class="small material-icons">business_center</i>Companies</a>
								<a href="/professor/panel/alumni" class="collection-item waves-effect waves-teal alumni"><i class="small material-icons">people_outline</i>Alumni</a>
              </div>

            </div>
						@else
						<p></p>
						@endif
						
          <!-- Left Pane Ends -->
	 
<!-- Main Content -->
            
            <!-- BreadCrumbs -->
            <nav class="col s12 m9 l10 teal lighten-1 z-depth-2">
              <div class="nav-wrapper ">
                <div class="col">
                  <a href="/{{Request::segment(1)}}/panel" class="breadcrumb">Home</a>
									@if(Request::segment(3))
                  <a href="/{{Request::segment(1)}}/panel/{{Request::segment(3)}}" class="breadcrumb"><?php echo ucfirst(Request::segment(3)); ?></a>
									@endif
									@if(Request::segment(4))
                  <a href="/{{Request::segment(1)}}/panel/{{Request::segment(3)}}/{{Request::segment(4)}}" class="breadcrumb"><?php echo ucfirst(Request::segment(4)); ?></a>
									@endif
										@if(Request::segment(5))
                  <a href="/{{Request::segment(1)}}/panel/{{Request::segment(3)}}/{{Request::segment(4)}}/{{Request::segment(5)}}" class="breadcrumb"><?php echo ucfirst(Request::segment(5)); ?></a>
									@endif
                </div>
              </div>
            </nav>
            <!-- BreadCrumbs End -->

@if(session()->has('error_msg'))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
    });
  </script>
@endif

			@yield('content')




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

					<?php 
						$active = Request::segment(3) ;
						if(empty($active))
						$active = "dashboard";
					?>
					<p id="activeHidden" style="display:none; visibility:hidden;"><?php echo $active?></p>
					<script>
							var active ="." + $('#activeHidden').html();
							$(active).addClass('active');
					</script>

    </body>
  </html>





























