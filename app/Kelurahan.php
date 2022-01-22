<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table ="kelurahan";
    protected $primaryKey ="id";

   public function camat()
    {
    	return $this->hasOne('App\Lurah');
    }

    public function lurah()
    {
    	return $this->hasOne('App\Lurah');
    }

     public function vote()
    {
        return $this->hasOne('App\Pengguna');
    }
}
