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

<div>
	<div id="nav">
		<form>
			<br/><br/>
			Upcoming Companies for You	<input type="radio" value="upcoming" name="selectOne" /><br/>
			Companies You have applied for <input type="radio" value="applied" name="selectOne" /><br/>
			All Companies <input type="radio" value="allCompanies" name="selectOne" /><br/>
		</form>		
	</div>

	<script type="text/javascript">
	$(document).ready(function(){
		$('#nav form input[value=upcoming]').click(function(){
			// html("manit");
			// alert("hello");
			$('#ap').hide(500);
			$('#all').hide(500);
			$('#up').show(500);
		});
		$('#nav form input[value=applied]').click(function(){
			// html("manit");
			// alert("hello");
			$('#all').hide(500);
			$('#up').hide(500);
			$('#ap').show(500);
		});
		$('#nav form input[value=allCompanies]').click(function(){
			// html("manit");
			// alert("hello");
			$('#ap').hide(500);
			$('#up').hide(500);
			$('#all').show(500);
		})
	});
	</script>
	<div id="up" style="display:none;">
		{!! Form::open(array('url'=>'/student/panel/placements/applyForCompany','method'=>'POST', 'id'=>'myform')) !!}
			<h1>Upcoming Companies For You</h1>

			@foreach($upcomings as $upcoming)
			
				<p>Company Name : {{ $upcoming->name }}</p>
				<p>Company URL : {{ $upcoming->compUrl  }}</p>
				<p>Company Email : {{ $upcoming->email }}</p>
				<p>Selection Procedure : {{ $upcoming->selPro }}</p>
			
				<button type="submit" value="<?php echo $upcoming->user_id ; ?>" id="<?php echo $upcoming->user_id ; ?>" class="apply">Apply</button>
				<hr/>
			@endforeach
		{!! Form::close() !!}		
	</div>
	<div id="ap" style="display:none;">
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
		
	</div>
	<div id="all" style="display:none;">
		<h1>All Companies</h1>

		@foreach($allCompanies as $company)
			<p>Company Name : {{ $company->name }}</p>
			<p>Company URL : {{ $company->compUrl  }}</p>
			<p>Company Email : {{ $company->email }}</p>
			<p>Selection Procedure : {{ $company->selPro }}</p>
		@endforeach	
	</div>
</div>





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