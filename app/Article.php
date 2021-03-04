<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\CreateUserTable;

class Article extends Model
{
    public $table = 'article';

    public function user(){
    	$user = CreateUserTable::find($this->user_id);
    	return $user->username;
    }
}
