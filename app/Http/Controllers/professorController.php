<?php

namespace App\Http\Controllers;
// use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;


class professorController extends Controller
{

    public function __construct(){
        $this->middleware('professor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('professor.panel');
    }

    public function professorNews(){
        $myNews = DB::table('news')
            ->where('visibleTo','LIKE','%T%')
            ->orderBy('updated_at','desc')
            ->get();
        return view('News.userNews')->with(['myNews'=>$myNews]);

    }
    
    public function companies(){
        $allCompanies = DB::table('jaf')
                        ->join('users','jaf.user_id','=','users.id')
                        ->select('users.*','jaf.*')
                        ->where('studentPanelVisibilityStatus','1')
                        ->get();
                        return view('professor.placements')->with(['allCompanies'=>$allCompanies]);
    }

    public function showAllBranches(){
        return view('professor.currentStudents');
    }

    public function myBranchStudents(){
        // $currentStudents = DB::table('users')
        //                 ->where('entity',1)
        //                 ->select(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent) as percent'),'resume.*','users.*')
        //                 ->join('resume','resume.user_id','=','users.id')
        //                 ->get();
        // return view('professor.currentStudents')->with('currentStudents',$currentStudents);
    }
    public function currentStudentsByBranch($branch){
        $currentStudentsByBranch = DB::table('users')
                        ->where('entity',1)
                        ->where('branch', $branch)
                        ->select(DB::raw('GREATEST(resume.averagePercent,resume.aggregatePercent) as percent'),'resume.*','users.*')
                        ->join('resume','resume.user_id','=','users.id')
                        ->get();
        return view('professor.currentStudentsByBranch')->with('currentStudentsByBranch',$currentStudentsByBranch);
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

    public function fellowProfessors(){
        $fellowProfessors = DB::table('users')
                            ->where('entity',4)
                            ->select('users.*')
                            ->get();
        return view('professor.fellowProfessors')->with('fellowProfessors',$fellowProfessors);                    
    }

    public function alumni(){
        $fellowAlumni = DB::table('users')
                    ->where('entity',3)
                    ->select('users.*')
                    ->get();
        foreach ($fellowAlumni as $alumni) {
            $branch = array_filter(explode('-',$alumni->branch));
            $alumni->branch = $branch[0];
            $alumni->passOut = $branch[1];
        }
        // echo $fellowAlumni;
        return view('professor.fellowAlumni')->with('alumni',$fellowAlumni);
    }

     public function settingsPage(){
        $settingsData = Auth::user();

        return view('professor.settings')->with('data',$settingsData);
    }

    public function settingsPageStore(Request $request){
        $in = Request::all();   
        $user = \Auth::user();
        $user->update($in);
        return $this->index();
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
