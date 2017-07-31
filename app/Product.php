<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = array();
	
    protected $table = "products";

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function artisan()
    {
        return $this->belongsTo('App\Artisan');
    }
}
