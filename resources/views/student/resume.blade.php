@extends('postloginmaster')
@section('content')
<!-- Main Content -->
@if(!empty($error_msg))
  <script>
    $(document).ready(function(){
        Materialize.toast('{{ $error_msg }}', 10000,'rounded');
    });
  </script>
@endif

          
          <div class="col s8"><br></div>
      
<!--       <div class="col s12 m9 l10">  Print Row Starts -->
<!--
        <div class="widget col s12 m12 l12 ">
          <div class="card cyan accent-4 hoverable ">
            <button class="btn indigo darken-1 waves-effect waves-light col s12" type="submit">Print
              <i class="material-icons right">print</i>
            </button>
          </div>
-->
<!--          </div>  Print Card Ends -->

<!--        </div>  Print Row Ends -->


        <div class="col s12 m9 l10"> <!-- cancel Row Starts -->
        <div class="widget col s12 m12 l12 ">
          <div class="card cyan accent-4 hoverable waves-effect">
            <a href="/student/panel" class="btn red darken-2 waves-effect waves-light col s12" type="submit" >Cancel
              <i class="material-icons right">cancel</i>
            </a>
            </div>
          </div> <!-- cancel Card Ends -->

        </div> <!-- cancel Row Ends -->


         <!-- First Row Starts -->
            {!! Form::open(['class'=>'row','method'=>'POST','url'=>'/student/panel/resume']) !!}
            {!! Form::model($data,['method'=>'POST','url'=>'/student/panel/resume']) !!}
            {{ csrf_field() }}
        
         <div class="col s12 m9 l10">
         
         <div class="widget col s12 m12 l12 ">
          <div class="card blue-grey darken-1 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Personal Information</span>
              <hr>
              
              <div class="row">

                  <div class="row">
                    
                    <div class="input-field col s12 m6 l6">
                      <i class="material-icons prefix icon-24px">face</i>
                      {!! Form::text('fatherName',null,['class'=>'validate']) !!}
                      {!! Form::label('fatherName','Father\'s Name:') !!}

                    </div>
                   <div class="input-field col s12 m6 l6">
                    <select name="gender" class="form-control">
                      <option value="" disabled selected>Gender</option>
                      <option value="Male" <?php if($data['gender'] == 'Male'){ echo "selected";} ?>>Male</option>
                      <option value="Female" <?php if($data['gender'] == 'Female'){ echo "selected";} ?>>Female</option>
                      </select>
                    </div>

                  </div>

                  <div class="row">
                   <div class="input-field col s12 m4 l4">
                    <i class="material-icons prefix icon-24px">cake</i>
                    <input placeholder="Date of Birth" type="date" name="dob" id="dob" value="{{$data['dob']}}" class="datepicker">
                   </div>
