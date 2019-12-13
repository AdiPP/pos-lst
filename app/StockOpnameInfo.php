<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOpnameInfo extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
