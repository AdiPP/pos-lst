<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTransferInfo extends Model
{
    public function stockTransfer()
    {
        return $this->belongsTo('App\StockTransfer', 'stock_transfer_id');
    }

    public function produk()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }
}
