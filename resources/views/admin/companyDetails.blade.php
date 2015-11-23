@extends('app')
@section('content')
<p>
Company Name : {{ $companyDetails->name }}<br/>
H.R. Email : {{ $companyDetails->email}}<br/>
Company website : {{$companyDetails->compUrl}}<br/>
Company Address : {{$companyDetails->compAdd}}<br/>
Company City : {{$companyDetails->compCity}}<br/>
Name of the HR : {{$companyDetails->hrName}}<br/>
Mobile Number of the HR : {{$companyDetails->hrMob}}<br/>
Company Overview : {{$companyDetails->compOver}}<br/>
Job Description : {{$companyDetails->jobDesc}}<br/>
City Of Posting : {{$companyDetails->cityPost}}<br/>
Accomodation : {{$companyDetails->accom}}<br/>
Bond : {{$companyDetails->bond}}<br/>
Cut Off : {{$companyDetails->cutOff}}<br/>
Selection Procedure : {{$companyDetails->selPro}}<br/>
Branches Eligible : {{$companyDetails->openFor}}<br/>
No Of Backlogs Allowed : {{$companyDetails->ktAllowed}}<br/>
Visible to Students : <?php if($companyDetails->studentPanelVisibilityStatus==1) echo "Yes"; else echo "No"; ?>
</p>
{!! Form::open(array('url'=>'/admin/companyManagement/updateVisibility','method'=>'POST', 'id'=>'myform2')) !!}
<input type="hidden" name="jaf_id" value='<?php echo $companyDetails->id; ?>'>
<input type="hidden" name="user_id" value='<?php echo $companyDetails->user_id; ?>'>
<?php 
	if($companyDetails->studentPanelVisibilityStatus==1){?>
		<input type="hidden" name="status" value='0'>
		<input id="statusButton" type="submit" value="Hide" />
	<?php } else { ?>
		<input type="hidden" name="status" value='1'>
		<input id="statusButton" type="submit" value="Show" />
	<?php } 
?>
{!! Form::close() !!}

<script type="text/javascript">
$(document).ready(function(){
	$('#statusButton').click(function(){
		$.ajax({
			
		});
	});
});
</script>



@endsection