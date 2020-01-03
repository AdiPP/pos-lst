<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleInfo extends Model
{
    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
