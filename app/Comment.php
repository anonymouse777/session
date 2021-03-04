<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CreateUserTable;


class Comment extends Model
{
    public $table = 'comment';

    public function username()
    {
    	$user = CreateUserTable::find($this->user_id);
    	return $user->username;
    }
}
