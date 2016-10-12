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

        <div class=" col s12 m12 l6 textwhite ">
         	<a href="/company/panel/jaf">
					<div class="card deep-orange  hoverable waves-effect">
            <div class="card-content white-text bottom-padding-zero">
              <span class="card-title">J.A.F. Complete</span>
              <hr>
									<?php $jafComplete = -6; ?>
										@if(isset($data))
										@foreach($data->toArray() as $key => $value)
											@if(ctype_alnum($value) || ctype_alpha($value) || !empty($value))
												<?php $jafComplete++?>
											@endif
										@endforeach
									@endif
                  <div class="circleStatsItemBox center-align">
                    <div class="circleStat">
                      <input type="text" value="{{ ($jafComplete)*100/14 }}" class="whiteCircle" />
                      <span class="percent">Percent</span>
                    </div>    
                    <div class="footer">
                      <span class="count">
                        <span class="number"></span>
                        <span class="unit">Details</span>
                      </span>
                      <span class="sep"> / </span>
                      <span class="value">
                        <span class="number">15</span>
                        <span class="unit">Details</span>
                      </span> 
                    </div>

                  </div>

            </div>
          </div> 
					</a>
        </div>

             <div class=" col s12 m12 l6 textwhite ">
          <div class="card light-green darken-1 hoverable waves-effect">
            <div class="card-content white-text bottom-padding-zero">
              <span class="card-title">Applied / Elligible </span>
              <hr>


                  <a href="javascript:void(0)">
                  <div class="circleStatsItemBox center-align">
                    <div class="circleStat">
											<input type="text" value="<?php if(isset($numberOfEligibleStudents) && isset($numberOfAppliedStudents) && $numberOfEligibleStudents!=0){
                       echo ($numberOfAppliedStudents/$numberOfEligibleStudents)*100 ;
                      } ?>" 
                      class="whiteCircle" />
                      <span class="percent">Percent</span>
                    </div>    
                    <div class="footer">
                      <span class="count">
                        <span class="number"><?php 
                        if(isset($numberOfAppliedStudents)){
                         echo $numberOfAppliedStudents;
                        } 
                      ?></span>
                        <span class="unit">Students</span>
                      </span>
                      <span class="sep"> / </span>
                      <span class="value">
												<span class="number"><?php 
                        if(isset($numberOfEligibleStudents)){
                             echo $numberOfEligibleStudents;
                            } 
                          ?>
                        </span>
                        <span class="unit">Students</span>
                      </span> 
                    </div>

                  </div>
                  </a>

            </div>
          </div>
        </div>

        

        </div>
        <!--  First Row Ends -->

        <!-- Second Row Starts  -->
        <div class="col s12 m9 l10">
        
				<a href="/company/panel/news">
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

        <a href="/company/panel/branches">
          <div class=" col s12 m12 l6 textwhite ">
             <div class="card teal darken-2 darken-1 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Students of Your Interested Branch</span>
                <hr>
                <p class="center-align">
                  <i class="large material-icons">people_outline</i>
                </p>
              </div>
            </div>
          </div>
        </a>

        </div>
        <!-- Row Second Ends -->

        <!-- Row Third starts -->
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
        <!-- Row Third Ends -->
        
        </div>  <!-- Row Ends -->


        <script src="/js/counter.js"></script>
        <script src="/js/jquery.knob.modified.js"></script>
        <script type="text/javascript" src="/js/customjs.js"></script>


  @stop
  