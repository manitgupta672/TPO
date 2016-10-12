@extends('postloginmaster')
@section('content')
	<div class="col s8"><br></div>
	<div class="col s12 m9 l10">
         <div class=" col s12 m12 l12 textwhite ">
          <div class="card deep-orange hoverable">
           <div class="card-content white-text">
            {!! Form::open(['method'=>'POST','url'=>'/updatePassword']) !!}
							<i class="material-icons prefix">lock</i>
						 	Password : <input id="pass" type="password" name="password" ><br>
							<i class="material-icons prefix">lock</i>
						 	Confirm Password : <input id="confPass" type="password" name="confirm_password"><br>
						  <button id="submit" class="btn waves-effect waves-light col s12" type="submit">Submit
              	<i class="material-icons right">send</i>
            	</button>
						 	<br>
						 <!--							<input type="submit" name="submit" value="Change">-->
						 {!! Form::close() !!}
            </div>
          </div>
         </div>
			</div>
</div>
<script>
$(document).ready(function(){
	$('#submit').click(function(){
	var pass = $('#pass').val();
	var confPass = $('#confPass').val();
		if( pass != confPass)
		{	Materialize.toast('Passwords Don\'t Match!!!', 10000,'rounded');
			return false;
		}
	});
});
</script>
@stop