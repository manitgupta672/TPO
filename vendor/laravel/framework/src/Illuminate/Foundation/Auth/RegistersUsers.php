<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
                // dd($request);
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $allowedEntities = array('student','admin','professor','company','alumni');
        
        if(in_array($request['entity'],$allowedEntities)){
            // $request->confirmationCode = str_random(30);
            // $userProfileCreated = $this->create($request->all());
            Auth::login($this->create($request->all()));
            $conf_code = Auth::user()->confirmationCode;
            Auth::logout();
                // echo $conf_code;
                $to      = $request->email;
                $subject = 'TPO Cell, MBM account confirmation';
                // $message = 'Thanks for creating an account with the Training and placement cell of Mugneram Bangur Memorial College of Engineering and Technology. Please follow the link below to verify your email address' . URL::to('register/'. $request->confirmationCode);

                $message = "<!DOCTYPE html>
                            <html lang='en-US'>
                            <head>
                                <meta charset='utf-8'>
                            </head>
                            <body>
                                <h2>Verify Your Email Address</h2>

                                <div>
                                    Thanks for creating an account with the Training and placement cell of Mugneram Bangur Memorial College of Engineering and Technology.
                                    Please follow the link below to verify your email address
                                    {{ URL::to('register/'. $conf_code) }}.<br/>

                                </div>

                            </body>
                        </html>";


                $headers = 'From: tpo@mbm.ac.in' . "\r\n" .
                    'Reply-To: tpo@mbm.ac.in' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                if(mail($to, $subject, $message, $headers)){
                    $emailConfirmationMessage = "Please confirm your email by clicking on the link in your email.";
                    return redirect('auth/login')->with('error_msg',$emailConfirmationMessage);
                } else {
                    $emailNotSentMessage = "Sorry your mail could not be sent. However account has been created. :P";
                    return redirect('auth/login')->with('error_msg',$emailNotSentMessage);
                }
            } else {
                $userProfileNotCreated = "Sorry your profile could not be created.";
                return redirect('auth/login')->with('error_msg',$userProfileNotCreated);
            }
        }
    }
