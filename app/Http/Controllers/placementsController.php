<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resume;
// use Illuminate\Support\Facades\Request;

class placementsController extends Controller
{
    
    public function __construct(){
        $this->middleware('student');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Auth::user()->branch;
        // echo $branch;
        $studentData = Auth::user()->resume;

        // if(!isset($studentData)){
        //     return "Please Fill in your resume first.";
        // }
        
        $allCompanies = DB::table('jaf')
                        ->join('users','jaf.user_id','=','users.id')
                        ->select('users.*','jaf.*')
                        ->where('studentPanelVisibilityStatus','1')
                        ->get();

        if((!isset($studentData))
            || ($studentData['degree'] == 'B.E.' && $studentData['currentSem'] != 7 && $studentData['currentSem'] != 8)
            || ($studentData['degree'] == 'M.C.A.' && $studentData['currentSem']!= 5 && $studentData['currentSem'] != 6))
        {
            return view('student.placements')->with(['allCompanies'=>$allCompanies]);
        }

        
        

        $a = $this->appliedIn($studentData['user_id']);

        $percent = $studentData['aggregatePercent'];
        if($studentData['aggregatePercent'] < $studentData['averagePercent']){
            $percent = $studentData['averagePercent'];
        }//for allowing the students to register if either of their percentages(aggr/avg) crosses the cutoff.

			if(isset($percent)){
				$upcoming = DB::table('jaf')
                ->join('users','jaf.user_id','=','users.id')
                ->select('users.*','jaf.*')
                ->where('studentPanelVisibilityStatus','1')
                ->where('jaf.cutOff','<=',$percent)
                ->where('jaf.slab','>',$this->bestSlabPlaced($studentData['user_id']))
                ->whereNotIn('users.id',$a)
                ->where('openFor','LIKE','%'.$branch.'%') 
                ->get();	
			} else {
				$upcoming = null;	
			}

			// if(isset($a)){

                $applied = DB::table('placements')
                        ->where('student_id',$studentData['user_id'])
                        ->leftJoin('jaf','placements.company_id','=','jaf.user_id')
                        ->where('studentPanelVisibilityStatus','1')
                        ->leftJoin('users','users.id','=','jaf.user_id')
                        ->get();

/*				$applied = DB::table('jaf')
                ->join('users','jaf.user_id','=','users.id')
                ->select('users.*','jaf.*')
                ->where('studentPanelVisibilityStatus','1')
                ->whereIn('users.id',$a)
                ->leftJoin('placements')
                ->get();
*/
			// } else {
			// 	$applied = null;	
			// }
                        
            return view('student.placements')->with([
                'upcomings'=>$upcoming,
                'applieds'=>$applied,
                'allCompanies'=>$allCompanies
                ]);

    }


    public function applyForCompany(Request $request){
        // echo $request->input('applie');
        // $in = Request::all();

        $applyButtonYesOrNo = DB::table('jaf')
            ->where('user_id',$request->input('applie'))
            ->select('jaf.showApplyButton')
            ->first();

        if($applyButtonYesOrNo->showApplyButton ==1){
            $data['student_id'] = Auth::user()->id;
            // $data['company_id'] = $in['applie'];
            $data['company_id'] = $request->input('applie');
            $data['level'] = '0';
            $data['created_at'] = \Carbon\Carbon::now();
            // var_dump($data);
            if(DB::table('placements')->insert($data)){
    						$error_msg = "Successfully Applied. All The Best!!!";
    						return redirect()->back()->with('error_msg',$error_msg);
    				} else {
                $error_msg = "Sorry, Could not apply for the company.";
    						return redirect()->back()->with('error_msg',$error_msg);
            }
        } 
    }

    public function cancelApplicationForCompany(Request $request){

        $applyButtonYesOrNo = DB::table('jaf')
            ->where('user_id',$request->input('applie'))
            ->select('jaf.showApplyButton')
            ->first();
        if($applyButtonYesOrNo->showApplyButton ==1){

            // $in = Request::all();
            $data['student_id'] = Auth::user()->id;
            $data['company_id'] = $request->input('applie');
            $data['level'] = '0';
            $deleted = DB::table('placements')->where('student_id','=',Auth::user()->id)
                                    ->where('company_id','=',$data['company_id'])
                                    ->where('level',0)
                                    ->delete();
            if($deleted){
                            $error_msg = "Deleted. You can always Apply back!!!";
                            return redirect()->back()->with('error_msg',$error_msg);
                    } else {
                $error_msg = "Sorry, You cannot delete it now.";
                            return redirect()->back()->with('error_msg',$error_msg);
            }
        }
    }

    //returns an array containing user_id's of the companies, student applied for.
    public function appliedIn($student_id){
        $appliedIn = DB::table('placements')
                    ->select('company_id')
                    ->where('placements.student_id','=',$student_id)
                    ->get();
        $i=0;
        $appliedInCompanyUserIds = array();            
        foreach($appliedIn as $obj){
            $appliedInCompanyUserIds[$i++] = $obj->company_id;
        }
        return $appliedInCompanyUserIds;
    }

    public function bestSlabPlaced($student_id){
        // echo Auth::user()->id;

        //returns the list of companies, the student has applied for, along with the levels he has cleared in it!
        //if the level in placement table is 99, then that student is placed in that company.
        $x = DB::table('placements')
            ->where('student_id',$student_id)
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