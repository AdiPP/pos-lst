<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function infos()
    {
        return $this->hasMany('App\SaleInfo');
    }
}
