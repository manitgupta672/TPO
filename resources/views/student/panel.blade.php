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
        
         <!-- Semester Wise Result -->
         <div class="col s12 m9 l10">
         <div class="widget col s12 m12 l8 textwhite ">
             <div class="card brown lighten-1 hoverable waves-effect">
            <div class="card-content white-text">
              <span class="card-title">Semester Wise Result</span>
              <hr>
          
              <div class="content">
                
                <div class="verticalChart">
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($data['sem1Percent']) && !empty($data))
                       			<span>{{ $data['sem1Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">I</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($data['sem2Percent']) && !empty($data))
                       			<span>{{ $data['sem2Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">II</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
                       @if(is_numeric($data['sem3Percent']) && !empty($data))
                       			<span>{{ $data['sem3Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">III</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($data['sem4Percent']) && !empty($data))
                       			<span>{{ $data['sem4Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">IV</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
													@if(is_numeric($data['sem5Percent']) && !empty($data))
                       			<span>{{ $data['sem5Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">V</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                        <div class="value">
													@if(is_numeric($data['sem6Percent']) && !empty($data))
                       			<span>{{ $data['sem6Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">VI</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                        <div class="value">
                        	@if(is_numeric($data['sem7Percent']) && !empty($data))
                       			<span>{{ $data['sem7Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">VII</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
                        	@if(is_numeric($data['sem8Percent']) && !empty($data))
                       			<span>{{ $data['sem8Percent'] }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">VIII</div>
                  
                  </div>
                  
                  <div class="clearfix"></div>
                  
                </div>
              
              </div>
              
            </div><!--/span-->
           </div>
          </div>

        <!-- Semester Wise Result ends -->

        <!-- Upcoming Companies start -->

        <div class="col s12 m12 l4 textwhite ">
          <div class="card blue-grey darken-1 hoverable waves-effect">
            <div class="card-content white-text">
              <span class="card-title">Upcoming Companies</span>
              <hr>
             @if(count($upcomings)==0 && count($applieds)==0)
              <div>You are not eligible to apply for this Placement Season due to any of the following reasons</div>
              <a href="/student/panel/placements">View All Companies</a>
             @else 


              <table class="bordered centered textwhite companytable">
                <thead>
                  <tr>
                      <th data-field="id"></th>
                      <th data-field="name">Company Name</th>
                      <th data-field="price">Apply</th>
                  </tr>
                </thead>
                <tbody>
 				<?php if(count($upcomings)>0) { ?>
                @foreach($upcomings as $upcoming)
        {!! Form::open(array('url'=>'/student/panel/applyForCompanyDashboard','method'=>'POST', 'id'=>'myform')) !!}
                  <tr>
                    <td><i class="tiny material-icons">business_center</i></td>
                    <td><a href="/student/panel/placements" >{{ $upcoming->name }}</a></td>
                    <input type="hidden" name="applyOnMe" value="<?php echo $upcoming->user_id ; ?>">

                    <td>
<!--                    <input class="btn-floating waves-effect waves-light" type="submit" value="Apply" >-->
											@if($upcoming->showApplyButton==1)
                      <button class="btn-floating waves-effect waves-light tooltipped" data-position="top" data-tooltip="Apply" data-delay="50" type="submit" value="Apply"><i class="material-icons right">send</i></button>
                      @endif
                    </td>
<!--                     <td><a class="btn-floating waves-effect waves-ligh" href=""><i class="material-icons right">send</i></a></td>
 -->                  </tr>
        {!! Form::close() !!}
                @endforeach
									<?php } ?>
									<?php if(count($applieds)>0) { ?>
                @foreach($applieds as $applied)
									{!! Form::open(array('url'=>'/student/panel/cancelApplicationForCompany','method'=>'POST', 'id'=>'myform')) !!}
                  <tr>
                    <td><i class="tiny material-icons">business_center</i></td>
                    <td><a href="/student/panel/placements" >{{ $applied->name }}</a></td>
                    <input type="hidden" name="del" value="<?php echo $applied->user_id ; ?>">

                    <td>
                    @if($applied->level != 99)
                      @if($applied->showApplyButton ==1)
  											<button class="btn-floating red waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete" data-delay="50" type="submit" value="Delete"><i class="material-icons right">delete</i></button>
                      @endif
                    @else
                      <button class="btn-floating red waves-effect waves-light tooltipped" data-position="top" data-tooltip="Delete" data-delay="50" type="submit" value="Delete"><i class="material-icons right">star</i></button>
                    @endif
										</td>
<!--                     <td><a class="btn-floating waves-effect waves-ligh" href=""><i class="material-icons right">send</i></a></td>
 -->                  </tr>
        {!! Form::close() !!}
                @endforeach
        <?php } ?>

                </tbody>

              </table>
             @endif
            </div>
          </div>
        </div>
        </div>
        <!--  First Row Ends -->

        <div class="col s8"><br></div>

        <!-- Second Row Starts -->
        
        <div class="col s12 m9 l10">

        <div class=" col s12 m12 l6 textwhite ">
         	<a href="/student/panel/resume">
					<div class="card deep-orange  hoverable waves-effect">
            <div class="card-content white-text bottom-padding-zero">
              <span class="card-title">Resume Complete</span>
              <hr>
									<?php $resumeComplete = -6; ?>
										@if(isset($data))
										@foreach($data->toArray() as $key => $value)
											@if(ctype_alnum($value) || ctype_alpha($value) || !empty($value))
												<?php $resumeComplete++?>
											@endif
										@endforeach
									@endif
                  <div class="circleStatsItemBox center-align">
                    <div class="circleStat">
                      <input type="text" value="{{ ($resumeComplete)*100/43 }}" class="whiteCircle" />
                      <span class="percent">Percent</span>
                    </div>    
                    <div class="footer">
                      <span class="count">
                        <span class="number"></span>
                        <span class="unit">Details</span>
                      </span>
                      <span class="sep"> / </span>
                      <span class="value">
                        <span class="number">43</span>
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
              <span class="card-title">Placements ( 2016 Batch ) </span>
              <hr>


                  <a href="/student/panel/placements">
                  <div class="circleStatsItemBox center-align">
                    <div class="circleStat">
                      <input type="text" value="40" class="whiteCircle" />
                      <span class="percent">Percent</span>
                    </div>    
                    <div class="footer">
                      <span class="count">
                        <span class="number">252</span>
                        <span class="unit">Students</span>
                      </span>
                      <span class="sep"> / </span>
                      <span class="value">
                        <span class="number">630</span>
                        <span class="unit">Students</span>
                      </span> 
                    </div>

                  </div>
                  </a>

            </div>
          </div>
        </div>

        

        </div>
        <!--  Second Row Ends -->

        <!-- <div class="col s8"><br></div> -->

        <!-- Third Row Starts  -->
        <div class="col s12 m9 l10">
        <a href="/student/panel/news">
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

        <a href="/student/panel/placements">
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

        <a href="/student/panel/fellowStudents">
          <div class=" col s12 m12 l4 textwhite ">
            <div class="card pink darken-2 hoverable waves-effect">
              <div class="card-content white-text">
                <span class="card-title">Fellow-Mates</span>
                <hr>
               <p class="center-align">
                  <i class="large material-icons">people</i>
                </p>
              </div>
            </div>
          </div>
        </a>
        </div>
        <!-- Row Three Ends -->

        <!-- Row Four starts -->
       <div class="col s12 m9 l10">

<!--
       <a href="">
       <div class=" col s12 m9 l4 textwhite ">
           <div class="card light-blue darken-2 hoverable waves-effect">
            <div class="card-content white-text">
              <span class="card-title">Calendar</span>
              <hr>
              <p class="center-align">
                <i class="large material-icons">subject</i>
              </p>
            </div>
          </div>
        </div>
-->
        </a>

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
        <!-- Row Four Ends -->


        

        </div>  <!-- Row Ends -->


        

        <script src="/js/counter.js"></script>
        <script src="/js/jquery.knob.modified.js"></script>
        <script type="text/javascript" src="/js/customjs.js"></script>


      

  @stop