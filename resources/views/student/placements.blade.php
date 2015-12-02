@extends('app')
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
	<div id="nav" style="float:left; width:30%;">
		<form>
			<ul>
				<li style="list-style:none;"><input type="radio" value="upcoming" name="selectOne" /> Upcoming Companies for You</li>
				<li style="list-style:none;"><input type="radio" value="applied" name="selectOne" /> Companies You have applied for</li>
				<li style="list-style:none;"><input type="radio" value="allCompanies" name="selectOne" /> All Companies</li>
			</ul>
		</form>		
	</div>

	<div style="float:right; width:70%;  border-left: 2px dashed #0000FF; padding-left:10%; padding-top:2%" id="contennt">
		<div id="up" style="display:none;">
			<?php if(isset($upcomings)){ ?>
				{!! Form::open(array('url'=>'/student/panel/placements/applyForCompany','method'=>'POST', 'id'=>'myform')) !!}
					<h1>Upcoming Companies For You</h1>

					@foreach($upcomings as $upcoming)
					
						<p>Company Name : {{ $upcoming->name }}</p>
						<p>Company URL : {{ $upcoming->compUrl  }}</p>
						<p>Company Email : {{ $upcoming->email }}</p>
						<p>Selection Procedure : {{ $upcoming->selPro }}</p>
						<input type="hidden" name="applie" value="<?php echo $upcoming->user_id ; ?>">
						<input type="submit" value="Apply">
	<!--					<button type="submit" value="<?php echo $upcoming->user_id ; ?>" id="<?php echo $upcoming->user_id ; ?>" class="apply">Apply</button>
	-->					<hr/>
					@endforeach
				{!! Form::close() !!}
			<?php } else {?>
				<h3>You are not eligible to apply for this Placement Season due to any of the following reasons</h3>
				<p>You are not in your final year.</p>	
			<?php } ?>	
		</div>
		<div id="ap" style="display:none;">
			<?php if(isset($upcomings)){ ?>
				{!! Form::open(array('url'=>'/student/panel/placements/cancelApplicationForCompany','method'=>'POST', 'id'=>'myform2')) !!}
					<h1>Applied Companies</h1>

					@foreach($applieds as $applied)
					
						<p>Company Name : {{ $applied->name }}</p>
						<p>Company URL : {{ $applied->compUrl  }}</p>
						<p>Company Email : {{ $applied->email }}</p>
						<p>Selection Procedure : {{ $applied->selPro }}</p>
						<input type="hidden" name="applie" value="<?php echo $applied->user_id ; ?>">
						<input type="submit" value="Delete">
	<!--					<button type="submit" value="<?php echo $applied->user_id ; ?>" id="<?php echo $applied->user_id ; ?>" class="delete">Delete</button>
		-->				<hr/>
					@endforeach
				{!! Form::close() !!}
			<?php } else {?>
				<h3>You have not applied for any company in this placement season.</h3>
			<?php } ?>
		</div>
		<div id="all" style="display:none;">
			<h1>All Companies</h1>

			@foreach($allCompanies as $company)
				<p>Company Name : {{ $company->name }}</p>
				<p>Company URL : {{ $company->compUrl  }}</p>
				<p>Company Email : {{ $company->email }}</p>
				<p>Selection Procedure : {{ $company->selPro }}</p>
				<hr/>
			@endforeach	
		</div>
	</div>
</div>





<script type="text/javascript">
		// $(document).ready(function(){
			


		// 	$(".apply").click(function(){
		// 		var clicked = this.id;
		// 		// alert($(this).attr("value"));
		// 		// if($(this).attr("value").slice(-1)=='A'){
		// 			$.ajax({
		// 				url:'/student/panel/placements/applyForCompany',
		// 				type:'post',
		// 				data:{
		// 					'applie': $(this).val(),
		// 					'_token': $('input[name=_token]').val()
		// 				},
		// 				success: function(data){
		// 					// alert("done");
		// 					$("#" + clicked).prop('disabled', true);
		//         			// $("#" + clicked).val("clicked");
		//         			$("#" + clicked).html('Applied');
		//         			// alert(data);
		//       			}
		// 			});
		// 		// }
		// 	return false;
		// 	});


		// 	$(".delete").click(function(){
		// 		var clicked = this.id;
		// 		var urrl = '/student/panel/placements/cancelApplicationForCompany'; 
		// 		// alert($(this).attr("value"));
		// 		// if($(this).attr("value").slice(-1)=='A'){
		// 			$.ajax({
		// 				url:urrl,
		// 				type:'post',
		// 				data:{
		// 					'applie': $(this).val(),
		// 					'_token': $('input[name=_token]').val()
		// 				},
		// 				success: function(data){
		// 					$("#" + clicked).prop('disabled', true);
		//         			// $("#" + clicked).val("clicked");
		//         			$("#" + clicked).html('Deleted');
		//         			// alert(data);
		//       			}
		// 			});
		// 		// }
		// 	return false;
		// 	});


		// });

</script>

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
@stop