<!--                  </div>
                      <div class="row">-->
                    <div class="input-field col s12 m4 l4">
                    <select name="degree" class="ficks" >
                      <option value="" disabled selected>Degree</option>
                      <option value="B.E." <?php if($data['degree']=='B.E.') echo " selected";?> >B.E.</option>
                      <option value="M.C.A." <?php if($data['degree']=='M.C.A.') echo " selected";?> >M.C.A.</option>
                      <option value="M.E." <?php if($data['degree']=='M.E.') echo " selected";?> >M.E.</option>
                    </select>
                    </div>

                    <div class="input-field col s12 m4 l4">
                    <select name="currentSem" class="ficks">
                    <option value="" disabled selected>Current Sem</option>
                      <?php
                        for($i=1; $i<=8; $i++){
                          echo "<option value=" . $i;
                          if($data['currentSem'] == $i){ echo " selected";}
                          echo ">" . $i . "</option>";
                        }
                      ?>
                    </select>
                    </div>

                   </div>
                
              </div>

           </div>
          </div>
          
        </div>

        <div class="widget col s12 m12 l12 ">
          <div class="card green accent hoverable ">
            <div class="card-content white-text">
              <span class="card-title">Residence</span>
              <hr>

              <div class="row">
                  <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix icon-24px">location_on</i>
                        {!! Form::label('address','Address') !!}
                        {!! Form::textarea('address',null, ['class'=>'materialize-textarea']) !!}
                     </div>
                  </div>
                  

                  <div class="row">
                    <div class="input-field col s12 l4 ">
                      <i class="material-icons prefix icon-24px">location_city</i>
                      {!! Form::label('city','Hometown') !!}
                      {!! Form::text('city',null, ['class'=>'validate']) !!}
                    </div>

                    <div class="input-field col s12 l4 ">
                      <i class="material-icons prefix icon-24px">navigation</i>
                  {!! Form::label('state','State :') !!}
                  {!! Form::text('state',null, ['class'=>'validate']) !!}
                    </div>

                    <div class="input-field col s12 l4 ">
                      <i class="material-icons prefix icon-24px">fiber_pin</i>
                      {!! Form::label('pinCode','Pincode :') !!}
                      {!! Form::text('pinCode',null, ['required patern'=>'[0-9]{6}', 'class'=>'validate']) !!}
                    </div>
                  </div>
              </div>

            </div>
          </div>
        </div>
              
        </div>   
        <!--  First Row Ends -->

        <div class="col s8"><br></div>

        <!-- Second Row Starts -->
        <div class="col s12 m9 l10">

        <!-- Third Card Begins -->
        <div class="widget col s12 m12 l12 ">
          <div class="card lime darken-4 hoverable ">
            <div class="card-content white-text">
              <span class="card-title">Boards and Numbers </span>
              <hr>

              
              <div class="row">

                  <div class="row">
                    
                    <div class="input-field col s12 m6 l3">
                      <i class="material-icons prefix icon-24px">navigate_next</i>
                      {!! Form::label('facultyNo','Faculty No:') !!}
                      {!! Form::text('facultyNo',null, ['required pattern' =>'[0-9]{2}/[0-9]{5}','class'=>'validate ficks','minlength'=>'8','maxlength'=>'8']) !!}
                    </div>
                    
                    <div class="input-field col s12 m6 l3">
                      <i class="material-icons prefix icon-24px">navigate_next</i>
                      {!! Form::label('enrollmentNo','Enrollment No:') !!}
                      {!! Form::text('enrollmentNo',null, ['required pattern' =>'[0-9]{2}/[0-9]{5}','class'=>'validate ficks','minlength'=>'8','maxlength'=>'8']) !!}
                    </div>
                   
                    <div class="col s12 m6 l3">
                    <select name="board10" class="ficks">
                      <option value="" disabled selected>10th Board</option>
                      <option value="CBSE" <?php if($data['board10']=='CBSE') echo " selected" ;?> >CBSE</option>
                      <option value="RBSE" <?php if($data['board10']=='RBSE') echo " selected" ;?> >RBSE</option>
                      <option value="Other" <?php if($data['board10']=='Other') echo " selected" ;?> >Other</option>
                    </select>
                    </div>

                    <div class="input-field col s12 m6 l3">
                      <i class="material-icons prefix icon-24px">navigate_next</i>
                      {!! Form::label('board10Percent','10th Board Percentage ') !!}
                      {!! Form::text('board10Percent',null, ['class'=>'validate ficks']) !!}
                    </div>

                  </div>

                  <div class="row">
                   




                    <div class="col s12 m6 l4">
                    Diploma Candidate ?<input type="checkbox" class="ficks" name="isDiploma" <?php if($data['isDiploma']==1) {echo "checked";} ?> value="1" style="position:relative;visibility:visible; left:20px;"/>
                    </div>
                    
                    <div class="input-field col s12 m6 l4">
                      <i class="material-icons prefix icon-24px">navigate_next</i>
                      {!! Form::label('board12Percent','12th Percentage ') !!}
                      {!! Form::text('board12Percent',null, ['class'=>'validate ficks']) !!}
                    </div>

                    <div class="input-field col s12 m12 l4">
                      <i class="material-icons prefix icon-24px">account_balance</i>
                      {!! Form::label('board12','Diploma College / 12th Board') !!}
                      {!! Form::text('board12',null, ['class'=>'validate ficks']) !!}
                    </div>
                  </div>
                
              </div>


              </div>
            </div>
          </div> <!-- Third Card Ends -->

        </div>   <!-- Second Row Starts -->


        <div class="col s12 m9 l10"> <!-- Third Row Starts -->
           <!-- Fourth Card Begins -->
        <div class="widget col s12 m12 l12 ">
          <div class="card deep-orange darken-3 hoverable ">
            <div class="card-content white-text">
              <span class="card-title">College Academic Record</span>
              <hr>

              
              <div class="row">

                  <div class="row">
                    <!-- Sem ONE & TWO -->
                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
            {!! Form::label('sem1','Sem 1 Marks:') !!}
            {!! Form::text('sem1',null, ['class'=>'validate ficks']) !!}

