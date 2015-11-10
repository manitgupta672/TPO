<?php

namespace App\Http\Controllers;

use Auth;
// use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resume;
use Illuminate\Support\Facades\Request;
use DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('student');
    }
    
    public function postLoginPage(){
        return view('student.panel');
    }

    public function resume(){
        $data = Auth::user()->resume;
        // echo $data['kt'];
        // print_r($data);
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

        if(!empty($data['dob'])){
            $date = explode('/',$data['dob']);

            $data['date'] = $date[0];
            $data['month'] = $date[1];
            $data['year'] = $date[2]; 
        }

        // print_r($data);
        // echo $data['date'];
        // echo $data['month'];
        // echo $data['year'];

        // var_dump($data);
        // $fields = array ( 'sem1kt', 'sem2kt', 'sem3kt', 'sem4kt', 'sem5kt', 'sem6kt', 'sem7kt', 'sem8kt',);
        // $data = array_combine ( $fields, explode ( "-", $data['kt'] ) );
        // echo "<br/><br/><br/>";
        // var_dump($data);
        return view('student.resume')->with('data',$data);
    }

    public function resumeStore(Request $request){
            $in = Request::all();

            //setting kt's in one field.
            $kt = $in['sem1kt'] . '-' . $in['sem2kt'] . '-' . $in['sem3kt'] . '-' . $in['sem4kt'] . '-' . $in['sem5kt'] . '-' . $in['sem6kt'] . '-' . $in['sem7kt'] . '-' . $in['sem8kt'];
            
            $totalkt =$in['sem1kt'] + $in['sem2kt'] + $in['sem3kt'] + $in['sem4kt'] + $in['sem5kt'] + $in['sem6kt'] + $in['sem7kt'] + $in['sem8kt']; 
            $in['kt'] = $kt;
            $in['totalkt'] = $totalkt;
            $in['sem1Percent'] = $in['sem1']/$in['sem1MM']*100;
            $in['sem2Percent'] = $in['sem2']/$in['sem2MM']*100;
            $in['sem3Percent'] = $in['sem3']/$in['sem3MM']*100;
            $in['sem4Percent'] = $in['sem4']/$in['sem4MM']*100;
            $in['sem5Percent'] = $in['sem5']/$in['sem5MM']*100;
            $in['sem6Percent'] = $in['sem6']/$in['sem6MM']*100;
            $in['sem7Percent'] = $in['sem7']/$in['sem7MM']*100;
            $in['sem8Percent'] = $in['sem8']/$in['sem8MM']*100;
            $in['averagePercent'] = ($in['sem1'] + $in['sem2'] + $in['sem3'] + $in['sem4'] + $in['sem5'] + $in['sem6'] + $in['sem7'] + $in['sem8'])/($in['sem1MM'] + $in['sem2MM'] + $in['sem3MM'] + $in['sem4MM'] + $in['sem5MM'] + $in['sem6MM'] + $in['sem7MM'] + $in['sem8MM'])*100;
            $in['aggregatePercent'] = (($in['sem1'] + $in['sem2'])*0.5 + ($in['sem3'] + $in['sem4'])*0.75 + $in['sem5'] + $in['sem6'] + $in['sem7'] + $in['sem8'])/(($in['sem1MM'] + $in['sem2MM'])*0.5 + ($in['sem3MM'] + $in['sem4MM'])*0.75 + $in['sem5MM'] + $in['sem6MM'] + $in['sem7MM'] + $in['sem8MM'])*100;
            
            $in['dob'] = $in['date'] . '/' . $in['month'] . '/' . $in['year'];  

            //unset all kt fields from the incoming data array.
            unset($in['date'], $in['month'], $in['year'], $in['sem1kt'] , $in['sem2kt'] , $in['sem3kt'] , $in['sem4kt'] , $in['sem5kt'] , $in['sem6kt'] , $in['sem7kt'] , $in['sem8kt']);

            if( ! \Auth::user()->resume )
            {
               \Auth::user()->resume()->save(new Resume($in));
            }
            else
            {
                $user = Auth::user();
                // $input = Request::except('_method', '_token');
                unset($in['_method'] , $in['_token']);
                $user->resume()->update($in);
            }
            return redirect('/student/panel');
        }

    public function fellowStudents(){
        $fellowStudents = DB::table('users')
            ->where('users.entity','student')
            ->leftJoin('resume','users.id','=','resume.user_id')
            ->select('users.*','resume.*')
            ->get();
            // echo $fellowStudents;
        return view('student.fellowStudents')->with('fellowStudents',$fellowStudents);
    }    

    public function fellowStudentProfile($stuid){

        $fellowStudentProfile = DB::table('users')
            ->join('resume','resume.user_id','=','users.id')
            ->where('users.id',$stuid)
            ->select('users.*','resume.*')
            ->get();

        return view('student.fellowStudentProfile')->with('fellowStudent',$fellowStudentProfile);
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