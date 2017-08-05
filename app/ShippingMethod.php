<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $guarded = array();
    
    protected $table = "shipping_methods";
}
