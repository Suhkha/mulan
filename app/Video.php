<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = array();
    
    protected $table = "videos";

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
}
