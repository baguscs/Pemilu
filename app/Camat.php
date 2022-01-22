<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camat extends Model
{
    public function kelurahan()
    {
    	return $this->belongsTo('App\Kelurahan');
    }
}
