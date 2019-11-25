<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
