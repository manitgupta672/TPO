@extends('postloginmaster')
@section('content')
<div class="col s8"><br></div> <!-- Line Break -->
          
          <div class="col s12 m9 l10"> <!-- First Row Starts -->
            
           <div class="row">
            <div class="col s12">
              <ul class="tabs">
                <li class="tab col s12 m6 l6"><a href="#allcomp" onclick="Materialize.fadeInImage('.staggered-test')">All Companies</a></li>
                <li class="tab col s12 m6 l6"><a href="#upcomingcomp" onclick="Materialize.fadeInImage('.staggered-test')">Upcoming Companies</a></li>
              </ul>
            </div>
            
            <div id="allcomp" class="col s12">
              <!-- All Companies -->
              <!-- Row One -->

               <div class="row">
               @if(count($allCompanies)>0)
                  @foreach($allCompanies as $company)
                  <div class="col s12 m6 staggered-test">
                    <div class="card blue darken-3">
                      <div class="card-content white-text">
                        <span class="card-title">{{$company->name}}</span>
                        <p>{{$company->selPro}}</p>
                      </div>
                      <div class="card-action">
                        <a href="{{$company->compUrl}}" target="_blank">{{$company->compUrl}}</a>
                        <a href="mailto:{{$company->email}}"> {{$company->email}} </a>
                      </div>
                    </div>
                  </div>
                  @endforeach
                @endif  
                </div>
                <!-- Row One Ends --> <!-- All Companies End -->
            </div>
          </div>
        
          </div> <!-- First Row ends -->


        </div>  <!-- Main Content Row Ends -->

<!--

	<h1>All Companies</h1>

	@foreach($allCompanies as $company)
		<p>Company Name : {{ $company->name }}</p>
		<p>Company URL : {{ $company->compUrl  }}</p>
		<p>Company Email : {{ $company->email }}</p>
		<p>Selection Procedure : {{ $company->selPro }}</p>
		<hr/>
	@endforeach	
-->
@stop