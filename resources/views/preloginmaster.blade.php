<!DOCTYPE html>
<html>
<head>
    <title>M.B.M Jodhpur</title>
    <link rel="shortcut icon" href="/img/mbm.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
    <link href="/css/materialize-icon.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/materialize.css">
    <link rel="stylesheet" type="text/css" href="/css/menu.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/slider.css">
    <link rel="stylesheet" type="text/css" href="/css/gototop.css">

    <script type="text/javascript" src="/js/jquery.js"></script>
    
          <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/materialize.js"></script>
    <script type="text/javascript" src="/js/headtacular.min.js"></script>
    <script src="/js/scrollSpeed.js"></script>
    <script type="text/javascript">
    (function($){
        $(document).ready(function() {
            $('.cssmenu').headtacular({ scrollPoint: 10 }); 
            jQuery.scrollSpeed(100, 800);    
            $('select').material_select();
        });
    })(jQuery);
    </script>
</head>
<body >  
    <!-- Menu  -->  
    <div class="cssmenu cssmenu-desktop">
        <ul>
          
           <a class="logo" href="http://www.mbm.ac.in"><img src="/img/logo.png" width="40" height="40"></a>
           <li style="margin-left:100px;" id='home' ><a href='/'>Home</a></li>
           <li id="about"><a href='/about'>About MBM</a></li>
           <li id="departments"><a href='/departments'>Courses</a></li>
           <li id="procedure"><a href='/procedure'>Procedure</a></li>
           <li id="contact"><a href='/contact'>Contact</a></li>
            @if(auth()->guest()) 
           <li id="login"><a href="/auth/login">Sign In</a></li>
           <li id="register"><a href="/auth/register">Register</a></li>
            @else 
              @if(auth()->user()->entity==1)
              <li><a href="{{ url('/student/panel') }}">My Account</a></li>
              @elseif(auth()->user()->entity==2)
                <li><a href="{{ url('/company/panel') }}">My Account</a></li>
              @elseif(auth()->user()->entity==3)
                <li><a href="{{ url('/alumni/panel') }}">My Account</a></li>
              @elseif(auth()->user()->entity==4)
                <li><a href="{{ url('/professor/panel') }}">My Account</a></li>
              @elseif(auth()->user()->entity==5)
                <li><a href="{{ url('/admin/panel') }}">My Account</a></li>
              @endif
            @endif 
        </ul>
    </div>

     <div class="cssmenu cssmenu-mobile">
        <ul>
           <a class="logo right" href="http://www.mbm.ac.in"><img src="/img/logo.png" width="40" height="40"></a>
           <li style="float:right;" class='active'><a href='#!' id="cssmenu-dropdown-btn"><i class="fa fa-list"></i></a></li>
        </ul>
     </div>
     <ul id="cssmenu-dropdown-content" class="right">
       <li><a href='/about'>About MBM</a></li>
       <li><a href='/departments'>Courses</a></li>
       <li><a href='/procedure'>Procedure</a></li>
       <li><a href='/contact'>Contact</a></li>
        @if(auth()->guest()) 
       <li><a href="/auth/login">Sign In</a></li>
       <li><a href="/auth/register">Register</a></li>
        @else 
       <li><a href="{{ url('/' . auth()->user()->entity . '/panel') }}">My Account</a></li>
        @endif 
  </ul>
     <script type="text/javascript">
        $(document).ready(function(){
           $("#cssmenu-dropdown-btn").click(function(){
              $("#cssmenu-dropdown-content").slideToggle("fast");
              return false;
            });
        });
      </script>
      <!--      Menu Ends-->
  
      @yield('content')
  
  
      <!-- Goto Top -->
      <script type="text/javascript" src="/js/gototop.js"></script>
      <a href="#0" class="cd-top" style="z-index:200;">Top</a>

      <!-- Footer -->
      <div class="foot"> 
          <br><br>
          <div class="row"> 
              <div class="s12 m4 l4 col offset-s1 center-align footer-element" style="min-height: 161px;" >
                  <div class="col s12 center-align footer-element" >
                      <span style="font-size:1.2em;">Developed By :</span>  <a href="#">Manit Gupta & Vedant Jain</a>

                  </div>
                  <a href="https://www.facebook.com/mbmwebbed" target="_blank"><img src="/img/webbed.png" width="50%"></a>
                  <div class="footer-social-icons row" style="margin-bottom:0;">
                      <ul class="social-icons col push-l4 push-m3 push-s4">
                          <li class="s1 col"><a href="https://www.facebook.com/mbmwebbed" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
                          <li class="s1 col"><a href="https://twitter.com/mbmtpo" class="social-icon"> <i class="fa fa-twitter"></i></a></li>
                          <li class="s1 col"><a href="https://www.youtube.com/user/tpocellmbm" class="social-icon"> <i class="fa fa-youtube"></i></a></li>
                          <li class="s1 col"><a href="https://plus.google.com/109185063954090001259" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
                      </ul>
                  </div>
              </div>

              <div class="s12 m4 l4 col center-align footer-element">
                 <div class="col s12 center-align footer-element" >
                    <span style="font-size:1.2em;">About Us</span>
                 </div>
                  <ul>
                      <li><a href="http://mbm.ac.in">Home</a></li>
                      <li><a href="http://mbm.ac.in/contact">TPO Team</a></li>
                      <li><a href="http://mbm.ac.in/faq">FAQs</a></li>
                      <li><a href="http://en.wikipedia.org/wiki/Jodhpur">About Jodhpur</a></li>
                  </ul>
              </div>

              <div class="s12 m4 l4 col center-align footer-element">
                  <div class="col s12 center-align footer-element" >
                    <span style="font-size:1.2em;">Portals</span>
                  </div>
                  <ul>
                      <li><a href="https://en.wikipedia.org/wiki/MBM_Engineering_College">M.B.M Wiki</a></li>
                      <li><a href="#">Gallery</a></li>
                      <li><a href="http://jnvu.edu.in">Faculty</a></li>
                      <li><a href="http://jnvuonline.in">JNVU Exam Portal</a></li>
                  </ul>
              </div>
          </div>

     <!-- <div class="row offset-s2 col s8" style="border-bottom:1px solid #fff;"></div><br> -->
    <p style="text-align:center; font-size:14px; margin-bottom:0;"> <span class="fa fa-copyright"></span> 2015 MBM Site All Rights Reserved </p>
</div>
  
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

<script type="text/javascript">
            var uri1 = '{{ Request::segment(1)}}' ;
            if(uri1.length != 0)
              $('#' + uri1).addClass('active');
            else 
              $('#home').addClass('active');
            var uri2 = '{{ Request::segment(2)}}' ;
            if(uri2 == 'login')
              $('#login').addClass('active');
            if(uri2 == 'register')
              $('#register').addClass('active');
          </script>

</body>
</html>