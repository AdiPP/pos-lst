<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockEntry extends Model
{
    public function infos()
    {
        return $this->hasMany('App\StockEntryInfo');
    }
}
