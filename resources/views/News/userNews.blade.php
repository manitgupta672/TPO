@extends('postloginmaster')

@section('content')

	 
<!-- Main Content -->
           
          <div class="col s8"><br></div> <!-- Line Break -->
          
          <div class="col s12 m9 l10"> <!-- First Row Starts -->
            @foreach($myNews as $news)
            <div class="col s12 m6 l6 staggered-test"> <!-- First Card Begins -->
              <div class="card indigo darken-1 hoverable">
                <div class="card-content white-text">
                <span class="card-title"> {{$news->title}} </span>
                <hr>
                <p> {{$news->body}} </p>
                </div>
                <div class="card-action">
                  <a href="javascript:void(0);">Dated : {{$news->created_at}}</a>
                  <a href="javascript:void(0);">By : TPO Cell MBM</a>
                </div>
              </div> 
            </div> <!-- First Card Ends -->
            @endforeach
		</div> <!-- First Row ends -->


        </div>  <!-- Main Content Row Ends -->

        <script type="text/javascript" src="js/customjs.js"></script>






@stop