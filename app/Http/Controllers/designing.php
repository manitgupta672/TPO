<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class designing extends Controller
{
    public function index()
    {
        return view('design');
    }

    public function confirm($confirmationCode){
    	if(! $confirmationCode){
    		return Redirect::route('/');
    	}

    	$user = DB::table('users')
    			->where('confirmationCode','=',$confirmationCode)
    			->get();

    	if($user){
    		$user->confirmed = 1;
    		$user->confirmationCode = null;
    		$user->save();

    		return Redirect::route('/auth/login');
    	}		
    }

}
