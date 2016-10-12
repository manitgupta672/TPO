@extends('preloginmaster')
@section('content')
@if(session()->has('error_msg'))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{ session('error_msg') }}', 10000,'rounded');
    });
  </script>
@endif
@if(!empty($error_msg))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{$error_msg}}', 10000,'rounded');
    });
  </script>
@endif

@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<script>
    $(document).ready(function(){
        Materialize.toast('{{$error}}', 10000,'rounded');
    });
  </script>
	@endforeach
@endif

<div class="row login-form" style="  margin-top: 100px !important; margin-bottom:50px;">
        <div class="col s12 m6 l6 push-l3 push-m3">
          <div class="card blue-grey darken-1 s12">
            <div class="card-content white-text center-align">
              <div class="row"><i class="fa fa-3x fa-sign-in"></i></div>
              <span class="card-title">SIGN IN</span>
              <hr>
              <p>
                <div class="row">
                <form class="col s12" role="form" method="POST" action="{{ url('/auth/login') }}">
            {!! csrf_field() !!}
                <div class="row">
                    
                    <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">email</i>
                      <input id="email" name="email" type="text" value="{{ old('email') }}" class="validate">
                      <label for="email">E-Mail</label>
                    </div>
                    
                    <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">lock</i>
                      <input id="password" name="password" type="password" class="validate">
                      <label for="password">Password</label>
                    </div>
                    <div class="input-field col s12 m12 l12">
                       <button class="btn waves-effect waves-light col s12 center-align" type="submit">Login
                        <i class="material-icons right">send</i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>

              </p>
            </div>
            <div class="card-action row">
              <a href="/password-reset" class="col l5 s12 push-l1 center-align">Forget Password !</a>
              <a href="/auth/register" class="col l5 s12 push-l1 center-align">Yet to Register ?</a>
            </div>
          </div>
        </div>
  </div>
@endsection