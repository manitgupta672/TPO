@extends('preloginmaster')
@section('content')
	
<body > <!-- oncontextmenu="return false">  
    
    <!--   Sldier  -->
    <div id="slider">
        <figure id="figure" data-anim="la-anim-1" style="box-shadow: 0 0 10px rgba(0, 0, 0, 1); background-attachment: fixed;">
            <div class="dot"></div>
            <img src="img/001.jpg" alt="">
            <img src="img/002.jpg" alt="">
            <img src="img/003.jpg" alt="">
        </figure>
    </div>

    <!-- News -->
    <div id="nt-container" style="background-color:#3c3a48;">
        <i class="fa fa-arrow-up" id="nt-prev"></i>
        <ul id="nt">
          <li>Format of prescibed joining report... <a href="#">Read more...</a></li>
					<li>The Website is Designed under Webbed Club... <a href="#">Read more...</a></li>
					<li>Job announcement form is now available for recruiters... <a href="#">Read more...</a> </li>
					<li>Professors & Alumni are invited to Register... <a href="#">Read more...</a></li>
        </ul>
     <i class="fa fa-arrow-down" id="nt-next"></i>
   </div>

   <br><br> 

   <!-- About MBM -->
   <div class="row">
        <div class="push-s1 col s10" style="text-align:justify;">
                <p>Welcome to the Training and Placement Cell's Website of <strong>MBM Engineering College, Jodhpur .</strong>
        MBM Engineering College is one of the oldest engineering colleges in India. </p>

        <p>Established on 15th August 1951
        by the government of Rajasthan, the college boasts of its high academic & technical standards.</p>

        Considered as the pioneering Technical Institution of the State, it offers a gamut of courses both at PG and UG 
        level. The college is committed to providing its students with an education that combines rigorous academic study and 
        developing a far more ambitious, integrated and influential environment that will best serve the nation.
        </div>
   </div>

   <br>
   <!-- Dashed Line One -->
   <div class="offset-s2 col s8" style="border-bottom:1px solid #3c3a48;"></div>
    <br><br>
    <br>
     <!-- Dashed Line Two -->
    <!-- Student & Company Panel End-->

    <!-- Dean Message -->
    <div class="row">
        <div class="push-l1 col l10" >
                <div class="row center-align"><strong>Message From Dean</strong></div>
                <div class="col l2 s12 center-align">
                  <img alt="Dean" src="img/dean.jpg" class="facMsg">
                </div>
                <p class="col l10 s12"><br>The Training and Placement Cell works ceaselessly to provide smooth communication between companies and student.
                 Our students spend over 3 months in industry as part of their Practical training. In addition to doing internships in reputed companies across India our students also actively participate in research projects at IIT Jodhpur and other institutes of national repute. 
                 I extend you a heartly invitation to visit our campus for recruitment.
                </p>
                <br>
        </div>
    </div>
     <!-- Dean Message Ends -->

     <!-- And a dashed Line  -->
    <br>
    <div class="push-s3 col s6" style="border-bottom:1px dashed #3c3a48;"></div>
    <br><br>


    <!-- Tpo Head Message  -->
    <div class="row">
        <div class="push-l1 col l10">
                <div class="row center align"><strong>Message From TPO Head</strong></div>
                <div class="col l2 push-l10 s12 center-align">
                  <img alt="Dean" src="img/tpo_head.jpg" class="facMsg">
                </div>
                <p class="pull-l2 l10 col"><br>  The Training and Placement Cell works ceaselessly to provide smooth communication between companies and student.
                 Our students spend over 3 months in industry as part of their Practical training. In addition to doing internships in reputed companies across India our students also actively participate in research projects at IIT Jodhpur and other institutes of national repute. 
                 I extend you a heartly invitation to visit our campus for recruitment.
                </p>
                <br>
        </div>
    </div>
    <!-- Tpo Head Message Ends -->

    <br><br>
     <!-- Hr Line  -->
    <div class="offset-s2 col s8" style="border-bottom:1px solid #3c3a48;"></div>

<!-- Reach Us -->
<div class="center-align"><strong>Reach Us</strong></div>
	
<!-- News Ticker -->
<script src="js/nt.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var nt = $('#nt').newsTicker({
          row_height: 50,
          max_rows: 2,
          duration: 4000,
          prevButton: $('#nt-prev'),
          nextButton: $('#nt-next')
	});
	});
</script>
<!-- Google Map -->
<div style="border:1px solid #3c3a48;"></div>
<div id="map" style="height:50%;"></div>
<div style="border:2px solid #3c3a48;"></div>


<!-- Google Map Scripts -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXQnHj2Vs4BhZfp2wHkV4Voa9jMKBIMnY&callback=initMap"
        async defer></script>
<script>
 var contentString = "<p><strong>Mungniram Bangur Memorial College is one of the oldest and reputed college in India.</strong></p>"+
 "<p><span class=\"fa fa-phone\"></span> Call : 0291 - 2551566 &nbsp; <span class=\"fa fa-external-link\"></span> Web : www.mbm.ac.in</p>";
    var map;
    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 26.268531, lng: 73.033002},
        zoom: 15
      });
      var marker = new google.maps.Marker({
    position: {lat: 26.268531, lng: 73.033002},
    map: map,
    title: 'M.B.M Engineering College'
  });
      var infowindow = new google.maps.InfoWindow({
    content: contentString
  });
    marker.addListener('click', function() {
   infowindow.open(map, marker);
  });
}
</script>


@stop