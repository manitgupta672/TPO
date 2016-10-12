<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class adminController extends Controller
{

    public function __construct(){
        // $this->middleware('adminLevelOne',['only'=>'welcome']);
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.panel');
        // return view('admin.login');
    }

    public function welcome(){
        // echo "Welcome admin";
        echo "Welcome Admin";


    }

    public function allCompanies(){
         // "Hello";
        $companies = DB::table('users')
            ->join('jaf','users.id','=','user_id')
            ->select('users.*','jaf.*')
            ->get();
        return view('admin.allCompanies')->with(['companies'=>$companies]);
    }

    public function company($company_id){
        $companyDetails = DB::table('users')
                        ->where('users.id',$company_id)
                        ->join('jaf','users.id','=','jaf.user_id')
                        ->select('users.*','jaf.*')
                        ->get();
        // var_dump($companyDetails[0]);
        // echo $companyDetails['name'];
        $appliedCandidates = DB::table('placements')
                            ->where('company_id',$company_id)
                            ->leftJoin('users','users.id','=','placements.student_id')
                            ->leftJoin('resume','resume.user_id','=','placements.student_id')
                            ->select('resume.*','users.*','placements.*')
                            ->where('entity',1)
                            ->get();

        $absenteesNamesAndResume = DB::table('placements')
                    ->where('company_id',$company_id)
                    ->where('level','LIKE','%-A%')
                    ->leftJoin('resume','resume.user_id','=','placements.student_id')
                    ->leftJoin('users','users.id','=','placements.student_id')
                    ->get();

        return view('admin.companyDetails')->with([
            'companyDetails'=>$companyDetails[0],
            'appliedCandidates'=>$appliedCandidates,
            'absentees'=>$absenteesNamesAndResume
            ]);
    }

    public function updateSetVisibilityStatus(Request $request){
        DB::table('jaf')
            ->where('id',$request->input('jaf_id'))
            ->update(['studentPanelVisibilityStatus'=>$request->input('status')]);
            return redirect()->back();
        // return $this->company($request->input('user_id'));   
    }


    public function updateApplyButtonStatus(Request $request){
        DB::table('jaf')
            ->where('id',$request->input('jaf_id'))
            ->update(['showApplyButton'=>$request->input('status')]);
            return redirect()->back();
        // return $this->company($request->input('user_id'));   
    }

    public function campusProcedure($id){

        $students = DB::table('placements')
                    ->where('company_id',$id)
                    ->leftJoin('users','placements.student_id','=','users.id')
                    ->select('users.*','placements.*')
                    ->get();

        $getCurrentActualRounds = DB::table('jaf')
                        ->where('user_id',$id)
                        ->select('actualRounds')
                        ->first();

        $rounds = array_filter(explode('$', $getCurrentActualRounds->actualRounds));

        // var_dump($rounds);

        return view('admin.campusProcedure')->with(['students'=>$students, 'company_id'=>$id,'rounds'=>$rounds]);
    }

    public function setRoundsData(Request $request){
        // echo $request->updateLevelValue;
        $in = $request->all();
        // var_dump($in);
        $i = 0;
        $stu = array();
        foreach ($request->all() as $key => $value) {
            if($key!='submit' && $key!='_token' && $key!='company_id')
                $stu[$i++] = $value;
        }

        // $round = '$'.$request->input('roundName');
        // $updateRoundName = DB::update('update jaf set actualRounds = concat(actualRounds, ?) where user_id = ?',[ $round, $request->input('company_id')]);

        $getCurrentActualRounds = DB::table('jaf')
                        ->where('user_id',$request->input('company_id'))
                        ->select('actualRounds')
                        ->first();
        // echo $getCurrentActualRounds->actualRounds;

        if($getCurrentActualRounds){
            $levelIncremented = DB::table('placements')
                ->where('company_id',$request->input('company_id'))
                ->whereIn('student_id',$stu)
                ->whereNotIn('student_id',$this->getAbsentStudentsId($request->input('company_id')))
                ->increment('placements.level');
        } else {
            $error_msg="Could not fetch Current Actual Rounds before updating the next round";
            return redirect()->back()->with('error_msg',$error_msg);
        }

        if($levelIncremented){
            $updateRoundName = DB::table('jaf')
                                ->where('user_id',$request->input('company_id'))
                                ->update(['actualRounds'=>$getCurrentActualRounds->actualRounds.'$'.$request->input('roundName')]);
        } else {
            $error_msg="Could not increment the level of selected students";
            return redirect()->back()->with('error_msg',$error_msg);   
        }

        if($updateRoundName){
            $error_msg = "Rounds of " . $levelIncremented . " no of students have been Updated";
            return redirect()->back()->with('error_msg',$error_msg);
        } else {
            $levelIncremented = DB::table('placements')
                ->where('company_id',$request->input('company_id'))
                ->whereIn('student_id',$stu)
                ->decrement('placements.level');
            $error_msg="Nothing Done";
            return redirect()->back()->with('error_msg',$error_msg);
        }
    }

    public function advancedCampusProcedure($id){
        $students = DB::table('placements')
                    ->where('company_id',$id)
                    ->leftJoin('users','placements.student_id','=','users.id')
                    ->select('users.*','placements.*')
                    ->get();
        $getCurrentActualRounds = DB::table('jaf')
                        ->where('user_id',$id)
                        ->select('actualRounds')
                        ->first();

        $rounds = array_filter(explode('$', $getCurrentActualRounds->actualRounds));

        return view('admin.advancedCampusProcedure')->with(['students'=>$students, 'company_id'=>$id,'rounds'=>$rounds]);
    }

    public function setRoundsDataAdvanced(Request $request){
        $in = $request->all();
        // var_dump($in);
        $i = 0;
        $stu = array();
        foreach ($request->all() as $key => $value) {
            if($key!='submit' && $key!='_token' && $key!='company_id' && $key!='roundNumber')
                $stu[$i++] = $value;
        }


        $getCurrentActualRounds = DB::table('jaf')
                        ->where('user_id',$request->input('company_id'))
                        ->select('actualRounds')
                        ->first();
        $noOfRounds = count(array_filter(explode('$', $getCurrentActualRounds->actualRounds)));

        if(($noOfRounds>=$request->input('roundNumber') || $request->input('roundNumber')==99) && ctype_digit($request->input('roundNumber'))){
            $levelIncremented = DB::table('placements')
                ->where('company_id',$request->input('company_id'))
                ->whereIn('student_id',$stu)
                ->update(['level'=>$request->input('roundNumber')]);
            
            $error_msg="Rounds of ".count($stu). " students have been updated";
            return redirect()->back()->with('error_msg',$error_msg);

        } else {
            $error_msg="The round number you entered does not exist for this company";
            return redirect()->back()->with('error_msg',$error_msg);
        }

    }

    public function absentInCampusProcedure($id){
         $students = DB::table('placements')
                    ->where('company_id',$id)
                    ->leftJoin('users','placements.student_id','=','users.id')
                    ->select('users.*','placements.*')
                    ->get();
        $getCurrentActualRounds = DB::table('jaf')
                        ->where('user_id',$id)
                        ->select('actualRounds')
                        ->first();

        $rounds = array_filter(explode('$', $getCurrentActualRounds->actualRounds));

        return view('admin.absenteesCampusProcedure')->with(['students'=>$students, 'company_id'=>$id,'rounds'=>$rounds]);
    }

    public function getAbsentStudentsId($company_id){
        $alreadyAbsentQuery = DB::table('placements')
                        ->where('company_id',$company_id)
                        ->where('level','LIKE','%-A%')
                        ->select('student_id')
                        ->get();
        $absentees = array();
        $i=0;
        foreach ($alreadyAbsentQuery as $key => $value) {
            $absentees[$i++]=$value->student_id;
        }

        return $absentees;
    }

    public function setAbsentInCampusProcedure(Request $request){
        $in = $request->all();
        // var_dump($in);
        $i = 0;
        $stu = array();
        foreach ($request->all() as $key => $value) {
            if($key!='submit' && $key!='_token' && $key!='company_id' && $key!='roundNumber')
                $stu[$i++] = $value;
        }

        $placed = DB::table('placements')
                ->where('company_id',$request->input('company_id'))
                ->whereIn('student_id',$stu)
                ->where('placements.level',99)
                ->get();
        $placedStudentIds = array();
        $i=0;
        foreach ($placed as $key => $value) {
            $placedStudentIds[$i++]=$value->student_id;
        }


        $absentees = $this->getAbsentStudentsId($request->input('company_id'));

        $levelIncremented = DB::table('placements')
                ->where('company_id',$request->input('company_id'))
                ->whereIn('student_id',$stu)
                ->whereNotIn('student_id',$absentees)
                ->whereNotIn('student_id',$placedStudentIds)
                ->update(['level'=>DB::raw("concat(level , '-A')")]);

        // echo $levelIncremented;
        // $updateRoundName = DB::update('update jaf set actualRounds = concat(actualRounds, ?) where user_id = ?',[ $round, $request->input('company_id')]);

        // $yes = DB::update("update placements set level = concat(level , '-A') where company_id = $request->input('company_id') and where student_id IN ($stu)");
        $error_msg="Absent Mark of ".$levelIncremented. " students have been updated";
        return redirect()->back()->with('error_msg',$error_msg);



    }

    public function setSlab(Request $request){
        $set = DB::table('jaf')
                ->where('user_id',$request->input('company_id'))
                ->update(['slab'=>$request->input('slab')]);
        if($set)
            return redirect()->back();
    }

    public function changePassword(Request $request){
        $update = DB::table('users')
                ->where('email',$request->input('email'))
                ->update(['password'=>bcrypt($request->input('password'))]);
        if($update){
            $error_msg = $request->input('email') . "->Password Updated";
            return view('admin.panel')->with('error_msg',$error_msg);
        } else {
            $error_msg = "No user with this email->" . $request->input('email');
            return view('admin.panel')->with('error_msg',$error_msg);
        }

    }

    public function studentDetails($stuid){

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

        $allApplieds = DB::table('placements')
            ->where('student_id',$stuid)
            ->where('placements.level','<',99)
            ->leftJoin('jaf','jaf.user_id','=','placements.company_id')
            ->leftJoin('users','users.id','=','placements.company_id')
            ->get();

        $placedIn = DB::table('placements')
                ->where('student_id',$stuid)
                ->where('placements.level',99)
                ->leftJoin('jaf','jaf.user_id','=','placements.company_id')
                ->leftJoin('users','users.id','=','placements.company_id')
                ->get();



        return view('student.printResume')->with([
            'resume'=>$data, 
            'allApplieds'=>$allApplieds,
            'placedIn'=>$placedIn
            ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hi');
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
