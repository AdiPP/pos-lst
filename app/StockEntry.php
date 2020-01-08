<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    public function infos()
    {
        return $this->hasMany('App\StockEntryInfo');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }

    public function produks()
    {
        return $this->belongsToMany('App\Product', 'stock_entry_infos');
    }
}
