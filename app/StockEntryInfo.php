<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockEntryInfo extends Model
{
    public function stockEntry()
    {
        return $this->belongsTo('App\StockEntry');
    }

    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
