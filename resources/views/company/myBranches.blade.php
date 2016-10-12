@extends('postloginmaster')

@section('content')
		<div class="col s12 m9 l10">

				<!-- First Row Starts  -->
        <div class="col s12 m12 l12">
        	
				@foreach($branches as $branch)
				<?php $branch = substr($branch,0,-2); ?>
				
				@if( $branch == 'CSE' )
				<a href="/company/panel/branches/{{$branch}}BE">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card deep-purple lighten-1 darken-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Computer Science & Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">computer</i>
                </p>
              </div>
            </div>
          </div>
        </a>
				@elseif( $branch == 'ITE' )
				<a href="/company/panel/branches/{{$branch}}BE">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card purple lighten-3 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Information & Technology</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">code</i>
                </p>
              </div>
            </div>
          </div>
        </a>
				@elseif( $branch == 'ECE' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
             <div class="card orange darken-3 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Electronics & Communication Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">stay_current_portrait</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'EEE' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
            <div class="card lime darken-3 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Electronics & Electrical Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">settings_input_composite</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'ECC' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
             <div class="card light-blue darken-2 darken-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Electronics & Computer Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">android</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'BCT' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
            <div class="card green accent-3 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Building & Construction</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">home</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'CHE' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
             <div class="card lime accent-4 darken-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Chemical Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">polymer</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'MEC' )
				<a href="/company/panel/branches/{{$branch}}BE">
				 <div class=" col s12 m12 l6 textwhite ">
            <div class="card brown lighten-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Mechanical Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">motorcycle</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'EEL' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
             <div class="card blue-grey darken-1 darken-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Electrical Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">build</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'MIN' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m12 l6 textwhite ">
            <div class="card grey lighten-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Mining Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">gavel</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@elseif( $branch == 'CIV' )
				<a href="/company/panel/branches/{{$branch}}BE">
					<div class=" col s12 m6 l6 textwhite ">
             <div class="card amber lighten-2 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Civil Engineering</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">business</i>
                </p>
              </div>
            </div>
          </div>
				</a>
				@endif
			@endforeach
			</div>
		 </div>
		</div>
@stop