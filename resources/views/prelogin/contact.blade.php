@extends('preloginmaster')
@section('content')
	
<body > 
<!-- Google Map -->
<div id="map" style="height:50%;"></div>
<div style="border:2px solid #3c3a48;"></div>

	<br><br>
	<div class="row">
        <div class="col s10 push-s1 center-align" style="font-size:1.6em; font-weight:bold;">Contact Us</div>
				<div class="push-s1 col s10" style="text-align:justify;">
          <p style="font-weight:bold;">M. B. M. Engineering College</p>
					<p style="font-weight:bold;">J N Vyas University</p>
        	Air Force Area,<br>
					Jodhpur,<br>
					Rajasthan - 342011<br>
					<p>
						<i class="fa fa-phone"></i> P: 0291-2551566
					</p>
					<p>
						<i class="fa fa-envelope"></i> E: tpocellmbm@gmail.com
					</p>
					<p>
						<i class="fa fa-clock-o"></i> H: Monday - Friday: 8:00 AM to 1:00 PM
					</p>
					
        </div>
   </div>
	
	
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