<!--                       <input id="sem1" name="sem1" type="text" class="validate">
                      <label for="sem1">Sem I Marks</label>
 -->                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem1MM','Sem 1 Max Marks:') !!}
    {!! Form::text('sem1MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem1MM" name="sem1MM" type="text" class="validate">
                      <label for="sem1MM">Sem I Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem1kt','Sem 1 KT') !!}
    {!! Form::text('sem1kt',null, ['class'=>'validate ficks']) !!}
                     <!--  <input id="sem1kt" name="sem1kt" type="text" class="validate">
                      <label for="sem1kt">Sem I KT</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem2','Sem 2 Marks:') !!}
    {!! Form::text('sem2',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem2" name="sem2" type="text" class="validate">
                      <label for="sem2">Sem II Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem2MM','Sem 2 Max Marks:') !!}
    {!! Form::text('sem2MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem2MM" name="sem2MM" type="text" class="validate">
                      <label for="sem2MM">Sem II Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem2kt','Sem 2 KT') !!}
    {!! Form::text('sem2kt',null, ['class'=>'validate ficks']) !!}
                     <!--  <input id="sem2kt" name="sem2kt" type="text" class="validate">
                      <label for="sem2kt">Sem II KT</label> -->
                    </div>

                  </div>
                  <!-- Sem THREE & FOUR -->
                  <div class="row">
                    
                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem3','Sem 3 Marks:') !!}
    {!! Form::text('sem3',null, ['class'=>'validate ficks']) !!}
                     <!--  <input id="sem3" name="sem3" type="text" class="validate">
                      <label for="sem3">Sem III Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem3MM','Sem 3 Max Marks:') !!}
    {!! Form::text('sem3MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem3MM" name="sem3MM"type="text" class="validate">
                      <label for="sem3M">Sem III Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem3kt','Sem 3 KT') !!}
    {!! Form::text('sem3kt',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem3kt" name="sem3kt" type="text" class="validate">
                      <label for="sem3kt">Sem III KT</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem4','Sem 4 Marks:') !!}
    {!! Form::text('sem4',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem4" name="sem4" type="text" class="validate">
                      <label for="sem4">Sem IV Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem4MM','Sem 4 Max Marks:') !!}
    {!! Form::text('sem4MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem4MM" name="sem4MM" type="text" class="validate">
                      <label for="sem4MM">Sem IV Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                    <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem4kt','Sem 4 KT') !!}
    {!! Form::text('sem4kt',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem4kt" name="sem4kt" type="text" class="validate">
                      <label for="sem4kt">Sem IV KT</label> -->
                    </div>

                  </div>
                  <!-- SEM FIVE & SIX -->
                  <div class="row">
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem5','Sem 5 Marks:') !!}
    {!! Form::text('sem5',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem5" name="sem5" type="text" class="validate">
                      <label for="sem5">Sem V Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>                    
    {!! Form::label('sem5MM','Sem 5 Max Marks:') !!}
    {!! Form::text('sem5MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem5MM" name="sem5MM" type="text" class="validate">
                      <label for="sem5MM">Sem V Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem5kt','Sem 5 KT') !!}
    {!! Form::text('sem5kt',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem5kt" name="sem5kt" type="text" class="validate">
                      <label for="sem5kt">Sem V KT</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem6','Sem 6 Marks:') !!}
    {!! Form::text('sem6',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem6" name="sem6" type="text" class="validate">
                      <label for="sem6">Sem VI Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem6MM','Sem 6 Max Marks:') !!}
    {!! Form::text('sem6MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem6MM" name="sem6MM" type="text" class="validate">
                      <label for="sem6MM">Sem VI Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem6kt','Sem 6 KT') !!}
    {!! Form::text('sem6kt',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem6kt" name="sem6kt" type="text" class="validate">
                      <label for="sem6kt">Sem VI KT</label> -->
                    </div>

                  </div>
                  <div class="row">
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem7','Sem 7 Marks:') !!}
    {!! Form::text('sem7',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem7" name="sem7"type="text" class="validate">
                      <label for="sem7">Sem VII Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem7MM','Sem 7 Max Marks:') !!}
    {!! Form::text('sem7MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem7MM" name="sem7MM" type="text" class="validate">
                      <label for="sem7MM">Sem VII Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem7kt','Sem 7 KT') !!}
    {!! Form::text('sem7kt',null, ['class'=>'validate ficks']) !!}
                     <!--  <input id="sem7kt" name="sem7kt" type="text" class="validate">
                      <label for="sem7kt">Sem VII KT</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_unchecked</i>
    {!! Form::label('sem8','Sem 8 Marks:') !!}
    {!! Form::text('sem8',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem8" name="sem8" type="text" class="validate">
                      <label for="sem8">Sem VIII Marks</label> -->
                    </div>
                    
                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">radio_button_checked</i>
    {!! Form::label('sem8MM','Sem 8 Max Marks:') !!}
    {!! Form::text('sem8MM',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem8MM" name="sem8MM" type="text" class="validate">
                      <label for="sem8MM">Sem VIII Max Marks</label> -->
                    </div>

                    <div class="input-field col s12 m4 l2">
                      <i class="material-icons prefix icon-24px">indeterminate_check_box</i>
    {!! Form::label('sem8kt','Sem 8 KT') !!}
    {!! Form::text('sem8kt',null, ['class'=>'validate ficks']) !!}
                      <!-- <input id="sem8kt" name="sem8kt" type="text" class="validate">
                      <label for="sem8kt">Sem VIII KT</label> -->
                    </div>

                  </div>
                
              </div>


              </div>
            </div>
          </div> <!-- Third Card Ends -->

        </div> <!-- Third Row Ends -->

        <div class="col s12 m9 l10"> <!-- Fourth Row Starts -->
           <!-- Fifth Card Begins -->
        <div class="widget col s12 m12 l12 ">
          <div class="card cyan accent-4 hoverable">
            <div class="card-content white-text">
              <span class="card-title">Internship Record</span>
              <hr>

                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">content_paste</i>
    {!! Form::label('proj1','Major Project 1:') !!}
    {!! Form::textarea('proj1',null, ['class'=>'materialize-textarea']) !!}

                    <!-- <textarea id="proj1" class="materialize-textarea"></textarea>
                    <label for="proj1">Major Project 1</label> -->
                  </div>
               
                  <div class="input-field col s12">
                    <i class="material-icons prefix">content_paste</i>
    {!! Form::label('proj2','Major Project 2:') !!}
    {!! Form::textarea('proj2',null, ['class'=>'materialize-textarea ' ]) !!}
                    <!-- <textarea id="proj2" class="materialize-textarea"></textarea>
                    <label for="proj2">Major Project 2</label> -->
                  </div>
            
                  <div class="input-field col s12">
                    <i class="material-icons prefix ">create</i>
    {!! Form::label('extraCurricular','Extra Curriculum :') !!}
    {!! Form::textarea('extraCurricular',null, ['class'=>'materialize-textarea ' ]) !!}
                    <!-- <textarea id="extraCurricular" class="materialize-textarea"></textarea>
                    <label for="extraCurricular">Extra Curricular</label> -->
                  </div>

                <div class="input-field col s12">
                    <i class="material-icons prefix ">create</i>
                    {!! Form::label('objective','Resume Objective :') !!}
                    {!! Form::textarea('objective',null, ['class'=>'materialize-textarea ' ]) !!}
                  </div>

                </div>
              
                </div>

              </div>
            </div><!-- Fifth Card Ends -->
          </div> <!-- Fourth Row Ends -->


          <div class="col s12 m6 l4">
          Show Resume ?<input type="checkbox" class="" name="showResume" <?php if($data['showResume']==1) {echo "checked";} ?> value="1" style="position:relative;visibility:visible; left:20px;"/>
          </div>

        <div class="col s12 m9 l10 push-l2"> <!-- Submit Row Starts -->
           <!-- Sixth Card Begins -->
        <div class="widget col s12 m12 l12 ">
          <div class="cardcyan accent-4 hoverable">
            <button class="btn waves-effect waves-light col s12" type="submit">Submit
              <i class="material-icons right">send</i>
            </button>
            </div>
          </div> <!-- Sixth submit Card Ends -->

        </div> <!-- Submit Row Ends -->
        </form>

<!--      For Master Page -->
      </div>
     </div>  <!-- Row Ends -->

        <script type="text/javascript"></script>
        <script src="/js/counter.js"></script>
        <script src="/js/jquery.knob.modified.js"></script>
        <script type="text/javascript" src="/js/customjs.js"></script>
         <script>
          $(document).ready(function(){

              <?php if(!$marksUpdateAllowed) { ?>
                $('.ficks').prop('disabled', true);
              <?php } ?>
              // $('.ficks').prop('disabled', false);

          });
        </script>
@stop
