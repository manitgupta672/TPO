<?php

namespace App\Http\Controllers;
use \App\News;
// use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class newsController extends Controller
{
    public function __construct(){
        $this->middleware('news');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')->orderBy('updated_at','desc')->get();
        return view('News.allNews')->with(['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $in = Request::all();

        $in['visibleTo'] = '-';

        if(isset($in['student']))
            $in['visibleTo'] .= 'S-';
        if(isset($in['company']))
            $in['visibleTo'] .= 'C-';
        if(isset($in['alumni']))
            $in['visibleTo'] .= 'A-';
        if(isset($in['teacher']))
            $in['visibleTo'] .= 'T-';

        unset($in['_token'], $in['student'], $in['company'], $in['alumni'], $in['teacher']);
        // News::create($in);
        $in['created_at'] = \Carbon\Carbon::now();
        $in['updated_at'] = \Carbon\Carbon::now();

        DB::table('news')
            ->insert($in);
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = DB::table('news')->where('id',$id)->get();
        return view('News.show')->with('news',$news[0]);
        // return $news;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = DB::table('news')->where('id',$id)->get();
        // $data = $news[0];
        // var_dump($news[0]);
        $visibleTo = explode('-',$news[0]->visibleTo);
        // var_dump($data);
        // var_dump($visibleTo);
        return view('News.edit')->with(['news'=>$news[0],
                                        'visibleTo'=>$visibleTo
                                        ]);
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
        $in = Request::all();

        $in['visibleTo'] = '-';

        if(isset($in['student']))
            $in['visibleTo'] .= 'S-';
        if(isset($in['company']))
            $in['visibleTo'] .= 'C-';
        if(isset($in['alumni']))
            $in['visibleTo'] .= 'A-';
        if(isset($in['teacher']))
            $in['visibleTo'] .= 'T-';
        $in['updated_at'] = \Carbon\Carbon::now();
        unset($in['_token'], $in['_method'], $in['student'], $in['company'], $in['alumni'], $in['teacher']);
        $news = DB::table('news')
                ->where('id',$id)
                ->update($in);
        return redirect('news');
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
