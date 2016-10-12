@extends('postloginmaster')
@section('content')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
				<!-- Semester Wise Result -->
         
				 <div class="col s12 m9 l10">
         <div class="widget col s12 m12 l12 textwhite ">
             <div class="card brown lighten-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Students Spread Over Pecentages</span>
              <hr>
          
              <div class="content">
                
                <div class="verticalChart">
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($graph[0]) && !empty($graph))
                       			<span>{{ ($graph[0]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">Below 55%</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($graph[1]) && !empty($graph))
                       			<span>{{ ($graph[1]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">55% - 60%</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
                       @if(is_numeric($graph[2]) && !empty($graph))
                       			<span>{{ ($graph[2]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">60% - 65%</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
												@if(is_numeric($graph[3]) && !empty($graph))
                       			<span>{{ ($graph[3]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">65% - 70%</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                      <div class="value">
													@if(is_numeric($graph[4]) && !empty($graph))
                       			<span>{{ ($graph[4]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">70% - 75%</div>
                  
                  </div>
                  
                  <div class="singleBar">
                  
                    <div class="bar">
                    
                        <div class="value">
                        	@if(is_numeric($graph[5]) && !empty($graph))
                       			<span>{{ ($graph[5]/$graph[6])*100 }}%</span>
											 @else
                          <span>-</span>
                       @endif
                      </div>
                    
                    </div>
                    
                    <div class="title">Above 75%</div>
                  
                  </div>
                  
                  <div class="clearfix"></div>
                  
                </div>
              
              </div>
              
            </div><!--/span-->
           </div>
          </div>
				</div>
				<div class="col s8"><br></div>
         <div class="col s12 m9 l10">
         	<div class="widget col s12 m12 l12 textwhite ">
           <div class="card light-green darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Students In {{Request::segment(4)}}</span>
              <hr>
									
									@if(!empty($branchStudents))
									<table id="branchStudents">
										<thead>
											<tr>
												<th>Name</th>
												<th>Percentage</th>
												<th>Current Semester</th>
											</tr>
										</thead>
										<tbody>
											<!-- All users, placements, and resume table attributes are fetched -->
											@foreach($branchStudents as $branchStudent)
												<tr>
													<td><a href="/company/panel/branches/studentDetails/{{$branchStudent->id}}">{{$branchStudent->name}}</a></td>
													<td><?php if($branchStudent->averagePercent > $branchStudent->aggregatePercent)
															echo $branchStudent->averagePercent;
														else
															echo $branchStudent->aggregatePercent;
														 ?>
													 </td>
													 <td>{{$branchStudent->currentSem}}</td>
												</tr>
											@endforeach
										</tbody>
									</table>
									@endif
									</div>

					 		</div>
						</div>
					</div>		
				
			</div>
	<style>
					input,label{
						color:#fff;
					}
					input[type=text]:focus:not([readonly]), input[type=password]:focus:not([readonly]), input[type=email]:focus:not([readonly]), 			  						input[type=url]:focus:not([readonly]), input[type=time]:focus:not([readonly]), input[type=date]:focus:not([readonly]), 													input[type=datetime-local]:focus:not([readonly]), input[type=tel]:focus:not([readonly]), input[type=number]:focus:not([readonly]), 							input[type=search]:focus:not([readonly]), textarea.materialize-textarea:focus:not([readonly]){
						    border-bottom: 1px solid #fff;
    						box-shadow: 0 1px 0 0 #fff;
					}

					input[type=text], input[type=password], input[type=email], input[type=url], input[type=time], input[type=date], input[type=datetime-local], input[type=tel], input[type=number], input[type=search], textarea.materialize-textarea {

			    border-bottom: 1px solid #fff !important;

}

.verticalChart .singleBar {
	width: 15.6%;
}	

</style>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#branchStudents').DataTable();
	} );
</script>
@stop