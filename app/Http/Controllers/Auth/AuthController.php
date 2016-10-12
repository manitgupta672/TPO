<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */

    // protected $redirectTo = '/'.$data['entity'];.'/panel';
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['entity']=='student'){
            // $this->redirectTo = '/hello';
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'mobile' => 'required|min:10',
                'branch'=>'required',
                'password' => 'required|confirmed|min:6',
                'newRoll' => 'required|min:10|max:10|unique:users' 
            ]);
        } elseif($data['entity']=='company'){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'mobile' => 'required|min:10',
                // 'newRoll' => 'required|min:10',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        } elseif($data['entity']=='admin'){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        } elseif($data['entity']=='alumni'){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'mobile' => 'required|min:10',
                // 'newRoll' => 'required|min:10',
                'branch'=>'required',
								'passOut'=> 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        } elseif($data['entity']=='professor'){
            return Validator::make($data, [
                'name' => 'required|max:255',
                'mobile' => 'required|min:10',
                'branch'=>'required',
                // 'newRoll' => 'required|min:10',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|confirmed|min:6',
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        if($data['entity']=='student'){
            return User::create([
                'entity' => '1',
                'name' => $data['name'],
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'confirmationCode'=>str_random(30),
                'newRoll' => $data['newRoll'],
                'branch' => $data['branch'],
                'password' => bcrypt($data['password'])
            ]);
        } elseif($data['entity']=='company') {
            return User::create([
                'entity' => '2',
                'name' => $data['name'],
                'confirmationCode'=>str_random(30),
                'email' => $data['email'],
                'branch' => '',
                'newRoll' => $data['mobile'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password'])
            ]);
        } elseif($data['entity']=='admin') {
            return User::create([
                'entity' => '5',
                'name' => $data['name'],
                'confirmationCode'=>str_random(30),
                'branch'=>'admin-branch',
                'email' => $data['email'],
                'newRoll'=>$data['name'],
                'password' => bcrypt($data['password'])
            ]);
        } elseif($data['entity']=='alumni') {
            return User::create([
                'entity' => '3',
                'name' => $data['name'],
                'branch' => $data['branch'].'-'.$data['passOut'],
                'email' => $data['email'],
                'confirmationCode'=>str_random(30),
                'newRoll' => $data['mobile'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password'])
            ]);
        } elseif($data['entity']=='professor') {
            return User::create([
                'entity' => '4',
                'name' => $data['name'],
                'branch' => $data['branch'],
                'email' => $data['email'],
                'confirmationCode'=>str_random(30),
                'newRoll' => $data['mobile'],
                'mobile' => $data['mobile'],
                'password' => bcrypt($data['password'])
            ]);
        }
    }
}