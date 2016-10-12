<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resume;
use Illuminate\Support\Facades\Request;
use DB;
// use Illuminate\Http\Request;
class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $allow = true;

    public function __construct(){
        $this->middleware('student');
    }
    
    public function bestSlabPlaced(){
        // echo Auth::user()->id;

        //returns the list of companies, the student has applied for, along with the levels he has cleared in it!
        //if the level in placement table is 99, then that student is placed in that company.
        $x = DB::table('placements')
            ->where('student_id',Auth::user()->id)
            ->leftJoin('jaf','placements.company_id','=','jaf.user_id')
            ->leftJoin('users','users.id','=','placements.company_id')
            ->where('placements.level',99)
            ->select('placements.*','jaf.*','users.*')
            ->get();
        
        // $i=0;
        // $placed = array();            
        $bestSlabPlaced = 0;
        foreach($x as $obj){
            // $placed[$i++] = $obj->company_id;
            if($obj->level==99 && $obj->slab > $bestSlabPlaced)
                $bestSlabPlaced = $obj->slab;
        }            
        return $bestSlabPlaced;


        // $a = (array)$x;
        // return $a;

        // var_dump((array)$x);
        // echo $x;
        // $i=0;
        // $company=array();
        // foreach ($x as $pl) {
        //     # code...
        //     $company[$i]['company_id'] = $pl->company_id;
        //     $company[$i]['email']=$pl->name;
        //     $company[$i]['slab']=$pl->slab;
        //     $i++;
        // }
        // var_dump($company);
        // echo "<br/>";
        // for($i=0;$i<2;$i++){
        //     echo $company[$i]['company_id'].$company[$i]['email'].$company[$i]['slab'];
        //     echo "<br/>";
        // }
    }

    public function postLoginPage(){
        $data = Auth::user()->resume;
            $branch = Auth::user()->branch;

            if((!isset($data))
                || ($data['degree'] == 'B.E.' && $data['currentSem'] != 7 && $data['currentSem'] != 8)
                || ($data['degree'] == 'M.C.A.' && $data['currentSem']!= 5 && $data['currentSem'] != 6))
            {
                $upcoming = null;
                $applied = null;
                return view('student.panel')->with([
                    'data'=>$data,
                    // 'branch'=>$branch,
                    'upcomings'=>$upcoming,
                    'applieds'=>$applied
                    // 'allCompanies'=>$allCompanies
                ]);

            } else {
                $a = $this->appliedIn();

                $percent = $data['aggregatePercent'];
                if($data['aggregatePercent'] < $data['averagePercent']){
                    $percent = $data['averagePercent'];
                }//for allowing the students to register if either of their percentages(aggr/avg) crosses the cutoff.

                if(!empty($percent)){
                $upcoming = DB::table('jaf')
                    ->join('users','jaf.user_id','=','users.id')
                    ->select('users.*','jaf.*')
                    ->where('studentPanelVisibilityStatus','1')
                    ->where('jaf.cutOff','<=',$percent)
                    ->where('jaf.slab','>',$this->bestSlabPlaced())
                    ->whereNotIn('users.id',$a)
                    ->where('openFor','LIKE','%'.$branch.'%') 
                    ->get();
                } else {
                    $upcoming=null; 
                }

                $applied = DB::table('placements')
                        ->where('student_id',$data['user_id'])
                        ->leftJoin('jaf','placements.company_id','=','jaf.user_id')
                        ->where('studentPanelVisibilityStatus','1')
                        ->leftJoin('users','users.id','=','jaf.user_id')
                        ->get();


                // $applied = DB::table('jaf')
                //     ->join('users','jaf.user_id','=','users.id')
                //     ->select('users.*','jaf.*')
                //     // ->whereNotIn('jaf.user_id',$placedInn)
                //     ->where('studentPanelVisibilityStatus','1')
                //     ->whereIn('users.id',$a)
                //     ->get();

                return view('student.panel')->with([
                    'data'=>$data,
                    'branch'=>$branch,
                    'upcomings'=>$upcoming,
                    'applieds'=>$applied
                    // 'allCompanies'=>$allCompanies
                ]);    
            }

        
    // }
        // return view('student.panel');
    }

    public function applyForCompany(Request $request){

        $applyArray = Request::all();
        $data['student_id'] = Auth::user()->id;
        $data['company_id'] = $applyArray['applyOnMe'];
        
        //just a check if the apply button for this company is visible
        $applyButtonYesOrNo = DB::table('jaf')
            ->where('user_id',$applyArray['applyOnMe'])
            ->select('jaf.showApplyButton')
            ->first();
        // echo $request->input('applie');

        if($applyButtonYesOrNo->showApplyButton ==1){
            // $x = explode('-',$applyArray['applyOnMe']);
            // var_dump($x);
            // $data['company_id'] = $request->input('applie');
            $data['level'] = '0';
            $data['created_at'] = \Carbon\Carbon::now();
            // var_dump($data);
            if(DB::table('placements')->insert($data)){
                $error_msg = "Applied. All the very Best!!!";
                return redirect()->back()->with('error_msg',$error_msg);return redirect()->back();
            } else {
                $error_msg="Sorry, Could not apply for the company.";
                return redirect()->back()->with('error_msg',$error_msg);
            }
        }
    } 

    public function cancelApplicationForCompany(Request $request){
            $in = Request::all();
            $data['student_id'] = Auth::user()->id;
            $data['company_id'] = $in['del'];

        $applyButtonYesOrNo = DB::table('jaf')
            ->where('user_id',$data['company_id'])
            ->select('jaf.showApplyButton')
            ->first();

        if($applyButtonYesOrNo->showApplyButton ==1){
            // $data['company_id'] = $request->input('applie');
            $data['level'] = '0';
            $deleted = DB::table('placements')->where('student_id','=',Auth::user()->id)
                                    ->where('company_id','=',$data['company_id'])
                                    ->where('level','0')
                                    ->delete();
            if($deleted){
                $error_msg = "Deleted. You can always Apply back!!!";
                            return redirect()->back()->with('error_msg',$error_msg);
                    } else {
                            $error_msg="Sorry Not Deleted";
                return redirect()->back()->with('error_msg',$error_msg);
            }
        }
    }

    public function resume(){
        $data = Auth::user()->resume;
        // $data= null;
        $branch = Auth::user()->branch;

        if(!empty($data['kt'])){
            $a = explode('-',$data['kt']);
            // print_r($a);

            $data['sem1kt'] = $a[0];
            $data['sem2kt'] = $a[1];
            $data['sem3kt'] = $a[2];
            $data['sem4kt'] = $a[3];
            $data['sem5kt'] = $a[4];
            $data['sem6kt'] = $a[5];
            $data['sem7kt'] = $a[6];
            $data['sem8kt'] = $a[7];
        }

        // var_dump($data);
        
        return view('student.resume')->with([
            'data'=>$data,
            'branch'=>$branch,
            'marksUpdateAllowed'=>$this->allow
            ]);
    }

    public function resumeStore(Request $request){
            $in = Request::all();
            
            if(empty($in['showResume']))
                    $in['showResume'] = 0;

            if($this->allow==true){
                //kt work
                $kt = $in['sem1kt'] . '-' . $in['sem2kt'] . '-' . $in['sem3kt'] . '-' . $in['sem4kt'] . '-' . $in['sem5kt'] . '-' . $in['sem6kt'] . '-' . $in['sem7kt'] . '-' . $in['sem8kt'];
                $in['kt'] = $kt;
                $totalkt =$in['sem1kt'] + $in['sem2kt'] + $in['sem3kt'] + $in['sem4kt'] + $in['sem5kt'] + $in['sem6kt'] + $in['sem7kt'] + $in['sem8kt']; 
                $in['totalkt'] = $totalkt;
                unset($in['sem1kt'] , $in['sem2kt'] , $in['sem3kt'] , $in['sem4kt'] , $in['sem5kt'] , $in['sem6kt'] , $in['sem7kt'] , $in['sem8kt']);

                echo 'board' . $in['board10'];

                if(empty($in['isDiploma']))
                    $in['isDiploma'] = 0;

                (empty($in['sem1MM']))?($in['sem1Percent']=0):($in['sem1Percent'] = $in['sem1']/$in['sem1MM']*100);
                (empty($in['sem2MM']))?($in['sem2Percent']=0):($in['sem2Percent'] = $in['sem2']/$in['sem2MM']*100);
                (empty($in['sem3MM']))?($in['sem3Percent']=0):($in['sem3Percent'] = $in['sem3']/$in['sem3MM']*100);
                (empty($in['sem4MM']))?($in['sem4Percent']=0):($in['sem4Percent'] = $in['sem4']/$in['sem4MM']*100);
                (empty($in['sem5MM']))?($in['sem5Percent']=0):($in['sem5Percent'] = $in['sem5']/$in['sem5MM']*100);
                (empty($in['sem6MM']))?($in['sem6Percent']=0):($in['sem6Percent'] = $in['sem6']/$in['sem6MM']*100);
                (empty($in['sem7MM']))?($in['sem7Percent']=0):($in['sem7Percent'] = $in['sem7']/$in['sem7MM']*100);
                (empty($in['sem8MM']))?($in['sem8Percent']=0):($in['sem8Percent'] = $in['sem8']/$in['sem8MM']*100);
                
                echo 'sem 1 = ' . $in['sem1Percent'] . '<br/>';            
                echo 'sem 2 = ' . $in['sem2Percent'] . '<br/>';            
                echo 'sem 3 = ' . $in['sem3Percent'] . '<br/>';            
                echo 'sem 4 = ' . $in['sem4Percent'] . '<br/>';            
                echo 'sem 5 = ' . $in['sem5Percent'] . '<br/>';            
                echo 'sem 6 = ' . $in['sem6Percent'] . '<br/>';            
                echo 'sem 7 = ' . $in['sem7Percent'] . '<br/>';            
                echo 'sem 8 = ' . $in['sem8Percent'] . '<br/>';            
               
                if($in['sem1MM']==0 && $in['sem2MM']==0 && $in['sem3MM']==0 && $in['sem4MM']==0 && $in['sem5MM']==0 && $in['sem6MM']==0 && $in['sem7MM']==0 && $in['sem8MM']==0){
                    echo "Here";
                    $in['averagePercent'] = 0;
                    $in['aggregatePercent'] = 0;
                } else {
                    $in['averagePercent'] = ($in['sem1'] + $in['sem2'] + $in['sem3'] + $in['sem4'] + $in['sem5'] + $in['sem6'] + $in['sem7'] + $in['sem8'])/($in['sem1MM'] + $in['sem2MM'] + $in['sem3MM'] + $in['sem4MM'] + $in['sem5MM'] + $in['sem6MM'] + $in['sem7MM'] + $in['sem8MM'])*100;
                    $in['aggregatePercent'] = (($in['sem1'] + $in['sem2'])*0.5 + ($in['sem3'] + $in['sem4'])*0.75 + $in['sem5'] + $in['sem6'] + $in['sem7'] + $in['sem8'])/(($in['sem1MM'] + $in['sem2MM'])*0.5 + ($in['sem3MM'] + $in['sem4MM'])*0.75 + $in['sem5MM'] + $in['sem6MM'] + $in['sem7MM'] + $in['sem8MM'])*100;
                }  

                echo $in['averagePercent'] . '<br/>';
                echo $in['aggregatePercent'];
            }

            // if(!isset($in['averagePercent']) && !isset($in['aggregatePercent']) ) {
                if( ! \Auth::user()->resume ) {
                   \Auth::user()->resume()->save(new Resume($in));
                } else {
                    $user = Auth::user();
                    // $input = Request::except('_method', '_token');
                    unset($in['_method'] , $in['_token']);
                    $user->resume()->update($in);
                }
                return redirect('/student/panel');                
            } 
        //     else {
								// $error_msg="Sorry, your percentages could not be calculated due to some reason. Please try re-filling the resume form.";
        //         return view('student.resume')->with(['error_msg'=>$error_msg,'data'=>$in]);
        //     }


        // }

    public function printResume(){
        // $branch = Auth::user()->branch;
        $data = Auth::user()->resume;
        if(!isset($data)){
            return "Please fill in your resume first.";
        }
        if(!empty($data['kt'])){
            $a = explode('-',$data['kt']);

            $data['sem1_kt'] = $a[0];
            $data['sem2_kt'] = $a[1];
            $data['sem3_kt'] = $a[2];
            $data['sem4_kt'] = $a[3];
            $data['sem5_kt'] = $a[4];
            $data['sem6_kt'] = $a[5];
            $data['sem7_kt'] = $a[6];
            $data['sem8_kt'] = $a[7];
        }




        $user = Auth::user()->toArray();

        $data['name'] = $user['name'];
        $data['mobile'] = $user['mobile'];
        $data['newRoll'] = $user['newRoll'];
        $data['email'] = $user['email'];
        $data['branch'] = $user['branch'];
        return view('student.printResume')->with('resume',$data);
    }    

    public function fellowStudents(){
        $fellowStudents = DB::table('users')
            ->where('users.entity','1')
            ->whereNotIn('users.id',[Auth::user()->id])
            ->leftJoin('resume','users.id','=','resume.user_id')
            ->select('users.*','resume.*')
            ->get();
            // echo $fellowStudents;
        return view('student.fellowStudents')->with('fellowStudents',$fellowStudents);
    }    

    public function fellowStudentProfile($stuid){

        $da = DB::table('users')
                ->join('resume','resume.user_id','=','users.id')
                ->where('entity',1)
                ->where('users.id',$stuid)
                ->select('resume.*','users.*')
                ->first();
        $data = (array)$da;
			
        if(empty($data)){
            if($data['gender']=='Female')
                $error_msg = "Sorry, Her resume is not available.";
            else
                $error_msg = "Sorry, His resume is not available.";
            return redirect()->back()->with('error_msg',$error_msg);
            // return redirect('/');
        }

        if($data['showResume']==0){
            if($data['gender']=='Female')
                $error_msg = "Sorry, She chose not to share her resume with you.";
            else
                $error_msg = "Sorry, He chose not to share his resume with you.";
            return redirect()->back()->with('error_msg',$error_msg);
        }
       
        // $ktString = $data
        if(!empty($data['kt'])) {
            $a = explode('-',$data['kt']);

            $data['sem1_kt'] = $a[0];
            $data['sem2_kt'] = $a[1];
            $data['sem3_kt'] = $a[2];
            $data['sem4_kt'] = $a[3];
            $data['sem5_kt'] = $a[4];
            $data['sem6_kt'] = $a[5];
            $data['sem7_kt'] = $a[6];
            $data['sem8_kt'] = $a[7];
        }

        // var_dump($data);
        // dd($data);
        // echo $data['sem1_kt'];


        // $user = Auth::user()->toArray();

        // $data['name'] = $user['name'];
        // $data['mobile'] = $user['mobile'];
        // $data['newRoll'] = $user['newRoll'];
        // $data['email'] = $user['email'];
        // $data['branch'] = $user['branch'];

        return view('student.printResume')->with('resume',$data);
        
    }
	


    public function studentNews(){
        $myNews = DB::table('news')
            ->where('visibleTo','LIKE','%S%')
            ->orderBy('updated_at','desc')
            ->get();
        return view('News.userNews')->with(['myNews'=>$myNews]);
    }

    public function appliedIn(){
        $appliedIn = DB::table('placements')
                    ->select('company_id')
                    ->where('placements.student_id','=',Auth::user()->id)
                    ->get();
        $i=0;
        $appliedInCompanyUserIds = array();            
        foreach($appliedIn as $obj){
            $appliedInCompanyUserIds[$i++] = $obj->company_id;
        }            
        return $appliedInCompanyUserIds;
    }

    public function settingsPage(){
        $settingsData = Auth::user();

        return view('student.settings')->with('data',$settingsData);
    }

    public function settingsPageStore(Request $request){
        $in = Request::all();   
        $user = \Auth::user();
        $user->update($in);
        // \Auth::user()->resume()->save(new Resume($in));
        return $this->postLoginPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}