<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password' , 'mobile' , 'newRoll','entity'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    // returns true or false checking entity column value in database 
    public function isStudent(){
        if($this->entity == 'student')
            return true;
         else
            return false;
    }
    public function isCompany(){
        if($this->entity == 'company')
            return true;
        else
            return false;
    }

    
    
    public function jaf(){
        return $this->hasOne('App\Jaf');
    }

    public function resume(){
        return $this->hasOne('App\Resume');
    }
}











// class User extends Model implements AuthenticatableContract,
//                                     AuthorizableContract,
//                                     CanResetPasswordContract
// {
//     use Authenticatable, Authorizable, CanResetPassword;

//     /**
//      * The database table used by the model.
//      *
//      * @var string
//      */
//     protected $table = 'users';

//     /**
//      * The attributes that are mass assignable.
//      *
//      * @var array
//      */
//     protected $fillable = ['name', 'email', 'password'];

//     /**
//      * The attributes excluded from the model's JSON form.
//      *
//      * @var array
//      */
//     protected $hidden = ['password', 'remember_token'];
// }