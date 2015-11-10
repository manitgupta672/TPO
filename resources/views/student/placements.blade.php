@extends('master')
@section('content')

<?php
	function ifApplied($id,$appliedInCompanyUserIds){
		if(in_array($id,$appliedInCompanyUserIds))
			echo "Applied";
		else
			echo "Apply";
	}
?>
<!-- <form method="post" action="/student/panel/placements/applyForCompany"> -->
{!! Form::open(array('url'=>'/student/panel/placements/applyForCompany','method'=>'POST', 'id'=>'myform')) !!}
	<h1>Upcoming Companies</h1>

	@foreach($upcomings as $upcoming)
	
		<p>Company Name : {{ $upcoming->name }}</p>
		<p>Company URL : {{ $upcoming->compUrl  }}</p>
		<p>Company Email : {{ $upcoming->email }}</p>
		<p>Selection Procedure : {{ $upcoming->selPro }}</p>
	
		<button type="submit" value="<?php echo $upcoming->user_id ; ?>" id="<?php echo $upcoming->user_id ; ?>" class="apply">Apply</button>
		<hr/>
	@endforeach
{!! Form::close() !!}

<hr/><hr/>
{!! Form::open(array('url'=>'/student/panel/placements/cancelApplicationForCompany','method'=>'POST', 'id'=>'myform2')) !!}
	<h1>Applied Companies</h1>

	@foreach($applieds as $applied)
	
		<p>Company Name : {{ $applied->name }}</p>
		<p>Company URL : {{ $applied->compUrl  }}</p>
		<p>Company Email : {{ $applied->email }}</p>
		<p>Selection Procedure : {{ $applied->selPro }}</p>
	
		<button type="submit" value="<?php echo $applied->user_id ; ?>" id="<?php echo $applied->user_id ; ?>" class="delete">Delete</button>
		<hr/>
	@endforeach
{!! Form::close() !!}

<script type="text/javascript">
		$(document).ready(function(){
			

			$(".apply").click(function(){
				var clicked = this.id;
				// alert($(this).attr("value"));
				// if($(this).attr("value").slice(-1)=='A'){
					$.ajax({
						url:'/student/panel/placements/applyForCompany',
						type:'post',
						data:{
							'applie': $(this).val(),
							'_token': $('input[name=_token]').val()
						},
						success: function(data){
							// alert("done");
							$("#" + clicked).prop('disabled', true);
		        			// $("#" + clicked).val("clicked");
		        			$("#" + clicked).html('Applied');
		        			// alert(data);
		      			}
					});
				// }
			return false;
			});


			$(".delete").click(function(){
				var clicked = this.id;
				var urrl = '/student/panel/placements/cancelApplicationForCompany'; 
				// alert($(this).attr("value"));
				// if($(this).attr("value").slice(-1)=='A'){
					$.ajax({
						url:urrl,
						type:'post',
						data:{
							'applie': $(this).val(),
							'_token': $('input[name=_token]').val()
						},
						success: function(data){
							$("#" + clicked).prop('disabled', true);
		        			// $("#" + clicked).val("clicked");
		        			$("#" + clicked).html('Deleted');
		        			// alert(data);
		      			}
					});
				// }
			return false;
			});


		});

</script>

@stop