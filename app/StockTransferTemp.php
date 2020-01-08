<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTransferTemp extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
