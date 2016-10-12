@extends('postloginmaster')
@section('content')
@if(session()->has('error_msg'))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
    });
  </script>
@endif         
          <div class="col s8"><br></div> <!-- Line Break -->
          
          <div class="col s12 m9 l10"> <!-- First Row Starts -->
            
           <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s12 m3 l3"><a href="#allcomp" onclick="Materialize.fadeInImage('.staggered-test')">All Companies</a></li>
                <li class="tab col s12 m3 l3"><a href="#upcomingcomp" onclick="Materialize.fadeInImage('.staggered-test')">Upcoming Companies For You</a></li>
                <li class="tab col s12 m3 l3"><a href="#appliedfor" onclick="Materialize.fadeInImage('.staggered-test')">Applied For</a></li>
              </ul>
            </div>
            
            <div id="allcomp" class="col s12">
              <!-- All Companies -->
              <!-- Row One -->

               <div class="row">
               @if(count($allCompanies)>0)
                  @foreach($allCompanies as $company)
                  <div class="col s12 m12 staggered-test">
                    <div class="card blue darken-3">
                      <div class="card-content white-text row">
                        <span class="card-title">{{$company->name}}</span>
                        <p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Selection Procedure : </i><br>
													{{$company->selPro}}
												</p>
												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Job Desciption : </i><br>
													{{$company->jobDesc}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">City Of Posting : </i>
													{{$company->cityPost}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">Cut Off Percentage : </i>
													{{$company->cutOff }}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">No. of KT's Allowed : </i>
													{{$company->ktAllowed }}
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Accomodation Provided? : </i>
													@if($company->accom == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$company->accom}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Any Bond? : </i>
													@if($company->bond == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$company->bond}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Slab : </i>
													{{$company->slab}}
												</p>

												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Branches Open For : </i><br>
													<?php
														$openFor = array_filter(explode('-',$company->openFor));
														foreach ($openFor as $key => $value) {
															if($value != 'MCA')
																$openFor[$key] = substr($value,0,-2);
																echo $openFor[$key] . " , ";
														}
													 ?>
												</p>
                      </div>
											<br>
                      <div class="card-action">
                        <a href="javascript:void(0);">{{$company->compUrl}}</a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                @endif  
                </div>
                <!-- Row One Ends --> <!-- All Companies End -->
            </div>
            <div id="upcomingcomp" class="col s12">
               <!-- Upcoming Companies -->
              <!-- Row One -->
               <div class="row">
               @if(!empty($upcomings))
                 @foreach($upcomings as $upcoming)
               {!! Form::open(array('url'=>'/student/panel/placements/applyForCompany','method'=>'POST', 'id'=>'myform')) !!}
                   <div class="col s12 m12 staggered-test">
                    <div class="card blue darken-3">
                      <div class="card-content white-text row">
                        <span class="card-title">{{$upcoming->name}}</span>
                        <p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Selection Procedure : </i><br>
													{{$upcoming->selPro}}
												</p>
												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Job Desciption : </i><br>
													{{$upcoming->jobDesc}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">City Of Posting : </i>
													{{$upcoming->cityPost}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">Cut Off Percentage : </i>
													{{$upcoming->cutOff }}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">No. of KT's Allowed : </i>
													{{$upcoming->ktAllowed }}
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Accomodation Provided? : </i>
													@if($company->accom == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$company->accom}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Any Bond? : </i>
													@if($company->bond == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$upcoming->bond}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Slab : </i>
													{{$company->slab}}
												</p>
												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Branches Open For : </i><br>
													<?php
														$openFor = array_filter(explode('-',$upcoming->openFor));
														foreach ($openFor as $key => $value) {
															if($value != 'MCA')
																$openFor[$key] = substr($value,0,-2);
																echo $openFor[$key] . " , ";
														}
													 ?>
												</p>
                      </div>
											<br>
                      <div class="card-action">
                        <a href="javascript:void(0);">{{$upcoming->compUrl}}</a>
												<input type="hidden" name="applie" value="<?php echo $upcoming->user_id ; ?>">
<!--                          <input type="submit" value="Apply">-->
												@if($upcoming->showApplyButton == 1)
													<button class="btn-floating waves-effect waves-light tooltipped right" data-position="top" data-tooltip="Apply" data-delay="50" type="submit" value="Apply"><i class="material-icons right">send</i></button>
												@endif	
                      </div>
                    </div>
                  </div>
                  {!! Form::close() !!}
                  @endforeach
                @else
                	<p>Sorry You Do not have any companies to apply for!</p>
                	<p>There can be one of the following reasons : </p>
                	<ul>
                		<li style="list-style-type:square;">You are not eligible for the company you are looking for. Please check for the eligibility criteria in the <i>All Companies</i> tab.</li>
                		<li style="list-style-type:square;">You have already applied for the company. Check the companies you have applied for in the <i>Applied For</i> tab.</li>
                		<li style="list-style-type:square;">You haven't filled your resume yet. Please fill up your resume <a href="/student/panel/resume" >here</a></li>
                	</ul>
				@endif
                </div>
                <!-- Row One Ends --> <!-- Upcoming Companies End -->
            </div>
            <div id="appliedfor" class="col s12">
               <!-- Applies For -->
              <!-- Row One -->
               <div class="row">
               @if(!empty($applieds) )
               @foreach($applieds as $applied)
               {!! Form::open(array('url'=>'/student/panel/placements/cancelApplicationForCompany','method'=>'POST', 'id'=>'myform2')) !!}
                   <div class="col s12 m12 staggered-test">
                    <div class="card blue darken-3">
                      <div class="card-content white-text row">
                        <span class="card-title">{{$applied->name}}</span>
                        <p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Selection Procedure : </i><br>
													{{$applied->selPro}}
												</p>
												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Job Desciption : </i><br>
													{{$applied->jobDesc}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">City Of Posting : </i>
													{{$applied->cityPost}}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">Cut Off Percentage : </i>
													{{$applied->cutOff }}
												</p>
												<p class="col l4 m6 s12">
													<i style="font-size:1.2em;" class=" orange-text">No. of KT's Allowed : </i>
													{{$applied->ktAllowed }}
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Accomodation Provided? : </i>
													@if($company->accom == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$company->accom}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Any Bond? : </i>
													@if($company->bond == 0)
														No
													@else
														Yes
													@endif
													<!-- {{$applied->bond}} -->
												</p>
												<p class="col l4 m12 s12">
													<i style="font-size:1.2em;" class=" orange-text">Slab : </i>
													{{$company->slab}}
												</p>
												<p class="col s12">
													<i style="font-size:1.2em;" class=" orange-text">Branches Open For : </i><br>
													<?php
														$openFor = array_filter(explode('-',$applied->openFor));
														foreach ($openFor as $key => $value) {
															if($value != 'MCA')
																$openFor[$key] = substr($value,0,-2);
																echo $openFor[$key] . " , ";
														}
													 ?>
												</p>
                      </div>
											<br>
                      <div class="card-action">
                        <a href="javascript:void(0);">{{$applied->compUrl}}</a>
                        @if($applied->level == 99)
                        	Congratulations! You are placed in this company.
                        @else
                        
												<input type="hidden" name="applie" value="<?php echo $applied->user_id ; ?>">
<!--                        <input type="submit" value="Delete">-->
											@if($applied->showApplyButton == 1)
												<button class="btn-floating red waves-effect waves-light tooltipped right" data-position="top" data-tooltip="Delete" data-delay="50" type="submit" value="Delete"><i class="material-icons right">delete</i></button>
											@endif	
                        @endif
                        


                      </div>
                    </div>
                  </div>
                {!! Form::close() !!}
                @endforeach
                @else
                	<p>Sorry You haven't applied for any company yet.</p>
                @endif
                </div>
                <!-- Row One Ends --> <!-- Applied For Ends -->
            </div>
            
          </div>
        
          </div> <!-- First Row ends -->


        </div>  <!-- Main Content Row Ends -->

@stop