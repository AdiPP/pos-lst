<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOut extends Model
{
    public function infos()
    {
        return $this->hasMany('App\StockOutInfo');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }

    public function produks()
    {
        return $this->belongsToMany('App\Product', 'stock_out_infos');
    }
}
