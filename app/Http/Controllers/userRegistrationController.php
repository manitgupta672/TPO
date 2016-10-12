<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class userRegistrationController extends Controller
{

    public function confirm($confirmationCode){

        $isConfirmed = DB::table('users')
                    ->where('confirmationCode',$confirmationCode)
                    ->select('users.confirmed')
                    ->first();
        if(isset($isConfirmed)){
            if($isConfirmed->confirmed==1){
                $userProfileConfirmed = "Your email Id is already confirmed. ";
                return redirect('auth/login')->with('error_msg',$userProfileConfirmed);
            } elseif ($isConfirmed->confirmed==0) {
                $done = DB::table('users')
                    ->where('confirmationCode',$confirmationCode)
                    ->update(['confirmed'=>1,'confirmationCode'=>null]);
                if($done) {
                    $userProfileConfirmed = "Your email id has been confirmed. Please Log in here.";
                    return redirect('auth/login')->with('error_msg',$userProfileConfirmed);
                }
            }
        } elseif(!isset($isConfirmed)) {
            // echo "string";
            $noUserFound = "Sorry your account does not exist on our website. Please register here.";
            return redirect('auth/register')->with('error',$noUserFound);
        }
    }

public function setResetRequest(Request $request){
        $newConfirmationCode = str_random(30);
         //$newConfirmationCode = "manit";
        $done = DB::table('users')
            ->where('email',$request->email)
            ->update(['confirmationCode'=>$newConfirmationCode]);

        if($done){
            $to = $request->email;
            $subject = 'TPO Cell, MBM Password Reset Request';
            $message = 'You have requested to change your password. Please follow the link below to update your password ' . URL::to('reset/'.$newConfirmationCode);
        
            

            $headers = 'From: tpo@mbm.ac.in' . "\r\n" .
                'Reply-To: tpo@mbm.ac.in' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            if(mail($to, $subject, $message, $headers)){
                $emailConfirmationMessage = "A password reset link has been sent to your email ID.";
                return redirect('auth/login')->with('error_msg',$emailConfirmationMessage);
            } else {
                $emailNotSentMessage = "Sorry your mail could not be sent.";
                return redirect('auth/login')->with('error_msg',$emailNotSentMessage);
            }            
        } else {
            $emailNotSentMessage = "Sorry.";
            return redirect('auth/login')->with('error_msg',$emailNotSentMessage);
        }
    }

    public function resetPasswordPage($confirmationCode){
        return view('auth.resetPasswordPage')->with('confirmationCode',$confirmationCode);
    }

    public function reset(Request $request){
        // if($request->password===$request->confPass){
            $done = DB::table('users')
                    ->where('confirmationCode',$request->confirmationCode)
                    ->update(['password'=>bcrypt($request->password),'confirmationCode'=>'passwordchanged']);
            if($done){
                $passwordResetSuccessfull = "Your password has been successfully changed.";
                return redirect('auth/login')->with('error_msg',$passwordResetSuccessfull);
            } else {
                $passwordResetUnsuccessfull = "Something went wrong in your attempt to change the password";
                return redirect('auth/login')->with('error_msg',$passwordResetUnsuccessfull);
            }
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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