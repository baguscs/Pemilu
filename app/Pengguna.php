<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = "id";

    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function desa()
    {
    	return $this->belongsTo('App\Desa');
    }

    public function role()
    {
       return $this->belongsTo('App\Role');
    }

    public function kelurahan()
    {
        return $this->belongsTo('App\Kelurahan');
    }
}
