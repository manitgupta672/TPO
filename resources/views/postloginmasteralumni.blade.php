<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MBM : ALUMNI PANEL</title>

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
			
    
    <script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
		<script type="text/javascript" src="/js/materialize.js"></script>
		<script type="text/javascript">
			 $(document).ready(function() {
					$('select').material_select();
			});		
		</script>
<!--
    @yield('datatables-stylesheet-and-js') So that these are included only in fellowStudents page 
    @yield('some-specialized-css-and-js')
-->
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
              <li class="teal lighten-1 textwhite"><a href="#!" class="textwhite">Jump To</a></li>
              <li><a href="/alumni/panel">Dashboard</a></li>
							<li><a href="/alumni/panel/students">Students</a></li>
              <li><a href="/alumni/panel/fellowAlumni">Fellow Alumni</a></li>
              <li><a href="/alumni/panel/news">News</a></li>
<!--              <li class=""><a href="#!">Calendar</a></li>-->
            </ul>

            <ul id="nav-mobile" class="right">
              <ul id="dropdown2" class="dropdown-content right">
                @if(auth()->guest())
                  @if(!Request::is('auth/login'))
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                  @endif
                  @if(!Request::is('auth/register'))
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                  @endif
                @else
                <li class="teal lighten-1 textwhite"><a href="" class="textwhite"><i class="tiny material-icons">perm_identity </i>{{ auth()->user()->name }}</a></li>
                @endif
                <li><a href=""><i class="tiny material-icons">insert_chart</i> Account Settings</a></li>
                <li><a href="/auth/logout"><i class="tiny material-icons">power_settings_new</i> Logout</a></li>
              </ul>
              @if(!auth()->guest())
              <li><a class="btn dropdown dropdown-button right col" href="" data-activates="dropdown2"><span class="hide-on-small-only ">{{ auth()->user()->name }} </span><i class="line-height mdi-navigation-arrow-drop-down-circle right"></i></a></li>
              @endif
            </ul>
          </div>
      </nav>
      <!-- Header Ends -->



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

<!--			Custom JS-->
					<script type="text/javascript" src="/js/customjs.js" ></script>
      <!--Import jQuery before materialize.js-->
      <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->
      
    </body>
  </html>