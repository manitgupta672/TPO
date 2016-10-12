<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
class passController extends Controller
{
    public function index(Request $request){
        if(auth()->guest())
            return redirect('/');
        else{
            $user = Auth::user();
            $user->password = bcrypt($request['password']);
            $user->save();
            $error_msg = "Password Reset Successful!!!";
					$entity = $user->entity;
					switch($entity)
					{
						case 1:
						return redirect('/student/panel/settings')->with('error_msg',$error_msg);
						break;
					case 2:
						return redirect('/company/panel/settings')->with('error_msg',$error_msg);
        	case 3:
						return redirect('/alumni/panel/settings')->with('error_msg',$error_msg);
					case 4:
						return redirect('/professor/panel/settings')->with('error_msg',$error_msg);
				}
    }
}
}
