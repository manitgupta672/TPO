
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
				{!! Form::open(['class'=>'col s12','method'=>'POST','url'=>'/company/panel/settings']) !!}
				{!! Form::model($data,['method'=>'POST','url'=>'/company/panel/settings']) !!}

					<div class="widget col s12 m12 l12 ">
          <div class="card cyan accent-4 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Settings</span>
              <hr>

                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">face</i>
										{!! Form::label('name','Name:') !!}
										{!! Form::text('name',null, ['class'=>'']) !!}
                  </div>
               
	                <!-- <form class="col s12"> -->
	               
	                
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">create</i>
										{!! Form::label('Mobile Number','Mobile Number') !!}
										{!! Form::text('mobile',null, ['class'=>' ' ]) !!}
                  </div>
									
									<div class="input-field col s12">
										<a href="/{{Request::segment(1)}}/updatePassword" class="btn red waves-effect waves-light col s12" type="submit">Change Password
											<i class="material-icons right">lock</i>
										</a>
									</div>
                
								</div>

							
              </div>
            </div>
          </div>
					<!-- First Card Ends -->
        	
					<div class="widget col s12 m12 l12 "><!-- Second Card Begins --><!-- Submit Row Starts -->
							<div class="card cyan accent-4 hoverable">
								<button class="btn waves-effect waves-light col s12" type="submit">Update Details
									<i class="material-icons right">send</i>
								</button>
								{!! Form::close() !!}
							</div>
						</div> <!-- Second submit Card Ends --><!-- Submit Row Ends -->
					
					</div> <!-- First Row Ends -->


        </div>  <!-- Row Ends -->

@stop