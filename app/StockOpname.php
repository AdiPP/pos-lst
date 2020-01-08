<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockOpname extends Model
{
    public function infos()
    {
        return $this->hasMany('App\StockOpnameInfo', 'stok_opname_id');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet', 'outlet_id');
    }
}
