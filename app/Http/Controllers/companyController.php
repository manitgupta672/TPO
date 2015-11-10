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
        return view('company.panel');
    }
    public function index()
    {
        //
    }
    // Display JAF form 
    public function jaf(){
        // echo "string";
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
                    ->whereIn('resume.branch', $branch)
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
