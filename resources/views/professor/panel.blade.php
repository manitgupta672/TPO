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
         <!-- First Row Starts -->
         <div class="col s12 m9 l10">
					<a href="/professor/panel/news">
          <div class=" col s12 m12 l4 textwhite ">
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

        <a href="/professor/panel/placements">
          <div class=" col s12 m12 l4 textwhite ">
             <div class="card teal darken-2 darken-1 hoverable waves-effect">
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

        <a href="/professor/panel/students">
          <div class=" col s12 m12 l4 textwhite">
            <div class="card deep-orange hoverable waves-effect">
              <div class="card-content white-text ">
                <span class="card-title">Branch-wise Students</span>
                <hr>
               <p class="center-align">
                  <i class="large material-icons">school</i>
                </p>
              </div>
            </div>
          </div>
        </a>
			</div>

			<div class="col s12 m9 l10"> <!-- Second Row Starts  -->
				<a href="/professor/panel/fellowProfessors">
          <div class=" col s12 m12 l6 textwhite ">
            <div class="card blue-grey darken-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Fellow Professors</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">gavel</i>
                </p>
              </div>
            </div>
          </div>
        </a>

        <a href="/professor/panel/alumni">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card brown lighten-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Our Alumni</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">people</i>
                </p>
              </div>
            </div>
          </div>
        </a>

			</div>   <!-- Second Row Ends  -->
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
							 

    </div>  <!-- Row Ends -->
	 
					 
	


@stop
