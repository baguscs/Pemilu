<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lurah extends Model
{
     public function kelurahan()
    {
    	return $this->belongsTo('App\Kelurahan');
    }
}
