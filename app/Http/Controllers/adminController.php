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
        return view('admin.companyDetails')->with(['companyDetails'=>$companyDetails[0]]);
    }

    public function updateSetVisibilityStatus(Request $request){
        DB::table('jaf')
            ->where('id',$request->input('jaf_id'))
            ->update(['studentPanelVisibilityStatus'=>$request->input('status')]);
        return $this->company($request->input('user_id'));   
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
