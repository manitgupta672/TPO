@extends('postloginmaster')
@section('content')

@section('datatables-stylesheet-and-js')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
@stop
<div class="container" >
<?php
	//to convert openFor string into another string containing only the branch names
	$branches = array_filter(explode('-',$companyDetails->openFor));
	$branch = '';
	foreach ($branches as $key => $value) {
		if($value!='MCA')
			//remove BE from the end!
			$branch .= substr($value,0,-2) . ', ';
		else
			$branch .= $value;
	}
	if(substr($branch,-2,-1)==',')
		$branch = substr($branch,0,-1);
?>
<h3>Company Details</h3>
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
Branches Eligible : {{$branch}}

<br/>
No Of Backlogs Allowed : {{$companyDetails->ktAllowed}}<br/>
Slab : {{$companyDetails->slab}}<br/>
Visible to Students : <?php if($companyDetails->studentPanelVisibilityStatus==1) echo "Yes"; else echo "No"; ?>
</p>
{!! Form::open(array('url'=>'/admin/companyManagement/updateVisibility','method'=>'POST', 'id'=>'myform2')) !!}
<input type="hidden" name="jaf_id" value='{{$companyDetails->id}}'>
<input type="hidden" name="user_id" value='{{$companyDetails->user_id}}'>
<?php 
	if($companyDetails->studentPanelVisibilityStatus==1){?>
		<input type="hidden" name="status" value='0'>
		<input id="statusButton" type="submit" value="Hide from Students" />
	<?php } else { ?>
		<input type="hidden" name="status" value='1'>
		<input id="statusButton" type="submit" value="Show to Students" />
	<?php } 
?>
{!! Form::close() !!}

{!! Form::open(array('url'=>'/admin/companyManagement/updateApplyButton','method'=>'POST')) !!}
<input type="hidden" name="jaf_id" value='{{$companyDetails->id}}'>
<input type="hidden" name="user_id" value='{{$companyDetails->user_id}}'>
<?php 
	if($companyDetails->showApplyButton==1){?>
		<input type="hidden" name="status" value='0'>
		<input id="statusButton" type="submit" value="Hide Apply Button" />
	<?php } else { ?>
		<input type="hidden" name="status" value='1'>
		<input id="statusButton" type="submit" value="Show Apply Button" />
	<?php } 
?>
{!! Form::close() !!}
<hr>
{!! Form::open(array('url'=>'/admin/companyManagement/setSlab','method'=>'POST')) !!}
	<select name="slab" class="form-control" style="display:block;">
			<option disabled="disabled" >Select Slab</option>
			<option value="1" <?php if( isset($companyDetails->slab) && $companyDetails->slab == 1) { echo "selected='selected'";} ?> > 1</option>
			<option value="2" <?php if( isset($companyDetails->slab) && $companyDetails->slab == 2) { echo "selected='selected'";} ?> > 2</option>
			<option value="3" <?php if( isset($companyDetails->slab) && $companyDetails->slab == 3) { echo "selected='selected'";} ?> > 3</option>
	</select>							
	<input type="hidden" name="company_id" value='{{$companyDetails->user_id}}'>
	<input type="submit" value="Update Slab">
	

{!! Form::close() !!}




<a href = "/admin/panel/campusProcedure/{{$companyDetails->user_id}}">Campus Procedure</a>

<hr/>

@if(empty($appliedCandidates))
	<p><b>None of the eligible students have applied for {{$companyDetails->name}} placement drive. </b></p>
@else
<h3>Students who have applied for {{ $companyDetails->name }}</h3>
	

<table id="appliedStudents">
	<thead>
		<tr>
			<th>Name</th>
			<th>Branch</th>
			<th>Cleared till Level</th>
		</tr>
	</thead>
	<tbody>
		<!-- All users, placements, and resume table attributes are fetched -->
		@foreach($appliedCandidates as $appliedCandidate)
			<tr>
				<td><a href="/admin/panel/studentDetails/{{$appliedCandidate->student_id}}">{{$appliedCandidate->name}}</td>
				<td>{{$appliedCandidate->branch}}</td>
				<td>
					@if($appliedCandidate->level!=99)
						{{$appliedCandidate->level}}
					@else
						placed
					@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endif

<hr/>
<div>
@if(empty($absentees))
	<p><b>There are no absent students in any round of this {{$companyDetails->name}} placement drive.</b></p>
@else
<h3>Students Absent for any of the rounds in {{ $companyDetails->name }}</h3>
	<table>
		<thead>
			<th>Name</th>
			<th>Branch</th>
			<th>Email Id</th>
			<th>Last Round attended</th>
		</thead>
		<tbody>
			@foreach($absentees as $absentee)
				<td><a href="/admin/panel/studentDetails/{{$absentee->id}}">{{$absentee->name}}</a></td>
				<td>{{$absentee->branch}}</td>
				<td>{{$absentee->email}}</td>
				<td>
				<?php $round = substr($absentee->level,0,-2); ?>
					@if($round!=99)
						{{$round+1}}
					@else
						placed
					@endif
				</td>
			@endforeach
		</tbody>
	</table>
@endif
</div>

</div> <!-- Container div ends -->

<script type="text/javascript">
	$(document).ready( function () {
	    $('#appliedStudents').DataTable();
	} );
</script>


@endsection