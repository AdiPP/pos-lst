<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOpnameTemp extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
