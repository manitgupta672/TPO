@extends('postloginmaster')

@section('content')

@if(session()->has('error_msg'))
	<script>
		$(document).ready(function(){
				Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
		});
	</script>
@endif
        <div class="col s8"><br></div>

				<!-- Second Row Starts  -->
        <div class="col s12 m9 l10">
        
				<a href="/alumni/panel/placements">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card lime accent-4 darken-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Companies</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">business_center</i>
                </p>
              </div>
            </div>
          </div>
        </a>

				<a href="/alumni/panel/currentBranches">
          <div class=" col s12 m12 l6 textwhite ">
            <div class="card brown lighten-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Current Students By Branch</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">school</i>
                </p>
              </div>
            </div>
          </div>
        </a>

                </div>
        <!-- Row Second Ends -->
	
        <!-- Third Row Starts  -->
        <div class="col s12 m9 l10">
        
				<a href="/alumni/panel/news">
          <div class=" col s12 m12 l6 textwhite ">
            <div class="card light-blue darken-2 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">News</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">notifications</i>
                </p>
              </div>
            </div>
          </div>
        </a>

        <a href="/alumni/panel/fellowAlumni">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card teal darken-2 darken-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Fellow Alumni</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">people_outline</i>
                </p>
              </div>
            </div>
          </div>
        </a>

        </div>
        <!-- Row Third Ends -->

				<!-- Row Fourth starts -->
       <div class="col s12 m9 l10">
	
        <a href="/alumni/panel/currentProfessors">
        <div class=" col s12 m12 l12 textwhite ">
          <div class="card orange darken-3 hoverable waves-effect">
            <div class="card-content white-text">
              <span class="card-title">Current Professors</span>
              <hr>
              <p class="center-align">
                <i class="large material-icons">gavel</i>
              </p>
            </div>
          </div>
        </div>
        </a>

        </div>
        <!-- Row Fourth Ends -->

        <!-- Row Fourth starts -->
       <div class="col s12 m9 l10">
	
				<a href="/{{Request::segment(1)}}/panel/settings">
        <div class=" col s12 m12 l12 textwhite ">
          <div class="card blue-grey darken-4 hoverable waves-effect">
            <div class="card-content white-text">
              <span class="card-title">Settings</span>
              <hr>
              <p class="center-align">
                <i class="large material-icons">settings</i>
              </p>
            </div>
          </div>
        </div>
        </a>

        </div>
        <!-- Row Fourth Ends -->
        
        </div>  <!-- Row Ends -->

@stop