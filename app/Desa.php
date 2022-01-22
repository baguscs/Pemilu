<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
	protected $table = "desa";

    public function pengguna()
    {
    	return $this->hasOne('App\Pengguna');
    }

    public function tps()
    {
    	return $this->hasOne('App\Tps');
    }
}
