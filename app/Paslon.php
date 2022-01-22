<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    protected $table ="paslon";
    protected $primaryKey = "id";

    public function kelurahan()
    {
    	return $this->belongsTo('App\Kelurahan');
    }
}
