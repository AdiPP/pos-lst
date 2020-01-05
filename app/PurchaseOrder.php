<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    public function infos()
    {
        return $this->hasMany('App\PurchaseOrderInfo');
    }
    public function supplier()
    {
        return $this->belongsTo('App\Supplier');
    }

    public function outlet()
    {
        return $this->belongsTo('App\Outlet');
    }
}
