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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentData = Auth::user()->resume;

        if(!isset($studentData)){
            return "Please Fill in your resume first.";
        }
        
        $allCompanies = DB::table('jaf')
                        ->join('users','jaf.user_id','=','users.id')
                        ->select('users.*','jaf.*')
                        ->where('studentPanelVisibilityStatus','1')
                        ->get();

        if(($studentData['degree'] == 'B.E.' && $studentData['currentSem'] != 7 && $studentData['currentSem'] != 8)
            || ($studentData['degree'] == 'M.C.A.' && $studentData['currentSem']!= 5 && $studentData['currentSem'] != 6))
        {
            return view('student.placements')->with(['allCompanies'=>$allCompanies]);
        }

        
        

        $a = $this->appliedIn();

        $percent = $studentData['aggregatePercent'];
        if($studentData['aggregatePercent'] < $studentData['averagePercent']){
            $percent = $studentData['averagePercent'];
        }//for allowing the students to register if either of their percentages(aggr/avg) crosses the cutoff.

            $upcoming = DB::table('jaf')
                ->join('users','jaf.user_id','=','users.id')
                ->select('users.*','jaf.*')
                ->where('studentPanelVisibilityStatus','1')
                ->where('jaf.cutOff','<=',$percent)
                ->whereNotIn('users.id',$a)
                ->where('openFor','LIKE','%'.$studentData['branch'].'%') 
                ->get();

            $applied = DB::table('jaf')
                ->join('users','jaf.user_id','=','users.id')
                ->select('users.*','jaf.*')
                ->where('studentPanelVisibilityStatus','1')
                ->whereIn('users.id',$a)
                ->get();

                        
            return view('student.placements')->with([
                'upcomings'=>$upcoming,
                'applieds'=>$applied,
                'allCompanies'=>$allCompanies
                ]);

    }


    public function applyForCompany(Request $request){
        // echo $request->input('applie');
        // $in = Request::all();
        $data['student_id'] = Auth::user()->id;
        // $data['company_id'] = $in['applie'];
        $data['company_id'] = $request->input('applie');
        $data['level'] = '0';
        $data['created_at'] = \Carbon\Carbon::now();
        // var_dump($data);
        if(DB::table('placements')->insert($data)){
            return $this->index();
        } else {
            echo "Sorry, Could not apply for the company.";
        }
    
    }

    public function cancelApplicationForCompany(Request $request){
        // $in = Request::all();
        $data['student_id'] = Auth::user()->id;
        $data['company_id'] = $request->input('applie');
        $data['level'] = '0';
        $deleted = DB::table('placements')->where('student_id','=',Auth::user()->id)
                                ->where('company_id','=',$data['company_id'])
                                ->where('level','0')
                                ->delete();
        if($deleted){
            // echo "deleted";
            return $this->index();
        } else {
            echo "Sorry Not Deleted";
        }
    }

    //returns an array containing user_id's of th e companies, student applied for.
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
