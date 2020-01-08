<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOutInfo extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
