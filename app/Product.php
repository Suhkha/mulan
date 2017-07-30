<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $guarded = array();
	
    protected $table = "products";

    public function getCurrentCategory()
    {
        return $this->belongsTo('App\Category');
    }

    public function getCurrentArtisan()
    {
        return $this->belongsTo('App\Artisan');
    }
}
