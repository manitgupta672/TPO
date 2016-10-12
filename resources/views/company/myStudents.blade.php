@extends('postloginmaster')
@section('content')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>

	 
	 				<div class="col s12 m9 l10">
         		<div class="widget col s12 m12 l12 textwhite ">
             <div class="card light-green darken-1 hoverable waves-effect">
            	<div class="card-content white-text">
              <span class="card-title">Elligible Students For Branches You Are Interested</span>
              <hr>
							
	 						<table id="myStudent">
								<thead>
									<tr>
										<th>Name</th>
										<th>Branch</th>
										<th>Percentage</th>
									</tr>
								</thead>
								<tbody>
	 								@foreach($myStudents as $myStudent)
										<tr>
											<td>{{$myStudent->name}}</td>
											<td>{{$myStudent->branch}}</td>
											<td>{{$myStudent->averagePercent}}</td>
										</tr>
									@endforeach
								</tbody>
							</table>

								</div>
					 	</div>
					</div>
					</div>	
	 <div class="col s8"><br></div>


   
	 <!-- <div class="col s8"><br></div> -->

	 
</div>  <!-- Row Ends -->
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

				</style>
				<script type="text/javascript">
					$(document).ready( function () {
							$('#myStudent').DataTable();
					} );
				</script>
        <script src="/js/counter.js"></script>
        <script src="/js/jquery.knob.modified.js"></script>
        <script type="text/javascript" src="/js/customjs.js"></script>

@stop