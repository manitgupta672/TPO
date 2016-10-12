<?php

namespace App\Http\Controllers;
use DB;
use Auth;
// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jaf;
use Illuminate\Support\Facades\Request;

class companyController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('company');
    }
    
    public function postLoginPage(){

        $data = Auth::user()->jaf;
							
        if(!isset($data)){
            return view('company.panel');
        }

        $branches = array_filter(explode('-',$data['openFor']));
        foreach ($branches as $key => $value) {
            $branches[$key] = substr($branches[$key],0,-2);
        }

            $numberOfEligibleStudents = DB::table('users')
            ->leftJoin('resume','resume.user_id','=','users.id')
            ->where('entity',1)
            ->where('resume.totalkt','<=',$data['ktAllowed'])
            ->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',$data['cutOff'])
            ->whereIn('users.branch',$branches)
            ->count();

        $numberOfAppliedStudents = DB::table('placements')
                                    ->where('company_id',$data['user_id'])
                                    ->count();
                    
        return view('company.panel')->with([
            'numberOfAppliedStudents'=>$numberOfAppliedStudents,
            'numberOfEligibleStudents'=>$numberOfEligibleStudents,
            'data'=>$data
            ]);
    
    }



    public function index()
    {
        //
    }

    // Display JAF form 
    public function jaf(){
        $data = Auth::user()->jaf;
        return view('company.jaf')->with('data',$data);
    }

    // Store JAF Submitted
    public function jafStore(Request $request){
        $in = Request::all();
        $open = '';
        // var_dump(Request::all());
        if(isset($in['MCA'])) { $open .= $in['MCA'] . '-'; unset($in['MCA']);}
        if(isset($in['CSEBE'])) {$open .= $in['CSEBE'] . '-'; unset($in['CSEBE']);};
        if(isset($in['ITEBE'])) {$open .= $in['ITEBE'] . '-'; unset($in['ITEBE']);};
        if(isset($in['EEEBE'])) {$open .= $in['EEEBE'] . '-'; unset($in['EEEBE']);};
        if(isset($in['ECCBE'])) {$open .= $in['ECCBE'] . '-'; unset($in['ECCBE']);};
        if(isset($in['ECEBE'])) {$open .= $in['ECEBE'] . '-'; unset($in['ECEBE']);};
        if(isset($in['EELBE'])) {$open .= $in['EELBE'] . '-'; unset($in['EELBE']);};
        if(isset($in['CIVBE'])) {$open .= $in['CIVBE'] . '-'; unset($in['CIVBE']);};
        if(isset($in['CHEBE'])) {$open .= $in['CHEBE'] . '-'; unset($in['CHEBE']);};
        if(isset($in['MECBE'])) {$open .= $in['MECBE'] . '-'; unset($in['MECBE']);};
        if(isset($in['BCTBE'])) {$open .= $in['BCTBE'] . '-'; unset($in['BCTBE']);};
        if(isset($in['MINBE'])) {$open .= $in['MINBE'] . '-'; unset($in['MINBE']);};

        // unset($in['CSEBE']);
        // echo $open;
        $in['openFor'] = $open;
        if( ! \Auth::user()->jaf )
        {
           \Auth::user()->jaf()->save(new Jaf($in));
        }
        else
        {
            $user = Auth::user();
            // $input = Request::except('_method', '_token');
            // $input = $request->except('_method', '_token');
            unset($in['_method'], $in['_token']);
            $user->jaf()->update($in);
        }
        return redirect('/company/panel');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile()
    {
        return view('company.editProfile');
    }

    //shows all eligible students 
    public function myStudents(){
        // echo "These are my branches.";
        // echo Auth::user()->id;
        $branches = DB::table('jaf')
                    ->where('user_id','=',Auth::user()->id)
                    ->select('openFor')
                    ->get();

        $branch = explode('-',$branches[0]->openFor);
        
        $len = count($branch)-1;
        for($i=0;$i<$len;$i++){
            $branch[$i] = substr($branch[$i],0,-2);
        }
        $cutOff = Auth::user()->jaf->cutOff;
        $numOfKTallowed = Auth::user()->jaf->ktAllowed;
        $myStudents = DB::table('users')
                    ->leftJoin('resume','users.id','=','resume.user_id')
                    ->whereIn('users.branch', $branch)
                    ->whereIn('currentSem',[7,8])
                    ->where(function($query) use ($cutOff) {
                        $query ->where('aggregatePercent','>',$cutOff)
                        ->orWhere('averagePercent','>=',$cutOff);
                    })
                    ->where(function($q) use ($numOfKTallowed){
                        $q ->where('totalkt','<=',$numOfKTallowed);
                    })
                    // ->whereRaw('resume.branch = EEL')
                    // ->orWhere('resume.averagePercent','>=',$cutOff)
                    ->get();
        // echo $myStudents;
        // var_dump($myStudents);            
        return view('company.myStudents')->with('myStudents',$myStudents);
    }


				public function getPercentRangeStudentsOfBranch($branch){

								// belowFiftyFive
								$graph[0] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'<',55)
														->count();
								// echo $belowFiftyFive;

				// fiftyFiveTosixty
								$graph[1] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',55)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'<',60)
														->count();
								// echo $fiftyFiveTosixty;

				// sixtyToSixtyFive
								$graph[2] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',60)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'<',65)
														->count();
								// echo $sixtyToSixtyFive;

				// sixtyFiveToSeventy
								$graph[3] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',65)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'<',70)
														->count();
								// echo $sixtyFiveToSeventy;

				// seventyToSeventyFive
								$graph[4] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',70)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'<',75)
														->count();
								// echo $seventyToSeventyFive;        

				// seventyToSeventyFive
								$graph[5] = DB::table('users')
														->join('resume','resume.user_id','=','users.id')
														->where('entity','1')
														->where('branch',$branch)
														->where(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent)'),'>=',75)
														->count();
								// echo $aboveSeventyFive;
					
						$graph[6] = DB::table('users')
														->where('entity','1')
														->where('branch',$branch)
														->count();

        return $graph;

    }
	

    public function getOpenForBranches(){
        $branches =array_filter(explode('-', Auth::user()->jaf['openFor']));
        foreach ($branches as $key => $value) {
          if($value != 'MCA')  
						$value = substr($value,0,-2);
        }
        // var_dump($branches);
        return view('company.myBranches')->with('branches',$branches);
    }

    public function getStudentsOfBranch($branch){
        // $branch = substr($branch,0,-2);
        $branches = array_filter(explode('-', Auth::user()->jaf['openFor']));
        // echo $branch;
        // var_dump($branches);
			
				$graph = $this->getPercentRangeStudentsOfBranch(substr($branch,0,-2));
					
        if(in_array($branch,$branches)){
            $branchStudents = DB::table('users')
                ->where('users.entity',1)
                ->where('users.branch',substr($branch,0,-2))
                ->join('resume','resume.user_id','=','users.id')
                ->select('users.name','resume.aggregatePercent','resume.averagePercent','resume.currentSem','users.id')
                ->get();
            
            return view('company.branchStudents')->with(['branchStudents'=>$branchStudents,'graph'=>$graph]);
        } else {
            $branchStudents = null;
            return view('company.branchStudents')->with('branchStudents',$branchStudents);
        }
    }

    public function settingsPage(){
        $settingsData = Auth::user();

        return view('company.settings')->with('data',$settingsData);
    }

    public function settingsPageStore(Request $request){
        $in = Request::all();   
        $user = \Auth::user();
        $user->update($in);
        return $this->postLoginPage();
    }

    public function companyNews(){
        $myNews = DB::table('news')
                ->where('visibleTo','LIKE','%C%')
                ->orderBy('updated_at','desc')
                ->get();
            return view('News.userNews')->with(['myNews'=>$myNews]);
    }

		
		public function studentProfile($stuid){

        $da = DB::table('users')
                ->join('resume','resume.user_id','=','users.id')
                ->where('entity',1)
                ->where('users.id',$stuid)
                ->select('resume.*','users.*')
                ->first();
        $data = (array)$da;
			
        if(!isset($data)){
            return "Please fill in your resume first.";
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
	
}