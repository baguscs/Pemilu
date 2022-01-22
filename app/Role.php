<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "role";

    public function pengguna()
    {
    	return $this->hasOne('App\Pengguna');
    }
}
