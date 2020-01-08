<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTransfer extends Model
{
    public function infos()
    {
        return $this->hasMany('App\StockTransferInfo');
    }

    public function outletAsal()
    {
        return $this->belongsTo('App\Outlet', 'outlet_asal_id');
    }

    public function outletTujuan()
    {
        return $this->belongsTo('App\Outlet', 'outlet_tujuan_id');
    }
}
