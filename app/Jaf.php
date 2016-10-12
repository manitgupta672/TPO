<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Jaf extends Model
{
	protected $table = 'jaf';
 	
 	protected $fillable = [ 'compUrl',
 	'compAdd',
 	'compCity',
 	'hrName',
 	'hrMob',
 	'hrPhone',
 	'compOver',
 	'jobDesc',
 	'cityPost',
 	'accom',
 	'bond',
 	'cutOff',
 	'ktAllowed',
 	'selPro',
 	'openFor',
 	'minPackage',
 	'maxPackage',
 	'slab',
 	'actualRounds',
 	'user_id'];

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
